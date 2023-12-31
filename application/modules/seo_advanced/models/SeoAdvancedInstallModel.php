<?php

namespace Pg\modules\seo_advanced\models;

/**
 * Seo advanced module
 *
 * @package     PG_Core
 *
 * @copyright   Copyright (c) 2000-2014 PG Core
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */

/**
 * Seo install model
 *
 * @package     PG_Core
 * @subpackage  Seo_advanced
 *
 * @category    models
 *
 * @copyright   Copyright (c) 2000-2014 PG Core
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class SeoAdvancedInstallModel extends \Model
{
    /**
     * Menu configuration
     *
     * @var array
     */
    protected $menu = array(
        'admin_seo_menu' => array(
            'action' => 'none',
            'name' => 'Admin menu',
            'items' => array(
                'seo_advanced_main' => array(
                    'action' => 'create',
                    'link' => 'admin/seo_advanced/index',
                    'status' => 1,
                    'sorter' => 2,
                    'items' => array(
                        'seo_advanced_list_item' => array('action' => 'create', 'link' => 'admin/seo_advanced/listing', 'status' => 1, 'sorter' => 1),
                        //'seo_advanced_analytics' => array('action' => 'create', 'link' => 'admin/seo_advanced/analytics', 'status' => 1, 'sorter' => 2),
                        'seo_advanced_tracker' => array('action' => 'create', 'link' => 'admin/seo_advanced/tracker', 'status' => 1, 'sorter' => 3),
                        'seo_advanced_robots' => array('action' => 'create', 'link' => 'admin/seo_advanced/robots', 'status' => 1, 'sorter' => 4),
                        'seo_advanced_site_map' => array('action' => 'create', 'link' => 'admin/seo_advanced/site_map', 'status' => 1, 'sorter' => 5),
                    ),
                ),
            ),
        ),
    );

    /**
     * Moderators configuration
     *
     * @var array
     */
    protected $moderators_methods = array(
        array('module' => 'seo_advanced', 'method' => 'index', 'is_default' => 1, 'group_id' => 1, 'is_hidden' => 1, 'parent_module' => 'seo')
    );

    /**
     * Cronjobs configuration
     *
     * @var array
     */
    protected $cronjobs = array(
        array(
            "name" => "Sitemap generation",
            "module" => "seo_advanced",
            "model" => "Seo_advanced_model",
            "method" => "generateSitemapXmlCron",
            "cron_tab" => "0 */3 * * *",
            "status" => "1",
        ),
    );
    

    /**
     * Install data of menu module
     *
     * @var array
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
     * Import languages of menu module
     *
     * @param array $langs_ids languages identifiers
     *
     * @return boolean
     */
    public function installMenuLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $langs_file = $this->ci->Install_model->language_file_read('seo_advanced', 'menu', $langs_ids);

        if (!$langs_file) {
            log_message('info', 'Empty menu langs data');

            return false;
        }

        $this->ci->load->helper('menu');

        foreach ($this->menu as $gid => $menu_data) {
            linked_install_process_menu_items($this->menu, 'update', $gid, 0, $this->menu[$gid]["items"], $gid, $langs_file);
        }

        return true;
    }
    
    public function installMenu_lang_update($langs_ids = null) 
    {
        return $this->installMenuLangUpdate($langs_ids);
    }

    /**
     * Export languages of menu module
     *
     * @param array $langs_ids languages identifiers
     *
     * @return array
     */
    public function installMenuLangExport($langs_ids)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $this->ci->load->helper('menu');

        $return = array();
        foreach ($this->menu as $gid => $menu_data) {
            $temp = linked_install_process_menu_items($this->menu, 'export', $gid, 0, $this->menu[$gid]["items"], $gid, $langs_ids);
            $return = array_merge($return, $temp);
        }

        return array("menu" => $return);
    }
    
    public function installMenu_lang_export($langs_ids = null) 
    {
        return $this->installMenuLangExport($langs_ids);
    }

    /**
     * Uninstall data of menu module
     *
     * @return void
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
     * Install data of moderators module
     *
     * @return void
     */
    public function installModerators()
    {
        // install moderators permissions
        $this->ci->load->model('Moderators_model');

        foreach ($this->moderators_methods as $method) {
            $this->ci->Moderators_model->save_method(null, $method);
        }
    }

    /**
     * Import languages of moderators module
     *
     * @param array $langs_ids languages identifiers
     *
     * @return boolean
     */
    public function installModeratorsLangUpdate($langs_ids = null)
    {
        $langs_file = $this->ci->Install_model->language_file_read('seo_advanced', 'moderators', $langs_ids);

        // install moderators permissions
        $this->ci->load->model('Moderators_model');
        $params['where']['module'] = 'seo_advanced';
        $methods = $this->ci->Moderators_model->get_methods_lang_export($params);

        foreach ($methods as $method) {
            if (!empty($langs_file[$method['method']])) {
                $this->ci->Moderators_model->save_method($method['id'], array(), $langs_file[$method['method']]);
            }
        }

        return true;
    }

    public function installModerators_lang_update($langs_ids = null) 
    {
        return $this->installModeratorsLangUpdate($langs_ids);
    }

    /**
     * Import languages of moderators module
     *
     * @param array $langs_ids languages identifiers
     *
     * @return array
     */
    public function installModeratorsLangExport($langs_ids)
    {
        $this->ci->load->model('Moderators_model');
        $params['where']['module'] = 'seo_advanced';
        $methods = $this->ci->Moderators_model->get_methods_lang_export($params, $langs_ids);
        foreach ($methods as $method) {
            $return[$method['method']] = $method['langs'];
        }

        return array('moderators' => $return);
    }
    
    public function installModerators_lang_export($langs_ids = null) 
    {
        return $this->installModeratorsLangExport($langs_ids);
    }

    /**
     * Uninstall data of moderators module
     *
     * @return void
     */
    public function deinstallModerators()
    {
        // delete moderation methods in moderators
        $this->ci->load->model('Moderators_model');
        $params['where']['module'] = 'seo_advanced';
        $this->ci->Moderators_model->delete_methods($params);
    }

    /**
     * Install data of cronjobs module
     *
     * @return void
     */
    public function installCronjob()
    {
        ////// add lift up cronjob
        $this->ci->load->model('Cronjob_model');
        foreach ((array) $this->cronjobs as $cron_data) {
            $this->ci->Cronjob_model->save_cron(null, $cron_data);
        }
    }

    /**
     * Uninstall data of cronjobs module
     *
     * @return void
     */
    public function deinstallCronjob()
    {
        $this->ci->load->model('Cronjob_model');
        $cron_data = array();
        $cron_data["where"]["module"] = "seo_advanced";
        $this->ci->Cronjob_model->delete_cron_by_param($cron_data);
    }

    /**
     * Install module data
     *
     * @return void
     */
    public function arbitraryInstalling()
    {
        $this->ci->load->model('Seo_advanced_model');
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /m/\n";
        $content .= "Sitemap: " . site_url() . "sitemap.xml\n";
        $this->ci->Seo_advanced_model->set_robots_content($content);

        // Update file config/langs_route.php
        $lang_dm_data = array(
            'module' => 'seo_advanced',
            'model' => 'Seo_advanced_model',
            'method_add' => 'lang_dedicate_module_callback_add',
            'method_delete' => 'lang_dedicate_module_callback_delete',
        );
        $this->ci->pg_language->add_dedicate_modules_entry($lang_dm_data);
        $this->ci->Seo_advanced_model->lang_dedicate_module_callback_add();
    }
    
    public function _arbitrary_installing()
    {
        return $this->arbitraryInstalling();
    }

    /**
     * Uninstall module data
     *
     * @return void
     */
    public function arbitraryDeinstalling()
    {
        /// delete entries in dedicate modules
        $lang_dm_data['where'] = array('module' => 'seo_advanced', 'model' => 'Seo_advanced_model');
        $this->ci->pg_language->delete_dedicate_modules_entry($lang_dm_data);
    }
    
    public function _arbitrary_deinstalling() 
    {
        return $this->arbitraryDeinstalling();
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
            '_get_settings_form' => 'getSettingsForm',
            '_save_settings_form' => 'saveSettingsForm',
            '_validate_settings_form' => 'validateSettingsForm',
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
