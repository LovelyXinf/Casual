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

/* list_systems.twig */
class __TwigTemplate_d2274d1c155798d4fbba044ef926fd003a495ffda40cd467c724f61dda43d10c extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_systems.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_content\">
            <div class=\"col-md-12 col-sm-12 col-xs-12\">
                <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
                    <label class=\"btn btn-default";
        // line 8
        if ((($context["filter"] ?? null) == "all")) {
            echo " active";
        }
        echo "\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"document.location.href='";
        // line 10
        echo ($context["site_url"] ?? null);
        echo "admin/payments/systems/all'\">
                        <input type=\"radio\" name=\"looking_user_type\">
                        ";
        // line 12
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_all_systems"        ,"payments"        ,        );
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
        // line 14
        if ((($context["filter"] ?? null) == "used")) {
            echo " active";
        }
        echo "\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"document.location.href='";
        // line 16
        echo ($context["site_url"] ?? null);
        echo "admin/payments/systems/used'\">
                        <input type=\"radio\" name=\"looking_user_type\">
                        ";
        // line 18
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_used_systems"        ,"payments"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "used", []);
        echo ")
                    </label>
                    <label class=\"btn btn-default\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"document.location.href='";
        // line 22
        echo ($context["site_url"] ?? null);
        echo "admin/payments/install'\">
                        <input type=\"radio\" name=\"looking_user_type\">
                        ";
        // line 24
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_install_systems"        ,"payments"        ,        );
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
        echo "                    </label>
                </div>
            </div>
            <div class=\"clearfix\"></div>
        </div>
        <div class=\"x_content\">
            <table id=\"users\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">";
        // line 34
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_system_name"        ,"payments"        ,        );
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
        // line 35
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
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["systems"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 41
            echo "                    <tr class=\"even pointer\">
                        <td>";
            // line 42
            echo $this->getAttribute($context["item"], "name", []);
            echo "</td>
                        <td>
                        ";
            // line 44
            if ($this->getAttribute($context["item"], "in_use", [])) {
                // line 45
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
                // line 46
                echo "                        ";
            } else {
                // line 47
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
                // line 48
                echo "                        ";
            }
            // line 49
            echo "                        </td>
                        <td class=\"icons\">
                          <div class=\"btn-group\">
                          ";
            // line 52
            if ($this->getAttribute($context["item"], "in_use", [])) {
                // line 53
                echo "                            ";
                if (($context["TRIAL_MODE"] ?? null)) {
                    // line 54
                    echo "                            <button type=\"button\"
                                    class=\"btn btn-primary\" title=\"";
                    // line 55
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_edit_payments"                    ,"payments"                    ,                    );
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
                    // line 56
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'setAnalytics';
                    $params = array("payments_systems"                    ,"systems_btn_edit"                    ,                    );
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
                    // line 57
                    echo "                                    document.location.href='";
                    echo ($context["site_url"] ?? null);
                    echo "admin/payments/system_edit/";
                    echo $this->getAttribute($context["item"], "gid", []);
                    echo "'\">
                                ";
                    // line 58
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_edit_payments"                    ,"payments"                    ,                    );
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
                    // line 59
                    echo "                            </button>    
                            ";
                } else {
                    // line 60
                    echo "    
                            <button type=\"button\"
                                    class=\"btn btn-primary\" title=\"";
                    // line 62
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_deactivate_system"                    ,"payments"                    ,                    );
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
                    // line 63
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'setAnalytics';
                    $params = array("payments_systems"                    ,"systems_btn_deactivate"                    ,                    );
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
                    echo "document.location.href='";
                    echo ($context["site_url"] ?? null);
                    echo "admin/payments/system_use/";
                    echo $this->getAttribute($context["item"], "gid", []);
                    echo "/0'\">
                                ";
                    // line 64
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("make_inactive"                    ,"start"                    ,                    );
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
                    // line 65
                    echo "                            </button>
                            ";
                }
                // line 67
                echo "                          ";
            } else {
                // line 68
                echo "                            <button type=\"button\"
                                    class=\"btn btn-primary\" title=\"";
                // line 69
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_activate_system"                ,"payments"                ,                );
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
                // line 70
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("payments_systems"                ,"systems_btn_activate"                ,                );
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
                echo "document.location.href='";
                echo ($context["site_url"] ?? null);
                echo "admin/payments/system_use/";
                echo $this->getAttribute($context["item"], "gid", []);
                echo "/1'\">
                                ";
                // line 71
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
                // line 72
                echo "                            </button>
                          ";
            }
            // line 74
            echo "                            <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                    aria-haspopup=\"true\" aria-expanded=\"false\">
                              <span class=\"caret\"></span>
                              <span class=\"sr-only\">Toggle Dropdown</span>
                            </button>
                            <ul class=\"dropdown-menu\">
                            ";
            // line 80
            if ($this->getAttribute($context["item"], "in_use", [])) {
                // line 81
                echo "                              <li onclick=\"";
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("payments_systems"                ,"systems_btn_deactivate"                ,                );
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
                // line 82
                echo ($context["site_url"] ?? null);
                echo "admin/payments/system_use/";
                echo $this->getAttribute($context["item"], "gid", []);
                echo "/0\">
                                    ";
                // line 83
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
                echo "</a>
                              </li>
                            ";
            } else {
                // line 86
                echo "                              <li onclick=\"";
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("payments_systems"                ,"systems_btn_activate"                ,                );
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
                // line 87
                echo ($context["site_url"] ?? null);
                echo "admin/payments/system_use/";
                echo $this->getAttribute($context["item"], "gid", []);
                echo "/1\">
                                    ";
                // line 88
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
                echo "</a>
                              </li>
                            ";
            }
            // line 91
            echo "                              <li onclick=\"";
            $module =             null;
            $helper =             'start';
            $name =             'setAnalytics';
            $params = array("payments_systems"            ,"systems_btn_edit"            ,            );
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
            // line 92
            echo ($context["site_url"] ?? null);
            echo "admin/payments/system_edit/";
            echo $this->getAttribute($context["item"], "gid", []);
            echo "\">
                                    ";
            // line 93
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_payments"            ,"payments"            ,            );
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
                           
                            <li>
                                <a href=\"";
            // line 97
            echo ($context["site_url"] ?? null);
            echo "admin/payments/system_delete/";
            echo $this->getAttribute($context["item"], "gid", []);
            echo "\">
                                    ";
            // line 98
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
            echo "</a>
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
        // line 106
        echo "                </tbody>
            </table>
            ";
        // line 108
        $this->loadTemplate("@app/pagination.twig", "list_systems.twig", 108)->display($context);
        // line 109
        echo "        </div>
    </div>
</div>

";
        // line 113
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
        // line 114
        echo "<link href=\"";
        echo ($context["site_root"] ?? null);
        echo ($context["js_folder"] ?? null);
        echo "jquery-ui/jquery-ui.custom.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#users').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 122
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
        // line 123
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_payment_systems"        ,"payments"        ,        );
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
                    'aTargets': [2]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"dom\": 'T<\"clear\">lfrtip',
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
    });
