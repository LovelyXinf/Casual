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

/* index.twig */
class __TwigTemplate_3a329ee3a9be0106356942b17bf42c6f56a4dd21d14cf6b8ee1bc2fa0100335d extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "index.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"";
        // line 4
        echo "\">
        <div class=\"x_content\">
            <div class=\"chatbox clearfix\" id=\"chatbox\">
                ";
        // line 19
        echo "
                <div class=\"chatbox-content col-xs-12 ";
        // line 20
        echo "\">
                    <div class=\"chatbox-content__inner\">
                        <div class=\"chatbox-users-empty\">";
        // line 22
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("empty_users"        ,"chatbox"        ,        );
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
        echo "</div>

                        <div class=\"chatbox-contacts\" style=\"display:none;\">
                            <div class=\"chatbox-contacts__filter\">
                                <input class=\"form-control\" type=\"text\" placeholder=\"";
        // line 26
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("search_placeholder"        ,"chatbox"        ,        );
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
        echo "\" />
                                <span class=\"chatbox-contacts__search-icon\"><i class=\"fa fa-search\"></i></span>
                                ";
        // line 29
        echo "                            </div>
                            <div class=\"chatbox-contacts__list\">
                                <div class=\"chatbox-contacts__empty\">";
        // line 31
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("empty_contacts_operator"        ,"chatbox"        ,        );
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
        echo "</div>
                                <ul>
                                    ";
        // line 33
        $this->loadTemplate("contacts.twig", "index.twig", 33)->display($context);
        // line 34
        echo "                                </ul>
                            </div>
                        </div>

                        <div class=\"chatbox-dialog\" id=\"chb_dialog\"></div>
                    </div>
                </div>
                <div class=\"clr\"></div>
            </div>
        </div>
    </div>
</div>

";
        // line 47
        if (($context["chat"] ?? null)) {
            // line 48
            echo "    <script>
        \$(function () {
            setTimeout(function () {
                if (typeof window.chatbox != 'undefined') {
                    window.chatbox.properties.userId = ";
            // line 52
            echo $this->getAttribute(($context["chat"] ?? null), "user_id", []);
            echo ";
                    window.chatbox.startDialog(";
            // line 53
            echo $this->getAttribute(($context["chat"] ?? null), "contact_id", []);
            echo ");
                }
            }, 100);
        });
    </script>
";
        }
        // line 59
        echo "
";
        // line 60
        $this->loadTemplate("@app/footer.twig", "index.twig", 60)->display($context);
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 60,  164 => 59,  155 => 53,  151 => 52,  145 => 48,  143 => 47,  128 => 34,  126 => 33,  102 => 31,  98 => 29,  74 => 26,  48 => 22,  44 => 20,  41 => 19,  36 => 4,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "index.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/index.twig");
    }
}
