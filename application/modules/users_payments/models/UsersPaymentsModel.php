<?php

namespace Pg\modules\users_payments\models;

define('USER_ACCOUNT_STAT_TABLE', DB_PREFIX . 'user_account_list');

/**
 * Users payments model
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
class UsersPaymentsModel extends \Model
{

    protected $fields = [
        'id', 'id_user', 'date_add', 'message', 'price', 'price_type'
    ];


    /**
     * Module GUID
     *
     * @var string
     */
    const MODULE_GID = 'users_payments';

    /**
     * Constructor
     *
     * @return users object
     */
    public function __construct()
    {
        parent::__construct();
        $this->ci->load->model('Payments_model');
    }

    ///// user account functions
    public function getUserAccount($user_id)
    {
        $result = $this->ci->db->select("account")->from(USERS_TABLE)->where("id", $user_id)->get()->result_array();
        if (empty($result)) {
            return 0;
        } else {
            return $result[0]["account"];
        }
    }

    /**
     * Add funds on users' account
     * 
     * @param array $payment_data
     * @param integer $payment_status
     * @param string $payment_type_gid
     * @return type
     */
    public function updateUserAccount($payment_data, $payment_status, $payment_type_gid = '', $params = [])
    {
        if ($payment_status == 1) {
            $user_id = $payment_data["id_user"];
            $user_data = $this->ci->Users_model->getUserById($user_id);
            $data["account"] = $user_data["account"] + $payment_data["amount"];
            $this->ci->Users_model->saveUser($user_id, $data);
            $this->accountAddSpendEntry(
                $user_id, 
                $payment_data["amount"], 
                "add", 
                (isset($payment_data['operation_message']) && !empty($payment_data['operation_message'])) ?
                    $payment_data['operation_message'] :
                    l('account_funds_add_message', 'users_payments'), 
                $payment_type_gid,
                $params
            );

            $this->ci->load->model('Notifications_model');
            $this->ci->load->helper('start');
            $mail_data = array(
                'fname'    => $user_data['fname'] ?: $user_data['nickname'],
                'sname'    => $user_data['sname'] ?: '',
                'nickname' => $user_data['nickname_str'],
                'received' => currency_format_output(array('value' => $payment_data["amount"], 'no_tags' => true)),
                'account'  => currency_format_output(array('value' => $data["account"], 'no_tags' => true)),
            );
            $this->ci->Notifications_model->send_notification($user_data["email"], 'users_update_account', $mail_data, '', $user_data['lang_id']);
        }
        return;
    }
    /**
     * Write off funds from users' account
     * 
     * @param integer $id_user
     * @param float $amount
     * @param string $message
     * @param string $payment_type_gid
     * @param array $params
     * @return boolean
     */
    public function writeOffUserAccount($id_user, $amount, $message, $payment_type_gid = '', $params = [])
    {
        $user_data = $this->ci->Users_model->getUserById($id_user);
        $data["account"] = $user_data["account"] - $amount;
        if ($data["account"] < 0) {
            return l('error_money_not_sufficient', 'users_payments');
        } else {
            $this->ci->Users_model->saveUser($id_user, $data);
            $this->accountAddSpendEntry($id_user, $amount, "spend", $message, $payment_type_gid, $params);
            return true;
        }
    }

    public function accountAddSpendEntry($id_user, $price, $price_type = "add", $message = "", $payment_type_gid = '', $params = [])
    {
        if (empty($message)) {
            $message = ($price_type = "add") ? l('account_funds_add_message', 'users_payments') : 
                l('account_funds_spend_message', 'users_payments');
        }

        $data = [
            "id_user"    => $id_user,
            "date_add"   => date("Y-m-d H:i:s"),
            "price_type" => $price_type,
            "price"      => $price,
            "message"    => $message,
        ];
        $this->ci->db->insert(USER_ACCOUNT_STAT_TABLE, $data);
        /**
         * Save statistics
         * 
         * We have empty $payment_type_gid, when use callback_method from 
         * changePaymentStatus method in Payments_model, so we don't save new statistics 
         * record (it is already saved in PAYMENTS_TABLE)
         */  
        if (!empty($payment_type_gid)) {
            $this->ci->load->model("payments/models/Payment_currency_model");
            $this->ci->Payments_model->savePayment(null, [
                'date_add' => $data['date_add'],
                'id_user' => $id_user,
                'amount' => $price,
                'currency_gid' => $this->ci->Payment_currency_model->default_currency["gid"],
                'status' => 1,
                'payment_data' => serialize(array_merge($params, ['name' => $message])),
                'operation_type' => $price_type,
                'system_gid' => 'account',
                'payment_type_gid' => $payment_type_gid,
                'funds_from' => 'account'                
            ], true);
        }
    }
    
    public function getUserPaymentsByGid($gid, $payment_type = "services", $user_id = null)
    {
        if(is_null($user_id)) {
            $user_id = $this->ci->session->userdata('user_id');
        }

        $params['where'] = array(
            'payment_type_gid' => $payment_type,
            'id_user' => $user_id
        );
        $payments = $this->ci->Payments_model->getPaymentList(null, null, null, $params);
        
        $payments_data = array();
        foreach($payments as $payment) {
            if($payment['payment_data']['gid'] == $gid) {
                $payments_data[] = $payment;
            }
        }
        
        return $payments_data;
    }
    
    public function getAccountCountByUserId($user_id)
    {
        $result = $this->ci->db->select("COUNT(id) as cnt")->from(USER_ACCOUNT_STAT_TABLE)->where("id_user", $user_id)->get()->result_array();
        return $result[0]['cnt'];
    }
    
    /**
     * Account list by user id
     * 
     * @param int $user_id
     * @return array
     */
    public function getAccountListByUserId($user_id)
    {
        return $this->ci->db->select(implode(', ', $this->fields))
                                            ->from(USER_ACCOUNT_STAT_TABLE)
                                            ->where("id_user", $user_id)
                                            ->get()->result_array();
    }

    /**
     * 
     * @param string $name
     * @param string $args
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $args)
    {
        $methods = [
            'account_add_spend_entry' => 'accountAddSpendEntry',
            'get_user_account' => 'getUserAccount',
            'update_user_account' => 'updateUserAccount',
            'write_off_user_account' => 'writeOffUserAccount',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $name);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
