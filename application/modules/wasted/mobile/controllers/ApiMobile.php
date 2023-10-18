<?php

namespace Pg\modules\mobile\controllers;

/**
 * Mobile version API controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * */
class ApiMobile extends \Controller
{

    /**
     * Constructor
     *
     * @return Api_Mobile
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobile_model');
    }

    private function saveLang($lang_id = null)
    {
        if (!$lang_id) {
            $sess_lang_id = (int) $this->session->userdata('lang_id');
            $lang_id      = !empty($sess_lang_id) ? $sess_lang_id : $this->pg_language->get_default_lang_id();
        }
        $this->session->set_userdata('lang_id', $lang_id);
        $this->session->sess_update();
        return $lang_id;
    }

    private function getAppUrls()
    {
        $settings = $this->Mobile_model->getSettings();
        return [
            'android_url' => $settings['android_url'],
            'ios_url' => $settings['ios_url'],
        ];
    }

    private function getCssUrl()
    {
        $this->load->library('pg_theme');
        $theme_settings = $this->pg_theme->return_active_settings($this->pg_theme->get_current_theme_type());
        return $this->pg_theme->theme_default_url . $theme_settings['theme'] . '/sets/' . $theme_settings['scheme'] . '/css/';
    }

    private function getLogoPath()
    {
        $this->load->library('pg_theme');
        $theme_data = $this->pg_theme->format_theme_settings($this->router->class);
        return $theme_data['mini_logo']['path'];
    }

    /**
    * @api {post} /mobile/init Initialization mobile version
    * @apiGroup Mobile
    * @apiParam {int} [lang_id] language id
    * @apiParam {boolean} [is_app] is moble application 
    */
    public function init($lang_id = null)
    {
        $this->load->model(['Users_model', 'Properties_model', 'payments/models/Payment_currency_model']);

        $saved_lang_id = $this->saveLang($lang_id);

        $mconfig = [
            'favourites' => false,
            'friendlist' => false,
            'im' => false,
            'like_me' => false,
            'likes' => false,
        ];

        $modules = $this->pg_module->return_modules();
        
        foreach ($modules as $module) {
            $mconfig[$module['module_gid']] = $module['is_disabled'] ? false : true;
        }
        
        if ($mconfig['users']) {
            $mconfig['my_guests'] = true;
        }
        
        if ($mconfig['chats']) {
            $this->load->model('Chats_model');
            $chatActive = $this->Chats_model->getActive();
            $mconfig['videochat'] = !empty($chatActive) && $chatActive->getGid() == 'pg_videochat';
        }

        $data          = [
            'data' => [
                'cssUrl' => $this->getCssUrl(),
                'cssFolderUrl' => $this->getCssUrl(),
                'siteUrl' => site_url(),
                'appUrls' => $this->getAppUrls(),
                'logo' => $this->getLogoPath(),
                'services_add_money' => site_url() . 'users/account/update/',
                'users_count' => $this->Users_model->getActiveUsersCount(),
            ],
            'modules' => $mconfig,
            'l' => $this->Mobile_model->langsReplace($this->pg_language->pages->return_module('mobile', $saved_lang_id)),
            'language' => $this->pg_language->get_lang_by_id($saved_lang_id),
            'languages' => $this->pg_language->languages,
            'properties' => [
                'userTypes' => $this->Properties_model->getProperty('user_type', $saved_lang_id),
                'lookingUserTypes' => $this->Properties_model->getProperty('looking_user_type', $saved_lang_id),
                'age' => [
                    'min' => $this->pg_module->get_module_config('users', 'age_min'),
                    'max' => $this->pg_module->get_module_config('users', 'age_max'),
                ],
                'currency' => $this->Payment_currency_model->default_currency,
            ],
            'userData' => false
        ];
        
        if ($this->session->userdata('auth_type') == 'user') {
            $data['userData'] = $this->Users_model->getUserById($this->session->userdata('user_id'), true, false);
        }  

        $data['not_editable_fields'] = $this->Users_model->fields_not_editable;
        if (!$this->pg_module->is_module_installed('perfect_match')) {
            $data['not_editable_fields'][] = 'looking_user_type';
            $data['not_editable_fields'][] = 'partner_age';
        }

        if (filter_input(INPUT_POST, 'is_app')) {
            $data['l'] = $this->pg_language->pages->return_module('mobile_app', $saved_lang_id);
            if (empty($data['l'])) {
                log_message('error', 'empty_app_langs');
            }
        } else {
            $data['l'] = $this->Mobile_model->langsReplace(
                    $this->pg_language->pages->return_module('mobile', $saved_lang_id));
        }
        
        $data['data']['is_app'] = $this->Mobile_model->isApp();

        $data['data']['is_demo'] = $_ENV['DEMO_MODE'];
        $this->set_api_content('data', $data);
    }

    /**
    * @api {post} /mobile/changeLang Change language
    * @apiGroup Mobile
    * @apiParam {int} lang_id language id
    * @apiParam {boolean} [is_app] is moble application 
    */
    public function changeLang()
    {
        $lang_id = filter_input(INPUT_POST, 'lang_id');
        
        if (!$lang_id) {
            log_message('error', 'languages API: Empty lang id');
            $this->set_api_content('error', l('api_error_empty_lang_id', 'languages'));
            return false;
        }
        
        $this->load->model(['Properties_model', 'Users_model']);

		if ($this->session->userdata('auth_type') == 'user') {
			$id_user = intval($this->session->userdata('user_id'));
			$this->Users_model->saveUser($this->session->userdata('user_id'), ['lang_id' => $lang_id]);
		}

        if (filter_input(INPUT_POST, 'is_app')) {
            $langs = $this->pg_language->pages->return_module('mobile_app', $lang_id);
        } else {
            $langs = $this->Mobile_model->langsReplace($this->pg_language->pages->return_module('mobile', $lang_id));
        }        
     
        $this->session->set_userdata('lang_id', $lang_id);
        $this->session->sess_update();
        $this->set_api_content('data', [
            'language' => $this->pg_language->get_lang_by_id($lang_id),
            'l' => $langs,
            'properties' => [
                'userTypes' => $this->Properties_model->get_property('user_type', $lang_id),
                'lookingUserTypes' => $this->Properties_model->getProperty('looking_user_type', $lang_id),
            ]
        ]);
    }

