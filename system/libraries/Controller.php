<?php

use Pg\libraries\Cache\Manager as CacheManager;

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package     CodeIgniter
 *
 * @author      ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2008, EllisLab, Inc.
 * @license     http://codeigniter.com/user_guide/license.html
 *
 * @link        http://codeigniter.com
 * @since       Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class the every library in
 * CodeIgniter will be assigned to.
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 *
 * @category    Libraries
 *
 * @author      ExpressionEngine Dev Team
 *
 * @link        http://codeigniter.com/user_guide/general/controllers.html
 */
class Controller extends CI_Base
{
    public $_ci_scaffolding       = false;
    public $_ci_scaff_table       = false;
    public $_pg_tables_list_cache = [];
    public $use_pjax              = false;
    public $is_pjax               = false;
    public $acl                   = null;
    public $cache                 = null;
    public $view                  = null;

    protected $ci;

    /**
     * Constructor
     *
     * Calls the initialize() function
     */
    public function __construct()
    {
        parent::__construct();

        $this->ci = $this;

        $this->initCache();

        $this->_ci_initialize();

        log_message('debug', 'Controller Class Initialized');

        $this->initFilesystem();
        $this->initAcl();
        $this->initView();
    }

    private function initFileSystem()
    {
        $this->filesystem = new Pg\Libraries\Filesystem(
            new Gaufrette\Adapter\Local(SITE_PHYSICAL_PATH)
        );
    }

    private function initAcl()
    {
        $this->acl = new Pg\Libraries\Acl(
            new Pg\libraries\Acl\Driver\Decorator\Cached(
                new Pg\libraries\Acl\Driver\DbDriver()
            ),
            function () {
                $ci = get_instance();
                $type = $ci->session->userdata('auth_type');
                if ($type === 'user') {
                    $ci->load->model('Users_model');
                    $roles = $ci->Users_model->getUserRoles($ci->session->userdata('user_id'));
                } elseif ($type === 'admin') {
                    $roles = ['admin'];
                } elseif ($type === 'module') {
                    $type = 'installer';
                    $roles = ['installer'];
                /* <custom_R> */
                } elseif ($type === 'operator') {
                    $roles = ['operator'];
                /* </custom_R> */
                } else {
                    $type = $type ?: 'guest';
                    $roles = ['guest'];
                }
                return ['type' => $type, 'id' => $ci->session->userdata('user_id'), 'roles' => $roles, ];
            }
        );
        $this->acl->getManager()->setRole('guest');
        $this->acl->getManager()->setRole(['admin', 'installer'/* <custom_R> */, 'operator'/* </custom_R> */], 'guest');
        if (INSTALL_DONE && $this->session->userdata('auth_type') === 'user') {
            $this->load->model('Users_model');
            $roles = $this->Users_model->getUserRoles($this->session->userdata('user_id'));

            if (PRODUCT_NAME == 'realestate') {
                $this->acl->getManager()->setRole($roles, 'guest');
            } else {
                $this->acl->getManager()->setRole($roles);
            }
        }
    }

    private function initCache()
    {
        $this->cache = CacheManager::getInstance();
    }

    private function initView()
    {
        $this->view = Pg\Libraries\View::getInstance();
        $this->view->useProfiling($_ENV['USE_PROFILING']);
        $this->view->setFormat($this->determineFormat());

        $this->view->setDriver($this->pickDriver());

        $this->view->setTheme($this->pg_theme);
        $this->assignGlobalVars();

        $this->view->useCache(INSTALL_DONE && $_ENV['TPL_USE_CACHE']);
        $this->view->setGeneralPath(APPPATH . 'views/');
        /* <custom_R> */
        if ($this->router->is_operator_class) {
            $this->view->initModuleTheme($this->router->class, 'operator');
        } else {
            $this->view->initModuleTheme($this->router->class, $this->router->is_admin_class ? 'admin' : 'user');
        }
        /* </custom_R> */
        $this->view->setTemplate($this->router->fetch_method());

        $this->view->setDebugging($_ENV['TPL_DEBUGGING']);
    }

    private function pickDriver()
    {
        if (!empty($_ENV['VIEW_DRIVER_DEFAULT'])) {
            $defaultDriver = $_ENV['VIEW_DRIVER_DEFAULT'];
        } else {
            $defaultDriver = 'TemplateLite';
        }

        if (INSTALL_DONE) {
            if (!$this->router->isApi()) {
                $theme_settings = $this->pg_theme->return_active_settings(
                    $this->pg_theme->get_current_theme_type()
                );
            } else {
                $theme_settings = [];
            }
            if (!empty($theme_settings['template_engine'])) {
                $driver_class = ucfirst($theme_settings['template_engine']);
            } else {
                $driver_class = $defaultDriver;
            }
        } else {
            $driver_class = $defaultDriver;
        }

        $driver = NS_LIB . 'View\\Driver\\' . $driver_class;
        if (!class_exists($driver)) {
            throw new \Exception('Template engine driver (' . $driver . ') not found');
        }

        return new $driver();
    }

