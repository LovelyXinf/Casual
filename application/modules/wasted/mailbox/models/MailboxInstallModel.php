<?php

namespace Pg\modules\mailbox\models;

use Pg\Libraries\Setup;

/**
 * Mailbox Install Model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Mikhail Chernov <mchernov@pilotgroup.net>
 *
 * @version $Revision: 2 $ $Date: 2010-04-02 15:07:07 +0300 (Ср, 02 апр 2010) $ $Author: mchernov $
 */
class MailboxInstallModel extends \Model
{

    /**
     * Access permissions list
     *
     * @var array
     */
    protected $access_permissions;

    private $menu = array(

        /*'user_top_menu' => array(
            'action' => 'none',
            'items'  => array(
                'user-menu-communication' => array(
                    'action' => 'none',
                    'items'  => array(
                        'mailbox_item'       => array('action' => 'create', 'link' => 'mailbox/inbox', 'status' => 1, 'sorter' => 10),
                        'mailbox_write_item' => array('action' => 'create', 'link' => 'mailbox/write', 'status' => 1, 'sorter' => 20),
                    ),
                ),
            ),
        ),*/

        'user_alerts_menu' => array(
            'action' => 'none',
            'items'  => array(
                'mailbox_new_item' => array(
                    'action' => 'create',
                    'link'   => 'mailbox/get_new_message',
                    'icon'   => 'envelope',
                    'status' => 1,
                    'sorter' => 1,
                ),
            ),
        ),
    );

    private $moderation_types = array(
        array(
            "name"                 => "mailbox",
            "mtype"                => "-1",
            "module"               => "mailbox",
            "model"                => "Mailbox_model",
            "check_badwords"       => "1",
            "method_get_list"      => "",
            "method_set_status"    => "",
            "method_delete_object" => "",
            "allow_to_decline"     => "0",
            "template_list_row"    => "",
        ),
    );

    /**
     * File uploads configuration
     *
     * @var array
     */
    private $file_uploads = array(
        array(
            "gid"          => "mailbox-attach",
            "name"         => "Mailbox attachement",
            "max_size"     => 262144,
            "name_format"  => "format",
            "file_formats" => array("doc", "docx", "pdf", "ppt", "rtf", "text", "txt", "word", "xls", "xlsx", "csv", "xml", "bmp", "gif", "jpeg", "jpg", "png"),
        ),
    );

    /**
     * Notifications configuration
     */
    private $notifications = array(
        "templates" => array(
            array('module' => MailboxModel::MODULE_GID, "gid" => "mailbox_new_message", "name" => "You have a new message", "vars" => array("fname", "sname", "sender", "subject", "image", "link_1", "link_2"), "content_type" => "html"),
        ),
        "notifications" => array(
            array('module' => MailboxModel::MODULE_GID, "gid" => "mailbox_new_message", "template" => "mailbox_new_message", "send_type" => "que"),
        ),
    );

    /**
     * Service configuration
     *
     * @var array
     */
    private $services = array(
        "templates" => array(
            array(
                "gid"                      => "read_message_template",
                "callback_module"          => "mailbox",
                "callback_model"           => "Mailbox_model",
                "callback_buy_method"      => "service_buy_read_message",
                "callback_activate_method" => "service_activate_read_message",
                "callback_validate_method" => "service_validate_read_message",
                "price_type"               => 1,
                "data_admin"               => array("message_count" => "int"),
                "data_user"                => array(),
                "moveable"                 => 0,
            ),
            array(
                "gid"                      => "send_message_template",
                "callback_module"          => "mailbox",
                "callback_model"           => "Mailbox_model",
                "callback_buy_method"      => "service_buy_send_message",
                "callback_activate_method" => "service_activate_send_message",
                "callback_validate_method" => "service_validate_send_message",
                "price_type"               => 1,
                "data_admin"               => array("message_count" => "int"),
                "data_user"                => array(),
                "moveable"                 => 0,
            ),
        ),
        "services" => [
            [
                "gid" => MailboxModel::READ_SERVICE,
                "template_gid" => "read_message_template",
                "pay_type" => 2,
                "status" => 1,
                "price" => 10,
                "type" => "membership",
                "data_admin" => ["message_count" => "10"],
            ],
            [
                "gid" => MailboxModel::SEND_SERVICE,
                "template_gid" => "send_message_template",
                "pay_type" => 2,
                "status" => 1,
                "price" => 10,
                "type" => "membership",
                "data_admin" => ["message_count" => "10"],
            ],
        ],
    );

