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

/* helper_auth_links.twig */
class __TwigTemplate_1ec91177ab25ebb55b86ce31beb0491eb4f19e5238a6748915e3be1bf1b379b3 extends \Twig\Template
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
        if ((($context["auth_type"] ?? null) == "user")) {
            // line 2
            if ( !($context["is_mobile"] ?? null)) {
                // line 3
                echo "    <div class=\"user_quick_menu hidden-xs\">
        <a id=\"users_link_profile\" href=\"javascript:void(0);\" class=\"user-link-profile\"
            data-target=\"#\" data-toggle=\"dropdown\" aria-haspopup=\"true\" role=\"button\"
            aria-expanded=\"false\"
            onclick=\"";
                // line 7
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("right_top_menu"                ,"my-profile-item"                ,                );
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
                echo "\"
           >
            <img src=\"";
                // line 9
                echo $this->getAttribute(($context["user_session_data"] ?? null), "logo", []);
                echo "\" class=\"img-rounded\" width=\"30\" height=\"30\">
            <span class=\"badge sidebar-sum hide-always\"></span>
        </a>
        <div class=\"dropdown-menu settings_menu-top_menu\" role=\"menu\" aria-labelledby=\"users_link_profile\">
            <div class=\"menu-more-triangle\"></div>";
                // line 14
                $module =                 null;
                $helper =                 'menu';
                $name =                 'get_menu';
                $params = array("settings_menu"                ,"settings_menu"                ,                );
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
                // line 16
                echo "        </div>
    </div>";
            }
            // line 19
            echo "    <div class=\"user_quick_menu visible-xs-block\">
        <a href=\"";
            // line 20
            echo ($context["site_url"] ?? null);
            echo "users/view/";
            echo $this->getAttribute(($context["user_session_data"] ?? null), "user_id", []);
            echo "/profile\"
         onclick=\"";
            // line 21
            $module =             null;
            $helper =             'start';
            $name =             'setAnalytics';
            $params = array("right_top_menu"            ,"my-profile-item"            ,            );
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
            echo "\">
            <img src=\"";
            // line 22
            echo $this->getAttribute(($context["user_session_data"] ?? null), "logo", []);
            echo "\" class=\"img-rounded\" width=\"30\" height=\"30\">
        </a>       
    </div>";
        } else {
            // line 26
            echo "    <a href=\"javascript:void(0);\" id=\"ajax_login_link\" class=\"top-menu-item\">";
            // line 27
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("header_login"            ,"users"            ,            );
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
            // line 28
            echo "    </a>
    <script>
        \$(function () {
            loadScripts(
                    [\"";
            // line 32
            $module =             null;
            $helper =             'utils';
            $name =             'jscript';
            $params = array("users"            ,"users-auth.js"            ,"path"            ,            );
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
            echo "\"],
                    function () {
                        usersAuth = new UsersAuth({
                            siteUrl: site_url
                        });
                    },
                    ['usersAuth'],
                    {async: true}
            );
        });
    </script>";
        }
    }

    public function getTemplateName()
    {
        return "helper_auth_links.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 32,  157 => 28,  136 => 27,  134 => 26,  128 => 22,  105 => 21,  99 => 20,  96 => 19,  92 => 16,  71 => 14,  64 => 9,  40 => 7,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_auth_links.twig", "/home/custpg/operator/application/modules/users/views/flatty/helper_auth_links.twig");
    }
}
