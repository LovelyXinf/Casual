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

/* login_form.twig */
class __TwigTemplate_7ab03b1372b0dcb52d47bd80b29267269e07ba7d123b28392474037c08091941 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "login_form.twig", 1)->display($context);
        // line 2
        echo "<div class=\"landing\">
    <div class=\"landing__form\">
        <div class=\"landing__form-content\">
            <div class=\"login-form\">
                <div class=\"landing__logo\">
                    <a href=\"";
        // line 7
        echo ($context["site_url"] ?? null);
        echo "operator/\">
                        <img src=\"";
        // line 8
        echo ($context["site_root"] ?? null);
        echo $this->getAttribute(($context["logo_settings"] ?? null), "path", []);
        echo "\" border=\"0\" alt=\"logo\"
                                width=\"";
        // line 9
        echo $this->getAttribute(($context["logo_settings"] ?? null), "width", []);
        echo "\" height=\"";
        echo $this->getAttribute(($context["logo_settings"] ?? null), "height", []);
        echo "\">
                    </a>
                </div>

                <form method=\"post\" class=\"form-horizontal form-label-left\">
                    <div class=\"form\">
                        <h2>";
        // line 15
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("operator_header_login"        ,"start"        ,        );
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
        echo "</h2>
                        <div class=\"form-group\">
                            <label class=\"control-label\">
                                ";
        // line 18
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_email"        ,"operators"        ,        );
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
        echo ":</label>
                            <div>
                                <input class=\"form-control\" type=\"email\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "email", []));
        echo "\" name=\"email\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">
                                ";
        // line 25
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_password"        ,"operators"        ,        );
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
        echo ":</label>
                            <div>
                                <input class=\"form-control\" type=\"password\" value=\"\" name=\"password\" required>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <button class=\"btn btn-success\" type=\"submit\" name=\"btn_login\" value=\"1\">
                                ";
        // line 32
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_login"        ,"start"        ,        );
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
        // line 33
        echo "                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class=\"landing__right clearfix\">
        <div class=\"row-welcome\">
            <div class=\"row-welcome__content\">
                <span style=\"font-size:200px; color:#ee2c55; font-weight:bold;\">
                    ";
        // line 45
        $module =         null;
        $helper =         'chatbox';
        $name =         'geOperatorsQueueCount';
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
        // line 46
        echo "                </span>
            </div>
        </div>
    </div>
</div>

";
        // line 52
        $this->loadTemplate("@app/footer.twig", "login_form.twig", 52)->display($context);
    }

    public function getTemplateName()
    {
        return "login_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 52,  201 => 46,  180 => 45,  166 => 33,  145 => 32,  116 => 25,  108 => 20,  84 => 18,  59 => 15,  48 => 9,  43 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "login_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella_operator/login_form.twig");
    }
}
