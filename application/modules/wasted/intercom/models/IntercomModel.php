<?php

namespace Pg\modules\intercom\models;

/**
 * Intercom module as Marketing module
 *
 * @copyright	Copyright (c) 2000-2016
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class IntercomModel extends \Model
{
    /**
     * Module GID
     *
     * @var string
     */
    const MODULE_GID = 'intercom';

    /**
     * Intercom GID
     *
     * @var string
     */
    const INTERCOM = 'intercom';

    /**
     * Google analitics GID
     *
     * @var string
     */
    const GOOGLE = 'google';

    /**
     * Services list
     *
     * @var array
     */
    private static $services = [
        self::GOOGLE,
        self::INTERCOM
    ];

    /**
     * Services data
     *
     * @var array
     */
    private static $services_data = [
        self::GOOGLE => [
            'btn' => [
                'order' => 'https://marketplace.datingpro.com/information/contact/',
                'find_more' => 'https://www.google.com/analytics/'
            ]
        ],
         self::INTERCOM => [
             'gid' => 'intercom',
              'path' => 'application/modules/intercom/views/gentelella/intercom.html'
         ]
    ];

    /**
     * Class consctructor
     *
     * @return IntercomModel
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  All services
     *
     * @return array
     */
    public static function getServices()
    {
        return self::$services;
    }

    /**
     * Service data
     *
     * @param string $service
     *
     * @return array/boolean
     */
    public static function getData($service)
    {
        return self::$services_data[$service];
    }

    /**
     * Get SEO settings
     *
     * @param string $method
     *
     * @return array
     */
    public function getSeoSettings($method)
    {
        if (!empty($method)) {
            return $this->getSeoSettingsInternal($method);
        } else {
            return [
                'index' => $this->getSeoSettingsInternal('index')
            ];
        }
    }

    /**
     * SEO setings internal
     *
     * @param string $method
     *
     * @return array
     */
    private function getSeoSettingsInternal($method)
    {
        switch ($method) {
            case 'index':
                return [
                    "templates" => [],
                    "url_vars"  => [],
                ];
        }
    }

    /**
     * Transform seo values from query string to method parameters
     *
     * @param string $var_name_from variable name from url
     * @param string $var_name_to variable name to method
     * @param mixed $value parameter value
     * @return mixed
     */
    public function requestSeoRewrite($var_name_from, $var_name_to, $value)
    {
        if ($var_name_from == $var_name_to) {
            return $value;
        }
    }

}