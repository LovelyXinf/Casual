<?php

namespace Pg\modules\shoutbox\models;

use Pg\libraries\EventDispatcher;
use Pg\modules\shoutbox\models\events\EventShoutbox;

if (!defined('TABLE_SHOUTBOX')) {
    define('TABLE_SHOUTBOX', DB_PREFIX . 'shoutbox');
}

/**
 * Shoutbox main model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Dmitry Popenov
 *
 * @version $Revision: 2 $ $Date: 2013-01-30 10:07:07 +0400 $
 */
class ShoutboxModel extends \Model
{

    const MESSAGE_BONUS_ACTION =  'shoutbox_add_message_bonus_action';

    private $fields_shoutbox = [
        'id',
        'id_user',
        'message',
        'date_created'
    ];
    private $shoutbox_attrs = [
        'id',
        'message',
        'date_created'
    ];
    private $fields_shoutbox_str;

    private $moderation_type = "shoutbox";

    private $items_on_block_page = 50;

    /**
     * Controller
     */
    public function __construct()
    {
        parent::__construct();

        $this->fields_shoutbox_str = implode(', ', $this->fields_shoutbox);
    }

    /**
     * Load message by ID
     *
     * @param integer $id
     *
     * @return array
     */
    public function getMessageById($id)
    {
        return $this->getMessages(null, null, null, [
            'where' => ['id' => $id]
        ]);
    }

