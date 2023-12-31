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

/* @app/pagination.twig */
class __TwigTemplate_95a3d15fced35a80613afaf77a57f9b0cb1bdf50979784adacb077e87e4010a1 extends \Twig\Template
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
        echo "<div class=\"pages\">";
        // line 2
        if ($this->getAttribute(($context["page_data"] ?? null), "total_rows", [])) {
            // line 3
            echo "    <span class=\"total\">";
            // line 4
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("showing"            ,"start"            ,            );
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
            echo $this->getAttribute(($context["page_data"] ?? null), "start_num", []);
            echo " -";
            echo $this->getAttribute(($context["page_data"] ?? null), "end_num", []);
            echo " /";
            echo $this->getAttribute(($context["page_data"] ?? null), "total_rows", []);
            echo "
    </span>";
        }
        // line 7
        if ( !twig_test_empty($this->getAttribute(($context["page_data"] ?? null), "nav", []))) {
            echo "<div class='paging_full_numbers dataTables_paginate'>";
            echo $this->getAttribute(($context["page_data"] ?? null), "nav", []);
            echo "</div>";
        }
        // line 8
        echo "</div>
<script>
    \$(\"b\").replaceWith(function(index, oldHTML){
        return \$('<a class=\"js_current\">').html(oldHTML);
    });
    \$('.paging_full_numbers a').addClass('paginate_button');
    \$('.js_current').addClass('paginate_active');
</script>
";
    }

    public function getTemplateName()
    {
        return "@app/pagination.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 8,  65 => 7,  36 => 4,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@app/pagination.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/views/gentelella_operator/pagination.twig");
    }
}
