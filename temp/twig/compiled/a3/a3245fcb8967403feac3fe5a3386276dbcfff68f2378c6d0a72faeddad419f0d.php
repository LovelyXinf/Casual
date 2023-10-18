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

/* helper_operator_select.twig */
class __TwigTemplate_6759e80991046a8169c368414a8338fb97b2fc4fda886e49f1520675061335e7 extends \Twig\Template
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
        $context["rand"] = twig_random($this->env, 1000);
        // line 2
        echo "
<input type=\"hidden\" name=\"";
        // line 3
        echo $this->getAttribute(($context["h_os_data"] ?? null), "var_name", []);
        echo "\">
<div id=\"user_select_";
        // line 4
        echo ($context["rand"] ?? null);
        echo "\" class=\"user-select\">
    <span id=\"user_text_";
        // line 5
        echo ($context["rand"] ?? null);
        echo "\">
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["h_os_data"] ?? null), "selected", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 7
            echo "            ";
            echo $this->getAttribute($context["item"], "nickname", []);
            echo " (";
            echo $this->getAttribute($context["item"], "output_name", []);
            echo ")";
            if (($this->getAttribute(($context["h_os_data"] ?? null), "max_select", []) != 1)) {
                echo "<br>";
            }
            // line 8
            echo "            <input type=\"hidden\" name=\"";
            echo $this->getAttribute(($context["h_os_data"] ?? null), "var_name", []);
            if (($this->getAttribute(($context["h_os_data"] ?? null), "max_select", []) != 1)) {
                echo "[]";
            }
            echo "\" value=\"";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </span>
    <a href=\"#\" id=\"user_link_";
        // line 11
        echo ($context["rand"] ?? null);
        echo "\">
        ";
        // line 12
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_manage_users"        ,"users"        ,        );
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
        // line 13
        echo "    </a>
    ";
        // line 14
        if (($this->getAttribute(($context["h_os_data"] ?? null), "max_select", []) > 1)) {
            // line 15
            echo "        <i>(";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("max_user_select"            ,"users"            ,            );
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
            echo ": ";
            echo $this->getAttribute(($context["h_os_data"] ?? null), "max_select", []);
            echo ")</i>
    ";
        }
        // line 16
        echo "<br>
    <div class=\"clearfix\"></div>
</div>

<script type=\"text/javascript\">
    \$(function () {
        loadScripts(
            \"";
        // line 23
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array("operators"        ,"../views/gentelella/js/OperatorSelect.js"        ,"path"        ,        );
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
        echo "\",
            function () {
                new operatorSelect({
                    siteUrl: '";
        // line 26
        echo ($context["site_url"] ?? null);
        echo "',
                    selectedItems: [";
        // line 27
        echo $this->getAttribute(($context["h_os_data"] ?? null), "selected_str", []);
        echo "],
                    elementsDOM: {
                        mainId: 'user_select_";
        // line 29
        echo ($context["rand"] ?? null);
        echo "',
                        spanId: 'user_text_";
        // line 30
        echo ($context["rand"] ?? null);
        echo "',
                        manageLinkId: 'user_link_";
        // line 31
        echo ($context["rand"] ?? null);
        echo "',
                        itemsId: 'user_select_items";
        // line 32
        echo ($context["rand"] ?? null);
        echo "',
                        selectedItemsId: 'user_selected_items";
        // line 33
        echo ($context["rand"] ?? null);
        echo "',
                        searchId: 'user_search";
        // line 34
        echo ($context["rand"] ?? null);
        echo "',
                        userPageId: 'user_page";
        // line 35
        echo ($context["rand"] ?? null);
        echo "',
                        closeId: 'user_close_link";
        // line 36
        echo ($context["rand"] ?? null);
        echo "',
                    },
                    varName: '";
        // line 38
        echo $this->getAttribute(($context["h_os_data"] ?? null), "var_name", []);
        echo "',
                    max: '";
        // line 39
        echo $this->getAttribute(($context["h_os_data"] ?? null), "max_select", []);
        echo "',
                    rand: '";
        // line 40
        echo ($context["rand"] ?? null);
        echo "',
                    checkboxClass: 'flat',
                    reloadSelectedCallback: function () {
                        \$('input.flat').iCheck({
                            checkboxClass: 'icheckbox_flat-green',
                            radioClass: 'iradio_flat-green'
                        }).on('ifClicked', function (event) {
                            \$(this).trigger('click');
                        }).on('ifChanged', function (event) {
                            \$(this).trigger('change');
                        }).on('ifChecked', function () {
                            \$(this).attr('checked', 'checked');
                        }).on('ifUnchecked', function () {
                            \$(this).removeAttr('checked');
                        }).on('ifDisabled', function () {
                            \$(this).attr('disabled', 'disabled');
                        }).on('ifEnabled', function () {
                            \$(this).removeAttr('disabled');
                        });
                    }
                });
            },
            ''
        );
    });
</script>";
    }

    public function getTemplateName()
    {
        return "helper_operator_select.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 40,  214 => 39,  210 => 38,  205 => 36,  201 => 35,  197 => 34,  193 => 33,  189 => 32,  185 => 31,  181 => 30,  177 => 29,  172 => 27,  168 => 26,  143 => 23,  134 => 16,  107 => 15,  105 => 14,  102 => 13,  81 => 12,  77 => 11,  74 => 10,  60 => 8,  51 => 7,  47 => 6,  43 => 5,  39 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_operator_select.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/helper_operator_select.twig");
    }
}
