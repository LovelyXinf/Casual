<?php

namespace Pg\modules\mobile\models;

/**
 * Mobile install model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class MobileInstallModel extends \Model
{
    /**
     * Menu configuration
     */
    protected $menu = array();

    protected $menu_dating = array(
        'admin_menu' => array(
            'action' => 'none',
            'name'   => 'Mobile section menu',
            'items'  => array(
                'content_items' => array(
                    'action' => 'none',
                    'name'   => '',
                    'items'  => array(
                        'add_ons_items' => array(
                            'action' => 'none',
                            'name'   => '',
                            'items'  => array(
                                'mobile_menu_item' => array(
                                    'action' => 'create',
                                    'link' => 'admin/mobile',
                                    //'icon' => 'money',
                                    'status' => 1,
                                    'sorter' => 9,                                    
                                    'items'  => array(
                                        'app_links_item' => array('action' => 'create', 'link'   => 'admin/mobile/appLinks', 'status' => 1, 'sorter' => 1),
                                        'android_app_item' => array('action' => 'create', 'link'   => 'admin/mobile/billingSettings', 'status' => 1, 'sorter' => 2),
                                        'fcm_item' => array('action' => 'create', 'link'   => 'admin/mobile/fcmSettings', 'status' => 1, 'sorter' => 3),
                                    )
                                ) 
                            )
                        )
                    )
                )
            )
        )
    );

    protected $menu_social = array(
        'admin_menu' => array(
            'action' => 'none',
            'name'   => 'Mobile section menu',
            'items'  => array(
                'content_items' => array(
                    'action' => 'none',
                    'name'   => '',
                    'items'  => array(
                        'add_ons_items' => array(
                            'action' => 'none',
                            'name'   => '',
                            'items'  => array(
                                'mobile_menu_item' => array(
                                    'action' => 'create',
                                    'link'   => 'admin/mobile',
                                    'status' => 1,
                                    'sorter' => 9,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        )
    );    

    private $moderators_methods = array(
        array('module' => 'mobile', 'method' => 'index', 'is_default' => 1, 'group_id' => 7, 'is_hidden' => 0, 'parent_module' => '')
    );    
        
    public function __construct()
    {
        parent::__construct();

        if (PRODUCT_NAME == 'social') {
            $this->menu = $this->menu_social;
        } else {
            $this->menu = $this->menu_dating;
        }

        $this->menu['user_footer_menu']['items']['footer-menu-mobile-item']['link'] = site_url() . 'm';
    }

    protected function setPaths()
    {
        $mobile_path = SITE_PHYSICAL_PATH . 'm/';
        $files = [
            [
                'path'    => $mobile_path . 'index.html',
                'replace' => [
                    '[m_subfolder]' => '/' . SITE_SUBFOLDER . 'm',
                    '[favicon_folder]' => '/' . SITE_SUBFOLDER . 'm'
                ],
            ],
            [
                'path'    => $mobile_path . 'scripts/app.js',
                'replace' => [
                    '[api_virtual_path]' => preg_replace('#https?:#', '', SITE_VIRTUAL_PATH) . 'api',
                ],
            ],
            [
                'path'    => $mobile_path . 'images/favicon/manifest.json',
                'replace' => [
                    '[favicon_url]' => SITE_VIRTUAL_PATH,
                ],
            ],
            [
                'path'    => $mobile_path . 'images/favicon/browserconfig.xml',
                'replace' => [
                    '[favicon_url]' => SITE_VIRTUAL_PATH,
                ],
            ],
        ];
        foreach ($files as $file) {
            $file_contents = file_get_contents($file['path']);
            if ($file_contents) {
                $file_contents = str_replace(array_keys($file['replace']), array_values($file['replace']), $file_contents);
                file_put_contents($file['path'], $file_contents);
            }
        }
    }

    public function arbitraryInstalling()
    {
        $this->setPaths();
    }

    public function arbitraryLangInstall($langs_ids = null)
    {
        $langs_file = $this->ci->Install_model->language_file_read('mobile', 'mobile_app', $langs_ids);
        if (!$langs_file) {
            log_message('info', 'Empty mobile app langs data');

            return false;
        }

        foreach ($langs_file as $gid => $ldata) {
            if (!empty($ldata)) {
                $this->ci->pg_language->pages->set_string_langs('mobile_app', $gid, $ldata, array_keys($ldata));
            }
        }
    }

    public function arbitraryLangExport($langs_ids = null)
    {
        $langs_file = $this->ci->Install_model->language_file_read('mobile', 'mobile_app', $langs_ids);

        $gids = array();
        foreach($langs_file as $key => $lang) {
            $gids[] = $key;
        }

        $return = $this->ci->pg_language->export_langs('mobile_app', $gids, $langs_ids);

        return array('mobile_app' => $return);
    }

    /**
     * Install menu data
     */
    public function installMenu()
    {
        $this->ci->load->helper('menu');
        foreach ($this->menu as $gid => $menu_data) {
            $name = !empty($menu_data["name"]) ? $menu_data["name"] : '';
            $this->menu[$gid]['id'] = linked_install_set_menu($gid, $menu_data["action"], $name);
            linked_install_process_menu_items($this->menu, 'create', $gid, 0, $this->menu[$gid]["items"]);
        }
    }

    /**
     * Install menu languages
     */
    public function installMenuLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $langs_file = $this->ci->Install_model->language_file_read(MobileModel::MODULE_GID, 'menu', $langs_ids);

        if (!$langs_file) {
            log_message('info', 'Empty menu langs data');

            return false;
        }

        $this->ci->load->helper('menu');

        foreach ($this->menu as $gid => $menu_data) {
            linked_install_process_menu_items($this->menu, 'update', $gid, 0, $this->menu[$gid]['items'], $gid, $langs_file);
        }

        return true;
    }

    /**
     * Export menu languages
     */
    public function installMenuLangExport($langs_ids)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $this->ci->load->helper('menu');

        $return = array();
        foreach ($this->menu as $gid => $menu_data) {
            $temp = linked_install_process_menu_items($this->menu, 'export', $gid, 0, $this->menu[$gid]['items'], $gid, $langs_ids);
            $return = array_merge($return, $temp);
        }

        return array('menu' => $return);
    }

    /**
     * Uninstall menu languages
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
        //install moderators permissions
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
        $langs_file = $this->ci->Install_model->language_file_read("mobile", "moderators", $langs_ids);
        if (!$langs_file) {
            log_message("info", "Empty moderators langs data");

            return false;
        }
        // install moderators permissions
        $this->ci->load->model("Moderators_model");
        $params["where"]["module"] = "mobile";
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
        $params["where"]["module"] = "mobile";
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
        $params["where"]["module"] = "mobile";
        $this->ci->Moderators_model->delete_methods($params);
    }

    public function __call($name, $args)
    {
        $methods = [
            '_prepare_installing' => 'prepareInstalling',
            '_arbitrary_installing' => 'arbitraryInstalling',
            '_arbitrary_lang_install' => 'arbitraryLangInstall',
            '_arbitrary_lang_export' => 'arbitraryLangExport',
            '_arbitrary_deinstalling' => 'arbitraryDeinstalling',
            '_validate_requirements' => 'validateRequirements',
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
