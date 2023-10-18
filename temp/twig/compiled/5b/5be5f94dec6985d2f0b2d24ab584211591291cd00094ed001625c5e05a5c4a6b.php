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

/* error.twig */
class __TwigTemplate_2af3ae848c3d3823cfa19eaa4bf52b8b7db72d43111017cdff98e8de16d69da7 extends \Twig\Template
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
        if ((($context["ajax"] ?? null) == "1")) {
            // line 2
            echo "
";
        } else {
            // line 4
            echo "    ";
            $this->loadTemplate("@app/header.twig", "error.twig", 4)->display($context);
            // line 5
            echo "    ";
            $this->loadTemplate("@app/footer.twig", "error.twig", 5)->display($context);
        }
    }

    public function getTemplateName()
    {
        return "error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 5,  36 => 4,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "error.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella/error.twig");
    }
}
