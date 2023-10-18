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

/* edit.twig */
class __TwigTemplate_7fec075c99a0f138fab695f1865aad4e292f1a9e636198395af4ddd62748703b extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_content\">
            <form method=\"post\" enctype=\"multipart/form-data\" name=\"save_form\" data-parsley-validate class=\"form-horizontal form-label-left\">
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_nickname"        ,"operators"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
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
                        <input type=\"text\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["operator"] ?? null), "nickname", []));
        echo "\" name=\"nickname\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
        // line 16
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"email\" name=\"email\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["operator"] ?? null), "email", []));
        echo "\" class=\"form-control\">
                    </div>
                </div>";
        // line 22
        if ($this->getAttribute(($context["operator"] ?? null), "id", [])) {
            // line 23
            echo "                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 25
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_change_password"            ,"operators"            ,            );
            ob_start();
            $ci = &get_instance();
            $ci->load->helper($helper, $module);
            if (empty($module)) {
            $module = str_replace('_helper', '', $helper);
            }
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
                        <input type=\"checkbox\" value=\"1\" name=\"update_password\" id=\"pass_change_field\" class=\"flat\">
                    </div>
                </div>";
        }
        // line 31
        echo "                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
        // line 33
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_password"        ,"operators"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
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
                        <input type=\"password\" value=\"\" name=\"password\" id=\"pass_field\"";
        // line 35
        if ($this->getAttribute(($context["operator"] ?? null), "id", [])) {
            echo "disabled";
        }
        echo " class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
        // line 40
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_repassword"        ,"operators"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
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
                        <input type=\"password\" value=\"\" name=\"repassword\" id=\"repass_field\"";
        // line 42
        if ($this->getAttribute(($context["operator"] ?? null), "id", [])) {
            echo "disabled";
        }
        echo " class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
        // line 47
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute(($context["operator"] ?? null), "name", []));
        echo "\" name=\"name\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
        // line 54
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_operator_message_cost"        ,"operators"        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
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
        echo "                        (";
        $module =         null;
        $helper =         'start';
        $name =         'currency_format_output';
        $params = array(["no_tags" => true, "not_virtual" => true]        ,        );
        ob_start();
        $ci = &get_instance();
        $ci->load->helper($helper, $module);
        if (empty($module)) {
        $module = str_replace('_helper', '', $helper);
        }
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
        echo "):
                        </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"number\" min=\"0\" step=\"0.01\" value=\"";
        // line 58
        echo $this->getAttribute(($context["operator"] ?? null), "message_cost", []);
        echo "\" name=\"message_cost\" class=\"form-control\">
                    </div>
                </div>";
        // line 62
        $this->loadTemplate("custom_form_fields.twig", "edit.twig", 62)->display($context);
        // line 63
        echo "
                <div class=\"ln_solid\"></div>
                <input type=\"hidden\" name=\"lang_id\" value=\"";
        // line 65
        echo $this->getAttribute(($context["operator"] ?? null), "lang_id", []);
        echo "\" />
                <div class=\"form-group\">
                    <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                        <button type=\"submit\" name=\"btn_save\" class=\"btn btn-success\" value=\"1\">";
        // line 69
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
        echo "</button>
                        <a class=\"btn btn-default\" href=\"";
        // line 70
        echo ($context["site_url"] ?? null);
        echo "admin/operators\">";
        // line 71
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
        echo "</a>
                    </div>
                </div>
            </form>
            <div class=\"clearfix\"></div>
        </div>
    </div>
</div>

<script type=\"text/javascript\">
    \$(function(){
        \$(\"#pass_change_field\")
            .on('ifChecked', function(){
                \$(\"#pass_field\").removeAttr(\"disabled\");
                \$(\"#repass_field\").removeAttr(\"disabled\");
            })
            .on('ifUnchecked', function(){
                \$(\"#pass_field\").attr('disabled', 'disabled');
                \$(\"#repass_field\").attr('disabled', 'disabled');
            });
    });
</script>";
        // line 94
        $this->loadTemplate("@app/footer.twig", "edit.twig", 94)->display($context);
    }

    public function getTemplateName()
    {
        return "edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  365 => 94,  322 => 71,  319 => 70,  296 => 69,  290 => 65,  286 => 63,  284 => 62,  279 => 58,  253 => 55,  232 => 54,  225 => 49,  201 => 47,  192 => 42,  168 => 40,  159 => 35,  135 => 33,  132 => 31,  105 => 25,  102 => 23,  100 => 22,  95 => 18,  71 => 16,  64 => 11,  40 => 9,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/edit.twig");
    }
}
