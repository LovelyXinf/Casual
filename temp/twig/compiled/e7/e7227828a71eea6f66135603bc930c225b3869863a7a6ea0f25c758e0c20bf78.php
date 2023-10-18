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
class __TwigTemplate_70339dfc98debd8d79460782fa09bdbef870f30cb95832d8989322c51fa85a6b extends \Twig\Template
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
        <div class=\"x_title\">
            <h2>
                ";
        // line 7
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            // line 8
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_moderators_change"            ,"moderators"            ,            );
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
            echo "                ";
        } else {
            // line 10
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_moderators_add"            ,"moderators"            ,            );
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
            // line 11
            echo "                ";
        }
        // line 12
        echo "            </h2>
            <div class=\"clearfix\"></div>
        </div>
        <div class=\"x_content\">
            <br>
            <form method=\"post\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "action", []));
        echo "\" name=\"save_form\" class=\"form-horizontal form-label-left\">
                <div>";
        // line 18
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "</div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 21
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_nickname"        ,"moderators"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "nickname", []));
        echo "\" name=\"nickname\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 28
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_email"        ,"moderators"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input type=\"email\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "email", []));
        echo "\" name=\"email\" class=\"form-control\">
                    </div>
                </div>

                ";
        // line 34
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            // line 35
            echo "                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
            // line 37
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_change_password"            ,"moderators"            ,            );
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
            echo ": </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <div class=\"checkbox\">
                            <input type=\"checkbox\" value=\"1\" name=\"update_password\" id=\"pass_change_field\" class=\"flat\">
                        </div>
                    </div>
                </div>
                ";
        }
        // line 45
        echo "
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 48
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_password"        ,"moderators"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input type=\"password\" value=\"\" name=\"password\" id=\"pass_field\"
                            class=\"form-control\" ";
        // line 51
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            echo "disabled";
        }
        echo ">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 56
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_repassword"        ,"moderators"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input type=\"password\" value=\"\" name=\"repassword\" id=\"repass_field\"
                            class=\"form-control\" ";
        // line 59
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            echo "disabled";
        }
        echo ">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 64
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_name"        ,"moderators"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "name", []));
        echo "\" name=\"name\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 71
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_description"        ,"moderators"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <textarea name=\"description\" class=\"form-control\">";
        // line 73
        echo $this->getAttribute(($context["data"] ?? null), "description", []);
        echo "</textarea>
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 79
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_permissions"        ,"moderators"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        ";
        // line 81
        $this->loadTemplate("permissions.twig", "edit_form.twig", 81)->display(twig_array_merge($context, ["module" => ($context["module"] ?? null)]));
        // line 82
        echo "                    </div>
                </div>

                <div class=\"ln_solid\"></div>

                <div class=\"form-group\">
                    <div class=\"col-md-6 col-sm-6 col-xs-12 col-sm-offset-3\">
                        ";
        // line 89
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
        $context['text_save'] = $result;
        // line 90
        echo "                        <input type=\"submit\" class=\"btn btn-success\" value=\"";
        echo ($context["text_save"] ?? null);
        echo "\" name=\"btn_save\">
                        <a class=\"btn btn-default\" href=\"";
        // line 91
        echo ($context["site_url"] ?? null);
        echo "admin/moderators\">
                            ";
        // line 92
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
        // line 93
        echo "                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class=\"clearfix\"></div>
<script type=\"text/javascript\">
    \$(function(){
            \$(document).off('ifChanged', '#pass_change_field').on('ifChanged', '#pass_change_field', function() {
                    \$(\"#pass_field\").prop('disabled', false);
                    \$(\"#repass_field\").prop('disabled', false);
            }).off('ifUnchecked', '#pass_change_field').on('ifUnchecked', '#pass_change_field', function() {
                    \$(\"#pass_field\").prop('disabled', true);
                    \$(\"#repass_field\").prop('disabled', true);
            });
    });
</script>

";
        // line 113
        $this->loadTemplate("@app/footer.twig", "edit_form.twig", 113)->display($context);
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
        return array (  455 => 113,  433 => 93,  412 => 92,  408 => 91,  403 => 90,  382 => 89,  373 => 82,  371 => 81,  347 => 79,  338 => 73,  314 => 71,  306 => 66,  282 => 64,  272 => 59,  247 => 56,  237 => 51,  212 => 48,  207 => 45,  177 => 37,  173 => 35,  171 => 34,  164 => 30,  140 => 28,  132 => 23,  108 => 21,  102 => 18,  98 => 17,  91 => 12,  88 => 11,  66 => 10,  63 => 9,  41 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/moderators/views/gentelella/edit_form.twig");
    }
}
