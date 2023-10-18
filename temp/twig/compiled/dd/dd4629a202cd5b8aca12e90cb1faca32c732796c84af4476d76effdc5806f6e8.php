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

/* helper_lang_row_select.twig */
class __TwigTemplate_3c7fb7cc9ec3d77002eb100c2b70f2c36c89a33db5619ac8ef1ca9adfd15175b extends \Twig\Template
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
        echo "<span><i class=\"fa fa-globe\"></i>";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_language_list"        ,"languages"        ,        );
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
        echo ":</span>";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            if (($this->getAttribute($context["item"], "status", []) == "1")) {
                // line 4
                echo "        <li";
                if (($this->getAttribute($context["loop"], "index", []) == $this->getAttribute($context["loop"], "length", []))) {
                    echo "class=\"last\"";
                }
                echo ">
            <a";
                // line 5
                if (($this->getAttribute($context["item"], "id", []) == ($context["current_lang"] ?? null))) {
                    echo "class=\"active\"";
                } else {
                    echo "onclick=\"";
                    $module =                     null;
                    $helper =                     'start';
                    $name =                     'setAnalytics';
                    $params = array("f"                    ,"language_switch"                    ,                    );
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
                    echo "locationHref('";
                    echo ($context["site_url"] ?? null);
                    echo "languages/change_lang/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "', 'hard');\"";
                }
                echo ">";
                echo $this->getAttribute($context["item"], "name", []);
                echo "</a>";
                if (($this->getAttribute($context["loop"], "index", []) != $this->getAttribute($context["loop"], "length", []))) {
                    echo ",";
                }
                // line 6
                echo "        </li>";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "helper_lang_row_select.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 6,  79 => 5,  72 => 4,  70 => 3,  53 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_lang_row_select.twig", "/home/custpg/operator/application/modules/languages/views/flatty/helper_lang_row_select.twig");
    }
}
