<?php

namespace Pg\modules\chatbox\models;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Messaging Center module
 * Chats dealer model
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class ChatboxDealerModel extends \Model
{
    const MODULE_GID         = 'chatbox';
    const TABLE              = DB_PREFIX . 'chatbox_dealer';
    const DB_DATE_FORMAT     = 'Y-m-d H:i:s';
    const DB_DEFAULT_DATE    = '0000-00-00 00:00:00';

    protected $fields = [
        'operator_id',
        'user_id',
        'contact_id',
        'replied',
        'replied_operator_id',
        'is_current',
        'domain_id',
        'date_added',
        'date_updated',
        'date_sorted',
        'date_opened',
    ];

    protected $format_settings = [
        'get_operator',
        'get_user',
    ];

    public function __construct()
    {
        parent::__construct();
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

    public function getByUserIdContactId($user_id, $contact_id)
    {
        return $this->getObject(['user_id' => $user_id, 'contact_id' => $contact_id]);
    }

    public function getCriteriaInternal($filters)
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
        $table  = self::TABLE;
        $fields = $this->fields;

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

    // public function getListByKey($filters = [], $page = null, $items_on_page = null, $order_by = null)
    // {
    //     $return = [];

    //     $params = $this->getCriteriaInternal($filters);
    //     $list   = $this->getListInternal($page, $items_on_page, $order_by, $params);
    //     foreach ($list as $key => $item) {
    //         $return[$item['id']] = $item;
    //     }

    //     return $return;
    // }

    public function getListByField($field, $filters = [], $page = null, $items_on_page = null, $order_by = null)
    {
        $return = [];

        $params = $this->getCriteriaInternal($filters);
        $list   = $this->getListInternal($page, $items_on_page, $order_by, $params);
        foreach ($list as $item) {
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

        $for_operators = [];
        $for_users     = [];

        foreach ($data as $key => $item) {
            if (!empty($item['operator_id'])) {
                $for_operators[] = $item['operator_id'];
            }

            if (!empty($item['user_id'])) {
                $for_users[] = $item['user_id'];
            }

            if (!empty($item['contact_id'])) {
                $for_users[] = $item['contact_id'];
            }

            $return[$key] = $item;
        }

        if ($this->format_settings['get_operator'] && !empty($for_operators)) {
            $this->ci->load->model('Operators_model');
            $operators = $this->ci->Operators_model->getListByKey(['id' => array_unique($for_operators)]);
            $operators = $this->ci->Operators_model->formatArray($operators);
            foreach ($return as $key => $item) {
                $return[$key]['operator'] = (!empty($operators[$item['operator_id']])) ? $operators[$item['operator_id']] : [];
            }
        }

        if (!empty($for_users) && $this->format_settings['get_user']) {
            $this->ci->load->model('chatbox/models/ChatboxApiUsersModel');
            $contacts = $this->ci->ChatboxApiUsersModel->getListByKey(['id' => array_unique($for_users)]);
            foreach ($return as $key => $item) {
                $return[$key]['contact'] = !empty($contacts[$item['contact_id']])
                    ? $this->ci->ChatboxApiUsersModel->format($contacts[$item['contact_id']])
                    : $this->ci->ChatboxApiUsersModel->formatDefault($item['contact_id']);

                $return[$key]['user'] = !empty($contacts[$item['user_id']])
                    ? $this->ci->ChatboxApiUsersModel->format($contacts[$item['user_id']])
                    : $this->ci->ChatboxApiUsersModel->formatDefault($item['user_id']);
            }
        }

        return $return;
    }

    public function formatDefault()
    {
        $data = [];
        return $data;
    }

    public function validate($data = [])
    {
        $return = ['errors' => [], 'data' => []];

        if (array_key_exists('operator_id', $data)) {
            $return['data']['operator_id'] = intval($data['operator_id']);
        }

        if (array_key_exists('user_id', $data)) {
            $return['data']['user_id'] = intval($data['user_id']);
        }

        if (array_key_exists('contact_id', $data)) {
            $return['data']['contact_id'] = intval($data['contact_id']);
        }

        if (array_key_exists('replied', $data)) {
            $return['data']['replied'] = intval($data['replied']) ? 1 : 0;
        }

        if (array_key_exists('replied_operator_id', $data)) {
            $return['data']['replied_operator_id'] = intval($data['replied_operator_id']);
        }

        if (array_key_exists('is_current', $data)) {
            $return['data']['is_current'] = intval($data['is_current']) ? 1 : 0;
        }

        if (array_key_exists('domain_id', $data)) {
            $return['data']['domain_id'] = intval($data['domain_id']);
        }

        return $return;
    }

    public function save($user_id, $contact_id, $save_raw = [])
    {
        $params_ins                  = $save_raw;
        $params_ins['user_id']       = $user_id;
        $params_ins['contact_id']    = $contact_id;
        $params_ins['date_updated']  = date(self::DB_DATE_FORMAT);

        $params_upd = [];
        foreach ($params_ins as $field => $val) {
            if (!in_array($field, ['user_id', 'contact_id'])) {
                $params_upd[] = "`{$field}` = " . $this->ci->db->escape($val);
            }
        }
        $update_str = implode(', ', $params_upd);

        $sql = $this->ci->db->insert_string(self::TABLE, $params_ins) . " ON DUPLICATE KEY UPDATE {$update_str}";
        $this->ci->db->query($sql);

        return $this->ci->db->affected_rows();
    }

    // public function delete($id)
    // {
    //     if (is_array($id)) {
    //         foreach ($id as $i) {
    //             $this->delete($i);
    //         }
    //     } else {
    //         $this->ci->db->where('id', $id);
    //         $this->ci->db->delete(self::TABLE);
    //     }
    // }

    public function callbackSendMessage($user_id, $contact_id, $domain_id = 0)
    {
        $this->ci->load->model('chatbox/models/ChatboxApiUsersModel');
        $sender         = $this->ci->ChatboxApiUsersModel->getById($user_id);
        $recipient      = $this->ci->ChatboxApiUsersModel->getById($contact_id);
        $chat           = $this->getByUserIdContactId($user_id, $contact_id);

        if ($sender['is_fake'] && $this->ci->session->userdata('auth_type') != 'operator') {
            if (!empty($chat) && $chat['replied'] != 1) {
                $this->save($user_id, $contact_id, [
                    'replied' => 1,
                ]);
            }
        }

        if ($recipient['is_fake']) {
            $save_raw = [
                'replied'       => 0,
                'date_sorted'   => date(self::DB_DATE_FORMAT),
                'domain_id'     => $domain_id,
            ];

            if (empty($chat) || $chat['replied']) {
                $save_raw['date_added'] = date(self::DB_DATE_FORMAT);
            }

            $this->save($contact_id, $user_id, $save_raw);
        }

        $this->scatterChats('new_message', $domain_id);
    }

    public function callbackNewIncomingMessage($user_id, $contact_id, $domain_id = 0)
    {
        $save_raw = [
            'replied' => 0,
        ];
        $this->save($user_id, $contact_id, $save_raw);

        $this->scatterChats('new_message', $domain_id);
    }

    public function callbackDeleteUser($user_id)
    {
        $this->ci->db->where('user_id', $user_id);
        $this->ci->db->delete(self::TABLE);

        $this->ci->db->where('contact_id', $user_id);
        $this->ci->db->delete(self::TABLE);
    }

    public function callbackUpdateUserOnlineStatus($user_id)
    {
        $this->ci->db
            ->where('contact_id', $user_id)
            ->set('date_sorted', date(self::DB_DATE_FORMAT))
            ->update(self::TABLE);

        return $this->ci->db->affected_rows();
    }

    public function getLessBusyOperatorId($operators = [], $domain_id = false)
    {
        $operator_id = 0;

        if (empty($operators)) {
            $this->ci->load->model('Operators_model');
            $filters = [
                'is_active' => 1,
                'is_online' => 1,
            ];
            if (!empty($domain_id)) {
                $filters['domain_id'] = $domain_id;
            }
            $operators = $this->ci->Operators_model->getListByKey($filters, null, null, ['date_last_activity' => 'DESC']);
        }

        if ($operators) {
            $min_chats = 0;
            $filters = [
                'replied'   => 0,
            ];
            if (!empty($domain_id)) {
                $filters['domain_id'] = $domain_id;
            }
            foreach ($operators as $operator) {
                $filters['operator_id'] = $operator['id'];
                $chats = $this->getCount($filters);
                if (!$operator_id || $chats < $min_chats) {
                    $operator_id = $operator['id'];
                    $min_chats   = $chats;
                }
            }
        }

        return $operator_id;
    }

    public function scatterChats($event_type = '', $domain_id = false)
    {
        if (empty($domain_id)) {
            return;
        }

        if (!is_array($domain_id)) {
            $domain_id = [$domain_id];
        }

        $this->ci->load->model('Operators_model');
        $operators = $this->ci->Operators_model->getListByKey([
            'is_active' => 1,
            'is_online' => 1,
            'domain_id' => $domain_id,
        ], null, null, ['date_last_activity' => 'DESC']);

        if (empty($operators)) {
            return false;
        }

        switch ($event_type) {
            case 'new_message':
            case 'logout':
                $new_chats = $this->getList([
                    'operator_id'   => 0,
                    'replied'       => 0,
                    'domain_id'     => $domain_id,
                ]);

                if (empty($new_chats)) {
                    return;
                }

                foreach ($new_chats as $key => $chat) {
                    if (!empty($chat['replied_operator_id']) && array_key_exists($chat['replied_operator_id'], $operators)) {
                        $this->save($chat['user_id'], $chat['contact_id'], [
                            'operator_id' => $chat['replied_operator_id']
                        ]);

                        unset($new_chats[$key]);
                    }
                }

                if (!empty($new_chats)) {
                    foreach ($new_chats as $key => $chat) {
                        $operator_id = $this->getLessBusyOperatorId($operators);
                        if ($operator_id) {
                            $this->save($chat['user_id'], $chat['contact_id'], [
                                'operator_id' => $operator_id
                            ]);
                        }
                    }
                }

                break;
            case 'login':
                $new_chats = $this->getList([
                    'operator_id'   => 0,
                    'replied'       => 0,
                    'domain_id'     => $domain_id,
                ]);
                if (!empty($new_chats)) {
                    $this->scatterChats('new_message', $domain_id);
                }

                $order_str = "
                    CASE
                        WHEN replied_operator_id = operator_id THEN 1
                        WHEN replied_operator_id != operator_id THEN 0
                    END DESC
                ";
                $not_replied_chats = $this->getList([
                    'replied'   => 0,
                    'domain_id' => $domain_id,
                ], null, null, ['is_current' => 'DESC', 'order_str' => $order_str]);
                if (empty($not_replied_chats)) {
                    return;
                }

                $operator_chats = [];
                foreach ($not_replied_chats as $key => $chat) {
                    $operator_chats[$chat['operator_id']][] = $chat;
                }

                $total_chats        = count($not_replied_chats);
                $chats_per_operator = ceil($total_chats / count($operators));
                $chats_to_scatter   = [];
                foreach ($operator_chats as $o_id => $o_chats) {
                    if (count($o_chats) > $chats_per_operator) {
                        $chats_to_scatter = array_merge($chats_to_scatter, array_slice($o_chats, $chats_per_operator));
                    }
                }

                if (!empty($chats_to_scatter)) {
                    foreach ($chats_to_scatter as $chat) {
                        if (!empty($chat['replied_operator_id'])
                            && array_key_exists($chat['replied_operator_id'], $operators)
                            && count($operator_chats[$chat['replied_operator_id']]) < $chats_per_operator
                        ) {
                            $this->save($chat['user_id'], $chat['contact_id'], [
                                'operator_id' => $chat['replied_operator_id']
                            ]);
                            $operator_chats[$chat['replied_operator_id']][] = $chat;
                        } else {
                            $operator_id = $this->getLessBusyOperatorId($operators);
                            if ($operator_id) {
                                $this->save($chat['user_id'], $chat['contact_id'], [
                                    'operator_id' => $operator_id
                                ]);
                            }
                        }
                    }
                }

                break;
        }
    }

    public function callbackOperatorOnlineStatus($operator_id, $status = 1)
    {
        $this->ci->load->model('operators/models/OperatorsModel');
        $operator = $this->ci->OperatorsModel->getById($operator_id);
        $operator = $this->ci->OperatorsModel->format($operator);

        if ($status) {
            $this->scatterChats('login', $operator['domain_id']);
        } else {
            // удаляем чаты на которые оператор уже ответил
            // $this->ci->db->where('operator_id', $operator_id);
            // $this->ci->db->where('replied', 1);
            // $this->ci->db->delete(self::TABLE);

            // убираем все чаты с этого оператора
            $this->ci->db->where('operator_id', $operator_id);
            $this->ci->db->update(self::TABLE, [
                'operator_id'   => 0,
                'is_current'    => 0,
                'date_updated'  => date(self::DB_DATE_FORMAT),
            ]);

            $this->scatterChats('logout', $operator['domain_id']);
        }
    }

    public function updateCurrentChat($operator_id, $user_id = 0, $contact_id = 0)
    {
        $this->ci->db
            ->set('is_current', 0)
            ->where('operator_id', $operator_id)
            ->where('user_id !=', $user_id)
            ->where('contact_id !=', $contact_id)
            ->update(self::TABLE);

        if (!empty($user_id) && !empty($contact_id)) {
            $current_chat = $this->getCurrentChatForOperator($operator_id);

            if (empty($current_chat)) {
                $this->ci->db
                    ->set('is_current', 1)
                    ->set('date_opened', date(self::DB_DATE_FORMAT))
                    ->where('operator_id', $operator_id)
                    ->where('user_id', $user_id)
                    ->where('contact_id', $contact_id)
                    ->update(self::TABLE);
            }
        }
    }

    public function getCurrentChatForOperator($operator_id)
    {
        return $this->getObject([
            'operator_id'   => $operator_id,
            'is_current'    => 1,
        ]);
    }

    public function getNextChatForOperator($operator_id)
    {
        $return = [];

        $next_chat = $this->getList([
            'operator_id'   => $operator_id,
            'replied'       => 0,
        ], 1, 1, ['date_sorted' => 'ASC']);

        if (!empty($next_chat)) {
            $next_chat = current($next_chat);
            $return['next_chat'] = [
                'user_id'       => $next_chat['user_id'],
                'contact_id'    => $next_chat['contact_id'],
            ];
        }

        return $return;
    }
}
