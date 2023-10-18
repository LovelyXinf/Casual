<?php

namespace Pg\modules\mailbox\helpers {

    if (!function_exists('newMessages')) {
        function newMessages($attrs)
        {
            $ci = &get_instance();
            if ('user' != $ci->session->userdata("auth_type")) {
                return false;
            }
            $user_id = $ci->session->userdata("user_id");
            if (!$user_id) {
                log_message('Empty user id');

                return false;
            }
            if (empty($attrs['template'])) {
                $attrs['template'] = 'header';
            }
            $ci->load->model('Mailbox_model');
            $ci->Mailbox_model->set_format_settings('get_sender', true);

            $messages = $ci->Mailbox_model->getNewMessages($user_id, 'inbox');

            $ci->view->assign('messages', array_slice($messages, 0, $ci->MailboxModel->messages_max_count_header));
            $ci->view->assign('messages_count', count($messages));
            
            $ci->view->assign('messages_max_count', $ci->Mailbox_model->messages_max_count_header);
            
            return $ci->view->fetch('helper_new_messages_' . $attrs['template'], 'user', 'mailbox');
        }
    }

    if (!function_exists('sendMessageButton')) {

        /**
         * Return new message button
         *
         * @param array $params
         *
         * @return string
         */
        function sendMessageButton($params)
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

            $add_class = isset($params['class']) ? $params['class'] : '';
            $ci->view->assign('add_class', $add_class);
            if (empty($params['view_type'])) {
                $params['view_type'] = 'button';
            }

            switch ($params['view_type']) {
                case 'link':
                    return $ci->view->fetch('helper_message_link', 'user', 'mailbox');
                    break;

                case 'icon':
                    return $ci->view->fetch('helper_message_icon', 'user', 'mailbox');
                    break;

                case 'button':
                default:
                    $type = (!empty($params['type'])) ? trim(strip_tags($params['type'])) . '_' : '';

                    return $ci->view->fetch('helper_' . $type . 'message_button', 'user', 'mailbox');
                    break;
            }
        }
    }
    if (!function_exists('statisticsMsgs')) {
        /**
         * Statistics users messages
         * 
         * @return mixed
         */
        function statisticsMsgs()
        {
            $ci = &get_instance();
            $ci->load->model('Mailbox_model');
            
            $before = $ci->Mailbox_model->getMessagesCount(['where' => [
                'folder' => 'outbox',
                'date_add >=' => date('Y-m-d H:i:s', strtotime('-2 days')),
                'date_add <' => date('Y-m-d H:i:s', strtotime('-1 days'))
            ]]);
            $now = $ci->Mailbox_model->getMessagesCount(['where' => [
                'folder' => 'outbox',
                'date_add >=' => date('Y-m-d H:i:s', strtotime('-1 days'))
            ]]);
            
            $per_sent = round(($before > 0 ? ($now - $before)/$before : $now) * 100, 2);
            $ci->view->assign('sent_data', [
                'before' => $before,
                'now' => $now,
                'per' => $per_sent
            ]);
            return $ci->view->fetch('helper_statistics_msgs', 'admin', 'mailbox');
        }
    }
}

namespace {
    
    if (!function_exists('new_messages')) {
        function new_messages($attrs)
        {
            return Pg\modules\mailbox\helpers\newMessages($attrs);
        }
    }

    if (!function_exists('send_message_button')) {

        /**
         * Return new message button
         *
         * @param array $params
         *
         * @return string
         */
        function send_message_button($params)
        {
            return Pg\modules\mailbox\helpers\sendMessageButton($params);
        }
    }
    if (!function_exists('statisticsMsgs')) {
        function statisticsMsgs()
        {
            return Pg\modules\mailbox\helpers\statisticsMsgs();
        }
    }
    
}