    public function getConfig()
    {
        // TODO: $this->pg_module->get_module_config($module, $gid);
    }

    /**
    * @api {post} /mobile/verifyPurchase Verify purchase
    * @apiGroup Mobile
    * @apiParam {int} packageName package name
    * @apiParam {int} productId product id
    * @apiParam {int} purchaseToken purchase token
    */
    public function verifyPurchase()
    {
        $api_key       = $this->pg_module->get_module_config('mobile', 'api_key');
        $client_id     = $this->pg_module->get_module_config('mobile', 'client_id');
        $client_secret = $this->pg_module->get_module_config('mobile', 'client_secret');

        $is_token_expired = $this->Mobile_model->getAccessTokenExpired();

        if ($is_token_expired) {
            $result = false;

            $refresh_token = $this->Mobile_model->getRefreshToken();

            $params = [
                'client_id' => $client_id,
                'client_secret' => $client_secret,
                'refresh_token' => $refresh_token,
                'grant_type' => 'refresh_token',
            ];

            $url = 'https://accounts.google.com/o/oauth2/token';

            $curl   = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($curl);
            curl_close($curl);

            $token_info = json_decode($result, true);
            $is_updated = $this->Mobile_model->setUpdateTokenInfo($token_info);
        } else {
            $token_info = $this->Mobile_model->getTokenInfo();
        }

        $input_post = [
            'package_name' => filter_input(INPUT_POST, 'packageName'),
            'product_id' => filter_input(INPUT_POST, 'productId'),
            'purchase_token' => filter_input(INPUT_POST, 'purchaseToken'),
        ];

        $url = "https://www.googleapis.com/androidpublisher/v2/applications/" . $input_post['package_name'] . "/purchases/products/" . $input_post['product_id'] . "/tokens/" . $input_post['purchase_token'] . "?key=" . $api_key;

        $ch      = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => ['Authorization: ' . $token_info['token_type'] . ' ' . $token_info['access_token']],
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_VERBOSE => 1,
        );

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);

        if ($result["purchaseState"] == '0' && $result["consumptionState"] == '0') {
            $product = $this->Mobile_model->getProductBySku($input_post['product_id']);
            if (!empty($product['price'])) {
                $amount = $product['price'];
            } else {
                $amount = 0;
            }

            $this->Mobile_model->updatePayment($amount);

            $data['message'] = l('success_purchase', 'mobile');
        } else {
            $data['message'] = l('error_purchase', 'mobile');
        }

        $this->set_api_content('data', $data);
    }

    /**
    * @api {post} /mobile/productList Product list
    * @apiGroup Mobile
    */
    public function productList()
    {
        $data = $this->Mobile_model->getProductList();
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $data[$key]['name'] = l('product_' . $value["id"], 'mobile_product');
            }
        }
        $this->set_api_content('data', $data);
    }

    /**
    * @api {post} /mobile/setFcmRegistrationToken Set registration token
    * @apiGroup Mobile
    * @apiParam {int} device_id device id
    * @apiParam {int} registration_id registration id
    */
    public function setFcmRegistrationToken()
    {
        $user_id = intval($this->session->userdata('user_id'));
        $device_id = filter_input(INPUT_POST, 'device_id');
        $reg_id = filter_input(INPUT_POST, 'registration_id');
        if (empty($reg_id)) {
            return;
        }
        $this->Mobile_model->setFcmRegistrationId($user_id, $reg_id, $device_id);
    }

    /**
    * @api {post} /mobile/deleteFcmRegistrationToken Delete registration token
    * @apiGroup Mobile
    * @apiParam {int} user_id user id 
    * @apiParam {int} device_id device id
    * @apiParam {int} registration_id registration id
    */
    public function deleteFcmRegistrationToken()
    {
        $user_id = (int)filter_input(INPUT_POST, 'user_id');
        $device_id = filter_input(INPUT_POST, 'device_id');
        $registration_id = filter_input(INPUT_POST, 'registration_id');
        if (empty($user_id)) {
            return;
        }
        $this->Mobile_model->deleteFcmRegistrationId($user_id, $device_id, $registration_id);        
    }

    /**
    * @api {post} /mobile/getPushNotifications Get notifications
    * @apiGroup Mobile
    */
    public function getPushNotifications()
    {
        $data = [
            'notifications' => $this->Mobile_model->getPushNotificationsList([], true)
        ];
        $this->set_api_content('data', $data);
    }

    /**
    * @api {post} /mobile/setPushNotifications Set notifications
    * @apiGroup Mobile
    * @apiParam {string} notification notification gid
    * @apiParam {boolean} status status
    */
    public function setPushNotifications()
    {
        $notification = [
            'gid' => filter_input(INPUT_POST, 'notification', FILTER_SANITIZE_STRING),
            'status' => filter_input(INPUT_POST, 'status', FILTER_VALIDATE_BOOLEAN),
        ];
        $this->Mobile_model->setPushNotification($notification['gid'], ['status' => intval($notification['status'])]);
    }
}
