<?php

namespace Pg\modules\payments\controllers;

use Pg\libraries\View;
use Pg\modules\users\models\UsersModel;

/**
 * Payments admin side controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * */
class AdminPayments extends \Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->Menu_model->set_menu_active_item('admin_menu', 'payments_menu_item');
    }

    /**
     * Index page
     *
     * @return void
     */
    public function index($filter = 'all', $payment_type_gid = '', $system_gid = '', $order = 'date_add', $order_direction = 'DESC', $page = 1)
    {
        $menu_data = $this->Menu_model->get_menu_by_gid('admin_menu');
        $menu_item = $this->Menu_model->get_menu_item_by_gid('payments_menu_item', $menu_data['id']);

        $user_type = $this->session->userdata('user_type');
        if ($user_type == 'admin') {
            $menu_data['check_permissions'] = false;
            $permissions                    = [];
        } else {
            $menu_data['check_permissions'] = true;
            $permissions                    = $this->session->userdata('permission_data');
        }
        $sections = $this->Menu_model->get_menu_active_items_list($menu_data['id'], $menu_data['check_permissions'], ['moderate_sections' => 'page_sections'], $menu_item['id'], $permissions);

        if (empty($sections)) {
            $this->paymentsList($filter, $payment_type_gid, $system_gid, $order, $order_direction, $page);
            return;
        }

        $this->view->setHeader(l('admin_header_payments_list', 'payments'));
        $this->view->assign('options', $sections);
        $this->view->render('menu_list', 'admin', 'start');
    }

    /**
     * Payments list
     * @param string $filter
     * @param string $payment_type_gid
     * @param string $system_gid
     * @param string $order
     * @param string $order_direction
     * @param integer $page
     * @return void
     */
    public function paymentsList($filter = 'all', $payment_type_gid = '', $system_gid = '', $order = 'date_add', $order_direction = 'DESC', $page = 1)
    {
        $this->load->model('Payments_model');
        $search_params = $params = [];

        if (!in_array($filter, ['all', 'wait', 'approve', 'decline'])) {
            $filter = 'all';
        }

        $current_settings = isset($_SESSION['pay_list']) ? $_SESSION['pay_list']
                : [];
        if (!isset($current_settings['filter'])) {
            $current_settings['filter'] = 'all';
        }
        if (!isset($current_settings['payment_type_gid'])) {
            $current_settings['payment_type_gid'] = 'all';
        }
        if (!isset($current_settings['system_gid'])) {
            $current_settings['system_gid'] = 'all';
        }
        if (!isset($current_settings['order'])) {
            $current_settings['order'] = 'status';
        }
        if (!isset($current_settings['order_direction'])) {
            $current_settings['order_direction'] = 'ASC';
        }
        if (!isset($current_settings['page'])) {
            $current_settings['page'] = 1;
        }
        if (empty($payment_type_gid)) {
            $payment_type_gid = $current_settings['payment_type_gid'];
        }
        $this->view->assign('payment_type_gid', $payment_type_gid);
        $current_settings['payment_type_gid'] = $payment_type_gid;

        if ($payment_type_gid != '' && $payment_type_gid != 'all') {
            if ($payment_type_gid == 'access_permissions') {
                $search_params['where_sql'][] = 'payment_type_gid LIKE "' . $payment_type_gid . '%"';
            } else {
                $params['where']['payment_type_gid']        = $payment_type_gid;
                $search_params['where']['payment_type_gid'] = $payment_type_gid;
            }
        }

        if (empty($system_gid)) {
            $system_gid = $current_settings['system_gid'];
        }
        $this->view->assign('system_gid', $system_gid);
        $current_settings['system_gid'] = $system_gid;

        if ($system_gid != '' && $system_gid != 'all') {
            $params['where']['system_gid']        = $search_params['where']['system_gid']
                                                  = $system_gid;
        }

        $filter_data['all']        = $this->Payments_model->get_payment_count();
        $params['where']['status'] = 0;
        $filter_data['wait']       = $this->Payments_model->get_payment_count($params);
        $params['where']['status'] = 1;
        $filter_data['approve']    = $this->Payments_model->get_payment_count($params);
        $params['where']['status'] = -1;
        $filter_data['decline']    = $this->Payments_model->get_payment_count($params);

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

        $payments_count = $filter_data[$filter];

        if (!$page) {
            $page = $current_settings['page'];
        }
        $items_on_page = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $this->load->helper('sort_order');
        $page                     = get_exists_page_number($page, $payments_count, $items_on_page);
        $current_settings['page'] = $page;

        $_SESSION['pay_list'] = $current_settings;

        $sort_links = [
            'amount' => site_url() . 'admin/payments/paymentsList/' . $filter . '/' . $payment_type_gid . '/' . $system_gid . '/amount/' . (($order
            != 'amount' xor $order_direction == 'DESC') ? 'ASC' : 'DESC'),
            'date_add' => site_url() . 'admin/payments/paymentsList/' . $filter . '/' . $payment_type_gid . '/' . $system_gid . '/date_add/' . (($order
            != 'date_add' xor $order_direction == 'DESC') ? 'ASC' : 'DESC'),
        ];

        $this->view->assign('sort_links', $sort_links);

        if ($payments_count > 0) {
            switch ($filter) {
                case 'all': break;
                case 'wait': $search_params['where']['status'] = 0;
                    break;
                case 'approve': $search_params['where']['status'] = 1;
                    break;
                case 'decline': $search_params['where']['status'] = -1;
                    break;
            }

            if ($order === 'amount') {
                $order_data['operation_type'] = ($order_direction === 'DESC') ? 'ASC' : 'DESC';
            }
            $order_data[$order] = $order_direction;
            $payments           = $this->Payments_model->getPaymentList($page, $items_on_page, $order_data, $search_params);
            $this->view->assign('payments', $payments);
        }
        $this->load->helper('navigation');
        $url       = site_url() . 'admin/payments/paymentsList/' . $filter . '/' . $payment_type_gid . '/' . $system_gid . '/' . $order . '/' . $order_direction . '/';
        $page_data = get_admin_pages_data(
            $url,
            $payments_count,
            $items_on_page,
            $page,
            'briefPage'
        );
        $page_data['date_format'] = $this->pg_date->get_format('date_time_literal', 'st');
        $this->view->assign('page_data', $page_data);

        $this->view->assign('payment_types', $this->Payments_model->getAdminPaymentsTypesList());
        $this->view->assign('systems', $this->Payments_model->getAdminPaymentsSystemsList());

        $this->Menu_model->set_menu_active_item(
            'admin_payments_menu',
            'payments_list_item'
        );
        $this->view->setHeader(l('admin_header_payments_list', 'payments'));
        $this->view->setBackLink(site_url() . 'admin/payments/index');
        $this->view->render('list_payments');
    }

    public function paymentStatus($status_txt, $id_payment)
    {
        $this->load->model('Payments_model');
        $payment_data = $this->Payments_model->getPaymentById($id_payment);

        switch ($status_txt) {
            case 'approve':
                $payment_data['status'] = 1;
                $message                = l('success_approve_payment', 'payments');
                if ($payment_data['system_gid'] == 'offline') {
                    $this->load->model('Users_model');
                    $user      = $this->Users_model->getUserById($payment_data['id_user'], true);
                    $mail_data = [
                        'user'    => UsersModel::formatUserName($user),
                        'payment' => $payment_data['payment_data']['name'],
                        'status'  => l('payment_status_approved', 'payments', $user['lang_id'])
                    ];
                    $this->load->model('Notifications_model');
                    $this->Notifications_model->sendNotification(
                        $user['email'],
                        'payment_status_updated',
                        $mail_data,
                        '',
                        $user['lang_id']
                    );
                }
                break;
            case 'decline':
                $payment_data['status'] = -1;
                $message                = l('success_decline_payment', 'payments');
                if ($payment_data['system_gid'] == 'offline') {
                    $this->load->model('Users_model');
                    $user      = $this->Users_model->getUserById($payment_data['id_user'], true);
                    $mail_data = [
                        'user'    => UsersModel::formatUserName($user),
                        'payment' => $payment_data['payment_data']['name'],
                        'status'  => l('payment_status_declined', 'payments')
                    ];
                    $this->load->model('Notifications_model');
                    $this->Notifications_model->sendNotification(
                        $user['email'],
                        'payment_status_updated',
                        $mail_data,
                        '',
                        $user['lang_id']
                    );
                }
                break;
            default:
                $payment_data['status'] = 0;
                $message                = '';
        }
        $this->load->helper('payments');
        \Pg\modules\payments\helpers\receivePayment('manual', $payment_data);
        if ($message) {
            $this->system_messages->addMessage(View::MSG_SUCCESS, $message);
        }

        $cur_set = $_SESSION['pay_list'];
        $url     = site_url() . 'admin/payments/paymentsList';
        redirect($url);
    }

    public function systems($filter = 'all')
    {
        $this->load->model('payments/models/Payment_systems_model');

        if (!in_array($filter, ['all', 'used'])) {
            $filter = 'all';
        }

        $current_settings = isset($_SESSION['systems_list']) ? $_SESSION['systems_list']
                : [];
        if (!isset($current_settings['filter'])) {
            $current_settings['filter'] = $filter;
        }
        $_SESSION['systems_list'] = $current_settings;

        $filter_data['all']        = $this->Payment_systems_model->get_system_count();
        $params                    = [];
        $params['where']['in_use'] = 1;
        $filter_data['used']       = $this->Payment_systems_model->get_system_count($params);

        $this->view->assign('filter', $filter);
        $this->view->assign('filter_data', $filter_data);

        $systems_count = $filter_data[$filter];

        if ($systems_count > 0) {
            switch ($filter) {
                case 'all': $params                    = [];
                    break;
                case 'used': $params['where']['in_use'] = 1;
                    break;
            }

            $order_by['name'] = 'ASC';
            $systems          = $this->Payment_systems_model->get_system_list(
                $params,
                null,
                $order_by
            );
            $this->view->assign('systems', $systems);
        }

        $this->load->helper('navigation');
        $page_data['date_format'] = $this->pg_date->get_format(
            'date_time_literal',
            'st'
        );

        $this->view->assign('page_data', $page_data);
        $this->view->assign('TRIAL_MODE', TRIAL_MODE);

        $this->Menu_model->set_menu_active_item(
            'admin_payments_menu',
            'systems_list_item'
        );
        $this->view->setHeader(l('admin_header_systems_list', 'payments'));
        $this->view->setBackLink(site_url() . 'admin/payments/index');
        $this->view->render('list_systems');
    }

    /**
     *  Install payments
     *
     *   @return void
     */
    public function install()
    {
        $this->load->model('payments/models/Payment_systems_model');
        $payments            = $this->Payment_systems_model->getInstallSystemData();
        $filter_data['all']  = $this->Payment_systems_model->getSystemCount();
        $filter_data['used'] = $this->Payment_systems_model->getSystemCount(['where' => ['in_use' => 1]]);
        $this->view->assign('filter_data', $filter_data);
        $this->view->assign('payments', $payments);
        $this->Menu_model->set_menu_active_item('admin_payments_menu', 'systems_list_item');
        $this->view->setHeader(l('admin_header_systems_list', 'payments'));
        $this->view->render('list_install');
    }

    public function installPayment($gid = null)
    {
        if (!empty($gid)) {
            $this->load->model('payments/models/Payment_systems_model');
            $this->Payment_systems_model->loadDriver($gid);
            $system_data = $this->Payment_systems_model->getSystemData();

            if (!empty($system_data)) {
                if (isset($system_data['create_table']) && $system_data['create_table']) {
                    unset($system_data['create_table']);
                    $this->Payment_systems_model->createTableData();
                }

                $payment_id = $this->Payment_systems_model->saveSystem(null, $system_data);
                if (!empty($payment_id)) {
                    redirect(site_url() . 'admin/payments/system_edit/' . $gid);
                }
            }
        }
    }

    public function systemDelete($system_gid)
    {
        $this->load->model('payments/models/Payment_systems_model');
        $data = $this->Payment_systems_model->delete_system_by_gid($system_gid);

        $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_deleted_system', 'payments'));
        redirect(site_url() . 'admin/payments/systems/');
    }

    public function systemEdit($system_gid)
    {
        $this->load->model('payments/models/Payment_systems_model');

        $data = $this->Payment_systems_model->get_system_by_gid($system_gid);
        $this->Payment_systems_model->load_driver($system_gid);
        $data['map'] = $this->Payment_systems_model->get_system_data_map();

        if (!empty($data['map'])) {
            foreach (array_keys($data['map']) as $param_id) {
                if (isset($data['settings_data'][$param_id])) {
                    if (is_array($data['map'][$param_id])) {
                        $data['map'][$param_id]['value'] = $data['settings_data'][$param_id];
                    }
                } else {
                    if (is_array($data['map'][$param_id])) {
                        $data['map'][$param_id]['value'] = '';
                    }
                }
            }
        }

        if ($this->input->post('btn_save')) {
            $validate_settings_data = $this->Payment_systems_model->validate_system_settings(
                $this->input->post('map', true)
            );

            $validate_tarifs_data   = $this->Payment_systems_model->validate_tarifs_data(
                (array) $this->input->post('tarifs_data', true)
            );
            $validate_info_data     = $this->Payment_systems_model->validateInfoData(
                $this->input->post('info', true)
            );
            if (!empty($validate_settings_data['errors']) || $validate_info_data['errors']) {
                $errors = array_merge(
                    $validate_settings_data['errors'],
                    $validate_info_data['errors'],
                    $validate_tarifs_data['errors']
                );
                $this->system_messages->addMessage(View::MSG_ERROR, $errors);
            } else {
                $system_post_data['gid']           = $data['gid'];
                $system_post_data['settings_data'] = $validate_settings_data['data'];
                $system_post_data['tarifs_data']   = $validate_tarifs_data['data'];
                $system_post_data['info_data']     = $validate_info_data['data'];
                if ($data['tarifs_editable']) {
                    $system_post_data['tarifs_type'] = $this->input->post(
                        'tarifs_type',
                        true
                    );
                }
                $system_data = $this->Payment_systems_model->validate_system(
                    $data['id'],
                    $system_post_data
                );
                $this->uploadLogo($system_post_data['gid']);
                if (!empty($system_data['errors'])) {
                    $this->system_messages->addMessage(
                        View::MSG_ERROR,
                        $system_data['errors']
                    );
                } else {
                    $this->Payment_systems_model->save_system(
                        $data['id'],
                        $system_data['data']
                    );
                }

                $this->system_messages->addMessage(
                    View::MSG_SUCCESS,
                    l('success_update_system_data', 'payments')
                );
                $cur_set = $_SESSION['systems_list'];
                redirect(site_url() . 'admin/payments/systems/' . $cur_set['filter']);
            }
        }

        $this->view->assign('data', $data);

        $system_tarifs_block = $this->getSystemTarifs($data);
        $this->view->assign('system_tarifs_block', $system_tarifs_block);

        $this->view->assign(
            'current_lang_id',
            $this->pg_language->current_lang_id
        );
        $this->view->assign('langs', $this->pg_language->languages);

        $this->Menu_model->set_menu_active_item(
            'admin_payments_menu',
            'systems_list_item'
        );
        $this->view->setHeader(l('admin_header_systems_list', 'payments'));
        $this->view->render('edit_system');
    }

    private function uploadLogo($system_gid)
    {
        // Logo
        if (isset($_FILES['logo']) && is_array($_FILES['logo']) && is_uploaded_file($_FILES['logo']['tmp_name'])) {
            $size   = [
                'width'  => 100,
                'height' => 100,
            ];
            $upload = $this->Payment_systems_model->upload_logo(
                $system_gid,
                $size
            );
            if (!empty($upload['error'])) {
                $this->system_messages->addMessage(
                    View::MSG_ERROR,
                    $upload['error']
                );
            } else {
                $this->system_messages->addMessage(
                    View::MSG_SUCCESS,
                    l('success_uploaded_logo', 'themes')
                );
            }
        } elseif ($this->input->post('logo_delete') == '1') {
            $this->Payment_systems_model->delete_logo($system_gid);
            $this->system_messages->addMessage(
                View::MSG_SUCCESS,
                l('success_delete_logo', 'payments')
            );
        }
    }

    public function systemUse($system_gid, $status = 0)
    {
        $this->load->model('payments/models/Payment_systems_model');
        $this->Payment_systems_model->use_system($system_gid, $status);

        if ($status) {
            $this->system_messages->addMessage(
                View::MSG_SUCCESS,
                l('success_activate_system', 'payments')
            );
        } else {
            $this->system_messages->addMessage(
                View::MSG_SUCCESS,
                l('success_deactivate_system', 'payments')
            );
        }

        $cur_set = $_SESSION['systems_list'];
        redirect(site_url() . 'admin/payments/systems/' . $cur_set['filter']);
    }

    public function settings($show_rates = 0)
    {
        $this->load->model('payments/models/Payment_currency_model');

        $currency = $this->Payment_currency_model->get_currency_list(
            null,
            null,
            ['gid' => 'ASC']
        );
        $this->view->assign('currency', $currency);

        $updaters = $this->Payment_currency_model->rates_updaters;
        $this->view->assign('updaters', $updaters);

        $use_rates_update = $this->pg_module->get_module_config(
            'payments',
            'use_rates_update'
        );
        $this->view->assign('use_rates_update', $use_rates_update);

        $rates_update_driver = $this->pg_module->get_module_config(
            'payments',
            'rates_update_driver'
        );
        $this->view->assign('rates_update_driver', $rates_update_driver);

        $items_on_page_key = $this->pg_module->get_module_config('payments', 'rates_update_key');
        if ($items_on_page_key) {
            $this->view->assign('items_on_page_key', $items_on_page_key);
        }

        $this->Menu_model->set_menu_active_item(
            'admin_payments_menu',
            'settings_list_item'
        );
        $this->view->setHeader(l('admin_header_currency_list', 'payments'));
        $this->view->setBackLink(site_url() . 'admin/payments/index');

        $this->view->assign('show_rates', $show_rates);
        $this->view->render('list_settings');
    }

    public function settingsEdit($id = null, $show_rates = 0)
    {
        $this->load->model('payments/models/Payment_currency_model');
        if ($id) {
            $data = $this->Payment_currency_model->get_currency_by_id($id);
        } else {
            $data = [];
        }
        if ($this->input->post('btn_save')) {
            $template = $this->input->post('template', true);
            $gr_sep   = $this->input->post('gr_sep', true);
            $dec_sep  = $this->input->post('dec_sep', true);
            $dec_part = $this->input->post('dec_part', true);
            // Add the number format
            $template = str_replace(
                'value',
                'value' .
                '|dec_part:' . $dec_part .
                '|dec_sep:' . $dec_sep .
                '|gr_sep:' . $gr_sep,
                $template
            );

            $post_data     = [
                'gid'      => $this->input->post('gid', true),
                'abbr'     => $this->input->post('abbr', true),
                'template' => $template,
                'name'     => $this->input->post('name', true),
                'per_base' => $this->input->post('per_base', true),
            ];
            $validate_data = $this->Payment_currency_model->validate_currency(
                $id,
                $post_data
            );
            if (!empty($validate_data['errors'])) {
                $this->system_messages->addMessage(
                    View::MSG_ERROR,
                    $validate_data['errors']
                );
            } else {
                $this->Payment_currency_model->save_currency(
                    $id,
                    $validate_data['data']
                );

                if ($id) {
                    $this->system_messages->addMessage(
                        View::MSG_SUCCESS,
                        l('success_update_currency', 'payments')
                    );
                } else {
                    $this->system_messages->addMessage(
                        View::MSG_SUCCESS,
                        l('success_add_currency', 'payments')
                    );
                }

                redirect(site_url() . 'admin/payments/settings');
            }
            $data = array_merge($data, $validate_data['data']);
        }

        $matches = [];
        // Parse the number format
        if (isset($data['template'])) {
            preg_match('/value\|([^]]*)/', $data['template'], $matches);
            $params     = explode('|', $matches[1]);
            $params_str = '';
            foreach ($params as $param) {
                $param_arr             = explode(':', $param);
                // Used parameters
                $number[$param_arr[0]] = $param_arr[1];
                $params_str .= '|' . $param_arr[0] . ':' . $param_arr[1];
            }
            // Remove the number format from template
            $data['template'] = str_replace($params_str, '', $data['template']);
        }

        $base_currency = $this->pg_module->get_module_config(
            'payments',
            'base_currency'
        );
        $this->view->assign('base_currency', $base_currency);

        $format = [
            'template' => [
                '[abbr][value]',
                '[abbr] [value]',
                '[value][abbr]',
                '[value] [abbr]',
                '[gid][value]',
                '[gid] [value]',
                '[value][gid]',
                '[value] [gid]',
            ],
            'dec_sep' => [
                'period' => '.',
                'comma'  => ',',
            ],
            'gr_sep' => [
                'period' => '.',
                'comma'  => ',',
                'space'  => ' ',
                'empty'  => '',
            ],
            'dec_part' => [
                'one'  => '1',
                'two'  => '2',
                'dash' => '-',
                'none' => '',
            ],
        ];
        if (isset($data['template'])) {
            $format['used'] = [
                'template' => $data['template'],
                'dec_sep'  => $number['dec_sep'],
                'gr_sep'   => $number['gr_sep'],
                'dec_part' => $number['dec_part'],
            ];
        }
        $this->pg_theme->add_js('admin-payments.js', 'payments');
        $this->Menu_model->set_menu_active_item(
            'admin_payments_menu',
            'settings_list_item'
        );
        $this->view->setHeader(l('admin_header_currency_list', 'payments'));
        $this->view->assign('format', $format);
        $this->view->assign('data', $data);
        $this->view->assign('show_rates', $show_rates);
        $this->view->render('edit_settings');
    }

    public function settingsDelete($id)
    {
        $this->load->model('payments/models/Payment_currency_model');
        $data = $this->Payment_currency_model->get_currency_by_id($id);
        if ($data['is_default']) {
            $this->system_messages->addMessage(
                View::MSG_ERROR,
                l('error_delete_is_default_currency', 'payments')
            );
        } else {
            $this->Payment_currency_model->delete_currency($id);
            $this->system_messages->addMessage(
                View::MSG_SUCCESS,
                l('success_delete_currency', 'payments')
            );
        }
        redirect(site_url() . 'admin/payments/settings');
    }

    public function settingsUse($id)
    {
        $this->load->model('payments/models/Payment_currency_model');
        $this->Payment_currency_model->set_default($id);
        $this->system_messages->addMessage(
            View::MSG_SUCCESS,
            l('success_activate_currency', 'payments')
        );
        redirect(site_url() . 'admin/payments/settings');
    }

    /**
     * Change currency rates settings
     */
    public function updateCurrencyRates()
    {
        switch (true) {
            case $this->input->post('bt_auto_x') || $this->input->post('bt_auto_y'):
                $status       = $this->input->post('use_rates_update');
                $rates_driver = $this->input->post('rates_driver');
                $this->pg_module->set_module_config(
                    'payments',
                    'use_rates_update',
                    ($status ? 1 : 0)
                );
                $this->pg_module->set_module_config(
                    'payments',
                    'rates_update_driver',
                    $rates_driver
                );
                if ($status) {
                    $this->system_messages->addMessage(
                        View::MSG_SUCCESS,
                        l('success_rates_update_turn_on', 'payments')
                    );
                } else {
                    $this->system_messages->addMessage(
                        View::MSG_SUCCESS,
                        l('success_rates_update_turn_off', 'payments')
                    );
                }
                break;
            case $this->input->post('bt_manual_x') || $this->input->post('bt_manual_y'):
                $this->load->model('payments/models/Payment_currency_model');
                $rates_driver = $this->input->post('rates_driver');
                $result       = $this->Payment_currency_model->update_currency_rates($rates_driver);
                if (!empty($result['errors'])) {
                    $this->system_messages->addMessage(
                        View::MSG_ERROR,
                        $result['errors']
                    );
                } else {
                    $this->system_messages->addMessage(
                        View::MSG_SUCCESS,
                        l('success_rates_updated', 'payments')
                    );
                }
                break;
        }
        redirect(site_url() . 'admin/payments/settings');
    }

    /**
     * Turn on automatic update currency rates by ajax
     *
     * @param integer $status
     */
    public function ajaxUseRatesUpdate($status)
    {
        $response = ['error' => '', 'success' => ''];
        $this->pg_module->set_module_config(
            'payments',
            'use_rates_update',
            ($status ? 1 : 0)
        );
        if ($status) {
            $response['success'] = l('success_rates_update_turn_on', 'payments');
        } else {
            $response['success'] = l('success_rates_update_turn_off', 'payments');
        }
        $this->view->assign($response);
    }

    /**
     * Save updater of rates
     *
     * @param integer $updater
     */
    public function ajaxRatesDriverUpdate($updater)
    {
        $response            = ['error' => '', 'success' => ''];
        $this->pg_module->set_module_config(
            'payments',
            'rates_update_driver',
            $updater
        );
        $response['success'] = l('success_rates_driver_updated', 'payments');
        $this->view->assign($response);
    }

    /**
     * Update currency rates by ajax
     *
     * @param string $updater
     */
    public function ajaxCurrencyRatesUpdate($updater)
    {
        $response = ['error' => '', 'success' => ''];
        $this->load->model('payments/models/Payment_currency_model');
        $result   = $this->Payment_currency_model->update_currency_rates($updater);
        if (!empty($result['errors'])) {
            $response['error'] = implode('<br>', $result['errors']);
        } else {
            $response['success'] = l('success_rates_updated', 'payments');
        }
        $this->view->assign($response);
    }

    /**
     * Save sorting data of payment system operators by ajax
     *
     * @param string $system_gid system guid
     *
     * @return void
     */
    public function ajaxSaveSystemOperatorsSorter($system_gid)
    {
        $sorter = $this->input->post('sorter');
        foreach ($sorter as $item_str => $sort_index) {
            $sorter_data[$sort_index] = str_replace('operator_', '', $item_str);
        }

        if (empty($sorter_data)) {
            return;
        }

        ksort($sorter_data);

        $this->load->model('payments/models/Payment_systems_model');
        $this->Payment_systems_model->save_system_operators_sorter(
            $system_gid,
            $sorter_data
        );

        $data['success'] = l('success_system_operator_sorted', 'payments');

        $this->view->assign($data);
    }

    /**
     * Remove tarif of payment system by ajax
     *
     * @param string $system_gid   system guid
     * @param string $operator_gid operator guid
     *
     * @return void
     */
    public function ajaxDeleteSystemOperator($system_gid, $operator_gid)
    {
        $this->load->model('payments/models/Payment_systems_model');
        $this->Payment_systems_model->delete_system_operator(
            $system_gid,
            $operator_gid
        );
    }

    /**
     * Get operator block of payment system by ajax
     *
     * @param string $system_gid   system guid
     * @param strign $operator_gid operator guid
     *
     * @return void
     */
    public function ajaxGetSystemOperatorForm(
        $system_gid,
        $operator_gid = ''
    )
    {
        $this->load->model('payments/models/Payment_systems_model');
        $system_data = $this->Payment_systems_model->get_system_by_gid($system_gid);

        foreach ($this->pg_language->languages as $lid => $lang) {
            $lang_data[$lid]['name']  = $lang['name'];
            $lang_data[$lid]['value'] = isset($system_data['operators_data'][$operator_gid])
                    ? $system_data['operators_data'][$operator_gid] : '';
        }

        $this->view->assign('lang_data', $lang_data);
        $this->view->assign('operator_gid', $operator_gid);
        $this->view->render('edit_system_operator_form');
    }

    /**
     * Save operator of payment system by ajax
     *
     * @param string $system_gid   system guid
     * @param string $operator_gid operator guid
     *
     * @return void
     */
    public function ajaxSaveSystemOperatorData(
        $system_gid,
        $operator_gid = ''
    )
    {
        $return = ['errors' => [], 'success' => ''];

        $this->load->model('payments/models/Payment_systems_model');
        $system_data = $this->Payment_systems_model->get_system_by_gid($system_gid);
        if (empty($system_data)) {
            show_404();
        }

        $post_data        = $this->input->post('data', true);
        $post_data['gid'] = $operator_gid;

        $validate_data = $this->Payment_systems_model->validate_system_operator(
            $system_gid,
            $operator_gid,
            $post_data
        );
        if (!empty($validate_data['errors'])) {
            $return['errors'] = implode(', ', $validate_data['errors']);
        } else {
            $operator_gid  = $validate_data['data']['gid'];
            $operator_data = $validate_data['data']['name'];
            $this->Payment_systems_model->save_system_operator(
                $system_gid,
                $operator_gid,
                $operator_data
            );
            $save_data     = ['gid' => $system_gid, 'tarifs_status' => $system_data['tarifs_status'],
                'tarifs_data'       => $system_data['tarifs_data']];
            if (!isset($save_data['tarifs_status'][$operator_gid])) {
                $save_data['tarifs_status'][$operator_gid] = 0;
            }
            if (!isset($save_data['tarifs_data'][$operator_gid])) {
                $save_data['tarifs_data'][$operator_gid] = [];
            }
            $validate_data     = $this->Payment_systems_model->validate_system(
                $system_gid,
                $save_data
            );
            $this->Payment_systems_model->save_system(
                $system_data['id'],
                $validate_data['data']
            );
            $return['success'] = l('success_system_operator_updated', 'payments');
        }

        $this->view->assign($return);
    }

    /**
     * Activate/deactivate payment system operator by ajax
     *
     * Available status values: 1 - activate, 0 - deactivate
     *
     * @param integer $system_gid   system guid
     * @param string  $operator_gid operator guid
     * @param integer $status       active status
     *
     * @return void
     */
    public function ajaxSetSystemOperatorStatus(
        $system_gid,
        $operator_gid,
        $status = 1
    )
    {
        $this->load->model('payments/models/Payment_systems_model');
        $system_data = $this->Payment_systems_model->get_system_by_gid($system_gid);
        if (empty($system_data)) {
            show_404();
        }
        $save_data                                 = ['gid' => $system_gid,
            'tarifs_status'                                 => $system_data['tarifs_status']];
        $save_data['tarifs_status'][$operator_gid] = $status;
        $validate_data                             = $this->Payment_systems_model->validate_system(
            $system_gid,
            $save_data
        );
        $this->Payment_systems_model->save_system(
            $system_data['id'],
            $validate_data['data']
        );
    }

    /**
     * Get payment system operators block by ajax
     *
     * @param string $system_gid system guid
     *
     * @return void
     */
    public function ajaxGetSystemOperators($system_gid)
    {
        $this->load->model('payments/models/Payment_systems_model');
        $system_data = $this->Payment_systems_model->get_system_by_gid($system_gid);
        echo $this->getSystemTarifs($system_data);
    }

    /**
     * Get tarifs block of payment system operator
     *
     * @param array $system_data system data
     *
     * @return string
     */
    private function getSystemTarifs($system_data)
    {
        $this->view->assign('system_data', $system_data);

        return $this->view->fetch('edit_system_operators');
    }

    public function updateCurrencyKey()
    {
        $userKey = $this->input->post('userKey', true);
        $this->pg_module->set_module_config(
            'payments',
            'rates_update_key',
            $userKey
        );
        redirect(site_url() . 'admin/payments/settings');
    }

    /* <custom_R> */
    public function withdrawMoneyList($page = null)
    {
        $current_settings = $this->session->userdata('payments_wmoney_list') ?: [];
        if (!$page) {
            $current_settings = [];
        }

        if (!isset($current_settings['filters'])) {
            $current_settings['filters'] = [
                'date_added'    => ['from' => '', 'to' => ''],
                'user_id'       => '',
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
            $current_settings['filters']['user_id'] = $this->input->post('user_id', true);
        }

        $filters = [];
        if (!empty($current_settings['filters']['date_added']['from'])) {
            $filters['where_sql'][] = "date_added >= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['from'])) . " 00:00:00'";
        }
        if (!empty($current_settings['filters']['date_added']['to'])) {
            $filters['where_sql'][] = "date_added <= '" . date('Y-m-d', strtotime($current_settings['filters']['date_added']['to'])) . " 23:59:59'";
        }
        if (!empty($current_settings['filters']['user_id'])) {
            $filters['user_id'] = $current_settings['filters']['user_id'];
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
            'user_id'       => $current_settings['filters']['user_id'],
        ];
        $this->view->assign('search_params', $search_params);
        $this->session->set_userdata('payments_wmoney_list', $current_settings);

        $year_range = ['min' => '-' . (date('Y') - 2019), 'max' => 1];
        $this->view->assign('year_range', $year_range);

        if ($items_count > 0) {
            $items = $this->PaymentsWithdrawMoneyModel->getList($filters, $page, $items_on_page, ['date_added' => 'DESC']);
            $this->PaymentsWithdrawMoneyModel->setFormatSettings('get_user', true);
            $items = $this->PaymentsWithdrawMoneyModel->formatArray($items);
            $this->PaymentsWithdrawMoneyModel->setFormatSettings('get_user', false);
            $this->view->assign('items', $items);
        }

        $this->load->helper('navigation');
        $url       = site_url() . 'admin/payments/withdraw_money_list/';
        $page_data = get_admin_pages_data($url, $items_count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);

        $this->view->setHeader(l('admin_header_withdraw_money_list', 'payments'));
        $this->view->setBackLink(site_url('admin/start/menu/payments_menu_item'));
        $this->view->render('withdraw_money_list');
    }

    public function withdrawMoneySettings()
    {
        $settings_map = [
            ['module' => 'payments', 'gid' => 'min_withdraw_money_amount', 'type' => 'float', 'value' => '0'],
            ['module' => 'payments', 'gid' => 'withdraw_money_notif_email', 'type' => 'email', 'value' => ''],
            ['module' => 'payments', 'gid' => 'withdraw_money_paypal_test_mode', 'type' => 'bool', 'value' => ''],
            ['module' => 'payments', 'gid' => 'withdraw_money_paypal_app_client_id', 'type' => 'text', 'value' => ''],
            ['module' => 'payments', 'gid' => 'withdraw_money_paypal_app_secret', 'type' => 'text', 'value' => ''],
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
                    case 'bool':
                        $value = intval($this->input->post($sett['gid'], true)) ? 1 : 0;
                        break;
                    default:
                        $value = trim(strip_tags($this->input->post($sett['gid'], true)));
                        break;
                }

                $this->pg_module->set_module_config($sett['module'], $sett['gid'], $value);
            }

            $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_save_settings', 'start'));
            $this->view->setRedirect(site_url() . 'admin/payments/withdraw_money_settings');
        }

        $settings = [];
        foreach ($settings_map as $sett) {
            $settings[$sett['gid']] = $this->pg_module->get_module_config($sett['module'], $sett['gid']);
        }
        $this->view->assign('settings', $settings);

        $this->view->setHeader(l('admin_header_withdraw_money_settings', 'payments'));
        $this->view->setBackLink(site_url() . 'admin/payments/withdraw_money_list');
        $this->view->render('withdraw_money_settings');
    }
    /* </custom_R> */
}
