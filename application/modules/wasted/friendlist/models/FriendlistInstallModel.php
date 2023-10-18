<?php

namespace Pg\modules\friendlist\models;

use Pg\Libraries\Setup;

/**
 * Friendlist install model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class FriendlistInstallModel extends \Model
{

    /**
     * Access permissions list
     *
     * @var array
     */
    protected $access_permissions;

    /**
     * Modules data
     *
     * @var array
     */
    protected $modules_data;

    protected $menu = array(
        'user_top_menu' => array(
            'action' => 'none',
            'items'  => array(
                'user-menu-people' => array(
                    'action' => 'none',
                    'items'  => array(
                        'friendlist_item' => array('action' => 'create', 'link' => 'friendlist/index', 'status' => 1, 'sorter' => 5),
                    ),
                ),
            ),
        ),

        'user_alerts_menu' => array(
            'action' => 'none',
            'items'  => array(
                'friendlist_new_item' => array(
                    'action' => 'create',
                    'link'   => 'friendlist/get_new_requests',
                    'icon'   => 'user-plus',
                    'status' => 1,
                    'sorter' => 3,
                ),
            ),
        ),
    );

    protected $wall_events_types = array(
        'friend_add',
        'friend_del',
    );
    protected $notifications = array(
        'notifications' => array(
            array('gid' => 'friends_request', 'send_type' => 'que'),
        ),
        'templates' => array(
            array('gid' => 'friends_request', 'name' => 'Friends request', 'vars' => array('fname', 'sname', 'user', 'comment'), 'content_type' => 'html'),
        ),
    );
    protected $moderation_types = array(
        array(
            'name'                 => 'friendlist',
            'mtype'                => '-1',
            'module'               => 'friendlist',
            'model'                => 'Friendlist_model',
            'check_badwords'       => '1',
            'method_get_list'      => '',
            'method_set_status'    => '',
            'method_delete_object' => '',
            'allow_to_decline'     => '0',
            'template_list_row'    => '',
        ),
    );

    protected $_seo_pages = array(
        'index',
        'friends_requests',
        'friends_invites',
    );

    protected $network_event_handlers = array(
        array(
            'event'  => 'friend_request',
            'module' => 'friendlist',
            'model'  => 'Friendlist_model',
            'method' => 'handler_friend_request',
        ),
        array(
            'event'  => 'friend_response',
            'module' => 'friendlist',
            'model'  => 'Friendlist_model',
            'method' => 'handler_friend_response',
        ),
        array(
            'event'  => 'friend_remove',
            'module' => 'friendlist',
            'model'  => 'Friendlist_model',
            'method' => 'handler_friend_remove',
        ),
    );

    /**
     * Constructor
     *
     * @return Install object
     */
    public function __construct()
    {
        parent::__construct();
        $this->access_permissions = Setup::getModuleData(
                FriendlistModel::MODULE_GID, Setup::TYPE_ACCESS_PERMISSIONS
        );
        $this->modules_data = Setup::getModuleData(FriendlistModel::MODULE_GID, Setup::TYPE_MODULES_DATA);
    }

    /**
     * Check system requirements of module
     */
    public function validateRequirements()
    {
        $result = array('data' => array(), 'result' => true);
        //check for Mbstring
        $good = function_exists('mb_substr');
        $result['data'][] = array(
            'name'   => 'Mbstring extension (required for feeds parsing) is installed',
            'value'  => $good ? 'Yes' : 'No',
            'result' => $good,
        );

        return $result;
    }

    public function installMenu()
    {
        $this->ci->load->helper('menu');

        foreach ($this->menu as $gid => $menu_data) {
            $this->menu[$gid]['id'] = linked_install_set_menu($gid, $menu_data['action'], isset($menu_data['name']) ? $menu_data['name'] : '');
            linked_install_process_menu_items($this->menu, 'create', $gid, 0, $this->menu[$gid]['items']);
        }
    }

    public function installMenuLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $langs_file = $this->ci->Install_model->language_file_read('friendlist', 'menu', $langs_ids);
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

    public function installWallEvents()
    {
        $this->ci->load->model('Friendlist_model');
        $this->ci->load->model('wall_events/models/Wall_events_types_model');
        foreach ($this->ci->Friendlist_model->wall_events as $wall_event) {
            $attrs = array(
                'gid'                 => $wall_event['gid'],
                'status'              => '1',
                'module'              => 'friendlist',
                'model'               => 'friendlist_model',
                'method_format_event' => '_format_wall_events',
                'date_add'            => date('Y-m-d H:i:s'),
                'date_update'         => date('Y-m-d H:i:s'),
                'settings'            => $wall_event['settings'],
            );
            $this->ci->Wall_events_types_model->add_wall_events_type($attrs);
        }

        return;
    }

    public function installWallEventsLangUpdate($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $langs_file = $this->ci->Install_model->language_file_read('friendlist', 'wall_events', $langs_ids);

        if (!$langs_file) {
            log_message('info', 'Empty moderation langs data');

            return false;
        }
        $this->ci->load->model('wall_events/models/Wall_events_types_model');
        $this->ci->Wall_events_types_model->update_langs($this->wall_events_types, $langs_file);
    }

    public function installWallEventsLangExport($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $this->ci->load->model('wall_events/models/Wall_events_types_model');

        return array('wall_events' => $this->ci->Wall_events_types_model->export_langs($this->wall_events_types, $langs_ids));
    }

    public function deinstallWallEvents()
    {
        $this->ci->load->model('Friendlist_model');
        $this->ci->load->model('wall_events/models/Wall_events_types_model');
        foreach ($this->ci->Friendlist_model->wall_events as $wall_event) {
            $this->ci->Wall_events_types_model->delete_wall_events_type($wall_event['gid']);
        }
    }

    public function installSiteMap()
    {
        $this->ci->load->model('Site_map_model');
        $site_map_data = array(
            'module_gid'      => 'friendlist',
            'model_name'      => 'Friendlist_model',
            'get_urls_method' => 'get_sitemap_urls',
        );
        $this->ci->Site_map_model->set_sitemap_module('friendlist', $site_map_data);
    }

    public function deinstallSiteMap()
    {
        $this->ci->load->model('Site_map_model');
        $this->ci->Site_map_model->delete_sitemap_module('friendlist');
    }

    public function installBanners()
    {
        $this->ci->load->model('banners/models/Banner_group_model');
        $this->ci->load->model('Friendlist_model');
        $this->ci->Banner_group_model->set_module('friendlist', 'Friendlist_model', '_banner_available_pages');
        $group_id = $this->ci->Banner_group_model->get_group_id_by_gid('users_groups');
        $pages = $this->ci->Friendlist_model->_banner_available_pages();
        if ($pages) {
            foreach ($pages as $key => $value) {
                $page_attrs = array(
                    'group_id' => $group_id,
                    'name'     => $value['name'],
                    'link'     => $value['link'],
                );
                $this->ci->Banner_group_model->add_page($page_attrs);
            }
        }
    }

    public function deinstallBanners()
    {
        $this->ci->load->model('banners/models/Banner_group_model');
        $this->ci->Banner_group_model->delete_module('friendlist');
        $group_id = $this->ci->Banner_group_model->get_group_id_by_gid('users_groups');
        $this->ci->Banner_group_model->delete($group_id);
    }

    public function installNotifications()
    {
        $this->ci->load->model('Notifications_model');
        $this->ci->load->model('notifications/models/Templates_model');

        foreach ($this->notifications['templates'] as $tpl) {
            $template_data = array(
                'module' => FriendlistModel::MODULE_GID,
                'gid'          => $tpl['gid'],
                'name'         => $tpl['name'],
                'vars'         => serialize($tpl['vars']),
                'content_type' => $tpl['content_type'],
                'date_add'     => date('Y-m-d H:i:s'),
                'date_update'  => date('Y-m-d H:i:s'),
            );
            $tpl_ids[$tpl['gid']] = $this->ci->Templates_model->save_template(null, $template_data);
        }

        foreach ($this->notifications['notifications'] as $notification) {
            $notification_data = array(
                'module' => FriendlistModel::MODULE_GID,
                'gid'                 => $notification['gid'],
                'send_type'           => $notification['send_type'],
                'id_template_default' => $tpl_ids[$notification['gid']],
                'date_add'            => date('Y-m-d H:i:s'),
                'date_update'         => date('Y-m-d H:i:s'),
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
        $langs_file = $this->ci->Install_model->language_file_read('friendlist', 'notifications', $langs_ids);
        if (!$langs_file) {
            log_message('info', 'Empty notifications langs data');

            return false;
        }
        $this->ci->Notifications_model->update_langs($this->notifications, $langs_file, $langs_ids);

        return true;
    }

    public function installNotificationsLangExport($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $this->ci->load->model('Notifications_model');
        $langs = $this->ci->Notifications_model->export_langs($this->notifications, $langs_ids);

        return array('notifications' => $langs);
    }

    public function deinstallNotifications()
    {
        $this->ci->load->model('Notifications_model');
        $this->ci->load->model('notifications/models/Templates_model');
        foreach ($this->notifications['templates'] as $tpl) {
            $this->ci->Templates_model->delete_template_by_gid($tpl['gid']);
        }
        foreach ($this->notifications['notifications'] as $notification) {
            $this->ci->Notifications_model->delete_notification_by_gid($notification['gid']);
        }
    }

    public function installModeration()
    {
        // Moderation
        $this->ci->load->model('moderation/models/Moderation_type_model');
        foreach ($this->moderation_types as $mtype) {
            $mtype['date_add'] = date('Y-m-d H:i:s');
            $this->ci->Moderation_type_model->save_type(null, $mtype);
        }
    }

    public function installModerationLangUpdate($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $langs_file = $this->ci->Install_model->language_file_read('friendlist', 'moderation', $langs_ids);
        if (!$langs_file) {
            log_message('info', 'Empty moderation langs data');

            return false;
        }
        $this->ci->load->model('moderation/models/Moderation_type_model');
        $this->ci->Moderation_type_model->update_langs($this->moderation_types, $langs_file);
    }

    public function installModerationLangExport($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $this->ci->load->model('moderation/models/Moderation_type_model');

        return array('moderation' => $this->ci->Moderation_type_model->export_langs($this->moderation_types, $langs_ids));
    }

    public function deinstallModeration()
    {
        $this->ci->load->model('moderation/models/Moderation_type_model');
        foreach ($this->moderation_types as $mtype) {
            $type = $this->ci->Moderation_type_model->get_type_by_name($mtype['name']);
            if (empty($type)) {
                continue;
            }
            $this->ci->Moderation_type_model->delete_type($type['id']);
        }
    }

    public function installNetwork()
    {
        $this->ci->load->model('network/models/Network_events_model');
        foreach ($this->network_event_handlers as $handler) {
            $this->ci->Network_events_model->add_handler($handler);
        }
    }

    public function deinstallNetwork()
    {
        $this->ci->load->model('network/models/Network_events_model');
        foreach ($this->network_event_handlers as $handler) {
            $this->ci->Network_events_model->delete($handler['event']);
        }
    }

    public function installMedia()
    {
        //lang ds
        if ($this->ci->pg_module->is_module_installed("media")) {
            $this->ci->load->model('media/models/Media_model');
            $this->ci->Media_model->addFriendsMenu();
        }
    }

    public function deinstallMedia()
    {
        //lang ds
        if ($this->ci->pg_module->is_module_installed("media")) {
            $this->ci->load->model('Media_model');
            $this->ci->Media_model->deleteFriendsMenu();
        }
    }

    public function arbitraryInstalling()
    {
        $seo_data = array(
            'module_gid'              => 'friendlist',
            'model_name'              => 'Friendlist_model',
            'get_settings_method'     => 'get_seo_settings',
            'get_rewrite_vars_method' => 'request_seo_rewrite',
            'get_sitemap_urls_method' => 'get_sitemap_xml_urls',
        );
        $this->ci->pg_seo->set_seo_module('friendlist', $seo_data);
    }

    /**
     * Import module languages
     *
     * @param array $langs_ids array languages identifiers
     *
     * @return void
     */
    public function arbitraryLangInstall($langs_ids = null)
    {
        $langs_file = $this->ci->Install_model->language_file_read('friendlist', 'arbitrary', $langs_ids);
        if (!$langs_file) {
            log_message('info', 'Empty friendlist arbitrary langs data');

            return false;
        }
        foreach ($this->_seo_pages as $page) {
            $post_data = array(
                'title'          => isset($langs_file["seo_tags_{$page}_title"]) ? $langs_file["seo_tags_{$page}_title"] : null,
                'keyword'        => isset($langs_file["seo_tags_{$page}_keyword"]) ?  $langs_file["seo_tags_{$page}_keyword"] : null,
                'description'    => isset($langs_file["seo_tags_{$page}_description"]) ? $langs_file["seo_tags_{$page}_description"] : null,
                'header'         => isset($langs_file["seo_tags_{$page}_header"]) ? $langs_file["seo_tags_{$page}_header"] : null,
                'og_title'       => isset($langs_file["seo_tags_{$page}_og_title"]) ? $langs_file["seo_tags_{$page}_og_title"] : null,
                'og_type'        => isset($langs_file["seo_tags_{$page}_og_type"]) ? $langs_file["seo_tags_{$page}_og_type"] : null,
                'og_description' => isset($langs_file["seo_tags_{$page}_og_description"]) ? $langs_file["seo_tags_{$page}_og_description"] : null,
            );
            $this->ci->pg_seo->set_settings('user', 'friendlist', $page, $post_data);
        }
    }

    /**
     * Export module languages
     *
     * @param array $langs_ids languages identifiers
     *
     * @return array
     */
    public function arbitraryLangExport($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $seo_settings = $this->ci->pg_seo->get_all_settings_from_cache('user', 'friendlist');
        $lang_ids = array_keys($this->ci->pg_language->languages);
        foreach ($seo_settings as $seo_page) {
            $prefix = 'seo_tags_' . $seo_page['method'];
            foreach ($lang_ids as $lang_id) {
                $meta = 'meta_' . $lang_id;
                $og = 'og_' . $lang_id;
                $arbitrary_return[$prefix . '_title'][$lang_id] = $seo_page[$meta]['title'];
                $arbitrary_return[$prefix . '_keyword'][$lang_id] = $seo_page[$meta]['keyword'];
                $arbitrary_return[$prefix . '_description'][$lang_id] = $seo_page[$meta]['description'];
                $arbitrary_return[$prefix . '_header'][$lang_id] = $seo_page[$meta]['header'];
                $arbitrary_return[$prefix . '_og_title'][$lang_id] = $seo_page[$og]['og_title'];
                $arbitrary_return[$prefix . '_og_type'][$lang_id] = $seo_page[$og]['og_type'];
                $arbitrary_return[$prefix . '_og_description'][$lang_id] = $seo_page[$og]['og_description'];
            }
        }

        return array('arbitrary' => $arbitrary_return);
    }

    public function arbitraryDeinstalling()
    {
        //seo
        $this->ci->pg_seo->delete_seo_module('friendlist');
    }

     /**
     * Install access permissions
     *
     * @return void
     */
    protected function installAccessPermissions()
    {
        if (empty($this->access_permissions)) {
            return false;
        } else {
            $this->ci->load->model('access_permissions/models/Access_permissions_modules_model');
            foreach ($this->access_permissions as $value) {
                if(isset($value['data'])) {
                    $value['data'] = serialize($value['data']);
                }
                $this->ci->Access_permissions_modules_model->saveModules($value);
            }
        }
    }

    /**
     * Install access permissions
     *
     * @return void
     */
    protected function deinstallAccessPermissions()
    {
        if (empty($this->access_permissions)) {
            return false;
        } else {
            $this->ci->load->model('access_permissions/models/Access_permissions_modules_model');
            foreach ($this->access_permissions as $value) {
                $this->ci->Access_permissions_modules_model->deleteModule($value['module_gid']);
            }
        }
    }

    /**
     * Install mobile module
     *
     * @return void
     */
    protected function installMobile()
    {
        if (!empty($this->modules_data['push_notifications'])) {
            $this->ci->load->model("Mobile_model");
            $this->ci->Mobile_model->callbackAddPushNotifications($this->modules_data['push_notifications']);
        }
    }

    /**
     * Deinstall mobile module
     *
     * @return void
     */
    protected function deinstallMobile()
    {
        if (!empty($this->modules_data['push_notifications'])) {
            $this->ci->load->model("Mobile_model");
            foreach ($this->modules_data['push_notifications'] as $notification) {
                $gids[] = $notification['gid'];
            }
            $this->ci->Mobile_model->callbackDeletePushNotifications($gids);
        }
    }

    public function __call($name, $args)
    {
        $methods = [
            '_validate_requirements' => 'validateRequirements',
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
