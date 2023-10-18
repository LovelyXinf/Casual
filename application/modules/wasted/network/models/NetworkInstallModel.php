<?php

namespace Pg\modules\network\models;

/**
 * Network install model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class NetworkInstallModel extends \Model
{
    protected $action_config = array(
        'network_join' => array(
            'is_percent' => 0,
            'once' => 1,
            'available_period' => array(
                'once'),
            ),
    );

    public $_menu = array(
        'admin_menu' => array(
            'action' => 'none',
            'items'  => array(
                'settings_items' => array(
                    'action' => 'none',
                    'items'  => array(
                        'system-items' => array(
                            'action' => 'none',
                            'items'  => array(
                                'network_menu_item' => array(
                                    'action' => 'create',
                                    'link'   => 'admin/network/',
                                    'status' => 1,
                                    'sorter' => 12,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
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

        $this->ci->load->model('Install_model');
    }

    public function installMenu()
    {
        $this->ci->load->helper('menu');
        foreach ($this->_menu as $gid => $menu_data) {
            $name = '';
            if(isset($menu_data["name"])) {
               $name = $menu_data["name"];
            }
            $this->_menu[$gid]['id'] = linked_install_set_menu($gid, $menu_data["action"], $name);
            linked_install_process_menu_items($this->_menu, 'create', $gid, 0, $this->_menu[$gid]["items"]);
        }
    }

    public function installMenuLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $langs_file = $this->ci->Install_model->language_file_read(NetworkModel::MODULE_GID, 'menu', $langs_ids);
        if (!$langs_file) {
            log_message('info', 'Empty menu langs data');

            return false;
        }
        $this->ci->load->helper('menu');
        foreach (array_keys($this->_menu) as $gid) {
            linked_install_process_menu_items($this->_menu, 'update', $gid, 0, $this->_menu[$gid]['items'], $gid, $langs_file);
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
        foreach (array_keys($this->_menu) as $gid) {
            $temp = linked_install_process_menu_items($this->_menu, 'export', $gid, 0, $this->_menu[$gid]['items'], $gid, $langs_ids);
            $return = array_merge($return, $temp);
        }

        return array('menu' => $return);
    }

    public function deinstallMenu()
    {
        $this->ci->load->helper('menu');
        foreach ($this->_menu as $gid => $menu_data) {
            if ($menu_data['action'] == 'create') {
                linked_install_set_menu($gid, 'delete');
            } else {
                linked_install_delete_menu_items($gid, $this->_menu[$gid]['items']);
            }
        }
    }

    public function installBonuses()
    {

    }

    public function installBonusesLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $this->ci->load->model("bonuses/models/Bonuses_util_model");
        $langs_file = $this->ci->Install_model->language_file_read("bonuses", "ds", $langs_ids);

        if (!$langs_file) {
            log_message("info", "Empty bonuses langs data");
            return false;
        }
        $this->ci->Bonuses_util_model->update_langs($langs_file);
        $this->ci->load->model("bonuses/models/Bonuses_actions_config_model");
        $this->ci->Bonuses_actions_config_model->setActionsConfig($this->action_config);
        return true;
    }

    public function installBonusesLangExport()
    {

    }

    public function deinstallBonuses()
    {

    }

    public function installFieldEditor()
    {
        $this->ci->load->model('Users_model');
        $this->ci->load->model('Field_editor_model');
        $this->ci->Field_editor_model->initialize('users');
        include MODULEPATH . 'network/install/user_fields_data.php';
        $this->ci->Field_editor_model->import_type_structure($this->ci->Users_model->form_editor_type, $fe_sections, $fe_fields, $fe_forms);
    }

    public function installFieldEditorLangUpdate()
    {
        $langs_file = $this->ci->Install_model->language_file_read(NetworkModel::MODULE_GID, 'field_editor');
        if (!$langs_file) {
            log_message('info', 'Empty field_editor langs data');

            return false;
        }
        $this->ci->load->model('Users_model');
        $this->ci->load->model('Field_editor_model');
        $this->ci->Field_editor_model->initialize($this->ci->Users_model->form_editor_type);
        include MODULEPATH . 'network/install/user_fields_data.php';
        $this->ci->Field_editor_model->update_sections_langs($fe_sections, $langs_file);
        $this->ci->Field_editor_model->update_fields_langs($this->ci->Users_model->form_editor_type, $fe_fields, $langs_file);

        return true;
    }

    public function installFieldEditorLangExport($langs_ids = null)
    {
        $this->ci->load->model('Users_model');
        $this->ci->load->model('Field_editor_model');
        $this->ci->Field_editor_model->initialize($this->ci->Users_model->form_editor_type);
        list($fe_sections, $fe_fields, $fe_forms) = $this->ci->Field_editor_model->export_type_structure($this->ci->Users_model->form_editor_type, 'application/modules/network/install/user_fields_data.php');
        $sections = $this->ci->Field_editor_model->export_sections_langs($fe_sections, $langs_ids);
        $fields = $this->ci->Field_editor_model->export_fields_langs($this->ci->Users_model->form_editor_type, $fe_fields, $langs_ids);

        return array('field_editor' => array_merge($sections, $fields));
    }

    public function deinstallFieldEditor()
    {
        $this->ci->load->model('Users_model');
        $this->ci->load->model('Field_editor_model');
        $this->ci->load->model('field_editor/models/Field_editor_forms_model');
        include MODULEPATH . 'network/install/user_fields_data.php';
        if (!empty($fe_fields)) {
            foreach ($fe_fields as $field) {
                $this->ci->Field_editor_model->delete_field_by_gid($field['data']['gid']);
            }
        }
        $this->ci->Field_editor_model->initialize($this->ci->Users_model->form_editor_type);
        if (!empty($fe_sections)) {
            foreach ($fe_sections as $section) {
                $this->ci->Field_editor_model->delete_section_by_gid($section['data']['gid']);
            }
        }
        if (!empty($fe_forms)) {
            foreach ($fe_forms as $form) {
                $this->ci->Field_editor_forms_model->delete_form_by_gid($form['data']['gid']);
            }
        }

        return true;
    }

    /*public function install_users(){
        $this->ci->load->model('users/models/Users_delete_callbacks_model');
        $this->ci->Users_delete_callbacks_model->add_callback(NetworkModel::MODULE_GID, 'Network_users_model', 'callback_user_delete', '', NetworkModel::MODULE_GID);
    }

    public function deinstall_users(){
        $this->ci->load->model('users/models/Users_delete_callbacks_model');
        $this->ci->Users_delete_callbacks_model->delete_callbacks_by_module(NetworkModel::MODULE_GID);
    }*/

    public function installCronjob()
    {
        $this->ci->load->model('Cronjob_model');
        $cron_data = array(
            'name'     => 'Process network temp',
            'module'   => NetworkModel::MODULE_GID,
            'model'    => 'Network_users_model',
            'method'   => 'process_temp',
            'cron_tab' => '*/21 * * * *',
            'status'   => true,
        );
        $this->ci->Cronjob_model->save_cron(null, $cron_data);
    }

    public function deinstallCronjob()
    {
        $this->ci->load->model('Cronjob_model');
        $cron_data = array('where' => array('module' => NetworkModel::MODULE_GID));
        $this->ci->Cronjob_model->delete_cron_by_param($cron_data);
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
