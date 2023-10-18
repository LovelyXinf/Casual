<?php

namespace Pg\modules\uploads\models;

use Pg\libraries\Cache\Manager as CacheManager;

if (!defined('UPLOADS_TABLE')) {
    define('UPLOADS_TABLE', DB_PREFIX . 'uploads');
}

if (!defined('UPLOADS_THUMB_TABLE')) {
    define('UPLOADS_THUMB_TABLE', DB_PREFIX . 'uploads_thumb');
}

if (!defined('UPLOADS_WATERMARK_TABLE')) {
    define('UPLOADS_WATERMARK_TABLE', DB_PREFIX . 'uploads_watermark');
}

/**
 * Upload config model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 *
 * @version $Revision: 2 $ $Date: 2010-04-02 15:07:07 +0300 (Ср, 02 апр 2010) $ $Author: kkashkova $
 */
class UploadsConfigModel extends \Model
{
    public $fields_all = array(
        'id',
        'gid',
        'name',
        'min_height',
        'min_width',
        'max_height',
        'max_width',
        'max_size',
        'name_format',
        'file_formats',
        'default_img',
        'date_add',
    );

    public $watermark_fields_all = array(
        'id',
        'gid',
        'name',
        'wm_type',
        'img',
        'font_text',
        'font_color',
        'shadow_color',
        'shadow_distance',
        'font_face',
        'font_size',
        'position_hor',
        'position_ver',
        'alpha',
        'date_add',
    );

    public $thumb_fields_all = array(
        'id',
        'config_id',
        'prefix',
        'width',
        'height',
        'effect',
        'watermark_id',
        'crop_param',
        'crop_color',
        'animation',
        'delay',
        'loops',
        'disposal',
        'transparent_color',
        'rotation_angle',
        'date_add',
    );

    public $default_watermark = array(
        'wm_type'         => 'text',
        'font_color'      => 'ffffff',
        'shadow_color'    => '777777',
        'shadow_distance' => '3',
        'font_face'       => 'arial',
        'font_size'       => '16',
        'position_hor'    => 'left',
        'position_ver'    => 'top',
        'alpha'           => 100,
        'font_text'       => 'Test string',
    );

    public $wm_text_limits = array(
        'min_font_size'       => 9,
        'max_font_size'       => 90,
        'min_shadow_distance' => 0,
        'max_shadow_distance' => 20,
    );

    public $file_formats = array("jpg", 'jpeg', 'gif', 'png');

    public $watermark_path = "";
    public $watermark_url = "";

    public $default_path = "";
    public $default_url = "";

    public $watermark_test_image = "watermark_test.jpg";

    public $fonts_folder = '';
    
    private $uploads_all = null;
    private $thumbs_all = null;

    /**
     * Constructor
     *
     * @return Uploads object
     */
    public function __construct()
    {
        parent::__construct();

        $this->watermark_path = SITE_PHYSICAL_PATH . UPLOAD_DIR . "watermark/";
        $this->watermark_url = SITE_VIRTUAL_PATH . UPLOAD_DIR . "watermark/";
        $this->default_path = SITE_PHYSICAL_PATH . UPLOAD_DIR . "default/";
        $this->default_url = SITE_VIRTUAL_PATH . UPLOAD_DIR . "default/";
        $this->fonts_folder = BASEPATH . "fonts/";

        // TODO: cache
        $this->ci->cache->registerService('uploads', CacheManager::PROVIDER_REDIS);
        $this->ci->cache->registerService('uploads_thumb', CacheManager::PROVIDER_REDIS);
        $this->ci->cache->registerService('uploads_watermark', CacheManager::PROVIDER_REDIS);
    }

    private function getAllConfigs()
    {
        if ($this->uploads_all === null) {
            $fields = $this->fields_all;

            $this->uploads_all = $this->ci->cache->get('uploads', 'all', function () use ($fields)
            {
                $ci = &get_instance();

                $results_raw = $ci->db->select(implode(", ", $fields))
                    ->from(UPLOADS_TABLE)
                    ->order_by('gid ASC')
                    ->get()->result_array();

                if (empty($results_raw) || !is_array($results_raw)) {
                    return [];
                }

                return $results_raw;
            });
        } 
        return $this->uploads_all;
    }

