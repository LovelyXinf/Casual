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

/* level1_menu.twig */
class __TwigTemplate_517019e1bcd8db183a880e6a4d37d6e2e5752e8667f94f3e46a7f26998803e11 extends \Twig\Template
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 2
            echo "    <li";
            if (($this->getAttribute($context["item"], "active", []) == 1)) {
                echo " class=\"active\"";
            }
            echo ">
        <a id=\"";
            // line 3
            echo $this->getAttribute($context["item"], "gid", []);
            echo "\" href=\"";
            echo $this->getAttribute($context["item"], "link", []);
            echo "\">";
            echo $this->getAttribute($context["item"], "value", []);
            // line 4
            if ($this->getAttribute($context["item"], "indicator", [])) {
                echo "<span class=\"num\">";
                echo $this->getAttribute($context["item"], "indicator", []);
                echo "</span>";
            }
            // line 5
            echo "        </a>
    </li>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "level1_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 5,  47 => 4,  41 => 3,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "level1_menu.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/menu/views/gentelella/level1_menu.twig");
    }
}
