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

/* edit_system.twig */
class __TwigTemplate_f7601d158e98f873af3c866217c8fcbfdee47ca3ead826b32327d27856223695 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit_system.twig", 1)->display(twig_array_merge($context, ["load_type" => "ui"]));
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <a class=\"collapse-link\">
            <div class=\"x_title\">
                <h2> ";
        // line 7
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("admin_header_payment_system_change"        ,"payments"        ,        );
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
        echo " </h2>
                <ul class=\"nav navbar-right panel_toolbox\">
                    <li><i class=\"fa fa-chevron-up\"></i></li>
                </ul>
                <div class=\"clearfix\"></div>
            </div>
        </a>
        <div class=\"x_content\">
            <br>
            <form method=\"post\" action=\"";
        // line 16
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\" enctype=\"multipart/form-data\">
                <div class=\"form-group\"> <!-- Name system -->
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 19
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
        echo ":
                    </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        ";
        // line 22
        echo $this->getAttribute(($context["data"] ?? null), "name", []);
        echo "
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"form-group\"> <!-- System used? -->
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 28
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_system_use"        ,"payments"        ,        );
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
        echo ":
                    </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        ";
        // line 31
        if ($this->getAttribute(($context["data"] ?? null), "in_use", [])) {
            // line 32
            echo "                            ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("system_in_use"            ,"payments"            ,            );
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
            echo "                        ";
        } else {
            // line 34
            echo "                            ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("system_not_in_use"            ,"payments"            ,            );
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
            // line 35
            echo "                        ";
        }
        // line 36
        echo "                    </div>
                    <div class=\"clearfix\"></div>
                </div>

                ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "map", []));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            echo " <!-- Custom fields -->
                    ";
            // line 41
            if ($this->getAttribute($context["item"], "type", [])) {
                // line 42
                echo "                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                                ";
                // line 44
                echo $this->getAttribute($context["item"], "name", []);
                echo ":
                            </label>
                            ";
                // line 46
                if (($this->getAttribute($context["item"], "type", []) == "text")) {
                    // line 47
                    echo "                                <div class=\"col-md-6 col-sm-6 col-xs-12\">
                                    <input type=\"text\" name=\"map[";
                    // line 48
                    echo $context["key"];
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", []));
                    echo "\" class=\"form-control\">
                                </div>
                            ";
                } elseif (($this->getAttribute(                // line 50
$context["item"], "type", []) == "textarea")) {
                    // line 51
                    echo "                                <div class=\"col-md-6 col-sm-6 col-xs-12\">
                                    <textarea name=\"map[";
                    // line 52
                    echo $context["key"];
                    echo "]\" rows=\"10\" cols=\"80\" class=\"form-control\">
                                        ";
                    // line 53
                    echo $this->getAttribute($context["item"], "value", []);
                    echo "
                                    </textarea>
                                </div>
                            ";
                } elseif (($this->getAttribute(                // line 56
$context["item"], "type", []) == "checkbox")) {
                    // line 57
                    echo "                                <div class=\"col-md-6 col-sm-6 col-xs-12\">
                                    <input type=\"hidden\" name=\"map[";
                    // line 58
                    echo $context["key"];
                    echo "]\" value=\"0\" />
                                    <input type=\"checkbox\" name=\"map[";
                    // line 59
                    echo $context["key"];
                    echo "]\" class=\"flat\" value=\"1\" ";
                    if ($this->getAttribute($context["item"], "value", [])) {
                        echo "checked";
                    }
                    echo " />
                                </div>    
                            ";
                }
                // line 62
                echo "                            <div class=\"clearfix\"></div>
                        </div>
                    ";
            }
            // line 64
            echo "    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "
                ";
        // line 67
        if (($this->getAttribute(($context["data"] ?? null), "tarifs_editable", []) || $this->getAttribute(($context["data"] ?? null), "tarifs_type", []))) {
            // line 68
            echo "                    <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                            ";
            // line 70
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_system_tarifs"            ,"payments"            ,            );
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
            echo ":
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                            <a href=\"#\" id=\"add_operator_link\">
                                ";
            // line 74
            if (($this->getAttribute(($context["data"] ?? null), "tarifs_type", []) == 2)) {
                // line 75
                echo "                                    ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_system_operator_add_new"                ,"payments"                ,                );
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
                // line 76
                echo "                                ";
            } else {
                // line 77
                echo "                                    ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_system_tarif_add_new"                ,"payments"                ,                );
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
                echo "                                ";
            }
            // line 79
            echo "                            </a>
                            <div class=\"system-operators\" id=\"system_tarifs_block\">
                                ";
            // line 81
            echo ($context["system_tarifs_block"] ?? null);
            echo "
                            </div>
                        </div>
                        <div class=\"clearfix\"></div>
                    </div>
                    ";
            // line 86
            if (($context["operator_gid"] ?? null)) {
                // line 87
                echo "                  \t\t";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("admin_header_systems_operator_edit"                ,"payments"                ,                );
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
                $context['edit_operator_headline'] = $result;
                // line 88
                echo "                  \t";
            } else {
                // line 89
                echo "                  \t\t";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("admin_header_systems_operator_add"                ,"payments"                ,                );
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
                $context['edit_operator_headline'] = $result;
                // line 90
                echo "                  \t";
            }
            // line 91
            echo "                    <script type=\"text/javascript\">
                        var PaymentSystemTarifs_obj;
                        loadScripts(
                            \"";
            // line 94
            $module =             null;
            $helper =             'utils';
            $name =             'jscript';
            $params = array("payments"            ,"payment-system-tarifs.js"            ,"path"            ,            );
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
                            function () {
                                PaymentSystemTarifs_obj = new PaymentSystemTarifs({
                                    siteUrl: '";
            // line 97
            echo ($context["site_root"] ?? null);
            echo "',
                                    systemGid: '";
            // line 98
            echo $this->getAttribute(($context["data"] ?? null), "gid", []);
            echo "',
                                    useOperators: '";
            // line 99
            if (($this->getAttribute(($context["data"] ?? null), "tarifs_type", []) == 2)) {
                echo "true";
            } else {
                echo "false";
            }
            echo "',
                                    contentObj: new loadingContent({
                                      loadBlockSize: 'big',
                                      loadBlockTitle: '";
            // line 102
            echo ($context["edit_operator_headline"] ?? null);
            echo "',
                                      footerButtons: '<input type=\"button\" name=\"btn_save\" value=\"";
            // line 103
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_save"            ,"start"            ,""            ,"button"            ,            );
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
            echo "\" id=\"btn_save\" class=\"btn btn-primary\">',
                                    }),
                                });
                            },
                            'PaymentSystemTarifs_obj'
                        );
                    </script>
                ";
        }
        // line 111
        echo "
                <div class=\"form-group\">  <!-- Details -->
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 114
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_info_data"        ,"payments"        ,        );
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
        echo ":
                    </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        ";
        // line 117
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["lang_id"] => $context["lang_item"]) {
            // line 118
            echo "                            ";
            $context["name"] = ("info_data_" . $context["lang_id"]);
            // line 119
            echo "                            ";
            if (($context["lang_id"] == ($context["current_lang_id"] ?? null))) {
                // line 120
                echo "                                <textarea name=\"info[";
                echo ($context["name"] ?? null);
                echo "]\" rows=\"4\" cols=\"60\" class=\"form-control\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), ($context["name"] ?? null)));
                echo "</textarea>
                            ";
            } else {
                // line 122
                echo "                                <input type=\"hidden\" name=\"info[";
                echo ($context["name"] ?? null);
                echo "]\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), ($context["name"] ?? null)));
                echo "\" class=\"form-control\"
                                        lang-editor=\"value\" lang-editor-type=\"data-name\" lang-editor-lid=\"";
                // line 123
                echo $context["lang_id"];
                echo "\" />
                            ";
            }
            // line 125
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['lang_id'], $context['lang_item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        echo "                    </div>
                    <div class=\"accordion col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
                        <div class=\"panel\">
                            <a class=\"panel-heading\" role=\"tab\" id=\"headingOne\" data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\" aria-expanded=\"false\" aria-controls=\"collapseOne\">
                                <h4 class=\"panel-title\">";
        // line 130
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("others_languages"        ,"start"        ,        );
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
        echo "</h4>
                            </a>
                            <div id=\"collapseOne\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingOne\">
                                <div class=\"panel-body\">
                                    ";
        // line 134
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["lang_id"] => $context["item"]) {
            // line 135
            echo "                                        ";
            if (($context["lang_id"] != ($context["current_lang_id"] ?? null))) {
                // line 136
                echo "                                             ";
                $context["name"] = ("info_data_" . $context["lang_id"]);
                // line 137
                echo "                                            <div class=\"form-group\">
                                                <label class=\"control-label col-md-2 col-sm-2 col-xs-12\">";
                // line 138
                echo $this->getAttribute($context["item"], "name", []);
                echo "</label>
                                                <div class=\"col-md-10 col-sm-10 col-xs-12\">
                                                    <textarea name=\"info[";
                // line 140
                echo ($context["name"] ?? null);
                echo "]\" rows=\"4\" cols=\"60\" class=\"form-control\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), ($context["name"] ?? null)));
                echo "</textarea>
                                                </div>
                                            </div>
                                        ";
            }
            // line 144
            echo "                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['lang_id'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"clearfix\"></div>

                    <div class=\"ln_solid\"></div>

                    <!-- Buttons -->
                    <div class=\"form-group\">
                        <div class=\"col-md-6 col-sm-6 col-xs-12 col-sm-offset-3\">
                            ";
        // line 156
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_save"        ,"start"        ,""        ,"button"        ,        );
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
        $context['save_text'] = $result;
        // line 157
        echo "                            <input type=\"submit\" name=\"btn_save\" value=\"";
        echo ($context["save_text"] ?? null);
        echo "\" class=\"btn btn-success\">
                            <a class=\"btn btn-default\" href=\"";
        // line 158
        echo ($context["site_url"] ?? null);
        echo "admin/payments/systems\">
                                ";
        // line 159
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
        // line 160
        echo "                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class=\"x_panel\">
        <a class=\"collapse-link\">
            <div class=\"x_title\">
                <h2> ";
        // line 170
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("admin_header_logo_upload"        ,"payments"        ,        );
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
        echo " </h2>
                <ul class=\"nav navbar-right panel_toolbox\">
                    <li><i class=\"fa fa-chevron-down\"></i></li>
                </ul>
                <div class=\"clearfix\"></div>
            </div>
        </a>
        <div class=\"x_content hide\">
            <br>
            <form method=\"post\" action=\"";
        // line 179
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\" enctype=\"multipart/form-data\">
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 182
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_file"        ,"payments"        ,        );
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
        echo ":
                    </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input type=\"file\" value=\"\" name=\"logo\" class=\"form-control\"><br>
                        <img src=\"";
        // line 186
        echo $this->getAttribute(($context["data"] ?? null), "logo_url", []);
        echo "\" class=\"img-responsive\" />
                    </div>
                    <div class=\"clearfix\"></div>
                </div>
                ";
        // line 190
        if ($this->getAttribute(($context["data"] ?? null), "logo", [])) {
            // line 191
            echo "                    <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                            ";
            // line 193
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_logo_delete"            ,"payments"            ,            );
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
            echo ":
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                            <input type=\"checkbox\" name=\"logo_delete\" value=\"1\" class=\"flat\">
                        </div>
                        <div class=\"clearfix\"></div>
                    </div>
                ";
        }
        // line 201
        echo "
                <div class=\"ln_solid\"></div>

                <!-- Buttons -->
                <div class=\"form-group\">
                    <div class=\"col-md-6 col-sm-6 col-xs-12 col-sm-offset-3\">
                        ";
        // line 207
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_save"        ,"start"        ,""        ,"button"        ,        );
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
        $context['save_text'] = $result;
        // line 208
        echo "                        <input type=\"submit\" name=\"btn_save\" value=\"";
        echo ($context["save_text"] ?? null);
        echo "\" class=\"btn btn-success\">
                        <a class=\"btn btn-default\" href=\"";
        // line 209
        echo ($context["site_url"] ?? null);
        echo "admin/payments/systems\">
                            ";
        // line 210
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
        // line 211
        echo "                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


";
        // line 220
        $this->loadTemplate("@app/footer.twig", "edit_system.twig", 220)->display($context);
    }

    public function getTemplateName()
    {
        return "edit_system.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  884 => 220,  873 => 211,  852 => 210,  848 => 209,  843 => 208,  822 => 207,  814 => 201,  784 => 193,  780 => 191,  778 => 190,  771 => 186,  745 => 182,  739 => 179,  708 => 170,  696 => 160,  675 => 159,  671 => 158,  666 => 157,  645 => 156,  632 => 145,  626 => 144,  617 => 140,  612 => 138,  609 => 137,  606 => 136,  603 => 135,  599 => 134,  573 => 130,  567 => 126,  561 => 125,  556 => 123,  549 => 122,  541 => 120,  538 => 119,  535 => 118,  531 => 117,  506 => 114,  501 => 111,  471 => 103,  467 => 102,  457 => 99,  453 => 98,  449 => 97,  424 => 94,  419 => 91,  416 => 90,  394 => 89,  391 => 88,  369 => 87,  367 => 86,  359 => 81,  355 => 79,  352 => 78,  330 => 77,  327 => 76,  305 => 75,  303 => 74,  277 => 70,  273 => 68,  271 => 67,  268 => 66,  261 => 64,  256 => 62,  246 => 59,  242 => 58,  239 => 57,  237 => 56,  231 => 53,  227 => 52,  224 => 51,  222 => 50,  215 => 48,  212 => 47,  210 => 46,  205 => 44,  201 => 42,  199 => 41,  193 => 40,  187 => 36,  184 => 35,  162 => 34,  159 => 33,  137 => 32,  135 => 31,  110 => 28,  101 => 22,  76 => 19,  70 => 16,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_system.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella/edit_system.twig");
    }
}