    public function getConfigById($config_id)
    {
        $configs_raw = $this->getAllConfigs();

        foreach ($configs_raw as $config_raw) {
            if ($config_raw["id"] == $config_id) {
                return $config_raw;
            }
        }

        return false;
    }

    public function getConfigByGid($config_gid)
    {
        $configs_raw = $this->getAllConfigs();

        foreach ($configs_raw as $config_raw) {
            if ($config_raw["gid"] == $config_gid) {
                return $config_raw;
            }
        }

        return false;
    }

    public function getConfigList()
    {
        return $this->formatConfigs($this->getAllConfigs());

    }

    public function getConfigCount()
    {
        return count($this->getAllConfigs());
    }

    public function saveConfig($config_id, $data)
    {
        if (is_null($config_id)) {
            $data["date_add"] = date("Y-m-d H:i:s");
            $this->ci->db->insert(UPLOADS_TABLE, $data);
            $config_id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $config_id);
            $this->ci->db->update(UPLOADS_TABLE, $data);
        }

        if (!empty($data["default_img"])) {
            $this->ci->load->model('Uploads_model');
            $thumbs_data = $this->get_config_thumbs($config_id);
            if (!empty($thumbs_data)) {
                $this->ci->Uploads_model->create_default($data["default_img"], $this->default_path, $thumbs_data);
            }
        }

        // TODO: cache
        $this->ci->cache->flush('uploads');

        $this->uploads_all = null;

