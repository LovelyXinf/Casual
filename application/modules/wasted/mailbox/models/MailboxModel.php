<?php

namespace Pg\modules\mailbox\models;

use Pg\libraries\EventDispatcher;
use Pg\modules\mailbox\models\events\EventMailbox;

define('MAILBOX_TABLE', DB_PREFIX . 'mailbox');
define('MAILBOX_ATTACHES_TABLE', DB_PREFIX . 'mailbox_attaches');

/**
 * Mailbox Model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Mikhail Chernov <mchernov@pilotgroup.net>
 *
 * @version $Revision: 2 $ $Date: 2010-04-02 15:07:07 +0300 (Ср, 02 апр 2010) $ $Author: mchernov $
 */
class MailboxModel extends \Model
{

    const MODULE_GID = 'mailbox';

    /**
     * Read service GID
     *
     * @var string
     */
    const READ_SERVICE = 'read_message_service';

    /**
     * Send service GID
     *
     * @var string
     */
    const SEND_SERVICE = 'send_message_service';

    /**
     * Services buy gids
     *
     * @var array
     */
    public $services_buy_gids = [
        'view' => self::READ_SERVICE,
        'write' => self::SEND_SERVICE
    ];

    /**
     * Message data
     *
     * @var array
     */
    private $fields = [
        'id',
        'id_pair',
        'id_reply',
        'id_user',
        'id_from_user',
        'id_to_user',
        'subject',
        'message',
        'is_new',
        'date_add',
        'date_read',
        'date_trash',
        'id_thread',
        'folder',
        'from_folder',
        'from_spam',
        'attaches_count',
    ];

    /**
     * Attaches data
     *
     * @var array
     */
    private $attaches = [
        'id',
        'id_message',
        'filename',
        'filesize',
        'date_add',
    ];

    /**
     * Format settings
     *
     * @var array
     */
    private $format_settings = [
        'use_format'    => true,
        'get_user'      => true,
        'get_sender'    => true,
        'get_recipient' => true,
        'get_message'   => true,
        'get_attaches'  => false,
    ];

    /**
     * Folders
     *
     * @var array
     */
    private $folders = ['inbox', 'outbox', 'drafts', 'trash', 'spam'];

    /**
     * Moderation type
     *
     * @var string
     */
    private $moderation_type = 'mailbox';

    /**
     * Upload file GUID
     *
     * @var string
     */
    private $file_config_id = 'mailbox-attach';

    /**
     * Charset
     *
     * @var string
     */
    public $charset = 'UTF-8';

    /**
     * Max count messages in header alerts
     *
     * @var string
     */
    public $messages_max_count_header = 3;
    
    /**
     * New messages by user id
     * 
     * @var array 
     */
    private $messages_new_by_user_id = [];

    /**
     * Return message by identifier
     *
     * @param integer $message_id message identifier
     *
     * @return array
     */
    public function getMessageById($message_id)
    {
        $params['where']['id'] = $message_id;
        if ($msgs = $this->getMessages($params, null, null)) {
            return $msgs[0];
        } else {
            return array();
        }
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
        if (!empty($data['id_reply']) && empty($data['id_thread'])) {
            $this->set_format_settings('use_format', false);
            $message = $this->get_message_by_id($data['id_reply']);
            $this->set_format_settings('use_format', true);

            if (!$message['id_thread']) {
                $data['id_thread'] = $this->ci->pg_module->get_module_config('mailbox', 'thread_counter') + 1;

                $this->ci->db->where('id', $data['id_reply']);
                $this->ci->db->update(MAILBOX_TABLE, array('id_thread' => $data['id_thread']));

                if ($message['id_pair']) {
                    $this->ci->db->where('id', $message['id_pair']);
                    $this->ci->db->update(MAILBOX_TABLE, array('id_thread' => $data['id_thread']));
                }

                $this->ci->pg_module->set_module_config('mailbox', 'thread_counter', $data['id_thread']);
            }
        }
        if (is_null($message_id)) {
            if (!isset($data['date_add'])) {
                $data['date_add'] = date('Y-m-d H:i:s');
            }
            if (!isset($data['is_new'])) {
                $data['is_new'] = 1;
            }
            $this->ci->db->insert(MAILBOX_TABLE, $data);
            $message_id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $message_id);
            $this->ci->db->update(MAILBOX_TABLE, $data);
        }

        $this->updateFulltextField($message_id);

