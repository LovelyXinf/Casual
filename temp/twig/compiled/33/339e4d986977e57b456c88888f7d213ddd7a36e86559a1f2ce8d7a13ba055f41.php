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

/* main_menu.twig */
class __TwigTemplate_f3f8dec111cba3f115a58f719d3f89be2accb9049eb721e863284712e8523944 extends \Twig\Template
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
        if ((($context["auth_type"] ?? null) == "operator")) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["menu"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["level1"]) {
                // line 3
                echo "        ";
                if ($this->getAttribute($context["level1"], "sub", [])) {
                    // line 4
                    echo "            <div class=\"menu_section\">
                <ul class=\"nav side-menu\">
                    ";
                    // line 6
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["level1"], "sub", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["level2"]) {
                        // line 7
                        echo "                    <li class=\"";
                        if (($this->getAttribute($context["level2"], "active", []) == 1)) {
                            echo "current-page";
                        }
                        echo "\">
                        <a href=\"";
                        // line 8
                        echo $this->getAttribute($context["level2"], "link", []);
                        echo "\" class=\"";
                        if (($context["use_material_design_icons"] ?? null)) {
                            echo "material-icons-link";
                        }
                        echo "\">
                            ";
                        // line 9
                        if (($context["use_material_design_icons"] ?? null)) {
                            // line 10
                            echo "                                <i class=\"material-icons\">";
                            echo $this->getAttribute($context["level2"], "material_icon", []);
                            echo "</i>
                                <div class=\"menu_section_item-text\">";
                            // line 11
                            echo $this->getAttribute($context["level2"], "value", []);
                            echo "</div>
                            ";
                        } else {
                            // line 13
                            echo "                                <i class=\"fa fa-";
                            echo $this->getAttribute($context["level2"], "icon", []);
                            echo "\"></i>
                                ";
                            // line 14
                            echo $this->getAttribute($context["level2"], "value", []);
                            echo "
                            ";
                        }
                        // line 16
                        echo "                            ";
                        if ($this->getAttribute($context["level2"], "indicator", [])) {
                            echo "<span class=\"num\">";
                            echo $this->getAttribute($context["level2"], "indicator", []);
                            echo "</span>";
                        }
                        // line 17
                        echo "                        </a>
                    </li>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['level2'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 20
                    echo "                </ul>
            </div>
        ";
                }
                // line 23
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['level1'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 25
            echo "    <div class=\"menu\">
        <div class=\"t\">
            <div class=\"b min400\">
            </div>
        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "main_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 25,  105 => 23,  100 => 20,  92 => 17,  85 => 16,  80 => 14,  75 => 13,  70 => 11,  65 => 10,  63 => 9,  55 => 8,  48 => 7,  44 => 6,  40 => 4,  37 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "main_menu.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/menu/views/gentelella_operator/main_menu.twig");
    }
}
