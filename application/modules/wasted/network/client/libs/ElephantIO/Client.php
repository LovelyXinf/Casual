<?php

namespace ElephantIO;

require_once __DIR__ . '/Payload.php';

/**
 * ElephantIOClient is a rough implementation of socket.io protocol.
 * It should ease you dealing with a socket.io server.
 *
 * @author Ludovic Barreca <ludovic@balloonup.com>
 */
class Client
{
    const TYPE_DISCONNECT   = 0;
    const TYPE_CONNECT      = 40;
    const TYPE_HEARTBEAT    = 2;
    const TYPE_MESSAGE      = 3;
    const TYPE_JSON_MESSAGE = 4;
    const TYPE_EVENT        = 42;
    const TYPE_ACK          = 6;
    const TYPE_ERROR        = 7;
    const TYPE_NOOP         = 8;

    private $socketIOUrl;
    private $serverHost;
    private $serverPort = 80;
    private $session;
    private $fd;
    private $buffer;
    private $lastId = 0;
    private $readFlag;
    private $checkSslPeer = true;
    private $debug;
    private $handshakeTimeout = 2000;
    private $callbacks = array();
    private $handshakeQuery = '';
    private $listenSocket;
    private $listenAddress;
    private $listenPort;
    private $listenType = 'file'; // 'socket'
    private $logger;

    private $handshake_error = false;
    private $connect_error = false;
    private $reconnect_timeout = 0;

    private $licence_data = array(
        'api_key'    => '',
        'api_domain' => '',
    );

    public function __construct($socketIOUrl, $socketIOPath = 'socket.io', $protocol = 1, $read = true, $checkSslPeer = true, $debug = false, $namespace = '', $commandAddress = '127.0.0.1', $commandPort = 10000, $commandType = 'file', $commandDir = null)
    {
        $this->socketIOUrl = $socketIOUrl . '/' . $socketIOPath . '/?EIO=' . (string) $protocol . "&transport=polling";
        $this->readFlag = $read;
        $this->debug = $debug;
        $this->parseUrl();
        $this->checkSslPeer = $checkSslPeer;
        $this->listenSocket = new commandSocket(false, false, 'file', $commandDir);
        $this->listenAddress = $commandAddress;
        $this->listenPort = $commandPort;
        $this->listenType = $commandType;
        $this->namespace = $namespace;
    }

    public function setLogger(&$logger)
    {
        $this->logger = $logger;
    }

    /**
     * Set query to be sent during handshake.
     *
     * @param array $query Query paramters as key => value
     *
     * @return Client
     */
    public function setHandshakeQuery(array $query)
    {
        $this->handshakeQuery = '?' . http_build_query($query);

        return $this;
    }

    public function setLicence($key, $domain)
    {
        $this->licence_data = [
            'api_key'    => $key,
            'api_domain' => $domain,
        ];
    }

    /**
     * Initialize a new connection
     *
     * @param boolean $keepalive
     *
     * @return Client
     */
    public function init($keepalive = false, $listen = false, $reconnect = false, $reconnect_timeout = 0)
    {
        if ($reconnect && $reconnect_timeout > 0) {
            $this->reconnect_timeout = $reconnect_timeout;
        }
        $return = $this->handshake();

        if ($return == false && $this->handshake_error == 'refused' && $this->reconnect_timeout > 0) {
            usleep($this->reconnect_timeout * 1000);
            pcntl_signal_dispatch();
            $this->log('error', 'Could not connect to the server. Retrying...' . PHP_EOL);

            return $this->init($keepalive, $listen, $reconnect, $this->reconnect_timeout);
        }

        $this->connect();

        if ($keepalive) {
            $this->keepAlive($listen);
        } else {
            return $this;
        }
    }

