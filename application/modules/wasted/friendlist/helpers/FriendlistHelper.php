<?php

namespace Pg\modules\friendlist\helpers {

    if (!function_exists('friendlistLinks')) {
        function friendlistLinks($params)
        {
            $id_dest_user = filter_var($params['id_user'], FILTER_VALIDATE_INT);
            if (!$id_dest_user) {
                return '';
            }

            $ci = &get_instance();

            if ($ci->session->userdata('auth_type') !== 'user') {
                return '';
            }

            $id_user = $ci->session->userdata('user_id');
            if ($id_user == $id_dest_user) {
                return '';
            }

            $ci->load->model('Friendlist_model');
            $statuses = $ci->Friendlist_model->get_statuses($id_user, $id_dest_user);
            $buttons = array();
            foreach ($statuses['allowed_btns'] as $key => $value) {
                if ($value['allow']) {
                    $buttons[$key] = $value;
                }
            }

            $ci->view->assign('id_user', $id_user);
            $ci->view->assign('id_dest_user', $id_dest_user);
            $ci->view->assign('buttons', $buttons);

            $ci->view->assign('friendlist_button_rand', rand(100000, 999999));

            if (empty($params['view_type'])) {
                $params['view_type'] = 'button';
            }

            return $ci->view->fetch('helper_lists_' . $params['view_type'], 'user', 'friendlist');
        }
    }

    if (!function_exists('friendInput')) {
        function friendInput($params)
        {
            $ci = &get_instance();
            $ci->load->model('Users_model');
            $ci->load->model('Friendlist_model');

            $user_id = $ci->session->userdata('user_id');

            $friends_ids = $ci->Friendlist_model->get_friendlist_users_ids($user_id);
            if (empty($friends_ids)) {
                return '';
            }

            if (!isset($params['id_user']) && !empty($params['id_user'])) {
                $data['user'] = $ci->Users_model->get_user_by_id($params['id_user']);
            }

            $data['var_user_name'] = isset($params['var_user_name']) ? $params['var_user_name'] : 'id_user';
            $data['var_js_name'] = isset($params['var_js_name']) ? $params['var_js_name'] : '';
            $data['placeholder'] = isset($params['placeholder']) ? $params['placeholder'] : '';
            $data['values_callback'] = isset($params['values_callback']) ? $params['values_callback'] : '';

            $data['rand'] = rand(100000, 999999);

            $ci->view->assign('friend_helper_data', $data);

            return $ci->view->fetch('helper_friend_input', 'user', 'friendlist');
        }
    }

    if (!function_exists('friendSelect')) {
        function friendSelect($params)
        {
            $ci = &get_instance();
            $ci->load->model('Users_model');
            $ci->load->model('Friendlist_model');

            $user_id = $ci->session->userdata('user_id');
            $friends_ids = $ci->Friendlist_model->get_friendlist_users_ids($user_id);
            if (empty($friends_ids)) {
                return '';
            }

            if (isset($params['id_user']) && !empty($params['id_user'])) {
                $data['user'] = $ci->Users_model->get_user($params['id_user']);
            }

            $data['var_user_name'] = isset($params['var_user_name']) ? $params['var_user_name'] : 'id_user';
            $data['var_js_name'] = isset($params['var_js_name']) ? $params['var_js_name'] : '';

            $data['rand'] = rand(100000, 999999);

            $ci->view->assign('friend_helper_data', $data);

            return $ci->view->fetch('helper_friend_select', 'user', 'friendlist');
        }
    }

    if (!function_exists('friendRequests')) {
        function friendRequests($attrs)
        {
            $ci = &get_instance();
            $ci->load->model('Friendlist_model');
            $count = $ci->Friendlist_model->get_list_count((int) $ci->session->userdata('user_id'), 'request_in');
            $ci->view->assign('friend_requests_count', $count);

            return $ci->view->fetch('helper_friend_requests_' . $attrs['template'], 'user', 'friendlist');
        }
    }

    if (!function_exists('addFriendlistButton')) {
        function addFriendlistButton($params)
        {
            $ci = &get_instance();
            $ci->load->model('Friendlist_model');
            if (!isset($params['id_user']) || empty($params['id_user'])) {
                return '';
            }
            $user_id = $ci->session->userdata('user_id');
            $blacklist_ids = $ci->Friendlist_model->get_list_users_ids($user_id);
            if (in_array($params['id_user'], $blacklist_ids)) {
                return '';
            }
            $ci->view->assign('id_dest_user', $params['id_user']);

            return $ci->view->fetch('helper_add_friendlist', 'user', 'friendlist');
        }
    }

}

namespace {
    
    if (!function_exists('friendlist_links')) {
        function friendlist_links($params)
        {
            return Pg\modules\friendlist\helpers\friendlistLinks($params);
        }
    }

    if (!function_exists('friend_input')) {
        function friend_input($params)
        {
            return Pg\modules\friendlist\helpers\friendInput($params);
        }
    }

    if (!function_exists('friend_select')) {
        function friend_select($params)
        {
            return Pg\modules\friendlist\helpers\friendSelect($params);
        }
    }

    if (!function_exists('friend_requests')) {
        function friend_requests($attrs)
        {
            return Pg\modules\friendlist\helpers\friendRequests($attrs);
        }
    }

    if (!function_exists('add_friendlist_button')) {
        function add_friendlist_button($params)
        {
            return Pg\modules\friendlist\helpers\addFriendlistButton($params);
        }
    }
    
}
