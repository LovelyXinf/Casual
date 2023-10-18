<?php

namespace Pg\modules\operators\controllers;

use Pg\libraries\View;
use Pg\modules\operators\models\OperatorsModel;
use Pg\modules\operators\models\OperatorsStatisticsModel;

/**
 * Operators module
 * Admin side controller
 *
 * @package     PG_Dating
 * @subpackage  Operators
 * @category    controllers
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class AdminOperators extends \Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Menu_model',
            'Operators_model',
        ]);
        $this->Menu_model->set_menu_active_item('admin_menu', 'admin_operators_item');
    }

    public function index($filter = null, $order = null, $order_direction = null, $page = null)
    {
        $attrs            = [];
        $current_settings = isset($_SESSION['operators_list']) ? $_SESSION['operators_list'] : [];
        if (!isset($current_settings['filter'])) {
            $current_settings['filter'] = 'all';
        }
        if (!isset($current_settings['order'])) {
            $current_settings['order'] = 'nickname';
        }
        if (!isset($current_settings['order_direction'])) {
            $current_settings['order_direction'] = 'ASC';
        }
        if (!isset($current_settings['page'])) {
            $current_settings['page'] = 1;
        }

        $filter_data = [
            'all'        => $this->Operators_model->getCount(),
            'not_active' => $this->Operators_model->getCount(['is_active' => 0]),
            'active'     => $this->Operators_model->getCount(['is_active' => 1]),
        ];

        if (!$filter || !in_array($filter, ['all', 'active', 'not_active'])) {
            $filter = $current_settings['filter'];
        }
        $current_settings['filter'] = $filter;

        switch ($filter) {
            case 'active':
                $attrs['is_active'] = 1;
                break;
            case 'not_active':
                $attrs['is_active'] = 0;
                break;
            default:
                $filter = $current_settings['filter'];
        }

        $this->view->assign('filter', $filter);
        $this->view->assign('filter_data', $filter_data);

        if (!$order) {
            $order = $current_settings['order'];
        }
        $this->view->assign('order', $order);
        $current_settings['order'] = $order;

        if (!$order_direction) {
            $order_direction = $current_settings['order_direction'];
        }
        $this->view->assign('order_direction', $order_direction);
        $current_settings['order_direction'] = $order_direction;

        $operators_count = $filter_data[$filter];

        if (!$page) {
            $page = $current_settings['page'];
        }
        $items_on_page = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $this->load->helper('sort_order');
        $page                     = get_exists_page_number($page, $operators_count, $items_on_page);
        $current_settings['page'] = $page;

        $_SESSION['operators_list'] = $current_settings;

        $sort_links = [
            'nickname'           => site_url() . 'admin/operators/index/' . $filter . '/nickname/' . (($order != 'nickname' xor $order_direction == 'DESC') ? 'ASC' : 'DESC'),
            'email'              => site_url() . 'admin/operators/index/' . $filter . '/email/' . (($order != 'email' xor $order_direction == 'DESC') ? 'ASC' : 'DESC'),
            'date_created'       => site_url() . 'admin/operators/index/' . $filter . '/date_created/' . (($order != 'date_created' xor $order_direction == 'DESC') ? 'ASC' : 'DESC'),
        ];

        $this->view->assign('sort_links', $sort_links);

        if ($operators_count > 0) {
            $operators = $this->Operators_model->getList($attrs, $page, $items_on_page, [$order => $order_direction]);
            $this->view->assign('operators', $operators);
        }
        $this->load->helper('navigation');
        $url                      = site_url() . 'admin/operators/index/' . $filter . '/' . $order . '/' . $order_direction . '/';
        $page_data                = get_admin_pages_data($url, $operators_count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);

        $this->view->setHeader(l('admin_header_operators_list', 'operators'));
        $this->view->render('index');
    }

    public function edit($id = null)
    {
        $this->load->model('Field_editor_model');
        $this->Field_editor_model->initialize($this->Operators_model->form_editor_type);
        $sections      = $this->Field_editor_model->getSectionList();
        $sections_gids = $fields_for_select = [];
        if (!empty($sections)) {
            foreach ($sections as $section) {
                $sections_gids[] = $section['gid'];
            }
            $fields_for_select = $this->Field_editor_model->getFieldsForSelect($sections_gids);
            $this->Operators_model->setAdditionalFields($fields_for_select);
        }

        if ($id) {
            $operator = $this->Operators_model->getById($id);
        } else {
            $operator = [
                'lang_id'      => $this->pg_language->current_lang_id,
                'message_cost' => $this->pg_module->get_module_config('chatbox', 'operator_message_cost'),
            ];
        }

        if ($this->input->post('btn_save', true)) {
            $post_data = [
                'name'            => $this->input->post('name', true),
                'nickname'        => $this->input->post('nickname', true),
                'email'           => $this->input->post('email', true),
                'description'     => $this->input->post('description', true),
                'message_cost'    => $this->input->post('message_cost', true),
                'domain_id'       => $this->input->post('domain_id', true),
                'lang_id'         => intval($this->input->post('lang_id')),
            ];

            if (!$id || $this->input->post('update_password')) {
                $post_data['password']   = $this->input->post('password', true);
                $post_data['repassword'] = $this->input->post('repassword', true);
            }

            foreach ($fields_for_select as $field) {
                $post_data[$field] = $this->input->post($field, true);
            }

            $validate_data = $this->Operators_model->validate($id, $post_data, $sections_gids);

            if (!empty($validate_data['errors'])) {
                $this->system_messages->addMessage(View::MSG_ERROR, $validate_data['errors']);
                $operator = array_merge($operator, $validate_data['data']);
            } else {
                $save_data = $validate_data['data'];
                $new_id = $this->Operators_model->save($id, $save_data);

                if ($id) {
                    $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_update_operator', 'operators'));
                } else {
                    $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_add_operator', 'operators'));
                }

                $this->view->setRedirect(site_url() . 'admin/operators/edit/' . $new_id);
            }
        }

        if (!empty($sections_gids)) {
            $fields_data = $this->Field_editor_model->getFormFieldsList($operator, ['where_in' => ['section_gid' => $sections_gids]]);
            $this->view->assign('fields_data', $fields_data);
        }

        $this->view->assign('operator', $operator);

        $this->load->model('start/models/StartDomainsModel');
        $domains = $this->StartDomainsModel->getList();
        $this->view->assign('domains', $domains);

        $this->view->setHeader(l('admin_header_operator_edit', 'operators'));
        $this->view->setBackLink(site_url() . 'admin/operators');
        $this->view->render('edit');
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $this->Operators_model->delete($id);
            $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_delete_operator', 'operators'));
        }
        $this->view->setRedirect(site_url() . 'admin/operators');
    }

    public function activate($id, $status = 0)
    {
        if (!empty($id)) {
            $this->Operators_model->setActivityStatus($id, $status);
            if ($status) {
                $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_activate_operator', 'operators'));
            } else {
                $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_deactivate_operator', 'operators'));
            }
        }
        $this->view->setRedirect(site_url() . 'admin/operators');
    }

    public function settings()
    {
        $settings_map = [
            ['module' => 'chatbox', 'gid' => 'operator_message_min_chars', 'type' => 'int', 'value' => '0'],
            ['module' => 'chatbox', 'gid' => 'operator_message_max_chars', 'type' => 'int', 'value' => '0'],
            ['module' => 'chatbox', 'gid' => 'operator_message_time_to_answer', 'type' => 'int', 'value' => '0'],
            ['module' => 'chatbox', 'gid' => 'operator_message_cost', 'type' => 'float', 'value' => '0'],
            // ['module' => 'payments', 'gid' => 'min_withdraw_money_amount', 'type' => 'float', 'value' => '0'],
            // ['module' => 'payments', 'gid' => 'withdraw_money_notif_email', 'type' => 'email', 'value' => ''],
        ];

        if ($this->input->post('btn_save', true)) {
            foreach ($settings_map as $sett) {
                switch ($sett['type']) {
                    case 'int':
                        $value = intval($this->input->post($sett['gid'], true));
                        break;
                    case 'float':
                        $value = floatval($this->input->post($sett['gid'], true));
                        break;
                    case 'email':
                        $value = filter_var($this->input->post($sett['gid'], true), FILTER_VALIDATE_EMAIL);
                        if (empty($value)) {
                            $value = '';
                        }
                        break;
                    default:
                        $value = trim(strip_tags($this->input->post($sett['gid'], true)));
                        break;
                }

                $this->pg_module->set_module_config($sett['module'], $sett['gid'], $value);
            }

            $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_save_settings', 'start'));
            $this->view->setRedirect(site_url() . 'admin/operators/settings');
        }

        $settings = [];
        foreach ($settings_map as $sett) {
            $settings[$sett['gid']] = $this->pg_module->get_module_config($sett['module'], $sett['gid']);
        }
        $this->view->assign('settings', $settings);

        $this->view->setHeader(l('admin_header_settings', 'operators'));
        $this->view->setBackLink(site_url() . 'admin/operators');
        $this->view->render('settings');
    }

    public function statistics($id = 0, $section = '', $page = null)
    {
        if ($id) {
            $operator = $this->Operators_model->getById($id);
            if (empty($operator)) {
                $this->view->setRedirect(site_url() . 'admin/operators/index');
            }
            $operator = $this->Operators_model->format($operator);
            $this->view->assign('operator', $operator);
        }

        if (!in_array($section, ['earning', 'timing', 'messages'])) {
            $section = 'timing';
        }

        if ($section == 'timing') {
            $this->timingStatistics($id, $page);
        } elseif ($section == 'messages') {
            $this->messagesStatistics($id, $page);
        } else {
            $this->earningStatistics($id, $page);
        }

        $this->view->assign('operator_id', $id);
        $this->view->assign('section', $section);
        if ($id) {
            $this->view->setHeader($operator['output_name'] . ': ' . l('admin_header_statistics', 'operators'));
        } else {
            $this->view->setHeader(l('admin_header_operators_list', 'operators') . ': ' . l('admin_header_statistics', 'operators'));
        }
        $this->view->setBackLink(site_url() . 'admin/operators');
        $this->view->render('statistics');
    }

    // public function statisticsQuickFilter($id = 0, $section = 'earning', $filter = '', $date_from = '', $date_to = '')
    // {
    //     $filters = ['today', 'yesterday', 'last_week', 'this_month', 'last_month', 'year_to_date', 'last_year', 'all_time', 'default'];
    //     if (!in_array($filter, $filters)) {
    //         $filter = 'all_time';
    //     }

    //     switch ($filter) {
    //         case 'today':
    //             $date_from = $date_to = date('Y-m-d');
    //             break;
    //         case 'yesterday':
    //             $date_from = $date_to = date('Y-m-d', strtotime('yesterday'));
    //             break;
    //         case 'last_week':
    //             $date_from = date('Y-m-d', strtotime('-1 week'));
    //             $date_to   = date('Y-m-d');
    //             break;
    //         case 'this_month':
    //             $date_from = date('Y-m-d', strtotime('first day of this month'));
    //             $date_to   = date('Y-m-d');
    //             break;
    //         case 'last_month':
    //             $date_from = date('Y-m-d', strtotime('-1 month'));
    //             $date_to   = date('Y-m-d');
    //             break;
    //         case 'year_to_date':
    //             $date_from = date('Y') . '-01-01';
    //             $date_to   = date('Y-m-d');
    //             break;
    //         case 'last_year':
    //             $date_from = date('Y-m-d', strtotime('-1 year'));
    //             $date_to   = date('Y-m-d');
    //             break;
    //         case 'default':
    //             $date_from = date('Y-m-d', strtotime($date_from));
    //             $date_to   = date('Y-m-d', strtotime($date_to));
    //             break;
    //     }

    //     if ($section == 'timing') {
    //         $current_settings = $this->session->userdata('ostat_timing') ?: [];
    //         $current_settings['filters']['date']['from'] = $date_from;
    //         $current_settings['filters']['date']['to']   = $date_to;
    //         $this->session->set_userdata('ostat_timing', $current_settings);
    //     } elseif ($section == 'messages') {
    //         $current_settings = $this->session->userdata('ostat_messages') ?: [];
    //         $current_settings['filters']['date_added']['from'] = $date_from;
    //         $current_settings['filters']['date_added']['to']   = $date_to;
    //         $this->session->set_userdata('ostat_messages', $current_settings);
    //     } else {
    //         $current_settings = $this->session->userdata('ostat_earning') ?: [];
    //         $current_settings['filters']['date_added']['from'] = $date_from;
    //         $current_settings['filters']['date_added']['to']   = $date_to;
    //         $this->session->set_userdata('ostat_earning', $current_settings);
    //     }

    //     $this->view->setRedirect(site_url() . 'admin/operators/statistics/' . $id . '/' . $section . '/1');
    // }

    protected function earningStatistics($id = 0, $page = null)
    {
        $current_settings = $this->session->userdata('ostat_earning') ?: [];
        if (!$page) {
            $current_settings = [];
        }

        if (!isset($current_settings['filters'])) {
            $current_settings['filters'] = [
                'date_added'  => ['from' => '', 'to' => ''],
                'operator_id' => '',
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
            $current_settings['filters']['operator_id'] = $this->input->post('operator_id', true);
        }

        if ($id) {
            $current_settings['filters']['operator_id'] = $id;
        }

        $filters = [];
        if (!empty($current_settings['filters']['date_added']['from'])) {
            $filters['where_sql'][] = "date_added >= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['from'])) . " 00:00:00'";
        }
        if (!empty($current_settings['filters']['date_added']['to'])) {
            $filters['where_sql'][] = "date_added <= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['to'])) . " 23:59:59'";
        }
        if (!empty($current_settings['filters']['operator_id'])) {
            $filters['operator_id'] = $current_settings['filters']['operator_id'];
        }

        $this->load->model('operators/models/Operators_statistics_model');
        $items_count = $this->Operators_statistics_model->getCount($filters);

        if (!$page) {
            $page = $current_settings['page'];
        }
        $items_on_page            = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $this->load->helper('sort_order');
        $page                     = get_exists_page_number($page, $items_count, $items_on_page);
        $current_settings['page'] = $page;

        $search_params = [
            'date_added'  => $current_settings['filters']['date_added'],
            'operator_id' => $current_settings['filters']['operator_id'],
        ];
        $this->view->assign('search_params', $search_params);
        $this->session->set_userdata('ostat_earning', $current_settings);

        $total_amount = $this->Operators_statistics_model->getTotalAmountByCriteria($filters);
        $this->view->assign('total_amount', $total_amount);
        $year_range = ['min' => '-' . (date('Y') - 2018), 'max' => 1];
        $this->view->assign('year_range', $year_range);

        if ($items_count > 0) {
            $statistics = $this->Operators_statistics_model->getList($filters, $page, $items_on_page, ['date_added' => 'DESC']);
            if (!$id) {
                $this->Operators_statistics_model->setFormatSettings('get_operator', true);
            }
            $statistics = $this->Operators_statistics_model->formatArray($statistics);
            if (!$id) {
                $this->Operators_statistics_model->setFormatSettings('get_operator', false);
            }
            $this->view->assign('statistics', $statistics);
        }

        $this->load->helper('navigation');
        $url       = site_url() . "admin/operators/statistics/{$id}/earning/";
        $page_data = get_admin_pages_data($url, $items_count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);
    }

    protected function timingStatistics($id, $page = null)
    {
        $current_settings = $this->session->userdata('ostat_timing') ?: [];
        if (!$page) {
            $current_settings = [];
        }

        if (!isset($current_settings['filters'])) {
            $current_settings['filters'] = [
                'date'        => ['from' => '', 'to' => ''],
                'operator_id' => '',
            ];
        }
        if (!isset($current_settings['page'])) {
            $current_settings['page'] = 1;
        }

        if ($this->input->post('btn_search', true)) {
            $current_settings['filters']['date'] = [
                'from'  => $this->input->post('date_from', true),
                'to'    => $this->input->post('date_to', true),
            ];
            $current_settings['filters']['operator_id'] = $this->input->post('operator_id', true);
        }

        if ($id) {
            $current_settings['filters']['operator_id'] = $id;
        }

        $filters = [];
        if (!empty($current_settings['filters']['date']['from'])) {
            $filters['where_sql'][] = "date_start >= '" . date('Y-m-d', strtotime($current_settings['filters']['date']['from'])) . " 00:00:00'";
        }
        if (!empty($current_settings['filters']['date']['to'])) {
            $filters['where_sql'][] = "date_end <= '" . date('Y-m-d', strtotime($current_settings['filters']['date']['to'])) . " 23:59:59'";
        }
        if (!empty($current_settings['filters']['operator_id'])) {
            $filters['operator_id'] = $current_settings['filters']['operator_id'];
        }

        $this->load->model('chatbox/models/Chatbox_operator_timing_model');
        $items_count = $this->Chatbox_operator_timing_model->getCount($filters);

        if (!$page) {
            $page = $current_settings['page'];
        }
        $items_on_page            = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $this->load->helper('sort_order');
        $page                     = get_exists_page_number($page, $items_count, $items_on_page);
        $current_settings['page'] = $page;

        $search_params = [
            'date'        => $current_settings['filters']['date'],
            'operator_id' => $current_settings['filters']['operator_id'],
        ];
        $this->view->assign('search_params', $search_params);
        $this->session->set_userdata('ostat_timing', $current_settings);

        $year_range = ['min' => '-' . (date('Y') - 2018), 'max' => 1];
        $this->view->assign('year_range', $year_range);

        $total_messages_count = $this->Chatbox_operator_timing_model->getFieldSumByCriteria('messages_count', $filters);
        $this->view->assign('total_messages_count', $total_messages_count);
        $total_chat_time = $this->Chatbox_operator_timing_model->getFieldSumByCriteria('chat_time', $filters);
        $this->view->assign('total_chat_time', $this->Chatbox_operator_timing_model->formatTime($total_chat_time));

        if ($items_count > 0) {
            $timing_items = $this->Chatbox_operator_timing_model->getList($filters, $page, $items_on_page, ['date_end' => 'DESC']);
            if (!$id) {
                $this->Chatbox_operator_timing_model->setFormatSettings('get_operator', true);
            }
            $timing_items = $this->Chatbox_operator_timing_model->formatArray($timing_items);
            if (!$id) {
                $this->Chatbox_operator_timing_model->setFormatSettings('get_operator', false);
            }
            $this->view->assign('timing_items', $timing_items);
        }

        $this->load->helper('navigation');
        $url       = site_url() . "admin/operators/statistics/{$id}/timing/";
        $page_data = get_admin_pages_data($url, $items_count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);
    }

    protected function messagesStatistics($id, $page = null)
    {
        $current_settings = $this->session->userdata('ostat_messages') ?: [];
        if (!$page) {
            $current_settings = [];
        }

        if (!isset($current_settings['filters'])) {
            $current_settings['filters'] = [
                'date_added'  => ['from' => '', 'to' => ''],
                'operator_id' => '',
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
            $current_settings['filters']['operator_id'] = $this->input->post('operator_id', true);
        }

        if ($id) {
            $current_settings['filters']['operator_id'] = $id;
        }

        $filters = ['type' => OperatorsStatisticsModel::TYPE_MESSAGE];
        if (!empty($current_settings['filters']['date_added']['from'])) {
            $filters['where_sql'][] = "date_added >= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['from'])) . " 00:00:00'";
        }
        if (!empty($current_settings['filters']['date_added']['to'])) {
            $filters['where_sql'][] = "date_added <= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['to'])) . " 23:59:59'";
        }
        if (!empty($current_settings['filters']['operator_id'])) {
            $filters['operator_id'] = $current_settings['filters']['operator_id'];
        }

        $this->load->model('operators/models/Operators_statistics_model');
        $items_count = $this->Operators_statistics_model->getCount($filters);

        if (!$page) {
            $page = $current_settings['page'];
        }
        $items_on_page            = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $this->load->helper('sort_order');
        $page                     = get_exists_page_number($page, $items_count, $items_on_page);
        $current_settings['page'] = $page;

        $search_params = [
            'date_added'  => $current_settings['filters']['date_added'],
            'operator_id' => $current_settings['filters']['operator_id'],
        ];
        $this->view->assign('search_params', $search_params);
        $this->session->set_userdata('ostat_messages', $current_settings);

        $year_range = ['min' => '-' . (date('Y') - 2018), 'max' => 1];
        $this->view->assign('year_range', $year_range);

        if ($items_count > 0) {
            $statistics = $this->Operators_statistics_model->getList($filters, $page, $items_on_page, ['date_added' => 'DESC']);
            $this->Operators_statistics_model->setFormatSettings('get_message', true);
            if (!$id) {
                $this->Operators_statistics_model->setFormatSettings('get_operator', true);
            }
            $statistics = $this->Operators_statistics_model->formatArray($statistics);
            $this->Operators_statistics_model->setFormatSettings('get_message', false);
            if (!$id) {
                $this->Operators_statistics_model->setFormatSettings('get_operator', false);
            }
            $this->view->assign('statistics', $statistics);
        }

        $this->load->helper('navigation');
        $url       = site_url() . "admin/operators/statistics/{$id}/messages/";
        $page_data = get_admin_pages_data($url, $items_count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);
    }

    public function ajaxGetOperatorsForm($max_select = 1)
    {
        $selected = $this->input->post('selected', true);
        $rand     = $this->input->post('rand', true);

        if (!empty($selected)) {
            $data['selected'] = $this->Operators_model->getList(
                ['id' => $selected],
                null,
                null,
                ['nickname' => 'ASC']
            );
        } else {
            $data['selected'] = [];
        }
        $data['max_select'] = $max_select ? $max_select : 0;
        $data['rand']       = $rand;

        $this->view->assign('select_data', $data);
        $this->view->render('ajax_operator_select_form');
    }

    public function ajaxGetOperatorsData($page = 1)
    {
        $return     = [];
        $filters    = [];

        if (!$page) {
            $page = intval($this->input->post('page', true)) ?: 1;
        }

        $search_string = trim(strip_tags($this->input->post('search', true)));
        if (!empty($search_string)) {
            $search_string_escape  = $this->db->escape('%' . $search_string . '%');
            $filters['where_sql'][] = '(nickname LIKE ' . $search_string_escape
                . ' OR name LIKE ' . $search_string_escape . ')';
        }

        $selected = $this->input->post('selected', true);
        if (!empty($selected)) {
            $filters['where_sql'][] = 'id NOT IN (' . implode($selected) . ')';
        }

        $items_on_page = $this->pg_module->get_module_config(
            'start',
            'admin_items_per_page'
        );
        $items         = $this->Operators_model->getListByKey(
            $filters,
            $page,
            $items_on_page,
            ['nickname' => 'ASC']
        );
        $items = array_map(function ($arr) {
            return array_intersect_key($arr, array_flip(['id', 'nickname', 'name']));
        }, $items);

        $return['all']          = $this->Operators_model->getCount($filters);
        $return['items']        = $items;
        $return['current_page'] = $page;
        $return['pages']        = ceil($return['all'] / $items_on_page);

        exit(json_encode($return));
    }

    public function ajaxGetSelectedOperators()
    {
        $return   = [];

        $selected = $this->input->post('selected', true);
        $selected = array_slice(array_unique(array_map(
            'intval',
            (array) $selected
        )), 0, 1000);

        if (!empty($selected)) {
            $return['selected'] = $this->Operators_model->getList(
                ['id' => $selected],
                null,
                null,
                ['nickname' => 'asc']
            );

            $return['selected'] = array_map(function ($arr) {
                return array_intersect_key($arr, array_flip(['id', 'nickname', 'name']));
            }, $return['selected']);
        } else {
            $return['selected'] = [];
        }

        exit(json_encode($return));
    }

    public function withdrawMoneyList($operator_id, $page = null)
    {
        $operator = $this->Operators_model->getById($operator_id);
        if (empty($operator)) {
            $this->view->setRedirect(site_url() . 'admin/operators/index');
        }
        $operator = $this->Operators_model->format($operator);
        $this->view->assign('operator', $operator);

        $current_settings = $this->session->userdata('operators_wmoney_list') ?: [];
        if (!$page) {
            $current_settings = [];
        }

        if (!isset($current_settings['filters'])) {
            $current_settings['filters'] = [
                'date_added'    => ['from' => '', 'to' => ''],
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

        $filters = [
            'user_id'   => $operator_id,
        ];
        if (!empty($current_settings['filters']['date_added']['from'])) {
            $filters['where_sql'][] = "date_added >= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['from'])) . " 00:00:00'";
        }
        if (!empty($current_settings['filters']['date_added']['to'])) {
            $filters['where_sql'][] = "date_added <= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['to'])) . " 23:59:59'";
        }

        $this->load->model('payments/models/PaymentsWithdrawMoneyModel');
        $items_count = $this->PaymentsWithdrawMoneyModel->getCount($filters);

        if (!$page) {
            $page = $current_settings['page'];
        }
        $items_on_page            = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $this->load->helper('sort_order');
        $page                     = get_exists_page_number($page, $items_count, $items_on_page);
        $current_settings['page'] = $page;

        $search_params = [
            'date_added'    => $current_settings['filters']['date_added'],
        ];
        $this->view->assign('search_params', $search_params);
        $this->session->set_userdata('operators_wmoney_list', $current_settings);

        $year_range = ['min' => '-' . (date('Y') - 2019), 'max' => 1];
        $this->view->assign('year_range', $year_range);

        if ($items_count > 0) {
            $items = $this->PaymentsWithdrawMoneyModel->getList($filters, $page, $items_on_page, ['date_added' => 'DESC']);
            $items = $this->PaymentsWithdrawMoneyModel->formatArray($items);
            $this->view->assign('items', $items);
        }

        $this->load->helper('navigation');
        $url       = site_url() . "admin/operators/withdraw_money_list/{$operator_id}/";
        $page_data = get_admin_pages_data($url, $items_count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);

        $this->view->setHeader($operator['output_name'] . ': ' . l('admin_header_withdraw_money_list', 'payments'));
        $this->view->setBackLink(site_url('admin/operators'));
        $this->view->render('withdraw_money_list');
    }

    public function logoutOperator($operator_id)
    {
        $operator = $this->Operators_model->getById($operator_id);
        if (!empty($operator)) {
            $to_logout_by_admin = 0;
            if ($operator['is_online']) {
                $to_logout_by_admin = 1;
            }
            $this->Operators_model->save($operator_id, [
                'is_online'             => 0,
                'to_logout_by_admin'    => $to_logout_by_admin,
            ]);

            $this->load->model('chatbox/models/ChatboxDealerModel');
            $this->ChatboxDealerModel->callbackOperatorOnlineStatus($operator_id, 0);
        }

        $this->view->setRedirect(site_url('admin/operators/index'));
    }
}
