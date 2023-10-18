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

/* modules_login.twig */
class __TwigTemplate_9062886554b3b467b13256add15373ef5817abe274fa8029bf0bc2b07141a46a extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "modules_login.twig", 1)->display($context);
        // line 2
        echo "
<form method=\"post\" action=\"";
        // line 3
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" class=\"form-horizontal form-label-left\">
    <div class=\"form-group\">
        <label class=\"control-label col-sm-3 col-xs-12\">";
        // line 5
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_login"        ,"start"        ,        );
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
        <div class=\"col-sm-6 col-xs-12\"><input type=\"text\" value=\"";
        // line 6
        echo $this->getAttribute(($context["data"] ?? null), "login", []);
        echo "\" name=\"login\" class=\"form-control\"></div>
    </div>
    <div class=\"form-group\">
        <label class=\"control-label col-sm-3 col-xs-12\">";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_password"        ,"start"        ,        );
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
        <div class=\"col-sm-6 col-xs-12\"><input type=\"password\" value=\"\" name=\"password\" class=\"form-control\"></div>
    </div>
    <div class=\"clearfix\"></div>
    <div class=\"ln_solid\"></div>
    <div class=\"form-group\">
        <div class=\"col-sm-9 col-xs-12 col-sm-offset-3\">
            <input type=\"submit\" name=\"btn_login\" class=\"btn btn-primary\"
              value=\"";
        // line 17
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_login"        ,"start"        ,""        ,"button"        ,        );
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
    </div>
</form>

";
        // line 22
        $this->loadTemplate("@app/footer.twig", "modules_login.twig", 22)->display($context);
    }

    public function getTemplateName()
    {
        return "modules_login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 22,  99 => 17,  69 => 9,  63 => 6,  40 => 5,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules_login.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/install/views/gentelella/modules_login.twig");
    }
}
