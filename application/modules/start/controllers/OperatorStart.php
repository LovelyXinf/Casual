<?php

namespace Pg\modules\start\controllers;

use Pg\libraries\View;
use Pg\modules\operators\models\OperatorsStatisticsModel;

/**
 * Start module
 * Operator side controller
 *
 * @package     PG_Dating
 * @subpackage  Start
 * @category    controllers
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class OperatorStart extends \Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Operators_model');
    }

    public function index()
    {
        if ($this->session->userdata('auth_type') != 'operator') {
            redirect(site_url() . 'operator/start/login');
        }

        $user_id  = intval($this->session->userdata('user_id'));
        $operator = $this->Operators_model->getById($user_id);
        $operator = $this->Operators_model->format($operator);
        $this->view->assign('operator', $operator);

        $this->load->model('operators/models/Operators_statistics_model');
        $answered_count = $this->Operators_statistics_model->getCount([
            'operator_id'   => $user_id,
            'type'          => \Pg\modules\operators\models\OperatorsStatisticsModel::TYPE_MESSAGE,
        ]);
        $this->view->assign('answered_count', $answered_count);

        $this->view->setHeader(l('header_operator_homepage', 'start'));
        $this->view->render('index');
    }

    public function login()
    {
        if ($this->session->userdata('auth_type') == 'operator') {
            redirect(site_url() . 'operator/start/');
        }

        $data['action'] = site_url() . 'operator/start/login';

        if ($this->input->post('btn_login')) {
            $data['email'] = trim(strip_tags($this->input->post('email', true)));
            $password      = trim(strip_tags($this->input->post('password', true)));
            $operator      = $this->Operators_model->getByEmailPassword($data['email'], $password);
            $operator      = $this->Operators_model->format($operator);
            if (empty($operator) || !$operator['is_active']) {
                $this->system_messages->addMessage(View::MSG_ERROR, l('error_login_password_incorrect', 'ausers'));
            } else {
                $session = [
                    'auth_type'       => 'operator',
                    'user_id'         => $operator['id'],
                    'name'            => $operator['name'],
                    'nickname'        => $operator['nickname'],
                    'email'           => $operator['email'],
                    'domain_id'       => $operator['domain_id'],
                ];
                $this->session->set_userdata($session);

                $this->Operators_model->updateOnlineStatus($operator['id'], 1);

                $this->view->setRedirect(site_url() . 'operator/start/');
            }
        }

        $this->view->assign('data', $data);
        $this->view->setHeader(l('operator_header_login', 'start'));
        $this->view->assign('login_page', 1);
        $this->view->assign('hide_page_header', 1);
        $this->view->render('login_form');
    }

    public function logout()
    {
        $user_id = $this->session->userdata('user_id');
        $this->Operators_model->updateOnlineStatus($user_id, 0);

        $lang_id = $this->session->userdata('lang_id');
        $this->session->sess_destroy();
        $this->session->sess_create();
        if ($this->session->userdata('lang_id') != $lang_id) {
            $this->session->set_userdata('lang_id', $lang_id);
        }
        $this->view->setRedirect(site_url() . 'operator/start/');
    }

    public function changeLanguage($lang_id)
    {
        $lang_id = (int) $lang_id;
        $this->session->set_userdata('lang_id', $lang_id);
        $old_code                           = $this->pg_language->languages[$this->pg_language->current_lang_id]['code'];
        $this->pg_language->current_lang_id = $lang_id;
        $code                               = $this->pg_language->languages[$lang_id]['code'];
        $_SERVER['HTTP_REFERER']            = str_replace('/' . $old_code . '/', '/' . $code . '/', $_SERVER['HTTP_REFERER']);
        $site_url                           = str_replace('/' . $code . '/', '', site_url());

        $auth_type = $this->session->userdata('auth_type');
        if ($auth_type == 'operator') {
            $this->load->model('Operators_model');
            $this->Operators_model->save($this->session->userdata('user_id'), [
                'lang_id'   => $lang_id,
            ]);
        }

        if (strpos($_SERVER['HTTP_REFERER'], $site_url) !== false) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect();
        }
    }

    public function ajaxBackend()
    {
        $return = ['user_session_id' => 0];

        $data = (array) $this->input->post('data');

        $user_session_id = 0;
        if ($this->session->userdata('auth_type') == 'operator') {
            $user_session_id = intval($this->session->userdata('user_id'));
            if ($this->session->userdata('is_online') == 0) {
                $this->Operators_model->updateOnlineStatus($user_session_id, 1);
            }
        }
        $return['user_session_id'] = $user_session_id;

        foreach ($data as $gid => $params) {
            $return[$gid] = [];
            if (empty($params['module']) || empty($params['model']) || empty($params['method'])) {
                continue;
            }

            if (!$this->pg_module->is_module_installed($params['module'])) {
                continue;
            }

            $model = $gid . '_backend_model';
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

            $return[$gid] = $this->{$model}->{$method}($params);
            $return[$gid]['user_session_id'] = $user_session_id;
        }

        $this->view->assign($return);
        return;
    }

    public function statistics($page = null)
    {
        $current_settings = $this->session->userdata('operator_statistics_list') ?: [];

        if (!$page) {
            $current_settings = [];
        }

        if (!isset($current_settings['filters'])) {
            $current_settings['filters'] = [
                'date_added' => ['from' => '', 'to' => ''],
            ];
        }
        if (!isset($current_settings['page'])) {
            $current_settings['page'] = 1;
        }

        if ($this->input->post('btn_search', true)) {
            $current_settings['filters']['date_added'] = [
                'from'  => $this->input->post('date_added_from', true),
                'to'    => $this->input->post('date_added_to', true),
            ];
        }

        $this->load->model('operators/models/OperatorsStatisticsModel');
        $filters = [
            'operator_id' => intval($this->session->userdata('user_id')),
        ];
        if (!empty($current_settings['filters']['date_added']['from'])) {
            $filters['where_sql'][] = "date_added >= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['from'])) . " 00:00:00'";
        }
        if (!empty($current_settings['filters']['date_added']['to'])) {
            $filters['where_sql'][] = "date_added <= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['to'])) . " 23:59:59'";
        }

        $items_count = $this->OperatorsStatisticsModel->getCount($filters);

        if (!$page) {
            $page = $current_settings['page'];
        }
        $items_on_page            = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $this->load->helper('sort_order');
        $page                     = get_exists_page_number($page, $items_count, $items_on_page);
        $current_settings['page'] = $page;

        $search_params = [
            'date_added' => $current_settings['filters']['date_added'],
        ];
        $this->view->assign('search_params', $search_params);
        $this->session->set_userdata('operator_statistics_list', $current_settings);

        $total_amount = $this->OperatorsStatisticsModel->getTotalAmountByCriteria($filters);
        $this->view->assign('total_amount', $total_amount);
        $year_range = ['min' => '-' . (date('Y') - 2018), 'max' => 1];
        $this->view->assign('year_range', $year_range);

        if ($items_count > 0) {
            $statistics = $this->OperatorsStatisticsModel->getList($filters, $page, $items_on_page, ['date_added' => 'DESC']);
            $statistics = $this->OperatorsStatisticsModel->formatArray($statistics);
            $this->view->assign('statistics', $statistics);
        }

        $this->load->helper('navigation');
        $url       = site_url() . 'operator/start/statistics/';
        $page_data = get_admin_pages_data($url, $items_count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);

        $this->load->model('menu/models/Menu_model');
        $this->Menu_model->setMenuActiveItem('operator_menu', 'operator_statistics_item');

        $this->view->setHeader(l('admin_header_statistics', 'operators'));
        $this->view->render('statistics', 'operator', 'start');
    }
}
