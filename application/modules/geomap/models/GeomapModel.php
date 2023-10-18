<?php

namespace Pg\modules\geomap\models;

define('GEOMAPS_DRIVERS_TABLE', DB_PREFIX . 'geomap_drivers');

/**
 * Geomaps main model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 */
class GeomapModel extends \Model
{
    private $attrs = array('id', 'gid', 'regkey', 'need_regkey', 'link',
        'date_add', 'date_modified', 'status',);
    private $driver_cache = array();
    private $default_driver_gid = '';
    private $default_view_settings = array(
        "width"         => "500",
        "height"        => "300",
        "class"         => "",
        'zoom_listener' => "",
        'type_listener' => "",
        'drag_listener' => "",
        'lang'          => "en",
    );
    public $geomap_map_type_js_loaded = false;

    /**
     * Constructor
     *
     * @return
     */
    public function __construct()
    {
        parent::__construct();

        $this->get_default_driver();
    }

    public function getDriverByGid($gid)
    {
        if (empty($this->driver_cache[$gid])) {
            $this->ci->db->select(implode(", ", $this->attrs))->from(GEOMAPS_DRIVERS_TABLE)->where("gid", $gid);
            $results = $this->ci->db->get()->result_array();
            if (!empty($results) && is_array($results)) {
                $this->driver_cache[$gid] = $this->format_driver($results[0]);
            }
        }

        return $this->driver_cache[$gid];
    }

    public function getDefaultDriver()
    {
        if (!empty($this->default_driver_gid)) {
            return $this->get_driver_by_gid($this->default_driver_gid);
        }

        $this->ci->db->select(implode(", ", $this->attrs))->from(GEOMAPS_DRIVERS_TABLE)->where("status", "1")->limit(1);
        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            $this->default_driver_gid = $results[0]["gid"];
            $this->driver_cache[$this->default_driver_gid] = $this->format_driver($results[0]);

            return $this->driver_cache[$this->default_driver_gid];
        }