        return $config_id;
    }

    public function deleteConfig($config_id)
    {
        $data = $this->get_config_by_id($config_id);
        if (empty($data)) {
            return false;
        }

        $data = $this->format_config($data);
        /*if(!empty($data["default_img_path"]) && file_exists($data["default_img_path"])){
            unlink($data["default_img_path"]);
        }*/
        $this->ci->db->where('id', $config_id);
        $this->ci->db->delete(UPLOADS_TABLE);

        if (!empty($data["default_img"])) {
            $thumbs = $this->get_config_thumbs($config_id);
            if (!empty($thumbs)) {
                foreach ($thumbs as $thumb) {
                    if (file_exists($this->default_path . $thumb["prefix"] . '-' . $data["default_img"])) {
                        unlink($this->default_path . $thumb["prefix"] . '-' . $data["default_img"]);
                    }
                    if (file_exists($this->default_path . $thumb["prefix"] . '-animation-' . $data["default_img"])) {
                        unlink($this->default_path . $thumb["prefix"] . '-animation-' . $data["default_img"]);
                    }
                    $this->delete_thumb($thumb["id"]);
                }

                // TODO: cache
                $this->ci->cache->flush('uploads_thumb');
                
                $this->thumbs_all = null;
            }
        }

        // TODO: cache
        $this->ci->cache->flush('uploads');
        
        $this->uploads_all = null;
    }

    public function validateConfig($config_id = null, $data = array())
    {
        $return = array("errors" => array(), "data" => array());

        if (isset($data["name"])) {
            $return["data"]["name"] = strip_tags($data["name"]);
            if (empty($return["data"]["name"])) {
                $return["errors"][] = l('error_title_invalid', 'uploads');
            }
        }

        if (isset($data["gid"])) {
            $return["data"]["gid"] = strip_tags($data["gid"]);
            $return["data"]["gid"] = preg_replace("/[\n\t\s]{1,}/", "-", trim($return["data"]["gid"]));
            if (empty($return["data"]["gid"])) {
                $return["errors"][] = l('error_gid_invalid', 'uploads');
            }
        } elseif (!$config_id) {
            $return["errors"][] = l('error_gid_invalid', 'uploads');
        }

        if (isset($data["min_width"])) {
            $return["data"]["min_width"] = intval($data["min_width"]);
        }

        if (isset($data["min_height"])) {
            $return["data"]["min_height"] = intval($data["min_height"]);
        }

        if (isset($data["max_width"])) {
            $return["data"]["max_width"] = intval($data["max_width"]);
        }

        if (isset($data["max_height"])) {
            $return["data"]["max_height"] = intval($data["max_height"]);
        }

        if (isset($data["max_size"])) {
            $return["data"]["max_size"] = intval($data["max_size"]);
            if (!$return["data"]["max_size"]) {
                $return["errors"][] = l('error_max_size', 'uploads');
            }
        }

        if (isset($data["name_format"])) {
            $return["data"]["name_format"] = $data["name_format"];
        }

        if (isset($data["file_formats"])) {
            if (!is_array($data["file_formats"])) {
                $return["errors"][] = l('error_empty_file_formats', 'uploads');
            } else {
                $return["data"]["file_formats"] = serialize($data["file_formats"]);
            }
        }

        if (isset($data["default_img"]) && is_array($data["default_img"]) && is_uploaded_file($data["default_img"]["tmp_name"])) {
            $this->ci->load->helper('upload');
            $config = array('allowed_types' => 'gif|jpg|jpeg|png');
            $img_return = upload_file('default_img', $this->default_path, $config);
            if (!empty($img_return["error"])) {
                foreach ($img_return["error"] as $imgError) {
                    $return["errors"][] = $imgError;
                }
                $img_name = "";
            } else {
                $old_name = $img_return["data"]["file_name"];
                $new_name = "default_" . $return["data"]["gid"] . $img_return["data"]["file_ext"];
                $rename = rename_file($img_return["data"]["file_path"] . $old_name, $img_return["data"]["file_path"] . $new_name);
                $img_name = ($rename) ? $new_name : $old_name;
            }
            $return["data"]["default_img"] = $img_name;
        }

        return $return;
    }

    public function formatConfig($config_raw)
    {
        $configs = $this->formatConfigs([$config_raw]);
        return $configs[0];
    }

    public function formatConfigs($configs_raw)
    {
        $this->ci->load->helper('upload');

        foreach ($configs_raw as &$config_raw) {
            if (!empty($config_raw["default_img"])) {
                $config_raw["default_url"] = $this->default_url;
                $config_raw["default_path"] = $this->default_path;
                $config_raw["default_img_path"] = $this->default_path . $config_raw["default_img"];
                $config_raw["default_img_url"] = $this->default_url . $config_raw["default_img"];
            }
            if (!empty($config_raw["file_formats"])) {
                $config_raw["file_formats"] = unserialize($config_raw["file_formats"]);
                if (!empty($config_raw["file_formats"])) {
                    foreach ($config_raw["file_formats"] as $format) {
                        $config_raw["enable_formats"][$format] = 1;
                    }
                    $config_raw['allowed_mimes'] = get_mimes_types_by_files_types($config_raw["file_formats"]);
                }
                $config_raw["file_formats_str"] = implode("|", $config_raw["file_formats"]);
            } else {
                $config_raw["file_formats_str"] = "";
            }
        }

        return $configs_raw;
    }

    private function getAllThumbs()
    {
        if ($this->thumbs_all === null) {
            $fields = $this->thumb_fields_all;

            $this->thumbs_all = $this->ci->cache->get('uploads_thumb', 'all', function () use ($fields)
            {
                $ci = &get_instance();

                $results_raw = $ci->db->select(implode(", ", $fields))
                    ->from(UPLOADS_THUMB_TABLE)
                    ->order_by('id ASC')
                    ->get()->result_array();

                if (empty($results_raw) || !is_array($results_raw)) {
                    return [];
                }

                return $results_raw;
            });
        }
        return $this->thumbs_all;
    }

    public function getThumbById($thumb_id)
    {
        // $thumbs_raw = $this->getAllThumbs();

        // foreach ($thumbs_raw as $thumb_raw) {
        //     if ($thumb_raw['id'] == $thumb_id) {
        //         return $thumb_raw;
        //     }
        // }

        // return false;

        $result = $this->ci->db->select(implode(", ", $this->thumb_fields_all))->from(UPLOADS_THUMB_TABLE)->where("id", $thumb_id)->get()->result_array();
        if (!empty($result)) {
            return $result[0];
        } else {
            return false;    
        }
                
    }

    public function getConfigThumbs($config_id)
    {
        $thumbs_raw = $this->getAllThumbs();

        foreach ($thumbs_raw as $index => $thumb_raw) {
            if ($thumb_raw['config_id'] != $config_id) {
                unset($thumbs_raw[$index]);
            }
        }

        return $this->formatThumbs($thumbs_raw);
    }

    public function saveThumb($thumb_id, $data)
    {
        if (is_null($thumb_id)) {
            $data["date_add"] = date("Y-m-d H:i:s");
            $this->ci->db->insert(UPLOADS_THUMB_TABLE, $data);
            $thumb_id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $thumb_id);
            $this->ci->db->update(UPLOADS_THUMB_TABLE, $data);
        }

        $this->ci->load->model('Uploads_model');
        $thumb_data = $this->format_thumb($this->get_thumb_by_id($thumb_id));
        $config_data = $this->get_config_by_id($thumb_data['config_id']);

        if ($config_data["default_img"]) {
            $thumb_file = $this->default_path . $thumb_data["prefix"] . '-' . $config_data["default_img"];
            if (file_exists($thumb_file)) {
                unlink($thumb_file);
            }
            copy($this->default_path . $config_data["default_img"], $thumb_file);
            $this->ci->Uploads_model->action($thumb_file, $thumb_data);
        }

        // TODO: cache
        $this->ci->cache->flush('uploads_thumb');
        
        $this->thumbs_all = null;

        return $thumb_id;
    }

    public function deleteThumb($thumb_id)
    {
        $thumb_data = $this->get_thumb_by_id($thumb_id);
        if (empty($thumb_data)) {
            return false;
        }

        $config_data = $this->get_config_by_id($thumb_data["config_id"]);
        $config_data = $this->format_config($config_data);

        if (!empty($config_data["default_img"]) && file_exists($this->default_path . $thumb_data["prefix"] . '-' . $config_data["default_img"])) {
            unlink($this->default_path . $thumb_data["prefix"] . '-' . $config_data["default_img"]);
        }

        $this->ci->db->where('id', $thumb_id);
        $this->ci->db->delete(UPLOADS_THUMB_TABLE);

        // TODO: cache
        $this->ci->cache->flush('uploads_thumb');
        
        $this->thumbs_all = null;
    }

    public function validateThumb($thumb_id = null, $data = array())
    {
        $return = array("errors" => array(), "data" => array());

        if (isset($data["prefix"])) {
            $return["data"]["prefix"] = strip_tags($data["prefix"]);
            if (empty($return["data"]["prefix"])) {
                $return["errors"][] = l('error_prefix_invalid', 'uploads');
            }
        }

        if (isset($data["width"])) {
            $return["data"]["width"] = intval($data["width"]);
            if ($return["data"]["width"] < 1) {
                $return["errors"][] = l('error_width_invalid', 'uploads');
            }
        }

        if (isset($data["height"])) {
            $return["data"]["height"] = intval($data["height"]);
            if ($return["data"]["height"] < 1) {
                $return["errors"][] = l('error_height_invalid', 'uploads');
            }
        }

        if (isset($data["watermark_id"])) {
            $return["data"]["watermark_id"] = intval($data["watermark_id"]);
        }

        if (isset($data["config_id"])) {
            $return["data"]["config_id"] = intval($data["config_id"]);
        }

        if (isset($data["effect"])) {
            $return["data"]["effect"] = $data["effect"];
        }

        if (isset($data["crop_param"])) {
            $return["data"]["crop_param"] = $data["crop_param"];
        }

        if (isset($data["crop_color"])) {
            $return["data"]["crop_color"] = $data["crop_color"];
            if (empty($return["data"]["height"])) {
                $return["data"]["crop_color"] = "ffffff";
            }
        }

        if (isset($data["animation"])) {
            $return["data"]["animation"] = $data["animation"] ? 1 : 0;
        }

        if (isset($data["delay"])) {
            $return["data"]["delay"] = intval($data["delay"]);
            if ($return["data"]["delay"] < 0) {
                $return["errors"][] = l('error_delay_invalid', 'uploads');
            }
        }

        if (isset($data["loops"])) {
            $return["data"]["loops"] = intval($data["loops"]);
            if ($return["data"]["loops"] < 0) {
                $return["errors"][] = l('error_loops_invalid', 'uploads');
            }
        }

        if (isset($data["disposal"])) {
            $return["data"]["disposal"] = intval($data["disposal"]);
            if ($return["data"]["disposal"] < 0) {
                $return["errors"][] = l('error_disposal_invalid', 'uploads');
            }
        }

        if (isset($data["transparent_color"])) {
            $return["data"]["transparent_color"] = $data["transparent_color"];
        }

        return $return;
    }

    public function formatThumb($thumb_raw)
    {
        $thumbs = $this->formatThumbs([$thumb_raw]);
        return $thumbs[0];
    }

    public function formatThumbs($thumbs_raw)
    {
        foreach ($thumbs_raw as &$thumb_raw) {
            if (empty($thumb_raw["crop_color"])) {
                $thumb_raw["crop_color"] = "ffffff";
            }
            if (empty($thumb_raw["crop_param"])) {
                $thumb_raw["crop_param"] = 'resize';
            }
            if (empty($thumb_raw["transparent_color"])) {
                $thumb_raw["transparent_color"] = 'ffffff';
            }
        }

        return $thumbs_raw;
    }

    public function getWatermarkById($wm_id)
    {
        $data = array();
        $result = $this->ci->db->select(implode(", ", $this->watermark_fields_all))->from(UPLOADS_WATERMARK_TABLE)->where("id", $wm_id)->get()->result_array();
        if (!empty($result)) {
            $data = $result[0];
        }

        return $data;
    }

    public function getWatermarkByGid($wm_gid)
    {
        $data = array();
        $result = $this->ci->db->select(implode(", ", $this->watermark_fields_all))->from(UPLOADS_WATERMARK_TABLE)->where("gid", $wm_gid)->get()->result_array();
        if (!empty($result)) {
            $data = $result[0];
        }

        return $data;
    }

    public function formatWatermark($data)
    {
        if (empty($data["wm_type"])) {
            $data["wm_type"] = 'text';
        }
        if ($data["wm_type"] == 'img') {
            if (!empty($data["img"])) {
                $data["img_path"] = $this->watermark_path . $data["img"];
                $data["img_url"] = $this->watermark_url . $data["img"];
            } else {
                $data["wm_type"] == 'text';
            }
        }

        if ($data["wm_type"] == 'text') {
            if (empty($data["font_color"])) {
                $data["font_color"] = $this->default_watermark['font_color'];
            }

            if (empty($data["shadow_color"])) {
                $data["shadow_color"] = $this->default_watermark['shadow_color'];
            }

            if (!isset($data["shadow_distance"])) {
                $data["shadow_distance"] = $this->defaultWatermark['shadow_distance'];
            }

            if (empty($data["font_face"])) {
                $data["font_face"] = $this->default_watermark['font_face'];
            }

            if (empty($data["font_size"])) {
                $data["font_size"] = $this->default_watermark['font_size'];
            }

            if (empty($data["font_text"])) {
                $data["font_text"] = $this->default_watermark['font_text'];
            }
        }

        if (empty($data["alpha"])) {
            $data["alpha"] = $this->default_watermark['alpha'];
        }

        return $data;
    }

    public function getWatermarkList()
    {
        $data = array();
        $this->ci->db->select(implode(", ", $this->watermark_fields_all))->from(UPLOADS_WATERMARK_TABLE)->order_by('gid ASC');
        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            foreach ($results as $r) {
                $data[] = $this->format_watermark($r);
            }
        }

        return $data;
    }

    public function getWatermarkCount()
    {
        $this->ci->db->select(implode(", ", $this->watermark_fields_all))->from(UPLOADS_WATERMARK_TABLE);
        $result = $this->ci->db->get()->result();
        if (!empty($result)) {
            return intval($result[0]->cnt);
        } else {
            return 0;
        }
    }

    public function saveWatermark($wm_id, $data)
    {
        if (is_null($wm_id)) {
            $data["date_add"] = date("Y-m-d H:i:s");
            $this->ci->db->insert(UPLOADS_WATERMARK_TABLE, $data);
            $wm_id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $wm_id);
            $this->ci->db->update(UPLOADS_WATERMARK_TABLE, $data);
        }

        // TODO: cache
        $this->ci->cache->flush('uploads_watermark');

        return $wm_id;
    }

    public function deleteWatermark($wm_id)
    {
        $data = $this->get_watermark_by_id($wm_id);
        if (empty($data)) {
            return false;
        }

        $data = $this->format_watermark($data);
        if (!empty($data["img_path"])) {
            unlink($data["img_path"]);
        }
        $this->ci->db->where('id', $wm_id);
        $this->ci->db->delete(UPLOADS_WATERMARK_TABLE);

        $this->ci->db->where('watermark_id', $wm_id);
        $this->ci->db->update(UPLOADS_THUMB_TABLE, array('watermark_id' => 0));

        // TODO: cache
        $this->ci->cache->flush('uploads_watermark');
    }

    public function validateWatermark($wm_id = null, $data = array())
    {
        $return = array("errors" => array(), "data" => array());

        if (isset($data["name"])) {
            $return["data"]["name"] = strip_tags($data["name"]);
            if (empty($return["data"]["name"])) {
                $return["errors"][] = l('error_title_invalid', 'uploads');
            }
        }

        if (isset($data["gid"])) {
            $return["data"]["gid"] = strip_tags($data["gid"]);
            $return["data"]["gid"] = preg_replace("/[\n\t\s]{1,}/", "-", trim($return["data"]["gid"]));
            if (empty($return["data"]["gid"])) {
                $return["errors"][] = l('error_gid_invalid', 'uploads');
            }
        }

        if (isset($data["position_ver"])) {
            $return["data"]["position_ver"] = $data["position_ver"];
        }

        if (isset($data["position_hor"])) {
            $return["data"]["position_hor"] = $data["position_hor"];
        }

        if (isset($data["alpha"])) {
            $return["data"]["alpha"] = intval($data["alpha"]);
        }

        if (isset($data["wm_type"])) {
            $return["data"]["wm_type"] = $data["wm_type"];
        }

        if (isset($data["img"]) && is_array($data["img"]) && is_uploaded_file($data["img"]["tmp_name"])) {
            $this->ci->load->helper('upload');
            $config = array('allowed_types' => 'gif|jpg|jpeg|png');
            $img_return = upload_file('img', $this->watermark_path, $config);
            if (!empty($img_return["error"])) {
                foreach ($img_return["error"] as $imgError) {
                    $return["errors"][] = $imgError;
                }
                $img_name = "";
            } else {
                $old_name = $img_return["data"]["file_name"];
                $new_name = "wm_" . $return["data"]["gid"] . $img_return["data"]["file_ext"];
                $rename = rename_file($img_return["data"]["file_path"] . $old_name, $img_return["data"]["file_path"] . $new_name);
                $img_name = ($rename) ? $new_name : $old_name;
            }
            $return["data"]["img"] = $img_name;
        }

        if (isset($data["font_size"])) {
            $return["data"]["font_size"] = intval($data["font_size"]);
        }

        if (isset($data["shadow_distance"])) {
            $return["data"]["shadow_distance"] = intval($data["shadow_distance"]);
        }

        if (isset($data["font_color"])) {
            $return["data"]["font_color"] = $data["font_color"];
        }

        if (isset($data["shadow_color"])) {
            $return["data"]["shadow_color"] = $data["shadow_color"];
        }

        if (isset($data["font_face"])) {
            $return["data"]["font_face"] = $data["font_face"];
        }

        if (isset($data["font_text"])) {
            $return["data"]["font_text"] = strip_tags($data["font_text"]);
        }

        return $return;
    }

    public function __call($name, $args)
    {
        $methods = [
            'delete_config' => 'deleteConfig',
            'delete_thumb' => 'deleteThumb',
            'delete_watermark' => 'deleteWatermark',
            'format_config' => 'formatConfig',
            'format_thumb' => 'formatThumb',
            'format_watermark' => 'formatWatermark',
            'get_config_by_gid' => 'getConfigByGid',
            'get_config_by_id' => 'getConfigById',
            'get_config_count' => 'getConfigCount',
            'get_config_list' => 'getConfigList',
            'get_config_thumbs' => 'getConfigThumbs',
            'get_thumb_by_id' => 'getThumbById',
            'get_watermark_by_gid' => 'getWatermarkByGid',
            'get_watermark_by_id' => 'getWatermarkById',
            'get_watermark_count' => 'getWatermarkCount',
            'get_watermark_list' => 'getWatermarkList',
            'save_config' => 'saveConfig',
            'save_thumb' => 'saveThumb',
            'save_watermark' => 'saveWatermark',
            'validate_config' => 'validateConfig',
            'validate_thumb' => 'validateThumb',
            'validate_watermark' => 'validateWatermark',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
