<?php

namespace Pg\Libraries\Analytics\Integrations;

class Google
{
    const HOST = 'https://www.google-analytics.com/collect';
    
    /**
     *Google API key
     *
     * @var string
     */
    private $api_key;
    
    private $ci;
    
    private $cid;

    /**
     * Google construct
     *
     * @return Google
     */
    public function __construct($api_key)
    {
        $this->ci = &get_instance();
        
        $this->api_key = $api_key;
        
        $this->cid = $this->gaParseCookie();
    }
    
    private function gaParseCookie() 
    { 
        if (isset($_COOKIE['_ga'])) { 
            list($version,$domainDepth, $cid1, $cid2) = preg_split('/[\.]/', $_COOKIE["_ga"], 4); 
            return $cid1 . '.' . $cid2;
        } else {
            return '';
        }
    }

    /**
     * Track
     *
     * @param type $event
     */
    public function track($event, $data=[])
    {
        $this->sendEvent($event, $data);
    }

    /**
     * Send event
     *
     * @param type $event
     */
    public function sendEvent($event, $data=[])
    {
        if (!$this->cid) {
            return;
        }
             
        try {
            $this->ci->analytics->getClient()->request('POST', self::HOST, [
                'headers' => [
                    'User-Agent' => $this->ci->agent->agent,
                ],
                'form_params' => [
                    'v' => '1',
                    't' => 'event',
                    'tid' => $this->api_key,
                    'cid' => $this->cid,
                    'uip' => $this->ci->input->server('REMOTE_ADDR'),
                    'ua' => $this->ci->agent->agent,
                    'ec' => $data['category'],
                    'ea' => !empty($data['action']) ? $data['action'] : $event,
                    'el' => !empty($data['label']) ? $data['label'] : $this->ci->analytics->getEventType(),
                    'ev' => !empty($data['value']) ? $data['value'] : '',
                ],
            ]);
        } catch (\Exception $e) {
        }
    }

    /**
     * Get API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }
    
    public function __call($name, $args)
    {
        if (!$this->api_key) {
            return;
        }

        return call_user_func_array([$this, $name], $args);
    }
}