    /**
     * Keep the connection alive and dispatch events
     *
     * @todo work on callbacks
     */
    public function keepAlive($listen = false)
    {
        if ($listen) {
            $res = $this->listenSocket->init($this->listenAddress, $this->listenPort, $this->listenType);
            $this->listenSocket->on('event', function ($data) {
                if (!empty($data['event'])) {
                    $this->emit($data['event'], (!empty($data['data'])) ? $data['data'] : array(), $this->namespace);
                }
                $this->log('debug', "Event from telnet: " . json_encode($data) . "\n");
            });
            if ($res !== true) {
                $this->log('error', $res);
            }
        }
        $this->emit('saved', array(), $this->namespace);

        while (is_resource($this->fd)) {
            pcntl_signal_dispatch();
            $this->listenSocket->listen();

            $timeout = $this->session['heartbeat_timeout'] / 1000;
            if ($this->session['heartbeat_timeout'] > 0 && $timeout + $this->heartbeatStamp - 5 < $this->mctime()) {
                $this->send(self::TYPE_HEARTBEAT, $this->namespace);
                $this->heartbeatStamp = $this->mctime();
                $this->emit('heartbeat', array(), $this->namespace);
            }

            $r = array($this->fd);
            $w = $e = null;

            $start_select = $this->mctime();
            $stream_select = @stream_select($r, $w, $e, 1);
            if ($stream_select == 0) {
                continue;
            }

            $res = $this->read();

            if ($this->mctime() - $start_select < 5 && strlen(trim($res)) == 0) {
                $this->close();
                for ($i = 1; $i < 50; ++$i) {
                    pcntl_signal_dispatch();
                    usleep(100000);
                }
                $this->init(true, $listen, true);
                break;
            }

            $sess = $this->response($res);
            if ((int) $sess['type'] === self::TYPE_EVENT) {
                $name = $sess['event'];
                $data = $sess['data'];

                $this->log('debug', 'Receive event "' . $name . '" with data "' . json_encode($data) . '"');
                if (!empty($this->callbacks[$name])) {
                    foreach ($this->callbacks[$name] as $callback) {
                        call_user_func($callback, $data);
                    }
                }
            }
        }
    }

    /**
     * Read the buffer and return the oldest event in stack
     *
     * @return string
     *                // https://tools.ietf.org/html/rfc6455#section-5.2
     */
    public function read()
    {
        // Ignore first byte, I hope Socket.io does not send fragmented frames, so we don't have to deal with FIN bit.
        // There are also reserved bit's which are 0 in socket.io, and opcode, which is always "text frame" in Socket.io

        fread($this->fd, 1);

        // There is also masking bit, as MSB, but it's 0 in current Socket.io

        $payload_len = ord(fread($this->fd, 1));

        switch ($payload_len) {
            case 126:
                $payload_len = unpack("n", fread($this->fd, 2));
                $payload_len = $payload_len[1];
                break;
            case 127:
                $this->log('error', "Next 8 bytes are 64bit uint payload length, not yet implemented, since PHP can't handle 64bit longs!");
                break;
        }

        // Use buffering to handle packet size > 16Kb

        $read = 0;
        $payload = '';
        while ($read < $payload_len && ($buff = fread($this->fd, $payload_len - $read))) {
            $read += strlen($buff);
            $payload .= $buff;
        }
        $this->log('debug', 'Received ' . $payload);

        return $payload;
    }

    /**
     * Attach an event handler function for a given event
     *
     * @param string   $event
     * @param callable $callback
     *
     * @return string
     */
    public function on($event, $callback)
    {
        if (!is_callable($callback)) {
            throw new \InvalidArgumentException('ElephantIOClient::on() type callback must be callable.');
        }

        if (!isset($this->callbacks[$event])) {
            $this->callbacks[$event] = array();
        }

        // @TODO Handle case where callback is a string
        if (in_array($callback, $this->callbacks[$event])) {
            $this->log('debug', 'Skip existing callback');

            return;
        }

        $this->callbacks[$event][] = $callback;
    }

