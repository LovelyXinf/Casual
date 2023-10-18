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
class __TwigTemplate_1d14d687742c68e99cb287be1f28e291ef35ee15f250d3127b13444efcc3132a extends \Twig\Template
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
        echo "<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_title\">
            <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
                <label class=\"btn btn-default";
        // line 6
        if ((($context["filter"] ?? null) == "all")) {
            echo " active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "all", [])) {
            echo " disabled";
        }
        echo "\"
                        data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                        onclick=\"";
        // line 8
        if ($this->getAttribute(($context["filter_data"] ?? null), "all", [])) {
            echo "document.location.href='";
            echo ($context["site_url"] ?? null);
            echo "admin/ausers/index/all'";
        } else {
            echo "return false;";
        }
        echo "\">
                    <input type=\"radio\" name=\"user_type\"";
        // line 9
        if ((($context["filter"] ?? null) == "all")) {
            echo " selected";
        }
        echo ">
                    ";
        // line 10
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_all_users"        ,"ausers"        ,        );
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
                </label>
                <label class=\"btn btn-default";
        // line 12
        if ((($context["filter"] ?? null) == "moderator")) {
            echo " active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "moderator", [])) {
            echo " disabled";
        }
        echo "\"
                        data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                        onclick=\"";
        // line 14
        if ($this->getAttribute(($context["filter_data"] ?? null), "moderator", [])) {
            echo "document.location.href='";
            echo ($context["site_url"] ?? null);
            echo "admin/moderators/'";
        } else {
            echo "return false;";
        }
        echo "\">
                    <input type=\"radio\" name=\"user_type\"";
        // line 15
        if ((($context["filter"] ?? null) == "admin")) {
            echo " selected";
        }
        echo ">
                    ";
        // line 16
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_moderator_users"        ,"ausers"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "moderator", []);
        echo ")
                </label>
                <label class=\"btn btn-default";
        // line 18
        if ((($context["filter"] ?? null) == "admin")) {
            echo " active";
        }
        if ( !$this->getAttribute(($context["filter_data"] ?? null), "admin", [])) {
            echo " disabled";
        }
        echo "\"
                        data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                        onclick=\"";
        // line 20
        if ($this->getAttribute(($context["filter_data"] ?? null), "admin", [])) {
            echo "document.location.href='";
            echo ($context["site_url"] ?? null);
            echo "admin/ausers/index/admin'";
        } else {
            echo "return false;";
        }
        echo "\">
                    <input type=\"radio\" name=\"user_type\"";
        // line 21
        if ((($context["filter"] ?? null) == "admin")) {
            echo " selected";
        }
        echo ">
                    ";
        // line 22
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_admin_users"        ,"ausers"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "admin", []);
        echo ")
                </label>
            </div>
            <div class=\"clearfix\"></div>
        </div>
        <div class=\"x_content\">
            <div id=\"actions\" class=\"hide\">
                <div class=\"btn-group\">
                    <a href=\"";
        // line 30
        echo ($context["site_url"] ?? null);
        echo "admin/ausers/edit\" class=\"btn btn-primary\">
                        ";
        // line 31
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_user"        ,"ausers"        ,        );
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
        // line 32
        echo "                    </a>
                    <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                        aria-haspopup=\"true\" aria-expanded=\"false\">
                        <span class=\"caret\"></span>
                        <span class=\"sr-only\">Toggle Dropdown</span>
                    </button>
                    <ul class=\"dropdown-menu\">
                        <li>
                            <a href=\"";
        // line 40
        echo ($context["site_url"] ?? null);
        echo "admin/ausers/edit\">
                                ";
        // line 41
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_user"        ,"ausers"        ,        );
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
        echo "                            </a>
                        </li>
                        <li>
                            ";
        // line 45
        $module =         null;
        $helper =         'moderators';
        $name =         'add_moderator';
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
        // line 46
        echo "                        </li>
                    </ul>
                </div>
            </div>
            <table id=\"users\" class=\"table table-striped responsive-utilities jambo_table bulk_action\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">
                            ";
        // line 54
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_nickname"        ,"ausers"        ,        );
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
        // line 55
        echo "                        </th>
                        <th class=\"column-title\">
                            ";
        // line 57
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_name"        ,"ausers"        ,        );
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
        // line 58
        echo "                        </th>
                        <th class=\"column-title\">
                            ";
        // line 60
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_email"        ,"ausers"        ,        );
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
        // line 61
        echo "                        </th>
                        <th class=\"column-title\">
                            ";
        // line 63
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_date_created"        ,"ausers"        ,        );
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
        // line 64
        echo "                        </th>
                        <th class=\"column-title\">
                            ";
        // line 66
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
        // line 67
        echo "                        </th>
                        <th class=\"column-title\">
                            &nbsp;
                        </th>
                        <th class=\"bulk-actions\" colspan=\"6\">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 77
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 78
            echo "                    <tr>                        
                        <td>
                            ";
            // line 80
            echo $this->getAttribute($context["item"], "nickname", []);
            echo "
                        </td>
                        <td>
                            ";
            // line 83
            echo $this->getAttribute($context["item"], "name", []);
            echo "
                        </td>
                        <td>
                            ";
            // line 86
            echo $this->getAttribute($context["item"], "email", []);
            echo "
                        </td>
                        <td>
                            ";
            // line 89
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute(($context["item"] ?? null), "date_created", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_literal", [])            ,            );
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
            // line 90
            echo "                        </td>
                        <td>
                        ";
            // line 92
            if ($this->getAttribute($context["item"], "status", [])) {
                // line 93
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
                // line 94
                echo "                        ";
            } else {
                // line 95
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
                // line 96
                echo "                        ";
            }
            // line 97
            echo "                        </td>
                        <td class=\"icons\">
                            <div class=\"btn-group\">
                                ";
            // line 100
            if ($this->getAttribute($context["item"], "status", [])) {
                // line 101
                echo "                                <button type=\"button\" class=\"btn btn-primary\" title=\"";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_deactivate_user"                ,"moderators"                ,                );
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
                                        onclick=\"document.location.href='";
                // line 102
                echo ($context["site_root"] ?? null);
                echo "admin/moderators/activate/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "/0'\">
                                    ";
                // line 103
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
                // line 104
                echo "                                </button>
                                ";
            } else {
                // line 106
                echo "                                    <button type=\"button\" class=\"btn btn-primary\" title=\"";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_activate_user"                ,"moderators"                ,                );
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
                                            onclick=\"document.location.href='";
                // line 107
                echo ($context["site_root"] ?? null);
                echo "admin/moderators/activate/";
                echo $this->getAttribute($context["item"], "id", []);
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
            echo "                                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                        aria-haspopup=\"true\" aria-expanded=\"false\">
                                    <span class=\"caret\"></span>
                                    <span class=\"sr-only\">Toggle Dropdown</span>
                                </button>
                                <ul class=\"dropdown-menu\">
                                    <li>
                                    ";
            // line 118
            if ($this->getAttribute($context["item"], "status", [])) {
                // line 119
                echo "                                        <a href=\"";
                echo ($context["site_root"] ?? null);
                echo "admin/moderators/activate/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "/0\">
                                            ";
                // line 120
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
                // line 121
                echo "                                        </a>
                                    ";
            } else {
                // line 123
                echo "                                        <a href=\"";
                echo ($context["site_root"] ?? null);
                echo "admin/moderators/activate/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "/1\">
                                            ";
                // line 124
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
                // line 125
                echo "                                        </a>
                                    ";
            }
            // line 127
            echo "                                    </li>
                                    <li>
                                        <a href=\"";
            // line 129
            echo ($context["site_root"] ?? null);
            echo "admin/moderators/edit/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">
                                            ";
            // line 130
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_edit"            ,"start"            ,            );
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
            // line 131
            echo "                                        </a>
                                    </li>
                                    <li>
                                        <a href=\"";
            // line 134
            echo ($context["site_root"] ?? null);
            echo "admin/moderators/delete/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\"
                                           onclick=\"javascript: if(!confirm('";
            // line 135
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("note_delete_user"            ,"moderators"            ,            );
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
            // line 136
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_delete"            ,"start"            ,            );
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
                                </ul>
                            </div>
                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "                </tbody>
            </table>
        </div>
        ";
        // line 147
        $this->loadTemplate("@app/pagination.twig", "list.twig", 147)->display($context);
        // line 148
        echo "    </div>
</div>

";
        // line 151
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"jquery-ui.custom.min.js"        ,        );
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
        echo "<link href=\"";
        echo ($context["site_root"] ?? null);
        echo ($context["js_folder"] ?? null);
        echo "jquery-ui/jquery-ui.custom.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
<!-- Datatables -->
<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#users').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 166
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
        // line 167
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("moderators_list_empty"        ,"moderators"        ,        );
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
                    'aTargets': [5]
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
        \$('#users_wrapper').find('.actions').html(actions.html());
        actions.remove();
    });
