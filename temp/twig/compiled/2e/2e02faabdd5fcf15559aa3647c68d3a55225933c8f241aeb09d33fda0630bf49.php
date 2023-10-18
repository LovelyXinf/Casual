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
class __TwigTemplate_51baee8e43a6da0fd3bd9312f8cf46a015eea197ec4ad13df83840876a2612e7 extends \Twig\Template
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
            if (( !($context["type"] ?? null) || (($context["type"] ?? null) == "dropdown"))) {
                // line 3
                echo "        <select onchange=\"location.href = '";
                echo ($context["site_url"] ?? null);
                echo "admin/start/change_language/' + this.value;\" class=\"form-control menu\">";
                // line 4
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 5
                    if (($this->getAttribute($context["item"], "status", []) == "1")) {
                        // line 6
                        echo "                    <option value=\"";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\"";
                        if (($this->getAttribute($context["item"], "id", []) == ($context["current_lang"] ?? null))) {
                            echo "selected";
                        }
                        echo ">";
                        // line 7
                        echo $this->getAttribute($context["item"], "name", []);
                        echo "
                    </option>";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo "        </select>";
            } elseif ((            // line 12
($context["type"] ?? null) == "menu")) {
                // line 13
                echo "        <menu class=\"header-item\">";
                // line 14
                $context["lang"] = $this->getAttribute(($context["languages"] ?? null), ($context["current_lang"] ?? null));
                // line 15
                echo $this->getAttribute(($context["lang"] ?? null), "name", []);
                echo "&nbsp;
            <i class=\"fa-caret-down\"></i>
            <div class=\"drop w150\">
                <menu>";
                // line 19
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 20
                    echo "                        <li>";
                    // line 21
                    if (($this->getAttribute($context["item"], "status", []) == "1")) {
                        // line 22
                        echo "                                <a href=\"";
                        echo ($context["site_url"] ?? null);
                        echo "admin/start/change_language/";
                        echo $this->getAttribute($context["item"], "id", []);
                        echo "\">";
                        // line 23
                        echo $this->getAttribute($context["item"], "name", []);
                        echo "
                                </a>";
                    }
                    // line 26
                    echo "                        </li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 28
                echo "                </menu>
            </div>
        </menu>";
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
        return array (  100 => 28,  94 => 26,  89 => 23,  83 => 22,  81 => 21,  79 => 20,  75 => 19,  69 => 15,  67 => 14,  65 => 13,  63 => 12,  61 => 11,  52 => 7,  44 => 6,  42 => 5,  38 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_lang_select.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella/helper_lang_select.twig");
    }
}
