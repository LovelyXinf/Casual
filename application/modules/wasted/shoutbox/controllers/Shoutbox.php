<?php

namespace Pg\modules\shoutbox\controllers;

/**
 * Shoutbox controller
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
 **/
class Shoutbox extends \Controller
{
    protected $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id = intval($this->session->userdata('user_id'));
        $this->load->model('Shoutbox_model');
    }

    protected function checkNewMessages()
    {
        $result = $this->Shoutbox_model->checkNewMessages(0);

        return $result;
    }

    private function getMessages($type = '')
    {
        $from_id = intval($this->input->get_post('max_id', true));
        if (!$from_id) {
            $to_id = intval($this->input->get_post('min_id', true));
            if ($to_id) {
                $result['msg'] = $this->Shoutbox_model->getOldMessages();
            } else {
                $result['msg'] = $this->Shoutbox_model->getMessages();
            }
        } else {
            $result['msg'] = $this->Shoutbox_model->getNewMessages();
        }

        $result['min_id'] = $result['max_id'] = 0;
        foreach ($result['msg'] as $msg) {
            if (intval($msg['id']) > $result['max_id']) {
                $result['max_id'] = intval($msg['id']);
            }
            if (intval($msg['id']) < $result['min_id'] || !$result['min_id']) {
                $result['min_id'] = intval($msg['id']);
            }
        }

        return $result;
    }

    protected function postMessage()
    {
        $result = array();
        $text = trim(strip_tags($this->input->post('text', true)));
        $result = array_merge_recursive($this->Shoutbox_model->addMessage($text), $result);
        $result["messages"] = $this->getMessages();

        return $result;
    }

    public function ajaxCheckNewMessages()
    {
        $this->view->assign($this->checkNewMessages());
        $this->view->render();
    }

    public function ajaxGetMessages()
    {
        $this->view->assign($this->getMessages());
        $this->view->render();
    }

    public function ajaxPostMessage()
    {
        $this->view->assign($this->postMessage());
        $this->view->render();
    }
}
