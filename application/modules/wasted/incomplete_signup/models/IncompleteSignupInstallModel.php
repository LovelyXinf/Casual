<?php

namespace Pg\modules\incomplete_signup\models;

/**
 * Incomplete_signup install model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class IncompleteSignupInstallModel extends \Model
{
    private $menu = array(
        'admin_menu' => array(
            'action' => 'none',
            'name'   => '',
            'items'  => array(
                'other_items' => array(
                    'action' => 'none',
                    'name'   => '',
                    'items'  => array(
                        "add_ons_items" => array(
                            "action" => "none",
                            'name'   => '',
                            "items"  => array(
                                "incomplete_signup_menu_item" => array("action" => "create", "link" => "admin/incomplete_signup", "status" => 1, "sorter" => 9),
                            ),
                        ),
                    ),
                ),
            ),
        ),

        'admin_incomplete_signup_menu' => array(
            'action' => 'create',
            'name'   => 'Incomplete signup menu',
            'items'  => array(
                'incomplete_signup_settings' => array('action' => 'create', 'link' => 'admin/incomplete_signup', 'status' => 1, "sorter" => 1),
            ),
        ),
    );

    private $_notifications = array(
        'notifications' => array(
            array('gid' => 'users_incomplete_signup', 'send_type' => 'simple'),
        ),
        'templates' => array(
            array('gid' => 'users_incomplete_signup', 'name' => 'User incomplete registration letter', 'vars' => array('email', 'nickname'), 'content_type' => 'text'),
        ),
    );

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

    public function installMenuLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $langs_file = $this->ci->Install_model->language_file_read('incomplete_signup', 'menu', $langs_ids);

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
     * Check system requirements of module
     */
    public function validateRequirements()
    {
        $result = array("data" => array(), "result" => true);

        //check for Mbstring
        $good            = function_exists("mb_substr");
        $result["data"][] = array(
            "name"   => "Mbstring extension (required for feeds parsing) is installed",
            "value"  => $good ? "Yes" : "No",
            "result" => $good,
        );
        $result["result"] = $result["result"] && $good;

        return $result;
    }

    public function installNotifications()
    {
        // add notification
        $this->ci->load->model('Notifications_model');
        $this->ci->load->model('notifications/models/Templates_model');

        foreach ($this->_notifications['templates'] as $tpl) {
            $template_data = array(
                'module' => IncompleteSignupModel::MODULE_GID,
                'gid'          => $tpl['gid'],
                'name'         => $tpl['name'],
                'vars'         => serialize($tpl['vars']),
                'content_type' => $tpl['content_type'],
                'date_add'     => date('Y-m-d H:i:s'),
                'date_update'  => date('Y-m-d H:i:s'),
            );
            $tpl_ids[$tpl['gid']] = $this->ci->Templates_model->save_template(null, $template_data);
        }

        foreach ($this->_notifications['notifications'] as $notification) {
            $notification_data = array(
                'module' => IncompleteSignupModel::MODULE_GID,
                'gid' => $notification['gid'],
                'send_type'           => $notification['send_type'],
                'id_template_default' => $tpl_ids[$notification['gid']],
                'date_add'            => date("Y-m-d H:i:s"),
                'date_update'         => date("Y-m-d H:i:s"),
            );
            $this->ci->Notifications_model->save_notification(null, $notification_data);
        }
    }

    public function installNotificationsLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $this->ci->load->model('Notifications_model');

        $langs_file = $this->ci->Install_model->language_file_read('incomplete_signup', 'notifications', $langs_ids);

        if (!$langs_file) {
            log_message('info', 'Empty notifications langs data');

            return false;
        }

        $this->ci->Notifications_model->update_langs($this->_notifications, $langs_file, $langs_ids);

        return true;
    }

    public function installNotificationsLangExport($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $this->ci->load->model('Notifications_model');
        $langs = $this->ci->Notifications_model->export_langs($this->_notifications, $langs_ids);

        return array('notifications' => $langs);
    }

    public function deinstallNotifications()
    {
        $this->ci->load->model('Notifications_model');
        $this->ci->load->model('notifications/models/Templates_model');
        foreach ($this->_notifications['templates'] as $tpl) {
            $this->ci->Templates_model->delete_template_by_gid($tpl['gid']);
        }
        foreach ($this->_notifications['notifications'] as $notification) {
            $this->ci->Notifications_model->delete_notification_by_gid($notification['gid']);
        }
    }

    public function arbitraryInstalling()
    {
    }

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
