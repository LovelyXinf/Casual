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

/* settings.twig */
class __TwigTemplate_2551a787ff6d4f349893057d54da65a5a52ce59766fa403d1aaf2df99ab6c1ea extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "settings.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_content\">
            <form method=\"post\" name=\"save_form\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_min_message_chars"        ,"operators"        ,        );
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
                    <div class=\"col-md-5 col-xs-12 col-sm-5\">
                        <input type=\"number\" min=\"0\" step=\"1\" name=\"operator_message_min_chars\" class=\"form-control\" value=\"";
        // line 12
        echo $this->getAttribute(($context["settings"] ?? null), "operator_message_min_chars", []);
        echo "\" />
                    </div>
                </div>
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 17
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_max_message_chars"        ,"operators"        ,        );
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
                    <div class=\"col-md-5 col-xs-12 col-sm-5\">
                        <input type=\"number\" min=\"0\" step=\"1\" name=\"operator_message_max_chars\" class=\"form-control\" value=\"";
        // line 20
        echo $this->getAttribute(($context["settings"] ?? null), "operator_message_max_chars", []);
        echo "\" />
                    </div>
                </div>
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 25
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_time_to_answer"        ,"operators"        ,        );
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
                    <div class=\"col-md-5 col-xs-12 col-sm-5\">
                        <input type=\"number\" min=\"0\" step=\"1\" name=\"operator_message_time_to_answer\" class=\"form-control\" value=\"";
        // line 28
        echo $this->getAttribute(($context["settings"] ?? null), "operator_message_time_to_answer", []);
        echo "\" />
                    </div>
                </div>
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 33
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
        // line 34
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
                    <div class=\"col-md-5 col-xs-12 col-sm-5\">
                        <input type=\"number\" min=\"0\" step=\"0.01\" name=\"operator_message_cost\" class=\"form-control\" value=\"";
        // line 37
        echo $this->getAttribute(($context["settings"] ?? null), "operator_message_cost", []);
        echo "\" />
                    </div>
                </div>
                ";
        // line 57
        echo "                <div class=\"ln_solid\"></div>
                <div class=\"row form-group\">
                    <div class=\"col-md-offset-4 col-md-5 col-sm-offset-5 col-sm-5\">
                        <input class=\"btn btn-success\" type=\"submit\" name=\"btn_save\" value=\"";
        // line 60
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
                        <a class=\"btn btn-default\" href=\"";
        // line 61
        echo ($context["site_url"] ?? null);
        echo "admin/operators\">
                            ";
        // line 62
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
        // line 63
        echo "                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

";
        // line 71
        $this->loadTemplate("@app/footer.twig", "settings.twig", 71)->display($context);
    }

    public function getTemplateName()
    {
        return "settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 71,  246 => 63,  225 => 62,  221 => 61,  198 => 60,  193 => 57,  187 => 37,  161 => 34,  140 => 33,  132 => 28,  107 => 25,  99 => 20,  74 => 17,  66 => 12,  41 => 9,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "settings.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/settings.twig");
    }
}
