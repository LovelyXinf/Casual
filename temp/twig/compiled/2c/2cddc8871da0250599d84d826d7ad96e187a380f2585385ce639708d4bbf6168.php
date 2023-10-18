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

/* helper_lang_select.twig */
class __TwigTemplate_2468f354888923580dea4f7d9eeadc7e1fcaef41ecc72932b660d633f4894f60 extends \Twig\Template
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
        if ((($context["count_active"] ?? null) > 1)) {
            // line 2
            echo "    ";
            if (( !($context["type"] ?? null) || (($context["type"] ?? null) == "dropdown"))) {
                // line 3
                echo "        <select onchange=\"location.href = '";
                echo ($context["site_url"] ?? null);
                echo "operator/start/change_language/' + this.value;\" class=\"form-control menu c-language-select\">
            ";
                // line 4
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 5
                    echo "                ";
                    if (($this->getAttribute($context["item"], "status", []) == "1")) {
                        // line 6
                        echo "                    <option value=\"";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\" ";
                        if (($this->getAttribute($context["item"], "id", []) == ($context["current_lang"] ?? null))) {
                            echo "selected";
                        }
                        echo ">
                        ";
                        // line 7
                        echo $this->getAttribute($context["item"], "name", []);
                        echo "
                    </option>
                ";
                    }
                    // line 10
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo "        </select>
    ";
            } elseif ((            // line 12
($context["type"] ?? null) == "menu")) {
                // line 13
                echo "        <menu class=\"header-item\">
            ";
                // line 14
                $context["lang"] = $this->getAttribute(($context["languages"] ?? null), ($context["current_lang"] ?? null));
                // line 15
                echo "            ";
                echo $this->getAttribute(($context["lang"] ?? null), "name", []);
                echo "&nbsp;
            <i class=\"fa-caret-down\"></i>
            <div class=\"drop w150\">
                <menu>
                    ";
                // line 19
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 20
                    echo "                        <li>
                            ";
                    // line 21
                    if (($this->getAttribute($context["item"], "status", []) == "1")) {
                        // line 22
                        echo "                                <a href=\"";
                        echo ($context["site_url"] ?? null);
                        echo "operator/start/change_language/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\">
                                    ";
                        // line 23
                        echo $this->getAttribute($context["item"], "name", []);
                        echo "
                                </a>
                            ";
                    }
                    // line 26
                    echo "                        </li>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 28
                echo "                </menu>
            </div>
        </menu>
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "helper_lang_select.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 28,  108 => 26,  102 => 23,  95 => 22,  93 => 21,  90 => 20,  86 => 19,  78 => 15,  76 => 14,  73 => 13,  71 => 12,  68 => 11,  62 => 10,  56 => 7,  47 => 6,  44 => 5,  40 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_lang_select.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella_operator/helper_lang_select.twig");
    }
}
