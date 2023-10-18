<?php

namespace Pg\modules\social_networking\models\services;

/**
 * Social networking google service model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class GoogleServiceModel extends \Model
{
    public $api_url = 'https://www.googleapis.com/oauth2/v1/';

    public function getUserData($user_id = 0, $access_key = '')
    {
        $this->ci->load->model('Social_networking_connections_model');
        $params = array(
            'access_token' => $access_key,
        );
        $response = $this->ci->Social_networking_connections_model->curl_get($this->api_url . 'userinfo', $params);
        $data = (array) @json_decode($response);
        if (isset($data['id']) && isset($data['email']) && isset($data['given_name']) && isset($data['family_name'])) {
            $user_data = array(
                'id'    => $data['id'],
                'email' => $data['email'],
                'fname' => $data['given_name'],
                'sname' => $data['family_name'],
            );

            return $user_data;
        }

        return false;
    }

    public function getAuthParams($service_data = array(), $redirect)
    {
        $app_key = isset($service_data['app_key']) ? $service_data['app_key'] : false;
        $params = array(
            'client_id'     => $app_key,
            'redirect_uri'  => site_url(),
            'state'         => str_replace(site_url(), '/', $redirect),
            'response_type' => 'code',
            'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
        );
        ksort($params);

        return $params;
    }

    public function getTokenParams($service_data = array(), $redirect)
    {
        $app_key = isset($service_data['app_key']) ? $service_data['app_key'] : false;
        $app_secret = isset($service_data['app_secret']) ? $service_data['app_secret'] : false;
        $params = array(
            'client_id'     => $app_key,
            'client_secret' => $app_secret,
            'redirect_uri'  => site_url(),
            'grant_type' => 'authorization_code',
        );
        ksort($params);

        return $params;
    }
}
