<?php

namespace Pg\modules\cookie_policy\helpers {

    /**
     * Cookie policy module
     *
     * @package 	PG_Dating
     *
     * @copyright 	Copyright (c) 2000-2014 PG Dating Pro - php dating software
     * @author 		Pilot Group Ltd <http://www.pilotgroup.net/>
     */

    /**
     * Cookie policy management
     *
     * @package 	PG_Dating
     * @subpackage 	Cookie policy
     *
     * @category	helpers
     *
     * @copyright 	Copyright (c) 2000-2014 PG Real Estate - php dating software
     * @author 		Pilot Group Ltd <http://www.pilotgroup.net/>
     */
    if (!function_exists('cookiePolicyBlock')) {
        /**
         * Show cookie policy notification
         *
         * @param array $params form parameters
         *
         * @return string
         */
        function cookiePolicyBlock()
        {
            $ci = &get_instance();

            $ci->load->helper('cookie');
            $cookie = get_cookie('cookie_policy', true);
            if ($cookie) {
                $cookie = array(
                    'name'         => 'cookie_policy',
                    'value'        => '1',
                    'expire'       => 604800,
                    'domain'       => COOKIE_SITE_SERVER,
                    'path'         => '/' . SITE_SUBFOLDER,
                );
                set_cookie($cookie);

                return '';
            }

            $page_gid = $ci->pg_module->get_module_config('cookie_policy', 'page_gid');
            $ci->view->assign('policy_page_gid', $page_gid);

            $ci->view->assign('cookie_site_server', COOKIE_SITE_SERVER);
            $ci->view->assign('cookie_site_path', '/' . SITE_SUBFOLDER);

            return $ci->view->fetch('helper_cookie_policy', 'user', 'cookie_policy');
        }
    }

}

namespace {
    
    if (!function_exists('cookie_policy_block')) {
        function cookie_policy_block()
        {
            return Pg\modules\cookie_policy\helpers\cookiePolicyBlock();
        }
    }
    
}
