<?php

namespace Pg\modules\geomap\models;

/**
 * Geomap install model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 */
class GeomapInstallModel extends \Model
{
    /**
     * Menu configuration
     *
     * @var array
     */
    private $menu = array(
        "admin_menu" => array(
            "action" => "none",
            "items"  => array(
                "interface-items" => array(
                    "action" => "none",
                    "items"  => array(
                        "geomap_menu_item" => array("action" => "create", "link" => "admin/geomap", "status" => 1, "sorter" => 2),
                    ),
                ),
                'system-items' => array(
                    "action" => "none",
                    "items"  => array(
                        "geomap_sys_menu_item" => array("action" => "create", "link" => "admin/geomap", "status" => 1, "sorter" => 4),
                    ),
                ),
            ),
        ),
    );

    /**
     * Uploads configuration
     *
     * @var array
     */
    private $uploads = array(
        array(
            "gid"          => "map-marker-icon",
            "name"         => "Map marker icon",
            "max_height"   => 300,
            "max_width"    => 300,
            "max_size"     => 500000,
            "name_format"  => "generate",
            "file_formats" => array("jpg", "gif", "png"),
            "default_img"  => "",
            "thumbs"       => array(
                "small" => array("width" => 20, "height" => 30, "effect" => "none", "crop_param" => "crop", "crop_color" => "ffffff"),
            ),
        ),
    );
    
    private $moderators_methods = array(
        array('module' => 'geomap', 'method' => 'index', 'is_default' => 1, 'group_id' => 2, 'is_hidden' => 0, 'parent_module' => '')
    ); 
    

    /**
     * Constructor
     *
     * @return Install object
     */
    public function __construct()
    {
        parent::__construct();

        //// load langs
        $this->ci->load->model("Install_model");
    }

    /**
     * Install links to menu module
     */
    public function installMenu()
    {
        $this->ci->load->helper('menu');
        foreach ($this->menu as $gid => $menu_data) {
            $name = '';
            if(isset($menu_data["name"])) {
               $name = $menu_data["name"];
            }
            $this->menu[$gid]['id'] = linked_install_set_menu($gid, $menu_data["action"], $name);
            linked_install_process_menu_items($this->menu, 'create', $gid, 0, $this->menu[$gid]["items"]);
        }
    }

    /**
     * Update languages
     *
     * @param array $lang_ids
     */
    public function installMenuLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $langs_file = $this->ci->Install_model->language_file_read("geomap", "menu", $langs_ids);

        if (!$langs_file) {
            log_message("info", "Empty menu langs data");

            return false;
        }

        $this->ci->load->helper("menu");

        foreach ($this->menu as $gid => $menu_data) {
            linked_install_process_menu_items($this->menu, "update", $gid, 0, $this->menu[$gid]["items"], $gid, $langs_file);
        }

