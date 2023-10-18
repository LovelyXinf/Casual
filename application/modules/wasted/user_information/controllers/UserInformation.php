<?php

/**
 * user_information module
 *
 * @package	PG_Dating
 * @copyright	Copyright (c) 2000-2019 PG Dating Pro - php dating software
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */

use Pg\modules\user_information\models\UserInformationModel;

/**
 * UserInformation user side controller
 *
 * @package	PG_Dating
 * @subpackage	user_information
 * @category	controllers
 * @copyright	Copyright (c) 2000-2019 PG Dating Pro - php dating software
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */

class UserInformation extends \Controller
{

    /**
     * Controller
     *
     * @return UserInformation
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_information_model');
    }
    
    /**
     * Create archive user information
     * 
     * @return mixed
     */
    public function create()
    {
        $return = [];
        if ($this->input->post('create')) {
            $modules = $this->input->post('modules', true);
            $return = $this->User_information_model->create($modules);
        }
        $this->view->assign($return);
        $this->view->render();
    }
    
    /**
     * Delete archive user information
     * 
     * @return void
     */
    public function delete()
    {
        $return = [];
        if ($this->input->post('delete')) {
            $return = $this->User_information_model->delete();
        }
        $this->view->assign($return);
        $this->view->render();
    }
    
    /**
     * Download user information
     * 
     * @return void
     */
    public function download()
    {
        $archive_data = $this->User_information_model->getArchive($this->session->userdata('user_id'));
        $this->load->model('Uploads_model');
        $file = $this->Uploads_model->getMediaPath(UserInformationModel::MODULE_GID, 
            UserInformationModel::secretPath($archive_data)) . 
            UserInformationModel::nameArchive($this->session->userdata('nickname'));
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }    
}