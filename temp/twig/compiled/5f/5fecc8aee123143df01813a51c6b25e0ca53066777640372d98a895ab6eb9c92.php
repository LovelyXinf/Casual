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

/* @app/footer.twig */
class __TwigTemplate_a7c3ad7f433be50fe7812083bc2464471b98f8215720762bd4094fe89d2e7d43 extends \Twig\Template
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
        echo "                        </div>
                    </div>
                </div>";
        // line 4
        if ((twig_test_empty(($context["footer_type"] ?? null)) || (($context["footer_type"] ?? null) != "index"))) {
            // line 6
            $module =             null;
            $helper =             'shoutbox';
            $name =             'shoutboxMobileBlock';
            $params = array(            );
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
            // line 7
            $module =             null;
            $helper =             'cookie_policy';
            $name =             'cookie_policy_block';
            $params = array(            );
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
            // line 8
            echo "                <div class=\"logo-mobile-version\"></div>";
        }
        // line 10
        echo "            </div>
        </div>";
        // line 12
        $module =         null;
        $helper =         'users';
        $name =         'isTerms';
        $params = array(        );
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
        // line 13
        if (((twig_test_empty(($context["footer_type"] ?? null)) || (($context["footer_type"] ?? null) != "index")) && (($context["page_type"] ?? null) != "like_me"))) {
            // line 14
            echo "        <footer>
            <div class=\"container-fluid\" id=\"footer_banner\">
                <div class=\"row\">
                    <div class=\"col-xs-12 col-md-12\">
                        <ul class=\"footer-banners\">";
            // line 19
            $module =             null;
            $helper =             'banners';
            $name =             'show_banner_place';
            $params = array("bottom-banner"            ,            );
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
            // line 20
            echo "                        </ul>
                    </div>
                </div>
            </div>
            <div class=\"container-fluid\" id=\"footer_languages\">
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <ul class=\"footer-languages\">";
            // line 28
            $module =             null;
            $helper =             'languages';
            $name =             'lang_row_select';
            $params = array(            );
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
            // line 29
            echo "                        </ul>
                    </div>
                </div>
            </div>
            <div class=\"footer-menu\">
                <div class=\"container-fluid\" id=\"footer_menu\">
                    <div class=\"row\">";
            // line 36
            $module =             null;
            $helper =             'menu';
            $name =             'get_menu';
            $params = array("user_footer_menu"            ,            );
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
            // line 37
            echo "                        <div class=\"col-sm-12 col-md-4 mobile_app_links\">";
            // line 38
            $module =             null;
            $helper =             'mobile';
            $name =             'mobile_app_links';
            $params = array(            );
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
            // line 39
            echo "                        </div>
                    </div>
                </div>
            </div>
            <div class=\"footer-info\">
                <div class=\"container-fluid\" id=\"footer_info\">
                    <div class=\"row\">";
            // line 46
            $module =             null;
            $helper =             'mobile';
            $name =             'mobileVersion';
            $params = array(            );
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
            echo "                        <div class=\"col-sm-6 col-md-6\">
                            <div class=\"copyright\">";
            // line 49
            if (($context["DEMO_MODE"] ?? null)) {
                echo ($context["demo_copyright"] ?? null);
            } else {
                $module =                 null;
                $helper =                 'start';
                $name =                 'getCopyright';
                $params = array("internal"                ,                );
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
            // line 50
            echo "                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>";
        }
        // line 57
        echo "        
        <script>
            \$('body').removeClass('index-page site-page')
                     .addClass('";
        // line 60
        if ((($context["header_type"] ?? null) == "index")) {
            echo "index-page";
        } else {
            echo "site-page";
        }
        echo " mod-inner');";
        // line 61
        if ((($context["page_type"] ?? null) != "like_me")) {
            // line 62
            echo "                 \$('body').removeClass('mod-likeme mod-likeme-matches').addClass('";
            echo ($context["body_class"] ?? null);
            echo "');";
        } else {
            // line 64
            echo "                \$('body').removeClass('index-page site-page').addClass('mod-likeme mod-likeme-matches');";
        }
        // line 66
        echo "        </script>";
        // line 68
        $module =         null;
        $helper =         'start';
        $name =         'new_features';
        $params = array(        );
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
        // line 69
        if ( !($context["is_pjax"] ?? null)) {
            // line 70
            echo "        </div>";
            // line 72
            $module =             null;
            $helper =             'languages';
            $name =             'lang_editor';
            $params = array(            );
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
            // line 73
            $module =             null;
            $helper =             'seo_advanced';
            $name =             'seo_traker';
            $params = array("footer"            ,            );
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
            // line 75
            $module =             null;
            $helper =             'start';
            $name =             'intercom';
            $params = array(            );
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
            // line 84
            echo "\t</body>";
        }
        // line 86
        echo "
<script>
    \$(function() {
        \$('body').removeClass('mod-magazine');
        \$('body').addClass('";
        // line 90
        echo ($context["body_class"] ?? null);
        echo "');
    });
</script>

</html>
";
    }

    public function getTemplateName()
    {
        return "@app/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  402 => 90,  396 => 86,  393 => 84,  372 => 75,  351 => 73,  330 => 72,  328 => 70,  326 => 69,  305 => 68,  303 => 66,  300 => 64,  295 => 62,  293 => 61,  286 => 60,  281 => 57,  273 => 50,  248 => 49,  245 => 47,  224 => 46,  216 => 39,  195 => 38,  193 => 37,  172 => 36,  164 => 29,  143 => 28,  134 => 20,  113 => 19,  107 => 14,  105 => 13,  84 => 12,  81 => 10,  78 => 8,  57 => 7,  36 => 6,  34 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@app/footer.twig", "/home/custpg/operator/application/views/flatty/footer.twig");
    }
}
