<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| 	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved
| routes must come before any wildcard or regular expression routes.
|
*/

if (!INSTALL_MODULE_DONE) {
    $route['default_controller'] = 'admin/install/copyrights';
} elseif (!INSTALL_DONE) {
    $route['default_controller'] = 'admin/install/product_install';
} else {
    $route['default_controller'] = 'start';
}
$route['scaffolding_trigger'] = '';

$route['install']                = 'admin/install';
$route['admin']                  = 'admin/start';
$route['admin/index.php']        = 'admin/start';
$route['version.php']            = 'start/print_version';

/* <custom_R> */
$route['operator']               = 'operator/start';
$route['operator/index.php']     = 'operator/start';
/* </custom_R> */

if (file_exists(dirname(__FILE__) . '/seo_module_routes.php')) {
    include dirname(__FILE__) . '/seo_module_routes.php';
}
/* End of file routes.php */
/* Location: ./system/application/config/routes.php */
