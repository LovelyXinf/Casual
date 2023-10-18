<?php

namespace Pg\modules\chatbox\models;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Messaging Center module
 * API model
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class ChatboxApiModel extends \Model
{
    const MODULE_GID = 'chatbox';

    const ACTION_MESSAGE_SENT               = 'message_sent';
    const ACTION_USER_GET                   = 'user_get';
    const ACTION_USER_IMAGES_GET            = 'user_images_get';
    const ACTION_KISSES_LIST_GET            = 'kisses_list_get';
    const ACTION_AVAILABLE_CHAT_ACTIONS_GET = 'available_chat_actions_get';
    const ACTION_CHAT_ACTION_SET            = 'chat_action_set';

    protected $actions = [
        self::ACTION_MESSAGE_SENT   => 'actionMessageReceived',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getDomain($id)
    {
        $this->ci->load->model('start/models/StartDomainsModel');
        return $this->ci->StartDomainsModel->getById($id);
    }

    public function action($domain_id, $action)
    {
        if (empty($this->actions[$action])) {
            return false;
        }

        $method = $this->actions[$action];
        return $this->{$method}($domain_id);
    }

    protected function actionMessageReceived($domain_id)
    {
        $user_id        = intval($this->ci->input->post('user_id', true));
        $contact_id     = intval($this->ci->input->post('contact_id', true));
        $message_id     = intval($this->ci->input->post('message_id', true));
        $message        = trim($this->ci->input->post('message', true));
        $attaches       = $this->ci->input->post('attaches', true);
        $is_mass_pokes  = intval($this->ci->input->post('is_mass_pokes', true)) ? 1 : 0;
        $message_type   = trim(strip_tags($this->ci->input->post('message_type', true)));

        if ($message_type == \Pg\modules\chatbox\models\ChatboxModel::MESSAGE_TYPE_WINKS
            || $message_type == \Pg\modules\chatbox\models\ChatboxModel::MESSAGE_TYPE_LIKE_ME
        ) {
            return false;
        }

        $handler = fopen(TEMPPATH . 'logs/api/' . $user_id .'-'. $contact_id . '.log', "a+");
        fwrite($handler, "---------------------------------\n");
        fwrite($handler, date('Y-m-d H:i:s') . "\n");
        fwrite($handler, $message . "\n");
        fwrite($handler, $domain_id . "\n");
        fwrite($handler, "\n---------------------------------\n\n");
        fclose($handler);

        $this->ci->load->model('chatbox/models/ChatboxApiUsersModel');
        $sender     = $this->ci->ChatboxApiUsersModel->getUser($domain_id, $user_id);
        $recipient  = $this->ci->ChatboxApiUsersModel->getUser($domain_id, $contact_id);

        if (!empty($sender) && !empty($recipient)) {
            $this->ci->load->model('chatbox/models/ChatboxModel');
            $this->ci->ChatboxModel->simpleAddMessage($sender['id'], $recipient['id'], $message, true, $message_id, $domain_id, $is_mass_pokes, $message_type);

            if (!empty($attaches)) {
                $this->ci->ChatboxModel->updateAttachesByDomainIdAndMessageId($domain_id, $message_id, $attaches);
            }

            if (empty($is_mass_pokes) && $message_type != \Pg\modules\chatbox\models\ChatboxModel::MESSAGE_TYPE_WINKS) {
                $this->ci->load->model('chatbox/models/ChatboxDealerModel');
                return $this->ci->ChatboxDealerModel->callbackSendMessage($sender['id'], $recipient['id'], $domain_id);
            }
        }

        return false;
    }

    public function request($domain_id, $action, $data = [], $files = [])
    {
        $domain = $this->getDomain($domain_id);

        if (empty($domain) || empty($action)) {
            return false;
        }

        $url            = rtrim($domain['domain'], '/') . '/start/api';
        $data['token']  = $domain['token'];
        $data['action'] = $action;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: multipart/form-data']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);
        curl_close($ch);

        if (!empty($response)) {
            $response = (array) @json_decode($response, true);
        }
        if ($_SERVER['REMOTE_ADDR'] == '91.144.163.78') {
            //dump($response);
        }
        // log
        /*$handler = fopen(TEMPPATH . 'logs/api/' . date('Ymd') . '.log', "a+");
        fwrite($handler, "---------------------------------\n");
        fwrite($handler, date('Y-m-d H:i:s') . "\n");
        fwrite($handler, "ChatboxApiModel->request()\n");
        fwrite($handler, $domain['domain'] . "\n");
        fwrite($handler, "---------------------------------\n");
        fwrite($handler, print_r($data, true));
        fwrite($handler, "---------------------------------\n");
        fwrite($handler, print_r($response, true));
        fwrite($handler, "\n---------------------------------\n\n");
        fclose($handler);*/

        return $response;
    }
}
