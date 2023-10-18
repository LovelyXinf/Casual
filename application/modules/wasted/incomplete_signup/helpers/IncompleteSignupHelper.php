<?php

namespace Pg\modules\incomplete_signup\helpers {

    if (!function_exists('notRegisteredAddFilter')) {
        function notRegisteredAddFilter($filter)
        {
            $ci = &get_instance();
            /**
             * Hide filter from moderator, if he doesn't have access
             */
            $user_type = $ci->session->userdata("user_type");
            if ($user_type != 'admin') {;
                $ci->load->model('Menu_model');
                $permissions = $ci->session->userdata('permission_data');
                if (!$ci->Menu_model->isModerateAccessToItem(
                        ['controller' => 'incomplete_signup', 'method' => 'index'], 
                        $ci->session->userdata("permission_data")
                    )) {
                    return false;
                }        
            }            
            $ci->load->model("Incomplete_signup_model");

            $delay = $ci->pg_module->get_module_config('incomplete_signup', 'show_delay');
            $time = date("Y-m-d H:i:s", time() - $delay * 60);
            $attrs["where"]['date_created <']  = $time;

            $filter_data["not_registered"] = $ci->Incomplete_signup_model->get_users_count($attrs);

            $ci->view->assign('filter', $filter);
            $ci->view->assign('filter_data', $filter_data);

            return $ci->view->fetch('helper_not_registered_filter', 'admin', 'incomplete_signup');
        }
    }

    if (!function_exists('incompleteSignupScript')) {
        function incompleteSignupScript()
        {
            $ci = &get_instance();

            $ci->view->assign('site_url', site_url());
            $ci->view->assign('timeout_send_data', $ci->pg_module->get_module_config('incomplete_signup', 'timeout_send_data') * 1000);

            return $ci->view->fetch('helper_incomplete_signup_script', 'user', 'incomplete_signup');
        }
    }

}

namespace {
    
    if (!function_exists('not_registered_add_filter')) {
        function not_registered_add_filter($filter)
        {
            return Pg\modules\incomplete_signup\helpers\notRegisteredAddFilter($filter);
        }
    }

    if (!function_exists('incomplete_signup_script')) {
        function incomplete_signup_script()
        {
            return Pg\modules\incomplete_signup\helpers\incompleteSignupScript();
        }
    }
    
}
