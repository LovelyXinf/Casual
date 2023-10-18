<?php

namespace Pg\modules\favourites\models;

use Pg\modules\user_information\models\IUserInformation;
use Pg\modules\user_information\models\traits\YourTrait;

/**
 * Favourites user information model
 *
 * @copyright	Copyright (c) 2000-2019
 * 
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class FavouritesUserInformationModel extends \Model implements IUserInformation
{
    use YourTrait;
    
    /**
     *  Constructor
     *
     *  @return FavouritesUserInformationModel
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
        
        $this->ci->load->model('Favourites_model');        
        $this->ci->view->assign('user', $user);
        
        $your_count = $this->ci->Favourites_model->getListCount($user['id'], null, 0);
        if ($your_count) {
            $your = $this->ci->Favourites_model->getList($user['id'], null, null, null, null, true, 0);
            $this->ci->view->assign('your', $your);  
            $result['pages']['favourites/your.html'] = $this->ci->view->fetch('user_information/your', 'user', 'favourites');
            $pages['favourites/your.html'] = l('field_usr_inf_link_your', 'favourites');
        }
        
        $about_you_count = $this->ci->Favourites_model->getListCount($user['id'], null, 1);
        if ($about_you_count) {
            $about_you = $this->ci->Favourites_model->getList($user['id'], null, null, null, null, true, 1);
            $this->ci->view->assign('about_you', $about_you);  
            $result['pages']['favourites/about_you.html'] = $this->ci->view->fetch('user_information/about_you', 'user', 'favourites');
            $pages['favourites/about_you.html'] = l('field_usr_inf_link_about_you', 'favourites');
        }
        
        
        $this->ci->view->assign('pages', $pages);        
        $result['html'] = $this->ci->view->fetch('user_information/main', 'user', 'favourites');
        return $result;
    }

}