    /**
     * Cronjobs configuration
     */
    private $cronjobs = array(
        array(
            "name"     => "Clear mailbox trash",
            "module"   => "mailbox",
            "model"    => "Mailbox_model",
            "method"   => "mailbox_trash_cron",
            "cron_tab" => "0 * * * *",
            "status"   => "1",
        ),
    );
    private $_seo_pages = array(
        'write',
        'inbox',
        'outbox',
        'drafts',
        'trash',
        'spam',
        'index',
        'view',
    );
    protected $network_event_handlers = array(
        array(
            'event'  => 'mail',
            'module' => 'mailbox',
            'model'  => 'Mailbox_model',
            'method' => 'handler_mail',
        ),
    );

    /**
     * Demo content object
     *
     * @var array
     */
    protected $demo_content;

    /**
     *Modules data
     *
     * @var array
     */
    protected $modules_data;

    /**
     * Constructor
     *
     * @return Install object
     */
    public function __construct()
    {
        parent::__construct();
        $this->access_permissions = Setup::getModuleData(
                MailboxModel::MODULE_GID, Setup::TYPE_ACCESS_PERMISSIONS
        );
        $this->demo_content = Setup::getModuleData(
                MailboxModel::MODULE_GID, Setup::TYPE_DEMO_CONTENT
        );
        $this->modules_data = Setup::getModuleData(
                MailboxModel::MODULE_GID, Setup::TYPE_MODULES_DATA
        );
    }

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
        $langs_file = $this->ci->Install_model->language_file_read('mailbox', 'menu', $langs_ids);

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

    public function installModeration()
    {
        $this->ci->load->model('moderation/models/Moderation_type_model');
        foreach ($this->moderation_types as $mtype) {
            $mtype['date_add'] = date("Y-m-d H:i:s");
            $this->ci->Moderation_type_model->save_type(null, $mtype);
        }
    }