        return $message_id;
    }

    /**
     * Save attachement data to datasource
     *
     * @param integer $message_id message identifier
     * @param array   $data       attachement data
     *
     * @return integer
     */
    public function saveAttach($attach_id, $data)
    {
        if (is_null($attach_id)) {
            $data['date_add'] = date('Y-m-d H:i:s');
            $this->ci->db->insert(MAILBOX_ATTACHES_TABLE, $data);
            $attach_id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $attach_id);
            $this->ci->db->update(MAILBOX_ATTACHES_TABLE, $data);
        }

        return $attach_id;
    }

    /**
     * Remove attaches from data source
     *
     * @param array   $attach_ids attachements identifiers
     * @param integer $message_id message identifier
     */
    public function deleteAttaches($attach_ids, $message_id)
    {
        $this->ci->db->where_in('id', $attach_ids);
        $result = $this->ci->db->delete(MAILBOX_ATTACHES_TABLE);
        if ($result) {
            $this->dec_attach($message_id, $result);
        }
    }

    /**
     * Remove attach from data source
     *
     * @param array   $attach_id  attachements identifiers
     * @param integer $message_id message identifier
     */
    public function deleteAttach($attach_id, $message_id)
    {
        $this->delete_attaches(array($attach_id), $message_id);
    }

    /**
     * Save message data to datasource
     *
     * @param integer $message_id message identifier
     * @param array   $data       message data
     *
     * @return integer
     */
    public function incAttach($message_id, $count = 1)
    {
        $this->ci->db->set('attaches_count', 'attaches_count + ' . $count, false);
        $this->ci->db->where('id', $message_id);
        $this->ci->db->update(MAILBOX_TABLE);
    }

    /**
     * Save message data to datasource
     *
     * @param integer $message_id message identifier
     * @param array   $data       message data
     *
     * @return integer
     */
    public function decAttach($message_id, $count = 1)
    {
        $this->ci->db->set("attaches_count", 'attaches_count - ' . $count, false);
        $this->ci->db->where("id", $message_id);
        $this->ci->db->update(MAILBOX_TABLE);
    }

    /**
     * Send message
     *
     * @param integer $message_id message identifier
     *
     * @return string
     */
    public function sendMessage($message_id)
    {
        $user_id = $this->ci->session->userdata('user_id');

        $this->ci->load->model('mailbox/models/Mailbox_service_model');
        $mailbox_service = $this->ci->Mailbox_service_model->getServiceByUserService($user_id, self::SEND_SERVICE);
        if (!empty($mailbox_service['service_data']) && $mailbox_service['service_data']['message_count']) {
            --$mailbox_service['service_data']['message_count'];
            $save_data = array('service_data' => $mailbox_service['service_data']);
            $validate_data = $this->ci->Mailbox_service_model->validateService($mailbox_service['id'], $save_data);
            $this->ci->Mailbox_service_model->saveService($mailbox_service['id'], $validate_data['data']);
        } else {
            if  ($mailbox_service['unlimited'] !== true) {
                $return = $this->serviceAvailableSendMessage($user_id);
                if (!$return['available']) {
                    return false;
                }
            }
        }

        $this->setFormatSettings('use_format', false);
        $message = $this->getMessageById($message_id);
        $this->setFormatSettings('use_format', true);

        // Network event
        if ($this->ci->pg_module->is_module_installed('network')) {
            $this->ci->load->model('network/models/Network_events_model');
            $this->ci->Network_events_model->emit('mail', [
                'id_user' => $message['id_user'],
                'id_to'   => $message['id_to_user'],
                'subject' => $message['subject'],
                'message' => $message['message'],
            ]);
        }

        $message['id_pair'] = $message_id;
        $message['id_user'] = $message['id_to_user'];
        $message['is_new'] = 1;
        $message['attaches_count'] = 0;

        $event_handler = EventDispatcher::getInstance();
        $event = new EventMailbox();
        $event->setSendFrom($message['id_from_user']);
        $event->setSendTo($message['id_to_user']);
        $event_handler->dispatch('send', $event);

        if ($this->ci->pg_module->is_module_installed('blacklist')) {
            $this->ci->load->model('Blacklist_model');
            $recipient_blacklist = $this->ci->Blacklist_model->get_list_users_ids($message['id_to_user']);
            if (in_array($user_id, $recipient_blacklist)) {
                $message['folder'] = 'spam';
                $message['from_spam'] = 'inbox';
                $message['notified'] = 0;
            } else {
                $message['folder'] = 'inbox';
                $message['notified'] = 1;
            }
        } else {
            $message['folder'] = 'inbox';
            $message['notified'] = 1;
        }

        unset($message['id']);

        $new_id = $this->saveMessage(null, $message);

        $this->ci->load->model('File_uploads_model');

        $attaches = $this->getAttaches(array($message_id));
        if (!empty($attaches[$message_id])) {
            foreach ($attaches[$message_id] as $attach) {
                $this->upload_attach_exists(null, $attach['path'], $new_id);
            }
        }

        $message = $this->format_message($message);
        $recipient = $this->Users_model->getUserById($message['recipient']['id']);
        $mail_data =[
            'fname'   => $recipient['fname'] ?: $recipient['nickname'],
            'sender'  => $message['sender']['output_name'] ?: $message['sender']['nickname'],
            'subject' => $message['subject'],
            'link_1' => $message['sender']['link'],
            'link_2' => site_url() . 'mailbox/inbox',
            'image' => $message['sender']['media']['user_logo']['thumbs']['middle']
        ];

        $this->ci->load->model('Notifications_model');
        $this->ci->Notifications_model->sendNotification($recipient['email'], 'mailbox_new_message', $mail_data, '', $recipient['lang_id']);

        $this->saveMessage($message_id, array('id_pair' => $new_id, 'folder' => 'outbox', 'notified' => 0));

        return true;
    }

    /**
     * Validate message data
     *
     * @param integer $message_id message identifier
     * @param array   $data       message data
     *
     * @return array
     */
    public function validateMessage($message_id, $data)
    {
        $return = array('errors' => array(), 'data' => array());

        if (isset($data['id_pair'])) {
            $return['data']['id_pair'] = intval($data['id_pair']);
        }

        if (isset($data['id_user'])) {
            $return['data']['id_user'] = intval($data['id_user']);
        } elseif (!$message_id) {
            $return['errors'][] = l('error_empty_user', 'mailbox');
        }

        if (isset($data['id_from_user'])) {
            $return['data']['id_from_user'] = intval($data['id_from_user']);
        }

        if (isset($data['id_to_user'])) {
            $return['data']['id_to_user'] = intval($data['id_to_user']);
            if ($return['data']['id_to_user']) {
                $user_id = $this->ci->session->userdata('user_id');
                if ($return['data']['id_to_user'] == $user_id) {
                    $return['errors'][] = l('error_invalid_recipient', 'mailbox');
                }
            }
        }

        if (isset($data['id_reply'])) {
            $return['data']['id_reply'] = intval($data['id_reply']);
        }

        if (isset($data['subject'])) {
            $return['data']['subject'] = trim(strip_tags($data['subject']));
            if (empty($return['data']['subject'])) {
                $return['errors'][] = l('error_empty_subject', 'mailbox');
            } else {
                $this->ci->load->model('moderation/models/Moderation_badwords_model');
                $bw_count = $this->ci->Moderation_badwords_model->check_badwords($this->moderation_type, $return['data']['subject']);
                if ($bw_count) {
                    $return['errors'][] = l('error_badwords_subject', 'mailbox');
                }
            }
        } elseif (!$message_id) {
            $return['errors'][] = l('error_empty_subject', 'mailbox');
        }

        if (isset($data['message'])) {
            $return['data']['message'] = trim(strip_tags($data['message']));
        }

        if (isset($data['is_new'])) {
            $return['data']['is_new'] = $data['is_new'] ? 1 : 0;
        }

        if (isset($data['date_add'])) {
            $value = strtotime($data['date_add']);
            if ($value > 0) {
                $return['data']['date_add'] = date('Y-m-d', $value);
            } else {
                $return['data']['date_add'] = '0000-00-00 00:00:00';
            }
        }

        if (isset($data['date_read'])) {
            $value = strtotime($data['date_read']);
            if ($value > 0) {
                $return['data']['date_read'] = date('Y-m-d', $value);
            } else {
                $return['data']['date_read'] = '0000-00-00 00:00:00';
            }
        }

        if (isset($data['date_trash'])) {
            $value = strtotime($data['date_trash']);
            if ($value > 0) {
                $return['data']['date_trash'] = date('Y-m-d', $value);
            } else {
                $return['data']['date_trash'] = '0000-00-00 00:00:00';
            }
        }

        if (isset($data['id_thread'])) {
            $return['data']['id_thread'] = intval($data['id_thread']);
        }

        if (isset($data['folder']) && in_array($data['folder'], $this->folders)) {
            $return['data']['folders'] = $data['folder'];
        }

        if (isset($data['from_folder']) && in_array($data['from_folder'], $this->folders)) {
            $return['data']['from_folder'] = $data['from_folder'];
        }

        if (isset($data['from_spam']) && in_array($data['from_spam'], $this->folders)) {
            $return['data']['from_spam'] = $data['from_spam'];
        }

        if (isset($data['search_field'])) {
            $return['data']['search_field'] = trim(strip_tags($data['search_field']));
        }

        return $return;
    }

    /**
     * Validate draft data
     *
     * @param integer $message_id message identifier
     * @param array   $data       message data
     *
     * @return array
     */
    public function validateDraft($message_id, $data)
    {
        $return = array('errors' => array(), 'data' => array());

        if (isset($data['id_pair'])) {
            $return['data']['id_pair'] = intval($data['id_pair']);
        }

        if (isset($data['id_from_user'])) {
            $return['data']['id_from_user'] = intval($data['id_from_user']);
        }

        if (isset($data['id_to_user'])) {
            $return['data']['id_to_user'] = intval($data['id_to_user']);
        }

        if (isset($data['id_user'])) {
            $return['data']['id_user'] = intval($data['id_user']);
            if (isset($return['data']['id_to_user'])) {
                $user_id = $this->ci->session->userdata('user_id');
                if ($return['data']['id_to_user'] == $user_id) {
                    $return['data']['id_to_user'] = 0;
                }
            }
        }

        if (isset($data['id_reply'])) {
            $return['data']['id_reply'] = intval($data['id_reply']);
        }

        if (isset($data['subject'])) {
            $return['data']['subject'] = trim(strip_tags($data['subject']));
        }

        if (isset($data['message'])) {
            $return['data']['message'] = trim($data['message']);
        }

        if (isset($data['date_add'])) {
            $value = strtotime($data['date_add']);
            if ($value > 0) {
                $return['data']['date_add'] = date('Y-m-d', $value);
            } else {
                $return['data']['date_add'] = '0000-00-00 00:00:00';
            }
        }

        if (isset($data['is_new'])) {
            $return['data']['is_new'] = $data['is_new'] ? 1 : 0;
        }

        if (isset($data['id_thread'])) {
            $return['data']['id_thread'] = intval($data['id_thread']);
        }

        if (isset($data['folder']) && in_array($data['folder'], $this->folders)) {
            $return['data']['folder'] = $data['folder'];
        }

        return $return;
    }

    /**
     * Validate send data
     */
    public function validateSend($message_id)
    {
        $return = array('errors' => array(), 'data' => array());

        $message = $this->get_message_by_id($message_id);

        if (empty($message['id_to_user'])) {
            $return['errors'][] = l('error_empty_recipient', 'mailbox');
        } else {
            $this->ci->load->model('Users_model');
            $user = $this->ci->Users_model->get_user_by_id($message['id_to_user']);
            if (empty($user)) {
                $return['errors'][] = l('error_invalid_recipient', 'mailbox');
            }
        }

        $this->ci->load->model('moderation/models/Moderation_badwords_model');

        $message['subject'] = trim(strip_tags($message['subject']));
        if (!empty($message['subject'])) {
            $bw_count = $this->ci->Moderation_badwords_model->check_badwords($this->moderation_type, $message['subject']);
            if ($bw_count) {
                $return['errors'][] = l('error_badwords_message', 'mailbox');
            }
        }

        $message['message'] = trim(strip_tags($message['message']));
        if (empty($message['message'])) {
            $return['errors'][] = l('error_empty_message', 'mailbox');
        } else {
            $bw_count = $this->ci->Moderation_badwords_model->check_badwords($this->moderation_type, $message['message']);
            if ($bw_count) {
                $return['errors'][] = l('error_badwords_message', 'mailbox');
            }
        }

        return $return;
    }

    public function validateMessagesIds($ids)
    {
        return array_unique(array_map('intval', $ids));
    }

    public function deleteMessage($id)
    {
        $this->delete_messages(array($id));
    }

    public function deleteMessages($ids)
    {
        if (is_array($ids) && count($ids)) {
            $this->ci->db->where_in("id", $ids);
            $this->ci->db->delete(MAILBOX_TABLE);
            $this->delete_attaches_by_messages($ids);
        }
    }

    public function deleteAttachesByMessages($ids)
    {
        if (is_array($ids) && count($ids)) {
            $this->ci->db->where_in("id_message", $ids);
            $this->ci->db->delete(MAILBOX_ATTACHES_TABLE);
        }
    }

    /**
     * Remove thread
     *
     * @param integer $thread_id thread identifier
     */
    public function deleteThread($user_id, $thread_id)
    {
        $this->ci->db->where_in("user_id", $user_id);
        $this->ci->db->where_in("thread_id", $thread_id);
        $this->ci->db->delete(MAILBOX_TABLE);
    }

    public function moveMessagesInFolder($ids, $folder = 'trash')
    {
        if (is_array($ids) && count($ids)) {
            $this->ci->db->where_in('id', $ids);
            if ($folder == 'trash') {
                $this->ci->db->set('from_folder', 'folder', false);
                $this->ci->db->set('date_trash', date('Y-m-d H:i:s'));
            }
            if ($folder == 'spam') {
                $this->ci->db->set('from_spam', 'folder', false);
            }
            $this->ci->db->set('folder', $folder);
            $this->ci->db->update(MAILBOX_TABLE);
        }
    }

    public function unmarkSpamMessages($ids)
    {
        if (is_array($ids) && count($ids)) {
            $this->ci->db->where_in('id', $ids);
            $this->ci->db->set('folder', 'from_spam', false);
            $this->ci->db->update(MAILBOX_TABLE);
        }
    }

    public function untrashMessages($ids)
    {
        if (is_array($ids) && count($ids)) {
            $this->ci->db->where_in('id', $ids);
            $this->ci->db->set('folder', 'from_folder', false);
            $this->ci->db->update(MAILBOX_TABLE);
        }
    }

    public function getMessages($params = array(), $page = 1, $items_on_page = 20, $order_by = null, $filter_object_ids = null)
    {
        $objects = array();
        $this->ci->db->select(implode(", ", $this->fields));
        $this->ci->db->from(MAILBOX_TABLE);

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
                if (in_array($field, $this->fields)) {
                    $this->ci->db->order_by($field . " " . $dir);
                }
            }
        }

        if (!is_null($page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        }
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            $objects = $this->formatMessages($results);
        }

        return $objects;
    }
    
    /**
     * New messages
     * 
     * @param integer $user_id
     * @param string $folder
     * 
     * @return array
     */
    public function getNewMessages($user_id, $folder = 'inbox')
    {
        if (!isset($this->messages_new_by_user_id[$id_user][$folder])) {
            $this->messages_new_by_user_id[$id_user][$folder] =  $this->getMessages(array(
                'where' => array(
                    'id_user' => $user_id,
                    'is_new'  => 1,
                    'folder'  => $folder,
                ),
            ), null, null, ['id' => 'DESC']);
        }
        
        return $this->messages_new_by_user_id[$id_user][$folder];
    }

    /**
     * Return number of new messages for user
     *
     * @param integer $id_user user identifier
     *
     * @return integer
     */
    public function getNewMessagesCount($id_user, $folder = 'inbox')
    {
        return count($this->getNewMessages($id_user, $folder));
    }

    /**
     * Return number of messages
     *
     * @param array $params
     *
     * @return array
     */
    public function getMessagesCount($params = array())
    {
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

        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        return $this->ci->db->count_all_results(MAILBOX_TABLE);
    }

    /**
     * Change format settings
     *
     * @param string $name  parameter name
     * @param mixed  $value parameter value
     */
    public function setFormatSettings($name, $value = false)
    {
        if (!is_array($name)) {
            $name = array($name => $value);
        }
        foreach ($name as $key => $item) {
            $this->format_settings[$key] = $item;
        }
    }

    /**
     * Format message data
     *
     * @param array $data
     *
     * @return array
     */
    public function formatMessages($data)
    {
        if (!$this->format_settings['use_format']) {
            return $data;
        }

        if (!$this->ci->pg_module->is_module_installed('file_uploads')) {
            $this->format_settings['get_attaches'] = false;
        }

        $attach_ids = $user_ids = [];

        foreach ($data as $key => $item) {
            //get user
            if ($this->format_settings['get_user']) {
                if (!empty($item['id_user'])) {
                    $user_ids[] = $item['id_user'];
                }
            }
            //get sender
            if ($this->format_settings['get_sender']) {
                if (!empty($item['id_from_user'])) {
                    $user_ids[] = $item['id_from_user'];
                }
            }
            //get recipient
            if ($this->format_settings['get_recipient']) {
                if (!empty($item['id_to_user'])) {
                    $user_ids[] = $item['id_to_user'];
                }
            }

            //get attachements
            if ($this->format_settings['get_attaches']) {
                if ($data[$key]['attaches_count']) {
                    $attach_ids[] = $item['id'];
                }
            }

            //get message
            if ($this->format_settings['get_message']) {
                if (!empty($item['message'])) {
                    $data[$key]['message'] = nl2br($item['message']);
                }
            }

            //get subject
            if (empty($item['subject']) && !empty($item['message']) && function_exists('mb_convert_encoding')) {
                $data[$key]['subject'] = mb_convert_encoding($data[$key]['message'], $this->charset, 'auto');
                $data[$key]['subject'] = strip_tags($data[$key]['subject']);
                $this->ci->load->library('trackback');
                $data[$key]['subject'] = $this->ci->trackback->limit_characters($data[$key]['subject'], 50);
            }
        }

        if (!empty($user_ids)) {
            $this->ci->load->model('Users_model');
            $users = $this->ci->Users_model->getUsersListByKey(null, null, null, [], array_unique($user_ids), true);
            if ($this->format_settings['get_user']) {
                foreach ($data as $key => $message) {
                    if (!$message['id_user']) {
                        continue;
                    }
                    $data[$key]['user'] = (isset($users[$message['id_user']])) ? $users[$message['id_user']] :
                        $this->ci->Users_model->format_default_user($message['id_user'], '', 'mailbox');
                }
            }
            if ($this->format_settings['get_sender']) {
                foreach ($data as $key => $message) {
                    if (!$message['id_from_user']) {
                        continue;
                    }
                    $data[$key]['sender'] = (isset($users[$message['id_from_user']])) ? $users[$message['id_from_user']] :
                        $this->ci->Users_model->format_default_user($message['id_from_user'], '', 'mailbox');
                }
            }
            if ($this->format_settings['get_recipient']) {
                foreach ($data as $key => $message) {
                    if (!$message['id_to_user']) {
                        continue;
                    }
                    $data[$key]['recipient'] = (isset($users[$message['id_to_user']])) ? $users[$message['id_to_user']] :
                        $this->ci->Users_model->format_default_user($message['id_to_user'], '', 'mailbox');
                }
            }
        }

        if (!empty($attach_ids)) {
            //get attachements
            if ($this->format_settings['get_attaches']) {
                $attaches = $this->getAttaches($attach_ids);
                foreach ($data as $key => $message) {
                    $data[$key]['attaches'] = isset($attaches[$message['id']]) ? $attaches[$message['id']] : array();
                }
            }
        }

        return $data;
    }

    /**
     * Format message
     *
     * @param array $data message data
     *
     * @return array
     */
    public function formatMessage($data)
    {
        $return = $this->format_messages(array($data));

        return $return[0];
    }

    public function getSeoSettings($method = '', $lang_id = '')
    {
        if (!empty($method)) {
            return $this->getSeoSettingsInternal($method, $lang_id);
        } else {
            $actions = array('write', 'inbox', 'outbox', 'drafts', 'trash', 'spam', 'index', 'view');
            $return = array();
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
            case 'inbox':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
                break;
            case 'write':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'id' => array('id' => 'numeric'),
                    ),
                    'optional' => array(),
                );
                break;
            case 'outbox':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
                break;
            case 'drafts':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
                break;
            case 'trash':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
                break;
            case 'spam':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
                break;
            case 'view':
                return array(
                    'templates' => array(),
                    'url_vars' => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
                break;
        }
    }

    public function requestSeoRewrite($var_name_from, $var_name_to, $value)
    {
        if ($var_name_from == $var_name_to) {
            return $value;
        }

        show_404();
    }

    public function getSitemapXmlUrls()
    {
        $this->ci->load->helper('seo');
        $return = array();

        return $return;
    }

    public function getSitemapUrls()
    {
        $this->ci->load->helper('seo');
        $auth = $this->ci->session->userdata("auth_type");

        $block[] = array(
            "name"      => l('header_mailbox', 'mailbox'),
            "link"      => rewrite_link('mailbox', 'index'),
            "clickable" => ($auth == "user"),
            "items"     => array(
                array(
                    "name"      => l('header_mailbox_write', 'mailbox'),
                    "link"      => rewrite_link('mailbox', 'write'),
                    "clickable" => ($auth == "user"),
                ),
                array(
                    "name"      => l('header_mailbox_outbox', 'mailbox'),
                    "link"      => rewrite_link('mailbox', 'outbox'),
                    "clickable" => ($auth == "user"),
                ),
                array(
                    "name"      => l('header_mailbox_drafts', 'mailbox'),
                    "link"      => rewrite_link('mailbox', 'drafts'),
                    "clickable" => ($auth == "user"),
                ),
                array(
                    "name"      => l('header_mailbox_trash', 'mailbox'),
                    "link"      => rewrite_link('mailbox', 'trash'),
                    "clickable" => ($auth == "user"),
                ),
                array(
                    "name"      => l('header_mailbox_spam', 'mailbox'),
                    "link"      => rewrite_link('mailbox', 'spam'),
                    "clickable" => ($auth == "user"),
                ),
            ),
        );

        return $block;
    }

    /**
     * Return attachements list
     *
     * @param integer $message_id message identifier
     *
     * @return array
     */
    private function getAttaches($message_ids)
    {
        $this->ci->db->select(implode(", ", $this->attaches));
        $this->ci->db->from(MAILBOX_ATTACHES_TABLE);
        $this->ci->db->where_in('id_message', $message_ids);
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            $this->ci->load->model('File_uploads_model');
            $data = array();
            foreach ($results as $key => $result) {
                $format = $this->ci->File_uploads_model->format_upload($this->file_config_id, $result['id_message'] . '/', $result['filename']);

                $result['path'] = $format['file_path'];
                $result['link'] = $format['file_url'];
                $result['name'] = $result['filename'];
                $result['size'] = $result['filesize'];

                $i = 1;
                while ($result['size'] > 1000) {
                    $result['size'] /= 1024;
                    ++$i;
                }
                $result['size'] = ceil($result['size']) . ' ' . l('text_filesize_' . $i, 'mailbox');
                $data[$result['id_message']][] = $result;
            }

            return $data;
        }

        return array();
    }

    /**
     * Return attachements list
     *
     * @param integer $message_id message identifier
     *
     * @return array
     */
    private function getAttachesCount($message_ids)
    {
        $this->ci->db->select('COUNT(*) AS cnt');
        $this->ci->db->from(MAILBOX_ATTACHES_TABLE);
        $this->ci->db->where_in('id_message', (array) $message_ids);
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return $results[0]['cnt'];
        }

        return array();
    }

    /**
     * Save attachement
     *
     * @param integer $attach_id  attachement identifier
     * @param integer $message_id message identifier
     * @param string  $name       upload name
     *
     * @return void
     */
    public function uploadAttach($attach_id, $filename, $message_id)
    {
        $this->ci->load->model('File_uploads_model');
        $file_return = $this->ci->File_uploads_model->upload($this->file_config_id, $message_id . '/', $filename);
        $format = $this->ci->File_uploads_model->format_upload($this->file_config_id, $message_id . '/', $file_return['file']);
        $save_data['id_message'] = $message_id;
        $save_data['filename'] = $file_return['file'];
        $save_data['filesize'] = filesize($format['file_path']);
        $attach_id = $this->save_attach(null, $save_data);
        $this->inc_attach($message_id);
        $return = $save_data;
        $return['id'] = $attach_id;
        $return['format'] = $format;

        return $return;
    }

    /**
     * Copy attachement
     *
     * @param integer $attach_id  attachement identifier
     * @param integer $message_id message identifier
     * @param string  $name       upload name
     *
     * @return void
     */
    public function uploadAttachExists($attach_id, $filepath, $message_id)
    {
        $this->ci->load->model('File_uploads_model');
        $file_return = $this->ci->File_uploads_model->upload_exist($this->file_config_id, $message_id . '/', $filepath);
        $format = $this->ci->File_uploads_model->format_upload($this->file_config_id, $message_id . '/', $file_return['file']);
        $save_data['id_message'] = $message_id;
        $save_data['filename'] = $file_return['file'];
        $save_data['filesize'] = filesize($format['file_path']);
        $attach_id = $this->save_attach(null, $save_data);
        $this->inc_attach($message_id);
        $return = $save_data;
        $return['id'] = $attach_id;
        $return['format'] = $format;

        return $return;
    }

    /**
     * Validate attachement
     *
     * @param integer $attach_id  attachment identifier
     * @param integer $message_id message identifier
     * @param string  $name       upload name
     *
     * @return array
     */
    public function validateAttach($attach_id, $filename, $message_id)
    {
        $return = array('errors' => array(), 'data' => array());

        $this->ci->load->model('File_uploads_model');

        if ($message_id) {
            $attach_count = $this->getAttachesCount(array($message_id));
        } else {
            $attach_count = 0;
        }

        $validation_upload = $this->ci->File_uploads_model->validate_upload($this->file_config_id, $filename);
        $attach_limit = $this->ci->pg_module->get_module_config('mailbox', 'attach_limit');
        if ($attach_count + 1 > $attach_limit) {
            if (!isset($validation_upload['error']) || empty($validation_upload['error'])) {
                $validation_upload['error'] = array();
            } else {
                $validation_upload['error'] = (array) $validation_upload['error'];
            }
            $validation_upload['error'][] = l('error_max_attaches_reached', 'mailbox');
        }
        if (isset($validation_upload['error']) && !empty($validation_upload['error'])) {
            $return['errors'] = (array) $validation_upload['error'];
        } else {
            $return['data'] = $validation_upload['data'];
        }

        return $return;
    }

    /**
     * Return attachment settings
     *
     * @result array
     */
    public function getAttachSettings()
    {
        $this->ci->load->model('File_uploads_model');
        $file_type_config = $this->ci->File_uploads_model->get_config($this->file_config_id);

        return $file_type_config;
    }

    /**
     * Available access mailbox service
     *
     * @param integer $id_user user identifier
     *
     * @return array
     */
    public function serviceAvailableAccessMailbox($id_user)
    {
        $return['available'] = 0;
        $return['content'] = '';
        $return['content_buy_block'] = false;

        if ($this->ci->pg_module->is_module_installed('services')) {
            $this->ci->load->model('Services_model');
            $services_params = array();
            $services_params['where']['gid'] = 'access_mailbox_service';
            $services_params['where']['status'] = 1;
            $services_count = $this->ci->Services_model->get_service_count($services_params);
            if ($services_count) {
                $return['available'] = 0;
                $return['content_buy_block'] = true;
            } else {
                $return['content'] = l('service_not_found', 'services');
                $return['available'] = 1;
            }
        } else {
            $return['content'] = l('service_not_found', 'services');
            $return['available'] = 1;
        }

        return $return;
    }

    /**
     * Validate access mailbox service
     *
     * @param ineteger $user_id      user identifier
     * @param array    $data         user service data
     * @param array    $service_data service data
     * @param float    $price        service price
     */
    public function serviceValidateAccessMailbox($user_id, $data, $service_data = array(), $price = '')
    {
        $return = array('errors' => array(), 'data' => $data);

        return $return;
    }

    /**
     * Buy access mailbox service
     *
     * @param integer $id_user         user identifier
     * @param float   $price           service price
     * @param array   $service         service data
     * @param array   $template        template data
     * @param integer $user_package_id package identifier
     * @param integer $count           number of services
     */
    public function serviceBuyAccessMailbox($id_user, $price, $service, $template, $payment_data, $users_package_id = 0, $count = 1)
    {
        $this->service_set_access_mailbox($id_user);
    }

    /**
     * Save access mailbox service
     *
     * @param integer $user_id user identifier
     */
    public function serviceSetAccessMailbox($user_id)
    {
        $this->ci->load->model('mailbox/models/Mailbox_service_model');
        $mailbox_service = $this->ci->Mailbox_service_model->get_service_by_user_service($user_id, 'access_mailbox_service');
        if ($mailbox_service) {
            return;
        }
        $save_data = array('id_user' => $user_id, 'gid_service' => 'access_mailbox_service');
        $validate_data = $this->ci->Mailbox_service_model->validate_service($mailbox_service['id'], $save_data);
        $this->ci->Mailbox_service_model->save_service($mailbox_service['id'], $validate_data['data']);
    }

    /**
     * Available read message service
     *
     * @param integer $id_user user identifier
     *
     * @return array
     */
    public function serviceAvailableReadMessage($id_user)
    {
        $return = [
            'available' => 0,
            'content' => '',
            'content_buy_block' => false
        ];
        if ($this->ci->pg_module->is_module_installed('services')) {
            $this->ci->load->model('Services_model');
            $services_count = $this->ci->Services_model->getServiceCount([
                'where' => [
                    'gid' => self::READ_SERVICE,
                    'status' => 1
                ]
            ]);
            if ($services_count) {
                $return['available'] = 0;
                $return['content_buy_block'] = true;
            } else {
                $return['content'] = l('service_not_found', 'services');
                $return['available'] = 1;
            }
        } else {
            $return['content'] = l('service_not_found', 'services');
            $return['available'] = 1;
        }

        return $return;
    }

    /**
     * Validate read message service
     *
     * @param ineteger $user_id      user identifier
     * @param array    $data         user service data
     *
     * @return array
     */
    public function serviceValidateReadMessage($user_id, $data)
    {
        return ['errors' => [], 'data' => $data];
    }

    /**
     * Buy read message service
     *
     * @param integer $id_user         user identifier
     * @param float   $price           service price
     * @param array   $service         service data
     * @param array   $template        template data
     * @param integer $user_package_id package identifier
     * @param integer $count           number of services
     */
    public function serviceBuyReadMessage($id_user, $price, $service, $template, $payment_data, $users_package_id = 0, $count = 1)
    {
        $service_data = array(
            'id_user'             => $id_user,
            'service_gid'         => $service['gid'],
            'template_gid'        => $template['gid'],
            'service'             => $service,
            'template'            => $template,
            'payment_data'        => $payment_data,
            'id_users_package'    => $users_package_id,
            'id_users_membership' => !empty($payment_data['id_users_membership']) ? (int) $payment_data['id_users_membership'] : 0,
            'status'              => 1,
            'count'               => $count,
        );
        $this->ci->load->model('services/models/Services_users_model');

        return $this->ci->Services_users_model->save_service(null, $service_data);
    }

    /**
     * Activate read message service
     *
     * @param integer $id_user         user identifier
     * @param integer $id_user_service user service identifier
     * @param integer $message_id      message identifier
     */
    public function serviceActivateReadMessage($id_user, $id_user_service)
    {
        $id_user_session = $this->ci->session->userdata('user_id');
        $id_user_service = intval($id_user_service);
        $return = array('status' => 0, 'message' => '');

        $this->ci->load->model('services/models/Services_users_model');
        $user_service = $this->ci->Services_users_model->get_user_service_by_id($id_user_session, $id_user_service);
        if ($id_user_session != $id_user || empty($user_service) || !$user_service["status"] || $user_service['count'] < 1) {
            $return['status'] = 0;
            $return['message'] = l('error_service_activating', 'services');
        } else {
            $this->service_set_read_message($id_user, $user_service['service']['data_admin']['message_count']);
            --$user_service['count'];
            if ($user_service['count'] < 1) {
                $user_service['status'] = 0;
            }
            $this->ci->Services_users_model->save_service($id_user_service, $user_service);
            $return['status'] = 1;
            $return['message'] = l('success_service_activating', 'services');

            // send notification
            $this->ci->load->model('Users_model');
            $user = $this->ci->Users_model->get_user_by_id($id_user_session);

            $mail_data = array(
                'fname' => $user['fname'],
                'sname' => $user['sname'],
                'name'  => l('service_string_name_read_message', 'mailbox'),
            );
        }

        return $return;
    }

    /**
     * Save read message service
     *
     * @param integer $user_id user identifier
     */
    public function serviceSetReadMessage($user_id, $message_count)
    {
        $this->ci->load->model('mailbox/models/Mailbox_service_model');

        $mailbox_service = $this->ci->Mailbox_service_model->get_service_by_user_service($user_id, self::READ_SERVICE);
        if (!empty($mailbox_service['service_data']) && isset($mailbox_service['service_data']['message_count'])) {
            $save_data = array('service_data' => $mailbox_service['service_data']);
            $save_data['service_data']['message_count'] += $message_count;
        } else {
            $save_data = array('id_user' => $user_id, 'gid_service' => self::READ_SERVICE);
            $save_data['service_data'] = array('message_count' => $message_count);
        }
        $mailbox_service_id = isset($mailbox_service['id']) ? $mailbox_service['id'] : null;
        $validate_data = $this->ci->Mailbox_service_model->validate_service($mailbox_service_id, $save_data);
        $this->ci->Mailbox_service_model->save_service($mailbox_service_id, $validate_data['data']);
    }

    /**
     * Check availability of send message service
     *
     * @param integer $id_user user identifier
     *
     * @return array
     */
    public function serviceAvailableSendMessage($id_user)
    {
        $return['available'] = 0;
        $return['content'] = '';
        $return['content_buy_block'] = false;

        if ($this->ci->pg_module->is_module_installed('services')) {
            $this->ci->load->model('Services_model');
            $services_params = array();
            $services_params['where']['gid'] = self::SEND_SERVICE;
            $services_params['where']['status'] = 1;
            $services_count = $this->ci->Services_model->get_service_count($services_params);
            if ($services_count) {
                $return['available'] = 0;
                $return['content_buy_block'] = true;
            } else {
                $return['content'] = l('service_not_found', 'services');
                $return['available'] = 1;
            }
        } else {
            $return['content'] = l('service_not_found', 'services');
            $return['available'] = 1;
        }

        return $return;
    }

    /**
     * Validate send message service
     *
     * @param integer $user_id      user identifier
     * @param array   $data         user data
     * @param array   $service_data service data
     * @param float   $price        service price
     *
     * @return array
     */
    public function serviceValidateSendMessage($user_id, $data, $service_data = array(), $price = '')
    {
        $return = array('errors' => array(), 'data' => $data);

        return $return;
    }

    /**
     * Buy send message service
     *
     * @param integer $id_user         user identifier
     * @param array   $service         service data
     * @param array   $template        template data
     * @param array   $payment_data    user payment data
     * @param integer $user_package_id package identifier
     *
     * @return integer
     */
    public function serviceBuySendMessage($id_user, $price, $service, $template, $payment_data, $users_package_id = 0, $count = 1)
    {
        $service_data = array(
            'id_user'             => $id_user,
            'service_gid'         => $service['gid'],
            'template_gid'        => $template['gid'],
            'service'             => $service,
            'template'            => $template,
            'payment_data'        => $payment_data,
            'id_users_package'    => $users_package_id,
            'id_users_membership' => !empty($payment_data['id_users_membership']) ? (int) $payment_data['id_users_membership'] : 0,
            'status'              => 1,
            'count'               => $count,
        );
        $this->ci->load->model('services/models/Services_users_model');

        return $this->ci->Services_users_model->save_service(null, $service_data);
    }

    /**
     * Activate send message service
     *
     * @param integer $id_user         user identifier
     * @param integer $id_user_service user service identifier
     *
     * @return array
     */
    public function serviceActivateSendMessage($id_user, $id_user_service)
    {
        $id_user_session = $this->ci->session->userdata('user_id');
        $id_user_service = intval($id_user_service);
        $return = array('status' => 0, 'message' => '');

        $this->ci->load->model('services/models/Services_users_model');
        $user_service = $this->ci->Services_users_model->get_user_service_by_id($id_user_session, $id_user_service);
        if ($id_user_session != $id_user || empty($user_service) || !$user_service["status"] || $user_service['count'] < 1) {
            $return['status'] = 0;
            $return['message'] = l('error_service_activating', 'services');
        } else {
            $this->service_set_send_message($id_user, $user_service['service']['data_admin']['message_count']);
            --$user_service['count'];
            if ($user_service['count'] < 1) {
                $user_service["status"] = 0;
            }
            $this->ci->Services_users_model->save_service($id_user_service, $user_service);
            $return['status'] = 1;
            $return['message'] = l('success_service_activating', 'services');

            // send notification
            $this->ci->load->model('Users_model');
            $user = $this->ci->Users_model->get_user_by_id($id_user_session);

            $mail_data = array(
                'fname' => $user['fname'],
                'sname' => $user['sname'],
                'name'  => l('service_string_name_send_message', 'mailbox'),
            );
        }

        return $return;
    }

    /**
     * Save send message service
     *
     * @param integer $user_id user identifier
     * @paran integer $message_count number of available actions
     */
    public function serviceSetSendMessage($user_id, $message_count)
    {
        $this->ci->load->model('mailbox/models/Mailbox_service_model');

        $mailbox_service = $this->ci->Mailbox_service_model->get_service_by_user_service($user_id, self::SEND_SERVICE);
        if (!empty($mailbox_service['service_data']) && isset($mailbox_service['service_data']['message_count'])) {
            $save_data = ['service_data' => $mailbox_service['service_data']];
            $save_data['service_data']['message_count'] += $message_count;
        } else {
            $save_data = ['id_user' => $user_id, 'gid_service' => self::SEND_SERVICE];
            $save_data['service_data'] = ['message_count' => $message_count];
            $mailbox_service['id'] = null;
        }

        $validate_data = $this->ci->Mailbox_service_model->validate_service($mailbox_service['id'], $save_data);
        $this->ci->Mailbox_service_model->save_service($mailbox_service['id'], $validate_data['data']);
    }

    /**
     * Save write count message service
     *
     * @param integer $user_id user identifier
     * @paran integer $message_count number of available actions
     */
    public function setWriteCount($user_id, $message_count)
    {
        if (!$message_count) {
            $this->ci->load->model('mailbox/models/Mailbox_service_model');
            return $this->ci->Mailbox_service_model->removeService($user_id, self::SEND_SERVICE);
        }
        return $this->serviceSetSendMessage($user_id, $message_count);
    }

    /**
     * Save view count message service
     *
     * @param integer $user_id user identifier
     * @paran integer $message_count number of available actions
     */
    public function setViewCount($user_id, $message_count)
    {
        if (!$message_count) {
            $this->ci->load->model('mailbox/models/Mailbox_service_model');
            return $this->ci->Mailbox_service_model->removeService($user_id, self::READ_SERVICE);
        }
        return $this->serviceSetReadMessage($user_id, $message_count);
    }

    /**
     * Return backend notifications
     */
    public function backendGetRequestNotifications()
    {
        $user_id = $this->ci->session->userdata('user_id');        
        $messages = $this->getNewMessages($user_id, 'inbox');
        $this->ci->load->helper('seo_helper');        
        $result = array('notifications' => array(), 'inbox_new_message' => 0);        
        foreach ($messages as $message) {
            if ($message['notified'] == 1) {
                $link = site_url() . 'mailbox/view/' . $message['id'];
                $result['notifications'][] = array(
                    'title' => l('notify_title', 'mailbox'),
                    'text'      => str_replace('[sender]', $message['sender']['output_name'], l('notify_text', 'mailbox')),
                    'id'        => $message['id'],
                    'comment'   => '',
                    'user_id'   => $message['user']['id'],
                    'user_name' => $message['sender']['output_name'],
                    'user_icon' => $message['sender']['media']['user_logo']['thumbs']['small'],
                    'user_link' => $link,
                    'more'      => '<a href="' . $link . '">' . l('link_message_show', 'mailbox') . '</a>',
                );
            }
        }
        $this->ci->db->set('notified', '0')->where($params['where'])->update(MAILBOX_TABLE);
        $result['inbox_new_message'] = count($messages);
        
        $this->ci->view->assign('messages', array_slice($messages, 0, $this->messages_max_count_header));
       
        $result['new_message_alert_html'] = $this->ci->view->fetch('new_messages_header', 'user', 'mailbox');
        $result['max_messages_count'] = $this->messages_max_count_header;

        return $result;
    }

    /**
     * Clear trash
     */
    public function mailboxTrashCron()
    {
        $trash_period = intval($this->ci->pg_module->get_module_config('mailbox', 'trash_period'));
        $params = array();
        $params['where']['folder'] = 'trash';
        $params['where_sql'][] = 'DATE_ADD(date_trash, INTERVAL ' . $trash_period . ' DAY) < ' . $this->ci->db->escape(date('Y-m-d H:i:s'));
        $this->set_format_settings('use_format', false);
        $results = $this->get_messages($params, null, null);
        $this->set_format_settings('use_format', true);
        if (empty($results)) {
            return;
        }
        foreach ($results as $i => $result) {
            $results[$i] = $result['id'];
        }
        $this->delete_messages($results);
    }

    /**
     * Update data of fulltext search
     *
     * @param integer $message_id message identifier
     */
    private function updateFulltextField($message_id)
    {
        $all_langs = $this->ci->pg_language->return_langs();
        $default_lang = $this->ci->pg_language->get_default_lang_id();
        $message = $this->getMessageById($message_id);
        $current_lang = $return['object_lang_id'] = $message['user']['lang_id'];
        $langs[$current_lang] = $all_langs[$current_lang];
        if ($current_lang != $default_lang) {
            $langs[$default_lang] = $all_langs[$default_lang];
        };

        $hide_user_names = $this->ci->pg_module->get_module_config('users', 'hide_user_names');

        if ($message['folder'] == 'inbox' || $message['folder'] == 'spam') {
            $content = $message['sender']['output_name'];
            if (!$hide_user_names) {
                $content = $message['sender']['nickname'] . ' ' . $content;
            }
        } else {
            $content = $message['recipient']['output_name'];
            if (!$hide_user_names) {
                $content = $message['recipient']['nickname'] . ' ' . $content;
            }
        }

        $content .= ' ' . $message['subject'];

        $validate_data = $this->validate_message($message_id, array('search_field' => $content));
        if (!empty($validate_data['errors'])) {
            return '';
        }
        $this->ci->db->where('id', $message_id);
        $this->ci->db->update(MAILBOX_TABLE, $validate_data['data']);
    }

    /**
     * Return criteria of fulltext search
     *
     * @param string $text search keyword
     * @param string $mode search mode
     */
     public function returnFulltextCriteria($text, $mode = null)
    {
        $arr_text = explode(" ", $text);
        $word_count = count($arr_text);
        $search = ($word_count < 2 ? $text . "*" : $text);
        $escape_text = $this->ci->db->escape($search);
        $search_mode = ($mode && $word_count < 2 ? " IN " . $mode : "");
        return [
            'field'     => "MATCH (search_field) AGAINST (" . $escape_text . ") AS fields",
            'where_sql' => "MATCH (search_field) AGAINST (" . $escape_text . $search_mode . ")"
        ];
    }

    /**
     * Check messages owner is user
     *
     * @param $message_ids set of messages
     * @param integer $user_id user identifier
     */
    public function isUserMessages($message_ids, $user_id)
    {
        if (empty($message_ids)) {
            return true;
        }
        $this->ci->db->select('COUNT(*) AS cnt')
            ->where_in('id', (array) $message_ids)
            ->where('id_user', $user_id);
        return $this->ci->db->count_all_results(MAILBOX_TABLE) == count((array) $message_ids);
    }

    /**
     * Availables banners places (callback method)
     *
     * @return array
     */
    public function bannerAvailablePages()
    {
        return [
            ['link' => 'mailbox/inbox', 'name' => l('header_mailbox_inbox', 'mailbox')],
            ['link' => 'mailbox/outbox', 'name' => l('header_mailbox_outbox', 'mailbox')],
            ['link' => 'mailbox/drafts', 'name' => l('header_mailbox_drafts', 'mailbox')],
            ['link' => 'mailbox/spam', 'name' => l('header_mailbox_spam', 'mailbox')],
            ['link' => 'mailbox/trash', 'name' => l('header_mailbox_trash', 'mailbox')],
            ['link' => 'mailbox/write', 'name' => l('header_mailbox_write', 'mailbox')],
            ['link' => 'mailbox/write', 'name' => l('header_mailbox_write', 'mailbox')],
            ['link' => 'mailbox/view', 'name' => l('header_mailbox_view', 'mailbox')]
        ];
    }

    /**
     * Get message from network
     *
     * @param array $data mail data
     *
     * @return integer
     */
    public function handlerMail($data)
    {
        $message_data = [
            'id_user'      => $data['id_to'],
            'id_from_user' => $data['id_user'],
            'id_to_user'   => $data['id_user'],
            'subject'      => $data['subject'],
            'message'      => $data['message'],
            'is_new' => 1,
            'folder' => 'inbox',
        ];

        return $this->sendMessage($this->saveMessage(null, $message_data));
    }

    /**
     *  Module category action
     *
     *  @return array
     */
    public function moduleCategoryAction()
    {
        $action = array(
            'name'   => l('btn_send', 'mailbox'),
            'helper' => 'send_message_button',
        );

        return $action;
    }

    public function __call($name, $args)
    {
        $methods = [
            '_banner_available_pages' => 'bannerAvailablePages',
            'get_seo_settings' => 'getSeoSettings',
            'backend_get_request_notifications' => 'backendGetRequestNotifications',
            'dec_attach' => 'decAttach',
            'delete_attach' => 'deleteAttach',
            'delete_attaches' => 'deleteAttaches',
            'delete_attaches_by_messages' => 'deleteAttachesByMessages',
            'delete_message' => 'deleteMessage',
            'delete_messages' => 'deleteMessages',
            'delete_thread' => 'deleteThread',
            'format_message' => 'formatMessage',
            'format_messages' => 'formatMessages',
            'get_attach_settings' => 'getAttachSettings',
            'get_message_by_id' => 'getMessageById',
            'get_messages' => 'getMessages',
            'get_messages_count' => 'getMessagesCount',
            'get_new_messages_count' => 'getNewMessagesCount',
            'get_sitemap_urls' => 'getSitemapUrls',
            'get_sitemap_xml_urls' => 'getSitemapXmlUrls',
            'handler_mail' => 'handlerMail',
            'inc_attach' => 'incAttach',
            'is_user_messages' => 'isUserMessages',
            'mailbox_trash_cron' => 'mailboxTrashCron',
            'move_messages_in_folder' => 'moveMessagesInFolder',
            'request_seo_rewrite' => 'requestSeoRewrite',
            'return_fulltext_criteria' => 'returnFulltextCriteria',
            'save_attach' => 'saveAttach',
            'save_message' => 'saveMessage',
            'send_message' => 'sendMessage',
            'service_activate_read_message' => 'serviceActivateReadMessage',
            'service_activate_send_message' => 'serviceActivateSendMessage',
            'service_available_access_mailbox' => 'serviceAvailableAccessMailbox',
            'service_available_read_message' => 'serviceAvailableReadMessage',
            'service_available_send_message' => 'serviceAvailableSendMessage',
            'service_buy_access_mailbox' => 'serviceBuyAccessMailbox',
            'service_buy_read_message' => 'serviceBuyReadMessage',
            'service_buy_send_message' => 'serviceBuySendMessage',
            'service_set_access_mailbox' => 'serviceSetAccessMailbox',
            'service_set_read_message' => 'serviceSetReadMessage',
            'service_set_send_message' => 'serviceSetSendMessage',
            'service_validate_access_mailbox' => 'serviceValidateAccessMailbox',
            'service_validate_read_message' => 'serviceValidateReadMessage',
            'service_validate_send_message' => 'serviceValidateSendMessage',
            'set_format_settings' => 'setFormatSettings',
            'unmark_spam_messages' => 'unmarkSpamMessages',
            'untrash_messages' => 'untrashMessages',
            'upload_attach' => 'uploadAttach',
            'upload_attach_exists' => 'uploadAttachExists',
            'validate_attach' => 'validateAttach',
            'validate_draft' => 'validateDraft',
            'validate_message' => 'validateMessage',
            'validate_messages_ids' => 'validateMessagesIds',
            'validate_send' => 'validateSend',
            'validate_service' => 'validateService',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $name);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
