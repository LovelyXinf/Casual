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
class __TwigTemplate_b0569f1ecec0fc8b0d64d96e176dbd8569476d2e175c22f91d9ef05f871ea4ef extends \Twig\Template
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
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 2
        echo $this->getAttribute(($context["_LANG"] ?? null), "rtl", []);
        echo "\" lang=\"";
        echo $this->getAttribute(($context["_LANG"] ?? null), "code", []);
        echo "\">
    <head>
        <meta http-equiv=\"X-UA-Compatible\">
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta http-equiv=\"expires\" content=\"0\">
        <meta http-equiv=\"pragma\" content=\"no-cache\">
        <meta name=\"revisit-after\" content=\"3 days\">
        <meta name=\"robot\" content=\"All\">
        ";
        // line 11
        $module =         null;
        $helper =         'seo';
        $name =         'seo_tags';
        $params = array("title|description|keyword|canonical|og_title|og_type|og_url|og_image|og_site_name|og_description"        ,        );
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
        // line 12
        echo "        <script src=\"";
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella/js/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 13
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella/js/loading_content.js\"></script>

        <!-- Bootstrap core CSS -->
        <link href=\"";
        // line 16
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella/css/bootstrap.min.css\" rel=\"stylesheet\">

        <link href=\"";
        // line 18
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella/css/font-awesome.min.css\" rel=\"stylesheet\">
        <link href=\"";
        // line 19
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella/css/animate.min.css\" rel=\"stylesheet\">
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">

        ";
        // line 22
        $module =         null;
        $helper =         'theme';
        $name =         'js';
        $params = array(($context["load_type"] ?? null)        ,        );
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
        // line 23
        echo "        ";
        $module =         null;
        $helper =         'theme';
        $name =         'css';
        $params = array(($context["load_type"] ?? null)        ,        );
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
        // line 24
        echo "        <script type=\"text/javascript\">
            var site_url = '";
        // line 25
        echo ($context["site_url"] ?? null);
        echo "';
            var site_rtl_settings = '";
        // line 26
        echo $this->getAttribute(($context["_LANG"] ?? null), "rtl", []);
        echo "';
            var site_error_position = ";
        // line 27
        if (($this->getAttribute(($context["_LANG"] ?? null), "rtl", []) == "ltr")) {
            // line 28
            echo "                \"left\"
            ";
        } else {
            // line 30
            echo "                \"right\"";
        }
        echo ";
        </script>

        ";
        // line 33
        $module =         null;
        $helper =         'start';
        $name =         'favicon';
        $params = array(["type" => "admin"]        ,        );
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
        // line 34
        echo "
        <!-- Custom styling plus plugins -->
        <link href=\"";
        // line 36
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella/css/icheck/flat/green.css\" rel=\"stylesheet\"/>
        <link href=\"";
        // line 37
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella/css/floatexamples.css\" rel=\"stylesheet\" type=\"text/css\"/>

        <script type=\"text/javascript\">
            var jQueryShow = \$.fn.show;
            \$.fn.show = function () {
                jQueryShow.apply(this);
                this.removeClass('hide');
                return this;
            };
        </script>
        ";
        // line 47
        $module =         null;
        $helper =         'start';
        $name =         'analytics';
        $params = array(        );
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
        // line 48
        echo "        ";
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"easyTooltip.min.js"        ,        );
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
        echo "        ";
        $module =         null;
        $helper =         'seo_advanced';
        $name =         'seo_traker';
        $params = array("top"        ,true        ,        );
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
        // line 50
        echo "    </head>

    <body class=\"nav-md\">
        ";
        // line 53
        $module =         null;
        $helper =         'start';
        $name =         'demo_panel';
        $params = array(["type" => "admin", "place" => "top"]        ,        );
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
        // line 54
        echo "        <div id=\"error_block\">
            ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "error", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 56
            echo "                ";
            if ($this->getAttribute($context["item"], "text", [])) {
                // line 57
                echo "                    ";
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>
                ";
            }
            // line 59
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "        </div>
        <div id=\"info_block\">
            ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "info", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 63
            echo "                ";
            if ($this->getAttribute($context["item"], "text", [])) {
                // line 64
                echo "                    ";
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>
                ";
            }
            // line 66
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "        </div>
        <div id=\"success_block\">
            ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "success", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 70
            echo "                ";
            if ($this->getAttribute($context["item"], "text", [])) {
                // line 71
                echo "                    ";
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>
                ";
            }
            // line 73
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "        </div>

        <div class=\"container body ";
        // line 76
        if (($context["login_page"] ?? null)) {
            echo " container_loginpage ";
        }
        echo "\">
            <div
                class=\"main_container\">

                <!-- Left column -->
                <div class=\"left-sidebar\" id=\"left_col\">
                    <div class=\"left_col scroll-view\">
                        <div class=\"navbar nav_title\">
                            <a class=\"site_title\" href=\"";
        // line 84
        echo ($context["site_url"] ?? null);
        echo "admin/\">
                                <img src=\"";
        // line 85
        echo ($context["site_root"] ?? null);
        echo $this->getAttribute(($context["logo_settings"] ?? null), "path", []);
        echo "?";
        echo twig_random($this->env);
        echo "\" border=\"0\" alt=\"logo\" width=\"";
        echo $this->getAttribute(($context["logo_settings"] ?? null), "width", []);
        echo "\" height=\"";
        echo $this->getAttribute(($context["logo_settings"] ?? null), "height", []);
        echo "\" class=\"site-logo\">
                                <img src=\"";
        // line 86
        echo ($context["site_root"] ?? null);
        echo $this->getAttribute(($context["mini_logo_settings"] ?? null), "path", []);
        echo "?";
        echo twig_random($this->env);
        echo "\" border=\"0\" alt=\"logo\" width=\"";
        echo $this->getAttribute(($context["mini_logo_settings"] ?? null), "width", []);
        echo "\" height=\"";
        echo $this->getAttribute(($context["mini_logo_settings"] ?? null), "height", []);
        echo "\" class=\"site-mini-logo\">
                            </a>
                        </div>
                        <div class=\"clearfix\"></div>

                        <div
                            id=\"sidebar-menu\" class=\"main_menu_side hidden-print main_menu\">
                            <!-- Menu -->
                            ";
        // line 94
        if (($context["initial_setup"] ?? null)) {
            // line 95
            echo "                                ";
            $module =             null;
            $helper =             'install';
            $name =             'get_initial_setup_menu';
            $params = array(($context["step"] ?? null)            ,            );
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
            echo "                            ";
        } elseif (($context["modules_setup"] ?? null)) {
            // line 97
            echo "                                ";
            $module =             null;
            $helper =             'install';
            $name =             'get_modules_setup_menu';
            $params = array(($context["step"] ?? null)            ,            );
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
            echo "                            ";
        } elseif (($context["product_setup"] ?? null)) {
            // line 99
            echo "                                ";
            $module =             null;
            $helper =             'install';
            $name =             'get_product_setup_menu';
            $params = array(($context["step"] ?? null)            ,            );
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
            // line 100
            echo "                            ";
        } else {
            // line 101
            echo "                                ";
            if ((($context["auth_type"] ?? null) == "admin")) {
                // line 102
                echo "                                    ";
                $module =                 null;
                $helper =                 'fast_navigation';
                $name =                 'fast_navigation_helper';
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
                // line 103
                echo "                                ";
            }
            // line 104
            echo "                                ";
            $module =             null;
            $helper =             'menu';
            $name =             'get_admin_main_menu';
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
            // line 105
            echo "                            ";
        }
        // line 106
        echo "                        </div>
                    </div>
                </div>

                <!-- Right column -->
                ";
        // line 112
        echo "                ";
        if ( !($context["login_page"] ?? null)) {
            // line 113
            echo "                    <div id=\"top_nav\" class=\"top_nav\">
                        <div class=\"nav_menu ";
            // line 114
            if (($context["menu_disabled"] ?? null)) {
                echo "hide";
            }
            echo "\">

                            <nav role=\"navigation\">
                                <div class=\"row\">
                                    <div class=\"col-md-8 col-sm-6 col-xs-6\">
                                        <div class=\"nav toggle\">
                                            <a id=\"menu_toggle\">
                                                <i class=\"fa fa-bars\"></i>
                                            </a>
                                        </div>
                                        <div class=\"nav navbar-nav nav-left version\">
                                            <span class=\"sm-hide\">";
            // line 125
            $module =             null;
            $helper =             'start';
            $name =             'product_version';
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
            echo "</span>
                                            ";
            // line 127
            echo "                                        </div>
                                    </div>
                                    <div class=\"col-md-4 col-sm-6 col-xs-6\">

                                        ";
            // line 131
            if ((($context["auth_type"] ?? null) == "admin")) {
                // line 132
                echo "                                            <ul class=\"nav navbar-nav navbar-right\">

                                                <li>
                                                    <ul class=\"list-inline\">
                                                        <li>
                                                            ";
                // line 137
                if ( !call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["modules_setup"] ?? null)])) {
                    // line 138
                    echo "                                                                <a href=\"";
                    echo ($context["site_url"] ?? null);
                    echo "admin/install/logoff\" class=\"logoff\">
                                                                    ";
                    // line 139
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("btn_logoff"                    ,"start"                    ,                    );
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
                    // line 140
                    echo "                                                                </a>
                                                            ";
                } elseif (( !call_user_func_array($this->env->getFunction('empty')->getCallable(), [                // line 141
($context["initial_setup"] ?? null)]) ||  !call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["product_setup"] ?? null)]))) {
                    // line 142
                    echo "
                                                            ";
                } elseif ((                // line 143
($context["auth_type"] ?? null) == "admin")) {
                    // line 144
                    echo "                                                                ";
                    $module =                     null;
                    $helper =                     'ausers';
                    $name =                     'logOff';
                    $params = array(                    );
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
                    // line 145
                    echo "                                                            ";
                }
                // line 146
                echo "                                                        </li>
                                                        ";
                // line 147
                if (((call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["initial_setup"] ?? null)]) && call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["modules_setup"] ?? null)])) && call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["product_setup"] ?? null)]))) {
                    // line 148
                    echo "                                                            <li>
                                                                ";
                    // line 149
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'adminLangSelect';
                    $params = array(                    );
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
                    // line 150
                    echo "                                                            </li>
                                                            ";
                    // line 152
                    echo "                                                        ";
                }
                // line 153
                echo "                                                    </ul>
                                                </li>
                                            </ul>
                                        ";
            }
            // line 157
            echo "
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <script src=\"";
            // line 162
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/menu.js\"></script>
                    </div>
                ";
        }
        // line 165
        echo "                <div class=\"right_col\" role=\"main\">
                    <div class=\"right-sidebar\">
                        <div class=\"page-title ";
        // line 167
        if (($context["login_page"] ?? null)) {
            echo "hide";
        }
        echo "\">
                            ";
        // line 168
        if ($this->getAttribute(($context["_PREDEFINED"] ?? null), "back_link", [])) {
            // line 169
            echo "                                <div class=\"quest-block back-link\">
                                    <a href=\"";
            // line 170
            echo $this->getAttribute(($context["_PREDEFINED"] ?? null), "back_link", []);
            echo "\" class=\"back\">
                                        ";
            // line 171
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_back"            ,"start"            ,            );
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
            echo "</a>&nbsp;
                                </div>
                            ";
        }
        // line 174
        echo "                            <div class=\"title_left\">
                                <h3>";
        // line 175
        echo $this->getAttribute(($context["_PREDEFINED"] ?? null), "header", []);
        echo "</h3>
                            </div>
                            ";
        // line 177
        $module =         null;
        $helper =         'start';
        $name =         'moduleInstructions';
        $params = array(        );
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
        // line 178
        echo "                            ";
        // line 179
        echo "                        </div>
                        <div class=\"clearfix\"></div>
                        <div class=\"row\">
