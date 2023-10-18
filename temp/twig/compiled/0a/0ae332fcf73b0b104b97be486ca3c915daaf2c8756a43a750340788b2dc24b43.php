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

/* edit_template_form.twig */
class __TwigTemplate_0e1300fcdf6c4dc74a37fdf0f87190b44f4190757e7e2e46f6e54023b41532c2 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit_template_form.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_title\">
            <div id=\"edit_tabs\" class=\"btn-group\" data-toggle=\"buttons\">
                <label class=\"active btn btn-default\" onclick=\"javascript: openTab('template_settings'); return false;\"
                       data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\">
                    <input type=\"radio\" name=\"user_type\"
                           value=\"";
        // line 10
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("template_settings"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                           selected>";
        // line 11
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("template_settings"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
        echo "                </label>
            ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 14
            echo "                <label class=\"btn btn-default\" onclick=\"javascript: openTab('lang";
            echo $this->getAttribute($context["item"], "id", []);
            echo "'); return false;\"
                       data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\">
                    <input type=\"radio\" name=\"user_type\"
                           value=\"";
            // line 17
            echo $this->getAttribute($context["item"], "name", []);
            echo "\"
                           selected>";
            // line 18
            echo $this->getAttribute($context["item"], "name", []);
            echo "
                </label>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "            </div>
            <div class=\"clearfix\"></div>
        </div>

        <form id=\"tabs\" method=\"post\" action=\"";
        // line 25
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\"
              enctype=\"multipart/form-data\" class=\"form-horizontal form-label-left\">
            <div id=\"template_settings\" class=\"js-tab\">
                <div class=\"x_title\">
                    <h2>
                        ";
        // line 30
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("admin_header_template_edit"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
        echo "                    </h2>
                    <div class=\"clearfix\"></div>
                </div>
                <div class=\"x_content\">
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                            ";
        // line 37
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_template_gid"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                        <div class=\"col-md-9 col-sm-9 col-xs-12\">
                            ";
        // line 40
        if (($context["allow_edit"] ?? null)) {
            // line 41
            echo "                                <input type=\"text\" value=\"";
            echo $this->getAttribute(($context["data"] ?? null), "gid", []);
            echo "\" name=\"gid\" class=\"form-control\">
                            ";
        } else {
            // line 43
            echo "                                <label class=\"data-label\">
                                    ";
            // line 44
            echo $this->getAttribute(($context["data"] ?? null), "gid", []);
            echo "
                                </label>
                            ";
        }
        // line 47
        echo "                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                            ";
        // line 51
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_template_name"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                        <div class=\"col-md-9 col-sm-9 col-xs-12\">
                            ";
        // line 54
        if (($context["allow_edit"] ?? null)) {
            // line 55
            echo "                                <input type=\"text\" value=\"";
            echo $this->getAttribute(($context["data"] ?? null), "name", []);
            echo "\" name=\"name\" class=\"form-control\">
                            ";
        } else {
            // line 57
            echo "                                <label class=\"data-label\">
                                    ";
            // line 58
            echo $this->getAttribute(($context["data"] ?? null), "name", []);
            echo "
                                </label>
                            ";
        }
        // line 61
        echo "                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                            ";
        // line 66
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_content_type"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                        <div class=\"col-md-9 col-sm-9 col-xs-12\">
                            ";
        // line 69
        if (($context["allow_edit"] ?? null)) {
            // line 70
            echo "                                <select name=\"content_type\" class=\"form-control\">
                                    <option value=\"text\" ";
            // line 71
            if (($this->getAttribute(($context["data"] ?? null), "content_type", []) == "text")) {
                echo "selected";
            }
            echo ">
                                        ";
            // line 72
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_content_type_text"            ,"notifications"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 73
            echo "                                    </option>
                                    <option value=\"html\" ";
            // line 74
            if (($this->getAttribute(($context["data"] ?? null), "content_type", []) == "html")) {
                echo "selected";
            }
            echo ">
                                        ";
            // line 75
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_content_type_html"            ,"notifications"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
            echo "                                    </option>
                                </select>
                            ";
        } else {
            // line 79
            echo "                                <label class=\"data-label\">
                                    ";
            // line 80
            echo $this->getAttribute(($context["data"] ?? null), "content_type", []);
            echo "
                                </label>
                            ";
        }
        // line 83
        echo "                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                            ";
        // line 88
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_template_vars"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                        <div class=\"col-md-9 col-sm-9 col-xs-12\">
                            ";
        // line 91
        if ((($context["allow_edit"] ?? null) && ($context["allow_var_edit"] ?? null))) {
            // line 92
            echo "                                <input type=\"text\" value=\"";
            echo $this->getAttribute(($context["data"] ?? null), "vars_str", []);
            echo "\" name=\"vars\" class=\"form-control\">
                            ";
        } else {
            // line 94
            echo "                                <label class=\"data-label\">
                                    ";
            // line 95
            echo $this->getAttribute(($context["data"] ?? null), "vars_str", []);
            echo "
                                </label>
                            ";
        }
        // line 98
        echo "                            <label class=\"data-label\">
                                <i>";
        // line 99
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_template_vars_text"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        echo "</i>
                            </label>

                        </div>
                    </div>
                </div>
            </div>

            ";
        // line 107
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 108
            echo "                ";
            $context["content"] = $this->getAttribute(($context["data_content"] ?? null), $context["key"], [], "array");
            // line 109
            echo "                <div id=\"lang";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\" class=\"js-tab hide\">
                    <div class=\"x_title\">
                        <h2>
                            ";
            // line 112
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_template_content"            ,"notifications"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            echo ": ";
            echo $this->getAttribute($context["item"], "name", []);
            echo "
                        </h2>
                        <div class=\"clearfix\"></div>
                    </div>
                    <div class=\"x_content\">
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                                ";
            // line 119
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_available_global_variables"            ,"notifications"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                            <div class=\"col-md-9 col-sm-9 col-xs-12\">
                                ";
            // line 122
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["global_vars"] ?? null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["var"]) {
                // line 123
                echo "                                    <label class=\"data-label\">
                                        [";
                // line 124
                echo $context["var"];
                echo "]
                                    </label>
                                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 127
                echo "                                    <label class=\"data-label\">
                                        <i>";
                // line 128
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("empty_variables"                ,"notifications"                ,                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                echo "</i>
                                    </label>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['var'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 131
            echo "                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                                ";
            // line 135
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_available_variables"            ,"notifications"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                            <div class=\"col-md-9 col-sm-9 col-xs-12\">
                                ";
            // line 138
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "vars", []));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["var"]) {
                // line 139
                echo "                                    <label class=\"data-label\">
                                        [";
                // line 140
                echo $context["var"];
                echo "]
                                    </label>
                                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 143
                echo "                                    <label class=\"data-label\">
                                        <i>";
                // line 144
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("empty_variables"                ,"notifications"                ,                );
                ob_start();
                $ci = &get_instance();
                $ci->load->helper($helper, $module);
                if (empty($module)) {
                $module = str_replace('_helper', '', $helper);
                }
                if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                } elseif (function_exists($name)) {
                $result = call_user_func_array($name, $params);
                } else {
                $result = '';
                }
                $output_buffer = ob_get_contents();
                ob_end_clean();
                echo $output_buffer.$result;
                echo "</i>
                                    </label>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['var'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 147
            echo "                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                                ";
            // line 151
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_subject"            ,"notifications"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                            <div class=\"col-md-9 col-sm-9 col-xs-12\">
                                <input type=\"text\" value=\"";
            // line 154
            echo $this->getAttribute(($context["content"] ?? null), "subject", []);
            echo "\" name=\"subject[";
            echo $this->getAttribute($context["item"], "id", []);
            echo "]\" class=\"form-control\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                                ";
            // line 159
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_content"            ,"notifications"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                            <div class=\"col-md-9 col-sm-9 col-xs-12\">
                                ";
            // line 162
            if (($this->getAttribute(($context["data"] ?? null), "content_type", []) == "html")) {
                // line 163
                echo "                                    <label class=\"data-label\">
                                        ";
                // line 164
                echo $this->getAttribute(($context["content"] ?? null), "content_fck", []);
                echo "
                                    </label>
                                ";
            } else {
                // line 167
                echo "                                    <textarea name=\"content[";
                echo $this->getAttribute($context["item"], "id", []);
                echo "]\" rows=\"4\" class=\"form-control\">";
                ob_start();
                // line 168
                echo "                                        ";
                echo $this->getAttribute(($context["content"] ?? null), "content", []);
                echo "
                                    ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 169
                echo "</textarea>
                                ";
            }
            // line 171
            echo "                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "            <div class=\"clearfix\"></div>
            <div class=\"ln_solid\"></div>
            <div class=\"form-group\">
                <div class=\"col-md-9 col-sm-9 col-xs-9 col-sm-offset-3\">
                    <input type=\"submit\" name=\"btn_save\"  class=\"btn btn-success\"
                            value=\"";
        // line 181
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
        echo $output_buffer.$result;
        echo "\">
                    <a class=\"btn btn-default cancel\" href=\"";
        // line 182
        echo ($context["site_url"] ?? null);
        echo "admin/notifications/templates\">
                        ";
        // line 183
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
        // line 184
        echo "                    </a>
                </div>
                <div class='clearfix'></div>
            </div>
        </form>
    </div>
</div>

<script>
    function openTab(id){
        \$('#tabs > .js-tab').addClass('hide');
        \$('#'+id).removeClass('hide');
    }
</script>

";
        // line 199
        $this->loadTemplate("@app/footer.twig", "edit_template_form.twig", 199)->display($context);
    }

    public function getTemplateName()
    {
        return "edit_template_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  805 => 199,  788 => 184,  767 => 183,  763 => 182,  740 => 181,  733 => 176,  723 => 171,  719 => 169,  713 => 168,  708 => 167,  702 => 164,  699 => 163,  697 => 162,  672 => 159,  662 => 154,  637 => 151,  631 => 147,  603 => 144,  600 => 143,  592 => 140,  589 => 139,  584 => 138,  559 => 135,  553 => 131,  525 => 128,  522 => 127,  514 => 124,  511 => 123,  506 => 122,  481 => 119,  450 => 112,  443 => 109,  440 => 108,  436 => 107,  406 => 99,  403 => 98,  397 => 95,  394 => 94,  388 => 92,  386 => 91,  361 => 88,  354 => 83,  348 => 80,  345 => 79,  340 => 76,  319 => 75,  313 => 74,  310 => 73,  289 => 72,  283 => 71,  280 => 70,  278 => 69,  253 => 66,  246 => 61,  240 => 58,  237 => 57,  231 => 55,  229 => 54,  204 => 51,  198 => 47,  192 => 44,  189 => 43,  183 => 41,  181 => 40,  156 => 37,  148 => 31,  127 => 30,  119 => 25,  113 => 21,  104 => 18,  100 => 17,  93 => 14,  89 => 13,  86 => 12,  65 => 11,  42 => 10,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_template_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/notifications/views/gentelella/edit_template_form.twig");
    }
}
