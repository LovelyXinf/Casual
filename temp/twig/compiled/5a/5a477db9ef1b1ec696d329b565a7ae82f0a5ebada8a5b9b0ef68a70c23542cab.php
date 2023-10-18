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

/* index.twig */
class __TwigTemplate_8ebc93f1cfd7452c38b93be36137504c88d043fc24434bdd64a6597a31ca0e78 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "index.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
            <label class=\"btn btn-default\" data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                    onclick=\"document.location.href='";
        // line 7
        echo ($context["site_url"] ?? null);
        echo "admin/operators/settings'\">
                ";
        // line 8
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_settings"        ,"operators"        ,        );
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
        // line 9
        echo "            </label>
            <label class=\"btn btn-default\" data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                    onclick=\"document.location.href='";
        // line 11
        echo ($context["site_url"] ?? null);
        echo "admin/operators/statistics'\">
                ";
        // line 12
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_statistics"        ,"operators"        ,        );
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
        echo "            </label>
        </div>
        <div class=\"clearfix\"></div>

        <div class=\"\" role=\"tabpanel\" data-example-id=\"togglable-tabs\">
            <ul id=\"myTab\" class=\"nav nav-tabs bar_tabs\" role=\"tablist\">
                <li class=\"";
        // line 19
        if ((($context["filter"] ?? null) == "all")) {
            echo "active";
        }
        echo " ";
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "all", [])) {
            echo "disabled";
        }
        echo "\">
                    <a href=\"";
        // line 20
        if ($this->getAttribute(($context["filter_data"] ?? null), "all", [])) {
            echo ($context["site_url"] ?? null);
            echo "admin/operators/index/all";
        } else {
            echo "javascript:;";
        }
        echo "\">
                        ";
        // line 21
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_all_operators"        ,"operators"        ,        );
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
        echo ")
                    </a>
                </li>
                <li class=\"";
        // line 24
        if ((($context["filter"] ?? null) == "not_active")) {
            echo "active";
        }
        echo " ";
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "not_active", [])) {
            echo " disabled";
        }
        echo "\">
                    <a href=\"";
        // line 25
        if ($this->getAttribute(($context["filter_data"] ?? null), "not_active", [])) {
            echo ($context["site_url"] ?? null);
            echo "admin/operators/index/not_active";
        } else {
            echo "javascript:;";
        }
        echo "\">
                        ";
        // line 26
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_not_active_operators"        ,"operators"        ,        );
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
        echo ")
                    </a>
                </li>
                <li class=\"";
        // line 29
        if ((($context["filter"] ?? null) == "active")) {
            echo "active";
        }
        echo " ";
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "active", [])) {
            echo "disabled";
        }
        echo "\">
                    <a href=\"";
        // line 30
        if ($this->getAttribute(($context["filter_data"] ?? null), "active", [])) {
            echo ($context["site_url"] ?? null);
            echo "admin/operators/index/active";
        } else {
            echo "javascript:;";
        }
        echo "\">
                        ";
        // line 31
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_active_operators"        ,"operators"        ,        );
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
        echo ")
                    </a>
                </li>
            </ul>
        </div>

        <div class=\"x_content\">
            <div id=\"actions\" class=\"hide\">
                <div class=\"btn-group\">
                    <a href=\"";
        // line 40
        echo ($context["site_url"] ?? null);
        echo "admin/operators/edit\" class=\"btn btn-primary\">
                        ";
        // line 41
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_operator"        ,"operators"        ,        );
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
        // line 42
        echo "                    </a>
                    ";
        // line 55
        echo "                </div>
            </div>
            <table id=\"datatable\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\" data-field=\"nickname\" data-action=\"sorting\">";
        // line 60
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_name"        ,"operators"        ,        );
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
                        <th class=\"column-title xs-hide\" data-field=\"email\" data-action=\"sorting\">";
        // line 61
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_email"        ,"operators"        ,        );
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
                        <th class=\"column-title sm-hide\">";
        // line 62
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_account"        ,"operators"        ,        );
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
                        <th class=\"column-title sm-hide\" data-field=\"date_created\" data-action=\"sorting\">";
        // line 63
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_date_created"        ,"operators"        ,        );
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
                        <th class=\"column-title\">";
        // line 64
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_status"        ,"start"        ,        );
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
                        <th class=\"column-title\">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["operators"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["operator"]) {
            // line 70
            echo "                    <tr class=\"even pointer\">
                        <td>
                            ";
            // line 72
            if ($this->getAttribute($context["operator"], "is_online", [])) {
                // line 73
                echo "                                <span class=\"online-status\" title=\"";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("status_online"                ,"operators"                ,""                ,"button"                ,                );
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
                echo "\"></span>
                            ";
            }
            // line 75
            echo "                            <a href=\"";
            echo ($context["site_url"] ?? null);
            echo "admin/operators/edit/";
            echo $this->getAttribute($context["operator"], "id", []);
            echo "\">
                                <strong>";
            // line 76
            echo $this->getAttribute($context["operator"], "nickname", []);
            echo "</strong>
                            </a>
                            <br/>";
            // line 78
            echo $this->getAttribute($context["operator"], "name", []);
            echo "
                        </td>
                        <td class=\"xs-hide\">
                            ";
            // line 81
            echo $this->getAttribute($context["operator"], "email", []);
            echo "
                        </td>
                        <td class=\"sm-hide\">
                            ";
            // line 84
            $module =             null;
            $helper =             'start';
            $name =             'currency_format_output';
            $params = array(["value" => $this->getAttribute(($context["operator"] ?? null), "account", []), "not_virtual" => true, "no_tags" => true]            ,            );
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
            // line 85
            echo "                        </td>
                        <td class=\"sm-hide\">
                            ";
            // line 87
            echo $this->getAttribute($context["operator"], "date_created", []);
            echo "
                        </td>
                        <td>
                            ";
            // line 90
            if ($this->getAttribute($context["operator"], "is_active", [])) {
                // line 91
                echo "                                ";
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
                // line 92
                echo "                            ";
            } else {
                // line 93
                echo "                                ";
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
                // line 94
                echo "                            ";
            }
            // line 95
            echo "                        </td>
                        <td class=\"icons\">
                            <div class=\"btn-group\">
                                ";
            // line 98
            if ($this->getAttribute($context["operator"], "is_active", [])) {
                // line 99
                echo "                                    <button type=\"button\"
                                        class=\"btn btn-primary\" title=\"";
                // line 100
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("make_inactive"                ,"start"                ,                );
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
                                        onclick = \"document.location.href='";
                // line 101
                echo ($context["site_url"] ?? null);
                echo "admin/operators/activate/";
                echo $this->getAttribute($context["operator"], "id", []);
                echo "/0'\">
                                            ";
                // line 102
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("make_inactive"                ,"start"                ,                );
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
                echo "                                    </button>
                                ";
            } else {
                // line 105
                echo "                                    <button type=\"button\"
                                        class=\"btn btn-primary\" title=\"";
                // line 106
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
                echo "\"
                                        onclick = \"document.location.href='";
                // line 107
                echo ($context["site_url"] ?? null);
                echo "admin/operators/activate/";
                echo $this->getAttribute($context["operator"], "id", []);
                echo "/1'\">
                                            ";
                // line 108
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
                // line 109
                echo "                                    </button>
                                ";
            }
            // line 111
            echo "
                                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                        aria-haspopup=\"true\" aria-expanded=\"false\">
                                    <span class=\"caret\"></span>
                                    <span class=\"sr-only\">Toggle Dropdown</span>
                                </button>
                                <ul class=\"dropdown-menu\">
                                    <li>
                                    ";
            // line 119
            if ($this->getAttribute($context["operator"], "is_active", [])) {
                // line 120
                echo "                                        <a href=\"";
                echo ($context["site_url"] ?? null);
                echo "admin/operators/activate/";
                echo $this->getAttribute($context["operator"], "id", []);
                echo "/0\">
                                            ";
                // line 121
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("make_inactive"                ,"start"                ,                );
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
                echo "                                        </a>
                                    ";
            } else {
                // line 124
                echo "                                        <a href=\"";
                echo ($context["site_url"] ?? null);
                echo "admin/operators/activate/";
                echo $this->getAttribute($context["operator"], "id", []);
                echo "/1\">
                                            ";
                // line 125
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
                // line 126
                echo "                                        </a>
                                    ";
            }
            // line 128
            echo "                                    </li>
                                    <li>
                                        <a href=\"";
            // line 130
            echo ($context["site_url"] ?? null);
            echo "admin/operators/edit/";
            echo $this->getAttribute($context["operator"], "id", []);
            echo "\">
                                            ";
            // line 131
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_operator"            ,"operators"            ,            );
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
            // line 132
            echo "                                        </a>
                                    </li>
                                    <li>
                                        <a href=\"";
            // line 135
            echo ($context["site_url"] ?? null);
            echo "admin/operators/statistics/";
            echo $this->getAttribute($context["operator"], "id", []);
            echo "\">
                                            ";
            // line 136
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_operator_statistics"            ,"operators"            ,            );
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
            // line 137
            echo "                                        </a>
                                    </li>
                                    <li>
                                        <a href=\"";
            // line 140
            echo ($context["site_url"] ?? null);
            echo "admin/operators/withdraw_money_list/";
            echo $this->getAttribute($context["operator"], "id", []);
            echo "\">
                                            ";
            // line 141
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_operator_withdraw_money_list"            ,"operators"            ,            );
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
            // line 142
            echo "                                        </a>
                                    </li>
                                    <li>
                                        <a href=\"";
            // line 145
            echo ($context["site_url"] ?? null);
            echo "admin/operators/delete/";
            echo $this->getAttribute($context["operator"], "id", []);
            echo "\" onclick=\"javascript:if(!confirm('";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("note_delete_operator"            ,"operators"            ,            );
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
            echo "')) return false;\">
                                            ";
            // line 146
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_delete_operator"            ,"operators"            ,            );
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
            echo "                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['operator'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 154
        echo "                </tbody>
            </table>
        </div>
        ";
        // line 157
        $this->loadTemplate("@app/pagination.twig", "index.twig", 157)->display($context);
        // line 158
        echo "    </div>