";
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
        return array (  801 => 179,  799 => 178,  778 => 177,  773 => 175,  770 => 174,  745 => 171,  741 => 170,  738 => 169,  736 => 168,  730 => 167,  726 => 165,  720 => 162,  713 => 157,  707 => 153,  704 => 152,  701 => 150,  680 => 149,  677 => 148,  675 => 147,  672 => 146,  669 => 145,  647 => 144,  645 => 143,  642 => 142,  640 => 141,  637 => 140,  616 => 139,  611 => 138,  609 => 137,  602 => 132,  600 => 131,  594 => 127,  571 => 125,  555 => 114,  552 => 113,  549 => 112,  542 => 106,  539 => 105,  517 => 104,  514 => 103,  492 => 102,  489 => 101,  486 => 100,  464 => 99,  461 => 98,  439 => 97,  436 => 96,  414 => 95,  412 => 94,  394 => 86,  383 => 85,  379 => 84,  366 => 76,  362 => 74,  356 => 73,  350 => 71,  347 => 70,  343 => 69,  339 => 67,  333 => 66,  327 => 64,  324 => 63,  320 => 62,  316 => 60,  310 => 59,  304 => 57,  301 => 56,  297 => 55,  294 => 54,  273 => 53,  268 => 50,  246 => 49,  224 => 48,  203 => 47,  190 => 37,  186 => 36,  182 => 34,  161 => 33,  154 => 30,  150 => 28,  148 => 27,  144 => 26,  140 => 25,  137 => 24,  115 => 23,  94 => 22,  88 => 19,  84 => 18,  79 => 16,  73 => 13,  68 => 12,  47 => 11,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@app/header.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/views/gentelella/header.twig");
    }
}
