<?php

namespace Pg\modules\mailbox\models;

use Pg\modules\user_information\models\IUserInformation;
use Pg\modules\user_information\models\traits\YourTrait;

/**
 * Comments user information model
 *
 * @copyright	Copyright (c) 2000-2019
 * 
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class MailboxUserInformationModel extends \Model implements IUserInformation
{
    use YourTrait;
    
    /**
     *  Constructor
     *
     *  @return MailboxUserInformationModel
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Return user information
     * 
     * @param array $user
     * 
     * @return array
     */
    public function getUserInformation($user)
    {
        $pages = [];
        $result = [];
        
        $this->ci->load->model('Mailbox_model');        
        $this->ci->view->assign('user', $user);
        $params = ['where' => ['id_user' => $user['id']]];
        $msg_count = $this->ci->Mailbox_model->getMessagesCount($params);
        if ($msg_count) {
            $this->ci->Mailbox_model->setFormatSettings(['get_attaches' => true]);
            $msgs = $this->ci->Mailbox_model->getMessages($params);
            $this->ci->Mailbox_model->setFormatSettings(['get_attaches' => false]);
            $inbox = [];
            $outbox = [];
            $spam = [];
            $trash = [];
            foreach ($msgs as $msg) {
                if ($msg['folder'] == 'inbox') {
                    $inbox[] = $msg;
                } else if ($msg['folder'] == 'outbox') {
                    $outbox[] = $msg;
                } else if ($msg['folder'] == 'spam') {
                    $spam[] = $msg;
                } else if ($msg['folder'] == 'trash') {
                    $trash[] = $msg;
                }
            }

            if (!empty($inbox)) {
                $this->ci->view->assign('inbox', $inbox);  
                foreach ($inbox as $v) {
                    if ($v['attaches_count'] > 0) {
                        foreach ($v['attaches'] as $attach) {
                            $result['files']['mailbox/inbox/' . $attach['filename']] = $attach['path'];
                        }
                    }
                }
                $result['pages']['mailbox/inbox.html'] = $this->ci->view->fetch('user_information/inbox', 'user', 'mailbox');
                $pages['mailbox/inbox.html'] = l('field_usr_inf_link_inbox', 'mailbox');
            }
            if (!empty($outbox)) {
                $this->ci->view->assign('outbox', $outbox);  
                $result['pages']['mailbox/outbox.html'] = $this->ci->view->fetch('user_information/outbox', 'user', 'mailbox');
                $pages['mailbox/outbox.html'] = l('field_usr_inf_link_outbox', 'mailbox');
            }
            if (!empty($spam)) {
                $this->ci->view->assign('spam', $spam);  
                foreach ($spam as $v) {
                    if ($v['attaches_count'] > 0) {
                        foreach ($v['attaches'] as $attach) {
                            $result['files']['mailbox/spam/' . $attach['filename']] = $attach['path'];
                        }
                    }
                }
                $result['pages']['mailbox/spam.html'] = $this->ci->view->fetch('user_information/spam', 'user', 'mailbox');
                $pages['mailbox/spam.html'] = l('field_usr_inf_link_spam', 'mailbox');
            }
            if (!empty($trash)) {
                $this->ci->view->assign('trash', $trash);  
                foreach ($trash as $v) {
                    if ($v['attaches_count'] > 0) {
                        foreach ($v['attaches'] as $attach) {
                            $result['files']['mailbox/trash/' . $attach['filename']] = $attach['path'];
                        }
                    }
                }
                $result['pages']['mailbox/trash.html'] = $this->ci->view->fetch('user_information/trash', 'user', 'mailbox');
                $pages['mailbox/trash.html'] = l('field_usr_inf_link_trash', 'mailbox');
            }            
        }
        
        $this->ci->view->assign('pages', $pages);        
        $result['html'] = $this->ci->view->fetch('user_information/main', 'user', 'mailbox');
        return $result;
    }

}
