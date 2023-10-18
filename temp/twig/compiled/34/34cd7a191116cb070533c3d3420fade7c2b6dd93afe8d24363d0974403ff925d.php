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
class __TwigTemplate_0227cced70666f80156433f5c30cd046f9fd2824874121574e7524a9700b6ac3 extends \Twig\Template
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
<html DIR=\"";
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
    <meta name=\"robot\" content=\"All\">";
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
        echo "    <script src=\"";
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 13
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/loading_content.js\"></script>

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 16
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/css/bootstrap.min.css\" rel=\"stylesheet\">

    <link href=\"";
        // line 18
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/css/font-awesome.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 19
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/css/animate.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 20
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/pnotify/pnotify.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 21
        echo ($context["site_root"] ?? null);
        echo "application/js/emoji-picker/css/emoji.css\" rel=\"stylesheet\">";
        // line 24
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
        // line 25
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
        // line 26
        echo "    <script type=\"text/javascript\">
        var site_url = '";
        // line 27
        echo ($context["site_url"] ?? null);
        echo "';
        var site_rtl_settings = '";
        // line 28
        echo $this->getAttribute(($context["_LANG"] ?? null), "rtl", []);
        echo "';
        var site_error_position =";
        // line 29
        if (($this->getAttribute(($context["_LANG"] ?? null), "rtl", []) == "ltr")) {
            echo "\"left\"";
        } else {
            echo "\"right\"";
        }
        echo ";
    </script>";
        // line 32
        $module =         null;
        $helper =         'start';
        $name =         'favicon';
        $params = array(["type" => "operator"]        ,        );
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
        // line 33
        echo "
    <!-- Custom styling plus plugins -->
    <link href=\"";
        // line 35
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/css/icheck/flat/green.css\" rel=\"stylesheet\" />
    <link href=\"";
        // line 36
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/css/floatexamples.css\" rel=\"stylesheet\" type=\"text/css\" />

    <script type=\"text/javascript\">
        var jQueryShow = \$.fn.show;
        \$.fn.show = function() {
            jQueryShow.apply(this);
            this.removeClass('hide');
            return this;
        };
    </script>";
        // line 47
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
        echo "</head>

