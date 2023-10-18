<?php

namespace Pg\modules\payments\controllers;

use Pg\libraries\View;

/**
 * Payments module
 * Operator side controller
 *
 * @package     PG_Dating
 * @subpackage  Payments
 * @category    controllers
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class OperatorPayments extends \Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function withdrawMoney($page = 1)
    {
        if ($this->session->userdata('auth_type') != 'operator') {
            redirect(site_url() . 'operator/start/login');
        }

        $this->load->helper('start');
        $this->load->model([
            'operators/models/OperatorsModel',
            'payments/models/PaymentsWithdrawMoneyModel',
            'payments/models/PaymentCurrencyModel',
        ]);

        $user_id        = intval($this->session->userdata('user_id'));
        $operator       = $this->OperatorsModel->getById($user_id);
        $currency_gid   = $this->PaymentCurrencyModel->default_currency['gid'];
        $min_amount     = floatval($this->pg_module->get_module_config('payments', 'min_withdraw_money_amount'));

        $form_data = [];
        if ($this->input->post('btn_send', true)) {
            $post_data = [
                'user_id'       => $user_id,
                'email'         => $this->input->post('email', true),
                'amount'        => $this->input->post('amount', true),
                'currency_gid'  => $currency_gid,
                'system_gid'    => 'paypal',
                'status'        => \Pg\modules\payments\models\PaymentsWithdrawMoneyModel::STATUS_PENDING,
            ];

            $validate = $this->PaymentsWithdrawMoneyModel->validate(null, $post_data);
            if (!empty($validate['errors'])) {
                $this->system_messages->addMessage(View::MSG_ERROR, $validate['errors']);
                $form_data = $validate['data'];
            } elseif ($validate['data']['amount'] < $min_amount) {
                $min_amount_str = \Pg\modules\start\helpers\currencyFormatOutput(['value' => $min_amount, 'not_virtual' => true, 'no_tags' => true]);
                $this->system_messages->addMessage(View::MSG_ERROR, l('error_wm_amount_less_than_min', 'payments', '', 'text', ['min' => $min_amount_str]));
                $form_data = $validate['data'];
            } elseif ($validate['data']['amount'] > $operator['account']) {
                $this->system_messages->addMessage(View::MSG_ERROR, l('error_wm_not_enough_money', 'payments'));
                $form_data = $validate['data'];
            } else {
                $save_data = $validate['data'];

                $result = $this->PaymentsWithdrawMoneyModel->paypalPayout($save_data['email'], $save_data['amount'], $save_data['currency_gid']);

                if (empty($result['batch_id'])) {
                    $this->system_messages->addMessage(View::MSG_ERROR, $result['message']);
                    $form_data = $validate['data'];
                } else {
                    $save_data['batch_id'] = $result['batch_id'];

                    $this->PaymentsWithdrawMoneyModel->save(null, $save_data);
                    $this->OperatorsModel->withdrawMoneyFromAccount($user_id, $save_data['amount']);

                    $this->system_messages->addMessage(View::MSG_SUCCESS, l('success_wm_send', 'payments'));
                    $this->view->setRedirect(site_url('operator/payments/withdraw_money'));
                }
            }
        }
        $this->view->assign('form_data', $form_data);

        $filters = [
            'user_id' => $user_id,
        ];
        $count  = $this->PaymentsWithdrawMoneyModel->getCount($filters);
        $page   = intval($page);
        if (!$page) {
            $page = 1;
        }
        $this->load->helper('sort_order');
        $items_on_page  = $this->pg_module->get_module_config('start', 'admin_items_per_page');
        $page           = get_exists_page_number($page, $count, $items_on_page);

        if ($count > 0) {
            $items = $this->PaymentsWithdrawMoneyModel->getList($filters, $page, $items_on_page, ['date_added' => 'DESC']);
            $items = $this->PaymentsWithdrawMoneyModel->formatArray($items);
            $this->view->assign('items', $items);
        }

        $this->load->helper('navigation');
        $url       = site_url() . 'operator/payments/withdraw_money/';
        $page_data = get_admin_pages_data($url, $count, $items_on_page, $page, 'briefPage');
        $this->view->assign('page_data', $page_data);
        $this->view->assign('min_amount', $min_amount);

        $this->load->model('menu/models/Menu_model');
        $this->Menu_model->setMenuActiveItem('operator_menu', 'operator_wmoney_item');

        $this->view->setHeader(l('header_withdraw_money', 'payments'));
        $this->view->render('withdraw_money');
    }

    public function payoutResponse()
    {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);

        if (!empty($data)) {
            $this->load->model('payments/models/PaymentsWithdrawMoneyModel');
            $this->PaymentsWithdrawMoneyModel->paypalPayoutResponse($data);
        }

        echo 'OK';
        exit;
    }
}
