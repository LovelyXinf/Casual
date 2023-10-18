<?php

namespace Pg\modules\favourites\controllers;

/**
 * Users lists API controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category	modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * */
class ApiFavourites extends \Controller
{
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Favourites_model');
        if ('user' === $this->session->userdata('auth_type')) {
            $this->user_id = intval($this->session->userdata('user_id'));
        }
    }

    public function index()
    {
        $this->favourites();
    }

    /**
    * @api {post} /favourites/favourites Get favourites page
    * @apiGroup Favourites
    * @apiParam {boolean} formatted  for return formated data
    * @apiParam {int} page  page count
    * @apiParam {string} action  action
    */
    public function favourites()
    {
        $action = trim(strip_tags($this->input->post('action', true)));
        if (!$action) {
            $action = 'view';
        }

        $items_count = $this->Favourites_model->getListCount($this->user_id);

        if ($items_count) {
            $formatted = filter_input(INPUT_POST, 'formatted', FILTER_VALIDATE_BOOLEAN);
            $items_on_page = $this->pg_module->get_module_config('users', 'items_per_page');
            $this->load->helper('sort_order');
            $page = get_exists_page_number(filter_input(INPUT_POST, 'page', FILTER_VALIDATE_INT), $items_count, $items_on_page);
            $list = $this->Favourites_model->getList($this->user_id, $page, $items_on_page, array('date_update' => 'DESC'), '', $formatted);
            $this->set_api_content('data', $list);
            
        }
        
    }

    /**
    * @api {post} /favourites/count Get count favourites
    * @apiGroup Favourites
    */
    public function count()
    {
        $count = $this->Favourites_model->get_list_count($this->user_id);
        $this->set_api_content('data', $count);
    }

    /**
    * @api {post} /favourites/add Add in favourites
    * @apiGroup Favourites
    * @apiParam {int} id_dest_user id user
    */
    public function add()
    {
        $id_dest_user = intval($this->input->post('id_dest_user'));
        $this->Favourites_model->add($this->user_id, intval($id_dest_user));
        $data['success'] = l('success_favourites_add', 'favourites');
        $this->set_api_content('data', $data);
    }

    /**
    * @api {post} /favourites/remove Remove from favourites
    * @apiGroup Favourites
    * @apiParam {int} id_dest_user id user
    */
    public function remove($id_dest_user)
    {
        $data = [];
        
        $id_user = $this->session->userdata('user_id');
        
        if ($id_dest_user) {
            $this->Favourites_model->remove($id_user, intval($id_dest_user));
            $data['success'] = l('success_favourites_remove', 'favourites');
        } else {
            $id_dest_user = $this->input->post('id_dest_user', true);
            if (!empty($id_dest_user)) {
                foreach ((array)$id_dest_user as $id) {
                    $this->Favourites_model->remove($id_user, $id);
                }
                $data['success'] = l('success_favourites_remove', 'favourites');
            }
        }
        
        $this->set_api_content('data', $data);
    }

    /**
    * @api {post} /favourites/get_status Get status user from favourites
    * @apiGroup Favourites
    * @apiParam {int} id_dest_user id user
    */
    public function get_status($id_dest_user)
    {
        $user_id = $this->session->userdata('user_id');
        
        // TODO: проверять в базе а не перебором
        if (in_array($id_dest_user, $this->Favourites_model->get_list_users_ids($user_id))) {
            $status = 1;
        } else {
            $status = 0;
        }
        
        $this->set_api_content('status', $status);
    }
}
