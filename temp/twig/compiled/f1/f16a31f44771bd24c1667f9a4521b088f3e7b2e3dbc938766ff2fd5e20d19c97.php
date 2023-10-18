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

/* edit_form.twig */
class __TwigTemplate_26324395ee2e02253143398e7193476acaf5e1b0aab09dd7d53c77610d178829 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit_form.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class='x_title'>
            <h2>
                ";
        // line 7
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
        // line 8
        echo "            </h2>
            <div class='clearfix'></div>
        </div>

        <div class=\"x_content\">
            <form method=\"post\" action=\"";
        // line 13
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\" enctype=\"multipart/form-data\" class=\"form-horizontal form-label-left\">
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 16
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
        // line 19
        if (($context["allow_edit"] ?? null)) {
            // line 20
            echo "                            <input type=\"text\" value=\"";
            echo $this->getAttribute(($context["data"] ?? null), "gid", []);
            echo "\" name=\"gid\" class=\"form-control\">
                        ";
        } else {
            // line 22
            echo "                            <label class=\"data-label\">
                                ";
            // line 23
            echo $this->getAttribute(($context["data"] ?? null), "gid", []);
            echo "
                            </label>
                        ";
        }
        // line 26
        echo "                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 31
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_notification_name"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                        <input value=\"";
        // line 34
        if (($context["validate_lang"] ?? null)) {
            ob_start();
            echo $this->getAttribute(($context["validate_lang"] ?? null), ($context["cur_lang"] ?? null), [], "array");
            echo "
                                      ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } else {
            // line 35
            ob_start();
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array($this->getAttribute(($context["data"] ?? null), "name_i", [])            ,"notifications"            ,($context["cur_lang"] ?? null)            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
            $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
            } elseif (function_exists($name)) {
            $result = call_user_func_array($name, $params);
            } else {
            $result = '';
            }
            $output_buffer = ob_get_contents();
            ob_end_clean();
            echo $output_buffer.$result;
            // line 36
            echo "                                      ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
        echo "\"
                               type=\"text\" name=\"langs[";
        // line 37
        echo ($context["cur_lang"] ?? null);
        echo "]\" class=\"form-control\">
                        ";
        // line 38
        if ((($context["languages_count"] ?? null) > 1)) {
            // line 39
            echo "                            <div class=\"accordion\" id=\"accordion\" role=\"tablist\" aria-multiselectable=\"true\">
                                <div class=\"panel\">
                                    <a class=\"panel-heading\" role=\"tab\" id=\"headingOne\" data-toggle=\"collapse\"
                                       data-parent=\"#accordion\" href=\"#collapseOne\" aria-expanded=\"false\" aria-controls=\"collapseOne\">
                                        <h4 class=\"panel-title\">";
            // line 43
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("others_languages"            ,"start"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
            if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["lang_id"] => $context["item"]) {
                // line 48
                echo "                                                ";
                if (($context["lang_id"] != ($context["cur_lang"] ?? null))) {
                    // line 49
                    echo "                                                    <div class=\"form-group\">
                                                        <label class=\"control-label col-md-2 col-sm-2 col-xs-12\">";
                    // line 50
                    echo $this->getAttribute($context["item"], "name", []);
                    echo "</label>
                                                        <div class=\"col-md-10 col-sm-10 col-xs-12\">
                                                            <input type=\"text\" name=\"langs[";
                    // line 52
                    echo $context["lang_id"];
                    echo "]\" class=\"form-control\"
                                                                   value=\"";
                    // line 53
                    if (($context["validate_lang"] ?? null)) {
                        ob_start();
                        echo $this->getAttribute(($context["validate_lang"] ?? null), $context["lang_id"], [], "array");
                        echo "
                                                                          ";
                        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                    } else {
                        // line 54
                        ob_start();
                        // line 55
                        echo "                                                                              ";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array($this->getAttribute(($context["data"] ?? null), "name_i", [])                        ,"notifications"                        ,($context["lang_id"] ?? null)                        ,                        );
                        ob_start();
                        $ci = &get_instance();
                        $ci->load->helper($helper, $module);
                        if (empty($module)) {
                        $module = str_replace('_helper', '', $helper);
                        }
                        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
                        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
                        } elseif (function_exists($name)) {
                        $result = call_user_func_array($name, $params);
                        } else {
                        $result = '';
                        }
                        $output_buffer = ob_get_contents();
                        ob_end_clean();
                        echo $output_buffer.$result;
                        // line 56
                        echo "                                                                          ";
                        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                    }
                    echo "\">
                                                        </div>
                                                    </div>
                                                ";
                }
                // line 60
                echo "                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['lang_id'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
        }
        // line 66
        echo "                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 71
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_send_type"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                        <select name=\"send_type\" class=\"form-control\">
                            <option value=\"que\" ";
        // line 75
        if (($this->getAttribute(($context["data"] ?? null), "send_type", []) == "que")) {
            echo "selected";
        }
        echo ">
                                ";
        // line 76
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_send_type_que"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        // line 77
        echo "                            </option>
                            <option value=\"simple\" ";
        // line 78
        if (($this->getAttribute(($context["data"] ?? null), "send_type", []) == "simple")) {
            echo "selected";
        }
        echo ">
                                ";
        // line 79
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_send_type_simple"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
        $result = call_user_func_array(NS_MODULES . $module . '\\helpers\\' . $name, $params);
        } elseif (function_exists($name)) {
        $result = call_user_func_array($name, $params);
        } else {
        $result = '';
        }
        $output_buffer = ob_get_contents();
        ob_end_clean();
        echo $output_buffer.$result;
        // line 80
        echo "                            </option>
                        </select>
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 87
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_default_template"        ,"notifications"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
        if (function_exists(NS_MODULES . $module . '\\helpers\\' . $name)) {
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
                        <select name=\"id_template_default\" class=\"form-control\">
                            ";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["templates"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 92
            echo "                                <option ";
            if (($this->getAttribute(($context["data"] ?? null), "id_template_default", []) == $this->getAttribute($context["item"], "id", []))) {
                echo "selected";
            }
            // line 93
            echo "                                        value=\"";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">
                                    ";
            // line 94
            echo $this->getAttribute($context["item"], "name", []);
            echo "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "                        </select>
                    </div>
                </div>

                <div class=\"ln_solid\"></div>

                <div class=\"form-group\">
                    <div class=\"col-md-9 col-sm-9 col-xs-9 col-sm-offset-3\">
                        <input value=\"";
        // line 105
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
        echo "\"
                               type=\"submit\" name=\"btn_save\"  class=\"btn btn-success\">
                        <a class=\"btn btn-default cancel\" href=\"";
        // line 107
        echo ($context["site_url"] ?? null);
        echo "admin/notifications/index\">
                            ";
        // line 108
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
        // line 109
        echo "                        </a>
                    </div>
                    <div class='clearfix'></div>
                </div>
            </form>
        </div>
    </div>
</div>

";
        // line 118
        $this->loadTemplate("@app/footer.twig", "edit_form.twig", 118)->display($context);
    }

    public function getTemplateName()
    {
        return "edit_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  512 => 118,  501 => 109,  480 => 108,  476 => 107,  452 => 105,  442 => 97,  433 => 94,  428 => 93,  423 => 92,  419 => 91,  393 => 87,  384 => 80,  363 => 79,  357 => 78,  354 => 77,  333 => 76,  327 => 75,  301 => 71,  294 => 66,  287 => 61,  281 => 60,  272 => 56,  250 => 55,  248 => 54,  240 => 53,  236 => 52,  231 => 50,  228 => 49,  225 => 48,  221 => 47,  195 => 43,  189 => 39,  187 => 38,  183 => 37,  177 => 36,  155 => 35,  147 => 34,  122 => 31,  115 => 26,  109 => 23,  106 => 22,  100 => 20,  98 => 19,  73 => 16,  67 => 13,  60 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/notifications/views/gentelella/edit_form.twig");
    }
}
