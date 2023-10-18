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

/* list_settings.twig */
class __TwigTemplate_b97554dc340dbcb9911a5a5349bc43bad7f78b45b463c3088ce273c1d38566bf extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_settings.twig", 1)->display($context);
        // line 2
        echo "
";
        // line 3
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array("payments"        ,"admin-payments-settings.js"        ,        );
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
        // line 4
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">      
        <div class=\"x_content\">
        ";
        // line 8
        if (($context["show_rates"] ?? null)) {
            echo "    
            <form method=\"post\" action=\"";
            // line 9
            echo ($context["site_url"] ?? null);
            echo "admin/payments/update_currency_key\"
                    name=\"userKey\" enctype=\"multipart/form-data\" data-parsley-validate class=\"form-horizontal inline col-md-10 col-sm-10 col-xs-10\">
              <div class=\"col-md-8 col-sm-8 col-xs-8\">
                <input class=\"userKey form-control\" type=\"text\" name=\"userKey\" value='";
            // line 12
            echo ($context["items_on_page_key"] ?? null);
            echo "' placeholder=\"Enter key\">
              </div>
              <div class=\"col-md-2 col-sm-4 col-xs-4\">
                <input type=\"submit\" name=\"bt_manual\" class=\"btn btn-primary\" value=\"";
            // line 15
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("currency_key"            ,"payments"            ,            );
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
              </div>
            </form>
            <div class=\"description inline col-md-2 col-sm-2 col-xs-2\">
              <a href=\"https://currencylayer.com/signup/free\" target=\"_blank\">
                <div class=\"description_text\">
                ";
            // line 21
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("user_key_description"            ,"payments"            ,            );
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
            // line 22
            echo "                </div>
              </a>
            </div>
            <style>
              .inline
                {
                  display: inline-flex;
                }
                .description_text {
                    position: absolute;
                    border: 1px solid;
                    padding: 7px;
                    border-radius: 4px;
                    background: #1479b8;
                }
                .description_text:hover {
                    background: #1479b8d6;
                    cursor: pointer;
                }
                .description a {
                    text-decoration: none;
                    color: white;
                }
            </style>
            <form method=\"post\" action=\"";
            // line 46
            echo ($context["site_url"] ?? null);
            echo "admin/payments/update_currency_rates\"
                  name=\"save_form\" enctype=\"multipart/form-data\" data-parsley-validate class=\"form-horizontal\">
              <div class=\"form-group\">
                  <label class=\"col-xs-12\">
                    ";
            // line 50
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("header_currency_rates_update_auto"            ,"payments"            ,            );
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
            echo "</label>
              </div>
              <div class=\"form-group\">
                  <div class=\"col-xs-12\">
                    <div class=\"row\">
                      <div class=\"checkbox\">
                        <label>
                          <input type=\"hidden\" name=\"use_rates_update\" value=\"0\" />
                          <input type=\"checkbox\" name=\"use_rates_update\" value=\"1\" id=\"use_rates_update\" ";
            // line 58
            if (($context["use_rates_update"] ?? null)) {
                echo "checked";
            }
            echo " class=\"flat\">
                          ";
            // line 59
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("text_currency_rates_update"            ,"payments"            ,            );
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
            echo "</label>
                      </div>
                    </div>
                  </div>
              </div>
              ";
            // line 78
            echo "              <div class=\"form-group\">
                <label class=\"col-xs-12\">
                    ";
            // line 80
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("header_currency_rates_update_manual"            ,"payments"            ,            );
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
            echo "</label>
              </div>
              <div class=\"form-group\">
                    <div class=\"col-md-4 col-sm-8 col-xs-8 hidden\">
                        <select name=\"rates_driver\" id=\"manual_select\" class=\"form-control\">
                            ";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["updaters"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 86
                echo "                            <option value=\"";
                echo $context["item"];
                echo "\">
                                ";
                // line 87
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array(("currency_updater_" . ($context["item"] ?? null))                ,"payments"                ,                );
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
                // line 88
                echo "                            </option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo "                        </select>
                    </div>                    
                    <div class=\"col-md-2 col-sm-4 col-xs-4\" style=\"padding-left: 0px;\">
                    <button type=\"submit\" name=\"bt_manual\" class=\"btn btn-primary\" id=\"rates_update_manual\">
                      ";
            // line 94
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_currency_rates_update_manual"            ,"payments"            ,            );
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
            echo "</button>
                    </div>
              </div>
            </form>
                    
            <div class=\"clearfix\"></div>
        ";
        }
        // line 101
        echo "            
            <div id=\"actions\" class=\"hide\">
              <div class=\"btn-group\">
                <a onclick=\"";
        // line 104
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("payments_settings"        ,"btn_add_currency"        ,        );
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
        echo "\" href=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/payments/settings_edit\" class=\"btn btn-primary\">
                    ";
        // line 105
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_currency"        ,"payments"        ,        );
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
        echo "                </a>
                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                        aria-haspopup=\"true\" aria-expanded=\"false\">
                    <span class=\"caret\"></span>
                    <span class=\"sr-only\">Toggle Dropdown</span>
                </button>
                <ul class=\"dropdown-menu\">
                  <li onclick=\"";
        // line 113
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("payments_settings"        ,"btn_add_currency"        ,        );
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
        // line 114
        echo ($context["site_url"] ?? null);
        echo "admin/payments/settings_edit\">
                        ";
        // line 115
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_currency"        ,"payments"        ,        );
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
        // line 116
        echo "                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <table id=\"users\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">";
        // line 124
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_currency_gid"        ,"payments"        ,        );
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
        // line 125
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_currency_name"        ,"payments"        ,        );
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
        // line 126
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_currency_default"        ,"payments"        ,        );
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
        // line 131
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["currency"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 132
            echo "                    <tr class=\"even pointer\">
                        <td class=\"a-center\">";
            // line 133
            echo $this->getAttribute($context["item"], "gid", []);
            echo "</td>
                        <td class=\"a-center\">";
            // line 134
            echo $this->getAttribute($context["item"], "name", []);
            echo " (";
            echo $this->getAttribute($context["item"], "abbr", []);
            echo ")</td>
                        <td class=\"a-center icons\">
                            ";
            // line 136
            if ($this->getAttribute($context["item"], "is_default", [])) {
                // line 137
                echo "                              ";
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
                // line 138
                echo "                            ";
            } else {
                // line 139
                echo "                              ";
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
                // line 140
                echo "                            ";
            }
            // line 141
            echo "                        </td>
                        <td class=\"icons\">
                            <div class=\"btn-group\">
                              ";
            // line 144
            if ( !$this->getAttribute($context["item"], "is_default", [])) {
                // line 145
                echo "                                  <button type=\"button\"
                                      class=\"btn btn-primary\" title=\"";
                // line 146
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_default_currency"                ,"payments"                ,                );
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
                // line 147
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("payments_settings"                ,"btn_use_by_default"                ,                );
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
                echo "admin/payments/settings_use/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "'\">
                                          ";
                // line 148
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_default_currency"                ,"payments"                ,                );
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
                echo "                                  </button>
                              ";
            } else {
                // line 151
                echo "                                <button type=\"button\" class=\"btn btn-primary\"
                                        onclick = \"";
                // line 152
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("payments_settings"                ,"btn_edit_currency"                ,                );
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
                echo "; document.location.href='";
                echo ($context["site_url"] ?? null);
                echo "admin/payments/settings_edit/";
                echo $this->getAttribute($context["item"], "id", []);
                if (($context["show_rates"] ?? null)) {
                    echo "/1";
                }
                echo "'\">
                                    ";
                // line 153
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_edit_currency"                ,"payments"                ,                );
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
                echo "                                </button>
                              ";
            }
            // line 156
            echo "                                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                        aria-haspopup=\"true\" aria-expanded=\"false\">
                                    <span class=\"caret\"></span>
                                    <span class=\"sr-only\">Toggle Dropdown</span>
                                </button>
                                <ul class=\"dropdown-menu\">
                                  ";
            // line 162
            if ( !$this->getAttribute($context["item"], "is_default", [])) {
                // line 163
                echo "                                    <li onclick=\"";
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("payments_settings"                ,"btn_use_by_default"                ,                );
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
                // line 164
                echo ($context["site_url"] ?? null);
                echo "admin/payments/settings_use/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\">
                                                ";
                // line 165
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_default_currency"                ,"payments"                ,                );
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
                // line 166
                echo "                                        </a>
                                    </li>
                                  ";
            }
            // line 169
            echo "                                    <li onclick=\"";
            $module =             null;
            $helper =             'start';
            $name =             'setAnalytics';
            $params = array("payments_settings"            ,"btn_edit_currency"            ,            );
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
            // line 170
            echo ($context["site_url"] ?? null);
            echo "admin/payments/settings_edit/";
            echo $this->getAttribute($context["item"], "id", []);
            if (($context["show_rates"] ?? null)) {
                echo "/1";
            }
            echo "\">
                                            ";
            // line 171
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_currency"            ,"payments"            ,            );
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
            // line 172
            echo "                                        </a>
                                    </li>
                                    <li>
                                        <a onclick=\"javascript: if(!confirm('";
            // line 175
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("note_delete_currency"            ,"payments"            ,""            ,"js"            ,            );
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
            echo "')) return false;\"
                                           href=\"";
            // line 176
            echo ($context["site_url"] ?? null);
            echo "admin/payments/settings_delete/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">
                                            ";
            // line 177
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_delete_currency"            ,"payments"            ,            );
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
        // line 185
        echo "                </tbody>
            </table>
        </div>
    </div>
</div>
<script type=\"text/javascript\">
    \$(function() {
        new AdminPaymentsSettings({
            siteUrl: '";
        // line 193
        echo ($context["site_url"] ?? null);
        echo "',
        });
    });
</script>

";
        // line 198
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
        // line 199
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
        // line 207
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
        // line 208
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
                    'aTargets': [2,3]
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
        // line 246
        $this->loadTemplate("@app/footer.twig", "list_settings.twig", 246)->display($context);
    }

    public function getTemplateName()
    {
        return "list_settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1052 => 246,  992 => 208,  969 => 207,  956 => 199,  935 => 198,  927 => 193,  917 => 185,  905 => 178,  884 => 177,  878 => 176,  855 => 175,  850 => 172,  829 => 171,  820 => 170,  796 => 169,  791 => 166,  770 => 165,  764 => 164,  740 => 163,  738 => 162,  730 => 156,  726 => 154,  705 => 153,  675 => 152,  672 => 151,  668 => 149,  647 => 148,  620 => 147,  597 => 146,  594 => 145,  592 => 144,  587 => 141,  584 => 140,  562 => 139,  559 => 138,  537 => 137,  535 => 136,  528 => 134,  524 => 133,  521 => 132,  517 => 131,  490 => 126,  467 => 125,  444 => 124,  434 => 116,  413 => 115,  409 => 114,  386 => 113,  377 => 106,  356 => 105,  331 => 104,  326 => 101,  297 => 94,  291 => 90,  284 => 88,  263 => 87,  258 => 86,  254 => 85,  227 => 80,  223 => 78,  196 => 59,  190 => 58,  160 => 50,  153 => 46,  127 => 22,  106 => 21,  78 => 15,  72 => 12,  66 => 9,  62 => 8,  56 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_settings.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella/list_settings.twig");
    }
}
