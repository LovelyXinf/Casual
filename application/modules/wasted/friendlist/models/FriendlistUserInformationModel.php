<?php

namespace Pg\modules\friendlist\models;

use Pg\modules\user_information\models\IUserInformation;
use Pg\modules\user_information\models\traits\YourTrait;

/**
 * Friendlist user information model
 *
 * @copyright	Copyright (c) 2000-2019
 * 
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class FriendlistUserInformationModel extends \Model implements IUserInformation
{
    use YourTrait;
    
    /**
     *  Constructor
     *
     *  @return FriendlistUserInformationModel
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
        
        $this->ci->load->model('Friendlist_model');     
        $this->ci->view->assign('user', $user);
        
        $accept_count = $this->ci->Friendlist_model->getListCount($user['id'], 'accept');
        if ($accept_count) {
            $accept = $this->ci->Friendlist_model->getList($user['id'], 'accept');
            $this->ci->view->assign('data', $accept);  
            $result['pages']['friendlist/accept.html'] = $this->ci->view->fetch('user_information/accept', 'user', 'friendlist');
            $pages['friendlist/accept.html'] = l('friendlist', 'friendlist');
        }
        
        $request_out_count = $this->ci->Friendlist_model->getListCount($user['id'], 'request_out');
        if ($request_out_count) {
            $request_out = $this->ci->Friendlist_model->getList($user['id'], 'request_out');
            $this->ci->view->assign('data', $request_out);  
            $result['pages']['friendlist/request_out.html'] = $this->ci->view->fetch('user_information/request_out', 'user', 'friendlist');
            $pages['friendlist/request_out.html'] = l('friends_requests', 'friendlist');
        }
        
        $request_in_count = $this->ci->Friendlist_model->getListCount($user['id'], 'request_in');
        if ($request_in_count) {
            $request_in = $this->ci->Friendlist_model->getList($user['id'], 'request_in');
            $this->ci->view->assign('data', $request_in);  
            $result['pages']['friendlist/request_in.html'] = $this->ci->view->fetch('user_information/request_in', 'user', 'friendlist');
            $pages['friendlist/request_in.html'] = l('friends_invites', 'friendlist');
        }
        
        $this->ci->view->assign('pages', $pages);        
        $result['html'] = $this->ci->view->fetch('user_information/main', 'user', 'friendlist');
        return $result;
    }

}
