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

/* list_installed.twig */
class __TwigTemplate_82f01943a36a94951c4eeec07c1232b0ca3b716970bdb76ef8f1357d2bf2ab99 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_installed.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"menu-level2 hidden-xs\">
    <ul class=\"nav nav-tabs bar_tabs\">
        <li class=\"active\"><a href=\"";
        // line 5
        echo ($context["site_url"] ?? null);
        echo "admin/themes/installed_themes\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_installed_themes"        ,"themes"        ,        );
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
        echo "</a></li>
        <li><a href=\"";
        // line 6
        echo ($context["site_url"] ?? null);
        echo "admin/themes/enable_themes\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_enable_themes"        ,"themes"        ,        );
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
        echo "</a></li>
    </ul>
    &nbsp;
</div>

<div class=\"menu-level2 visible-xs\">
    <ul class=\"nav nav-tabs tabs-left\">
        <li class=\"active\"><a href=\"";
        // line 13
        echo ($context["site_url"] ?? null);
        echo "admin/themes/installed_themes\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_installed_themes"        ,"themes"        ,        );
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
        echo "</a></li>
        <li><a href=\"";
        // line 14
        echo ($context["site_url"] ?? null);
        echo "admin/themes/enable_themes\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_enable_themes"        ,"themes"        ,        );
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
        echo "</a></li>
    </ul>
    &nbsp;
</div>

