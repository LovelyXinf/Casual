<?php

namespace Pg\modules\geomap\models;

class Yandexmapsv2Model extends \Model
{
    protected $ci;

    private $geocode_url = 'https://geocode-maps.yandex.ru/1.x/?';

    public function createHtml($key, $settings, $view_settings, $markers = array(), $map_id = false)
    {
        $this->ci->view->assign('map_reg_key', $key);
        $this->ci->view->assign('settings', $settings);
        $this->ci->view->assign('view_settings', $view_settings);
        $this->ci->view->assign('markers', $markers);
        $this->ci->view->assign('map_id', $map_id);
        $this->ci->view->assign('rand', rand(100000, 999999));

        return $this->ci->view->fetch('yandexmapsv2_html', null, 'geomap');
    }

    public function updateHtml($map_id, $markers = array())
    {
        $this->ci->view->assign('map_id', $map_id);
        $this->ci->view->assign('markers', $markers);

        return $this->ci->view->fetch('yandexmapsv2_update', null, 'geomap');
    }

    public function createGeocoder($key)
    {
        return $this->ci->view->fetch('yandexmapsv2_geocoder', null, 'geomap');
    }

    public function getCoordinates($location, $key)
    {
        $data = array(
            'geocode' => $location,
            'format'  => 'json',
            'results' => 1,
        );

        $url = $this->geocode_url . http_build_query($data);
        $response = json_decode(file_get_contents($url));

        if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0) {
            $coord_array = explode(' ', $response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos);
            $coordinates['lat'] = $coord_array[1];
            $coordinates['lon'] = $coord_array[0];

            return $coordinates;
        }
    }

    public function __call($name, $args)
    {
        $methods = [
            'create_geocoder' => 'createGeocoder',
            'create_html' => 'createHtml',
            'get_coordinates' => 'getCoordinates',
            'update_html' => 'updateHtml',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