    /**
     * Load messages
     *
     * @param integer $page
     * @param integer $items_on_page
     * @param array $order_by
     * @param array $params
     * @param array $filter_object_ids
     *
     * @return array
     */
    public function getMessages($page = null, $items_on_page = null, $order_by = null, $params = array(), $filter_object_ids = null, $format = true)
    {
        $this->ci->db->select(implode(", ", $this->fields_shoutbox) . ", IF(NOW()>DATE_ADD(date_created, INTERVAL '12' HOUR), DATE_FORMAT(date_created, '%Y-%m-%d'), DATE_FORMAT(date_created, '%H:%i')) as date_str");
        $this->ci->db->from(TABLE_SHOUTBOX);
        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        if (isset($params["where_not_in"]) && is_array($params["where_not_in"]) && count($params["where_not_in"])) {
            foreach ($params["where_not_in"] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }
        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }
        if (isset($filter_object_ids) && is_array($filter_object_ids) && count($filter_object_ids)) {
            $this->ci->db->where_in("id", $filter_object_ids);
        }
        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                if (in_array($field, $this->shoutbox_attrs)) {
                    $this->ci->db->order_by($field . " " . $dir);
                }
            }
        } elseif ($order_by) {
            $this->ci->db->order_by($order_by);
        }
        if (!is_null($page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        }
        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            $results = ($format !== false) ? $this->formatMessages($results) : $results;

            return $results;
        }

        return [];
    }

    /**
     * Formating messages
     *
     * @param array $messages
     *
     * @return array
     */
    public function formatMessages($messages)
    {
        $this->ci->load->model('Users_model');
        $user_ids = array();
        $users = array();
        foreach ($messages as $key => $message) {
            $user_ids[$message['id_user']] = $message['id_user'];
        }
        $this->ci->load->model('Users_model');
        $messages_users = $this->ci->Users_model->getUsersList(null, null, null, null, $user_ids);
        if (is_array($messages_users)) {
            foreach ($messages_users as $messages_user) {
                $users[$messages_user['id']] = $messages_user;
            }
        }

        foreach ($messages as $key =>&$e) {
            if ($users[$e['id_user']]['approved']) {
            $user_info = !empty($users[$e['id_user']]) ? $users[$e['id_user']] : $this->ci->Users_model->formatDefaultUser($e['id_user']);
            $e['user_info'] = [
                'nickname' => $user_info['output_name'],
                'link' => $user_info['link'],
                'media' => $user_info['media'],
                'output_name' => $user_info['output_name'],
            ];
            }
        }

        return $messages;
    }

    public function getMessagesCnt()
    {
        $count = intval($this->ci->db->from(TABLE_SHOUTBOX)->count_all_results());

        return $count;
    }

    public function getMessagesMinId()
    {
        $this->ci->db->where($where)->from(TABLE_SHOUTBOX)->select_min('id');
        $min_id = intval($this->ci->db->get()->row()->id);

        return $min_id;
    }

    public function validateMessage($data)
    {
        $return = array('errors' => array(), 'data' => array());
        
        $return["data"]["message"] = trim(strip_tags($data['message']));
        
        if (empty($return["data"]["message"])) {
            $return["errors"][] = l('error_message_text', 'shoutbox');
        }
        if (!empty($data['id_user'])) {
            $return['data']['id_user'] = (int)$data['id_user'];
        } else {
            $return['errors'][] = l('error_empty_user', 'shoutbox');
        }
        
        $return["data"]["message"] = mb_substr($return["data"]["message"], 0, $this->ci->pg_module->get_module_config('shoutbox', 'message_max_chars'), 'UTF-8');
        $this->ci->load->model('moderation/models/Moderation_badwords_model');
        $bw_count = $this->ci->Moderation_badwords_model->check_badwords($this->moderation_type, $return["data"]["message"]);
        if ($bw_count) {
            $return["errors"][] = l('error_badwords_message', 'shoutbox');
        }

        return $return;
    }

    /**
     * Save message data to datasource
     *
     * @param integer $message_id message identifier
     * @param array   $data       message data
     *
     * @return integer
     */
    public function saveMessage($message_id, $data)
    {
        $this->sendEventAddMessage($data['id_user']);
        if (is_null($message_id)) {
            if (!isset($data['date_created'])) {
                $data['date_created'] = date('Y-m-d H:i:s');
            }
            $this->ci->db->insert(TABLE_SHOUTBOX, $data);
            $message_id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $message_id);
            $this->ci->db->update(TABLE_SHOUTBOX, $data);
        }

        return $message_id;
    }

    public function deleteMessageById($id)
    {
        $is_deleted = 0;
        $this->ci->db->where('id', $id)->delete(TABLE_SHOUTBOX);
        $is_deleted = $this->ci->db->affected_rows();

        return $is_deleted;
    }

    /**
     * Clear old message
     */
    public function shoutboxClearCron()
    {
        $message_max_counts = intval($this->ci->pg_module->get_module_config('shoutbox', 'message_max_counts'));
        $messages_cnt = $this->get_messages_cnt();
        if ($messages_cnt < $message_max_counts) {
            return;
        }
        $messages = $this->get_messages(1, ($messages_cnt - $message_max_counts), array('id' => 'ASC'));
        if (empty($messages)) {
            return;
        }
        $ids = array();
        foreach ($messages as $message) {
            $ids[] = $message['id'];
        }
        $this->ci->db->where_in('id', $ids);
        $this->ci->db->delete(TABLE_SHOUTBOX);

        return;
    }

    public function shoutboxStatus()
    {
        return [
            'id_user' => $this->ci->session->userdata('auth_type') == 'user' ? $this->ci->session->userdata('user_id') : 0,
            'shoutbox_on' => $this->ci->pg_module->get_module_config('shoutbox', 'status')
        ];
    }

    public function getNewMessages()
    {
        $from_id = intval($this->ci->input->get_post('max_id', true));
        $to_id = intval($this->ci->input->get_post('min_id', true));
        $page = null;
        $items_on_page = null;
        $params = array();
        if ($from_id) {
            $params['where']['id >'] = intval($from_id);
            $order_by['id'] = 'ASC';
            $result = $this->get_messages($page, $items_on_page, $order_by, $params);
        } else {
            if ($to_id) {
                $params['where']['id <'] = intval($to_id);
            }
            $page = 1;
            $items_on_page = $this->items_on_block_page;
            $order_by['id'] = 'DESC';
            $result = $this->getMessages($page, $items_on_page, $order_by, $params);
            $result = array_reverse($result);
        }

        return $result;
    }

    public function getOldMessages()
    {
        $to_id = intval($this->ci->input->get_post('min_id', true));
        if ($to_id) {
            $params['where']['id <'] = intval($to_id);
        }
        $page = 1;
        $items_on_page = $this->items_on_block_page;
        $order_by['id'] = 'DESC';
        $result = $this->getMessages($page, $items_on_page, $order_by, $params);

        return $result;
    }

    public function checkNewMessages($from_id = 0)
    {
        $params = [];

        if ($from_id) {
            $params['where']['id >'] = intval($from_id);
        }
        $order_by['id'] = 'ASC';
        $result['messages'] = $this->getMessages(null, null, $order_by, $params);
        $result['count_new'] = 0;
        $result['min_id'] = 0;
        $result['max_id'] = 0;

        foreach ($result['messages'] as $message) {
            if (intval($message['id']) > $result['max_id']) {
                $result['max_id'] = intval($message['id']);
            }
            if (intval($message['id']) < $result['min_id'] || !$result['min_id']) {
                $result['min_id'] = intval($message['id']);
            }
            ++$result['count_new'];
        }

        return $result;
    }

    public function backendCheckNewMessages($params = array())
    {
        $from_id = $params['max_id'];
        $result = $this->checkNewMessages($from_id);

        return $result;
    }

    public function addMessage($text)
    {
        $return = array('errors' => array(), 'data' => array());

        $data['message'] = $text;
        $data['id_user'] = $this->ci->session->userdata('user_id');
        $validate = $this->validate_message($data);
        if ($validate['errors']) {
            $return['errors'] = $validate['errors'];

            return $return;
        }
        $data = $validate['data'];
        $this->save_message(null, $data);

        return $return;
    }

    public function callbackUserDelete($id_user)
    {
        $this->delete_messages_by_user_id($id_user);
    }

    private function deleteMessagesByUserId($id_user)
    {
        $is_deleted = 0;
        $this->ci->db->where('id_user', $id_user)->delete(TABLE_SHOUTBOX);
        $is_deleted = $this->ci->db->affected_rows();

        return $is_deleted;
    }

    public function validateSettings($data)
    {
        $return = array('errors' => array(), 'data' => array());

        if (isset($data['status'])) {
            $return['data']['status'] = $data['status'] ? 1 : 0;
        } else {
            $return['data']['status'] = 0;
        }

        if (isset($data['message_max_chars'])) {
            $return['data']['message_max_chars'] = intval($data['message_max_chars']);
            if ($return['data']['message_max_chars'] <= 0) {
                $return['errors'][] = l('error_numerics_empty', 'start', '', 'text', array('field' => l("shoutbox_message_max_chars_field", "shoutbox")));
            }
        }

        if (isset($data['message_max_counts'])) {
            $return['data']['message_max_counts'] = intval($data['message_max_counts']);
            if ($return['data']['message_max_counts'] <= 0) {
                $return['errors'][] = l('error_numerics_empty', 'start', '', 'text', array('field' => l("shoutbox_message_max_counts_field", "shoutbox")));
            }
        }

        return $return;
    }

    public function sendEventAddMessage($id = null)
    {
        if ($id) {
            $event_handler = EventDispatcher::getInstance();
            $event = new EventShoutbox();
            $event_data = [];
            $event_data['id'] = $id;
            $event_data['action'] = 'shoutbox_add_message';
            $event_data['module'] = 'shoutbox';
            $event->setData($event_data);
            $event_handler->dispatch('shoutbox_add_message', $event);
        }
    }

    public function bonusCounterCallback($counter = [])
    {
        $event_handler = EventDispatcher::getInstance();
        $event = new EventShoutbox();
        $event->setData($counter);
        $event_handler->dispatch('bonus_counter', $event);
    }

    public function bonusActionCallback($data = [])
    {
        $counter = [];
        if (!empty($data)) {
            $counter = $data['counter'];
            $action = $data['action'];
            $counter['count'] = $counter['count'] + 1;
            $counter['is_new_counter'] = $data['is_new_counter'];
            $counter['repetition'] = $data['bonus']['repetition'];
            $this->bonusCounterCallback($counter);
        }
    }

    public function __call($name, $args)
    {
        $methods = [
            'add_message' => 'addMessage',
            'backend_check_new_messages' => 'backendCheckNewMessages',
            'callback_user_delete' => 'callbackUserDelete',
            'check_new_messages' => 'checkNewMessages',
            'delete_message_by_id' => 'deleteMessageById',
            'delete_messages_by_user_id' => 'deleteMessagesByUserId',
            'format_messages' => 'formatMessages',
            'get_message_by_id' => 'getMessageById',
            'get_messages' => 'getMessages',
            'get_messages_cnt' => 'getMessagesCnt',
            'get_messages_min_id' => 'getMessagesMinId',
            'get_new_messages' => 'getNewMessages',
            'get_old_messages' => 'getOldMessages',
            'save_message' => 'saveMessage',
            'shoutbox_clear_cron' => 'shoutboxClearCron',
            'shoutbox_status' => 'shoutboxStatus',
            'validate_message' => 'validateMessage',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
