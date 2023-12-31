<?php

namespace Pg\modules\geomap\models;

define('GEOMAPS_SETTINGS_TABLE', DB_PREFIX . 'geomap_settings');

/**
 * Geomaps settings model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 */
class GeomapSettingsModel extends \Model
{
    private $attrs = array('id', 'map_gid', 'id_user', 'id_object', 'gid', 'lat', 'lon', 'zoom', 'view_type', 'view_settings');
    private $default_settings = array(
        "lat"           => 0,
        "lon"           => 0,
        "zoom"          => 13,
        "view_type"     => 1,
        "view_settings" => array(),
    );
    public $module_gid = 'geomap';

    /**
     * Upload image for map marker
     *
     * @var string
     */
    public $upload_config_id = "map-marker-icon";

    public function getSettings($map_gid, $id_user, $id_object, $gid)
    {
        $this->ci->db->select(implode(", ", $this->attrs));
        $this->ci->db->from(GEOMAPS_SETTINGS_TABLE);
        $this->ci->db->where("map_gid", $map_gid);
        $this->ci->db->where("id_user", $id_user);
        $this->ci->db->where("id_object", $id_object);
        $this->ci->db->where("gid", $gid);
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return $this->format_settings($results[0]);
        } else {
            return false;
        }
    }

    public function getParsedSettings($map_gid, $id_user = 0, $id_object = 0, $gid = "")
    {
        $settings = array('lat' => 0, 'lon' => 0, 'zoom' => 0, 'view_type' => 0, 'view_settings' => array());
        $this->ci->db->select(implode(", ", $this->attrs))->from(GEOMAPS_SETTINGS_TABLE)->where("map_gid", $map_gid);
        if (!empty($id_user)) {
            $this->ci->db->where("(id_user='" . intval($id_user) . "' OR id_user='0')");
        } else {
            $this->ci->db->where("id_user", 0);
        }
        if (!empty($id_object)) {
            $this->ci->db->where("(id_object='" . intval($id_object) . "' OR id_object='0')");
        } else {
            $this->ci->db->where("id_object", 0);
        }
        if (!empty($gid)) {
            $this->ci->db->where("(gid='" . $gid . "' OR gid='')");
        } else {
            $this->ci->db->where("gid", "");
        }
        $this->ci->db->order_by("id_object ASC")->order_by("id_user ASC")->order_by("gid ASC");
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $result = $this->format_settings($result);

                if ($result['lat'] != 0 || $result['lon'] != 0) {
                    $settings['lat'] = $result['lat'];
                    $settings['lon'] = $result['lon'];
                }
                if ($result['zoom'] != 0) {
                    $settings['zoom'] = $result['zoom'];
                }
                if ($result['view_type'] != 0) {
                    $settings['view_type'] = $result['view_type'];
                }

                foreach ($this->attrs as $attr) {
                    if ($attr != 'view_settings') {
                        unset($result[$attr]);
                    }
                }

                $settings = array_merge($settings, $result);
            }
        } else {
            $settings = $this->default_settings;
        }

        return $settings;
    }

    public function saveSettings($map_gid, $id_user, $id_object, $gid, $data = array())
    {
        if ($this->is_settings_exists($map_gid, $id_user, $id_object, $gid)) {
            $this->ci->db->where('map_gid', $map_gid);
            $this->ci->db->where('id_user', $id_user);
            $this->ci->db->where('id_object', $id_object);
            $this->ci->db->where('gid', $gid);
            $this->ci->db->update(GEOMAPS_SETTINGS_TABLE, $data);
        } else {
            $data["map_gid"] = $map_gid;
            $data["id_user"] = $id_user;
            $data["id_object"] = $id_object;
            $data["gid"] = $gid;
            $this->ci->db->insert(GEOMAPS_SETTINGS_TABLE, $data);
        }

        return;
    }

    /**
     * Save map marker
     *
     * @param string $map_gid   map GUID
     * @param string $gid       page guid
     * @param string $file_name file name
     *
     * @return void
     */
    public function saveMarkerIcon($map_gid, $gid, $file_name)
    {
        if (empty($file_name) || !isset($_FILES[$file_name]) ||
            !is_array($_FILES[$file_name]) || !is_uploaded_file($_FILES[$file_name]["tmp_name"])) {
            return;
        }

        $this->ci->load->model("Uploads_model");
        $img_return = $this->ci->Uploads_model->upload($this->upload_config_id, $map_gid . ($gid ? '_' . $gid : '') . "/", $file_name);

        if (!empty($img_return["error"])) {
            return;
        }

        $settings = $this->get_parsed_settings($map_gid, 0, 0, $gid);
        $settings['marker_icon'] = $img_return['file'];
        unset($settings['id']);
        $validate_data = $this->ci->Geomap_settings_model->validate_settings($settings);
        $this->save_settings($map_gid, 0, 0, $gid, $validate_data['data']);
    }

    public function deleteSettings($map_gid, $id_user, $id_object, $gid)
    {
        $this->ci->db->where('map_gid', $map_gid);
        $this->ci->db->where('id_user', $id_user);
        $this->ci->db->where('id_object', $id_object);
        $this->ci->db->where('gid', $gid);
        $this->ci->db->delete(GEOMAPS_SETTINGS_TABLE);

        return;
    }

    /**
     * Remove map marker icon
     *
     * @param string $map_gid map GUID
     * @param string $gid     page GUID
     */
    public function deleteMarkerIcon($map_gid, $gid)
    {
        $this->ci->load->model("Uploads_model");
        $settings = $this->get_parsed_settings($map_gid, 0, 0, $gid);
        $this->ci->Uploads_model->delete_upload($this->upload_config_id, $map_gid . ($gid ? '_' . $gid : '') . "/", $settings["marker_icon"]);
        unset($settings['marker_icon']);
        unset($settings['id']);

        $validate_data = $this->ci->Geomap_settings_model->validate_settings($settings);
        $this->save_settings($map_gid, 0, 0, $gid, $validate_data['data']);
    }

    public function validateSettings($data)
    {
        $return = array("errors" => array(), "data" => array());

        if (isset($data["lat"])) {
            $return["data"]["lat"] = strval(floatval($data["lat"]));
            unset($data["lat"]);
        }

        if (isset($data["lon"])) {
            $return["data"]["lon"] = strval(floatval($data["lon"]));
            unset($data["lon"]);
        }

        if (isset($data["zoom"])) {
            $return["data"]["zoom"] = intval($data["zoom"]);
            unset($data["zoom"]);
        }

        if (isset($data["view_type"])) {
            $return["data"]["view_type"] = intval($data["view_type"]);
            unset($data["view_type"]);
        }

        $return["data"]["view_settings"] = serialize($data);

        return $return;
    }

    /**
     * Validate map marker icon
     *
     * @param string $file_name file name
     */
    public function validateMarkerIcon($file_name)
    {
        $return = array('errors' => array(), 'data' => array());
        if (isset($_FILES[$file_name]) && is_array($_FILES[$file_name]) && is_uploaded_file($_FILES[$file_name]["tmp_name"])) {
            $this->ci->load->model("Uploads_model");
            $validate_image = $this->ci->Uploads_model->validate_upload($this->upload_config_id, $file_name);
            if ($validate_image["error"]) {
                $return["errors"] = $validate_image["error"];
            }
        }

        return $return;
    }

    public function formatSettings($data)
    {
        $view_settings = $data["view_settings"] ? (array) unserialize($data["view_settings"]) : array();
        unset($data["view_settings"]);
        foreach ($view_settings as $name => $value) {
            $data[$name] = $value;
        }
        if (isset($data['marker_icon']) && !empty($data["marker_icon"])) {
            $this->ci->load->model('Uploads_model');
            $data["media"]["icon"] = $this->ci->Uploads_model->format_upload($this->upload_config_id, $data['map_gid'] . ($data['gid'] ? '_' . $data['gid'] : ''), $data["marker_icon"]);
        }

        return $data;
    }

    public function isSettingsExists($map_gid, $id_user, $id_object, $gid)
    {
        $this->ci->db->select("COUNT(*) AS cnt");
        $this->ci->db->from(GEOMAPS_SETTINGS_TABLE);
        $this->ci->db->where('map_gid', $map_gid);
        $this->ci->db->where('id_user', $id_user);
        $this->ci->db->where('id_object', $id_object);
        $this->ci->db->where('gid', $gid);
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results) && intval($results[0]["cnt"])) {
            return true;
        }

        return false;
    }

    /**
     * Return available maps
     */
    public function getMapsLists($map_gid)
    {
        $this->ci->db->select("gid");
        $this->ci->db->from(GEOMAPS_SETTINGS_TABLE);
        $this->ci->db->where('map_gid', $map_gid);
        $this->ci->db->where('id_user', 0);
        $this->ci->db->where('id_object', 0);
        $this->ci->db->where('gid !=', '');
        $results = $this->ci->db->get()->result_array();

        return $results;
    }

    /**
     * Update languages
     *
     * @param array $data
     * @param array $langs_file
     * @param array $langs_ids
     */
    public function updateLang($data, $langs_file, $langs_ids)
    {
        foreach ($data as $value) {
            $this->ci->pg_language->pages->set_string_langs('geomap', $value, $langs_file[$value], $langs_ids);
        }
    }

    /**
     * Export languages
     *
     * @param array $data
     * @param array $langs_ids
     */
    public function exportLang($data, $langs_ids)
    {
        $langs = array();

        return array_merge($langs, $this->ci->pg_language->export_langs("geomap", (array) $data, $langs_ids));
    }

    public function __call($name, $args)
    {
        $methods = [
            'delete_marker_icon' => 'deleteMarkerIcon',
            'delete_settings' => 'deleteSettings',
            'export_lang' => 'exportLang',
            'format_settings' => 'formatSettings',
            'get_maps_lists' => 'getMapsLists',
            'get_parsed_settings' => 'getParsedSettings',
            'get_settings' => 'getSettings',
            'is_settings_exists' => 'isSettingsExists',
            'save_marker_icon' => 'saveMarkerIcon',
            'save_settings' => 'saveSettings',
            'update_lang' => 'updateLang',
            'validate_marker_icon' => 'validateMarkerIcon',
            'validate_settings' => 'validateSettings',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
