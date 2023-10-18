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

/* users.twig */
class __TwigTemplate_77496944dd12d9ebb87db371cc0ebf0b6a826e9c8fd39ea6617a9f2b9560cd19 extends \Twig\Template
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
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 2
            echo "    <li class=\"chatbox-users__user\" data-id=\"";
            echo $this->getAttribute($context["user"], "id", []);
            echo "\" id=\"chb_user_";
            echo $this->getAttribute($context["user"], "id", []);
            echo "\">
        <div class=\"chatbox-users__photo\">
            <img src=\"";
            // line 4
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["user"], "media", []), "user_logo", []), "thumbs", []), "small", []);
            echo "\" />
        </div>
        <div class=\"chatbox-users__content\">
            <div class=\"chatbox-users__cinner\">
                <div class=\"chatbox-users__new_msg\">";
            // line 8
            if (($this->getAttribute($context["user"], "count_new", []) > 0)) {
                echo "<span>";
                echo $this->getAttribute($context["user"], "count_new", []);
                echo "</span>";
            }
            echo "</div>
                <div class=\"chatbox-users__username\">
                    ";
            // line 10
            if ($this->getAttribute($context["user"], "online_status", [])) {
                echo "<span class=\"chatbox-users__online\"></span>";
            }
            // line 11
            echo "                    ";
            echo $this->getAttribute($context["user"], "output_name", []);
            if ($this->getAttribute($context["user"], "age", [])) {
                echo ", ";
                echo $this->getAttribute($context["user"], "age", []);
            }
            // line 12
            echo "                </div>
            </div>
        </div>
    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "users.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 12,  62 => 11,  58 => 10,  49 => 8,  42 => 4,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "users.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/users.twig");
    }
}
