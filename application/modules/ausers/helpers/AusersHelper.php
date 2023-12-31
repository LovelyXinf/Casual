<?php

namespace Pg\modules\ausers\helpers {

    /**
     * Ausers module
     *
     * @package     PG_RealEstate
     *
     * @copyright   Copyright (c) 2000-2014 PG Real Estate - php real estate listing software
     * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
     */

    /**
     * Ausers management
     *
     * @package     PG_RealEstate
     * @subpackage  Ausers
     *
     * @category    helpers
     *
     * @copyright   Copyright (c) 2000-2014 PG Real Estate - php real estate listing software
     * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
     */
    if (!function_exists('logOff')) {

        /**
         * Include ausers logOff link
         *
         * @param array $params block parameters
         *
         * @return string
         */
        function logOff()
        {
            $ci = &get_instance();
            $module = ($ci->session->userdata("user_type") === 'admin') ? 'ausers' : 'moderators';
            $logoff_link = site_url() . "admin/" . $module . "/logoff";
            $ci->view->assign('logoff_link', $logoff_link);

            return $ci->view->fetch('log_off', 'admin', 'ausers');
        }
    }

}

namespace {

    if (!function_exists('logOff')) {
        function logOff()
        {
            return Pg\modules\ausers\helpers\logOff();
        }
    }

}
