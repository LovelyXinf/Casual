<?php

namespace Pg\modules\network\models;

require_once MODULEPATH . 'network/install/config.php';

/**
 * Network main model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class NetworkModel extends \Model
{
    const MODULE_GID = 'network';
    const HEADER_KEY = 'x-pgn-key';
    const HEADER_DOMAIN = 'x-pgn-domain';
    const CLIENT_FAST = 'fast';
    const CLIENT_SLOW = 'slow';

    const FAST_SERVICE_EXECUTABLE = 'fast-client-service.php';

    private $logs_dir;

    private $slow_server = NETWORK_SLOW_SERVER;
    private $fast_server = NETWORK_FAST_SERVER;
    private $key = '';
    private $domain = '';

    protected $_log_files = array(
        self::CLIENT_SLOW => 'slow_server.log',
        self::CLIENT_FAST => 'fast_server.log',
    );

    protected $_client_path = '';
    protected $_cfg_data = array(
        'slow_server',
        'fast_server',
        'key',
        'domain',
        'is_upload_photos',
        'is_registered',
    );

    private $php_path = 'php-cli';

    /**
     * Constructor
     *
     * @return Install object
     */
    public function __construct()
    {
        parent::__construct();

        $this->_client_path = MODULEPATH . 'network/client/';
        $this->logs_dir = TEMPPATH . 'logs/' . self::MODULE_GID . '/';

        if (!shell_exec('which ' . $this->php_path)) {
            $this->php_path = 'php';
        }
    }

    public function getSlowServer()
    {
        return $this->slow_server;
    }

    public function getFastServer()
    {
        return $this->fast_server;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Get logs dir
     *
     * @return string
     */
    public function getLogsDir()
    {
        return $this->logs_dir;
    }

    /**
     * Get authentication data
     *
     * @return array
     */
    public function getAuthData()
    {
        $data = $this->getConfig();
        $this->slow_server = $data['slow_server'];
        $this->fast_server = $data['fast_server'];
        $this->key = $data['key'];
        $this->domain = $data['domain'];

        return $data;
    }

    /**
     * Get network settings from database
     *
     * @param mixed $cfg_gids
     *
     * @return array
     */
    public function getConfig($cfg_gids = null)
    {
        if (empty($cfg_gids)) {
            $cfg_gids = $this->_cfg_data;
        } elseif (!is_array($cfg_gids)) {
            $cfg_gids = array($cfg_gids);
        }
        $settings = array();
        foreach ($cfg_gids as $cfg_gid) {
            $val = $this->ci->pg_module->get_module_config(self::MODULE_GID, $cfg_gid);
            if (!$val) {
                $val = '';
            } elseif ((false !== ($unser = @unserialize($val))) || 'b:0;' === $unser) {
                $val = $unser;
            }
            $settings[$cfg_gid] = $val;
        }

        return $settings;
    }

    /**
     * Save network settings
     *
     * @param array $data
     *
     * @return array
     */
    public function setConfig(array $data)
    {
        foreach ($data as $config_gid => $value) {
            if (is_array($value)) {
                $value = serialize($value);
            } else {
                $value = (string) $value;
            }
            log_message("error", "$config_gid=$value ");
            $this->ci->pg_module->set_module_config(self::MODULE_GID, $config_gid, $value);
        }

        return $data;
    }

    public function isRegistered()
    {
        return (bool) $this->ci->pg_module->get_module_config(self::MODULE_GID, 'is_registered');
    }

    public function setRegistered($is_registered = true)
    {
        return $this->ci->pg_module->set_module_config(self::MODULE_GID, is_registered, (bool) $is_registered);
    }

    /**
     * Execute shell command
     *
     * @param string $file
     * @param string $command
     * @param string $preparams
     * @param string $postparams
     *
     * @return string
     */
    private function command($file, $command = 'sh', $preparams = null, $postparams = null)
    {
        if ($preparams) {
            $preparams = $preparams . ' ';
        }
        if ($postparams) {
            $postparams = ' ' . $postparams;
        }

        return shell_exec($command . " " . $preparams . $this->_client_path . $file . $postparams);
    }

    /**
     * Start slow client
     *
     * @return string
     */
    public function startSlow()
    {
        if ($this->is_started_slow()) {
            return true;
        }

        $pid_file = $this->_client_path . 'logs/.pidfile';
        if ((int)shell_exec('test -f ' . $pid_file . ' && echo 1 || echo 0')) {
            unlink($pid_file);
        }

        $result = $this->command('slow-client.start');
        // TODO: Проверка успешности
        return $result;
    }

    /**
     * Start fast client
     *
     * @return mixed
     */
    public function startFast()
    {
        if ($this->is_started_fast()) {
            return true;
        }

        $pid_file = $this->getLogsDir() . 'daemon.pid';
        if ((int)shell_exec('test -f ' . $pid_file . ' && echo 1 || echo 0')) {
            unlink($pid_file);
        }

        $cmd_result = $this->command(self::FAST_SERVICE_EXECUTABLE, $this->php_path, '-f');

        return $this->is_started_fast();
    }

    /**
     * Start client
     *
     * @return string
     */
    public function start()
    {
        $this->ci->pg_module->set_module_config('network', 'is_started', 1);

        return array(
            self::CLIENT_SLOW => $this->startSlow(),
            self::CLIENT_FAST => $this->startFast(),
        );
    }

    /**
     * Stop slow server
     *
     * @return string
     */
    public function stopSlow()
    {
        $result = $this->command('slow-client.stop');
        // TODO: Проверка успешности
        return $result;
    }

    /**
     * Stop fast server
     *
     * @return boolean
     */
    public function stopFast()
    {
        if (!$this->is_started_fast()) {
            return true;
        }
        $pid = $this->getPidFast();
        if ($pid == 0) {
            return false;
        }
        // 15 — SIGTERM
        return posix_kill($pid, 15);
    }

    /**
     * Stop both clients
     *
     * @return array
     */
    public function stop()
    {
        $this->ci->pg_module->set_module_config('network', 'is_started', 0);

        return array(
            self::CLIENT_SLOW => $this->stop_slow(),
            self::CLIENT_FAST => $this->stop_fast(),
        );
    }

    /**
     * Get fast client status
     *
     * @param int $lines
     *
     * @return array
     */
    public function getStatus($lines = 10)
    {
        $LOG = &load_class('Log');
        $result = array(
            self::CLIENT_FAST => array(
                'is_started' => $this->is_started_fast(),
                'log'        => $LOG->read_log(self::MODULE_GID, self::CLIENT_FAST, $lines),
            ),
            self::CLIENT_SLOW => array(
                'is_started' => $this->is_started_slow(),
                'log'        => $LOG->read_log(self::MODULE_GID, self::CLIENT_SLOW, $lines),
            ),
        );

        return $result;
    }

    public function requestKey($domain)
    {
        $result = json_decode($this->curlPost(
                $this->slow_server . 'get_key', array('domain' => $domain)
            ), true);
        if (empty($result['code'])) {
            $result['code'] = '';
        }

        return $result;
    }

    public function getDefaultDomain()
    {
        return rtrim(str_ireplace(array('http://', 'https://', 'www.'), '', SITE_SERVER), '/');
    }

    /**
     * Get process id of the slow server
     *
     * @return int
     */
    private function getPidSlow()
    {
        $result = $this->command('slow-client.status');

        return (int) $result;
    }

    /**
     * Get process id of the fast server
     *
     * @return int
     */
    private function getPidFast()
    {
        // TODO: Читать pid из базы
        $pid_file = $this->getLogsDir() . 'daemon.pid';
        if ((int)shell_exec('test -f ' . $pid_file . ' && echo 1 || echo 0')) {
            $pid = (int) file_get_contents($pid_file);
        } else {
            $pid = 0;
        }

        return $pid;
    }

    /**
     * Is slow server running
     *
     * @return bool
     */
    public function isStartedSlow()
    {
        return (bool) $this->getPidSlow();
    }

    /**
     * Is slow server running
     *
     * @return bool
     */
    public function isStartedFast()
    {
        //TODO: Передумать.
        $pid = $this->getPidFast();
        if (empty($pid)) {
            return false;
        }

        $result = shell_exec("ps ax | grep '^\s*" . $pid . "\s' | grep -v grep");

        return (bool) $result;
    }

    /**
     * Are both servers running
     *
     * @return array
     */
    public function isStarted()
    {
        return array(
            self::CLIENT_SLOW => $this->is_started_slow(),
            self::CLIENT_FAST => $this->is_started_fast(),
        );
    }

    /**
     * Check client data
     *
     * @param string $domain
     * @param string $key
     *
     * @return bool
     */
    public function checkAuthData($domain = null, $key = null)
    {
        if (!is_null($key)) {
            $this->key = $key;
        }
        if (!is_null($domain)) {
            $this->domain = $domain;
        }
        $result = $this->send('test');

        return !empty($result['test']);
    }

    /**
     * Validate network settings
     *
     * @param array $settings
     *
     * @return array
     */
    public function validateSettings(array $settings)
    {
        $errors = array();
        if (isset($settings['domain'])) {
            if (empty($settings['domain'])) {
                $errors['domain'] = l('admin_error_domain_empty', self::MODULE_GID);
            }
        }
        if (isset($settings['key'])) {
            if (empty($settings['key'])) {
                $errors['key'] = l('admin_error_key_empty', self::MODULE_GID);
            }
        }

        return $errors;
    }

    /**
     * Get auth headers for a POST request
     *
     * @return array
     */
    private function getAuthHeaders()
    {
        return array(CURLOPT_HTTPHEADER => array(
                self::HEADER_KEY . ': ' . $this->key,
                self::HEADER_DOMAIN . ': ' . $this->domain,
        ));
    }

    /**
     * Send request to the server
     *
     * @param string $action
     * @param array  $data
     *
     * @return mixed
     */
    private function send($action, array $data = array())
    {
        if (empty($this->key) || empty($this->domain) || empty($this->slow_server)) {
            return -1;
        }
        $result = $this->curlPost($this->slow_server . $action, $data);

        return json_decode($result, true);
    }

    /**
     * Send POST request
     *
     * @param string $url
     * @param data   $data
     * @param array  $options
     *
     * @return type
     */
    private function curlPost($url, $data = null, array $options = array())
    {
        // TODO: добавить библиотеку Request и положить этот метод туда.
        $defaults = array(
            CURLOPT_POST           => 1,
            CURLOPT_POSTFIELDS     => http_build_query($data),
            CURLOPT_URL            => $url,
            CURLOPT_HEADER         => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_SSL_VERIFYPEER => false,
            ) + $this->getAuthHeaders();
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function validateRequirementsCli()
    {
        try {
            $result = $this->command('requirements.php', $this->php_path, '-f');
            if (!$result) {
                throw new \Exception('Error validate Requirements Cli');
            }
            return json_decode($result, true);
        } catch (\Exception $e) {
            log_message('error',
                '(' . $e->getMessage() . ') in ' . $e->getFile());
            throw $e;
            return false;
        }
    }

    /**
     * Validate module requirements
     *
     * @return array
     */
    public function validateRequirements()
    {
        $return = array('data' => array(), 'result' => true);

        $check_list = array(
            array(
                'func' => function () {
                    return (bool) (string) extension_loaded('pcntl');
                },
                'msg' => 'PCNTL extension is loaded',
            ),
            array(
                'func' => function () {
                    return (bool) (string) function_exists('pcntl_fork');
                },
                'msg' => 'pcntl_fork() function is available',
            ),
            array(
                'func' => function () {
                    return (bool) (string) function_exists('pcntl_signal');
                },
                'msg' => 'pcntl_signal() function is available',
            ),
            array(
                'func' => function () {
                    return (bool) (string) function_exists('pcntl_signal_dispatch');
                },
                'msg' => 'pcntl_signal_dispatch() function is available',
            ),
            array(
                'func' => function () {
                    return (bool) (string) function_exists('posix_setsid');
                },
                'msg' => 'posix_setsid() function is available',
            ),
            array(
                'func' => function () {
                    return (bool) (string) function_exists('posix_kill');
                },
                'msg' => 'posix_kill() function is available',
            ),
        );

        foreach ($check_list as $ckeck) {
            $suit = $ckeck['func']();
            $return['data'][] = array(
                'name'   => $ckeck['msg'],
                'value'  => $suit ? 'Yes' : 'No',
                'result' => $suit,
            );
            $return['result'] = $return['result'] && $suit;
        }

        return $return;
    }

    /**
     * Execute a command and return it's output. Either wait until the command exits or the timeout has expired.
     *
     * @param string $cmd     Command to execute.
     * @param number $timeout Timeout in seconds.
     *
     * @throws \Exception
     *
     * @return string Output of the command.
     */
    private function exec($cmd, $timeout)
    {
        $descriptors = array(
            0 => array('pipe', 'r'), // stdin
            1 => array('pipe', 'w'), // stdout
            2 => array('pipe', 'w'),   // stderr
        );

        $process = proc_open('exec ' . $cmd, $descriptors, $pipes);

        if (!is_resource($process)) {
            throw new \Exception('Could not execute process');
        }

        stream_set_blocking($pipes[1], 0);

        $timeout = $timeout * 1000000;

        $buffer = '';

        while ($timeout > 0) {
            $start = microtime(true);

            $read = array($pipes[1]);
            $other = array();
            stream_select($read, $other, $other, 0, $timeout);

            $status = proc_get_status($process);

            $buffer .= stream_get_contents($pipes[1]);

            if (!$status['running']) {
                break;
            }

            $timeout -= (microtime(true) - $start) * 1000000;
        }

        $errors = stream_get_contents($pipes[2]);

        if (!empty($errors)) {
            return 0;
        }

        proc_terminate($process, 9);

        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);

        proc_close($process);

        return $buffer;
    }

    public function unregister()
    {
        $this->stop();
        $this->set_config(array(
            'is_registered' => 0,
            'key'           => '',
            'domain'        => '',
        ));
    }
    public function cronCheckStarted()
    {
        $is_started = $this->ci->pg_module->get_module_config('network', 'is_started');
        if ($is_started) {
            $this->start();
        } else {
            $this->stop();
        }
    }

    public static function filterData()
    {
        return filter_input_array(INPUT_POST, [
            'domain' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_FLAG_EMPTY_STRING_NULL
            ],
            'key' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_FLAG_EMPTY_STRING_NULL
             ],
            'is_upload_photos' => [
                'filter' => FILTER_VALIDATE_INT,
                'flags'  => FILTER_NULL_ON_FAILURE
            ],
            'site_type' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_REQUIRE_ARRAY
            ],
            'user_type' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_REQUIRE_ARRAY
            ],
            'orientation' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_REQUIRE_ARRAY
            ],
            'lang' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_REQUIRE_ARRAY
            ],
            'land' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_REQUIRE_ARRAY
            ],
            'country_code' => [
                'filter' => FILTER_SANITIZE_STRING,
                'flags'  => FILTER_REQUIRE_ARRAY
            ],
            'min_age' => [
                'filter' => FILTER_VALIDATE_INT,
                'flags'  => FILTER_NULL_ON_FAILURE
            ],
            'max_age' => [
                'filter' => FILTER_VALIDATE_INT,
                'flags'  => FILTER_NULL_ON_FAILURE
            ]
        ]);
    }

    public function __call($name, $args)
    {
        $methods = [
            'check_auth_data' => 'checkAuthData',
            'get_auth_data' => 'getAuthData',
            'get_config' => 'getConfig',
            'get_logs_dir' => 'getLogsDir',
            'get_status' => 'getStatus',
            'is_started' => 'isStarted',
            'is_started_fast' => 'isStartedFast',
            'is_started_slow' => 'isStartedSlow',
            'set_config' => 'setConfig',
            'start_fast' => 'startFast',
            'start_slow' => 'startSlow',
            'stop_fast' => 'stopFast',
            'stop_slow' => 'stopSlow',
            'validate_settings' => 'validateSettings',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
