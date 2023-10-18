<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('set_user_online_status')) {
    function set_user_online_status()
    {
        if (INSTALL_MODULE_DONE) {
            $ci                       = &get_instance();
            $not_update_online_status = $ci->input->post('not_update_online_status', true);
            if ($not_update_online_status) {
                return;
            }

            /* <custom_R> */
            if ($ci->session->userdata('auth_type') == 'operator') {
                $ci->load->model('operators/models/OperatorsModel');
                $user_id = intval($ci->session->userdata('user_id'));
                $ci->OperatorsModel->updateOnlineStatus($user_id, 1);
            }
            /* </custom_R> */
        }

        return;
    }
}