</script>

";
        // line 158
        $this->loadTemplate("@app/footer.twig", "list_systems.twig", 158)->display($context);
    }

    public function getTemplateName()
    {
        return "list_systems.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  859 => 158,  802 => 123,  779 => 122,  766 => 114,  745 => 113,  739 => 109,  737 => 108,  733 => 106,  700 => 98,  694 => 97,  668 => 93,  662 => 92,  638 => 91,  613 => 88,  607 => 87,  583 => 86,  558 => 83,  552 => 82,  528 => 81,  526 => 80,  518 => 74,  514 => 72,  493 => 71,  466 => 70,  443 => 69,  440 => 68,  437 => 67,  433 => 65,  412 => 64,  385 => 63,  362 => 62,  358 => 60,  354 => 59,  333 => 58,  326 => 57,  305 => 56,  282 => 55,  279 => 54,  276 => 53,  274 => 52,  269 => 49,  266 => 48,  244 => 47,  241 => 46,  219 => 45,  217 => 44,  212 => 42,  209 => 41,  205 => 40,  178 => 35,  155 => 34,  144 => 25,  123 => 24,  118 => 22,  90 => 18,  85 => 16,  78 => 14,  52 => 12,  47 => 10,  40 => 8,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_systems.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella/list_systems.twig");
    }
}
