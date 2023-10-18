<?php

namespace Pg\modules\payments\models;

require_once __DIR__ . '/sdk/vendor/autoload.php';

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Payments module
 * Model for withdraw money to payment system
 *
 * @package     PG_Dating
 * @subpackage  Payments
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class PaymentsWithdrawMoneyModel extends \Model
{
    const MODULE_GID            = 'payments';
    const TABLE                 = DB_PREFIX . 'payments_withdraw_money';
    const DB_DATE_TIME_FORMAT   = 'Y-m-d H:i:s';
    const DB_DATE_TIME_DEFAULT  = '0000-00-00 00:00:00';

    const STATUS_PENDING        = 'pending';
    const STATUS_APPROVED       = 'approved';
    const STATUS_DECLINED       = 'declined';

    // const APP_CLIENT_ID         = 'ATCfUL3MMaqn3cJu7xff1E1gqb66ISOtWFu4dSPIdpwJhSar-l1-2xj9HhD-a_btpkZuge3rlnJkKyOZ';
    // const APP_SECRET            = 'EHndsCUlJ_C2-5EISjcN0X3Kzzg0BDvy2fN1xJXr6fKn5x1nONPxwnfs1QAHcjG_Eo5AQyreaX8UTq1L';
    // const APP_TEST_MODE         = true;
    const APP_CLIENT_ID         = 'AYTPU9vC7phAw6U6kD8VSsssHmFP6Nmkub195z8VFEmPTIVNSNRzarCAOyxkGI7Y1R8CAso0Vbjbb2V0';
    const APP_SECRET            = 'ED6L_HU7PD8we5PXOFucW0g8POMdZLdUZH_m58YrJOE9qFMdyUTmmNRH4Tnzul67muKJ7cJTAmIG9Mjb';
    const APP_TEST_MODE         = false;

    protected $fields = [
        'id',
        'user_id',
        'amount',
        'currency_gid',
        'system_gid',
        'batch_id',
        'status',
        'date_added',
        'date_modified',
    ];
    protected $format_settings = [
        'get_user'  => false,
    ];

    protected $app_client_id    = '';
    protected $app_secret       = '';
    protected $app_test_mode    = false;

    public function __construct()
    {
        parent::__construct();
        $this->app_client_id    = $this->ci->pg_module->get_module_config(self::MODULE_GID, 'withdraw_money_paypal_app_client_id');
        $this->app_secret       = $this->ci->pg_module->get_module_config(self::MODULE_GID, 'withdraw_money_paypal_app_secret');
        $this->app_test_mode    = intval($this->ci->pg_module->get_module_config(self::MODULE_GID, 'withdraw_money_paypal_test_mode')) ? true : false;
    }

    protected function getObject($data = [])
    {
        $fields     = $this->fields;
        $fields_str = implode(', ', $fields);

        $this->ci->db->select($fields_str)
            ->from(self::TABLE);

        foreach ($data as $field => $value) {
            $this->ci->db->where($field, $value);
        }

        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            return $results[0];
        }

        return false;
    }

    public function getById($id)
    {
        return $this->getObject(['id' => $id]);
    }

    public function getByBatchId($batch_id)
    {
        return $this->getObject(['batch_id' => $batch_id]);
    }

    protected function getCriteriaInternal($filters)
    {
        $filters = ['data' => $filters, 'table' => self::TABLE, 'type' => ''];

        $params = [];

        $params['table'] = !empty($filters['table']) ? $filters['table'] : self::TABLE;

        $fields = array_flip($this->fields);
        foreach ($filters['data'] as $filter_name => $filter_data) {
            if (!is_array($filter_data)) {
                $filter_data = trim($filter_data);
            }
            switch ($filter_name) {
                case 'where':
                case 'where_in':
                case 'where_not_in':
                case 'where_sql':
                    if (empty($filter_data) || !is_array($filter_data)) {
                        break;
                    }
                    if (!array_key_exists($filter_name, $params)) {
                        $params[$filter_name] = [];
                    }
                    $params[$filter_name] = array_merge_recursive($params[$filter_name], (array) $filter_data);
                    break;
                default:
                    if (isset($fields[$filter_name])) {
                        if (is_array($filter_data)) {
                            $params = array_merge_recursive($params, ['where_in' => [$filter_name => $filter_data]]);
                        } else {
                            $params = array_merge_recursive($params, ['where' => [$filter_name => $filter_data]]);
                        }
                    }
                    break;
            }
        }

        return $params;
    }

    protected function getListInternal($page = null, $limits = null, $order_by = null, $params = [])
    {
        $table      = self::TABLE;
        $fields     = $this->fields;

        $fields_str = $table . '.' . implode(', ' . $table . '.', $fields);

        $this->ci->db->select($fields_str);
        $this->ci->db->from($table);

        if (isset($params['join'])) {
            foreach ($params['join'] as $j_table => $j_sett) {
                $this->ci->db->join($j_table, $j_sett, 'left');
            }
        }

        if (isset($params['where']) && is_array($params['where']) && count($params['where'])) {
            foreach ($params['where'] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params['where_in']) && is_array($params['where_in']) && count($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params['where_not_in']) && is_array($params['where_not_in']) && count($params['where_not_in'])) {
            foreach ($params['where_not_in'] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }

        if (isset($params['where_sql'])) {
            if (!is_array($params['where_sql'])) {
                $params['where_sql'] = [$params['where_sql']];
            }
            foreach ($params['where_sql'] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                if (in_array($field, $this->fields)) {
                    $this->ci->db->order_by($field . ' ' . $dir);
                } elseif ($field == 'order_str') {
                    if (is_array($dir)) {
                        foreach ($dir as $f => $d) {
                            $this->ci->db->order_by($f . ' ' . $d);
                        }
                    } else {
                        $this->ci->db->order_by($dir);
                    }
                }
            }
        } elseif ($order_by) {
            $this->ci->db->order_by($order_by);
        }

        if (!is_null($page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($limits, $limits * ($page - 1));
        }

        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return $results;
        }
        return [];
    }

    protected function getCountInternal($params = null)
    {
        $table = isset($params['table']) ? $params['table'] : self::TABLE;

        $this->ci->db->select('COUNT(*) AS cnt');
        $this->ci->db->from($table);

        if (isset($params['where']) && is_array($params['where']) && count($params['where'])) {
            foreach ($params['where'] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params['where_in']) && is_array($params['where_in']) && count($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params['where_not_in']) && is_array($params['where_not_in']) && count($params['where_not_in'])) {
            foreach ($params['where_not_in'] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }

        if (isset($params['where_sql']) && is_array($params['where_sql']) && count($params['where_sql'])) {
            foreach ($params['where_sql'] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return intval($results[0]['cnt']);
        }
        return 0;
    }

    public function getList($filters = [], $page = null, $items_on_page = null, $order_by = null)
    {
        $params = $this->getCriteriaInternal($filters);
        return $this->getListInternal($page, $items_on_page, $order_by, $params);
    }

    public function getListByKey($filters = [], $page = null, $items_on_page = null, $order_by = null)
    {
        $return = [];

        $params = $this->getCriteriaInternal($filters);
        $list   = $this->getListInternal($page, $items_on_page, $order_by, $params);
        foreach ($list as $key => $item) {
            $return[$item['id']] = $item;
        }

        return $return;
    }

    public function getListByField($field, $filters = [], $page = null, $items_on_page = null, $order_by = null)
    {
        $return = [];

        $params = $this->getCriteriaInternal($filters);
        $list   = $this->getListInternal($page, $items_on_page, $order_by, $params);
        foreach ($list as $key => $item) {
            $return[$item[$field]] = $item;
        }

        return $return;
    }

    public function getCount($filters = [])
    {
        $params = $this->getCriteriaInternal($filters);
        return $this->getCountInternal($params);
    }

    public function setFormatSettings($name, $value = false)
    {
        if (!is_array($name)) {
            $name = [$name => $value];
        }
        foreach ($name as $key => $item) {
            $this->format_settings[$key] = $item;
        }
    }

    public function format($data)
    {
        if (empty($data) || !is_array($data)) {
            return [];
        }

        return current($this->formatArray([0 => $data]));
    }

    public function formatArray($data)
    {
        $return = [];

        if (empty($data) || !is_array($data)) {
            return [];
        }

        $for_users = [];

        foreach ($data as $key => $item) {
            if (!empty($item['user_id'])) {
                $for_users[] = $item['user_id'];
            }

            if (!empty($item['status'])) {
                $item['status_str'] = l('status_wm_' . $item['status'], self::MODULE_GID);
            }

            $return[$key] = $item;
        }

        if ($this->format_settings['get_user'] && !empty($for_users)) {
            $this->ci->load->model('operators/models/OperatorsModel');
            $operators = $this->ci->OperatorsModel->getListByKey(['id' => array_unique($for_users)]);
            $operators = $this->ci->OperatorsModel->formatArray($operators);
            foreach ($return as $key => $item) {
                $item['operator'] = array_key_exists($item['user_id'], $operators) ? $operators[$item['user_id']] : [];

                $return[$key] = $item;
            }
        }

        return $return;
    }

    public function formatDefault()
    {
        $data = [];
        return $data;
    }

    public function validate($id = null, $data = [])
    {
        $return = ['errors' => [], 'data' => []];

        $this->ci->config->load('reg_exps', true);

        if (array_key_exists('user_id', $data)) {
            $return['data']['user_id'] = intval($data['user_id']);
            if (empty($return['data']['user_id'])) {
                $return['errors']['user_id'] = l('error_wm_user_empty', self::MODULE_GID);
            }
        }

        if (array_key_exists('email', $data)) {
            $email_expr              = $this->ci->config->item('email', 'reg_exps');
            $return['data']['email'] = trim(strip_tags($data['email']));
            if (empty($return['data']['email']) || !preg_match($email_expr, $return['data']['email'])) {
                $return['errors']['email'] = l('error_wm_email_incorrect', self::MODULE_GID);
            }
        }

        if (array_key_exists('amount', $data)) {
            $return['data']['amount'] = floatval($data['amount']);
            if (empty($return['data']['amount'])) {
                $return['errors']['amount'] = l('error_wm_amount_empty', self::MODULE_GID);
            }
        }

        if (array_key_exists('currency_gid', $data)) {
            $return['data']['currency_gid'] = trim(strip_tags($data['currency_gid']));
        }

        if (array_key_exists('system_gid', $data)) {
            $return['data']['system_gid'] = trim(strip_tags($data['system_gid']));
        }

        if (array_key_exists('batch_id', $data)) {
            $return['data']['batch_id'] = trim(strip_tags($data['batch_id']));
        }

        if (array_key_exists('status', $data)) {
            $return['data']['status'] = trim(strip_tags($data['status']));
            if (empty($return['data']['status']) || !in_array($return['data']['status'], self::getStatuses())) {
                $return['data']['status'] = self::STATUS_PENDING;
            }
        }

        return $return;
    }

    public function save($id = null, $save_raw = [])
    {
        $save_raw['date_modified'] = date(self::DB_DATE_TIME_FORMAT);
        if (empty($id)) {
            if (empty($save_raw['date_added'])) {
                $save_raw['date_added'] = $save_raw['date_modified'];
            }
            $this->ci->db->insert(self::TABLE, $save_raw);
            $id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->update(self::TABLE, $save_raw);
        }

        return $id;
    }

    public function delete($id)
    {
        if (is_array($id)) {
            foreach ($id as $i) {
                $this->delete($i);
            }
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->delete(self::TABLE);
        }
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_APPROVED,
            self::STATUS_DECLINED,
        ];
    }

    public function paypalPayout($email, $amount, $currency_gid = 'USD')
    {
        $return = ['status' => 0, 'message' => '', 'batch_id' => ''];

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->app_client_id,
                $this->app_secret
            )
        );

        if ($this->app_test_mode) {
            $apiContext->setConfig(['mode' => 'sandbox']);
        } else {
            $apiContext->setConfig(['mode' => 'live']);
        }

        $payouts = new \PayPal\Api\Payout();
        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();

        $senderBatchHeader->setSenderBatchId(uniqid())->setEmailSubject(l('mail_withdraw_money_title', self::MODULE_GID));

        $senderItem = new \PayPal\Api\PayoutItem();
        $senderItem->setRecipientType('EMAIL')
            ->setNote(l('mail_withdraw_money_content', self::MODULE_GID))
            ->setReceiver($email)
            ->setSenderItemId(date('YmdHi') . rand(1, 999))
            ->setAmount(new \PayPal\Api\Currency('{
                "value":"' . number_format($amount, 2, '.', '') . '",
                "currency":"' . $currency_gid . '"
            }'));

        $payouts->setSenderBatchHeader($senderBatchHeader)->addItem($senderItem);

        try {
            $output             = $payouts->create(null, $apiContext);
            $return['batch_id'] = $output->getBatchHeader()->getPayoutBatchId();
            $return['status']   = 1;
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            $data = json_decode($ex->getData(), true);
            // $return['message'] = $ex->getCode() . ': ' . $ex->getMessage();
            $return['message'] = $ex->getCode() . ': ' . $data['message'];
        }

        return $return;
    }

    public function paypalPayoutResponse($data = [])
    {
        $return = ['status' => 0, 'message' => ''];

        // logs
        $fp = fopen(TEMP_FOLDER . 'payouts/payouts-' . date('Ymd') . '.log', 'a');
        fwrite($fp, print_r($data, true));
        fclose($fp);

        if (empty($data['resource_type']) || $data['resource_type'] != 'payouts') {
            $return['message'] = 'Empty resource type';
            return $return;
        }

        $batch_id = $data['resource']['batch_header']['payout_batch_id'];
        if (empty($batch_id)) {
            $return['message'] = 'Empty payout batch id';
            return $return;
        }

        $wm_object = $this->getByBatchId($batch_id);
        if (empty($wm_object) || $wm_object['status'] != self::STATUS_PENDING) {
            $return['message'] = 'Request has already been processed';
            return $return;
        }


        $status = false;
        if ($data['event_type'] == 'PAYMENT.PAYOUTSBATCH.SUCCESS') {
            $status             = self::STATUS_APPROVED;
            $return['status']   = 1;

            // send notification
            $to_email = $this->ci->pg_module->get_module_config('payments', 'withdraw_money_notif_email');
            if (!empty($to_email)) {
                $this->ci->load->model('operators/models/OperatorsModel');
                $this->ci->load->helper('start');

                $operator = $this->ci->OperatorsModel->getById($wm_object['user_id']);
                $operator = $this->ci->OperatorsModel->format($operator);

                $mail_data = [
                    'user'      => $operator['output_name'],
                    'amount'    => \Pg\modules\start\helpers\currencyFormatOutput(['value' => $wm_object['amount'], 'no_tags' => true, 'not_virtual' => true]),
                ];
                $this->ci->load->model('notifications/models/NotificationsModel');
                $this->ci->NotificationsModel->sendNotification($to_email, 'new_withdrawal_money', $mail_data);
            }
        } elseif ($data['event_type'] == 'PAYMENT.PAYOUTSBATCH.DENIED') {
            $status = self::STATUS_DECLINED;
            $return['status']   = -1;

            // return money to operator balance
            $this->ci->load->model('operators/models/OperatorsModel');
            $this->ci->OperatorsModel->addMoneyToAccount($wm_object['user_id'], $wm_object['amount']);
        }

        if ($status) {
            $this->save($wm_object['id'], ['status' => $status]);
        }

        return $return;
    }
}
