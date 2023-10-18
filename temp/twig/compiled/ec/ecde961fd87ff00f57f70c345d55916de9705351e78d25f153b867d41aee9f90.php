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

/* statistics.twig */
class __TwigTemplate_d57138be998062f66c2b7d6e2007e88b0bcf2ed821807189115c610ff3d806b0 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "statistics.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"\" role=\"tabpanel\" data-example-id=\"togglable-tabs\">
            <ul id=\"myTab\" class=\"nav nav-tabs bar_tabs\" role=\"tablist\">
                <li class=\"";
        // line 7
        if ((($context["section"] ?? null) == "timing")) {
            echo "active";
        }
        echo "\">
                    <a href=\"";
        // line 8
        echo ($context["site_url"] ?? null);
        echo "admin/operators/statistics/";
        echo ($context["operator_id"] ?? null);
        echo "/timing\">
                        ";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_chat_timing"        ,"operators"        ,        );
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
        // line 10
        echo "                    </a>
                </li>
                <li class=\"";
        // line 12
        if ((($context["section"] ?? null) == "messages")) {
            echo "active";
        }
        echo "\">
                    <a href=\"";
        // line 13
        echo ($context["site_url"] ?? null);
        echo "admin/operators/statistics/";
        echo ($context["operator_id"] ?? null);
        echo "/messages\">
                        ";
        // line 14
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_messages"        ,"operators"        ,        );
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
        echo "                    </a>
                </li>
                <li class=\"";
        // line 17
        if ((($context["section"] ?? null) == "earning")) {
            echo "active";
        }
        echo "\">
                    <a href=\"";
        // line 18
        echo ($context["site_url"] ?? null);
        echo "admin/operators/statistics/";
        echo ($context["operator_id"] ?? null);
        echo "/earning\">
                        ";
        // line 19
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_earning"        ,"operators"        ,        );
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
        // line 20
        echo "                    </a>
                </li>
            </ul>
        </div>

        ";
        // line 25
        if ((($context["section"] ?? null) == "timing")) {
            // line 26
            echo "            ";
            $this->loadTemplate("timing.twig", "statistics.twig", 26)->display($context);
            // line 27
            echo "        ";
        } elseif ((($context["section"] ?? null) == "messages")) {
            // line 28
            echo "            ";
            $this->loadTemplate("messages.twig", "statistics.twig", 28)->display($context);
            // line 29
            echo "        ";
        } elseif ((($context["section"] ?? null) == "earning")) {
            // line 30
            echo "            ";
            $this->loadTemplate("earning.twig", "statistics.twig", 30)->display($context);
            // line 31
            echo "        ";
        }
        // line 32
        echo "    </div>
</div>

";
        // line 35
        $this->loadTemplate("@app/footer.twig", "statistics.twig", 35)->display($context);
    }

    public function getTemplateName()
    {
        return "statistics.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 35,  173 => 32,  170 => 31,  167 => 30,  164 => 29,  161 => 28,  158 => 27,  155 => 26,  153 => 25,  146 => 20,  125 => 19,  119 => 18,  113 => 17,  109 => 15,  88 => 14,  82 => 13,  76 => 12,  72 => 10,  51 => 9,  45 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "statistics.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/statistics.twig");
    }
}