    private function determineFormat()
    {
        $accept = $_SERVER['HTTP_ACCEPT'];
        if (strpos($accept, 'text/xml') !== false) {
            $format = 'xml';
        } elseif ($this->router->is_api_class || (strpos($accept, 'application/json') !== false)) {
            $format = 'json';
        } else {
            $format = 'html';
        }
        assert(isset($format));

        return $format;
    }

    private function getDateFormats()
    {
        $template_driver_date_templates = ['twig' => 'date', 'templateLite' => 'st', ];
        $formats                        = ['date_literal', 'date_literal_short', 'date_time_literal', 'date_time_literal_short', 'time_numeric', ];
        return [
            'date_format_js' => $this->pg_date->getFormats('js', $formats),
            'date_format_st' => $this->pg_date->getFormats('st', $formats),
            'date_format_ui' => $this->pg_date->getFormats('ui', $formats),
        ];
    }

    private function assignGlobalVars()
    {
        if ($this->router->is_api_class) {
            return false;
        }
        $common_vars = [
            'site_url'              => site_url(),
            'site_root'             => '/' . SITE_SUBFOLDER,
            'base_url'              => base_url(),
            'general_path_relative' => APPPATH_VIRTUAL . 'views/',
            'js_folder'             => APPLICATION_FOLDER . 'js/',
        ];
        if (INSTALL_DONE) {
            $install_done_vars = [
                '_LANG'     => $this->ci->pg_language->current_lang,
                'DM'        => DM, // Direction mark (&rtm; | &ltm;)
                'DEMO_MODE' => $_ENV['DEMO_MODE'],
                'auth_type' => $this->session->userdata('auth_type'),
            ];
            $date_formats = $this->getDateFormats();
            if ($_ENV['DEMO_MODE']) {
                $this->config->load('demo_data', true);
                $login_settings = $this->config->item('login_settings', 'demo_data');
                $demo_user_type = $this->session->userdata('demo_user_type') ?: 'user';
                $demo_vars      = [
                    'demo_login_settings'           => $login_settings,
                    'demo_copyright'                => $this->config->item('copyright', 'demo_data'),
                    'demo_user_type'                => $demo_user_type,
                    'demo_user_type_login_settings' => $login_settings[$demo_user_type],
                    'demo_analytic_user_id'         => (defined('ANALYTIC_USER_ID') ? ANALYTIC_USER_ID : ''),
                ];
            } else {
                $demo_vars = [];
            }
        } else {
            $install_done_vars = [
                '_LANG' => [
                    'rtl' => 'ltr',
                ],
            ];
            $demo_vars    = [];
            $date_formats = [];
        }
        $this->view->assignGlobal(array_merge($common_vars, $install_done_vars, $demo_vars, $date_formats));
    }

    // --------------------------------------------------------------------

    /**
     * Initialize
     *
     * Assigns all the bases classes loaded by the front controller to
     * variables in this class.  Also calls the autoload routine.
     *
     * @return void
     */
    public function _ci_initialize()
    {
        // Assign all the class objects that were instantiated by the
        // front controller to local class variables so that CI can be
        // run as one big super object.
        $classes = [
            'config'    => 'Config',
            'input'     => 'Input',
            'benchmark' => 'Benchmark',
            'uri'       => 'URI',
            'output'    => 'Output',
            'lang'      => 'Language',
            'router'    => 'Router',
        ];

        foreach ($classes as $var => $class) {
            $this->{$var} = &load_class($class);
        }

        // In PHP 5 the Loader class is run as a discreet class.
        $this->load = &load_class('Loader');
        $this->load->_ci_autoloader();

        $this->load->library('Pg_theme');

        if (!$this->router->isApi()) {
            $this->load->library('Pg_seo');
        }

        $this->use_pjax = !$this->router->is_admin_class/* <custom_R> */ || $this->router->is_operator_class/* </custom_R> */;
        $this->is_pjax  = (INSTALL_MODULE_DONE && !empty($_SERVER['HTTP_X_PJAX']));
    }

    public function loadLanguagePages($module_gid, $lang_id=null)
    {
        $pages = $this->ci->pg_language->pages->load($module_gid, $lang_id);
        foreach ($pages as $gid => $value) {
            $this->view->assign('lang_' . $module_gid . '_' . $gid, $value);
        }
    }

    public function loadLanguageDs($module_gid, $lang_id=null)
    {
        $pages = $this->ci->pg_language->ds->load($module_gid, $lang_id);
        foreach ($pages as $gid => $value) {
            $this->view->assign('ds_' . $module_gid . '_' . $gid, $value);
        }
    }
}

// END _Controller class

/* End of file Controller.php */
/* Location: ./system/libraries/Controller.php */
