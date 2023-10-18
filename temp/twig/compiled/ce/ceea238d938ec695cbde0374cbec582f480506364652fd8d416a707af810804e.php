<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @app/header.twig */
class __TwigTemplate_11f92ad52b886d7a6c0e4113b75add37cc796c96d5cd2c32cf69335e7d146a77 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if ( !($context["is_pjax"] ?? null)) {
            // line 2
            echo "    <!DOCTYPE html>
    <html dir=\"";
            // line 3
            echo $this->getAttribute(($context["_LANG"] ?? null), "rtl", []);
            echo "\" lang=\"";
            echo $this->getAttribute(($context["_LANG"] ?? null), "code", []);
            echo "\">
        <head>
            
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
            <meta http-equiv=\"expires\" content=\"0\">
            <meta http-equiv=\"pragma\" content=\"no-cache\">
            <meta name=\"revisit-after\" content=\"3 days\">
            ";
            // line 12
            $module =             null;
            $helper =             'seo';
            $name =             'seo_tags';
            $params = array("robots"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 13
            echo "            ";
            $module =             null;
            $helper =             'start';
            $name =             'favicon';
            $params = array(["type" => "user"]            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 14
            echo "        ";
        }
        // line 15
        echo "
        ";
        // line 16
        $module =         null;
        $helper =         'seo';
        $name =         'seo_tags';
        $params = array("title"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        // line 17
        echo "        ";
        $module =         null;
        $helper =         'seo';
        $name =         'seo_tags';
        $params = array("description|keyword|canonical|og_title|og_type|og_url|og_image|og_site_name|og_description"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        // line 18
        echo "
        <script>
            var site_rtl_settings = '";
        // line 20
        echo $this->getAttribute(($context["_LANG"] ?? null), "rtl", []);
        echo "';
            var is_pjax = parseInt('";
        // line 21
        echo ($context["is_pjax"] ?? null);
        echo "');
            var js_events
            = ";
        // line 23
        echo twig_jsonencode_filter(($context["js_events"] ?? null));
        echo ";
                    var id_user = ";
        // line 24
        if ($this->getAttribute(($context["user_session_data"] ?? null), "user_id", [])) {
            echo $this->getAttribute(($context["user_session_data"] ?? null), "user_id", []);
        } else {
            echo "0";
        }
        echo ";
        </script>

        ";
        // line 27
        if ( !($context["is_pjax"] ?? null)) {
            // line 28
            echo "            <link rel=\"stylesheet\" href=\"";
            echo ($context["site_root"] ?? null);
            echo "application/views/flatty/css/bootstrap-";
            echo $this->getAttribute(($context["_LANG"] ?? null), "rtl", []);
            echo ".css\">
            ";
            // line 29
            $module =             null;
            $helper =             'theme';
            $name =             'include_css';
            $params = array("style"            ,"screen"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 30
            echo "            ";
            $module =             null;
            $helper =             'theme';
            $name =             'css';
            $params = array(($context["load_type"] ?? null)            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 31
            echo "
            <script>
            var site_url = '";
            // line 33
            echo ($context["site_url"] ?? null);
            echo "';
\t\t\tvar base_url = '";
            // line 34
            echo ($context["base_url"] ?? null);
            echo "';
            var site_root = '";
            // line 35
            echo ($context["site_root"] ?? null);
            echo "';
            var theme = '";
            // line 36
            echo ($context["theme"] ?? null);
            echo "';
            var img_folder = '";
            // line 37
            echo ($context["img_folder"] ?? null);
            echo "';
            var site_error_position = 'center';
            var use_pjax = parseInt('";
            // line 39
            echo ($context["use_pjax"] ?? null);
            echo "');
            var pjax_container = '#pjaxcontainer';
            </script>

            ";
            // line 43
            $module =             null;
            $helper =             'utils';
            $name =             'jscript';
            $params = array(""            ,"jquery.js"            ,""            ,"sync"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 44
            echo "            ";
            $module =             null;
            $helper =             'utils';
            $name =             'jscript';
            $params = array(""            ,"jquery.pjax.js"            ,""            ,"sync"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 45
            echo "            ";
            $module =             null;
            $helper =             'theme';
            $name =             'js';
            $params = array(($context["load_type"] ?? null)            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 46
            echo "            ";
            $module =             null;
            $helper =             'mobile';
            $name =             'pushNotifications';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 47
            echo "            <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
            ";
            // line 48
            $module =             null;
            $helper =             'utils';
            $name =             'jscript';
            $params = array(""            ,"twig.js/twig.js"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 49
            echo "            <script src=\"";
            echo ($context["site_root"] ?? null);
            echo "application/views/flatty/js/loading_content.js\"></script>

            <script type=\"text/javascript\">
                var jQueryShow = \$.fn.show;
                \$.fn.show = function () {
                    jQueryShow.apply(this);
                    this.removeClass('hide');
                    return this;
                };
                loadingCSS('";
            // line 58
            echo ($context["site_root"] ?? null);
            echo "application/views/flatty/css/font-awesome.min.css');
                loadingCSS('";
            // line 59
            echo ($context["site_root"] ?? null);
            echo "application/views/flatty/css/fontawesome-5.0.11/css/fontawesome-all.min.css');
                //fa 5.12 pro
                loadingCSS('";
            // line 61
            echo ($context["site_root"] ?? null);
            echo "application/views/flatty/css/fontawesome/css/all.min.css');
                
            </script>
            <script>
                \$(function () {
                    loadingCSS('";
            // line 66
            echo ($context["site_root"] ?? null);
            echo "application/js/emoji-picker/css/emoji.css');
                    loadingExternalScripts('//twemoji.maxcdn.com/twemoji.min.js');
                });
            </script>
            ";
            // line 70
            $module =             null;
            $helper =             'theme';
            $name =             'loadJsBottom';
            $params = array([0 => "bootstrap-switch/dist/js/bootstrap-switch.min.js"]            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 71
            echo "            ";
            $module =             null;
            $helper =             'seo_advanced';
            $name =             'seo_traker';
            $params = array("top"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 72
            echo "
            ";
            // line 73
            if ((($context["auth_type"] ?? null) == "user")) {
                // line 74
                echo "                <script>
                var id_user = ";
                // line 75
                if ($this->getAttribute(($context["user_session_data"] ?? null), "user_id", [])) {
                    echo $this->getAttribute(($context["user_session_data"] ?? null), "user_id", []);
                } else {
                    echo "0";
                }
                echo ";
                var site_url = '";
                // line 76
                echo ($context["site_url"] ?? null);
                echo "';
                if (id_user) {
                    \$.ajax({
                        url: site_url + 'users/ajaxUserSiteVisit',
                        type: 'POST',
                        data: {user_id: id_user},
                        success: function () {
                        },
                        error: function () {
                        }
                    });
                }
                </script>
            ";
            }
            // line 90
            echo "            ";
            $module =             null;
            $helper =             'start';
            $name =             'analytics';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 91
            echo "        </head>
        <body class=\"";
            // line 92
            if ((($context["page_type"] ?? null) != "like_me")) {
                echo "mod-inner";
            } else {
                echo "mod-likeme";
            }
            echo "\">
            ";
            // line 93
            $module =             null;
            $helper =             'start';
            $name =             'demo_panel';
            $params = array(["type" => "user", "place" => "top"]            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            echo " 
            ";
            // line 94
            $module =             null;
            $helper =             'users';
            $name =             'incorrect_email';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 95
            echo "            ";
            $module =             null;
            $helper =             'chats';
            $name =             'chats_block';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 96
            echo "            ";
            $module =             null;
            $helper =             'likes';
            $name =             'likes';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 97
            echo "            ";
            $module =             null;
            $helper =             'audio_uploads';
            $name =             'audio_bottom_controls';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 98
            echo "            ";
            if ((twig_test_empty(($context["header_type"] ?? null)) || (($context["header_type"] ?? null) != "index"))) {
                // line 99
                echo "                ";
                if ((($context["auth_type"] ?? null) == "user")) {
                    // line 100
                    echo "                ";
                    if ((($context["page_type"] ?? null) != "chatbox")) {
                        // line 101
                        echo "                <div class=\"bottom-btns\" id=\"bottom-btns\">
                    ";
                        // line 102
                        $module =                         null;
                        $helper =                         'shoutbox';
                        $name =                         'shoutbox_button';
                        $params = array(                        );
                        ob_start();
                        $ci = &get_instance();
                        $ci->load->helper($helper, $module);
                        if (empty($module)) {
                        $module = str_replace('_helper', '', $helper);
                        }
                        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                        } elseif (function_exists($name)) {
                        $result = call_user_func_array($name, $params);
                        } else {
                        $result = '';
                        }
                        $output_buffer = ob_get_contents();
                        ob_end_clean();
                        echo $output_buffer.$result;
                        // line 103
                        echo "                </div>
                ";
                    }
                    // line 105
                    echo "                ";
                }
                // line 106
                echo "            ";
            }
            // line 107
            echo "            <div id=\"pjaxcontainer\" class=\"pjaxcontainer\">
            ";
        }
        // line 109
        echo "            <div class=\"pjaxcontainer-inner\">
                <script type=\"text/javascript\">
                    \$.pjax.defaults.version = 'default';
                    var messages = ";
        // line 112
        if (($context["_PREDEFINED"] ?? null)) {
            echo twig_jsonencode_filter(($context["_PREDEFINED"] ?? null), twig_constant("JSON_FORCE_OBJECT"));
        } else {
            echo "{}";
        }
        echo ";
                    var alerts;
                    var notifications;
                    new pginfo({'messages': messages});
                    \$(function () {
                        alerts = new Alerts({
                                        alertOkName: \"";
        // line 118
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_ok"        ,"start"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        echo "\",
                                        alertCancelName: \"";
        // line 119
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_cancel"        ,"start"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        echo "\",
                                        alertConfirmClass: \"";
        // line 120
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("confirm_alert"        ,"start"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        echo "\",
                                    });
                        notifications = new Notifications();
                    });
                </script>
                ";
        // line 125
        if ((($context["page_type"] ?? null) != "like_me")) {
            // line 126
            echo "                    ";
            $module =             null;
            $helper =             'banners';
            $name =             'banner_initialize';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 127
            echo "                ";
        }
        // line 128
        echo "                <div id=\"error_block\">";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "error", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            if ($this->getAttribute($context["item"], "text", [])) {
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</div>
                <div id=\"info_block\">";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "info", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            if ($this->getAttribute($context["item"], "text", [])) {
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</div>
                <div id=\"success_block\">";
        // line 130
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "success", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            if ($this->getAttribute($context["item"], "text", [])) {
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</div>
                ";
        // line 131
        if ((twig_test_empty(($context["header_type"] ?? null)) || (($context["header_type"] ?? null) != "index"))) {
            // line 132
            echo "                    ";
            $this->loadTemplate("@app/header_navigation.twig", "@app/header.twig", 132)->display($context);
            // line 133
            echo "                    ";
            if (((($context["page_type"] ?? null) != "like_me") && (($context["page_type"] ?? null) != "chatbox"))) {
                // line 134
                echo "                        <div class=\"pre-main-inner-content\">
                            ";
                // line 135
                $module =                 null;
                $helper =                 'menu';
                $name =                 'mobileTopMenu';
                $params = array(                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                // line 136
                echo "                            ";
                if ((twig_test_empty(($context["header_type"] ?? null)) || (((((($context["header_type"] ?? null) != "index") && (($context["header_type"] ?? null) != "network")) && (($context["header_type"] ?? null) != "error_page")) && (($context["header_type"] ?? null) != "access_permissions")) && (($context["header_type"] ?? null) != "view_magazine")))) {
                    // line 137
                    echo "                                ";
                    $module =                     null;
                    $helper =                     'users';
                    $name =                     'featuredUsers';
                    $params = array(false                    ,                    );
                    ob_start();
                    $ci = &get_instance();
                    $ci->load->helper($helper, $module);
                    if (empty($module)) {
                    $module = str_replace('_helper', '', $helper);
                    }
                    if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                    $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                    } elseif (function_exists($name)) {
                    $result = call_user_func_array($name, $params);
                    } else {
                    $result = '';
                    }
                    $output_buffer = ob_get_contents();
                    ob_end_clean();
                    echo $output_buffer.$result;
                    // line 138
                    echo "                            ";
                }
                // line 139
                echo "                        </div>
                    ";
            }
            // line 141
            echo "                ";
        }
        // line 142
        echo "                ";
        if ((($context["page_type"] ?? null) != "like_me")) {
            // line 143
            echo "                    ";
            $module =             null;
            $helper =             'special_offers';
            $name =             'specialOffersNotices';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            echo "                
                    <div class=\"main-inner-content\">
                        <div data-role=\"page\" id=\"main_page\">
                            <div class=\"container\">
                                ";
            // line 147
            if ((twig_test_empty(($context["header_type"] ?? null)) || ((($context["header_type"] ?? null) != "index") && (($context["header_type"] ?? null) != "view_magazine")))) {
                // line 148
                echo "                                <div class=\"row\">
                                    <div class=\"col-xs-12\">
                                        ";
                // line 150
                $module =                 null;
                $helper =                 'menu';
                $name =                 'get_breadcrumbs';
                $params = array(                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                // line 151
                echo "                                        ";
                $module =                 null;
                $helper =                 'banners';
                $name =                 'show_banner_place';
                $params = array("top-banner"                ,                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                // line 152
                echo "                                        ";
                $module =                 null;
                $helper =                 'banners';
                $name =                 'show_banner_place';
                $params = array("top-banner-185x75"                ,                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                // line 153
                echo "                                        ";
                $module =                 null;
                $helper =                 'banners';
                $name =                 'show_banner_place';
                $params = array("top-banner-320x75"                ,                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                // line 154
                echo "                                    </div>
                                    ";
                // line 155
                $module =                 null;
                $helper =                 'users';
                $name =                 'availableActivation';
                $params = array(                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                // line 156
                echo "                                </div>
                                ";
            }
            // line 158
            echo "                                <div class=\"row row-content\">
                                    <div class=\"col-xs-12 static-alert-block\" id=\"static-alert-block\"></div>
                ";
        } else {
            // line 161
            echo "                    <div class=\"main-inner-content\">
                        <div class=\"container\"></div>
                        <div data-role=\"page\" id=\"main_page\" class=\"b-likeme-page\">
                            <div class=\"container b-likeme_h100\">
                                <div class=\"row\">
                                    ";
            // line 166
            $module =             null;
            $helper =             'users';
            $name =             'availableActivation';
            $params = array(            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 167
            echo "                                </div>
                                <div class=\"row row-content b-likeme_h100\">
                                    <div class=\"b-likeme__alert\" id=\"static-alert-block\"></div>
                ";
        }
    }

    public function getTemplateName()
    {
        return "@app/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1078 => 167,  1057 => 166,  1050 => 161,  1045 => 158,  1041 => 156,  1020 => 155,  1017 => 154,  995 => 153,  973 => 152,  951 => 151,  930 => 150,  926 => 148,  924 => 147,  897 => 143,  894 => 142,  891 => 141,  887 => 139,  884 => 138,  862 => 137,  859 => 136,  838 => 135,  835 => 134,  832 => 133,  829 => 132,  827 => 131,  813 => 130,  799 => 129,  784 => 128,  781 => 127,  759 => 126,  757 => 125,  730 => 120,  707 => 119,  684 => 118,  671 => 112,  666 => 109,  662 => 107,  659 => 106,  656 => 105,  652 => 103,  631 => 102,  628 => 101,  625 => 100,  622 => 99,  619 => 98,  597 => 97,  575 => 96,  553 => 95,  532 => 94,  509 => 93,  501 => 92,  498 => 91,  476 => 90,  459 => 76,  451 => 75,  448 => 74,  446 => 73,  443 => 72,  421 => 71,  400 => 70,  393 => 66,  385 => 61,  380 => 59,  376 => 58,  363 => 49,  342 => 48,  339 => 47,  317 => 46,  295 => 45,  273 => 44,  252 => 43,  245 => 39,  240 => 37,  236 => 36,  232 => 35,  228 => 34,  224 => 33,  220 => 31,  198 => 30,  177 => 29,  170 => 28,  168 => 27,  158 => 24,  154 => 23,  149 => 21,  145 => 20,  141 => 18,  119 => 17,  98 => 16,  95 => 15,  92 => 14,  70 => 13,  49 => 12,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@app/header.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/views/flatty/header.twig");
    }
}
