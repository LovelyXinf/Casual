<?php

namespace Pg\modules\favourites\helpers {

    if (!function_exists('favouritesButton')) {
        function favouritesButton($params)
        {
            $ci = &get_instance();
            $ci->load->model('Favourites_model');
            if (!isset($params['id_user']) || empty($params['id_user'])) {
                return '';
            }

            if ($ci->session->userdata('auth_type') != 'user') {
                return '';
            }

            $user_id = $ci->session->userdata('user_id');
            if (!$user_id || $user_id == $params['id_user']) {
                return '';
            }

            if (in_array($params['id_user'], $ci->Favourites_model->get_list_users_ids($user_id))) {
                $action = 'remove';
            } else {
                $action = 'add';
            }
            $ci->view->assign('action', $action);

            $ci->view->assign('id_dest_user', $params['id_user']);

            if (empty($params['view_type'])) {
                $params['view_type'] = 'button';
            }

            $ci->view->assign('class', (isset($params['class']) && !empty($params['class'])) ? $params['class'] : '');
            
            return $ci->view->fetch('helper_favourites_' . $params['view_type'], 'user', 'favourites');
        }
    }

}

namespace {
    
    if (!function_exists('favourites_button')) {
        function favourites_button($params)
        {
            return Pg\modules\favourites\helpers\favouritesButton($params);
        }
    }
    
}
