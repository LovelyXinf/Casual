<?php

namespace Pg\modules\payments\models\systems;

use Pg\modules\payments\models\PaymentDriverModel;
use Pg\libraries\View;
use Stripe;

/**
 * Payments module
 *
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */

/**
 * Stripe payment system driver model
 *
 * @subpackage  Payments
 *
 * @category    models
 *
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class StripeModel extends PaymentDriverModel
{
    /**
     * DB table payments_stripe
     *
     * @var string
     */
    const PAYMENTS_STRIPE_TABLE = DB_PREFIX . 'payments_stripe';

    /**
     * @var
     */
    protected $stripe;

    /**
     * DB table properties
     *
     * @var array
     */
    protected $fields = [
        'id',
        'id_user',
        'date_add',
        'customer_id',
        'payment_method_id'
    ];

    /**
     *  Payment settings
     *
     *  @var array
     */
    public $payment_data = [
        'gid' => 'stripe',
        'name' => 'Stripe',
        'settings_data' => 'a:2:{s:11:"secret_word";s:11:"secret word";s:12:"publish_word";s:12:"publish word";}',
        'create_table' => 1,
        'tarifs_type' => 0,
        'logo' => 'stripe.png',
    ];

    /**
     * System settings
     *
     * @var array
     */
    public $settings = [
        'secret_word' => ['type' => 'text', 'content' => 'string', 'size' => 'middle'],
        'publish_word' => ['type' => 'text', 'content' => 'string', 'size' => 'middle'],
        'use_recurring' => ['type' => 'checkbox'],
        'simple_template_js' => 1,
    ];

    /**
     * Response variables
     *
     * @var array
     */
    protected $variables = [
        'stripeToken' => 'token',
        'invoice'     => 'id_payment',
    ];

    /**
     * Use payments intents api
     *
     * @var bool
     */
    protected $use_payment_intents_api = true;

    /**
     * Checkout url
     *
     * @var string
     */
    protected $checkout_url = 'https://checkout.stripe.com/checkout.js';

    /**
     * Do request to payment system
     *
     * @param array $payment_data payment data
     * @param array $system_settings system settings
     *
     * @return array[]
     * @throws Stripe\Exception\ApiErrorException
     */
    public function funcRequest($payment_data, $system_settings)
    {
        $this->stripe = new Stripe\StripeClient($system_settings['settings_data']['secret_word']);

        if ($this->use_payment_intents_api === true) {
            $this->ci->load->model(['Users_model', 'Payments_model',
                'access_permissions/models/Access_permissions_groups_model']);

            $user = $this->ci->Users_model->getUserById($payment_data['id_user'], true);
            $customer_id = $this->getCustomer($user, $system_settings);

            if (!empty($payment_data['payment_data']['is_recurring'])) {
                $group = current($this->ci->Access_permissions_groups_model->getPeriodsList(null, [
                    'where' => [
                        'id' => $payment_data['payment_data']['period_id']
                    ]
                ]));

                if (!empty($group)) {
                    $price = intval($group[$payment_data['payment_data']['group_gid'].'_group']) * 100 ;
                    $plan_name = $payment_data['payment_data']['group_gid'].'_'.$group['period'].'_'.$group['period_type'];

                    switch ($group['period_type']) {
                        case 'days':
                            $interval = 'day';
                            // no break
                        default:
                            $interval = 'day';
                            break;
                    }

                    $plan = null;
                 
                    try {
                        $plan = $this->stripe->plans->retrieve($plan_name);
                    } catch (\Exception $e) {
                        $plan_data = [
                            'id' => $plan_name,
                            'amount' =>  $price,
                            'currency' => $payment_data['currency_gid'],
                            'interval' => $interval,
                            'interval_count' => $group['period'],
                            'product' => ['name' => $plan_name],
                        ];
                        $plan = $this->stripe->plans->create($plan_data);
                    }
                    $payment_data['payment_data']['plan_id'] = $plan->id;
                }
            }

            if ($payment_data['payment_data']['module'] == 'access_permissions') {
                try {
                    $subscriptions_res = $this->stripe->subscriptions->all(['customer' => $customer_id]);
                    if (!empty($subscriptions_res->data)) {
                        $last_subscriptions = [];
                        foreach ($subscriptions_res->data as $key => $value) {
                            $last_subscriptions[] = [
                                'sub_id' => $value['id'],
                                'sub_name' => $value->plan['id'],
                                'sub_interval_count' => $value->plan['interval_count'],
                                'sub_interval_type' => $value->plan['interval'],
                                'sub_price' => $value->plan['amount'] / 100,
                                'sub_currency' => $value->plan['currency'],
                            ];
                        }
                        $payment_data['payment_data']['last_subscriptions'] = $last_subscriptions;
                    }
                } catch (\Exception $e) {
                    $this->ci->system_messages->addMessage(View::MSG_ERROR, $e->getMessage());
                }
            }

            $webhooks = $this->stripe->webhookEndpoints->all();
            if (empty($webhooks->data)) {
                $this->stripe->webhookEndpoints->create([
                    'url' => site_url() . 'payments/responce/stripe/',
                    'enabled_events' => [
                        "payment_intent.succeeded"
                    ]
                ]);
            }

            if (!isset($payment_data['payment_data']['payment_intent_id'])) {
                $res = $this->stripe->paymentIntents->create([
                    'amount'   => $payment_data['amount'] * 100, // amount in cents
                    'currency' => $payment_data['currency_gid'],
                    'payment_method_types' => ['card'],
                    'metadata' => ['order_id' => $payment_data['id']],
                    'customer' => $customer_id
                ]);
                $payment_data['payment_data']['customer_id'] = $customer_id;
                $payment_data['payment_data']['payment_intent_id'] = $res->client_secret;
                $this->ci->Payments_model->savePayment(
                    $payment_data['id'],
                    ['payment_data' => serialize($payment_data['payment_data'])]
                );
            }
            $payment_data['payment_data']['user'] = $user;
            return $payment_data['payment_data'];
        } else {
            $errors = [];

            if (empty($payment_data['payment_data']['token'])) {
                $errors[] = l('error_stripe_token', 'payments');
            }

            // Create the charge on Stripe's servers - this will charge the user's card
            try {
                $this->stripe->charges->create([
                    'amount'   => $payment_data['amount'] * 100, // amount in cents
                    'currency' => $payment_data['currency_gid'],
                    'source'   => $payment_data['payment_data']['token']
                ]);
                $this->ci->load->model('Payments_model');
                $this->ci->Payments_model->changePaymentStatus($payment_data['id'], true);
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
            }
        }

        return ['errors' => $errors, 'info' => [], 'data' => $payment_data];
    }

    /**
     * Process response from payment system
     *
     * @param array $payment_data    payment data
     * @param array $system_settings system settings
     *
     * @return array
     */
    public function funcResponce($payment_data, $system_settings)
    {
        $return = ["errors" => [], "info" => [], "data" => [], "type" => "html"];

        if ($this->use_payment_intents_api === true) {
            $payment_data = json_decode(file_get_contents('php://input'));
            if ($payment_data->type == 'payment_intent.succeeded') {
                if ($payment_data->data->object->status == 'succeeded') {
                    $return['data']['id_payment'] =  $payment_data->data->object->metadata->order_id;
                    $return["data"]["status"] = 1;
                }
            }
        } else {
            foreach ($this->variables as $payment_var => $site_var) {
                $return['data'][$site_var] = isset($payment_data[$payment_var]) ? $this->ci->input->xss_clean($payment_data[$payment_var]) : "";
            }

            $this->ci->load->model("Payments_model");
            $site_payment_data = $this->ci->Payments_model->getPaymentById($return["data"]['id_payment']);

            if (!empty($return['data']['token'])) {
                try {
                    $this->stripe = new Stripe\StripeClient($system_settings['settings_data']['secret_word']);

                    $this->stripe->charges->create([
                        "amount"   => $site_payment_data['amount'] * 100,
                        "currency" => $site_payment_data["currency_gid"],
                        "card"     => $return['data']['token'],
                    ]);
                    $return['info'][] = l('success_payment_send', 'payments');
                } catch (\Exception $e) {
                    $return['errors'][] = $e->getMessage();
                }
            } else {
                $return['errors'][] = l('error_stripe_token', 'payments');
            }

            if (!empty($return['errors'])) {
                $return["data"]["status"] = -1;
            } else {
                $return["data"]["status"] = 1;
            }
        }

        return $return;
    }

    /**
     * Use javascript code
     *
     * @return boolean
     */
    public function funcJs()
    {
        return true;
    }

    /**
     * Create DB table
     *
     * @return bool
     */
    public function createTableData()
    {
        if (!$this->ci->db->table_exists(self::PAYMENTS_STRIPE_TABLE)) {
            $this->ci->load->dbforge();

            $fields = [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 3,
                    'null' => false,
                    'auto_increment' => true,
                ],
                'id_user' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ],
                'date_add' => [
                    'type' => 'DATETIME',
                    'null' => false,
                ],
                'customer_id' => [
                    'type' => 'VARCHAR',
                    'constraint' => 40,
                    'null' => false,
                ],
                'payment_method_id' => [
                    'type' => 'VARCHAR',
                    'constraint' => 40,
                    'null' => false,
                ]
            ];
            $this->ci->dbforge->add_field($fields);
            $this->ci->dbforge->add_key('id', true);
            $this->ci->dbforge->create_table(self::PAYMENTS_STRIPE_TABLE);
        }

        return true;
    }

    /**
     * Return formatted system settings
     *
     * @return array
     */
    public function getSettingsMap()
    {
        foreach ($this->settings as $param_id => $param_data) {
            if (is_array($param_data)) {
                $this->settings[$param_id]["name"] = l('system_field_' . $param_id, 'payments');
            }
        }
        return $this->settings;
    }

    /**
     * Return customer by user ID
     *
     * @param array $params
     *
     * @return mixed
     */
    public function getCustomerByUserId($params)
    {
        $this->ci->db->select(implode(',', $this->fields));
        $this->ci->db->from(self::PAYMENTS_STRIPE_TABLE);

        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        return $this->ci->db->get()->result_array();
    }

    /**
     * Attach payment
     *
     * @param integer $payment_id
     * @param string $email
     * @param string $payment_method_id
     * @param integer $plan_id
     * @param array $system_settings
     *
     * @return void
     */
    public function attachPayment($payment_id, $email, $payment_method_id, $plan_id = null, $system_settings)
    {
        $this->stripe = new Stripe\StripeClient($system_settings['settings_data']['secret_word']);

        $customer_id = $this->attachPaymentToCustomer($email, $payment_method_id, $system_settings);

        $this->ci->load->model("Payments_model");
        $payment = $this->ci->Payments_model->getPaymentById($payment_id);

        if ($payment['payment_data']['module'] == 'access_permissions') {
            if (isset($payment['payment_data']['last_subscriptions']) && $payment['payment_data']['last_subscriptions']) {
                foreach ($payment['payment_data']['last_subscriptions'] as $key => $value) {
                    if (!empty($value['sub_id'])) {
                        try {
                            $this->stripe->subscriptions->cancel($value['sub_id']);
                            $this->ci->system_messages->addMessage(View::MSG_SUCCESS, l('last_subscription_delete_success', 'payments'));
                        } catch (\Exception $e) {
                            $this->ci->system_messages->addMessage(View::MSG_ERROR, $e->getMessage());
                        }
                    }
                }
            }
        }

        if ($customer_id && $plan_id) {
            try {
                $subscription = $this->stripe->subscriptions->create([
                    'customer' => $customer_id,
                    'items' => [
                        [
                            'plan' => $plan_id,
                        ],
                    ],
                    'default_payment_method' => $payment_method_id,
                    'metadata' => array('order_id' => $payment_id),
                    'expand' => ['latest_invoice.payment_intent'],
                ]);

                $payment['payment_data']['subscription_id'] = $subscription->id;
                $this->ci->Payments_model->savePayment($payment_id, ['payment_data' => serialize($payment['payment_data'])]);
                $this->ci->system_messages->addMessage(View::MSG_SUCCESS, l('new_subscription_create_success', 'payments'));
            } catch (\Exception $e) {
                $this->ci->system_messages->addMessage(View::MSG_ERROR, $e->getMessage());
            }
        }
    }

    /**
     * Create customer
     *
     * @param array $user
     * @param array $system_settings
     *
     * @return bool|string
     */
    public function createCustomer($user, $system_settings)
    {
        $this->stripe = new Stripe\StripeClient($system_settings['settings_data']['secret_word']);
        try {
            $customer = $this->stripe->customers->create([
                'email' =>  $user['email'],
                'name' => $user['output_name'],
                'metadata' => [
                    'user_id' => $user['id']
                ]
            ]);
        } catch (Stripe\Exception\ApiErrorException $e) {
            $this->ci->system_messages->addMessage(View::MSG_ERROR, $e->getMessage());
        }

        if (!empty($customer)) {
            $this->ci->db->insert(self::PAYMENTS_STRIPE_TABLE, [
                'id_user' => $user['id'],
                'customer_id' => $customer->id,
                'date_add' => date("Y-m-d H:i:s")
            ]);

            return $customer->id;
        }

        return false;
    }

    /**
     * Return customer
     *
     * @param array $user
     * @param array $system_settings
     *
     * @return mixed|string
     */
    public function getCustomer($user, $system_settings)
    {
        $res = current((array) $this->getCustomerByUserId([
            'where' => ['id_user' =>  $user['id']]
        ]));

        if (!empty($res)) {
            return $res['customer_id'];
        } else {
            return $this->createCustomer($user, $system_settings);
        }
    }

    /**
     * Attach payment to customer
     *
     * @param $email
     * @param $payment_method_id
     * @param $system_settings
     *
     * @return mixed|string
     */
    public function attachPaymentToCustomer($email, $payment_method_id, $system_settings)
    {
        $this->ci->load->model('Users_model');
        $user = $this->ci->Users_model->getUserByEmail($email);
        $customer_id = $this->getCustomer($user, $system_settings);

        $this->stripe = new Stripe\StripeClient($system_settings['settings_data']['secret_word']);

        try {
            $payment_method = $this->stripe->paymentMethods->retrieve($payment_method_id);
            $payment_method->attach(['customer' =>  $customer_id]);
        } catch (\Exception $e) {
            $this->ci->system_messages->addMessage(View::MSG_ERROR, $e->getMessage());
        }

        return $customer_id;
    }

    /**
     * Return js data
     *
     * @param array $payment_data payment data
     * @param array $system_settings system settings
     *
     * @return string
     *
     * @throws Stripe\Exception\ApiErrorException
     */
    public function getJs($payment_data, $system_settings)
    {
        if ($this->use_payment_intents_api === true) {
            $this->ci->load->helper('start');
            $req_data = $this->funcRequest($payment_data, $system_settings);

            $client_secret = $req_data['payment_intent_id'];
            $code = '
                <script src="https://js.stripe.com/v3/"></script>
                <style>
                    #card-element {    
                        border: 1px solid #00000069;
                        border-radius: 7px;
                        padding: 15px 30px;
                        margin-top: 15px;
                        box-shadow: 0px 0px 2px 0.5px rgba(50,50,93,.1), 0 2px 5px 0 rgba(50,50,93,.1), 0 1px 1.5px 0 rgba(0,0,0,.07);
                    }
                    .subscriptions-block {
                        border: 1px solid #b9b4b4;
                        border-radius: 6px;
                        display: inline-block;
                        padding: 0px 14px;
                        margin-top: 20px;
                    }
                </style>
                <form id="payment-form">
                    <div class="col-md-12 row">
                        <div class="col-xs-12 col-md-4" id="card-element"></div>
                    </div>
                    <div id="card-errors" role="alert"></div>    
                    <div class="col-md-12 row">
                        <button class="col-md-4 col-xs-12 mt10 btn btn-primary" id="submit">'
                        . l('pay_btn', 'payments') . ' '
                        . currency_format_output(['value' => $payment_data['amount'], 'cur_gid' => $payment_data['currency_gid']]) .
                        '</button>
                    </div>    
                </form>';

            if (isset($req_data['last_subscriptions'])) {
                $code .= '
                    <div class="subscriptions-block col-md-6">
                        <div class="col-md-12 row"><h3>'
                            . l('already_subscriptions', 'payments') .
                        ':</h3></div>';

                foreach ($req_data['last_subscriptions'] as $key => $value) {
                    $sub_name = ucfirst(explode('_', $value['sub_name'])[0]);
                   
                    $req_data['last_subscriptions'][$key]['sub_name_converted'] = $sub_name . ' - ' . currency_format_output(['value' => $value['sub_price'], 'cur_gid' => $payment_data['currency_gid']]) . ' ' . strtoupper($value['sub_currency']) . ' / ';

                    if ($value['sub_interval_count'] == 1) {
                        $req_data['last_subscriptions'][$key]['sub_name_converted'] .= l('every_' . $value['sub_interval_type'], 'payments');
                    } else {
                        $req_data['last_subscriptions'][$key]['sub_name_converted'] .= explode('_', $value['sub_name'])[1] . ' ' . explode('_', $value['sub_name'])[2];
                    }

                    $code .= '
                        <div class="col-md-12 mb5">'
                            . $req_data['last_subscriptions'][$key]['sub_name_converted'] .
                        '</div>';
                }

                $code .= '
                        <div class="col-md-12 row mt20 center"><label>* '
                            . l('already_subscriptions_info', 'payments') .
                        '</label></div>
                    </div>';
            }

            $code .= "
            <script>
                $(function(){ 
                    var stripe = Stripe('" . $system_settings['settings_data']['publish_word'] . "'); 
                    var elements = stripe.elements();
                    var style = {
                        base: {
                            color: '#32325d',
                        }
                    };

                    var card = elements.create('card', { style: style });
                    card.mount('#card-element');

                    card.addEventListener('change', ({error}) => {
                        const displayError = document.getElementById('card-errors');
                        if (error) {
                            displayError.textContent = error.message;
                        } else {
                            displayError.textContent = '';
                        }
                    });

                    var form = document.getElementById('payment-form');
                    var errors = new Errors();

                    form.addEventListener('submit', function(ev) {
                        ev.preventDefault();
                        ev.stopPropagation();

                        stripe.confirmCardPayment('" . $client_secret  ."', {
                            payment_method: {
                                card: card,
                                metadata: {
                                    order_id: " . $payment_data['id'] . "
                                },
                                billing_details: {
                                    name:  '" . $req_data['user']['output_name'] . "',
                                    email: '" . $req_data['user']['email'] . "',
                                    //phone: '" . $req_data['user']['phone'] . "'
                                }
                            },
                            setup_future_usage: 'off_session'
                        })
                        .then(function(result) {
                            if (result.error) {
                                // Show error to your customer (e.g., insufficient funds)
                                errors.show_error_block(result.error.message, 'error');
                            } else {
                                // The payment has been processed!
                                if (result.paymentIntent.status === 'succeeded') {
                                    var success_text = '" . l('successfully_paid', 'payments') . "';
                                    $('#submit').text(success_text);
                                    $('#submit').removeClass('btn-primary').addClass('btn-success active');
                                    $('#card-element').css('filter', 'blur(2px)');
                        ";

            $code .= "
                    $.ajax({
                        url: '" . site_url() . "payments/js/" . $payment_data['id'] . "/0/attach_payment',
                        type: 'POST',
                        cache: false,
                        data: {
                            email: '" . $req_data['user']['email'] . "',
                            payment_method: result.paymentIntent.payment_method
                ";

            if (isset($req_data['plan_id']) && $req_data['plan_id']) {
                $code .= ", plan_id: '" . $req_data['plan_id'] . "' ";
            }
                          
            $code .= "              
                        },
                        dataType: 'json'
                    });
                    ";

            $code .= "
                                    errors.show_error_block('" . l('successfully_paid', 'payments') . "', 'success');
                                    setTimeout(() => window.location.replace('" . site_url() . "users/account/payments_history'), 2000);
                                }
                            }
                        });
                    });
                });
            </script>";
        } else {
            $code = '<form data-payment="stripe" action="' . site_url() . 'payments/responce/stripe" method="POST">';
            $code .=  '<script src="' . $this->checkout_url . '" class="stripe-button" data-key="' . $system_settings['settings_data']['publish_word'] . '" data-currency="' . $payment_data['currency_gid'] . '" data-amount="' . ($payment_data['amount'] * 100) . '" data-description="' . htmlspecialchars($payment_data["payment_data"]["name"]) . '"></script>';
            $code .=  '<input type="hidden" name="invoice" value="' . htmlspecialchars($payment_data['id']) . '">';
            $code .=  '</form>';
        }

        return $code;
    }
}
