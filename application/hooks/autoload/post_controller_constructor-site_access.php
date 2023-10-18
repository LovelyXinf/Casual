<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('site_access')) {
    function site_access()
    {
        $ci = &get_instance();

        if ($ci->router->class == 'start' && $ci->router->method == 'api') {
            return;
        }

        if ($ci->router->class == 'cronjob') {
            return;
        }

        if (!$ci->router->is_operator_class && !$ci->router->is_admin_class) {
            redirect(site_url('operator'), 'hard');
        }
    }
}
