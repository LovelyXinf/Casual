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

/* helper_top_menu_xs.twig */
class __TwigTemplate_ed1e1b3af896bc8d893b0a1ab666f224d9a7776e30684e01c2fb3170ecd46f26 extends \Twig\Template
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
            echo "        <div class=\"row\">
            <div class=\"col-xs-6 mb10\">    
                <div class=\"xs-menu-title\">";
            // line 5
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("xs_menu_home"            ,"users"            ,            );
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
            echo "</div>";
            // line 6
            $module =             null;
            $helper =             'utils';
            $name =             'depends';
            $params = array("like_me"            ,            );
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
            $context['is_module_installed'] = $result;
            // line 7
            if ($this->getAttribute(($context["is_module_installed"] ?? null), "like_me", [])) {
                // line 8
                echo "                    <div class=\"menu-alerts-item menu-item\" id=\"menu_like_me_alerts\">
                        <a id=\"menu-like_me\" href=\"";
                // line 9
                $module =                 null;
                $helper =                 'seo';
                $name =                 'seolink';
                $params = array("like_me"                ,"index"                ,                );
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
                echo "\" onclick=\"";
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("left_menu_user"                ,"like_me"                ,                );
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
                echo "\">";
                // line 10
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("header_main"                ,"like_me"                ,                );
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
                // line 11
                echo "                            <span class=\"badge summand like_me_count\"></span>
                        </a>
                    </div>";
            }
            // line 14
            echo "        
                <div class=\"menu-alerts-item menu-item\">
                    <a href=\"";
            // line 16
            $module =             null;
            $helper =             'seo';
            $name =             'seolink';
            $params = array("users"            ,"search"            ,            );
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
            echo "\" onclick=\"";
            $module =             null;
            $helper =             'start';
            $name =             'setAnalytics';
            $params = array("left_menu_user"            ,"search_item"            ,            );
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
            echo "\">";
            // line 17
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("header_user_find"            ,"users"            ,            );
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
            // line 18
            echo "                    </a>
                </div>  
                <div class=\"menu-alerts-item menu-item menu-alerts-more-item\" id=\"menu_chatbox_alerts\" title=\"";
            // line 20
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_alert_menu_new_msgs"            ,"menu"            ,            );
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
            echo "\" >
                    <a id=\"activities_chatbox_item_xs\" href=\"";
            // line 21
            $module =             null;
            $helper =             'seo';
            $name =             'rewrite_link';
            $params = array("chatbox"            ,"index"            ,            );
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
            echo "\" class=\"uam-top menu-messages-more\" 
                    onclick=\"";
            // line 22
            $module =             null;
            $helper =             'start';
            $name =             'setAnalytics';
            $params = array("left_menu_user"            ,"chatbox_item"            ,            );
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
            echo "\">";
            // line 23
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("mobile_menu"            ,"chatbox"            ,            );
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
            // line 25
            echo "                    </a>";
            // line 27
            echo "                </div>";
            // line 29
            $module =             null;
            $helper =             'utils';
            $name =             'depends';
            $params = array("tickets"            ,            );
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
            $context['is_module_installed'] = $result;
            // line 30
            if ($this->getAttribute(($context["is_module_installed"] ?? null), "tickets", [])) {
                // line 31
                echo "                    <div class=\"menu-alerts-item menu-item\" id=\"menu_admin_alerts\" title=\"";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("field_alert_menu_new_alerts"                ,"menu"                ,                );
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
                        <a id=\"menu-messages-more\" href=\"";
                // line 32
                $module =                 null;
                $helper =                 'seo';
                $name =                 'rewrite_link';
                $params = array("tickets"                ,"index"                ,                );
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
                echo "\" class=\"uam-top menu-messages-more\"
                        onclick=\"";
                // line 33
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("left_menu_user"                ,"tickets_advanced_item"                ,                );
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
                            <i class=\"fa fa-bell fa-lg item hidden\"></i>";
                // line 35
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("xs_menu_home_tickets"                ,"users"                ,                );
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
                // line 36
                echo "                            <span class=\"badge sum\"></span>
                        </a>";
                // line 38
                $module =                 null;
                $helper =                 'tickets';
                $name =                 'admin_new_messages';
                $params = array(["template" => "header_xs", "is_admin" => "1"]                ,                );
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
                echo "                        
                    </div>";
            }
            // line 40
            echo "   
                <div class=\"mt10\">";
            // line 42
            $module =             null;
            $helper =             'virtual_gifts';
            $name =             'user_gifts_menu_notifier';
            $params = array($this->getAttribute(($context["user_session_data"] ?? null), "user_id", [])            ,            );
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
            // line 43
            echo "                </div>
            </div> 
            <div class=\"col-xs-6 mb10\">";
            // line 46
            $module =             null;
            $helper =             'menu';
            $name =             'getMenuItems';
            $params = array("user_top_menu"            ,"user-menu-activities"            ,"helper_top_menu_items_xs"            ,            );
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
            // line 47
            echo "            </div>                
        </div>                
        <div class=\"row\">                
            <div class=\"col-xs-6 mb10\">";
            // line 51
            $module =             null;
            $helper =             'menu';
            $name =             'getMenuItems';
            $params = array("user_top_menu"            ,"user-menu-people"            ,"helper_top_menu_items_xs"            ,            );
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
            // line 52
            echo "            </div>                        
            <div class=\"col-xs-6 mb10\">
                <div class=\"xs-menu-title\">";
            // line 54
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("xs_menu_home_account"            ,"users"            ,            );
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
            echo "</div>";
            // line 55
            $module =             null;
            $helper =             'users';
            $name =             'auth_links';
            $params = array(["template" => "helper_auth_links_xs"]            ,            );
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
            // line 56
            echo "            </div> 
        </div>";
        }
        // line 59
        echo "</menu>
<script type=\"text/javascript\">
\$(function () {
    loadScripts(
            \"";
        // line 63
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
                new topMenu({
                    siteUrl: site_url,
                    parent: '.menu-alerts-item',
                    summandsParent: '.menu-alerts-more-item'
                });
            }
    );
    
});
</script>
";
    }

    public function getTemplateName()
    {
        return "helper_top_menu_xs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  593 => 63,  587 => 59,  583 => 56,  562 => 55,  540 => 54,  536 => 52,  515 => 51,  510 => 47,  489 => 46,  485 => 43,  464 => 42,  461 => 40,  437 => 38,  434 => 36,  413 => 35,  390 => 33,  367 => 32,  343 => 31,  341 => 30,  320 => 29,  318 => 27,  316 => 25,  295 => 23,  273 => 22,  250 => 21,  227 => 20,  223 => 18,  202 => 17,  159 => 16,  155 => 14,  150 => 11,  129 => 10,  86 => 9,  83 => 8,  81 => 7,  60 => 6,  38 => 5,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_top_menu_xs.twig", "/home/custpg/operator/application/modules/users/views/flatty/helper_top_menu_xs.twig");
    }
}