    /**
     * Send message to the websocket
     *
     * @param int    $type
     * @param int    $id
     * @param int    $endpoint
     * @param string $message
     *
     * @return ElephantIO\Client
     */
    public function send($type, $ns = null, $event = null, $data = null)
    {
        if (!is_int($type) /*|| $type > 8*/) {
            throw new \InvalidArgumentException('ElephantIOClient::send() type parameter must be an integer strictly inferior to 9.');
        }

        /*$raw_message = $type.':'.$id.':'.$endpoint.':'.$message;*/

        $raw_message = $type;
        if ($ns && $ns != '/') {
            $raw_message .= $ns;
        }
        if ($event) {
            $raw_message .= ',["' . $event . '"';
            if (!empty($data)) {
                $raw_message .= ',' . json_encode($data);
            }
            $raw_message .= ']';
        }

        $payload = new Payload();
        $payload->setOpcode(Payload::OPCODE_TEXT)
            ->setMask(true)
            ->setPayload($raw_message);
        $encoded = $payload->encodePayload();
        if (is_resource($this->fd)) {
            fwrite($this->fd, $encoded);

            // wait 100ms before closing connection
            usleep(100 * 1000);

            $this->log('debug', 'Sent ' . $raw_message);
        }

        return $this;
    }

    private function response($raw_str)
    {
        $return = array(
            'type'      => '',
            'namespace' => '',
            'event'     => '',
            'data'      => '',
        );
        $pos = mb_stripos($raw_str, ',');
        $service = mb_substr($raw_str, 0, $pos);
        $service_arr = explode('/', $service);
        $event = json_decode(mb_substr($raw_str, $pos + 1));
        if (!empty($service_arr[0])) {
            $return['type'] = $service_arr[0];
        }
        if (!empty($service_arr[1])) {
            $return['namespace'] = $service_arr[1];
        }
        if (!empty($event[0])) {
            $return['event'] = $event[0];
        }
        if (!empty($event[1])) {
            $return['data'] = (array) $event[1];
        }
        /*$regexp = "/([0-9]+)(\/[a-z\-]+)?(,\[\"([a-z]+)\"(,(.*))?\])?/i";
        if(preg_match($regexp, $raw_str, $matches)){
            if(!empty($matches[1])) $return['type'] = $matches[1];
            if(!empty($matches[2])) $return['namespace'] = $matches[2];
            if(!empty($matches[4])) $return['event'] = $matches[4];
            if(!empty($matches[6])) $return['data'] = json_decode($matches[6], true);
        }*/
        return $return;
    }

    /**
     * Emit an event
     *
     * @param string   $event
     * @param array    $args
     * @param string   $endpoint
     * @param function $callback - ignored for the time being
     *
     * @return ElephantIO\Client
     *
     * @todo work on callbacks
     */
    public function emit($event, $args, $ns = null, $callback = null)
    {
        return $this->send(self::TYPE_EVENT, $ns, $event, $args);
    }

    /**
     * Close the socket
     *
     * @return boolean
     */
    public function close()
    {
        if (is_resource($this->fd)) {
            $this->send(self::TYPE_DISCONNECT, $this->namespace);
            fclose($this->fd);

            return true;
        }
        $this->reconnect_timeout = 0;

        return false;
    }

    /**
     * log ANSI formatted message.
     * First parameter must be either debug, info, error or ok
     *
     * @param string $type
     * @param string $message
     */
    private function log($type, $message)
    {
        if ($this->logger) {
            $this->logger->log($type, $message, 'fast');

            return true;
        }        
    }

    private function generateKey($length = 16)
    {
        $c = 0;
        $tmp = '';

        while ($c++ * 16 < $length) {
            $tmp .= md5(mt_rand(), true);
        }

        return base64_encode(substr($tmp, 0, $length));
    }

    private function mctime()
    {
        list($usec, $sec) = explode(" ", microtime());

        return ((float) $usec + (float) $sec);
    }
    /**
     * Set Handshake timeout in milliseconds
     *
     * @param int $delay
     */
    public function setHandshakeTimeout($delay)
    {
        $this->handshakeTimeout = $delay;
    }

