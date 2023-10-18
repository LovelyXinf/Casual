<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('get_landing_pages')) {
    function get_landing_pages()
    {
        if (!INSTALL_MODULE_DONE) {
            return;
        }

        $landing_pages_links_file = SITE_PHYSICAL_PATH . APPLICATION_FOLDER . 'config/landings_module_routes.php';

        include_once $landing_pages_links_file;

        $config = &load_class('Config');

        $URI = &load_class('URI');
        $URI->_fetch_uri_string();

        $uri_string = $URI->uri_string();

        $uri_string = rtrim($uri_string, '/') . '/';

        $langs = $config->item('langs_route');

        foreach ($langs as $lang) {
            $uri_string = preg_replace('#^/' . preg_quote($lang, '#') . '/#i', '/', $uri_string);
        }

        if ($uri_string == '/admin' && strpos($uri_string, '/admin/') == 0) {
            return;
        }

        /* <custom_R> */
        if ($uri_string == '/operator' && strpos($uri_string, '/operator/') == 0) {
            return;
        }
        /* </custom_R> */

        $uri_string = rtrim($uri_string, '/');

        $uri_string = preg_replace('#/index$#i', '', $uri_string);

        if (empty($uri_string)) {
            $uri_string = '/start';
        }

        if (isset($landing_data[$uri_string])) {
            include LIBPATH . 'Landing.php';
            $CI = new Pg\Libraries\Landing();

            if ($CI->session->userdata('auth_type') == 'user') {
                redirect(site_url() . 'users/search');
            }

            $demo_panel = '';
            if (getenv('DEMO_MODE') != false) {
                $CI->load->helper('start');
                $demo_panel = demoPanel(['type'=>'user', 'place'=> 'top']);
            }

            if ($CI->pg_module->is_module_installed('landings')) {
                $CI->load->model('Landings_model');
                $link    = rtrim(ltrim($uri_string, '/'), '/');
                $landing = $CI->Landings_model->getLandingsList(null, null, null, ['where' => ['link' => $link]]);
                if ($landing) {
                    if ($landing[0]['url_page']) {
                        $content = file_get_contents($landing[0]['url_page']);

                        /*
                        if (strpos($content, '<base href') === false) {
                            $content = str_replace("<head>", '<head>
                                <base href="' . $landing[0]['url_page'] . '">
                                <link rel="dns-prefetch" href="' . $landing[0]['url_page'] . '">', $content);
                        }
                        */

                        $content = str_replace('<head>', '<head> 
                                 <base href="' . SITE_SERVER . '">
                                 <link rel="dns-prefetch" href="' . SITE_SERVER . '">', $content);

                        $content = str_replace(
                            ['<body>', '</body>'],
                            ['<body>' . $demo_panel . '<div id="pjaxcontainer">', '<script type="text/javascript" src="' . MODULEPATH_VIRTUAL . 'users/js/UsersRegistrationWidget.js"></script>'
                                . '</div></body>'],
                            $content
                        );

                        if (strpos($landing[0]['url_page'], 'tilda') !== false) {
                            $content .= '<style>#tildacopy{display:none;} #tilda-popup-for-error, .t-input-error{display: none !important;}</style>'
                                        . '<script>jQuery("#tildacopy a").attr("href", "https://www.datingpro.com/"); </script>';
                        }

                        echo $content;
                        exit;
                    }
                }
            }

            $value = $landing_data[$uri_string];

            if (substr($value, -4, 4) == '.php') {
                include SITE_PHYSICAL_PATH . UPLOAD_DIR . 'landings/' . $value;
            } else {
                $content =  file_get_contents(SITE_PHYSICAL_PATH . UPLOAD_DIR . 'landings/' . $value);
                $content = str_replace(
                    ['<body>', '</body>'],
                    ['<body><div id="pjaxcontainer">', '<script type="text/javascript" src="' . MODULEPATH_VIRTUAL . 'users/js/UsersRegistrationWidget.js"></script>'
                                . '</div></body>'],
                    $content
                );
                echo $content;
            }

            exit;
        }
    }
}
