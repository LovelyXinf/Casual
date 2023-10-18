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

/* domains_edit.twig */
class __TwigTemplate_5a552e700f426ff3eced1d4152b929537cd89e9d2f33b4e99a51415abf693ead extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "domains_edit.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_content\">
            <form method=\"post\" enctype=\"multipart/form-data\" name=\"save_form\" data-parsley-validate class=\"form-horizontal form-label-left\">
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_domain"        ,"start"        ,        );
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
        echo twig_escape_filter($this->env, $this->getAttribute(($context["domain"] ?? null), "domain", []));
        echo "\" name=\"domain\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 16
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_token"        ,"start"        ,        );
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
                        <input type=\"text\" name=\"token\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["domain"] ?? null), "token", []));
        echo "\" class=\"form-control\">
                    </div>
                </div>

                <div class=\"ln_solid\"></div>
                <div class=\"form-group\">
                    <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                        <button type=\"submit\" name=\"btn_save\" class=\"btn btn-success\" value=\"1\">
                            ";
        // line 26
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
        // line 27
        echo ($context["site_url"] ?? null);
        echo "admin/start/domains\">
                            ";
        // line 28
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

";
        // line 37
        $this->loadTemplate("@app/footer.twig", "domains_edit.twig", 37)->display($context);
    }

    public function getTemplateName()
    {
        return "domains_edit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 37,  135 => 28,  131 => 27,  108 => 26,  97 => 18,  73 => 16,  65 => 11,  41 => 9,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "domains_edit.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella/domains_edit.twig");
    }
}
