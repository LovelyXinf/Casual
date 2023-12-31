<?php
/**
 * Hooks
 *
 * @package     PG_Core
 *
 * @copyright   Copyright (c) 2000-2016 PG Real Estate - php real estate listing software
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use Pg\Libraries\Acl\Action\ViewPage as ActionViewPage;
use Pg\Libraries\Acl\Resource\Page as ResourcePage;

if (!function_exists('check_access')) {
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
    function check_access()
    {
         if (!INSTALL_MODULE_DONE) {
            return;
        }
        $ci = &get_instance();

        $module = $ci->router->fetch_class();
        $controller = $ci->router->fetch_class(true);
        $method = $ci->router->fetch_method();

        // TODO: проверяем на этапе acl
        /*if (!$ci->pg_module->is_module_method_exists($module, $controller, $method)) {
            show_404();
        }*/
        
        // TODO: проверка на PSR
        if (strpos($controller, '_') === false) {
            $chunks = preg_split('/([[:upper:]][[:lower:]]+)/', $controller, null, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
            foreach ($chunks as &$chunk) {
                $chunk = strtolower($chunk);
            }
            $controller = implode('_', $chunks);
        }

        $ci->acl->check(new ActionViewPage(
            new ResourcePage(
                ['module' => $module, 'controller' => $controller, 'action' => $method]
            )
        ));
        return;
    }
}
