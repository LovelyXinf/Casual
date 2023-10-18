<?php

namespace Pg\modules\chatbox\controllers;

use Pg\libraries\View;
use Pg\modules\chatbox\models\ChatboxDealerModel;
use Pg\modules\operators\models\OperatorsStatisticsModel;

/**
 * Messaging Center module
 * Operator side controller
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    controllers
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class OperatorChatbox extends \Controller
{
    protected $operator_id = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Chatbox_model',
            'chatbox/models/Chatbox_operator_model',
            'chatbox/models/Chatbox_contact_list_model'
        ]);

        if ($this->session->userdata('auth_type') == 'operator') {
            $this->operator_id = intval($this->session->userdata('user_id'));
        }
    }

    public function index()
    {
        // $users = $this->Chatbox_operator_model->getUsersList();
        // $this->view->assign('users', $users);

        $this->view->assign('l_time', strtotime(date('Y-m-d H:i:s')));

        $min_chars = $this->pg_module->get_module_config('chatbox', 'operator_message_min_chars');
        $this->view->assign('min_chars', $min_chars);

        $this->view->setHeader(l('admin_header_chatbox', 'chatbox'));
        $this->view->render('index');
    }

    public function ajaxGetUsers($page = 1)
    {
        $return = ['count' => 0, 'users' => []];

        $search = trim(strip_tags($this->input->post('search', true)));
        $page   = intval($page);
        if (empty($page)) {
            $page = 1;
        }

        $users = $this->Chatbox_operator_model->getUsersList($page, $search);
        if (!empty($users)) {
            foreach ($users as $key => $user) {
                $this->view->assign('users', [0 => $user]);
                $users[$key]['html'] = $this->view->fetch('users');
            }
        }

        $return['count']   = count($users);
        $return['users']   = $users;

        exit(json_encode($return));
    }

    public function ajaxDeleteContact()
    {
        $return     = ['success' => 0];

        $user_id    = intval($this->input->post('user_id', true));
        $contact_id = intval($this->input->post('contact_id', true));

        if (!empty($user_id) && !empty($contact_id)) {
            $this->Chatbox_model->clearHistory($user_id, $contact_id);
            $this->Chatbox_contact_list_model->deleteByUserIdAndContactId($user_id, $contact_id);
            $return['success'] = 1;
        }
        exit(json_encode($return));
    }

    public function ajaxOpenDialog()
    {
        $return = ['user_id' => 0, 'contact_id' => 0, 'content' => '', 'time_to_answer' => 0];

        $user_id    = intval($this->input->post('user_id', true));
        $contact_id = intval($this->input->post('contact_id', true));

        $this->load->model('chatbox/models/ChatboxApiUsersModel');
        $user    = $this->ChatboxApiUsersModel->getUserFull($user_id);
        $contact = $this->ChatboxApiUsersModel->getUserFull($contact_id);

        if (!empty($user) && !empty($contact)) {
            $return['user_id']    = $user_id;
            $return['contact_id'] = $contact_id;

            $this->load->model('chatbox/models/Chatbox_dealer_model');
            $this->Chatbox_dealer_model->updateCurrentChat($this->operator_id, $user_id, $contact_id);

            $messages = $this->getMessages($user_id, $contact_id, [], 1, $this->Chatbox_operator_model->messages_on_page, ['date_added' => 'DESC'], false);
            $this->view->assign('messages', $messages);

            $first_message = $this->Chatbox_model->getFirstMessage($user_id, $contact_id);
            if (!empty($first_message)) {
                // $conversation_start_period = $this->Chatbox_operator_model->formatConversationStartDate($first_message['date_added']);
                // $this->view->assign('conversation_start_period', $conversation_start_period);
                $this->view->assign('first_message', $first_message);
            }

            $this->load->model('chatbox/models/Chatbox_attaches_model');
            $attach_settings = $this->Chatbox_attaches_model->getImageSettings();
            $this->view->assign('attach_settings', $attach_settings);

            $this->load->model('chatbox/models/ChatboxNotesModel');
            $notes = $this->ChatboxNotesModel->getList([
                'user_id'       => $user['id'],
                'contact_id'    => $contact['id'],
                'type'          => \Pg\modules\chatbox\models\ChatboxNotesModel::NOTE_TYPE_USER,
            ], 1, 10, ['date_added' => 'DESC']);
            $notes = $this->ChatboxNotesModel->formatArray($notes);
            $this->view->assign('notes_user', $notes);

            $notes = $this->ChatboxNotesModel->getList([
                'user_id'       => $user['id'],
                'contact_id'    => $contact['id'],
                'type'          => \Pg\modules\chatbox\models\ChatboxNotesModel::NOTE_TYPE_CONTACT,
            ], 1, 10, ['date_added' => 'DESC']);
            $notes = $this->ChatboxNotesModel->formatArray($notes);
            $this->view->assign('notes_contact', $notes);

            $this->view->assign('user', $user);
            $this->view->assign('contact', $contact);
            $this->view->assign('use_attach', $this->pg_module->get_module_config('chatbox', 'chatbox_attach_status'));

            $this->load->model('operators/models/OperatorsModel');
            $filters = [
                'is_active' => 1,
                'is_online' => 1,
            ];
            if (!empty($user['domain_id'])) {
                $filters['domain_id'] = $user['domain_id'];
            }
            $active_operators = $this->OperatorsModel->getCount($filters);
            if ($active_operators > 1) {
                $time_to_answer = intval($this->pg_module->get_module_config('chatbox', 'operator_message_time_to_answer'));
                $return['time_to_answer'] = $time_to_answer * 60; // seconds
            }

            // FIXME: delete
            if ($_SERVER['REMOTE_ADDR'] == '77.40.61.205') {
                $return['time_to_answer'] = 0;
            }

            // get available chat actions
            $this->load->model('chatbox/models/ChatboxApiModel');
            $result = $this->ChatboxApiModel->request(
                $user['domain_id'],
                \Pg\modules\chatbox\models\ChatboxApiModel::ACTION_AVAILABLE_CHAT_ACTIONS_GET,
                [
                    'user_id'       => $user['user_id'],
                    'contact_id'    => $contact['user_id'],
                ]
            );

            if (!empty($result['status']) && !empty($result['data'])) {
                $this->view->assign('available_chat_actions', $result['data']);
            }

            $return['content'] = $this->view->fetch('dialog');

            // $return['user_counter'] = $this->Chatbox_operator_model->getNewMessagesCountByUserId($user_id);
        }

        exit(json_encode($return));
    }

    protected function getMessages($user_id, $contact_id, $filters = [], $page = null, $limits = null, $order_by = ['date_added' => 'DESC'], $with_html = false)
    {
        $filters['user_id']    = $user_id;
        $filters['contact_id'] = $contact_id;

        $messages = $this->Chatbox_model->getList($filters, $page, $limits, $order_by);
        if (!empty($messages)) {
            $messages = array_reverse($this->Chatbox_model->formatArray($messages));

            if ($with_html) {
                $this->load->model('chatbox/models/ChatboxApiUsersModel');
                $user    = $this->ChatboxApiUsersModel->getUserFull($user_id);
                $contact = $this->ChatboxApiUsersModel->getUserFull($contact_id);
                foreach ($messages as $key => $message) {
                    $this->view->assign('messages', [0 => $message]);
                    $this->view->assign('user', $user);
                    $this->view->assign('contact', $contact);
                    $messages[$key]['html'] = $this->view->fetch('messages');
                }
            }

            if ($contact_id) {
                $this->Chatbox_model->checkIsRead($user_id, $contact_id);
            }

            return $messages;
        }

        return [];
    }

    public function ajaxGetMessages()
    {
        $return     = ['count' => 0, 'messages' => []];

        $user_id    = intval($this->input->post('user_id', true));
        $contact_id = intval($this->input->post('contact_id', true));

        if (!empty($user_id) && !empty($contact_id)) {
            $message_filters = [
                'user_id'        => $user_id,
                'contact_id'     => $contact_id,
            ];

            $f_adate = trim(strip_tags($this->input->post('f_adate', true)));
            if (!empty($f_adate)) {
                $message_filters['max_date_added'] = $f_adate;
            }

            $f_mid = trim(strip_tags($this->input->post('f_mid', true)));
            if (!empty($f_mid)) {
                $message_filters['where']['id !='] = $f_mid;
            }

            $return['messages'] = $this->getMessages($user_id, $contact_id, $message_filters, 1, $this->Chatbox_operator_model->messages_on_page, ['date_added' => 'DESC'], true);
            $return['count']    = count($return['messages']);
        }

        exit(json_encode($return));
    }

    public function ajaxSendMessage()
    {
        $result = ['messages' => [], 'next_chat' => []];

        $message     = $this->input->post('message', true);
        $user_id     = intval($this->input->post('user_id', true));
        $contact_id  = intval($this->input->post('contact_id', true));
        $attaches    = (array) $this->input->post('attaches', true);

        $this->load->model('chatbox/models/Chatbox_dealer_model');
        $chat = $this->Chatbox_dealer_model->getByUserIdContactId($user_id, $contact_id);
        if ($chat['replied'] || $chat['operator_id'] != $this->operator_id) {
            $result['errors'][] = l('error_access_denied', 'chatbox');
        } else {
            $result = array_merge_recursive($this->Chatbox_model->addMessage($user_id, $contact_id, $message, $attaches), $result);
        }

        if (empty($result['errors'])) {
            $this->Chatbox_dealer_model->save($user_id, $contact_id, [
                'operator_id'           => 0,
                'is_current'            => 0,
                'replied'               => 1,
                'replied_operator_id'   => $this->operator_id,
            ]);

            $this->load->model('Operators_model');
            $operator = $this->Operators_model->getById($this->operator_id);
            if (!empty($result['o_msg_id'])) {
                $this->Operators_model->addMoneyToAccount($this->operator_id, $operator['message_cost']);

                $answer_time = time() - strtotime($chat['date_opened']);

                $this->load->model('operators/models/Operators_statistics_model');
                $this->Operators_statistics_model->add(
                    $this->operator_id,
                    OperatorsStatisticsModel::TYPE_MESSAGE,
                    $operator['message_cost'],
                    [
                        'message_id'    => $result['o_msg_id'],
                        'answer_time'   => $answer_time,
                    ]
                );

                $this->load->model('chatbox/models/Chatbox_operator_timing_model');
                $this->Chatbox_operator_timing_model->callbackAddNewMessage($this->operator_id, $answer_time);
            }

            $l_adate         = trim(strip_tags($this->input->post('l_adate', true)));
            $message_filters = [
                'user_id'        => $user_id,
                'contact_id'     => $contact_id,
                'min_date_added' => $l_adate,
            ];
            $result['messages'] = $this->getMessages($user_id, $contact_id, $message_filters, null, null, ['date_added' => 'DESC'], true);

            $result['next_chat'] = $this->Chatbox_dealer_model->getNextChatForOperator($this->operator_id);
        }

        exit(json_encode($result));
    }

    public function ajaxDeleteMessage()
    {
        $return     = ['success' => 0, 'error' => '', 'msg_count' => ''];

        $message_id = intval($this->input->post('message_id', true));

        $message = $this->Chatbox_model->getById($message_id);
        if (!empty($message)) {
            $this->Chatbox_model->delete($message_id);
            // Delete linked message?
            // $this->Chatbox_model->delete($message['linked_id']);

            $return['success']   = 1;
            $return['msg_count'] = $this->Chatbox_model->getCount(['user_id' => $message['user_id'], 'contact_id' => $message['contact_id']]);
            if (!$return['msg_count']) {
                $this->Chatbox_contact_list_model->delete($message['user_id'], $message['contact_id']);
            }
        }

        exit(json_encode($return));
    }

    public function postUpload()
    {
        $return = ['errors' => '', 'success' => '', 'message_id' => 0];

        $this->load->model('chatbox/models/Chatbox_attaches_model');

        $user_id    = intval($this->input->post('user_id', true));
        $contact_id = intval($this->input->post('contact_id', true));

        if (empty($user_id)) {
            $return['errors'][] = l('error_empty_user', 'chatbox');
        } elseif (empty($contact_id)) {
            $return['errors'][] = l('error_invalid_recipient', 'chatbox');
        } else {
            $post_data = [
                'user_id'    => $user_id,
                'contact_id' => $contact_id,
            ];

            $validate_data = $this->Chatbox_attaches_model->validate(null, $post_data, 'attach');

            $this->load->model('chatbox/models/Chatbox_dealer_model');
            $chat = $this->Chatbox_dealer_model->getByUserIdContactId($user_id, $contact_id);
            if ($chat['replied'] || $chat['operator_id'] != $this->operator_id) {
                $validate_data['errors'][] = l('error_access_denied', 'chatbox');
            }

            if (!empty($validate_data['errors'])) {
                $return['errors'] = implode('<br>', $validate_data['errors']);
            } else {
                $message_id = intval($this->input->post('id', true));
                if (empty($message_id)) {
                    $message = $this->input->post('message', true);

                    $return_message = $this->Chatbox_model->addMessage($user_id, $contact_id, $message);
                    if (!empty($return_message['errors'])) {
                        $return['errors'] = $return_message['errors'];
                    } else {
                        $message_id = $return_message['o_msg_id'];
                        $this->Chatbox_dealer_model->save($user_id, $contact_id, [
                            'operator_id'           => 0,
                            'is_current'            => 0,
                            'replied'               => 1,
                            'replied_operator_id'   => $this->operator_id,
                        ]);

                        $this->load->model('Operators_model');
                        $operator = $this->Operators_model->getById($this->operator_id);

                        $this->Operators_model->addMoneyToAccount($this->operator_id, $operator['message_cost']);

                        $answer_time = time() - strtotime($chat['date_opened']);

                        $this->load->model('operators/models/Operators_statistics_model');
                        $this->Operators_statistics_model->add(
                            $this->operator_id,
                            OperatorsStatisticsModel::TYPE_MESSAGE,
                            $operator['message_cost'],
                            [
                                'message_id'    => $message_id,
                                'answer_time'   => $answer_time,
                            ]
                        );

                        $this->load->model('chatbox/models/Chatbox_operator_timing_model');
                        $this->Chatbox_operator_timing_model->callbackAddNewMessage($this->operator_id, $answer_time);
                    }
                }
                $return['message_id'] = $validate_data['data']['message_id'] = $message_id;

                $return_attach = $this->Chatbox_attaches_model->upload(null, $validate_data['data'], 'attach');
                if (!empty($return_attach['errors'])) {
                    $return['errors'] = implode('<br/>', $return_attach['errors']);
                } else {
                    $attaches_count = $this->Chatbox_attaches_model->getCount(['message_id' => $message_id]);
                    $this->Chatbox_model->save($message_id, ['attaches_count' => $attaches_count]);
                    $message_data = $this->Chatbox_model->getById($message_id);
                    $this->Chatbox_model->save($message_data['linked_id'], ['attaches_count' => $attaches_count]);
                }

                $return['messages'] = $this->getMessages($user_id, $contact_id, [], 1, $this->Chatbox_operator_model->messages_on_page, ['date_added' => 'DESC'], true);
            }
        }

        exit(json_encode($return));
    }

    public function ajaxAnswerTimeExpired()
    {
        $return = ['status' => 0, 'message' => '', 'next_chat' => []];

        $this->load->model('chatbox/models/ChatboxDealerModel');
        $chat = $this->ChatboxDealerModel->getCurrentChatForOperator($this->operator_id);

        if (!empty($chat)) {
            $this->load->model('operators/models/OperatorsModel');
            $operators = $this->OperatorsModel->getListByKey([
                'is_active' => 1,
                'is_online' => 1,
                'domain_id' => $chat['domain_id'],
                'where'     => [
                    'id !=' => $this->operator_id,
                ],
            ], null, null, ['date_last_activity' => 'DESC']);
            $operator_id = $this->ChatboxDealerModel->getLessBusyOperatorId($operators);
            if (!empty($operator_id)) {
                $return['status']  = 1;
                $return['message'] = l('info_answer_time_expired', 'chatbox');

                $this->ChatboxDealerModel->save($chat['user_id'], $chat['contact_id'], [
                    'operator_id'           => $operator_id,
                    'is_current'            => 0,
                    'replied_operator_id'   => 0,
                ]);

                $return['next_chat'] = $this->ChatboxDealerModel->getNextChatForOperator($this->operator_id);
            }
        }

        exit(json_encode($return));
    }

    public function ajaxGetNotesForm()
    {
        $return = ['content' => ''];

        $user_id    = intval($this->input->post('user_id', true));
        $contact_id = intval($this->input->post('contact_id', true));

        if ($user_id && $contact_id) {
            $this->load->model('chatbox/models/Chatbox_notes_model');
            $filters     = ['user_id' => $user_id, 'contact_id' => $contact_id];

            // user notes
            $filters['type'] = \Pg\modules\chatbox\models\ChatboxNotesModel::NOTE_TYPE_USER;
            $items_count = $this->Chatbox_notes_model->getCount($filters);

            if ($items_count) {
                $notes   = $this->Chatbox_notes_model->getList(
                    $filters,
                    1,
                    $this->Chatbox_notes_model->notes_on_page,
                    ['date_added' => 'DESC']
                );

                $this->Chatbox_notes_model->setFormatSettings('get_operator', true);
                $notes = $this->Chatbox_notes_model->formatArray($notes);
                $this->Chatbox_notes_model->setFormatSettings('get_operator', false);
                $this->view->assign('notes_user', $notes);

                if ($items_count > $this->Chatbox_notes_model->notes_on_page) {
                    $this->view->assign('load_more_user', 1);
                }
            }

            // contact notes
            $filters['type'] = \Pg\modules\chatbox\models\ChatboxNotesModel::NOTE_TYPE_CONTACT;
            $items_count = $this->Chatbox_notes_model->getCount($filters);

            if ($items_count) {
                $notes   = $this->Chatbox_notes_model->getList(
                    $filters,
                    1,
                    $this->Chatbox_notes_model->notes_on_page,
                    ['date_added' => 'DESC']
                );

                $this->Chatbox_notes_model->setFormatSettings('get_operator', true);
                $notes = $this->Chatbox_notes_model->formatArray($notes);
                $this->Chatbox_notes_model->setFormatSettings('get_operator', false);
                $this->view->assign('notes_contact', $notes);

                if ($items_count > $this->Chatbox_notes_model->notes_on_page) {
                    $this->view->assign('load_more_contact', 1);
                }
            }

            $this->load->model('chatbox/models/ChatboxApiUsersModel');
            $user   = $this->ChatboxApiUsersModel->getById($user_id);
            $user   = $this->ChatboxApiUsersModel->format($user);
            $this->view->assign('user', $user);

            $contact    = $this->ChatboxApiUsersModel->getById($contact_id);
            $contact    = $this->ChatboxApiUsersModel->format($contact);
            $this->view->assign('contact', $contact);

            $this->view->assign('user_id', $user_id);
            $this->view->assign('contact_id', $contact_id);
            $return['content'] = $this->view->fetch('ajax_notes_form', 'operator', 'chatbox');
        }

        exit(json_encode($return));
    }

    public function ajaxAddNote()
    {
        $return = ['status' => 1, 'message' => '', 'notes' => []];

        $this->load->model('chatbox/models/Chatbox_notes_model');

        $post_data = [
            'user_id'       => $this->input->post('user_id', true),
            'contact_id'    => $this->input->post('contact_id', true),
            'operator_id'   => $this->operator_id,
            'category_gid'  => $this->input->post('category_gid', true),
            'message'       => $this->input->post('message', true),
            'type'          => $this->input->post('type', true),
        ];

        $validate = $this->Chatbox_notes_model->validate(null, $post_data);
        if (!empty($validate['errors'])) {
            $return['message'] = implode('<br/>', $validate['errors']);
            $return['status']  = 0;
            exit(json_encode($return));
        }

        // TODO: проверить доступ оператора к этому чату

        $save_data = $validate['data'];
        $this->Chatbox_notes_model->save(null, $save_data);

        $return['message'] = l('success_add_note', 'chatbox');

        // $filters = [];
        // $l_id = intval($this->input->post('l_id', true));
        // if ($l_id) {
        //     $filters['min_id'] = $l_id;
        // }
        // $return['notes'] = $this->getNotes(
        //     $save_data['user_id'],
        //     $save_data['contact_id'],
        //     $filters,
        //     1,
        //     $this->Chatbox_notes_model->notes_on_page,
        //     ['date_added' => 'DESC'],
        //     true
        // );

        exit(json_encode($return));
    }

    public function ajaxDeleteNote()
    {
        $return = ['status' => 1, 'message' => ''];

        $id = intval($this->input->post('id', true));

        $this->load->model('chatbox/models/Chatbox_notes_model');
        $note = $this->Chatbox_notes_model->getById($id);

        // TODO: проверить доступ оператора к этому чату
        if (!empty($note)) {
            $return['message'] = l('success_delete_note', 'chatbox');
            $this->Chatbox_notes_model->delete($id);
        }

        exit(json_encode($return));
    }

    public function ajaxGetNotes()
    {
        $return     = ['count' => 0, 'notes' => [], 'load_more' => 1];

        $this->load->model('chatbox/models/Chatbox_notes_model');

        $user_id        = intval($this->input->post('user_id', true));
        $contact_id     = intval($this->input->post('contact_id', true));
        $f_id           = intval($this->input->post('f_id', true));
        $category_gid   = trim(strip_tags($this->input->post('category_gid', true)));
        $type           = trim(strip_tags($this->input->post('type', true)));

        if (!empty($user_id) && !empty($contact_id) && !empty($type)) {
            $filters = [
                'user_id'       => $user_id,
                'contact_id'    => $contact_id,
                'type'          => $type,
            ];

            if ($f_id) {
                $filters['max_id'] = $f_id;
            }

            if ($category_gid) {
                $filters['category_gid'] = $category_gid;
            }

            $return['notes'] = $this->getNotes(
                $user_id,
                $contact_id,
                $filters,
                1,
                $this->Chatbox_notes_model->notes_on_page,
                ['date_added' => 'DESC'],
                true
            );
            $return['count']    = count($return['notes']);

            $items_count = $this->Chatbox_notes_model->getCount($filters);
            if ($items_count <= $this->Chatbox_notes_model->notes_on_page) {
                $return['load_more'] = 0;
            }
        }

        exit(json_encode($return));
    }

    protected function getNotes($user_id, $contact_id, $filters = [], $page = null, $limits = null, $order_by = ['date_added' => 'DESC'], $with_html = false)
    {
        $this->load->model('chatbox/models/Chatbox_notes_model');

        $filters['user_id']    = $user_id;
        $filters['contact_id'] = $contact_id;

        $notes = $this->Chatbox_notes_model->getList($filters, $page, $limits, $order_by);
        if (!empty($notes)) {
            $this->Chatbox_notes_model->setFormatSettings('get_operator', true);
            $notes = $this->Chatbox_notes_model->formatArray($notes);
            $this->Chatbox_notes_model->setFormatSettings('get_operator', false);

            if ($with_html) {
                foreach ($notes as $key => $note) {
                    $this->view->assign('notes', [0 => $note]);
                    $this->view->assign('user_id', $user_id);
                    $this->view->assign('contact_id', $contact_id);
                    $notes[$key]['html'] = $this->view->fetch('notes');
                }
            }

            return $notes;
        }

        return [];
    }

    public function ajaxAttachForm($user_id, $contact_id)
    {
        $this->load->model('chatbox/models/ChatboxDealerModel');
        $chat = $this->ChatboxDealerModel->getByUserIdContactId($user_id, $contact_id);
        if ($chat['replied'] || $chat['operator_id'] != $this->operator_id) {
            exit;
        }

        $amedia = $this->getAttachMediaList($user_id, 1);

        $this->load->model('chatbox/models/ChatboxMediaControlModel');
        $media_used = $this->ChatboxMediaControlModel->getListByField('media_id', [
            'user_id'       => $user_id,
            'contact_id'    => $contact_id,
        ]);
        if (!empty($amedia['items'])) {
            foreach ($amedia['items'] as $key => $item) {
                if (array_key_exists($item['id'], $media_used)) {
                    if (empty($amedia['items'][$key]['last_used'])
                        || $amedia['items'][$key]['last_used'] < $media_used[$item['id']]['date_added']
                    ) {
                        $amedia['items'][$key]['last_used'] = $media_used[$item['id']]['date_added'];
                    }
                }
            }
        }
        $this->view->assign('amedia', $amedia);

        echo $this->view->fetch('ajax_attach_form');
    }

    public function ajaxAttachMediaList()
    {
        $return = ['status' => 1, 'items' => [], 'show_more' => 0];

        $user_id    = intval($this->input->post('user_id', true));
        $contact_id = intval($this->input->post('contact_id', true));

        $this->load->model('chatbox/models/ChatboxDealerModel');
        $chat = $this->ChatboxDealerModel->getByUserIdContactId($user_id, $contact_id);
        if ($chat['replied'] || $chat['operator_id'] != $this->operator_id) {
            $return['status'] = 0;
            exit(json_encode($return));
        }

        $page    = intval($this->input->post('page', true));
        $amedia  = $this->getAttachMediaList($user_id, $page);

        $this->load->model('chatbox/models/ChatboxMediaControlModel');
        $media_used = $this->ChatboxMediaControlModel->getListByField('media_id', [
            'user_id'       => $user_id,
            'contact_id'    => $contact_id,
        ]);
        if (!empty($amedia['items'])) {
            foreach ($amedia['items'] as $key => $item) {
                if (array_key_exists($item['id'], $media_used)) {
                    if (empty($item['last_used']) || $item['last_used'] < $media_used[$item['id']]['date_added']) {
                        $item['last_used'] = $media_used[$item['id']]['date_added'];
                    }
                }

                $this->view->assign('items', [0 => $item]);
                $item['content'] = $this->view->fetch('block_media_list');

                $amedia['items'][$key] = $item;
            }
        }

        $return  = array_merge($return, $amedia);

        exit(json_encode($return));
    }

    protected function getAttachMediaList($user_id, $page = 1)
    {
        $return = ['items' => [], 'show_more' => 0];

        if (empty($page)) {
            $page = 1;
        }

        $this->load->model('chatbox/models/ChatboxApiUsersModel');
        $user           = $this->ChatboxApiUsersModel->getById($user_id);
        $domain_id      = $user['domain_id'];
        $items_on_page  = 20;

        $this->load->model('chatbox/models/ChatboxApiModel');
        $result = $this->ChatboxApiModel->request(
            $domain_id,
            \Pg\modules\chatbox\models\ChatboxApiModel::ACTION_USER_IMAGES_GET,
            [
                'user_id'       => $user['user_id'],
                'page'          => $page,
                'limit'         => $items_on_page,
            ]
        );
        if (!empty($result['status']) && !empty($result['data']['items'])) {
            $return['items']    = $result['data']['items'];
            $items_count        = intval($result['data']['count']);
            $page               = intval($result['data']['page']);
            $items_on_page      = intval($result['data']['limit']);

            if (($page * $items_on_page) < $items_count) {
                $return['show_more'] = 1;
            }
        }

        return $return;
    }

    public function ajaxGetKissesForm()
    {
        $return = ['status' => 0, 'message' => '', 'content' => ''];

        $this->load->model('chatbox/models/ChatboxApiUsersModel');
        $user_id    = intval($this->input->post('user_id', true));
        $user       = $this->ChatboxApiUsersModel->getById($user_id);
        $domain_id  = $user['domain_id'];

        $this->load->model('chatbox/models/ChatboxApiModel');
        $result = $this->ChatboxApiModel->request(
            $domain_id,
            \Pg\modules\chatbox\models\ChatboxApiModel::ACTION_KISSES_LIST_GET,
            []
        );

        if (!empty($result['status']) && !empty($result['data']['items'])) {
            $this->view->assign('kisses', $result['data']['items']);
            $this->view->assign('maxlength', $result['data']['maxlength']);

            $return['status']   = 1;
            $return['content']  = $this->view->fetch('ajax_kisses_form');
        }

        exit(json_encode($return));
    }

    public function ajaxChatAction()
    {
        $return     = ['status' => 0, 'message' => ''];

        $action     = trim(strip_tags($this->input->post('action', true)));
        $user_id    = intval($this->input->post('user_id', true));
        $contact_id = intval($this->input->post('contact_id', true));

        $this->load->model('chatbox/models/ChatboxApiUsersModel');
        $user           = $this->ChatboxApiUsersModel->getById($user_id);
        $contact        = $this->ChatboxApiUsersModel->getById($contact_id);
        $domain_id      = $user['domain_id'];

        $request_data   = [
            'chat_action'   => $action,
            'user_id'       => $user['user_id'],
            'contact_id'    => $contact['user_id'],
        ];

        if ($action == 'kisses') {
            $request_data['kiss_id']    = intval($this->input->post('kiss_id', true));
            $request_data['message']    = trim(strip_tags($this->input->post('message', true)));
        }

        $this->load->model('chatbox/models/ChatboxApiModel');
        $result = $this->ChatboxApiModel->request(
            $domain_id,
            \Pg\modules\chatbox\models\ChatboxApiModel::ACTION_CHAT_ACTION_SET,
            $request_data
        );

        if (!empty($result['status']) && !empty($result['data'])) {
            $return['status']   = intval($result['data']['status']) ? 1 : 0;
            $return['message']  = $result['data']['message'];
        }

        exit(json_encode($return));
    }
}
