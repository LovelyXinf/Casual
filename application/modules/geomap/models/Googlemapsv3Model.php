<?php

namespace Pg\modules\geomap\models;

/**
 * Google maps driver model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 */
class Googlemapsv3Model extends \Model
{
    private $geocode_url = 'http://maps.google.com/maps/api/geocode/json?';

    public function createHtml($key, $settings, $view_settings, $markers = array(), $map_id = false)
    {
        $amenities = $this->ci->pg_language->ds->get_reference(
            'geomap', 'amenities_googlemapsv3', $this->ci->pg_language->current_lang_id
        );
        $settings['amenities_names'] = $amenities['option'];
        $this->ci->view->assign('map_reg_key', $key);
        $this->ci->view->assign('settings', $settings);
        $this->ci->view->assign('view_settings', $view_settings);
        $this->ci->view->assign('markers', $markers);
        $this->ci->view->assign('map_id', $map_id);
        $this->ci->view->assign('rand', rand(100000, 999999));

        return $this->ci->view->fetch('googlemapsv3_html', null, 'geomap');
    }

    public function updateHtml($map_id, $markers = array(), $settings)
    {
        $this->ci->view->assign('map_id', $map_id);
        $this->ci->view->assign('markers', $markers);
        $this->ci->view->assign('view_settings', $settings);

        return $this->ci->view->fetch('googlemapsv3_update', null, 'geomap');
    }

    public function createGeocoder($key)
    {
        return $this->ci->view->fetch('googlemapsv3_geocoder', null, 'geomap');
    }

    public function getCoordinates($location, $key)
    {
        $data = array(
            'sensor'  => false,
            'address' => $location,
        );

        $url = $this->geocode_url . http_build_query($data);
        $response = json_decode(file_get_contents($url), true);

        if (isset($response['results'][0]['geometry']['location'])) {
            $coordinates['lat'] = $response['results'][0]['geometry']['location']['lat'];
            $coordinates['lon'] = $response['results'][0]['geometry']['location']['lng'];

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
