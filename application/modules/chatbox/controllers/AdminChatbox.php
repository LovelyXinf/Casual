<?php

namespace Pg\modules\chatbox\controllers;

use Pg\libraries\View;

/**
 * Messaging Center module
 * Admin side controller
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    controllers
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class AdminChatbox extends \Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ajaxGetTransferForm()
    {
        $return = ['status' => 1, 'message' => '', 'content' => ''];

        $user_id    = (int) $this->input->post('user_id', true);
        $contact_id = (int) $this->input->post('contact_id', true);

        $this->load->model('chatbox/models/ChatboxDealerModel');
        $chat = $this->ChatboxDealerModel->getByUserIdContactId($user_id, $contact_id);

        if (empty($chat)) {
            $return['status']  = 0;
            $return['message'] = l('error_chat_not_found', 'chatbox');
            exit(json_encode($return));
        } elseif ($chat['replied']) {
            $return['status']  = 0;
            $return['message'] = l('error_chat_replied', 'chatbox');
            exit(json_encode($return));
        } elseif ($chat['is_current']) {
            $return['status']  = 0;
            $return['message'] = l('error_chat_answering_now', 'chatbox');
            exit(json_encode($return));
        }

        $this->load->model('operators/models/OperatorsModel');
        $operators = $this->OperatorsModel->getList([
            'is_online' => 1,
            'domain_id' => $chat['domain_id'],
            'where'     => [
                'id !=' => $chat['operator_id'],
            ],
        ], null, null, ['nickname' => 'ASC']);

        if (empty($operators)) {
            $return['status']  = 0;
            $return['message'] = l('error_no_available_operators', 'chatbox');
            exit(json_encode($return));
        }

        $operators = $this->OperatorsModel->formatArray($operators);
        $this->view->assign('operators', $operators);

        $this->view->assign('user_id', $user_id);
        $this->view->assign('contact_id', $contact_id);

        $return['status']   = 1;
        $return['content']  = $this->view->fetch('ajax_transfer_form', 'admin', 'chatbox');

        exit(json_encode($return));
    }

    public function ajaxTransferChat()
    {
        $return = ['status' => 0, 'message' => ''];

        $user_id        = (int) $this->input->post('user_id', true);
        $contact_id     = (int) $this->input->post('contact_id', true);
        $operator_id    = (int) $this->input->post('operator_id', true);

        $this->load->model('chatbox/models/ChatboxDealerModel');
        $chat = $this->ChatboxDealerModel->getByUserIdContactId($user_id, $contact_id);

        if (empty($chat)) {
            $return['status']  = 0;
            $return['message'] = l('error_chat_not_found', 'chatbox');
            exit(json_encode($return));
        } elseif ($chat['replied']) {
            $return['status']  = 0;
            $return['message'] = l('error_chat_replied', 'chatbox');
            exit(json_encode($return));
        } elseif ($chat['is_current']) {
            $return['status']  = 0;
            $return['message'] = l('error_chat_answering_now', 'chatbox');
            exit(json_encode($return));
        }

        $this->load->model('operators/models/OperatorsModel');
        $operator = $this->OperatorsModel->getById($operator_id);
        if (empty($operator)) {
            $return['status']  = 0;
            $return['message'] = l('error_operator_not_found', 'chatbox');
            exit(json_encode($return));
        }

        $this->ChatboxDealerModel->save($user_id, $contact_id, [
            'operator_id'   => $operator_id,
        ]);
        $return['status']   = 1;
        $return['message']  = l('success_transfer_chat', 'chatbox');

        exit(json_encode($return));
    }
}
