<?php

/**
 * Messaging Center module
 * Helper
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    helpers
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */

namespace Pg\modules\chatbox\helpers {
    if (!function_exists('newMessagesChatbox')) {
        function newMessagesChatbox($attrs)
        {
            $ci = &get_instance();
            if ('user' != $ci->session->userdata('auth_type')) {
                return false;
            }
            $user_id = $ci->session->userdata('user_id');
            if (!$user_id) {
                log_message('Empty user id');

                return false;
            }
            if (empty($attrs['template'])) {
                $attrs['template'] = 'header';
            }
            $ci->load->model('Chatbox_model');
            $filters = [
                'user_id'   => $user_id,
                'is_read'   => 0,
                'dir'       => 'i',
            ];
            $messages_count = $ci->Chatbox_model->getCount($filters);
            $messages       = $ci->Chatbox_model->getList($filters, 1, $ci->Chatbox_model->messages_max_count_header, ['date_added' => 'DESC']);
            $ci->Chatbox_model->setFormatSettings('get_contact', true);
            $messages = $ci->Chatbox_model->formatArray($messages);
            $ci->Chatbox_model->setFormatSettings('get_contact', false);

            $ci->view->assign('messages', $messages);
            $ci->view->assign('messages_count', $messages_count);
            $ci->view->assign('messages_max_count', $ci->Chatbox_model->messages_max_count_header);

            return $ci->view->fetch('helper_new_messages_' . $attrs['template'], 'user', 'chatbox');
        }
    }

    if (!function_exists('sendMessageChatbox')) {
        function sendMessageChatbox($params)
        {
            $ci = &get_instance();

            if (!isset($params['id_user'])) {
                return '';
            }

            if ($ci->session->userdata('auth_type') == 'user') {
                $user_id = $ci->session->userdata('user_id');
                if ($params['id_user'] == $user_id) {
                    return '';
                }
            }

            $ci->view->assign('user_id', $params['id_user']);
            $ci->view->assign('message_button_rand', rand(100000, 999999));

            if (empty($params['view_type'])) {
                $params['view_type'] = 'button';
            }
            $ci->view->assign('class', (isset($params['class']) && !empty($params['class'])) ? $params['class'] : '');
            $ci->view->assign('text_type', (isset($params['text_type']) && !empty($params['text_type'])) ? $params['text_type'] : 'send');

            if (isset($params['new_tab'])) {
                $ci->view->assign('new_tab', $params['new_tab']);
            }

            switch ($params['view_type']) {
                case 'link':
                    return $ci->view->fetch('helper_message_link', 'user', 'chatbox');
                    break;

                case 'icon':
                    return $ci->view->fetch('helper_message_icon', 'user', 'chatbox');
                    break;

                case 'button':
                default:
                    $type = (!empty($params['type'])) ? trim(strip_tags($params['type'])) . '_' : '';

                    return $ci->view->fetch('helper_' . $type . 'message_button', 'user', 'chatbox');
                    break;
            }
        }
    }

    if (!function_exists('initializeOperatorChat')) {
        function initializeOperatorChat($params = [])
        {
            $ci = &get_instance();

            if ($ci->session->userdata('auth_type') != 'operator') {
                return;
            }

            $ci->view->assign('l_time', strtotime(date('Y-m-d H:i:s')));

            $min_chars = $ci->pg_module->get_module_config('chatbox', 'operator_message_min_chars');
            $ci->view->assign('min_chars', $min_chars);

            $max_chars = $ci->pg_module->get_module_config('chatbox', 'operator_message_max_chars');
            $ci->view->assign('max_chars', $max_chars);

            $time_to_answer = intval($ci->pg_module->get_module_config('chatbox', 'operator_message_time_to_answer'));
            $time_to_answer *= 60; // seconds
            $ci->view->assign('time_to_answer', $time_to_answer);

            return $ci->view->fetch('helper_initialize_chat', 'operator', 'chatbox');
        }
    }

    if (!function_exists('geOperatorsQueueCount')) {
        function geOperatorsQueueCount()
        {
            $ci = &get_instance();

            if ($ci->session->userdata('auth_type') != 'operator') {
                return false;
            }

            $operator_id = (int) $ci->session->userdata('user_id');

            if (!$operator_id) {
                return 0;
            }

            $ci->load->model('chatbox/models/Chatbox_dealer_model');
            return $ci->Chatbox_dealer_model->getCount([
                'operator_id'   => $operator_id,
                'replied'       => 0,
                // 'is_current'    => 0,
            ]);
        }
    }
}

namespace {
    if (!function_exists('new_messages_chatbox')) {
        function new_messages_chatbox($attrs)
        {
            return Pg\modules\chatbox\helpers\newMessagesChatbox($attrs);
        }
    }

    if (!function_exists('send_message_chatbox')) {
        function send_message_chatbox($params)
        {
            return Pg\modules\chatbox\helpers\sendMessageChatbox($params);
        }
    }

    if (!function_exists('initializeOperatorChat')) {
        function initializeOperatorChat($params = [])
        {
            return Pg\modules\chatbox\helpers\initializeOperatorChat($params);
        }
    }

    if (!function_exists('geOperatorsQueueCount')) {
        function geOperatorsQueueCount($params = [])
        {
            return Pg\modules\chatbox\helpers\geOperatorsQueueCount($params);
        }
    }
}