<div class=\"x_panel\">
    <div class=\"menu-level3 hidden-xs\">
        <ul class=\"nav nav-tabs bar_tabs\">
            ";
        // line 23
        echo "            <li class=\"";
        if ((($context["type"] ?? null) == "admin")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter"] ?? null), "admin", [])) {
            echo " hide";
        }
        echo "\"><a href=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/themes/installed_themes/admin\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_admin_themes"        ,"themes"        ,        );
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
        echo " (";
        echo $this->getAttribute(($context["filter"] ?? null), "admin", []);
        echo ")</a></li>
            ";
        // line 25
        echo "            <li class=\"";
        if ((($context["type"] ?? null) == "operator")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter"] ?? null), "operator", [])) {
            echo " hide";
        }
        echo "\"><a href=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/themes/installed_themes/operator\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_operator_themes"        ,"themes"        ,        );
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
        echo " (";
        echo $this->getAttribute(($context["filter"] ?? null), "operator", []);
        echo ")</a></li>
            ";
        // line 27
        echo "        </ul>
        &nbsp;
    </div>

    <div class=\"menu-level3 visible-xs\">
        <ul class=\"nav nav-tabs tabs-left\">
            ";
        // line 34
        echo "            <li class=\"";
        if ((($context["type"] ?? null) == "admin")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter"] ?? null), "admin", [])) {
            echo " hide";
        }
        echo "\"><a href=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/themes/installed_themes/admin\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_admin_themes"        ,"themes"        ,        );
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
        echo " (";
        echo $this->getAttribute(($context["filter"] ?? null), "admin", []);
        echo ")</a></li>
            ";
        // line 36
        echo "            <li class=\"";
        if ((($context["type"] ?? null) == "operator")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter"] ?? null), "operator", [])) {
            echo " hide";
        }
        echo "\"><a href=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/themes/installed_themes/operator\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_operator_themes"        ,"themes"        ,        );
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
        echo " (";
        echo $this->getAttribute(($context["filter"] ?? null), "operator", []);
        echo ")</a></li>
            ";
        // line 38
        echo "        </ul>
        &nbsp;
    </div>

    <div class=\"row form-group\">
            <div class=\"col-md-2 col-sm-2 col-xs-6\">
                <select id=\"section_btn\" class=\"form-control\">
                    ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 46
            echo "                        <option value=\"";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">";
            echo $this->getAttribute($context["item"], "theme", []);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "                </select>
            </div>
            <div class=\"col-md-2 col-sm-2 col-xs-6\">
                <div class=\"btn-group\">
                    <a id=\"edit_set\" onclick=\"";
        // line 52
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("themes"        ,"sets_btn_add"        ,        );
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
        echo "\" class=\"btn btn-primary\" data-url=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/themes/edit_set/\" href=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/themes/edit_set/\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_set"        ,"themes"        ,        );
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
        echo "</a>
                </div>
            </div>
    </div>

    <table id=\"data\" class=\"table table-striped responsive-utilities jambo_table bulk_action\">
        <thead>
            <tr class=\"headings\">
                <th class=\"hidden-xs\">&nbsp;</th>
                <th>";
        // line 61
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_theme"        ,"themes"        ,        );
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
        echo "</th>
                <th class=\"hidden-xs\">";
        // line 62
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_description"        ,"themes"        ,        );
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
        echo "</th>
                <th>";
        // line 63
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_active"        ,"themes"        ,        );
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
        echo "</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 69
            echo "                <tr class=\"even pointer\">
                    <td class=\"hidden-xs\">";
            // line 70
            if ($this->getAttribute($context["item"], "img", [])) {
                // line 71
                echo "                        <img src=\"";
                echo $this->getAttribute($context["item"], "img", []);
                echo "\" class=\"img\">";
            }
            // line 72
            echo "                    </td>
                    <td >
                        ";
            // line 74
            echo $this->getAttribute($context["item"], "theme", []);
            echo "
                        ";
            // line 75
            if ($this->getAttribute($context["item"], "default", [])) {
                echo "&nbsp;(";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("field_default"                ,"themes"                ,                );
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
                echo ")";
            }
            // line 76
            echo "                    </td>
                    <td class=\"hidden-xs\"><b>";
            // line 77
            echo $this->getAttribute($context["item"], "theme_name", []);
            echo "</b><br>";
            echo $this->getAttribute($context["item"], "theme_description", []);
            echo "</td>
                    <td>
                        ";
            // line 79
            if ($this->getAttribute($context["item"], "active", [])) {
                // line 80
                echo "                            ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_tableicon_is_active"                ,"start"                ,                );
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
                // line 81
                echo "                        ";
            } else {
                // line 82
                echo "                            ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_tableicon_is_not_active"                ,"start"                ,                );
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
                // line 83
                echo "                        ";
            }
            // line 84
            echo "                    </td>
                    <td class=\"icons\">
                        <div class=\"btn-group\">
                            ";
            // line 87
            if ( !$this->getAttribute($context["item"], "active", [])) {
                // line 88
                echo "                            <button type=\"button\" class=\"btn btn-primary\"
                                    title=\"";
                // line 89
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_activate_theme"                ,"themes"                ,                );
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
                echo "\"
                                    onclick=\"";
                // line 90
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("themes"                ,"btn_activate"                ,                );
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
                echo "document.location.href = '";
                echo ($context["site_url"] ?? null);
                echo "admin/themes/activate/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "/1'\">
                                ";
                // line 91
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("make_active"                ,"start"                ,                );
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
                // line 92
                echo "                            </button>
                            ";
            }
            // line 94
            echo "
                            ";
            // line 95
            if (( !$this->getAttribute($context["item"], "active", []) &&  !$this->getAttribute($context["item"], "default", []))) {
                // line 96
                echo "                            <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                    aria-haspopup=\"true\" aria-expanded=\"false\">
                                <span class=\"caret\"></span>
                                <span class=\"sr-only\">Toggle Dropdown</span>
                            </button>
                            <ul class=\"dropdown-menu\">
                                ";
                // line 102
                if ( !$this->getAttribute($context["item"], "active", [])) {
                    // line 103
                    echo "                                <li onclick=\"";
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'setAnalytics';
                    $params = array("themes"                    ,"btn_activate"                    ,                    );
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
                    echo "\">
                                    <a href=\"";
                    // line 104
                    echo ($context["site_url"] ?? null);
                    echo "admin/themes/activate/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "/1\">
                                        ";
                    // line 105
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("make_active"                    ,"start"                    ,                    );
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
                    // line 106
                    echo "                                    </a>
                                </li>
                                ";
                }
                // line 109
                echo "                                <li>
                                    ";
                // line 110
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_uninstall_theme"                ,"themes"                ,""                ,($context["js"] ?? null)                ,                );
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
                $context['note_uninstall'] = $result;
                // line 111
                echo "                                    <a class=\"delete_theme\" data-link=\"";
                echo ($context["site_url"] ?? null);
                echo "admin/themes/uninstall/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\" href=\"#\">
                                        ";
                // line 112
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_uninstall_theme"                ,"themes"                ,                );
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
                // line 113
                echo "                                    </a>
                                </li>
                            </ul>
                            ";
            }
            // line 117
            echo "                        </div>
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "        </tbody>
    </table>
    <table id=\"users\" class=\"table table-striped responsive-utilities jambo_table bulk_action\">
        <thead>
            <tr class=\"headings\">
                <th class=\"hidden-xs\">&nbsp;</th>
                <th>";
        // line 127
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_theme"        ,"themes"        ,        );
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
        echo "</th>
                <th class=\"hidden-xs\">";
        // line 128
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_description"        ,"themes"        ,        );
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
        echo "</th>
                <th>";
        // line 129
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_active"        ,"themes"        ,        );
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
        echo "</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        ";
        // line 133
        if (($context["sets"] ?? null)) {
            // line 134
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["sets"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["items"]) {
                // line 135
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["items"]);
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 136
                    echo "                <tbody>
                    <tr ";
                    // line 137
                    if (($this->getAttribute($context["item"], "active", []) && $this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "active", []))) {
                        echo "class=\"selected\"";
                    }
                    echo ">
                        <td class=\"hidden-xs\"><div style=\"margin: 2px; background-color: #";
                    // line 138
                    echo $this->getAttribute($this->getAttribute($context["item"], "color_settings", []), "main_bg", []);
                    echo "\">&nbsp;</div></td>
                        <td >
                            ";
                    // line 140
                    echo $this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "theme", []);
                    echo "
                            ";
                    // line 141
                    if ($this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "default", [])) {
                        echo "&nbsp;(";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("field_default"                        ,"themes"                        ,                        );
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
                        echo ")";
                    }
                    // line 142
                    echo "                        </td>
                        <td class=\"hidden-xs\"><b>";
                    // line 143
                    echo $this->getAttribute($context["item"], "set_name", []);
                    echo "</b><br>";
                    echo $this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "theme_description", []);
                    echo "</td>
                        <td>
                            ";
                    // line 145
                    if (($this->getAttribute($context["item"], "active", []) && $this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "active", []))) {
                        // line 146
                        echo "                                ";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("btn_tableicon_is_active"                        ,"start"                        ,                        );
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
                        // line 147
                        echo "                            ";
                    } else {
                        // line 148
                        echo "                                ";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("btn_tableicon_is_not_active"                        ,"start"                        ,                        );
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
                        // line 149
                        echo "                            ";
                    }
                    // line 150
                    echo "                        </td>
                        <td class=\"icons\">
                            <div class=\"btn-group\">
                                ";
                    // line 153
                    if (( !$this->getAttribute($context["item"], "active", []) && $this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "active", []))) {
                        // line 154
                        echo "                                    <button type=\"button\" class=\"btn btn-primary\" title=\"";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("link_activate_set"                        ,"themes"                        ,                        );
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
                        echo "\"
                                            onclick = \"";
                        // line 155
                        $module =                         null;
                        $helper =                         'start';
                        $name =                         'setAnalytics';
                        $params = array("themes"                        ,"sets_btn_activate"                        ,                        );
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
                        echo "document.location.href = '";
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/activate_set/";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "/1/";
                        echo ($context["type"] ?? null);
                        echo "'\">";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("make_active_now"                        ,"themes"                        ,                        );
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
                        echo "                                    </button>
                                ";
                    } elseif ((($this->getAttribute(                    // line 157
($context["theme"] ?? null), "theme_type", []) == "admin") || ($this->getAttribute(($context["theme"] ?? null), "theme_type", []) == "operator"))) {
                        // line 158
                        echo "                                    <a class=\"btn btn-primary\" href=\"";
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/edit_set/";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\">
                                    ";
                        // line 159
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("link_edit_set"                        ,"themes"                        ,                        );
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
                        echo "</a>
                                ";
                    } elseif ( !$this->getAttribute($this->getAttribute(                    // line 160
($context["true_theme"] ?? null), $context["key"], [], "array"), "active", [])) {
                        // line 161
                        echo "                                    <a class=\"btn btn-primary\" href=\"";
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/edit_set/";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\">
                                    ";
                        // line 162
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("link_edit_set"                        ,"themes"                        ,                        );
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
                        echo "</a>
                                ";
                    } else {
                        // line 164
                        echo "                                    <a class=\"btn btn-primary\" href=\"";
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/edit_set/";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\">
                                    ";
                        // line 165
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("link_edit_set"                        ,"themes"                        ,                        );
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
                        echo "</a>
                                ";
                    }
                    // line 167
                    echo "
                                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                        aria-haspopup=\"true\" aria-expanded=\"false\">
                                    <span class=\"caret\"></span>
                                    <span class=\"sr-only\">Toggle Dropdown</span>
                                </button>

                                <ul class=\"dropdown-menu\">
                                    ";
                    // line 175
                    if (( !$this->getAttribute($context["item"], "active", []) && $this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "active", []))) {
                        // line 176
                        echo "                                        <li onclick=\"";
                        $module =                         null;
                        $helper =                         'start';
                        $name =                         'setAnalytics';
                        $params = array("themes"                        ,"sets_btn_activate"                        ,                        );
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
                        echo "\">
                                            <a href=\"";
                        // line 177
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/activate_set/";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "/1/";
                        echo ($context["type"] ?? null);
                        echo "\">";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("make_active_now"                        ,"themes"                        ,                        );
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
                        echo "</a>
                                        </li>
                                    ";
                    }
                    // line 180
                    echo "                                    ";
                    if (((($context["type"] ?? null) != "admin") && (($context["type"] ?? null) != "operator"))) {
                        // line 181
                        echo "                                        <li>
                                            <a href=\"";
                        // line 182
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/preview/";
                        echo $this->getAttribute($this->getAttribute(($context["true_theme"] ?? null), $context["key"], [], "array"), "theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "set_gid", []);
                        echo "\" target=\"_blank\">
                                                ";
                        // line 183
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("link_preview_theme"                        ,"themes"                        ,                        );
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
                        echo "</a>
                                        </li>
                                    ";
                    }
                    // line 186
                    echo "                                    <li  onclick=\"";
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'setAnalytics';
                    $params = array("themes"                    ,"sets_btn_edit"                    ,                    );
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
                    echo "\">
                                        <a href=\"";
                    // line 187
                    echo ($context["site_url"] ?? null);
                    echo "admin/themes/edit_set/";
                    echo $this->getAttribute($context["item"], "id_theme", []);
                    echo "/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "\">
                                        ";
                    // line 188
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("edit_colours"                    ,"themes"                    ,                    );
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
                    echo "</a>
                                    </li>
                                    ";
                    // line 190
                    if ($this->getAttribute($context["item"], "active", [])) {
                        // line 191
                        echo "                                    <li  onclick=\"";
                        $module =                         null;
                        $helper =                         'start';
                        $name =                         'setAnalytics';
                        $params = array("themes"                        ,"sets_btn_regenerate_css"                        ,                        );
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
                        echo "\">
                                        <a href=\"";
                        // line 192
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/edit_set/";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "/1\">
                                        ";
                        // line 193
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("regenerate"                        ,"themes"                        ,                        );
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
                        echo "</a>
                                    </li>
                                    ";
                    }
                    // line 196
                    echo "                                    <li onclick=\"";
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'setAnalytics';
                    $params = array("themes"                    ,"btn_edit"                    ,                    );
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
                    echo "\" >
                                        <a href=\"";
                    // line 197
                    echo ($context["site_url"] ?? null);
                    echo "admin/themes/view_installed/";
                    echo $context["key"];
                    echo "/";
                    echo ($context["lang_id"] ?? null);
                    echo "/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "\">
                                        ";
                    // line 198
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("edit_logo"                    ,"themes"                    ,                    );
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
                    echo "</a>
                                    </li>
                                    ";
                    // line 200
                    if ( !$this->getAttribute($context["item"], "active", [])) {
                        // line 201
                        echo "                                        <li>";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("note_delete_set"                        ,"themes"                        ,""                        ,($context["js"] ?? null)                        ,                        );
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
                        $context['note_delete'] = $result;
                        // line 202
                        echo "                                            <a class=\"delete_set\" href=\"#\" data-theme=\"";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "\" data-set=\"";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\" data-link=\"";
                        echo ($context["site_url"] ?? null);
                        echo "admin/themes/delete_set/";
                        echo $this->getAttribute($context["item"], "id_theme", []);
                        echo "/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\">";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("link_delete_set"                        ,"themes"                        ,                        );
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
                        echo "</a>
                                        </li>
                                    ";
                    }
                    // line 205
                    echo "                                </ul>
                            </div>
                        </td>
                    </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 210
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['items'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 211
            echo "            ";
        } else {
            // line 212
            echo "                <tr><td colspan=\"3\" class=\"center\">";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("no_sets"            ,"themes"            ,            );
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
            echo "</td></tr>
            ";
        }
        // line 214
        echo "        </tbody>
    </table>
</div>
<!-- Datatables -->
<script>
var asInitVals = new Array();
\$(document).ready(function() {
    var oTable = \$('#data').dataTable({
        \"oLanguage\": {
            \"sSearch\": \"";
        // line 223
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("search_all_column"        ,"start"        ,        );
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
        echo ":\",
            \"sEmptyTable\": \"";
        // line 224
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_themes"        ,"themes"        ,        );
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
        echo "\"
        },
        \"aoColumnDefs\": [{
                'bSortable': false,
                'aTargets': []
            } //disables sorting for column one
        ],
        'iDisplayLength': 10,
        \"bPaginate\": false,
        \"bInfo\": false,
        \"bSort\": false,
        \"bFilter\": false,
        \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
    });
    \$(\"tfoot input\").keyup(function() {
        /* Filter on the column based on the index of this element's parent <th> */
        oTable.fnFilter(this.value, \$(\"tfoot th\").index(\$(this).parent()));
    });
    \$(\"tfoot input\").each(function(i) {
        asInitVals[i] = this.value;
    });
    \$(\"tfoot input\").focus(function() {
        if (this.className == \"search_init\") {
            this.className = \"\";
            this.value = \"\";
        }
    });
    \$(\"tfoot input\").blur(function(i) {
        if (this.value == \"\") {
            this.className = \"search_init\";
            this.value = asInitVals[\$(\"tfoot input\").index(this)];
        }
    });
    var actions = \$(\"#actions\");
    \$('#data_wrapper').find('.actions').html(actions.html());
    actions.remove();

    \$('#section_btn').change(function() {
        var href = \$('#edit_set').data('url');
        href = href + \$('#section_btn').val();
        \$('#edit_set').attr('href', href);
    });

    \$('#section_btn').val(\$(\"#section_btn option:first\").val()).change();



    var delete_set = new loadingContent({
        loadBlockSize: 'small',
        loadBlockLeftType: 'center',
        loadBlockTopType: 'center',
        closeBtnClass: 'close',
        footerButtons: '<input type=\"submit\" id=\"set_delete\" name=\"btn_confirm\" value=\"";
        // line 276
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_confirm"        ,"media"        ,        );
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
        echo "\" class=\"btn btn-primary\">'
    });

    var delete_theme = new loadingContent({
        loadBlockSize: 'small',
        loadBlockLeftType: 'center',
        loadBlockTopType: 'center',
        closeBtnClass: 'close',
        footerButtons: '<input type=\"submit\" id=\"theme_delete\" name=\"btn_confirm\" value=\"";
        // line 284
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_confirm"        ,"media"        ,        );
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
        echo "\" class=\"btn btn-primary\">'
    });

    var content_set = '<div class=\"load_content_controller\">' +
        '<div class=\"inside\">' + '<form><label class=\"col-xs-12\">' + '";
        // line 288
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("note_delete_set"        ,"themes"        ,        );
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
        echo "' + '</label></form>' +
        '</div>' +
        '</div>';

    var content_theme = '<div class=\"load_content_controller\">' +
        '<div class=\"inside\">' + '<form><label class=\"col-xs-12\">' + '";
        // line 293
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("note_delete_theme"        ,"themes"        ,        );
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
        echo "' + '</label></form>' +
        '</div>' +
        '</div>';

    \$(document).off('click', '.delete_set').on('click', '.delete_set', function(e) {
        e.preventDefault();
        var link = \$(this).data('link');
        delete_set.show_load_block(content_set);
        \$('#set_delete').unbind('click').bind('click', function(e) {
            \$.ajax({
                url: link,
                cache: false,
                success: function(data) {
                    location.reload();
                }
            });
        });
    });

    \$(document).off('click', '.delete_theme').on('click', '.delete_theme', function(e) {
        e.preventDefault();
        var link = \$(this).data('link');
        delete_theme.show_load_block(content_theme);
        \$('#theme_delete').unbind('click').bind('click', function(e) {
            \$.ajax({
                url: link,
                cache: false,
                success: function(data) {
                    location.reload();
                }
            });
        });
    });

});
</script>

";
        // line 330
        $this->loadTemplate("@app/footer.twig", "list_installed.twig", 330)->display($context);
    }

    public function getTemplateName()
    {
        return "list_installed.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1807 => 330,  1748 => 293,  1721 => 288,  1695 => 284,  1665 => 276,  1591 => 224,  1568 => 223,  1557 => 214,  1532 => 212,  1529 => 211,  1523 => 210,  1513 => 205,  1477 => 202,  1455 => 201,  1453 => 200,  1429 => 198,  1419 => 197,  1395 => 196,  1370 => 193,  1362 => 192,  1338 => 191,  1336 => 190,  1312 => 188,  1304 => 187,  1280 => 186,  1255 => 183,  1247 => 182,  1244 => 181,  1241 => 180,  1208 => 177,  1184 => 176,  1182 => 175,  1172 => 167,  1148 => 165,  1139 => 164,  1115 => 162,  1106 => 161,  1104 => 160,  1081 => 159,  1072 => 158,  1070 => 157,  1067 => 156,  1017 => 155,  993 => 154,  991 => 153,  986 => 150,  983 => 149,  961 => 148,  958 => 147,  936 => 146,  934 => 145,  927 => 143,  924 => 142,  899 => 141,  895 => 140,  890 => 138,  884 => 137,  881 => 136,  876 => 135,  871 => 134,  869 => 133,  843 => 129,  820 => 128,  797 => 127,  789 => 121,  780 => 117,  774 => 113,  753 => 112,  746 => 111,  725 => 110,  722 => 109,  717 => 106,  696 => 105,  690 => 104,  666 => 103,  664 => 102,  656 => 96,  654 => 95,  651 => 94,  647 => 92,  626 => 91,  599 => 90,  576 => 89,  573 => 88,  571 => 87,  566 => 84,  563 => 83,  541 => 82,  538 => 81,  516 => 80,  514 => 79,  507 => 77,  504 => 76,  479 => 75,  475 => 74,  471 => 72,  466 => 71,  464 => 70,  461 => 69,  457 => 68,  430 => 63,  407 => 62,  384 => 61,  328 => 52,  322 => 48,  311 => 46,  307 => 45,  298 => 38,  263 => 36,  228 => 34,  220 => 27,  185 => 25,  150 => 23,  118 => 14,  93 => 13,  62 => 6,  37 => 5,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_installed.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/themes/views/gentelella/list_installed.twig");
    }
}
