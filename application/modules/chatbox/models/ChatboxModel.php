<?php

namespace Pg\modules\chatbox\models;

use Pg\libraries\EmojiMap as EmojiMap;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Messaging Center module
 * Messages model
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class ChatboxModel extends \Model
{
    const MODULE_GID      = 'chatbox';
    const TABLE           = DB_PREFIX . 'chatbox';
    const DB_DATE_FORMAT  = 'Y-m-d H:i:s';
    const DB_DEFAULT_DATE = '0000-00-00 00:00:00';

    //const READ_SERVICE = 'read_message_service';
    const SEND_SERVICE = 'send_message_service';

    public $services_buy_gids = [
        //'view' => self::READ_SERVICE,
        'send' => self::SEND_SERVICE
    ];

    const INBOX  = 'i';
    const OUTBOX = 'o';

    const MESSAGE_TYPE_DEFAULT  = 'default';
    const MESSAGE_TYPE_KISSES   = 'kisses';
    const MESSAGE_TYPE_LIKE_ME  = 'like_me';
    const MESSAGE_TYPE_WINKS    = 'winks';

    protected $fields = [
        'id',
        'linked_id',
        'user_id',
        'contact_id',
        'message',
        'dir',
        'is_read',
        'full_load',
        'date_added',
        'date_readed',
        'attaches_count',
        'to_notify',
        'search_field',
        'message_id',
        'domain_id',
        'attaches',
        'is_mass_pokes',
        'message_type',
    ];

    protected $format_settings = [
        'get_attaches'  => true,
        'get_contact'   => false,
        'get_user'      => false,
    ];

    public $emoji_raws                = ['map' => [], 'revert_map' => [], 'names' => [], 'codes' => [], 'regexp' => ['names', 'codes']];
    private $moderation_type          = self::MODULE_GID;
    public $messages_per_page         = 15;
    public $messages_max_count_header = 3;

    public function __construct()
    {
        parent::__construct();
        $this->initEmojiMap();
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

    public function getByUserIdAndMessageId($user_id, $message_id)
    {
        return $this->getObject(['user_id' => $user_id, 'message_id' => $message_id]);
    }

    public function initEmojiMap()
    {
        $em = new EmojiMap();
        foreach ($em->emoji_data as $key => $emoji) {
            $this->emoji_raws['map'][':' . $emoji[3][0] . ':'] = $emoji[0][0];
            $this->emoji_raws['revert_map'][$emoji[0][0]]      = ':' . $emoji[3][0] . ':';
            array_push($this->emoji_raws['names'], ':' . $emoji[3][0] . ':');
            array_push($this->emoji_raws['codes'], $emoji[0][0]);
        }

        $this->emoji_raws['regexp']['names'] = '/(' . implode('|', $this->emoji_raws['names']) . ')/';
        $this->emoji_raws['regexp']['codes'] = '/(' . implode('|', $this->emoji_raws['codes']) . ')/';

        return $this->emoji_raws;
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
                case 'ids':
                    if (empty($filter_data)) {
                        break;
                    }
                    $params = array_merge_recursive($params, ['where_in' => ['id' => $filter_data]]);
                    break;
                case 'max_msg_id':
                    if (empty($filter_data)) {
                        break;
                    }
                    $params = array_merge_recursive($params, ['where' => ['id <' => $filter_data]]);
                    break;
                case 'min_msg_id':
                    if (empty($filter_data)) {
                        break;
                    }
                    $params = array_merge_recursive($params, ['where' => ['id >' => $filter_data]]);
                    break;
                case 'current_month':
                    if (empty($filter_data)) {
                        break;
                    }
                    $curr_month = date('Y-m');
                    $params     = array_merge_recursive($params, ['where' => ['date_added >=' => $curr_month . '-01 00:00:00', 'date_added <=' => $curr_month . '-31 23:59:59']]);
                    break;
                case 'min_date_added':
                    if (empty($filter_data)) {
                        break;
                    }
                    $params = array_merge_recursive($params, ['where' => ['date_added >=' => $filter_data]]);
                    break;
                case 'max_date_added':
                    if (empty($filter_data)) {
                        break;
                    }
                    $params = array_merge_recursive($params, ['where' => ['date_added <=' => $filter_data]]);
                    break;
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
                    $params[$filter_name] = array_merge_recursive($params[$filter_name], $filter_data);
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

    public function formatImToChatbox($data)
    {
        $data['user_id']       = $data['id_user'];
        $data['linked_id']     = $data['id_linked'];
        $data['contact_id']    = $data['id_contact'];
        $data['message']       = $data['text'];
        $data['short_message'] = $data['text'];
        $data['date_added']    = $data['date_add'];
        unset($data['id_user'], $data['id_linked'], $data['id_contact'], $data['text'], $data['date_add']);
        return $data;
    }

    public function formatChatboxToIm($data)
    {
        $data['id_user']    = $data['user_id'];
        $data['id_linked']  = $data['linked_id'];
        $data['id_contact'] = $data['contact_id'];
        $data['text']       = $data['message'];
        $data['date_add']   = $data['date_added'];
        unset($data['user_id'], $data['linked_id'], $data['contact_id'], $data['message'], $data['date_added']);
        return $data;
    }

    public function getListIm($id_user, $contact, $from_id = null)
    {
        $message_filters = [
            'user_id'        => $id_user,
            'contact_id'     => $contact,
            'full_load'      => 1
        ];

        if ($from_id) {
            $message_filters['min_msg_id'] = $from_id;
        }
        $messages_chatbox = $this->getList($message_filters, null, null, ['date_added' => 'DESC']);

        if (!empty($messages_chatbox)) {
            $messages_chatbox = array_reverse($this->formatArray($messages_chatbox));
            foreach ($messages_chatbox as $key => $value) {
                $messages_chatbox[$key] = $this->formatChatboxToIm($messages_chatbox[$key]);
            }

            return $messages_chatbox;
        }

        return false;
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
/*custon_A*/
    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
/*custon_A*/
    public function formatArray($data)
    {
        $return = [];

        if (empty($data) || !is_array($data)) {
            return [];
        }

        $for_users = $for_attaches = [];

        $this->ci->load->model('start/models/StartDomainsModel');
        $domains = [];

        foreach ($data as $key => $item) {
            if (!empty($item['contact_id'])) {
                $for_users[] = $item['contact_id'];
            }

            if (!empty($item['user_id'])) {
                $for_users[] = $item['user_id'];
            }

/* отключил, эможи не обрабатывало */
            if ($item['message_type'] != self::MESSAGE_TYPE_DEFAULT) {
                $item['message'] = preg_replace('#<a.*?>(.*?)</a>#i', '\1', $item['message']);
            }
            $item['message'] = !empty($item['message']) ? nl2br($item['message']) : "";

            // if ($_SERVER['REMOTE_ADDR'] == '91.144.163.78') {
                $item['message'] = mb_convert_encoding($item['message'], 'UTF-8', 'UTF-8');
            // }


/*custon_A*/
            // if ($this->isJson($item['message'])) {
            //     $item['message'] = nl2br(json_decode($item['message']));
            // }else{
            //     $item['message'] = nl2br($item['message']);
            // }
/*custon_A*/
            if (empty($item['message']) && $item['attaches_count']) {
                $item['short_message'] = ($item['attaches_count'] > 1)
                    ? l('text_images', self::MODULE_GID)
                    : l('text_image', self::MODULE_GID);
            } else {
                $message = trim(strip_tags($item['message']));
                if (strlen($message) > 90) {
                    $message = mb_substr($message, 0, 90, 'UTF-8') . '...';
                }
                $item['short_message'] = $message;
            }

            if (!empty($item['domain_id'])) {
                if (empty($domains[$item['domain_id']])) {
                    $domains[$item['domain_id']] = $this->ci->StartDomainsModel->getById($item['domain_id']);
                }

                $item['domain'] = $domains[$item['domain_id']]['domain'];
            }

            if (!empty($item['attaches'])) {
                $item['attaches'] = @unserialize($item['attaches']);

                foreach ($item['attaches'] as $k1 => $v1) {
                    foreach ($v1 as $k2 => $v2) {
                        if (strpos($v2, 'http') !== 0) {
                            $item['attaches'][$k1][$k2] = $item['domain'] . $v2;
                        }
                    }
                }
            }

            $return[$key] = $item;
        }

        if (!empty($for_users) && ($this->format_settings['get_contact'] || $this->format_settings['get_user'])) {
            $this->ci->load->model('chatbox/models/ChatboxApiUsersModel');
            $contacts = $this->ci->ChatboxApiUsersModel->getListByKey(['id' => array_unique($for_users)]);
            foreach ($return as $key => $item) {
                if ($this->format_settings['get_contact']) {
                    $return[$key]['contact'] = !empty($contacts[$item['contact_id']])
                        ? $this->ci->ChatboxApiUsersModel->format($contacts[$item['contact_id']])
                        : $this->ci->ChatboxApiUsersModel->formatDefault($item['contact_id']);
                }
                if ($this->format_settings['get_user']) {
                    $return[$key]['user'] = !empty($contacts[$item['user_id']])
                        ? $this->ci->ChatboxApiUsersModel->format($contacts[$item['user_id']])
                        : $this->ci->ChatboxApiUsersModel->formatDefault($item['user_id']);
                }
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
        $return = ['errors' => [], 'data' => [], 'services_data' => []];

        if (isset($data['id'])) {
            $return['data']['id'] = intval($data['id']);
            if (empty($return['data']['id'])) {
                unset($return['data']['id']);
            }
        }

        if (isset($data['linked_id'])) {
            $return['data']['linked_id'] = intval($data['linked_id']);
        }

        if (isset($data['user_id'])) {
            $return['data']['user_id'] = intval($data['user_id']);
            if (empty($return['data']['user_id'])) {
                $return['errors'][] = l('error_empty_user', self::MODULE_GID);
            }
        }

        if (isset($data['contact_id'])) {
            $return['data']['contact_id'] = intval($data['contact_id']);
            if (empty($return['data']['contact_id'])) {
                $return['errors'][] = l('error_invalid_recipient', self::MODULE_GID);
            }
        }

        if (isset($data['message'])) {
            if (isset($data['is_notify']) && $data['is_notify']) {
                $return['data']['message'] = $data['message'];
            } else {
                $return['data']['message'] = trim(strip_tags($data['message']));
                if (empty($return['data']['message'])) {
                    // $return['errors'][] = l('error_empty_message', self::MODULE_GID);
                } else {
                    $this->ci->load->model('moderation/models/Moderation_badwords_model');
                    $bw_count = $this->ci->Moderation_badwords_model->check_badwords($this->moderation_type, $return['data']['message']);
                    if ($bw_count) {
                        $return['errors'][] = l('error_badwords_message', self::MODULE_GID);
                    }
                }
            }
        }

        if (isset($data['dir'])) {
            $return['data']['dir'] = trim($data['dir']);
            if (empty($return['data']['dir']) || !in_array($return['data']['dir'], [self::INBOX, self::OUTBOX])) {
                $return['data']['dir'] = self::INBOX;
            }
        }

        if (isset($data['is_read'])) {
            $return['data']['is_read'] = $data['is_read'] ? 1 : 0;
        }

        if (isset($data['date_added'])) {
            $value = strtotime($data['date_added']);
            if ($value) {
                $return['data']['date_added'] = date(self::DB_DATE_FORMAT);
            } else {
                $return['data']['date_added'] = self::DB_DEFAULT_DATE;
            }
        }

        if (isset($data['date_readed'])) {
            $value = strtotime($data['date_readed']);
            if ($value) {
                $return['data']['date_readed'] = date(self::DB_DATE_FORMAT);
            } else {
                $return['data']['date_readed'] = self::DB_DEFAULT_DATE;
            }
        }

        if (isset($data['attaches_count'])) {
            $return['data']['attaches_count'] = intval($data['attaches_count']);
        }

        if (isset($data['search_field'])) {
            $return['data']['search_field'] = trim(strip_tags($data['search_field']));
        }

        if (array_key_exists('domain_id', $data)) {
            $return['data']['domain_id'] = intval($data['domain_id']);
        }

        if (array_key_exists('message_type', $data)) {
            $return['data']['message_type'] = trim(strip_tags($data['message_type']));
            if (!in_array($data['message_type'], self::getMessageTypes())) {
                $return['data']['message_type'] = self::MESSAGE_TYPE_DEFAULT;
            }
        }

        return $return;
    }

    public function save($id = null, $save_raw = [])
    {
        if (empty($id)) {
            if (empty($save_raw['date_added'])) {
                $save_raw['date_added'] = date(self::DB_DATE_FORMAT);
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

    public function clearHistory($user_id, $contact_id)
    {
        $this->ci->db->where('user_id', $user_id);
        $this->ci->db->where('contact_id', $contact_id);
        $this->ci->db->delete(self::TABLE);
    }

    public function serviceSetSendMessage($user_id, $message_count)
    {
        $this->ci->load->model('chatbox/models/Chatbox_service_model');

        $chatbox_service = $this->ci->Chatbox_service_model->get_service_by_user_service($user_id, self::SEND_SERVICE);
        if (!empty($chatbox_service['service_data']) && isset($chatbox_service['service_data']['message_count'])) {
            $save_data = ['service_data' => $chatbox_service['service_data']];
            $save_data['service_data']['message_count'] += $message_count;
        } else {
            $save_data                 = ['id_user' => $user_id, 'gid_service' => self::SEND_SERVICE];
            $save_data['service_data'] = ['message_count' => $message_count];
            $chatbox_service['id']     = null;
        }

        $validate_data = $this->ci->Chatbox_service_model->validate_service($chatbox_service['id'], $save_data);
        $this->ci->Chatbox_service_model->save_service($chatbox_service['id'], $validate_data['data']);
    }

    public function setWriteCount($user_id, $message_count)
    {
        if (!$message_count) {
            $this->ci->load->model('chatbox/models/Chatbox_service_model');
            return $this->ci->Chatbox_service_model->removeService($user_id, self::SEND_SERVICE);
        }
        return $this->serviceSetSendMessage($user_id, $message_count);
    }

    public function moduleCategoryAction()
    {
        $action = [
            'name'   => l('chat_now', 'chatbox'),
            'helper' => 'send_message_chatbox',
        ];

        return $action;
    }

    public function addMessage($user_id, $contact_id, $message, $media_ids = [])
    {
        $return = ['errors' => [], 'data' => []];

        // $this->ci->load->model('chatbox/models/Chatbox_contact_list_model');

        $this->ci->load->model('chatbox/models/ChatboxApiUsersModel');
        $user       = $this->ci->ChatboxApiUsersModel->getById($user_id);
        $contact    = $this->ci->ChatboxApiUsersModel->getById($contact_id);
        $domain_id  = $user['domain_id'];

        // output msg
        $data = [
            'user_id'    => $user_id,
            'contact_id' => $contact_id,
            'message'    => $message,
            'dir'        => self::OUTBOX,
            'is_read'    => 1,
            'to_notify'  => 0,
            'domain_id'  => $domain_id,
        ];

        $emoji_count = 0;
/*custon_A*/
        if ($message) {
            $data['message'] = (preg_replace_callback(
                $this->emoji_raws['regexp']['names'],
                function ($matches) {
                    return addslashes($this->emoji_raws['map'][$matches[0]]);
                },
                $message,
                -1,
                $emoji_count
            ));
        }
/*custon_A*/
        $validate = $this->validate(null, $data);

        if ($validate['errors']) {
            $return['errors'] = implode('<br/>', $validate['errors']);
            return $return;
        }
        $data               = $validate['data'];
        $return['o_msg_id'] = $this->save(null, $data);

        // input msg
        if ($return['o_msg_id']) {
            // $this->ci->Chatbox_contact_list_model->updateContact($validate['data']['user_id'], $validate['data']['contact_id']);

            $data['user_id']    = $validate['data']['contact_id'];
            $data['contact_id'] = $validate['data']['user_id'];
            $data['linked_id']  = $return['o_msg_id'];
            $data['dir']        = self::INBOX;
            $data['is_read']    = 0;
            // $data['to_notify']  = 1;
            $return['i_msg_id'] = $this->save(null, $data);
            if ($return['i_msg_id']) {
                $this->save($return['o_msg_id'], ['linked_id' => $return['i_msg_id']]);

                // $contact_data = $this->ci->Chatbox_contact_list_model->getByUserIdAndContactId($contact_id, $user_id);
                // if (!empty($contact_data['count_new'])) {
                //     $count_new = $contact_data['count_new'] + 1;
                // } else {
                //     $count_new = 1;
                // }
                // $this->ci->Chatbox_contact_list_model->updateContact($validate['data']['contact_id'], $validate['data']['user_id'], $count_new);
            }

            $this->ci->load->model('chatbox/models/ChatboxApiModel');
            $result = $this->ci->ChatboxApiModel->request(
                $domain_id,
                \Pg\modules\chatbox\models\ChatboxApiModel::ACTION_MESSAGE_SENT,
                [
                    'user_id'       => $user['user_id'],
                    'contact_id'    => $contact['user_id'],
                    'message'       => $message,
                    'media_ids'     => $media_ids,
                ]
            );
            if (!empty($result['status']) && !empty($result['data']['message_id'])) {
                $this->ci->db
                    ->set('message_id', $result['data']['message_id'])
                    ->where_in('id', [$return['o_msg_id'], $return['i_msg_id']])
                    ->update(self::TABLE);

                $return['message_id'] = $result['data']['message_id'];

                if (!empty($result['data']['attaches'])) {
                    $this->updateAttachesByDomainIdAndMessageId($domain_id, $result['data']['message_id'], $result['data']['attaches']);
                }

                if (!empty($media_ids)) {
                    $this->ci->load->model('chatbox/models/ChatboxMediaControlModel');
                    $operator_id = 0;
                    if ($this->ci->session->userdata('auth_type') == 'operator') {
                        $operator_id = intval($this->ci->session->userdata('user_id'));
                    }
                    foreach ($media_ids as $m_id) {
                        $this->ci->ChatboxMediaControlModel->addMedia($domain_id, $user_id, $contact_id, $operator_id, $m_id, $return['o_msg_id']);
                    }
                }
            }
        }

        return $return;
    }

    public function simpleAddMessage($user_id, $contact_id, $message, $add_outbox = true, $message_id = 0, $domain_id = 0, $is_mass_pokes = 0, $message_type = self::MESSAGE_TYPE_DEFAULT)
    {
        // $this->ci->load->model('chatbox/models/Chatbox_contact_list_model');

        if (!in_array($message_type, self::getMessageTypes())) {
            $message_type = self::MESSAGE_TYPE_DEFAULT;
        }

        // inbox msg
        $message_data = [
            'user_id'        => $contact_id,
            'contact_id'     => $user_id,
            'dir'            => self::INBOX,
            'message'        => $message,
            'attaches_count' => 0,
            'linked_id'      => 0,
            'is_read'        => 0,
            'message_id'     => $message_id,
            'domain_id'      => $domain_id,
            'is_mass_pokes'  => $is_mass_pokes,
            'message_type'   => $message_type,
        ];
        $input_msg_id = $this->save(null, $message_data);
        if ($input_msg_id) {
            // $contact_data = $this->ci->Chatbox_contact_list_model->getByUserIdAndContactId($contact_id, $user_id);
            // if (!empty($contact_data)) {
            //     $count_new = $contact_data['count_new'] + 1;
            // } else {
            //     $count_new = 1;
            // }
            // $this->ci->Chatbox_contact_list_model->updateContact($contact_id, $user_id, $count_new);

            // outbox msg
            if ($add_outbox) {
                $message_data = [
                    'user_id'        => $user_id,
                    'contact_id'     => $contact_id,
                    'dir'            => self::OUTBOX,
                    'message'        => $message,
                    'attaches_count' => 0,
                    'linked_id'      => $input_msg_id,
                    'is_read'        => 1,
                    'message_id'     => $message_id,
                    'domain_id'      => $domain_id,
                    'is_mass_pokes'  => $is_mass_pokes,
                    'message_type'   => $message_type,
                ];
                $output_msg_id = $this->save(null, $message_data);
                // $this->ci->Chatbox_contact_list_model->updateContact($message_data['user_id'], $message_data['contact_id']);

                $this->save($input_msg_id, ['linked_id' => $output_msg_id]);
            }
        }

        return true;
    }

    public function checkIsRead($user_id, $contact_id)
    {
        $user_id    = intval($user_id);
        $contact_id = intval($contact_id);
        $this->ci->db->set('is_read', '1')->set('date_readed', date(self::DB_DATE_FORMAT))->where('user_id', $user_id)->where('contact_id', $contact_id)->update(self::TABLE);

        // $this->ci->load->model('chatbox/models/Chatbox_contact_list_model');
        // $contact_data = $this->ci->Chatbox_contact_list_model->getByUserIdAndContactId($user_id, $contact_id);
        // if (!empty($contact_data) && $contact_data['count_new']) {
        //     $this->ci->Chatbox_contact_list_model->checkIsRead($user_id, $contact_id);
        // }
        return true;
    }

    public function getLastMessage($user_id, $contact_id)
    {
        $fields = $this->fields;
        $fields = implode(', ', $fields);

        $result = $this->ci->db->select($fields)
            ->from(self::TABLE)
            ->where('user_id', $user_id)
            ->where('contact_id', $contact_id)
            ->order_by('date_added DESC')
            ->get()
            ->result_array();

        if (!empty($result) && is_array($result)) {
            return $result[0];
        }

        return false;
    }

    public function getFirstMessage($user_id, $contact_id)
    {
        $fields = $this->fields;
        $fields = implode(', ', $fields);

        $result = $this->ci->db->select($fields)
            ->from(self::TABLE)
            ->where('user_id', $user_id)
            ->where('contact_id', $contact_id)
            ->order_by('date_added ASC')
            ->get()
            ->result_array();

        if (!empty($result) && is_array($result)) {
            return $result[0];
        }

        return false;
    }

    public function getRequestNotifications()
    {
        $result = ['notifications' => []];

        $user_id = $this->ci->session->userdata('user_id');
        $filters = [
            'user_id'   => $user_id,
            'is_read'   => 0,
            'dir'       => self::INBOX,
            'to_notify' => 1,
        ];
        $messages = $this->getList($filters);
        $this->setFormatSettings('get_contact', true);
        $messages = $this->formatArray($messages);
        $this->setFormatSettings('get_contact', false);

        foreach ($messages as $message) {
            $text      = str_replace('[sender]', $message['contact']['output_name'], l('notify_text', self::MODULE_GID));
            $user_icon = $message['contact']['media']['user_logo']['thumbs']['small'];

            if ($message['user_id'] == $message['contact_id']) {
                $text = l('site_notification', self::MODULE_GID) . ' [more]';
                // $theme_data =  $this->ci->view->getThemeSettings();
                $user_icon = site_url() . $this->ci->view->getThemeSettings()['mini_logo']['path'];
            }

            $link                      = site_url() . 'chatbox/chat/' . $message['contact_id'];
            $result['notifications'][] = [
                'title'     => l('notify_title', self::MODULE_GID),
                'text'      => $text,
                'id'        => $message['id'],
                'comment'   => '',
                'user_id'   => $message['user_id'],
                'user_name' => $message['contact']['output_name'],
                'user_icon' => $user_icon,
                'user_link' => $link,
                'more'      => '<a href="' . $link . '">' . l('link_message_show', self::MODULE_GID) . '</a>',
            ];
        }
        $this->ci->db->set('to_notify', '0')->where($filters)->update(self::TABLE);

        //messages block in header alerts
        $filters = [
            'user_id'   => $user_id,
            'is_read'   => 0,
            'dir'       => self::INBOX,
        ];
        $messages = $this->getList($filters, 1, $this->messages_max_count_header, ['date_added' => 'DESC']);
        $this->setFormatSettings('get_contact', true);
        $messages = $this->formatArray($messages);
        $this->setFormatSettings('get_contact', false);
        $this->ci->view->assign('messages', $messages);
        $result['new_message_alert_html'] = $this->ci->view->fetch('new_messages_header', 'user', self::MODULE_GID);
        $result['max_messages_count']     = $this->messages_max_count_header;

        return $result;
    }

    public function getSeoSettings($method = '', $lang_id = '')
    {
        if (!empty($method)) {
            return $this->getSeoSettingsInternal($method, $lang_id);
        } else {
            $actions = ['index', 'chat'];
            $return  = [];
            foreach ($actions as $action) {
                $return[$action] = $this->getSeoSettingsInternal($action, $lang_id);
            }

            return $return;
        }
    }

    private function getSeoSettingsInternal($method, $lang_id = '')
    {
        switch ($method) {
            case 'index':
                return [
                    'templates' => [],
                    'url_vars'  => [],
                ];
                break;
            case 'chat':
                return [
                    'templates' => [],
                    'url_vars'  => [
                        'id' => ['id' => 'literal'],
                    ],
                ];
                break;
        }
    }

    public function requestSeoRewrite($var_name_from, $var_name_to, $value)
    {
        if ($var_name_from == $var_name_to) {
            return $value;
        }

        return $value;
    }

    public function getSitemapXmlUrls()
    {
        $this->ci->load->helper('seo');
        $return = [];

        return $return;
    }

    public function getSitemapUrls()
    {
        return [];
    }

    public function bannerAvailablePages()
    {
        $return[] = ['link' => 'chatbox/index', 'name' => l('header_chatbox', self::MODULE_GID)];
        $return[] = ['link' => 'chatbox/chat', 'name' => l('chat_now', self::MODULE_GID)];
        return $return;
    }

    public function updateAttachesByDomainIdAndMessageId($domain_id, $message_id, $attaches = [])
    {
        if (empty($attaches)) {
            return false;
        }

        $attaches       = (array) $attaches;
        $attaches_count = count($attaches);

        $this->ci->load->model('start/models/StartDomainsModel');
        $domain     = $this->ci->StartDomainsModel->getById($domain_id);
        $f_attaches = [];
        foreach ($attaches as $k1 => $v1) {
            foreach ($v1 as $k2 => $v2) {
                $f_attaches[$k1][$k2] = str_replace($domain['domain'], '', $v2);
            }
        }
        $attaches       = serialize($f_attaches);

        $this->ci->db
            ->where('domain_id', $domain_id)
            ->where('message_id', $message_id)
            ->set('full_load', 1)
            ->set('attaches_count', $attaches_count)
            ->set('attaches', $attaches)
            ->update(self::TABLE);

        return $this->ci->db->affected_rows();
    }

    public static function getMessageTypes()
    {
        return [
            self::MESSAGE_TYPE_DEFAULT,
            self::MESSAGE_TYPE_KISSES,
            self::MESSAGE_TYPE_LIKE_ME,
            self::MESSAGE_TYPE_WINKS,
        ];
    }
}