    /**
     * Handshake with socket.io server
     *
     * @return bool
     */
    private function handshake()
    {
        try {
            $url = $this->socketIOUrl;

            if (!empty($this->handshakeQuery)) {
                $url .= $this->handshakeQuery;
            }

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            if (!$this->checkSslPeer) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            }

            if (!is_null($this->handshakeTimeout)) {
                $timeout   = $this->handshakeTimeout;
                $constants = array(CURLOPT_CONNECTTIMEOUT_MS, CURLOPT_TIMEOUT_MS);

                $version = curl_version();
                $version = $version['version'];

                // CURLOPT_CONNECTTIMEOUT_MS and CURLOPT_TIMEOUT_MS were only implemented on curl 7.16.2
                if (true === version_compare($version, '7.16.2', '<')) {
                    $timeout  /= 1000;
                    $constants = array(CURLOPT_CONNECTTIMEOUT, CURLOPT_TIMEOUT);
                }

                curl_setopt($ch, $constants[0], $timeout);
                curl_setopt($ch, $constants[1], $timeout);
            }

            $res = curl_exec($ch);

            if ($res === false || $res === '') {
                throw new \Exception('refused');
            }

            //$sess = explode(':', $res);

            preg_match('/({.*})/U', $res, $matches);
            $sess = json_decode($matches[0], true);

            $this->session['sid'] = $sess['sid'];
            $this->session['heartbeat_timeout'] = $sess['pingInterval'];
            $this->session['connection_timeout'] = $sess['pingTimeout'];
            $this->session['supported_transports'] = array_flip($sess['upgrades']);

            if (!isset($this->session['supported_transports']['websocket'])) {
                throw new \Exception('unsupported');
            }

            return true;
        } catch (\Exception $e) {
            $this->handshake_error = $e->getMessage();

            return false;
        }
    }

    /**
     * Connects using websocket protocol
     *
     * @return bool
     */
    private function connect()
    {
        try {
            $this->fd = fsockopen($this->serverHost, $this->serverPort, $errno, $errstr);

            if (!$this->fd) {
                throw new \Exception('fsockopen returned: ' . $errstr);
            }

            $key = $this->generateKey();

            $out  = "GET " . $this->serverPath . "/?EIO=2&transport=websocket HTTP/1.1\r\n";
            $out .= "Host: " . $this->serverHost . ":" . $this->serverPort . "\r\n";
            $out .= "Upgrade: WebSocket\r\n";
            $out .= "Connection: Upgrade\r\n";
            $out .= "Sec-WebSocket-Key: " . $key . "\r\n";
            $out .= "Sec-WebSocket-Version: 13\r\n";
            $out .= "PGN-Key: " . $this->licence_data['api_key'] . "\r\n";
            $out .= "PGN-Domain: " . $this->licence_data['api_domain'] . "\r\n";
            $out .= "Origin: *\r\n\r\n";
            fwrite($this->fd, $out);

            $res = fgets($this->fd);

            if ($res === false) {
                throw new \Exception('Socket.io did not respond properly. Aborting...');
            }

            if ($subres = substr($res, 0, 12) != 'HTTP/1.1 101') {
                throw new \Exception('Unexpected Response. Expected HTTP/1.1 101 got ' . $subres . '. Aborting...');
            }

            while (true) {
                $res = trim(fgets($this->fd));
                if ($res === '') {
                    break;
                }
            }

            if ($this->readFlag) {
                if (!$this->read()) {
                    throw new \Exception('Socket.io did not send connect response. Aborting...');
                } else {
                    $this->log('info', 'Server report us as connected !');
                }
            }

            $this->send(self::TYPE_CONNECT, $this->namespace);

            $this->heartbeatStamp = $this->mctime();

            return true;
        } catch (\Exception $e) {
            $this->connect_error = $e->getMessage();

            return false;
        }
    }

    /**
     * Parse the url and set server parameters
     *
     * @return bool
     */
    private function parseUrl()
    {
        $url = parse_url($this->socketIOUrl);

        $this->serverPath = $url['path'];
        $this->serverHost = $url['host'];
        $this->serverPort = isset($url['port']) ? $url['port'] : null;

        if (array_key_exists('scheme', $url) && $url['scheme'] == 'https') {
            $this->serverHost = 'ssl://' . $this->serverHost;
            if (!$this->serverPort) {
                $this->serverPort = 443;
            }
        }

        return true;
    }
}