<body class=\"nav-md\">
    <div id=\"error_block\">";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "error", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 54
            if ($this->getAttribute($context["item"], "text", [])) {
                // line 55
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "    </div>
    <div id=\"info_block\">";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "info", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 61
            if ($this->getAttribute($context["item"], "text", [])) {
                // line 62
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "    </div>
    <div id=\"success_block\">";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["_PREDEFINED"] ?? null), "success", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 68
            if ($this->getAttribute($context["item"], "text", [])) {
                // line 69
                echo $this->getAttribute($context["item"], "text", []);
                echo "<br>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "    </div>

    <div class=\"container body";
        // line 74
        if (($context["login_page"] ?? null)) {
            echo " container_loginpage";
        }
        echo "\">
        <!-- Left column -->
        <div class=\"left-sidebar\" id=\"left_col\">
            <div class=\"left_col scroll-view\">
                <div class=\"navbar nav_title\">
                    <a class=\"site_title\" href=\"";
        // line 79
        echo ($context["site_url"] ?? null);
        echo "operator/\">
                        <img src=\"";
        // line 80
        echo ($context["site_root"] ?? null);
        echo $this->getAttribute(($context["logo_settings"] ?? null), "path", []);
        echo "\" border=\"0\" alt=\"logo\"
                            width=\"";
        // line 81
        echo $this->getAttribute(($context["logo_settings"] ?? null), "width", []);
        echo "\" height=\"";
        echo $this->getAttribute(($context["logo_settings"] ?? null), "height", []);
        echo "\" class=\"site-logo\">
                            <img src=\"";
        // line 82
        echo ($context["site_root"] ?? null);
        echo $this->getAttribute(($context["mini_logo_settings"] ?? null), "path", []);
        echo "\" border=\"0\" alt=\"logo\"
                                width=\"";
        // line 83
        echo $this->getAttribute(($context["mini_logo_settings"] ?? null), "width", []);
        echo "\" height=\"";
        echo $this->getAttribute(($context["mini_logo_settings"] ?? null), "height", []);
        echo "\" class=\"site-mini-logo\">
                    </a>
                </div>
                <div class=\"clearfix\"></div>

                <div id=\"sidebar-menu\" class=\"main_menu_side hidden-print main_menu\">
                <!-- Menu -->";
        // line 90
        $module =         null;
        $helper =         'menu';
        $name =         'getOperatorMainMenu';
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
        // line 91
        echo "                </div>
            </div>
        </div>
        <!-- Right column -->
        <div class=\"main_container\">";
        // line 97
        if ( !($context["login_page"] ?? null)) {
            // line 98
            echo "                    <div id=\"top_nav\" class=\"top_nav\">
                        <div class=\"nav_menu";
            // line 99
            if (($context["menu_disabled"] ?? null)) {
                echo "hide";
            }
            echo "\">

                            <nav role=\"navigation\">
                                <div class=\"clearfix\">
                                    <div class=\"nav toggle\">
                                        <a id=\"menu_toggle\"><i class=\"fa fa-bars\"></i></a>
                                    </div>";
            // line 106
            if ((($context["auth_type"] ?? null) == "operator")) {
                // line 107
                echo "                                        <ul class=\"nav navbar-nav navbar-right\">
                                            <li>
                                                <ul class=\"list-inline\">";
                // line 110
                if ((($context["auth_type"] ?? null) == "operator")) {
                    // line 111
                    echo "                                                        <li>
                                                            <a href=\"";
                    // line 112
                    echo ($context["site_url"] ?? null);
                    echo "operator/start/logout\" class=\"logoff\">";
                    // line 113
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_logoff"                    ,"ausers"                    ,                    );
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
                    // line 114
                    echo "                                                            </a>
                                                        </li>";
                }
                // line 117
                echo "                                                    <li>";
                // line 118
                $module =                 null;
                $helper =                 'operators';
                $name =                 'langSelect';
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
                // line 119
                echo "                                                    </li>
                                                    <li>";
                // line 121
                $module =                 null;
                $helper =                 'operators';
                $name =                 'currentBalance';
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
                // line 122
                echo "                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>";
            }
            // line 127
            echo "                                </div>
                            </nav>
                        </div>
                        <script src=\"";
            // line 130
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella_operator/js/menu.js\"></script>
                    </div>";
        }
        // line 133
        echo "                <div class=\"right_col\" role=\"main\">
                    <div class=\"right-sidebar\">
                        <div class=\"page-title";
        // line 135
        if (($context["login_page"] ?? null)) {
            echo "hide";
        }
        echo "\">";
        // line 136
        if ($this->getAttribute(($context["_PREDEFINED"] ?? null), "back_link", [])) {
            // line 137
            echo "                            <div class=\"quest-block back-link\">
                                <a href=\"";
            // line 138
            echo $this->getAttribute(($context["_PREDEFINED"] ?? null), "back_link", []);
            echo "\" class=\"back\">";
            // line 139
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
                            </div>";
        }
        // line 142
        echo "                            <div class=\"title_left\">
                                <h3>";
        // line 143
        echo $this->getAttribute(($context["_PREDEFINED"] ?? null), "header", []);
        echo "</h3>
                            </div>
                        </div>
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
        return array (  508 => 143,  505 => 142,  481 => 139,  478 => 138,  475 => 137,  473 => 136,  468 => 135,  464 => 133,  459 => 130,  454 => 127,  448 => 122,  427 => 121,  424 => 119,  403 => 118,  401 => 117,  397 => 114,  376 => 113,  373 => 112,  370 => 111,  368 => 110,  364 => 107,  362 => 106,  351 => 99,  348 => 98,  346 => 97,  340 => 91,  319 => 90,  308 => 83,  303 => 82,  297 => 81,  292 => 80,  288 => 79,  278 => 74,  274 => 72,  266 => 69,  264 => 68,  260 => 67,  257 => 65,  249 => 62,  247 => 61,  243 => 60,  240 => 58,  232 => 55,  230 => 54,  226 => 53,  221 => 49,  200 => 47,  188 => 36,  184 => 35,  180 => 33,  159 => 32,  151 => 29,  147 => 28,  143 => 27,  140 => 26,  119 => 25,  98 => 24,  95 => 21,  91 => 20,  87 => 19,  83 => 18,  78 => 16,  72 => 13,  67 => 12,  46 => 11,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@app/header.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/views/gentelella_operator/header.twig");
    }
}
