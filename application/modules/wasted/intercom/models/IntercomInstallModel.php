<?php

namespace Pg\modules\intercom\models;

use Pg\libraries\Setup;

/**
 * Intercom install model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Dmitry Popenov
 *
 * @version $Revision: 2 $ $Date: 2013-01-30 10:50:07 +0400 $
 */
class IntercomInstallModel extends \Model
{
    /**
     * Module data
     *
     * @var array
     */
    protected $modules_data;

    /**
     * Constructor
     *
     * @return Listings_install_model
     */
    public function __construct()
    {
        parent::__construct();
        $this->modules_data = Setup::getModuleData('intercom', Setup::TYPE_MODULES_DATA);
    }

    /*
     * Menu module methods
     *
     */

    public function installMenu()
    {
        if (!TRIAL_MODE) {
            $this->ci->load->helper('menu');
            foreach ($this->modules_data['menu'] as $gid => $menu_data) {
                $this->modules_data['menu'][$gid]['id'] = \Pg\modules\menu\helpers\linkedInstallSetMenu(
                    $gid, $menu_data["action"], $menu_data["name"]);
                \Pg\modules\menu\helpers\linkedInstallProcessMenuItems(
                    $this->modules_data['menu'], 'create', $gid, 0, $this->modules_data['menu'][$gid]["items"]);
            }
        }
    }

    public function installMenuLangUpdate($langs_ids = null)
    {
        if (empty($langs_ids)) {
            return false;
        }
        $langs_file = $this->ci->Install_model->language_file_read('intercom', 'menu', $langs_ids);
        if (!$langs_file) {
            log_message('info', 'Empty menu langs data');
            return false;
        }

        $this->ci->load->helper('menu');
        foreach ($this->modules_data['menu'] as $gid => $menu_data) {
            \Pg\modules\menu\helpers\linkedInstallProcessMenuItems(
                $this->modules_data['menu'], 'update', $gid, 0, $this->modules_data['menu'][$gid]["items"], $gid, $langs_file);
        }

        return true;
    }

    public function installMenuLangExport($langs_ids)
    {
        if (empty($langs_ids)) {
            return false;
        }

        $this->ci->load->helper('menu');
        $return = [];
        foreach ($this->modules_data['menu'] as $gid => $menu_data) {
            $temp = \Pg\modules\menu\helpers\linkedInstallProcessMenuItems(
                $this->modules_data['menu'], 'export', $gid, 0, $this->modules_data['menu'][$gid]["items"], $gid, $langs_ids);
            $return = array_merge($return, $temp);
        }

        return ["menu" => $return];
    }

    public function deinstallMenu()
    {
        $this->ci->load->helper('menu');
        foreach ($this->modules_data['menu'] as $gid => $menu_data) {
            if ($menu_data['action'] == 'create') {
                \Pg\modules\menu\helpers\linkedInstallSetMenu($gid, 'delete');
            } else {
                \Pg\modules\menu\helpers\linkedInstallDeleteMenuItems($gid, $this->modules_data['menu'][$gid]['items']);
            }
        }
    }

    public function arbitraryInstalling()
    {
        $this->ci->load->model('Seo_model');
        $xml_data = $this->ci->Seo_model->getXmlRouteFileContent();
        $this->ci->pg_seo->set_seo_module(IntercomModel::MODULE_GID, [
            'module_gid'  => IntercomModel::MODULE_GID,
            'model_name' => 'Intercom_model',
            'get_settings_method'  => 'getSeoSettings',
            'get_rewrite_vars_method' => 'requestSeoRewrite',
        ]);
        $data = [
            'noindex' => 1,
            'title'  => '',
            'keyword' => '',
            'description' => '',
            'header' => '',
            'og_title' => '',
            'og_type' => '',
            'og_descrtiption' => '',
            'url_template'    => '[text:admin/][text:marketing/][text:index/]',
            'admin' => true
        ];
        $this->ci->pg_seo->set_settings('admin', IntercomModel::MODULE_GID, 'index', $data);
        $xml_data[IntercomModel::MODULE_GID]['index'] = $this->ci->pg_seo->
            url_template_transform(IntercomModel::MODULE_GID, 'index', $data["url_template"], 'base', 'xml');
        $services = IntercomModel::getServices();
        foreach ($services as $service) {
            $data = [
                'noindex' => 1,
                'title'  => '',
                'keyword' => '',
                'description' => '',
                'header' => '',
                'og_title' => '',
                'og_type' => '',
                'og_descrtiption' => '',
                'url_template'    => '[text:admin/][text:marketing/][text:index/][text:' . $service . ']',
                'admin' => true
            ];
            $this->ci->pg_seo->set_settings('admin', IntercomModel::MODULE_GID, 'index/' . $service, $data);
            $xml_data[IntercomModel::MODULE_GID]['index/' . $service] = $this->ci->pg_seo->
            url_template_transform(IntercomModel::MODULE_GID, 'index/' . $service, $data["url_template"], 'base', 'xml');
        }
        $this->ci->Seo_model->setXmlRouteFileContent($xml_data);
        $this->ci->Seo_model->rewriteRoutePhpFile();
    }

    public function arbitraryDeinstalling()
    {

    }

    public function __call($name, $args)
    {
        $methods = [
            '_arbitrary_installing' => 'arbitraryInstalling',
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
