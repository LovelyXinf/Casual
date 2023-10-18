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

/* user_footer_menu.twig */
class __TwigTemplate_3756b3d097f3725010ce54ccb13978a7897d9e52b8cdbaff5b22793f06fdfee6 extends \Twig\Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menu"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 2
            echo "            <div class=\"col-sm-3 col-md-2 footer-menu-column\">
                <div class=\"footer-menu-title-block\" data-title=\"";
            // line 3
            echo $this->getAttribute($context["item"], "value", []);
            echo "\" data-id=\"footer-menu-title-";
            echo $context["key"];
            echo "\" id=\"footer-menu-title-";
            echo $context["key"];
            echo "\">";
            // line 4
            echo $this->getAttribute($context["item"], "value", []);
            echo "
                </div>";
            // line 6
            if ( !twig_test_empty($this->getAttribute($context["item"], "sub", []))) {
                // line 7
                echo "                    <ul class=\"footer-menu-list-block list-group\">";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["item"], "sub", []));
                foreach ($context['_seq'] as $context["_key"] => $context["subitem"]) {
                    // line 9
                    echo "                            <li onclick=\"";
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'setAnalytics';
                    $params = array("f"                    ,$this->getAttribute(($context["subitem"] ?? null), "gid", [])                    ,                    );
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
                    echo "\" class=\"footer-menu-list-group-item\">
                                <a id=\"footer_";
                    // line 10
                    echo $this->getAttribute($context["item"], "gid", []);
                    echo "_";
                    echo $this->getAttribute($context["subitem"], "gid", []);
                    echo "\" href=\"";
                    echo $this->getAttribute($context["subitem"], "link", []);
                    echo "\">
                                    <div class=\"footer-menu-list-group-item-text\">
                                        <span class=\"fm-icon\"><i class=\"fa fa-angle-right\"></i></span>";
                    // line 13
                    echo $this->getAttribute($context["subitem"], "value", []);
                    echo "
                                    </div>
                                </a>
                            </li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subitem'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 18
                echo "                    </ul>";
            }
            // line 20
            echo "            </div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "user_footer_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 20,  99 => 18,  89 => 13,  80 => 10,  56 => 9,  52 => 8,  50 => 7,  48 => 6,  44 => 4,  37 => 3,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "user_footer_menu.twig", "/home/custpg/operator/application/modules/menu/views/flatty/user_footer_menu.twig");
    }
}
