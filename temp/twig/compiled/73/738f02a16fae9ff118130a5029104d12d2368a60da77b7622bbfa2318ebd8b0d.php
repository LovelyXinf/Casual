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

/* sitemap_level.twig */
class __TwigTemplate_2d38fc2bc0495036190d3126f549fa4f492e96afcd831f57c5efff1bc9cc4782 extends \Twig\Template
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
        echo "<ul class=\"ul-top-padding\">";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["li"]) {
            // line 3
            echo "        <li>";
            // line 4
            if ($this->getAttribute($context["li"], "clickable", [])) {
                // line 5
                echo "                <a href=\"";
                echo $this->getAttribute($context["li"], "link", []);
                echo "\">";
                // line 6
                echo $this->getAttribute($context["li"], "name", []);
                echo "
                </a>";
            } else {
                // line 9
                echo $this->getAttribute($context["li"], "name", []);
            }
            // line 11
            if ($this->getAttribute($context["li"], "items", [])) {
                // line 12
                $this->loadTemplate("sitemap_level.twig", "sitemap_level.twig", 12)->display(twig_array_merge($context, ["list" => $this->getAttribute($context["li"], "items", [])]));
            }
            // line 14
            echo "        </li>";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['li'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "sitemap_level.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 16,  70 => 14,  67 => 12,  65 => 11,  62 => 9,  57 => 6,  53 => 5,  51 => 4,  49 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sitemap_level.twig", "/home/custpg/operator/application/modules/site_map/views/flatty/sitemap_level.twig");
    }
}
