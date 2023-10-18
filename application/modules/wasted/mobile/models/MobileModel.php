<?php
namespace Pg\modules\mobile\models;

use Kreait\Firebase;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\RawMessageFromArray;

if (!defined('TOKENS_TABLE')) {
    define('TOKENS_TABLE', DB_PREFIX . 'inapp_billing_tokens');
}
if (!defined('PRODUCTS_TABLE')) {
    define('PRODUCTS_TABLE', DB_PREFIX . 'inapp_products');
}
if (!defined('TABLE_USERS')) {
    define('TABLE_USERS', DB_PREFIX . 'users');
}
if (!defined('FCM_TOKENS_TABLE')) {
    define('FCM_TOKENS_TABLE', DB_PREFIX . 'fcm_registration_tokens');
}
if (!defined('MOBILE_PUSH_NOTIFICATIONS')) {
    define('MOBILE_PUSH_NOTIFICATIONS', DB_PREFIX . 'mobile_push_notifications');
}

/**
 * Mobile main model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class MobileModel extends \Model
{

    /**
     * Module gid
     *
     * @var string
     */
    const MODULE_GID = 'mobile';

    /**
     * Database date format
     *
     * @var string
     */
    const DB_DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * Module settings
     *
     * @var array
     */
    private $settings = [];

    /**
     * Module settings key
     *
     * @var array
     */
    private $settings_keys = [
        'ios_url',
        'android_url',
        'firebase_api_key',
        'firebase_auth_domain',
        'firebase_database_url',
        'firebase_project_id',
        'firebase_storage_bucket',
        'firebase_messaging_sender_id',
        'firebase_public_vapid_key',
        'firebase_service_key',
        'use_notifications'
    ];

    /**
     * Table MOBILE_PUSH_NOTIFICATIONS properties
     *
     * @var array
     */
    private $fields = [
        MOBILE_PUSH_NOTIFICATIONS => [
            'id',
            'module',
            'gid',
            'status',
            'date_modified'
        ]
    ];

    /**
     * Devices list
     *
     * @var array
     */
    public $devices = [
        'iPhone',
        'iPad',
        'Android'
    ];

    /**
     * Backend method to get menu indicators.
     *
     * @param array $params
     *
     * @return array
     */
    public function backendGetIndicators($params)
    {
        $this->id_user = $params['id_user'];
        $results = array();
        foreach ($params['indicators'] as $indicator) {
            // TODO: убрать после приведения к PSR
            if (!method_exists($this, $indicator)) {
                $chunks = explode('_', $indicator);
                $indicator = array_shift($chunks);
                foreach ($chunks as $chunk) {
                    $indicator .= ucfirst($chunk);
                }
                if (!method_exists($this, $indicator)) {
                    continue;
                }
            }

            // TODO: refactor to use modules own methods

            $results[$indicator] = $this->$indicator();
        }
          
        return $results;
    }

    /**
     * New tickets
     *
     * @return mixed
     */
    private function newTickets()
    {
        $this->ci->load->model('Tickets_model');

        return $this->ci->Tickets_model->getCountNewMessages($this->id_user, 1);
    }

    /**
     * New count messages
     *
     * @return int
     */
    private function newMessages()
    {
        $count_new_mess = 0;
        $this->ci->load->model('im/models/Im_messages_model');
        if ($this->ci->pg_module->is_module_installed('chatbox')) {
            $this->ci->load->model('chatbox/models/Chatbox_contact_list_model');
            $result_chatbox = $this->ci->Chatbox_contact_list_model->backendCheckNewMessages();
            $count_new_mess += intval($result_chatbox['count_new']);
        } else {
            $result_im = intval($this->ci->Im_messages_model->get_unread_count($this->id_user, 'i'));
            $count_new_mess += $result_im;
        }
       
        return $count_new_mess;
    }

    /**
     * New friends
     *
     * @return mixed
     */
    private function newFriends()
    {
        if ($this->ci->pg_module->is_module_installed('friendlist')) {
            $this->ci->load->model('Friendlist_model');

            return $this->ci->Friendlist_model->get_list_count($this->id_user, 'request_in');
        }
    }

    /**
     * New guests
     *
     * @return int
     */
    private function newGuests()
    {
        $user_id = $this->ci->session->userdata('user_id');
        $this->ci->load->model('users/models/Users_views_model');
        $all_viewers = $this->ci->Users_views_model->get_viewers_daily_unique($user_id, null, null, array('view_date' => 'DESC'), array(), 'all', 1);
        return count($all_viewers);
    }

    /**
     * New files
     *
     * @return mixed
     */
    private function newFiles()
    {
        $user_id = $this->ci->session->userdata('user_id');
        $this->ci->load->model('file_uploads/models/File_uploads_android_model');

        return $this->ci->File_uploads_android_model->get_unviewed_count($user_id);
    }

    /**
     * New chats
     *
     * @return mixed
     */
    private function newChats()
    {
        $this->ci->load->model('Chats_model');
        return $this->ci->Chats_model->get_chats_count();
    }

    /**
     * New kisses
     *
     * @return mixed
     */
    private function newKisses()
    {
        $this->ci->load->model('Kisses_model');
        $user_id = $this->ci->session->userdata('user_id');
        return $this->ci->Kisses_model->new_kisses_count($user_id);
    }

    /**
     * New gifts
     *
     * @return mixed
     */
    private function newGifts()
    {
        $this->ci->load->model('Virtual_gifts_model');
        $user_id = $this->ci->session->userdata('user_id');
        $params['where'] = array(
            'status' => 'pending',
        );

        return $this->ci->Virtual_gifts_model->getUserGiftsCount($user_id, $params);
    }

    /**
     * Return settings
     *
     * @param bool $force
     *
     * @return array
     */
    public function getSettings($force = false)
    {
        if ($force || empty($this->settings)) {
            foreach ($this->settings_keys as $settings_key) {
                $this->settings[$settings_key] = $this->ci->pg_module->get_module_config(self::MODULE_GID, $settings_key);
            }
        }

        return $this->settings;
    }

    /**
     * Save settings
     *
     * @param $settings
     *
     * @return void
     */
    public function setSettings($settings)
    {
        foreach ($settings as $key => $value) {
            if (in_array($key, $this->settings_keys)) {
                $this->ci->pg_module->set_module_config(self::MODULE_GID, $key, $value);
            }
        }
    }

    /**
     * Languages replace
     *
     * @param $langs
     *
     * @return string|string[]
     */
    public function langsReplace($langs)
    {
        $langs = str_replace('%mobile_search_url%', SITE_VIRTUAL_PATH . 'm/#!/search/', $langs);
        return $langs;
    }

    /**
     * Methods for in-app billing in mobile application
     *
     * @param $token_info
     *
     * @return bool
     */
    public function setUpdateTokenInfo($token_info)
    {
        $result = false;
        if (!empty($token_info['access_token']) && !empty($token_info['token_type']) && !empty($token_info['expires_in'])) {
            $attrs = [
                'token' => $token_info['access_token'],
                'token_type' => $token_info['token_type'],
                'expires' => date("U") + $token_info['expires_in'],
            ];
            $where = ['token_name' => 'access_token'];
            $this->ci->db->where($where)->update(TOKENS_TABLE, $attrs);
            $result = true;
        }

        if (!empty($token_info['refresh_token'])) {
            $attrs = [
                'token' => $token_info['refresh_token'],
            ];
            $where = ['token_name' => 'refresh_token'];
            $this->ci->db->where($where)->update(TOKENS_TABLE, $attrs);
            $result = true;
        }

        return $result;
    }

    /**
     * Return refresh token
     *
     * @return mixed
     */
    public function getRefreshToken()
    {
        $this->ci->db->select("token")->from(TOKENS_TABLE)->where("token_name", "refresh_token");
        $result = $this->ci->db->get()->result_array();
        return $result[0]['token'];
    }

    /**
     * Return token info
     *
     * @return array
     */
    public function getTokenInfo()
    {
        $this->ci->db->select("token, token_type")->from(TOKENS_TABLE)->where("token_name", "access_token");
        $result = $this->ci->db->get()->result_array();
        $token_info = [
            'access_token' => $result[0]['token'],
            'token_type' => $result[0]['token_type'],
        ];
        return $token_info;
    }

    /**
     * Return access token expired
     *
     * @return bool
     */
    public function getAccessTokenExpired()
    {
        $this->ci->db->select("expires")->from(TOKENS_TABLE)->where("token_name", "access_token");
        $result = $this->ci->db->get()->result_array();
        if (date("U") > $result[0]['expires']) {
            return true;
        }
        return false;
    }

    /**
     * Return product by ID
     *
     * @param null $id
     *
     * @return array|null
     */
    public function getProductById($id = null)
    {
        if (is_null($id)) {
            return null;
        }

        $this->ci->db
            ->select("id, type, model, sku, price, group_period_id, service_gid")
            ->from(PRODUCTS_TABLE)->where("id", $id);
        $result = $this->ci->db->get()->result_array();
        if (!empty($result[0])) {
            return $result[0];
        } else {
            return null;
        }
    }

    /**
     * Save product
     *
     * @param integer $id
     * @param array $data
     * @param array $langs
     *
     * @return integer|null
     */
    public function saveProduct($id = null, $data = array(), $langs = array())
    {
        if (empty($data)) {
            return null;
        }

        if (is_null($id)) {
            $this->ci->db->insert(PRODUCTS_TABLE, $data);
            $id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->update(PRODUCTS_TABLE, $data);
        }

        if (!empty($langs)) {
            $current_lang_name = $langs[$this->pg_language->current_lang_id];
            foreach ($this->pg_language->languages as $lang) {
                $lang_id = $lang['id'];
                if (!empty($langs[$lang_id])) {
                    $this->pg_language->pages->set_string("mobile_product", "product_" . $id, $langs[$lang_id], $lang_id);
                } else {
                    $this->pg_language->pages->set_string("mobile_product", "product_" . $id, $current_lang_name, $lang_id);
                }
            }
        }

        return $id;
    }

    /**
     * Return product list
     *
     * @param array $type
     * @param string $model
     *
     * @return mixed
     */
    public function getProductList($type = ['android', 'ios'], $model = 'account')
    {
        $data = $this->ci->db
            ->select("id, type, model, sku, price, group_period_id, service_gid")
            ->from(PRODUCTS_TABLE)
            ->where_in('type', (array)$type)
            ->where('model', $model)
            ->get()
            ->result_array();

        if (!empty($data)) {
            $this->ci->load->model(['Users_model', 'Access_permissions_model', 'Services_model',
                'access_permissions/models/Access_permissions_groups_model',
                'access_permissions/models/Access_permissions_settings_model',
                'access_permissions/models/Access_permissions_users_model',
            ]);

            $groups = $this->ci->Access_permissions_groups_model->formatGroups(
                $this->ci->Users_model->getUserTypesGroups(['where' => ['is_active' => 1]])
            );

            $periods = $this->ci->Access_permissions_settings_model->getAccessData(
                    $this->ci->Access_permissions_model->roles['user']
                )->getPriceGroups('user');

            $groups = $this->ci->Access_permissions_model->formatGroups($groups, $periods);

            $services = $this->ci->Services_model->getServiceList([
                'where' => [
                    'type' => 'tariff',
                    'status' => 1,
                ],
            ]);

            foreach ($data as $key => $value) {
                if ($value['model'] == 'subscription') {
                    foreach ($groups as $group) {
                        foreach ($group['periods'] as $period) {
                            if ($period['id'] == $value['group_period_id']) {
                                $data[$key]['name'] = $period['period_str'];
                                break;
                            }
                        }
                    }
                } elseif ($value['model'] == 'service') {
                    foreach ($services as $service) {
                        if ($service['gid'] == $value['service_gid']) {
                            $data[$key]['name'] = $service['name'];
                            break;
                        }
                    }
                } else {
                    $data[$key]['name'] = l('product_' . $value["id"], 'mobile_product');
                }
            }
        }

        return $data;
    }

    /**
     * Delete product
     *
     * @param integer $id
     *
     * @return void
     */
    public function deleteProduct($id)
    {
        $this->ci->db
            ->where('id', (int) $id)
            ->delete(PRODUCTS_TABLE);
    }

    /**
     * Return product by sku
     *
     * @param string $sku
     *
     * @return bool|mixed
     */
    public function getProductBySku($sku)
    {
        $ret = $this->ci->db
            ->select("id, type, model, sku, price, group_period_id, service_gid")
            ->from(PRODUCTS_TABLE)
            ->where("sku", (string) $sku)
            ->get()
            ->result_array();

        if ($ret && is_array($ret)) {
            return $ret[0];
        }

        return false;
    }

    /**
     * Update payment
     *
     * @param float $amount
     * @param string $type_gid
     *
     * @return void
     */
    public function updatePayment($amount = null, $type_gid = 'account')
    {
        if (is_null($amount)) {
            return;
        }
        $this->ci->load->model('payments/models/Payment_currency_model');
        $currency = $this->ci->Payment_currency_model->default_currency["gid"];
        $user_id = $this->ci->session->userdata('user_id');

        $payment_data = array(
            "payment_type_gid" => $type_gid,
            "id_user" => $user_id,
            "amount" => $amount,
            "currency_gid" => $currency,
            "status" => 1,
            "system_gid" => 'inapp_purchase',
            "payment_data" => array("name" => "In-app purchase"),
        );
        $this->ci->load->model('Payments_model');
        $payment_data = $this->ci->Payments_model->validate_payment(null, $payment_data);
        $indicator_id = $this->ci->Payments_model->save_payment(null, $payment_data['data']);
        $this->ci->load->model('menu/models/Indicators_model');
        $this->ci->Indicators_model->delete('new_payment_item', $indicator_id, true);

        if ($type_gid == 'account') {
            $this->ci->db->set('account', 'account + ' . $amount, false);
            $this->ci->db->where('id', $user_id);
            $this->ci->db->update(TABLE_USERS);
        }

        return;
    }

    /**
     * Save Fcm Registration ID
     *
     * @param integer $user_id
     * @param integer $reg_id
     * @param string $device_id
     *
     * @return void
     */
    public function setFcmRegistrationId($user_id, $reg_id, $device_id='')
    {
        if (empty($reg_id) || empty($user_id)) {
            return;
        }

        $this->ci->db->select("id, user_id, registration_id")->from(FCM_TOKENS_TABLE)->where("user_id", $user_id);

        if ($device_id) {
            $this->ci->db->where("device_id", $device_id);
        }

        $result = $this->ci->db->get()->result_array();
        if (!empty($result)) {
            foreach ($result as $r) {
                if ($r['device_id'] == $device_id) {
                    $this->ci->db->set('registration_id', $reg_id);
                    $this->ci->db->where('user_id', $user_id);

                    if ($device_id) {
                        $this->ci->db->where('device_id', $device_id);
                    }

                    $this->ci->db->update(FCM_TOKENS_TABLE);
                    return;
                }
            }
        } else {
            $attrs = ['user_id' => $user_id, 'registration_id' => $reg_id, 'device_id' => $device_id ?: ""];
            $this->ci->db->insert(FCM_TOKENS_TABLE, $attrs);
        }
    }

    /**
     * Delete Fcm Registration ID
     *
     * @param integer $user_id
     * @param string $device_id
     * @param string $registration_id
     *
     * @return void
     */
    public function deleteFcmRegistrationId($user_id, $device_id = '', $registration_id = '')
    {
        if (empty($user_id)) {
            return;
        }
        $this->ci->db->where('user_id', $user_id);

        if ($device_id) {
            $this->ci->db->where('device_id', $device_id);
        }

        if ($registration_id) {
            $this->ci->db->where('registration_id', $registration_id);
        }

        $this->ci->db->delete(FCM_TOKENS_TABLE);
    }

    /**
     * Return reg token by user ID
     *
     * @param $user_id
     *
     * @return array|void
     */
    public function getRegTokenByUserId($user_id)
    {
        if (empty($user_id)) {
            return;
        }

        $this->ci->db->select("id, user_id, registration_id")->from(FCM_TOKENS_TABLE)->where("user_id", $user_id);
        $result = $this->ci->db->get()->result_array();
        if (!empty($result[0])) {
            return $result[0]['registration_id'];
        }
        return array();
    }

    /**
     * Return reg tokens by user ID
     *
     * @param $user_id
     *
     * @return array|void
     */
    public function getRegTokensByUserId($user_id)
    {
        if (empty($user_id)) {
            return;
        }

        $this->ci->db->select("id, user_id, registration_id")->from(FCM_TOKENS_TABLE)->where("user_id", $user_id);
        $result = $this->ci->db->get()->result_array();
        if (!empty($result)) {
            $tokens = [];
            foreach ($result as $r) {
                $tokens = $result[0]['registration_id'];
            }
            return $tokens;
        }
        return;
    }

    /**
     * Push notification
     *
     * @param $id_contact
     * @param $title
     * @param $text
     * @param string $activity_name
     * @param string $app_module
     * @param array $args
     * @param string $link
     * @throws Firebase\Exception\FirebaseException
     * @throws Firebase\Exception\MessagingException
     */
    public function pushNotification($id_contact, $title, $text, $activity_name = "", $app_module = "", $args = array(), $link = '')
    {
        $registrationId = $this->getRegTokensByUserId($id_contact);
        if (empty($registrationId)) {
            return;
        }
        $this->sendPushNotification($registrationId, $id_contact, $title, $text, $activity_name, $app_module, $args, $link);
    }

    /**
     * Send push notification
     *
     * @param integer $registrationId
     * @param integer $id_contact
     * @param string $title
     * @param string $text
     * @param string $activity_name
     * @param string $app_module
     * @param array $args
     * @param string $link
     * @return array
     * @throws Firebase\Exception\FirebaseException
     * @throws Firebase\Exception\MessagingException
     */
    public function sendPushNotification($registrationId, $id_contact, $title, $text, $activity_name = "", $app_module = "", $args = array(), $link='')
    {
        $msg = [
            'link' => $link,
            'message' => $text,
            'title'	=> $title,
            'activity' => $activity_name,
            'module' => $app_module,
            'receiver_id' => strval($id_contact),
        ];

        foreach ($args as $k => $v) {
            $msg[$k] = strval($v);
        }

        if (!is_array($registrationId)) {
            $registrationId = [$registrationId];
        }

        $messaging = (new Firebase\Factory())
            ->withServiceAccount(dirname(SITE_PATH) . '/gaccess.json')
            ->createMessaging();

        $message = CloudMessage::new();

        $message = new RawMessageFromArray([
            'notification' => [
                'title' => $title ?: $_SERVER['HTTP_HOST'],
                'body' => $text ?: l('new_message', 'mobile'),
            ],
            'data' => $msg,
            /*'apns' => [
                'headers' => [
                    'apns-priority' => '10',
                ],
                'payload' => [
                    'aps' => [
                        'alert' => [
                            'title' => $title ?: 'site.com',
                            'body' => $text ?: l('new message', 'mobile'),
                        ],
                        'badge' => 1,
                    ],
                ],
            ],*/
        ]);

        $report = $messaging->sendMulticast($message, $registrationId);

        /*echo 'Successful sends: '.$report->successes()->count().PHP_EOL;
        echo 'Failed sends: '.$report->failures()->count().PHP_EOL;*/

        $result = [];

        return $result;
    }

    /**
     * Return registered user IDs
     *
     * @param array $params
     * @param int $items_on_page
     * @param int $page
     *
     * @return array
     */
    public function getRegisteredUserIds($params = [], $items_on_page = 20, $page = 1)
    {
        $this->ci->db->select("user_id")->from(FCM_TOKENS_TABLE);
        if (isset($params['where'])) {
            foreach ($params['where'] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        $result = $this->ci->db->get()->result_array();
        $result = array_map(function($value) {
            return $value['user_id'];
        }, $result);
        return $result;
    }

    /**
     * Push notifications list
     *
     * @param array $params
     * @param boolean $is_format
     *
     * @return array
     */
    public function getPushNotificationsList($params = [], $is_format = false)
    {
        $this->ci->db->select(implode(', ', $this->fields[MOBILE_PUSH_NOTIFICATIONS]));
        $this->ci->db->from(MOBILE_PUSH_NOTIFICATIONS);
        if (isset($params['where'])) {
            foreach ($params['where'] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        return ($is_format === true) ? $this->formatPushNotifications($this->ci->db->get()->result_array()) : $this->ci->db->get()->result_array();
    }

    /**
     * Push notification
     *
     * @param array $params
     * @param boolean $is_format
     *
     * @return array
     */
    public function getPushNotification(array $params, $is_format = false)
    {
        $this->ci->db->select(implode(', ', $this->fields[MOBILE_PUSH_NOTIFICATIONS]));
        $this->ci->db->from(MOBILE_PUSH_NOTIFICATIONS);
        if (isset($params['where'])) {
            foreach ($params['where'] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        return ($is_format === true) ? $this->formatPushNotification($this->ci->db->get()->result_array()[0]) : $this->ci->db->get()->result_array()[0];

    }

    /**
     * Format push notifications list
     *
     * @param array $data
     *
     * @return array
     */
    public function formatPushNotifications(array $data)
    {
        foreach ($data as $key => $notification) {
            $data[$key]['name'] = l('push_' . $notification['gid'], $notification['module']);
            $data[$key]['status'] = (bool) $notification['status'];
        }
        return $data;
    }

    /**
     * Format push notification
     *
     * @param array $data
     *
     * @return array
     */
    public function formatPushNotification(array $data)
    {
        if ($data) {
            $return = $this->formatPushNotifications([0 => $data]);
            return $return[0];
        }
        return [];
    }

    /**
     * Change push notifivation
     *
     * @param string $gid
     * @param array $attrs
     */
    public function setPushNotification($gid, $attrs)
    {
        if (!empty($gid) && !empty($attrs)) {
            $attrs['date_modified'] = date(self::DB_DATE_FORMAT);
            $this->ci->db->where('gid', $gid);
            $this->ci->db->update(MOBILE_PUSH_NOTIFICATIONS, $attrs);
        }
    }

    /**
     * Add push notifications list
     *
     * @param array $data
     *
     * @return void
     */
    public function callbackAddPushNotifications(array $data)
    {
        foreach ($data as $value) {
            $notification = $this->getPushNotification([
                'where' => ['gid' => $value['gid']]
            ]);
            if (empty($notification)) {
                $value['date_modified'] = date(self::DB_DATE_FORMAT);
                $this->ci->db->insert(MOBILE_PUSH_NOTIFICATIONS, $value);
            }
        }
    }

    /**
     * Delete push notifications list
     * @param array $gids
     *
     * @return void
     */
    public function callbackDeletePushNotifications($gids)
    {
        if (!empty($gids)) {
            $this->ci->db->where_in('gid', $gids);
            $this->ci->db->delete(MOBILE_PUSH_NOTIFICATIONS);
        }
    }

    public function isApp()
    {
        $is_app = 0;
        $this->ci->load->library('user_agent');
        foreach ($this->devices as $device) {
            if (stripos($this->ci->agent->agent_string(), $device) !== false) {
                $is_app = 1;
            }
        }
        return $is_app;
    }

    public function __call($name, $args)
    {
        $methods = [
            'backend_get_indicators' => 'backendGetIndicators',
            'new_friends' => 'newFriends',
            'new_messages' => 'newMessages',
            'get_product_by_id' => 'getProductById',
            'save_product' => 'saveProduct',
            'set_update_token_info' => 'setUpdateTokenInfo',
            'get_refresh_token' => 'getRefreshToken',
            'get_token_info' => 'getTokenInfo',
            'get_access_token_expired' => 'getAccessTokenExpired',
            'get_product_list' => 'getProductList',
            'delete_product' => 'deleteProduct',
            'get_product_by_sku' => 'getProductBySku',
            'update_payment' => 'updatePayment',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $name);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
