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

/* helper_top_menu_links.twig */
class __TwigTemplate_ff39888af2c1d12c9336171ed71f0fb3a80fd3d8a36b06b85f456a5343b31b54 extends \Twig\Template
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
        echo "<menu id=\"users-alerts-menu_links\" class=\"menu-alerts\">";
        // line 2
        if ((($context["auth_type"] ?? null) == "user")) {
            // line 3
            $module =             null;
            $helper =             'menu';
            $name =             'getMenu';
            $params = array("user_top_menu"            ,"helper_top_menu"            ,            );
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
        }
        // line 5
        echo "</menu>
<script type=\"text/javascript\">
\$(function () {
    loadScripts(
        \"";
        // line 9
        $module =         null;
        $helper =         'theme';
        $name =         'include_js';
        $params = array("users"        ,"top-menu.js"        ,"path"        ,        );
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
        echo "\",
        function () {
            top_menu = new topMenu({
                siteUrl: site_url,
                parent: '.menu-alerts-item',
                summandsParent: '.menu-alerts-more-item'
            });
        },
        ['top_menu'],
        {async: false}
    );
});
</script>";
    }

    public function getTemplateName()
    {
        return "helper_top_menu_links.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 9,  56 => 5,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_top_menu_links.twig", "/home/custpg/operator/application/modules/users/views/flatty/helper_top_menu_links.twig");
    }
}
