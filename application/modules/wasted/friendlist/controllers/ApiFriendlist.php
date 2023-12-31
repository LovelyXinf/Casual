<?php

namespace Pg\modules\friendlist\controllers;

/**
 * Friendlist API controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category	modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * */
class ApiFriendlist extends \Controller
{
    private $list_types = array(
        'friendlist'       => 'accept',
        'friends_requests' => 'request_in',
        'friends_invites'  => 'request_out',
    );
    private $list_methods;
    private $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Friendlist_model');
        foreach ($this->list_types as $method => $type) {
            $this->list_methods[$type] = $method;
        }
        $this->user_id = intval($this->session->userdata('user_id'));
    }


    private function getList($type = 'accept', $action = 'view', $page = 1, $formatted = false)
    {
        $list = array();
        $action = trim(strip_tags($action));
        $order_by['date_update'] = 'DESC';

        $items_count = $this->Friendlist_model->get_list_count($this->user_id, $type);
        $items_on_page = $this->pg_module->get_module_config('users', 'items_per_page');
        $this->load->helper('sort_order');
        $page = intval($page) < 1 ? 1 : get_exists_page_number(intval($page), $items_count, $items_on_page);

        if ($items_count) {
            $list = $this->Friendlist_model->get_list($this->user_id, $type, $page, $items_on_page, $order_by, '', $formatted);
        }

        return $list;
    }


    /**
    * @api {post} /friendlist/index Get friendlist page
    * @apiGroup Friendlist
    * @apiParam {string} [action]  action type for page 
    * @apiParam {int} [page]  page count
    * @apiParam {boolean} [formatted]  return formated data
    */
    public function index()
    {
        $action = trim(strip_tags($this->input->post('action', true)));
        if (!$action) {
            $action = 'view';
        }
        $page = filter_input(INPUT_POST, 'page') || 1;
        $formatted = filter_input(INPUT_POST, 'formatted');
        $list = $this->getList($this->list_types['friendlist'], $action, $page, $formatted);
        $this->view->assign('data', $list);
    }

    /**
    * @api {post} /friendlist/friendsRequests Get friendlist requests
    * @apiGroup Friendlist
    * @apiParam {string} [action]  action type for page 
    * @apiParam {int} [page] page count
    * @apiParam {boolean} [formatted] return formatted data
    */
    public function friendsRequests()
    {
        $action = trim(strip_tags($this->input->post('action', true)));
        if (!$action) {
            $action = 'view';
        }
        $page = intval($this->input->post('page')) ?: 1;
        $formatted = filter_input(INPUT_POST, 'formatted');
        $list = $this->getList($this->list_types['friends_requests'], $action, $page, $formatted);
        $this->view->assign('data', $list);
    }

    /**
    * @api {post} /friendlist/friendsInvites Get friendlist invites
    * @apiGroup Friendlist
    * @apiParam {string} [action]  action type for page 
    * @apiParam {int} [page] page count
    * @apiParam {boolean} [formatted] return formatted data
    */
    public function friendsInvites()
    {
        $action = trim(strip_tags($this->input->post('action', true)));
        if (!$action) {
            $action = 'view';
        }
        $page = intval($this->input->post('page')) ?: 1;
        $formatted = filter_input(INPUT_POST, 'formatted');
        $list = $this->getList($this->list_types['friends_invites'], $action, $page, $formatted);
        $this->view->assign('data', $list);
    }

    private function getCounts($type = null)
    {
        if (!$type) {
            $counts = array();
            foreach ($this->list_types as $method => $l_type) {
                $counts[$method] = $this->Friendlist_model->get_list_count($this->user_id, $l_type);
            }

            return $counts;
        } else {
            return $this->Friendlist_model->get_list_count($this->user_id, $type);
        }
    }

    /**
    * @api {post} /friendlist/friendlistCount Get сount friends
    * @apiGroup Friendlist
    */
    public function friendlistCount()
    {
        $count = $this->getCounts($this->list_types['friendlist']);
        $this->view->assign('data', $count);
    }

    /**
    * @api {post} /friendlist/friendsRequestsCount Get сount requests
    * @apiGroup Friendlist
    */
    public function friendsRequestsCount()
    {
        $count = $this->getCounts($this->list_types['friends_requests']);
        $this->view->assign('data', $count);
    }

    /**
    * @api {post} /friendlist/friendsInvitesCount Get сount invites
    * @apiGroup Friendlist
    */
    public function friendsInvitesCount()
    {
        $count = $this->getCounts($this->list_types['friends_invites']);
        $this->view->assign('data', $count);
    }

    /**
    * @api {post} /friendlist/getStatuses Get user status in frendlist
    * @apiGroup Friendlist
    * @apiParam {int} id_dest_user user id
    */
    public function getStatuses()
    {
        $id_dest_user = filter_input(INPUT_POST, 'id_dest_user');
        if (!$id_dest_user) {
            $this->view->assign('errors', 'Empty id_dest_user');
        }
        $statuses = $this->Friendlist_model->get_statuses($this->user_id, $id_dest_user);
        $this->view->assign('data', $statuses);
    }

    /**
    * @api {post} /friendlist/listsCounts Get counts lists
    * @apiGroup Friendlist
    */
    public function listsCounts()
    {
        $count = $this->getCounts();
        $this->view->assign('data', $count);
    }

    /**
    * @api {post} /friendlist/request Request for friendlist
    * @apiGroup Friendlist
    * @apiParam {int} id_dest_user user id
    * @apiParam {string} comment comment of request
    */
    public function request()
    {
        $id_dest_user = intval($this->input->post('id_dest_user'));
        $comment = trim(strip_tags($this->input->post('comment', true)));
        $result = $this->Friendlist_model->request($this->user_id, intval($id_dest_user), $comment);
        if ($result['status'] == 'request') {
            // send notification
            $this->load->model('Notifications_model');
            $this->load->model('Users_model');
            $dest_user_data = $this->Users_model->get_user_by_id($id_dest_user);
            $user_data = $this->Users_model->format_user($this->Users_model->get_user_by_id($this->user_id));
            $notification_data['fname'] = $dest_user_data['output_name'];
            $notification_data['user'] = $user_data['output_name'];
            $notification_data['comment'] = $comment;
            $return = $this->Notifications_model->send_notification($dest_user_data["email"], 'friends_request', $notification_data, '', $dest_user_data['lang_id']);
        }
        $this->view->assign('data', $result);
    }

    /**
    * @api {post} /friendlist/accept Accept request for friendlist
    * @apiGroup Friendlist
    */
    public function accept()
    {
        $id_dest_user = intval($this->input->post('id_dest_user'));
        $result = $this->Friendlist_model->accept($this->user_id, intval($id_dest_user));
        $this->view->assign('data', $result);
    }

    /**
    * @api {post} /friendlist/decline Decline request for friendlist
    * @apiGroup Friendlist
    */
    public function decline()
    {
        $id_dest_user = intval($this->input->post('id_dest_user'));
        $result = $this->Friendlist_model->decline($this->user_id, intval($id_dest_user));
        $this->view->assign('data', $result);
    }

    /**
    * @api {post} /friendlist/remove Remove user from friendlist
    * @apiGroup Friendlist
    * @apiParam {int} id_dest_user user id
    */    
    public function remove()
    {
        $id_dest_user = filter_input(INPUT_POST, 'id_dest_user');
        if (!$id_dest_user) {
            $id_dest_user = filter_input(INPUT_POST, 'id_dest_user', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        } else {
            $id_dest_user = array($id_dest_user);
        }
        foreach ($id_dest_user as $id_user) {
            $result[$id_user] = $this->Friendlist_model->remove($this->user_id, intval($id_user));
        }
        $this->view->assign('data', $result);
    }
}
