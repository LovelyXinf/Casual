<?php

namespace Pg\modules\chatbox\models;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Messaging Center module
 * Operator Actions model
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class ChatboxOperatorModel extends \Model
{
    const USERS_TABLE        = DB_PREFIX . 'users';
    const CONTACT_LIST_TABLE = DB_PREFIX . 'chatbox_contact_list';

    private $operator_id     = null;

    public $users_on_page    = 50;
    public $contacts_on_page = 20;
    public $messages_on_page = 30;

    public function __construct()
    {
        parent::__construct();
        if ($this->ci->session->userdata('auth_type') == 'operator') {
            $this->operator_id = intval($this->ci->session->userdata('user_id'));
        }
    }

    public function getUsersList($page = 1, $search = '', $from_date = null)
    {
        $this->ci->load->model([
            'Users_model',
            'chatbox/models/Chatbox_dealer_model'
        ]);

        $user_ids = [];
        $filters  = [
            'operator_id' => $this->operator_id,
            'replied'     => 0,
        ];

        if (!is_null($from_date)) {
            $filters['where']['date_updated >='] = $from_date;
        }

        $chats    = $this->ci->Chatbox_dealer_model->getList($filters);
        if (empty($chats)) {
            return [];
        }

        foreach ($chats as $chat) {
            $user_ids[] = $chat['user_id'];
        }

        // $fields = [
        //     'SUM(' . self::CONTACT_LIST_TABLE . '.count_new) as count_new',
        //     'IF(SUM(' . self::CONTACT_LIST_TABLE . '.count_new) > 0, 1, 0) as exist_new_msg'
        // ];

        foreach ($this->ci->Users_model->fields as $field) {
            $fields[] = self::USERS_TABLE . '.' . $field;
        }

        $this->ci->db->select(implode(', ', $fields));
        $this->ci->db->from(self::USERS_TABLE);
        // $this->ci->db->join(self::CONTACT_LIST_TABLE, self::CONTACT_LIST_TABLE . '.user_id = ' . self::USERS_TABLE . '.id', 'left');

        $this->ci->db->where(self::USERS_TABLE . '.approved', 1);
        $this->ci->db->where(self::USERS_TABLE . '.is_fake', 1);
        $this->ci->db->where_in(self::USERS_TABLE . '.id', $user_ids);

        if (!empty($search)) {
            $search_string_escape = $this->ci->db->escape('%' . $search . '%');
            $this->ci->db->where(
                "(" . self::USERS_TABLE . ".nickname LIKE {$search_string_escape} OR " . self::USERS_TABLE . ".fname LIKE {$search_string_escape} OR " . self::USERS_TABLE . ".sname LIKE {$search_string_escape})",
                null,
                false
            );
        }

        // if (!is_null($from_date)) {
        //     $this->ci->db->where(self::CONTACT_LIST_TABLE . '.date_update >=', $from_date);
        // }

        $this->ci->db->group_by(self::USERS_TABLE . '.id');
        // $this->ci->db->order_by('exist_new_msg DESC');
        $this->ci->db->order_by(self::USERS_TABLE . '.nickname ASC');
        if (!is_null($page)) {
            $this->ci->db->limit($this->users_on_page, $this->users_on_page * ($page - 1));
        }

        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            $results = $this->ci->Users_model->formatUsers($results);
            return $this->formatUsers($results);
        }
        return [];
    }

    public function formatUsers($users)
    {
        $return = [];

        if (empty($users) || !is_array($users)) {
            return [];
        }

        $this->ci->load->model('chatbox/models/Chatbox_dealer_model');
        $fields = ['id', 'media', 'age', 'fname', 'sname', 'nickname', 'output_name'];

        foreach ($users as $key => $user) {
            $user = array_intersect_key($user, array_flip($fields));

            $user['count_new'] = $this->ci->Chatbox_dealer_model->getCount([
                'operator_id'   => $this->operator_id,
                'user_id'       => $user['id'],
                'replied'       => 0,
            ]);

            $return[$key] = $user;
        }

        return $return;
    }

    public function getNewMessagesCountByUserId($user_id)
    {
        $this->ci->load->model('chatbox/models/Chatbox_contact_list_model');
        return $this->ci->Chatbox_contact_list_model->getSumNewMessages($user_id);
    }

    public function getMessages($user_id, $contact_id, $page = 1, $from_date = null)
    {
        $this->ci->load->model('Chatbox_model');

        $filters = [
            'user_id'    => $user_id,
            'contact_id' => $contact_id,
        ];

        if (!is_null($from_date)) {
            $filters['where']['date_added >='] = $from_date;
        }

        $this->ci->Chatbox_model->checkIsRead($user_id, $contact_id);
        $messages = $this->ci->Chatbox_model->getList($filters, $page, $this->messages_on_page, ['date_added' => 'DESC']);
        $messages = $this->ci->Chatbox_model->formatArray($messages);
        $messages = array_reverse($messages);

        return $messages;
    }

    public function setChatsSnapshot($chats)
    {
        $this->ci->session->set_userdata('operator_chats_shapshot', $chats);
    }

    public function getChatsSnapshot()
    {
        return (array)$this->ci->session->userdata('operator_chats_shapshot');
    }

    public function formatConversationStartDate($date_added)
    {
        $date1 = date_create($date_added);
        $date2 = date_create('now');

        $days  = date_diff($date1, $date2)->days;

        if ($days < 7) {
            if ($days <= 1) {
                return $days . ' ' . l('period_day', 'chatbox');
            } else {
                return $days . ' ' . l('period_days', 'chatbox');
            }
        } elseif ($days < 30) {
            $weeks = intval($days / 7);
            if ($weeks <= 1) {
                return $weeks . ' ' . l('period_week', 'chatbox');
            } else {
                return $weeks . ' ' . l('period_weeks', 'chatbox');
            }
        } elseif ($days < 365) {
            $months = intval($days / 30);
            if ($months <= 1) {
                return $months . ' ' . l('period_month', 'chatbox');
            } else {
                return $months . ' ' . l('period_months', 'chatbox');
            }
        } else {
            $years = intval($days / 365);
            if ($years <= 1) {
                return $years . ' ' . l('period_year', 'chatbox');
            } else {
                return $years . ' ' . l('period_years', 'chatbox');
            }
        }

        return $days . ' ' . l('period_days', 'chatbox');
    }

    public function backendCheckNewMessages($data = [])
    {
        $return = ['user_id' => 0, 'contact_id' => 0, 'l_time' => 0, 'data' => [], 'next_chat' => [], 'chats_count' => 0];

        if (empty($this->operator_id)) {
            return $return;
        }

        $this->ci->load->model('operators/models/OperatorsModel');
        $operator = $this->ci->OperatorsModel->getById($this->operator_id);
        if (empty($operator)) {
            return $return;
        }
        if ($operator['to_logout_by_admin']) {
            $this->ci->OperatorsModel->save($this->operator_id, [
                'is_online'             => 0,
                'to_logout_by_admin'    => 0,
            ]);
            $this->ci->load->model('chatbox/models/ChatboxDealerModel');
            $this->ci->ChatboxDealerModel->callbackOperatorOnlineStatus($this->operator_id, 0);

            $this->session->sess_destroy();
            $this->session->sess_create();
            return ['logout' => 1];
        }

        $return['user_id']    = !empty($data['user_id']) ? intval($data['user_id']) : 0;
        $return['contact_id'] = !empty($data['contact_id']) ? intval($data['contact_id']) : 0;

        $this->ci->load->model([
            'Chatbox_model',
            'chatbox/models/Chatbox_dealer_model',
        ]);

        $this->ci->Chatbox_dealer_model->updateCurrentChat($this->operator_id, $return['user_id'], $return['contact_id']);

        if (!empty($data['no_chat_page'])) {
            $return['chats_count'] = $this->ci->Chatbox_dealer_model->getCount([
                'operator_id' => $this->operator_id,
                'replied'     => 0,
                // 'is_current'  => 0,
            ]);
            return $return;
        }

        // timing
        $this->ci->load->model('chatbox/models/Chatbox_operator_timing_model');
        $this->ci->Chatbox_operator_timing_model->update($this->operator_id);

        $l_time = !empty($data['l_time']) ? intval($data['l_time']) : 0;
        $l_date = date('Y-m-d H:i:s', $l_time);

        if ($return['user_id']) {
            if (!empty($return['contact_id'])) {
                // messages
                $message_filters = [
                    'user_id'        => $return['user_id'],
                    'contact_id'     => $return['contact_id'],
                    'min_date_added' => $l_date,
                ];
                $messages = $this->ci->Chatbox_model->getList($message_filters, null, null, ['date_added' => 'ASC']);
                if (!empty($messages)) {
                    $messages = array_reverse($this->ci->Chatbox_model->formatArray($messages));

                    $this->ci->load->model('chatbox/models/ChatboxApiUsersModel');
                    $user    = $this->ci->ChatboxApiUsersModel->getById($return['user_id']);
                    $contact = $this->ci->ChatboxApiUsersModel->getById($return['contact_id']);
                    foreach ($messages as $key => $item) {
                        $message = [
                            'id'        => $item['id'],
                            'html'      => '',
                        ];
                        $this->ci->view->assign('messages', [0 => $item]);
                        $this->ci->view->assign('user', $user);
                        $this->ci->view->assign('contact', $contact);
                        $message['html'] = $this->ci->view->fetch('messages', 'operator', 'chatbox');

                        $return['data']['messages'][] = $message;
                    }

                    $this->ci->Chatbox_model->checkIsRead($return['user_id'], $return['contact_id']);
                }
            }
        }

        // chats shapshot
        $chats          = $this->ci->Chatbox_dealer_model->getList([
            'operator_id' => $this->operator_id,
            'replied'     => 0,
        ], null, null, ['date_sorted' => 'ASC']);
        $chats_k        = [];
        foreach ($chats as $chat) {
            $chats_k[$chat['user_id']][] = intval($chat['contact_id']);
        }
        $this->setChatsSnapshot($chats_k);
        $return['data']['snapshot'] = [];
        if (!empty($chats_k)) {
            foreach ($chats_k as $u_id => $c_ids) {
                $return['data']['snapshot'][$u_id] = [
                    'user_id'  => $u_id,
                    'counter'  => count($c_ids),
                    'contacts' => $c_ids,
                ];
            }
        }

        if (empty($return['contact_id']) && !empty($chats)) {
            reset($chats);
            $next_chat = current($chats);
            $return['next_chat'] = [
                'user_id'       => $next_chat['user_id'],
                'contact_id'    => $next_chat['contact_id'],
            ];
        }

        $return['chats_count']  = count($chats);
        $return['l_time']       = strtotime(date('Y-m-d H:i:s'));

        return $return;
    }
}
