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

/* numerics_menu.twig */
class __TwigTemplate_49c1e4f325d1a5948436ac5791e6ad4b5c1ed64ca6a08bd5954ab8fa5f241cc1 extends \Twig\Template
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
        echo "<li";
        if ((($context["section"] ?? null) == "overview")) {
            echo " class=\"active\"";
        }
        echo ">
    <a href=\"";
        // line 2
        echo ($context["site_url"] ?? null);
        echo "admin/start/settings/overview\">
        ";
        // line 3
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("sett_overview_item"        ,"start"        ,        );
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
        echo "    </a>
</li>
<li";
        // line 6
        if ((($context["section"] ?? null) == "numerics")) {
            echo " class=\"active\"";
        }
        echo ">
    <a href=\"";
        // line 7
        echo ($context["site_url"] ?? null);
        echo "admin/start/settings/numerics\">
        ";
        // line 8
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("sett_numerics_item"        ,"start"        ,        );
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
        echo "    </a>
</li>
";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["other_settings"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 12
            echo "    <li";
            if (($context["key"] == ($context["section"] ?? null))) {
                echo " class=\"active\"";
            }
            echo ">
        <a href=\"";
            // line 13
            echo ($context["site_url"] ?? null);
            echo "admin/start/settings/";
            echo $context["key"];
            echo "\">
            ";
            // line 14
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array((("sett_" . ($context["key"] ?? null)) . "_item")            ,"start"            ,            );
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
            // line 15
            echo "        </a>
    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "<li";
        if ((($context["section"] ?? null) == "date_formats")) {
            echo " class=\"active\"";
        }
        echo ">
    <a href=\"";
        // line 19
        echo ($context["site_url"] ?? null);
        echo "admin/start/settings/date_formats\">
        ";
        // line 20
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("sett_date_formats_item"        ,"start"        ,        );
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
        // line 21
        echo "    </a>
</li>
";
    }

    public function getTemplateName()
    {
        return "numerics_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 21,  158 => 20,  154 => 19,  147 => 18,  139 => 15,  118 => 14,  112 => 13,  105 => 12,  101 => 11,  97 => 9,  76 => 8,  72 => 7,  66 => 6,  62 => 4,  41 => 3,  37 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "numerics_menu.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella/numerics_menu.twig");
    }
}