</script>

";
        // line 205
        $this->loadTemplate("@app/footer.twig", "list.twig", 205)->display($context);
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
        return array (  957 => 205,  897 => 167,  874 => 166,  855 => 152,  834 => 151,  829 => 148,  827 => 147,  822 => 144,  810 => 137,  789 => 136,  766 => 135,  760 => 134,  755 => 131,  734 => 130,  728 => 129,  724 => 127,  720 => 125,  699 => 124,  692 => 123,  688 => 121,  667 => 120,  660 => 119,  658 => 118,  649 => 111,  645 => 109,  624 => 108,  618 => 107,  594 => 106,  590 => 104,  569 => 103,  563 => 102,  539 => 101,  537 => 100,  532 => 97,  529 => 96,  507 => 95,  504 => 94,  482 => 93,  480 => 92,  476 => 90,  455 => 89,  449 => 86,  443 => 83,  437 => 80,  433 => 78,  429 => 77,  417 => 67,  396 => 66,  392 => 64,  371 => 63,  367 => 61,  346 => 60,  342 => 58,  321 => 57,  317 => 55,  296 => 54,  286 => 46,  265 => 45,  260 => 42,  239 => 41,  235 => 40,  225 => 32,  204 => 31,  200 => 30,  168 => 22,  162 => 21,  152 => 20,  142 => 18,  116 => 16,  110 => 15,  100 => 14,  90 => 12,  64 => 10,  58 => 9,  48 => 8,  38 => 6,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/moderators/views/gentelella/list.twig");
    }
}
