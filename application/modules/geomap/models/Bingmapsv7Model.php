<?php

namespace Pg\modules\geomap\models;

class Bingmapsv7Model extends \Model
{
    private $geocode_url = 'http://dev.virtualearth.net/REST/v1/Locations?';

    public function createHtml($key, $settings, $view_settings, $markers = array(), $map_id = false)
    {
        $this->ci->view->assign('map_reg_key', $key);
        $this->ci->view->assign('settings', $settings);
        $this->ci->view->assign('view_settings', $view_settings);
        $this->ci->view->assign('markers', $markers);
        $this->ci->view->assign('map_id', $map_id);
        $this->ci->view->assign('rand', rand(100000, 999999));

        return $this->ci->view->fetch('bingmapsv7_html', null, 'geomap');
    }

    public function updateHtml($map_id, $markers = array())
    {
        $this->ci->view->assign('map_id', $map_id);
        $this->ci->view->assign('markers', $markers);

        return $this->ci->view->fetch('bingmapsv7_update', null, 'geomap');
    }

    public function createGeocoder($key)
    {
        return $this->ci->view->fetch('bingmapsv7_geocoder', null, 'geomap');
    }

    public function getCoordinates($location, $key)
    {
        $url = $this->geocode_url . 'query=' . urlencode($location) . '&maxResults=1&output=json&jsonp=?&key=' . $key;
        $response = json_decode(file_get_contents($url));

        if (isset($response['resourceSets'][0]['resources'][0]['point']['coordinates'])) {
            $coordinates['lat'] = $response['resourceSets'][0]['resources'][0]['point']['coordinates'][0];
            $coordinates['lon'] = $response['resourceSets'][0]['resources'][0]['point']['coordinates'][1];

            return $coordinates;
        }
    }

    public function __call($name, $args)
    {
        $methods = [
            'create_geocoder' => 'createGeocoder',
            'create_html' => 'createHtml',
            'create_geocoder' => 'createGeocoder',
            'get_coordinates' => 'getCoordinates',
            'update_html' => 'updateHtml',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