        return array();
    }

    public function getDefaultDriverGid()
    {
        return $this->default_driver_gid;
    }

    public function formatDriver($data)
    {
        $data["name"] = l('driver_name_' . $data["gid"], 'geomap');

        return $data;
    }

    public function setDefaultDriver($gid)
    {
        $this->driver_cache = array();
        $this->default_driver_gid = $gid;

        $data["status"] = 0;
        $this->ci->db->update(GEOMAPS_DRIVERS_TABLE, $data);

        $data["status"] = 1;
        $this->ci->db->where('gid', $gid);
        $this->ci->db->update(GEOMAPS_DRIVERS_TABLE, $data);

        return;
    }

    public function getDrivers()
    {
        $data = array();
        $this->ci->db->select(implode(", ", $this->attrs))->from(GEOMAPS_DRIVERS_TABLE);
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $data[] = $this->format_driver($result);
            }
        }

        return $data;
    }

    public function setDriver($gid, $data)
    {
        if (is_null($gid)) {
            $data["date_add"] = $data["date_modified"] = date("Y-m-d H:i:s");
            if (!isset($attrs["status"])) {
                $data["status"] = 0;
            }
            $this->ci->db->insert(GEOMAPS_DRIVERS_TABLE, $data);
        } else {
            $data["date_modified"] = date("Y-m-d H:i:s");
            $this->ci->db->where('gid', $gid);
            $this->ci->db->update(GEOMAPS_DRIVERS_TABLE, $data);
            unset($this->driver_cache[$gid]);
        }

        return;
    }

    public function validateDriver($gid, $data)
    {
        $return = array("errors" => array(), "data" => array());

        if (isset($data["regkey"])) {
            $return["data"]["regkey"] = trim(strip_tags($data["regkey"]));
        }

        return $return;
    }

    public function deleteDriver($id)
    {
    }

    public function createDefaultMap($id_user = 0, $id_object = 0, $gid = "", $markers = array(), $view_settings = array(), $only_load_scripts = false, $only_load_content = false, $map_id = false)
    {
        return $this->createMap($this->default_driver_gid, $id_user, $id_object, $gid, $markers, $view_settings, $only_load_scripts, $only_load_content, $map_id);
    }

    public function createMap($map_type, $id_user = 0, $id_object = 0, $gid = "", $markers = array(), $view_settings = array(), $only_load_scripts = false, $only_load_content = false, $map_id = false)
    {
        $this->ci->load->model("geomap/models/Geomap_settings_model");
        $driver_settings = $this->get_driver_by_gid($map_type);
        if (empty($driver_settings)) {
            return "";
        }

        $this->ci->view->assign('geomap_js_loaded', $this->geomap_map_type_js_loaded);
        $this->geomap_map_type_js_loaded = true;

        $this->ci->view->assign('only_load_scripts', $only_load_scripts);
        $this->ci->view->assign('only_load_content', $only_load_content);

        $settings = $this->ci->Geomap_settings_model->get_parsed_settings($map_type, $id_user, $id_object, $gid);
        if (empty($view_settings)) {
            $view_settings = $this->default_view_settings;
        }
        $view_settings["rand"] = rand(10000, 99999);

        $model_name = ucfirst(strtolower($map_type)) . "_model";
        $this->ci->load->model("geomap/models/" . $model_name, $model_name);

        return $this->ci->{$model_name}->create_html($driver_settings["regkey"], $settings, $view_settings, $markers, $map_id);
    }

    public function updateDefaultMap($map_id, $markers = array(), $settings = array())
    {
        return $this->update_map($this->default_driver_gid, $map_id, $markers, $settings);
    }

    public function updateMap($map_type, $map_id, $markers = array(), $settings = array())
    {
        $driver_settings = $this->get_driver_by_gid($map_type);
        if (empty($driver_settings)) {
            return "";
        }

        $model_name = ucfirst(strtolower($map_type)) . "_model";
        $this->ci->load->model("geomap/models/" . $model_name, $model_name);

        return $this->ci->{$model_name}->update_html($map_id, $markers, $settings);
    }

    public function dynamicBlockMapExample($params, $view = '')
    {
        $markers[] = array("gid" => 'test', "lat" => $params["lat"], "lon" => $params["lon"], "html" => $params["text"], "dragging" => false);

        return $this->create_default_map(0, 'example', $markers);
    }

    public function createDefaultGeocoder()
    {
        return $this->create_geocoder($this->default_driver_gid);
    }

    public function createGeocoder($map_type)
    {
        $driver_settings = $this->get_driver_by_gid($map_type);
        if (empty($driver_settings) /* || ($driver_settings["need_regkey"] && empty($driver_settings["regkey"])) */) {
            return "";
        }

        static $geomap_geocoder_js_loaded = false;
        if ($geomap_geocoder_js_loaded) {
            return '';
        }
        $geomap_geocoder_js_loaded = true;

        $this->ci->view->assign('geomap_js_loaded', $this->geomap_map_type_js_loaded);
        $this->geomap_map_type_js_loaded = true;

        $model_name = ucfirst(strtolower($map_type)) . "_model";
        $this->ci->load->model("geomap/models/" . $model_name, $model_name);

        return $this->ci->{$model_name}->create_geocoder($driver_settings["regkey"]);
    }

    public function getCoordinates($location)
    {
        $driver_settings = $this->get_default_driver();
        $model_name = 'bingmapsv7_model';
        $this->ci->load->model('geomap/models/' . $model_name, $model_name);
        return $this->ci->{$model_name}->get_coordinates($location, $driver_settings["regkey"]);
    }

    public function __call($name, $args)
    {
        $methods = [
            '_dynamic_block_map_example' => 'dynamicBlockMapExample',
            'create_default_geocoder' => 'createDefaultGeocoder',
            'create_default_map' => 'createDefaultMap',
            'create_geocoder' => 'createGeocoder',
            'create_map' => 'createMap',
            'format_driver' => 'formatDriver',
            'get_coordinates' => 'getCoordinates',
            'get_default_driver' => 'getDefaultDriver',
            'get_default_driver_gid' => 'getDefaultDriverGid',
            'get_driver_by_gid' => 'getDriverByGid',
            'get_drivers' => 'getDrivers',
            'set_default_driver' => 'setDefaultDriver',
            'set_driver' => 'setDriver',
            'update_default_map' => 'updateDefaultMap',
            'update_map' => 'updateMap',
            'validate_driver' => 'validateDriver',
            'delete_driver' => 'deleteDriver',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
