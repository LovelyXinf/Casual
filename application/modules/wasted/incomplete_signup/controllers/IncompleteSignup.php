<?php

namespace Pg\modules\incomplete_signup\controllers;

/**
 * Incomplete signup user side controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category	modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 **/
class IncompleteSignup extends \Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ajaxGetRegisterFormData()
    {
        $this->load->model('Incomplete_signup_model');
        $post_data = $this->input->post('data_fields', true);
        if (!empty($post_data['email'])) {
            $validate_data = $this->Incomplete_signup_model->validate($post_data);
            $user = $this->Users_model->getUserByEmail($validate_data['data']['email']);
            if(empty($user)) {
                $unreg_data_id = $this->Incomplete_signup_model->checkEmailExists($validate_data['data']['email']);
                $this->Incomplete_signup_model->saveUnregisteredUser($unreg_data_id, $validate_data['data']);
            }
        }
        exit;
    }
}
