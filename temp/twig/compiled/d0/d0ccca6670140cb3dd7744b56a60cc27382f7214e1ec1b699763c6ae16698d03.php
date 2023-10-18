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

/* ajax_operator_select_form.twig */
class __TwigTemplate_202d78e1f90dda476922925824afeb920b36814e8d328b9b58257c130e2d5bac extends \Twig\Template
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
        echo "<div class=\"load_content_controller\">
    <div class=\"x_title h2\">";
        // line 3
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_user_select"        ,"users"        ,        );
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
        echo "    </div>
    <div>";
        // line 6
        if (($this->getAttribute(($context["select_data"] ?? null), "max_select", []) != 1)) {
            // line 7
            echo "            <b>";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("header_users_selected"            ,"users"            ,            );
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
            echo ":</b><br>
            <ul id=\"user_selected_items";
            // line 8
            echo $this->getAttribute(($context["select_data"] ?? null), "rand", []);
            echo "\" class=\"user-items-selected\">";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["select_data"] ?? null), "selected", []));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 10
                echo "                    <li>
                        <div class=\"user-block\">
                            <input type=\"checkbox\" name=\"remove_users[]\" value=\"";
                // line 12
                echo $this->getAttribute($context["item"], "id", []);
                echo "\" checked class=\"flat\">";
                // line 13
                echo $this->getAttribute($context["item"], "nickname", []);
                echo "
                        </div>
                    </li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "            </ul>
            <div class=\"clearfix\"></div>";
        }
        // line 20
        echo "
        <b>";
        // line 21
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_user_find"        ,"users"        ,        );
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
        echo ":</b><br>
        <input type=\"text\" id=\"user_search";
        // line 22
        echo $this->getAttribute(($context["select_data"] ?? null), "rand", []);
        echo "\" class=\"form-control controller-search\">

        <ul class=\"controller-items\" id=\"user_select_items";
        // line 24
        echo $this->getAttribute(($context["select_data"] ?? null), "rand", []);
        echo "\" style=\"padding-top:10px; border-top:none;\"></ul>

        <div class=\"controller-actions\">
            <div class=\"pull-left\">
                <a href=\"#\" id=\"user_close_link";
        // line 28
        echo $this->getAttribute(($context["select_data"] ?? null), "rand", []);
        echo "\" class=\"hide\">";
        // line 29
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_close"        ,"start"        ,        );
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
        // line 30
        echo "                </a>
            </div>
            <div id=\"user_page";
        // line 32
        echo $this->getAttribute(($context["select_data"] ?? null), "rand", []);
        echo "\" class=\"pages pull-right\"></div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "ajax_operator_select_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 32,  172 => 30,  151 => 29,  148 => 28,  141 => 24,  136 => 22,  113 => 21,  110 => 20,  106 => 17,  97 => 13,  94 => 12,  90 => 10,  86 => 9,  83 => 8,  59 => 7,  57 => 6,  54 => 4,  33 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "ajax_operator_select_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/ajax_operator_select_form.twig");
    }
}
