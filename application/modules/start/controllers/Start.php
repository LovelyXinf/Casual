<?php

namespace Pg\modules\start\controllers;

use Pg\libraries\View;

/**
 * Start user side controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <https://www.pilotgroup.net/>
 * */
class Start extends \Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
    }

    public function index($page = null, $code = false)
    {
        /* <custom_R> */
        $this->view->setRedirect(site_url('operator'), 'hard');
        /* </custom_R> */

        \Pg\modules\users\models\UsersModel::siteVisits($this->session->userdata);

        if (defined('ANALYTIC_DEMO_VERSION')
            && ((is_null($page) === true
            && $this->pg_module->get_module_config('start', 'is_fist_opening'))
            || $page == 'tours')
            && ANALYTIC_DEMO_VERSION == 'tour'
        ) {
            if ($page == 'tours') {
                $this->pg_module->set_module_config('start', 'is_fist_opening', 0);
            }
            if ($code) {
                return false;
            }
            $this->view->render('intercom_product_tour');
            return;
        }

        if (defined('ANALYTIC_DEMO_VERSION') && ANALYTIC_DEMO_VERSION == 'default') {
            $this->pg_module->set_module_config('start', 'is_fist_opening', 0);
            $this->pg_module->set_module_config('start', 'is_fist_opening_product_tours', 1);
        }

        if ($this->session->userdata('auth_type') == 'user' && $this->session->userdata('user_id')) {
            if (PRODUCT_NAME == 'social') {
                $this->view->setRedirect(site_url('start/homepage'));
            } else {
                $this->homepage();
            }
        } else {
            if ((getenv('DEMO_MODE') || TRIAL_MODE) &&
                $this->pg_module->get_module_config('start', 'is_fist_opening') && $page != 'preview') {
                $this->load->model('Themes_model');
                $theme_id = current($this->Themes_model->getInstalledThemesList(['where' => [
                    'theme_type' => 'user', 'active' => 1
                ]]))['id'];
                $this->view->assign('theme_id', $theme_id);
                $this->view->assign('themes_list', $this->Themes_model->getSetsList($theme_id));
                $this->view->render('first_opening_page');
                return;
            } elseif (empty($page) && $this->pg_module->is_module_installed('landings')) {
                $this->load->model('Landings_model');
                $landing = $this->Landings_model->getLandingsList(null, null, null, ['where' => ['is_active' => 1, 'is_default_land' => 1]]);

                if ($landing) {
                    $landing[0]['upload_file'] = false;
                    if ($landing[0]['index_path']) {
                        $upload_path = SITE_PHYSICAL_PATH . UPLOAD_DIR . 'landings/';
                        $land_index  = $upload_path . $landing[0]['id'] . '/' . $landing[0]['index_path'];
                        if (file_exists($land_index)) {
                            $landing[0]['upload_file'] = true;
                        }
                    }

                    if ($landing[0]['upload_file'] || $landing[0]['url_page']) {
                        $this->view->setRedirect(site_url($landing[0]['link']));
                    }
                }
            }

            $this->session->set_userdata('demo_user_type', 'user');
            $this->load->model('Start_model');
            $template_name = $this->Start_model->templateName();
            $this->view->assign('mobile_url', $this->config->site_url() . 'm');
            if (!empty($page) && $page === 'registration') {
                if (isset($code) && strlen($code) == 15) {
                    $this->view->assign('referral_code', $code);
                }
                $this->view->assign('is_registration', 1);
            }
            $this->view->render($template_name);
        }
        exit();
    }

    public function homepage()
    {
        $this->Menu_model->breadcrumbs_set_parent('user-main-home-item');
        $this->view->assign('user_id', $this->session->userdata('user_id'));
        $this->view->render('homepage');
    }

    public function error()
    {
        header('HTTP/1.0 404 Not Found');
        $this->Menu_model->breadcrumbs_set_active(l('header_error', 'start'));
        $this->view->assign('header_type', 'error_page');
        $this->view->render('error');
    }

    public function printVersion()
    {
        echo $this->pg_module->get_module_config('start', 'product_version');
    }

    // test methods
    public function testFileUpload()
    {
        $this->load->model('file_uploads/models/File_uploads_config_model');

        $configs = $this->File_uploads_config_model->get_config_list();
        $this->view->assign('configs', $configs);

        if ($this->input->post('btn_save') && $this->input->post('config')) {
            $config    = $this->input->post('config');
            $file_name = 'file';

            if (isset($_FILES[$file_name]) && is_array($_FILES[$file_name]) && is_uploaded_file($_FILES[$file_name]['tmp_name'])) {
                $this->load->model('File_uploads_model');
                $return = $this->File_uploads_model->upload($config, '', $file_name);

                if (!empty($return['errors'])) {
                    $this->system_messages->addMessage(View::MSG_ERROR, $return['errors']);
                } else {
                    $this->system_messages->addMessage(View::MSG_SUCCESS, $return['file']);
                }
            }
        }

        $this->view->render('test_file_upload');
    }

    public function demo($type = 'user')
    {
        $this->session->set_userdata('demo_user_type', $type);
        redirect();
    }

    public function ajaxBackend()
    {
        $data = (array) $this->input->post('data');

        $user_session_id = 0;
        if ($this->session->userdata('auth_type') == 'user') {
            $user_session_id = intval($this->session->userdata('user_id'));
            if ($this->session->userdata('online_status') == 0) {
                $this->Users_model->updateOnlineStatus($user_session_id, 1);
            }
        }
        $return_arr = ['user_session_id' => $user_session_id];

        $this->load->model('start/models/Start_desktop_notifications_model');
        foreach ($data as $gid => $params) {
            if ($this->Start_desktop_notifications_model->isNotification($gid) === false) {
                continue;
            }
            $return_arr[$gid] = [];
            if (empty($params['module']) || empty($params['model']) || empty($params['method'])) {
                continue;
            }

            if (!$this->pg_module->is_module_installed($params['module'])) {
                continue;
            }

            $model  = $gid . '_backend_model';
            $method = 'backend_' . $params['method'];
            $this->load->model($params['module'] . '/models/' . $params['model'], $model, false, true, true);

            // TODO: убрать после приведения к PSR
            if (!method_exists($this->$model, $method)) {
                $method = 'backend';
                $chunks = explode('_', $params['method']);
                foreach ($chunks as $chunk) {
                    $method .= ucfirst($chunk);
                }

                if (!method_exists($this->$model, $method)) {
                    continue;
                }
            }
            $return_arr[$gid]                    = $this->{$model}->{$method}($params);
            $return_arr[$gid]['user_session_id'] = $user_session_id;
        }

        $this->view->assign($return_arr);

        return;
    }

    public function multiRequestScript()
    {
        echo file_get_contents(APPPATH . 'modules/friendlist/js/friendlist_multi_request.js');
    }

    public function aclCheck()
    {
        $url_data = explode('/', filter_input(INPUT_POST, 'url_data'));
        $module   = $url_data[0];
        $action   = $url_data[1];
        $errors   = [];
        if (empty($module)) {
            $errors[] = 'Empty module';
            if (empty($action)) {
                $errors[] = 'Empty action';
            }
        }
        $allowed = false;
        if (empty($errors)) {
            $allowed = $this->acl->check(new \Pg\Libraries\Acl\Action\ViewPage(
                new \Pg\Libraries\Acl\Resource\Page(
                    ['module' => $module, 'controller' => $module, 'action' => $action, ]
                )
            ), false);
        }
        $this->view->assign(View::MSG_ERROR, $errors);
        $this->view->assign('is_allowed', $allowed);
        $this->view->render();
    }

    public function sendAnalytics()
    {
        if (!($_ENV['DEMO_MODE'] || defined(DEMO_MODE) && DEMO_MODE)) {
            return;
        }

        $event = $this->input->post('event', true);
        if (!$event) {
            return;
        }

        $this->load->library('Analytics');
        $this->analytics->track($event);
    }

    public function saveGuide()
    {
        $this->load->model('start/models/Start_demo_model');
        $page_data = $this->input->post('page', true);
        $step      = filter_input(INPUT_POST, 'step', FILTER_VALIDATE_INT);
        $is_page   = $this->Start_demo_model->isPage($page_data, 'user');
        if ($is_page === false) {
            $step++;
        }
        $_SESSION['guide_user'] = [
            'autoshow' => true,
            'step'     => $step
        ];
        exit(json_encode(['status' => $is_page]));
    }

    public function skipGuide()
    {
        $_SESSION['guide_user'] = [
            'autoshow' => false,
            'step'     => 1
        ];
    }

    public function firstOpening($step = null)
    {
        if ((getenv('DEMO_MODE') || TRIAL_MODE) && $this->pg_module->get_module_config('start', 'is_fist_opening')) {
            $this->load->model('start/models/Start_demo_model');
            $request_data = is_null($step) === false ? ['step' => $step] : $this->input->post('data', true);
            $data         = $this->Start_demo_model->firstOpening($request_data);

            $this->view->assign($data);
        }
        $this->view->render();
    }

    /* <custom_R> */
    public function api()
    {
        $return = ['status' => 0, 'message' => ''];

        $token = trim(strip_tags($this->input->post('token', true)));

        $this->load->model('start/models/StartDomainsModel');
        $domain = $this->StartDomainsModel->getByToken($token);

        if (empty($token) || empty($domain)) {
            $return['status']   = 0;
            $return['message']  = l('error_invalid_api_token', 'start');
            exit(json_encode($return));
        }

        $action = trim(strip_tags($this->input->post('action', true)));
        if ($action) {
            $return['status'] = 1;

            $this->load->model('chatbox/models/ChatboxApiModel');
            $result             = $this->ChatboxApiModel->action($domain['id'], $action);
            if (!empty($result)) {
                $return['data'] = $result;
            }
        }

        exit(json_encode($return));
    }
    /* </custom_R> */
}
