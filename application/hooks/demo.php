<?php

if (!function_exists('demoMode')) {
    /**
     * Check user access
     *
     * @package PG_Core
     * @subpackage  Hooks
     * @category    hooks
     * @copyright   Copyright (c) 2000-2016 PG Real Estate - php real estate listing software
     * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
     *
     * @return void
     */
    function demoMode()
    {
        if (!INSTALL_DONE) {
            return;
        }
        
        $_ENV['GA_KEY'] = $_ENV['DEMO_GA_KEY'];
        $_ENV['AMPLITUDE_KEY'] = $_ENV['DEMO_AMPLITUDE_KEY'];
        $_ENV['MIXPANEL_TOKEN'] = $_ENV['DEMO_MIXPANEL_TOKEN'];
        $_ENV['ANALYTICS_PROFILES'] = $_ENV['DEMO_ANALYTICS_PROFILES'];
        
        /*$ci = &get_instance();
        
        $ci->config->load('demo_data', true);
        
        $login_settings = $ci->config->item('login_settings', 'demo_data');
        
        if (substr($ci->router->fetch_class(true), 0, 6) == "admin_") {
            $ci->load->model('Ausers_model');
            if (!$ci->Ausers_model->get_user_by_login_password(
                $login_settings['admin']['login'], md5($login_settings['admin']['password']))) {
                    
                $login_settings['admin']['login'] = "";
                $login_settings['admin']['password'] = "";
            }
        }
        
        $ci->view->setGlobalVar('demo_login_settings', $login_settings);*/
    }
}
