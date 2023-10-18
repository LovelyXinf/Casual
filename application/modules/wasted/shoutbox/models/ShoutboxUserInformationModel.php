<?php

namespace Pg\modules\shoutbox\models;

use Pg\modules\user_information\models\IUserInformation;
use Pg\modules\user_information\models\traits\YourTrait;

/**
 * Shoutbox user information model
 *
 * @copyright	Copyright (c) 2000-2019
 * 
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class ShoutboxUserInformationModel extends \Model implements IUserInformation
{
    use YourTrait;
    
    /**
     *  Constructor
     *
     *  @return ShoutboxUserInformationModel
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
        
        $this->ci->load->model('Shoutbox_model');        
        $this->ci->view->assign('user', $user);        
        
        $your = $this->ci->Shoutbox_model->getMessages(null, null, null, ['where' => ['id_user' => $user['id']]], null, false);  
        if (!empty($your)) {
            $this->ci->view->assign('your', $your);  
            $result['pages']['shoutbox/your.html'] = $this->ci->view->fetch('user_information/your', 'user', 'shoutbox');
            $pages['shoutbox/your.html'] = l('field_usr_inf_link_your', 'shoutbox');
            $this->ci->view->assign('pages', $pages);        
        }
        
        $this->ci->view->assign('pages', $pages);        
        $result['html'] = $this->ci->view->fetch('user_information/main', 'user', 'shoutbox');
        return $result;
    }

}