        return true;
    }

    /**
     * Export languages
     *
     * @param array $lang_ids
     */
    public function installMenuLangExport($langs_ids)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $this->ci->load->helper("menu");

        $return = array();
        foreach ($this->menu as $gid => $menu_data) {
            $temp = linked_install_process_menu_items($this->menu, "export", $gid, 0, $this->menu[$gid]["items"], $gid, $langs_ids);
            $return = array_merge($return, $temp);
        }

        return array("menu" => $return);
    }

    /**
     * Uninstall menu
     */
    public function deinstallMenu()
    {
        $this->ci->load->helper('menu');
        foreach ($this->menu as $gid => $menu_data) {
            if ($menu_data['action'] == 'create') {
                linked_install_set_menu($gid, 'delete');
            } else {
                linked_install_delete_menu_items($gid, $this->menu[$gid]['items']);
            }
        }
    }

     /**
     * Install moderators links
     */
    public function installModerators()
    {
        //install moderators_methods permissions
        $this->ci->load->model("Moderators_model");
        foreach ((array) $this->moderators_methods as $method_data) {
            $validate_data = array("errors" => array(), "data" => $method_data);
            if (!empty($validate_data["errors"])) {
                continue;
            }
            $this->ci->Moderators_model->save_method(null, $validate_data["data"]);
        }
    }

    /**
     * Import moderators languages
     *
     * @param array $langs_ids
     */
    public function installModeratorsLangUpdate($langs_ids = null)
    {
        $langs_file = $this->ci->Install_model->language_file_read("geomap", "moderators", $langs_ids);
        if (!$langs_file) {
            log_message("info", "Empty moderators langs data");

            return false;
        }
        // install moderators permissions
        $this->ci->load->model("Moderators_model");
        $params["where"]["module"] = "geomap";
        $methods = $this->ci->Moderators_model->get_methods_lang_export($params);

        foreach ($methods as $method) {
            if (!empty($langs_file[$method["method"]])) {
                $this->ci->Moderators_model->save_method($method["id"], array(), $langs_file[$method["method"]]);
            }
        }
    }

    /**
     * Export moderators languages
     *
     * @param array $langs_ids
     */
    public function installModeratorsLangExport($langs_ids)
    {
        $this->ci->load->model("Moderators_model");
        $params["where"]["module"] = "geomap";
        $methods = $this->ci->Moderators_model->get_methods_lang_export($params, $langs_ids);
        foreach ($methods as $method) {
            $return[$method["method"]] = $method["langs"];
        }

        return array('moderators' => $return);
    }

    /**
     * Uninstall moderators links
     */
    public function deinstallModerators()
    {
        $this->ci->load->model("Moderators_model");
        $params = array();
        $params["where"]["module"] = "geomap";
        $this->ci->Moderators_model->delete_methods($params);
    }    

    /**
     * Install uploades
     */
    public function installUploads()
    {
        ///// upload config
        $this->ci->load->model("uploads/models/Uploads_config_model");

        $watermark_ids = array();

        foreach ((array) $this->uploads as $upload_data) {
            $config_data = array(
                "gid"          => $upload_data["gid"],
                "name"         => $upload_data["name"],
                "max_height"   => $upload_data["max_height"],
                "max_width"    => $upload_data["max_width"],
                "max_size"     => $upload_data["max_size"],
                "name_format"  => $upload_data["name_format"],
                "file_formats" => serialize((array) $upload_data["file_formats"]),
                "default_img"  => $upload_data["default_img"],
                "date_add"     => date("Y-m-d H:i:s"),
            );
            $config_id = $this->ci->Uploads_config_model->save_config(null, $config_data);

            $wm_data = $this->ci->Uploads_config_model->get_watermark_by_gid("image-wm");
            $wm_id = isset($wm_data["id"]) ? $wm_data["id"] : 0;

            foreach ((array) $upload_data["thumbs"] as $thumb_gid => $thumb_data) {
                if (isset($thumb_data["watermark"])) {
                    if (!isset($watermark_ids[$thumb_data["watermark"]])) {
                        $wm_data = $this->ci->Uploads_config_model->get_watermark_by_gid($thumb_data["watermark"]);
                        $watermark_ids[$thumb_data["watermark"]] = isset($wm_data["id"]) ? $wm_data["id"] : 0;
                    }
                    $watermark_id = $watermark_ids[$thumb_data["watermark"]];
                } else {
                    $watermark_id = 0;
                }

                $thumb_data["config_id"] = $config_id;
                $thumb_data["prefix"] = $thumb_gid;
                $thumb_data["effect"] = "none";
                $thumb_data["watermark_id"] = $watermark_id;

                $validate_data = $this->ci->Uploads_config_model->validate_thumb(null, $thumb_data);
                if (!empty($validate_data["errors"])) {
                    continue;
                }
                $this->ci->Uploads_config_model->save_thumb(null, $validate_data["data"]);
            }
        }
    }

    /**
     * Uninstall uploads links
     */
    public function deinstallUploads()
    {
        $this->ci->load->model("uploads/models/Uploads_config_model");

        foreach ((array) $this->uploads as $upload_data) {
            $config_data = $this->ci->Uploads_config_model->get_config_by_gid($upload_data["gid"]);
            if (!empty($config_data["id"])) {
                $this->ci->Uploads_config_model->delete_config($config_data["id"]);
            }
        }
    }

    /**
     * Install module
     */
    public function arbitraryInstalling()
    {
    }

    /**
     * Unintall module
     */
    public function arbitraryDeinstalling()
    {
    }

    public function __call($name, $args)
    {
        $methods = [
            '_prepare_installing' => 'prepareInstalling',
            '_arbitrary_installing' => 'arbitraryInstalling',
            '_arbitrary_lang_install' => 'arbitraryLangInstall',
            '_arbitrary_lang_export' => 'arbitraryLangExport',
            '_arbitrary_deinstalling' => 'arbitraryDeinstalling',
        ];

        if (isset($methods[$name])) {
            $method = $methods[$name];
        } else {
            $search = ['_lang_update', '_lang_export'];
            $replace = ['LangUpdate', 'LangExport'];

            $method = str_replace($search, $replace, $name);
        }

        if (!method_exists($this, $method)) {
            return;
        }

        return call_user_func_array([$this, $method], $args);
    }
}
