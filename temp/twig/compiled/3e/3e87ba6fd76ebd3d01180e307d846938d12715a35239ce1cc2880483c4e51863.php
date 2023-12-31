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

/* helper_cookie_policy.twig */
class __TwigTemplate_c912bcc6fcee8ae18d181d40b88100785875f131bdee4c80b47fa4b53df3a8db extends \Twig\Template
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
        if (($context["policy_page_gid"] ?? null)) {
            // line 2
            ob_start();
            // line 3
            $module =             null;
            $helper =             'content';
            $name =             'get_page_link';
            $params = array(($context["policy_page_gid"] ?? null)            ,            );
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
            $context["cookie_policy_link"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        }
        // line 6
        echo "<div class=\"mod-cookie-policy\" id=\"cookie_policy_block\">
    <div class=\"container\">
       <div class=\"row\">
            <p>";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_cookie_policy"        ,"cookie_policy"        ,""        ,"text"        ,["link" => ($context["cookie_policy_link"] ?? null)]        ,        );
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
        echo "</p>
            <a href=\"javascript:void(0);\" class=\"close-btn-cookie\" id=\"cookie_policy_close\"><i class=\"fa fa-times\"></i></a>
        </div>
    </div>
</div>
<script>
\t\$(function(){
\t\tloadScripts(
            \"";
        // line 17
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array("cookie_policy"        ,"cookie_policy.js"        ,"path"        ,        );
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
            function(){
                cookie_poilicy = new cookiePolicy({
                    siteUrl: '";
        // line 20
        echo ($context["site_root"] ?? null);
        echo "',
                    domain: '";
        // line 21
        echo ($context["cookie_site_server"] ?? null);
        echo "',
                    path: '";
        // line 22
        echo ($context["cookie_site_path"] ?? null);
        echo "',
                });
            },
            'cookie_poilicy'
        );
\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "helper_cookie_policy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 22,  121 => 21,  117 => 20,  92 => 17,  62 => 9,  57 => 6,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_cookie_policy.twig", "/home/custpg/operator/application/modules/cookie_policy/views/flatty/helper_cookie_policy.twig");
    }
}
