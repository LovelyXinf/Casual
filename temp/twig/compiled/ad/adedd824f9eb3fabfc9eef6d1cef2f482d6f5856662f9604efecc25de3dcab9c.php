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

/* tracker_block.twig */
class __TwigTemplate_39e68abfca9d96a40eabe9ab5f4f401bbe75fc5c726ecd47855ae79a1018d1be extends \Twig\Template
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
        if (($context["ga_default_account_id"] ?? null)) {
            // line 2
            echo "    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', '";
            // line 15
            echo ($context["ga_default_account_id"] ?? null);
            echo "', 'auto', {'allowLinker': true});

        ga('require', 'displayfeatures');
        ga('require', 'linker');
        ga('linker:autoLink', ['payproglobal.com', 'datingsoftware.ru', 'demo.datingpro.com', 'dpdynamicpages.tilda.ws', 'datingpro.tilda.ws']);
        ga('require', 'GTM-P8PCWKG');

        ga(function (tracker) {
            var clientId = tracker.get('clientId') // получаем clientId из Google Analytics
            document.cookie = \"_ga_cid=\" + clientId + \"; path=/\"; // сохраняем cookie в _ga_cid
            ga('set', 'dimension3', clientId); // записываем clientId пользователя в параметр
        });

        ga('send', 'pageview');
        ";
            // line 29
            if ($this->getAttribute(($context["user_session_data"] ?? null), "user_id", [])) {
                // line 30
                echo "            ga('set', 'userId', ";
                echo $this->getAttribute(($context["user_session_data"] ?? null), "user_id", []);
                echo ");
        ";
            }
            // line 32
            echo "    </script>
";
        }
        // line 34
        echo "
";
        // line 35
        if (($context["tracker_code"] ?? null)) {
            // line 36
            echo "    ";
            echo ($context["tracker_code"] ?? null);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "tracker_block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 36,  79 => 35,  76 => 34,  72 => 32,  66 => 30,  64 => 29,  47 => 15,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "tracker_block.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/seo_advanced/views/flatty/tracker_block.twig");
    }
}
