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

/* list.twig */
class __TwigTemplate_df5ece1ee68f203df40a9259f824547fa6699917b1761e64c0e30e4ed980391f extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"menu-level3 hidden-xs\">
            <ul class=\"nav nav-tabs bar_tabs\">
                <li class=\"";
        // line 7
        if ((($context["filter"] ?? null) == "all")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "all", [])) {
            echo " hide";
        }
        echo "\">
                    <a href=\"";
        // line 8
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/index/all\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_all_cronjob"        ,"cronjob"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "all", []);
        echo ")</a>
                </li>
                <li class=\"";
        // line 10
        if ((($context["filter"] ?? null) == "not_active")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "not_active", [])) {
            echo " hide";
        }
        echo "\">
                    <a href=\"";
        // line 11
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/index/not_active\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_not_active_cronjob"        ,"cronjob"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "not_active", []);
        echo ")</a>
                </li>
                <li class=\"";
        // line 13
        if ((($context["filter"] ?? null) == "active")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "active", [])) {
            echo " hide";
        }
        echo "\">
                    <a href=\"";
        // line 14
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/index/active\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_active_cronjob"        ,"cronjob"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "active", []);
        echo ")</a>
                </li>
            </ul>
            &nbsp;
        </div>

        <div class=\"menu-level3 visible-xs\">
            <ul class=\"nav nav-tabs tabs-left\">
                <li class=\"";
        // line 22
        if ((($context["filter"] ?? null) == "all")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "all", [])) {
            echo " hide";
        }
        echo "\">
                    <a href=\"";
        // line 23
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/index/all\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_all_cronjob"        ,"cronjob"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "all", []);
        echo ")</a>
                </li>
                <li class=\"";
        // line 25
        if ((($context["filter"] ?? null) == "not_active")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "not_active", [])) {
            echo " hide";
        }
        echo "\">
                    <a href=\"";
        // line 26
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/index/not_active\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_not_active_cronjob"        ,"cronjob"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "not_active", []);
        echo ")</a>
                </li>
                <li class=\"";
        // line 28
        if ((($context["filter"] ?? null) == "active")) {
            echo "active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "active", [])) {
            echo " hide";
        }
        echo "\">
                    <a href=\"";
        // line 29
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/index/active\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_active_cronjob"        ,"cronjob"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "active", []);
        echo ")</a>
                </li>
            </ul>
            &nbsp;
        </div>

        <div class=\"x_content\">
            <div id=\"actions\" class=\"hide\">
                <div class=\"btn-group\">
                    <a class=\"btn btn-primary\" href=\"";
        // line 38
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/edit\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_cronjob"        ,"cronjob"        ,        );
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
                    <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                            aria-haspopup=\"true\" aria-expanded=\"false\">
                        <span class=\"caret\"></span>
                        <span class=\"sr-only\">Toggle Dropdown</span>
                    </button>
                    <ul class=\"dropdown-menu\">
                        <li>
                            <a href=\"";
        // line 46
        echo ($context["site_url"] ?? null);
        echo "admin/cronjob/edit\">
                                ";
        // line 47
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_cronjob"        ,"cronjob"        ,        );
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
                    </ul>
                </div>
            </div>
            <table class=\"table table-striped jambo_table\" id=\"users\">
                <thead class=\"headings\">
                    <tr>
                        <th class=\"column-group\">";
        // line 55
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_cron_title"        ,"cronjob"        ,        );
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
                        <th class=\"column-group\">";
        // line 56
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_cron_tab"        ,"cronjob"        ,        );
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
                        <th class=\"column-group hidden-xs hidden-sm\">";
        // line 57
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_date_add"        ,"cronjob"        ,        );
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
        echo " / ";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_date_execute"        ,"cronjob"        ,        );
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
                        <th class=\"column-group\">";
        // line 58
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_expiried"        ,"cronjob"        ,        );
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
        // line 59
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_in_process"        ,"cronjob"        ,        );
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
                        <th class=\"column-group\">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 64
        if (($context["crontab"] ?? null)) {
            // line 65
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["crontab"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 66
                echo "                            <tr class=\"even pointer\">
                                <td>";
                // line 67
                echo $this->getAttribute($context["item"], "name", []);
                echo "</td>
                                <td>";
                // line 68
                echo $this->getAttribute($context["item"], "cron_tab", []);
                echo "</td>
                                <td class=\"hidden-xs hidden-sm\">";
                // line 69
                echo twig_date_format_filter($this->env, $this->getAttribute($context["item"], "date_add", []), "d-m-Y H:i:s");
                echo " / ";
                if (($this->getAttribute($context["item"], "date_execute", []) != "0000-00-00 00:00:00")) {
                    echo twig_date_format_filter($this->env, $this->getAttribute($context["item"], "date_execute", []), "d-m-Y H:i:s");
                }
                echo "</td>
                                <td>";
                // line 70
                if ($this->getAttribute($context["item"], "expiried", [])) {
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("crontab_expiried"                    ,"cronjob"                    ,                    );
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
                }
                echo "</td>
                                <td class=\"hidden-xs\">";
                // line 71
                if ($this->getAttribute($context["item"], "in_process", [])) {
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("crontab_in_process"                    ,"cronjob"                    ,                    );
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
                } else {
                    echo "&nbsp;";
                }
                echo "</td>
                                <td class=\"icons\">
                                    <div class=\"btn-group\">
                                        ";
                // line 74
                if ($this->getAttribute($context["item"], "status", [])) {
                    // line 75
                    echo "                                            <button type=\"button\" class=\"btn btn-primary\" title=\"";
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_deactivate_cron"                    ,"cronjob"                    ,                    );
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
                                                    onclick=\"document.location.href = '";
                    // line 76
                    echo ($context["site_url"] ?? null);
                    echo "admin/cronjob/activate/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "/0'\">
                                                ";
                    // line 77
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_deactivate_cron"                    ,"cronjob"                    ,                    );
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
                    // line 78
                    echo "                                            </button>
                                        ";
                } else {
                    // line 80
                    echo "                                            <button type=\"button\" class=\"btn btn-primary\" title=\"";
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_activate_cron"                    ,"cronjob"                    ,                    );
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
                                                    onclick=\"document.location.href = '";
                    // line 81
                    echo ($context["site_url"] ?? null);
                    echo "admin/cronjob/activate/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "/1'\">
                                                ";
                    // line 82
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_activate_cron"                    ,"cronjob"                    ,                    );
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
                    echo "                                            </button>
                                        ";
                }
                // line 85
                echo "                                        <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                                aria-haspopup=\"true\" aria-expanded=\"false\">
                                            <span class=\"caret\"></span>
                                            <span class=\"sr-only\">Toggle Dropdown</span>
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li>
                                                ";
                // line 92
                if ($this->getAttribute($context["item"], "status", [])) {
                    // line 93
                    echo "                                                    <a href=\"";
                    echo ($context["site_url"] ?? null);
                    echo "admin/cronjob/activate/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "/0\">
                                                        ";
                    // line 94
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_deactivate_cron"                    ,"cronjob"                    ,                    );
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
                    echo "                                                    </a>
                                                ";
                } else {
                    // line 97
                    echo "                                                    <a href=\"";
                    echo ($context["site_url"] ?? null);
                    echo "admin/cronjob/activate/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "/1\">
                                                        ";
                    // line 98
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_activate_cron"                    ,"cronjob"                    ,                    );
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
                    // line 99
                    echo "                                                    </a>
                                                ";
                }
                // line 101
                echo "                                            </li>
                                            <li>
                                                <a href=\"";
                // line 103
                echo ($context["site_url"] ?? null);
                echo "admin/cronjob/run/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\">
                                                    ";
                // line 104
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_run_cron"                ,"cronjob"                ,                );
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
                echo "                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"";
                // line 108
                echo ($context["site_url"] ?? null);
                echo "admin/cronjob/edit/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\">
                                                    ";
                // line 109
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_edit_cron"                ,"cronjob"                ,                );
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
                // line 110
                echo "                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"";
                // line 113
                echo ($context["site_url"] ?? null);
                echo "admin/cronjob/log/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\">
                                                    ";
                // line 114
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_log_cron"                ,"cronjob"                ,                );
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
                // line 115
                echo "                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"";
                // line 118
                echo ($context["site_url"] ?? null);
                echo "admin/cronjob/delete/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\"
                                                   onclick=\"javascript: if (!confirm('";
                // line 119
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_delete_cron"                ,"cronjob"                ,""                ,"js"                ,                );
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
                echo "'))
                                                               return false;\">
                                                    ";
                // line 121
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_delete_cron"                ,"cronjob"                ,                );
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
                echo "                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            echo "                    ";
        } else {
            // line 130
            echo "                        <tr>
                            <td colspan=\"6\">";
            // line 131
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("no_crontabs"            ,"cronjob"            ,            );
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
            echo "</td>
                        </tr>
                    ";
        }
        // line 134
        echo "                </tbody>
            </table>
        </div>
    </div>
</div>
";
        // line 139
        $this->loadTemplate("@app/pagination.twig", "list.twig", 139)->display($context);
        // line 140
        echo "
<!-- Datatables -->
<script type=\"text/javascript\">
    \$(document).ready(function () {
        var oTable = \$('#users').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 146
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
        // line 147
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_crontabs"        ,"cronjob"        ,        );
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
            \"aoColumnDefs\": [
                {
                    'bSortable': false,
                    'aTargets': [0, 1, 2, 3, 4, 5]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        \$(\"tfoot input\").keyup(function () {
            oTable.fnFilter(this.value, \$(\"tfoot th\").index(\$(this).parent()));
        });
        \$(\"tfoot input\").each(function (i) {
            asInitVals[i] = this.value;
        });
        \$(\"tfoot input\").focus(function () {
            if (this.className == \"search_init\") {
                this.className = \"\";
                this.value = \"\";
            }
        });
        \$(\"tfoot input\").blur(function (i) {
            if (this.value == \"\") {
                this.className = \"search_init\";
                this.value = asInitVals[\$(\"tfoot input\").index(this)];
            }
        });
        var actions = \$(\"#actions\");
        \$('#users_wrapper').find('.actions').html(actions.html());
        actions.remove();
    });
</script>

";
        // line 184
        $this->loadTemplate("@app/footer.twig", "list.twig", 184)->display($context);
    }

    public function getTemplateName()
    {
        return "list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1040 => 184,  981 => 147,  958 => 146,  950 => 140,  948 => 139,  941 => 134,  916 => 131,  913 => 130,  910 => 129,  898 => 122,  877 => 121,  853 => 119,  847 => 118,  842 => 115,  821 => 114,  815 => 113,  810 => 110,  789 => 109,  783 => 108,  778 => 105,  757 => 104,  751 => 103,  747 => 101,  743 => 99,  722 => 98,  715 => 97,  711 => 95,  690 => 94,  683 => 93,  681 => 92,  672 => 85,  668 => 83,  647 => 82,  641 => 81,  617 => 80,  613 => 78,  592 => 77,  586 => 76,  562 => 75,  560 => 74,  531 => 71,  506 => 70,  498 => 69,  494 => 68,  490 => 67,  487 => 66,  482 => 65,  480 => 64,  453 => 59,  430 => 58,  386 => 57,  363 => 56,  340 => 55,  310 => 47,  306 => 46,  274 => 38,  239 => 29,  230 => 28,  202 => 26,  193 => 25,  165 => 23,  156 => 22,  122 => 14,  113 => 13,  85 => 11,  76 => 10,  48 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/cronjob/views/gentelella/list.twig");
    }
}
