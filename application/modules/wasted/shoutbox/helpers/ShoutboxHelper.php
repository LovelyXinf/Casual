<?php

namespace Pg\modules\shoutbox\helpers {

    if (!function_exists('shoutboxButton')) {
        function shoutboxButton()
        {
            return shoutboxForm();
        }
    }

    if (!function_exists('shoutboxForm')) {
        function shoutboxForm()
        {
            $ci = &get_instance();
            $ci->load->model('Shoutbox_model');
            $shoutbox_status = $ci->Shoutbox_model->shoutboxStatus();
            if (!$shoutbox_status['id_user'] || !$shoutbox_status['shoutbox_on']) {
                return false;
            }
            $data = array();
            $data['id_user'] = $ci->session->userdata('user_id');
            $data['user_name'] = $ci->session->userdata('output_name');
            $data['msg_max_length'] = $ci->pg_module->get_module_config('shoutbox', 'message_max_chars');
            $data['items_per_page'] = 5;
            $data['top_top_icon'] = 60 * ($data['items_per_page'] / 2) + 18.5;
            $data['height_block_messages'] = 60 * intval($data['items_per_page']);
            $ci->view->assign('shoutbox_data', $data);

            return $ci->view->fetch('helper_shoutbox', 'user', 'shoutbox');
        }
    }
    if (!function_exists('shoutboxMobileBlock')) {
        function shoutboxMobileBlock()
        {
            $ci = &get_instance();
            $ci->load->model('Shoutbox_model');
            $shoutbox_status = $ci->Shoutbox_model->shoutboxStatus();
            if (!$shoutbox_status['id_user'] || !$shoutbox_status['shoutbox_on']) {
                return false;
            }
            return $ci->view->fetch('helper_mobile_block', 'user', 'shoutbox');
        }
    }

}

namespace {

    if (!function_exists('shoutbox_button')) {
        function shoutbox_button()
        {
            return Pg\modules\shoutbox\helpers\shoutboxButton();
        }
    }

    if (!function_exists('shoutbox_form')) {
        function shoutbox_form()
        {
            return Pg\modules\shoutbox\helpers\shoutboxForm();
        }
    }
    if (!function_exists('shoutboxMobileBlock')) {
        function shoutboxMobileBlock()
        {
            return Pg\modules\shoutbox\helpers\shoutboxMobileBlock();
        }
    }

}