</div>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    var sorting_fields = {
        nickname: 0,
        email: 1,
        date_created: 3
    };
    var filter = '";
        // line 169
        echo twig_escape_filter($this->env, ($context["filter"] ?? null), "js");
        echo "';
    var order = '";
        // line 170
        echo twig_escape_filter($this->env, ($context["order"] ?? null), "js");
        echo "';
    var order_direction = '";
        // line 171
        echo twig_escape_filter($this->env, ($context["order_direction"] ?? null), "js");
        echo "';
    \$(document).ready(function () {
        var oTable = \$('#datatable').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 175
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
        // line 176
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_operators"        ,"operators"        ,        );
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
                    'aTargets': [2,4,5]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        \$(\"tfoot input\").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
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
        \$('#datatable_wrapper').find('.actions').html(actions.html());
        actions.remove();
        oTable.fnSort([sorting_fields[order], order_direction.toLowerCase()]);
        \$('[data-action=sorting]').click(function(){
            var field = \$(this).data('field');
            var sortLinks = ";
        // line 214
        echo twig_jsonencode_filter(($context["sort_links"] ?? null));
        echo ";
            locationHref(sortLinks[field]);
        });
    });
</script>

";
        // line 220
        $this->loadTemplate("@app/footer.twig", "index.twig", 220)->display($context);
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1025 => 220,  1016 => 214,  956 => 176,  933 => 175,  926 => 171,  922 => 170,  918 => 169,  905 => 158,  903 => 157,  898 => 154,  886 => 147,  865 => 146,  838 => 145,  833 => 142,  812 => 141,  806 => 140,  801 => 137,  780 => 136,  774 => 135,  769 => 132,  748 => 131,  742 => 130,  738 => 128,  734 => 126,  713 => 125,  706 => 124,  702 => 122,  681 => 121,  674 => 120,  672 => 119,  662 => 111,  658 => 109,  637 => 108,  631 => 107,  608 => 106,  605 => 105,  601 => 103,  580 => 102,  574 => 101,  551 => 100,  548 => 99,  546 => 98,  541 => 95,  538 => 94,  516 => 93,  513 => 92,  491 => 91,  489 => 90,  483 => 87,  479 => 85,  458 => 84,  452 => 81,  446 => 78,  441 => 76,  434 => 75,  409 => 73,  407 => 72,  403 => 70,  399 => 69,  372 => 64,  349 => 63,  326 => 62,  303 => 61,  280 => 60,  273 => 55,  270 => 42,  249 => 41,  245 => 40,  212 => 31,  203 => 30,  193 => 29,  166 => 26,  157 => 25,  147 => 24,  120 => 21,  111 => 20,  101 => 19,  93 => 13,  72 => 12,  68 => 11,  64 => 9,  43 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "index.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/index.twig");
    }
}
