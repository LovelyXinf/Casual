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

/* helper_current_balance.twig */
class __TwigTemplate_38d0376244a28d87d6d768d2596ac1c7bca5da60fb0bde49fa6d43b2498f7db6 extends \Twig\Template
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
        echo "<span>
    ";
        // line 2
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_balance"        ,"operators"        ,        );
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
    <a href=\"";
        // line 3
        echo ($context["site_url"] ?? null);
        echo "operator/start/statistics\">
        <strong class=\"js-curr-balance\" data-account=\"";
        // line 4
        echo $this->getAttribute($this->getAttribute(($context["h_cb_data"] ?? null), "operator", []), "account", []);
        echo "\">";
        $module =         null;
        $helper =         'start';
        $name =         'currency_format_output';
        $params = array(["value" => $this->getAttribute($this->getAttribute(($context["h_cb_data"] ?? null), "operator", []), "account", []), "no_tags" => true, "not_virtual" => true]        ,        );
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
        echo "</strong>
    </a>
</span>";
    }

    public function getTemplateName()
    {
        return "helper_current_balance.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 4,  56 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_current_balance.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella_operator/helper_current_balance.twig");
    }
}