class commandSocket
{
    private $address = '127.0.0.1';
    private $port = 10000;
    private $isListen = false;
    private $listenSocket;
    private $callbacks;
    private $timeout = 5;
    private $mctime;
    private $type = 'file';
    private $events_folder = '';

    public function __construct($address = false, $port = false, $type = 'file', $eventsDir = null)
    {
        if ($address != false) {
            $this->address = $address;
        }
        if ($port != false) {
            $this->port = $port;
        }
        if ($type != false) {
            $this->type = $type;
        }
        if (empty($eventsDir) || !is_dir($eventsDir)) {
            $this->events_folder = dirname(dirname(__FILE__)) . '/events/';
        } else {
            $this->events_folder = $eventsDir;
        }
    }

    public function init($address = false, $port = false)
    {
        if ($address != false) {
            $this->address = $address;
        }
        if ($port != false) {
            $this->port = $port;
        }

        if ($this->type == 'socket') {
            $this->isListen = false;
            if (($this->listenSocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
                return 'Не удалось выполнить socket_create(): причина: ' . socket_strerror(socket_last_error());
            }

            if (socket_bind($this->listenSocket, $this->address, $this->port) === false) {
                return 'Не удалось выполнить socket_bind(): причина: ' . socket_strerror(socket_last_error($this->listenSocket));
            }

            if (socket_listen($this->listenSocket, 5) === false) {
                return 'Не удалось выполнить socket_listen(): причина: ' . socket_strerror(socket_last_error($this->listenSocket));
            }
            socket_set_nonblock($this->listenSocket);
            $this->isListen = true;
        } else {
            $this->isListen = true;
        }

        return true;
    }

    public function listen()
    {
        if (!$this->isListen) {
            return false;
        }

        if ($this->type == 'socket') {
            if (($newc = socket_accept($this->listenSocket)) !== false) {
                do {
                    if (false === ($buf = socket_read($newc, 2048, PHP_NORMAL_READ))) {
                        break;
                    }
                    if (!$buf = trim($buf)) {
                        continue;
                    }
                    $result = $this->parseStr($buf);

                    if ($result['command'] == 'exit') {
                        break;
                    }

                    $this->trigger($result['command'], $result['params']);

                    $talkback = "Received: '" . $result['command'] . "'.\n";
                    socket_write($newc, $talkback, strlen($talkback));

                    `echo '$buf' >> ./test.log`;
                } while (true);
            }
        } else {
            /// get files listing
            /// in cycle trigger event
            $d = dir($this->events_folder);
            while (false !== ($entry = $d->read())) {
                if ($entry != '.' && $entry != '..' && $entry != 'index.html') {
                    $file = $this->events_folder . $entry;
                    $content = file_get_contents($file);
                    $this->trigger('event', json_decode($content, true));
                    unlink($file);
                }
            }
            $d->close();
        }
    }

    private function parseStr($str)
    {
        $parts = explode('::', $str);
        $data['command'] = trim(strip_tags($parts[0]));
        if (isset($parts[1]) && !empty($parts[1])) {
            $data['params'] = json_decode($parts[1], true);
        }
        if (empty($data['params'])) {
            $data['params'] = array();
        }

        return $data;
    }

    public function on($event, $callback, $name = 'default')
    {
        if (!is_callable($callback)) {
            return;
        }

        if (!isset($this->callbacks[$event])) {
            $this->callbacks[$event] = array();
        }

        if (isset($this->callbacks[$event][$name])) {
            return;
        }

        $this->callbacks[$event][$name] = $callback;
    }

    public function trigger($event, $data)
    {
        if (!empty($this->callbacks[$event])) {
            foreach ($this->callbacks[$event] as $callback) {
                call_user_func($callback, $data);
            }
        }
    }
}