    public function installModerationLangUpdate($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $langs_file = $this->ci->Install_model->language_file_read('mailbox', 'moderation', $langs_ids);

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
            $type = $this->ci->Moderation_type_model->get_type_by_name($mtype["name"]);
            $this->ci->Moderation_type_model->delete_type($type['id']);
        }
    }

    /**
     * Install links to file uploads
     */
    public function installFileUploads()
    {
        $this->ci->load->model("file_uploads/models/File_uploads_config_model");
        foreach ((array) $this->file_uploads as $config_data) {
            $validate_data = $this->ci->File_uploads_config_model->validate_config(null, $config_data);
            if (!empty($validate_data["errors"])) {
                continue;
            }
            $this->ci->File_uploads_config_model->save_config(null, $validate_data["data"]);
        }
    }

    /**
     * Uninstall file uploads
     */
    public function deinstallFileUploads()
    {
        ///// delete file settings
        $this->ci->load->model('file_uploads/models/File_uploads_config_model');
        foreach ((array) $this->file_uploads as $config_data) {
            $config_data = $this->ci->File_uploads_config_model->get_config_by_gid($config_data["gid"]);
            if (empty($config_data["id"])) {
                continue;
            }
            $this->ci->File_uploads_config_model->delete_config($config_data["id"]);
        }
    }

    /**
     * Install links to notifications module
     */
    public function installNotifications()
    {
        // add notification
        $this->ci->load->model("Notifications_model");
        $this->ci->load->model("notifications/models/Templates_model");

        $templates_ids = array();

        foreach ((array) $this->notifications["templates"] as $template_data) {
            if (is_array($template_data["vars"])) {
                $template_data["vars"] = implode(",", $template_data["vars"]);
            }

            $validate_data = $this->ci->Templates_model->validateTemplate(null, $template_data);
            if (!empty($validate_data["errors"])) {
                continue;
            }
            $templates_ids[$template_data['gid']] = $this->ci->Templates_model->save_template(null, $validate_data["data"]);
        }

        foreach ((array) $this->notifications["notifications"] as $notification_data) {
            if (!isset($templates_ids[$notification_data["template"]])) {
                $template = $this->ci->Templates_model->get_template_by_gid($notification_data["template"]);
                $templates_ids[$notification_data["template"]] = $template["id"];
            }
            $notification_data["id_template_default"] = $templates_ids[$notification_data["template"]];
            $validate_data = $this->ci->Notifications_model->validateNotification(null, $notification_data);
            if (!empty($validate_data["errors"])) {
                continue;
            }
            $this->ci->Notifications_model->save_notification(null, $validate_data["data"]);
        }
    }

    /**
     * Import notifications languages
     *
     * @param array $langs_ids
     */
    public function installNotificationsLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }

        $this->ci->load->model("Notifications_model");

        $langs_file = $this->ci->Install_model->language_file_read("mailbox", "notifications", $langs_ids);
        if (!$langs_file) {
            log_message("info", "Empty notifications langs data");

            return false;
        }

        $this->ci->Notifications_model->update_langs($this->notifications, $langs_file, $langs_ids);

        return true;
    }

    /**
     * Export notifications languages
     *
     * @param array $langs_ids
     */
    public function installNotificationsLangExport($langs_ids = null)
    {
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }
        $this->ci->load->model("Notifications_model");
        $langs = $this->ci->Notifications_model->export_langs((array) $this->notifications, $langs_ids);

        return array("notifications" => $langs);
    }

    /**
     * Install network events handler
     *
     * @return void
     */
    public function installNetwork()
    {
        $this->ci->load->model('network/models/Network_events_model');
        foreach ($this->network_event_handlers as $handler) {
            $this->ci->Network_events_model->add_handler($handler);
        }
    }

    /**
     * Uninstall network events handler
     *
     * @return void
     */
    public function deinstallNetwork()
    {
        $this->ci->load->model('network/models/Network_events_model');
        foreach ($this->network_event_handlers as $handler) {
            $this->ci->Network_events_model->delete($handler['event']);
        }
    }

    /**
     * Uninstall links to notifications module
     */
    public function deinstallNotifications()
    {
        ////// add notification
        $this->ci->load->model("Notifications_model");
        $this->ci->load->model("notifications/models/Templates_model");

        foreach ((array) $this->notifications["notifications"] as $notification_data) {
            $this->ci->Notifications_model->delete_notification_by_gid($notification_data["gid"]);
        }

        foreach ((array) $this->notifications["templates"] as $template_data) {
            $this->ci->Templates_model->delete_template_by_gid($template_data["gid"]);
        }
    }

    /**
     * Install links to service module
     */
    public function installServices()
    {
        $this->ci->load->model("Services_model");

        foreach ((array) $this->services["templates"] as $template_data) {
            $data_admin = $template_data["data_admin"];
            $data_user = $template_data["data_user"];
            $validate_data = $this->ci->Services_model->validateTemplate(null, $template_data);
            if (!empty($validate_data["errors"])) {
                continue;
            }
            $this->ci->Services_model->save_template(null, $validate_data["data"]);
        }

        foreach ((array) $this->services["services"] as $service_data) {
            $validate_data = $this->ci->Services_model->validate_service(null, $service_data);
            if (!empty($validate_data["errors"])) {
                continue;
            }
            $this->ci->Services_model->save_service(null, $validate_data["data"]);
        }
    }

    /**
     * Import services languages
     *
     * @param array $langs_ids
     */
    public function installServicesLangUpdate($langs_ids = null)
    {
        $langs_file = $this->ci->Install_model->language_file_read("mailbox", "services", $langs_ids);
        if (!$langs_file) {
            log_message("info", "Empty services langs data");

            return false;
        }

        $services_data = array(
            "service"     => array(),
            "template"    => array(),
            "admin_param" => array(),
        );

        $this->ci->load->model("Services_model");

        foreach ((array) $this->services["templates"] as $template_data) {
            $data_admin = isset($template_data["data_admin"]) ? array_keys($template_data["data_admin"]) : array();
            $data_user = isset($template_data["data_user"]) ? array_keys($template_data["data_user"]) : array();
            $services_data["template"][] = $template_data["gid"];
            $services_data["admin_param"][$template_data["gid"]] = array_unique(array_merge($data_admin, $data_user));
        }

        foreach ((array) $this->services["services"] as $service_data) {
            $services_data["service"][] = $service_data["gid"];
        }

        $this->ci->Services_model->update_langs($services_data, $langs_file);

        return true;
    }

    /**
     * Export services languages
     *
     * @param array $langs_ids
     */
    public function installServicesLangExport($langs_ids = null)
    {
        $services_data = array(
            "service"  => array(),
            "template" => array(),
            "param"    => array(),
        );

        $this->ci->load->model("Services_model");

        foreach ((array) $this->services["templates"] as $template_data) {
            $data_admin = isset($template_data["data_admin"]) ? array_keys($template_data["data_admin"]) : array();
            $data_user = isset($template_data["data_user"]) ? array_keys($template_data["data_user"]) : array();
            $services_data["template"][] = $template_data["gid"];
            $services_data["param"][$template_data["gid"]] = array_merge($data_admin, $data_user);
        }

        foreach ((array) $this->services["services"] as $service_data) {
            $services_data["service"][] = $service_data["gid"];
        }

        return array("services" => $this->ci->Services_model->export_langs($services_data, $langs_ids));
    }

    /**
     * Uninstall links to services module
     */
    public function deinstallServices()
    {
        $this->ci->load->model("Services_model");

        foreach ((array) $this->services["templates"] as $template_data) {
            $this->ci->Services_model->delete_template_by_gid($template_data["gid"]);
        }

        foreach ((array) $this->services["services"] as $service_data) {
            $this->ci->Services_model->delete_service_by_gid($service_data["gid"]);
        }
    }

    /**
     * Install links to cronjobs
     */
    public function installCronjob()
    {
        ////// add lift up cronjob
        $this->ci->load->model('Cronjob_model');
        foreach ((array) $this->cronjobs as $cron_data) {
            $validation_data = $this->ci->Cronjob_model->validate_cron(null, $cron_data);
            if (!empty($validation_data['errors'])) {
                continue;
            }
            $this->ci->Cronjob_model->save_cron(null, $validation_data['data']);
        }
    }

    /**
     * Uninstall links to cronjobs
     */
    public function deinstallCronjob()
    {
        $this->ci->load->model('Cronjob_model');
        $cron_data = array();
        $cron_data["where"]["module"] = "mailbox";
        $this->ci->Cronjob_model->delete_cron_by_param($cron_data);
    }

    public function installSiteMap()
    {
        $this->ci->load->model('Site_map_model');
        $site_map_data = array(
            'module_gid'      => 'mailbox',
            'model_name'      => 'Mailbox_model',
            'get_urls_method' => 'get_sitemap_urls',
        );
        $this->ci->Site_map_model->set_sitemap_module('mailbox', $site_map_data);
    }

    /**
     * Install banners links
     */
    public function installBanners()
    {
        ///// add banners module
        $this->ci->load->model("banners/models/Banner_group_model");
        $this->ci->Banner_group_model->set_module("mailbox", "Mailbox_model", "_banner_available_pages");
        $this->addBanners();
    }

    /**
     * Import banners languages
     */
    public function installBannersLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        if (!is_array($langs_ids)) {
            $langs_ids = (array) $langs_ids;
        }

        $banners_groups = array('banners_group_mailbox_groups');
        $langs_file = $this->ci->Install_model->language_file_read('mailbox', 'pages', $langs_ids);
        $this->ci->load->model('banners/models/Banner_group_model');
        $this->ci->Banner_group_model->update_langs($banners_groups, $langs_file, $langs_ids);
    }

    /**
     * Unistall banners links
     */
    public function deinstallBanners()
    {
        // delete banners module
        $this->ci->load->model("banners/models/Banner_group_model");
        $this->ci->Banner_group_model->delete_module("mailbox");
        $this->removeBanners();
    }

    /**
     * Add default banners
     */
    public function addBanners()
    {
        $this->ci->load->model("Users_model");
        $this->ci->load->model("banners/models/Banner_group_model");
        $this->ci->load->model("banners/models/Banner_place_model");

        $group_attrs = array(
            'date_created'  => date("Y-m-d H:i:s"),
            'date_modified' => date("Y-m-d H:i:s"),
            'price'         => 1,
            'gid'           => 'mailbox_groups',
            'name'          => 'Mailbox pages',
        );
        $group_id = $this->ci->Banner_group_model->create_unique_group($group_attrs);
        $all_places = $this->ci->Banner_place_model->get_all_places();
        if ($all_places) {
            foreach ($all_places as $key => $value) {
                if ($value['keyword'] != 'bottom-banner' && $value['keyword'] != 'top-banner') {
                    continue;
                }
                $this->ci->Banner_place_model->save_place_group($value['id'], $group_id);
            }
        }

        ///add pages in group
        $this->ci->load->model("Mailbox_model");
        $pages = $this->ci->Mailbox_model->_banner_available_pages();
        if ($pages) {
            foreach ($pages as $key => $value) {
                $page_attrs = array(
                    "group_id" => $group_id,
                    "name"     => $value["name"],
                    "link"     => $value["link"],
                );
                $this->ci->Banner_group_model->add_page($page_attrs);
            }
        }
    }

    /**
     * Remove banners
     */
    public function removeBanners()
    {
        $this->ci->load->model("banners/models/Banner_group_model");
        $group_id = $this->ci->Banner_group_model->get_group_id_by_gid("mailbox_groups");
        $this->ci->Banner_group_model->delete($group_id);
    }

    public function arbitraryInstalling()
    {
        $this->ci->pg_seo->set_seo_module('mailbox', array(
            'module_gid'              => 'mailbox',
            'model_name'              => 'Mailbox_model',
            'get_settings_method'     => 'get_seo_settings',
            'get_rewrite_vars_method' => 'request_seo_rewrite',
            'get_sitemap_urls_method' => 'get_sitemap_xml_urls',
        ));
        $this->addDemoContent();
    }

    public function deinstallSiteMap()
    {
        $this->ci->load->model('Site_map_model');
        $this->ci->Site_map_model->delete_sitemap_module('mailbox');
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
        $langs_file = $this->ci->Install_model->language_file_read('mailbox', 'arbitrary', $langs_ids);
        if (!$langs_file) {
            log_message('info', 'Empty mailbox arbitrary langs data');

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
            $this->ci->pg_seo->set_settings('user', 'mailbox', $page, $post_data);
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
        $seo_settings = $this->ci->pg_seo->get_all_settings_from_cache('user', 'mailbox');
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
        $this->ci->pg_seo->delete_seo_module('mailbox');
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
                $value['data'] = serialize($value['data']);
                $this->ci->Access_permissions_modules_model->saveModules($value);
            }
            $this->ci->load->model('access_permissions/models/Access_permissions_install_model');
            $this->ci->Access_permissions_install_model->addDemoAcl($this->demo_content['acl']);
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

    private function addDemoContent()
    {
        $this->ci->load->model("Mailbox_model");
        foreach ($this->demo_content['service'] as $user_id => $data) {
            $this->ci->Mailbox_model->setWriteCount($user_id, $data['send']);
            $this->ci->Mailbox_model->setViewCount($user_id, $data['read']);
        }
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
