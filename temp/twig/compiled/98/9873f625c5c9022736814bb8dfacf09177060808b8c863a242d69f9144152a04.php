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

/* withdraw_money_settings.twig */
class __TwigTemplate_dcafbf93a1854accf55ca5f918c1b39faed4eb974366c64ba05ff4dea02e7fcd extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "withdraw_money_settings.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_content\">
            <form method=\"post\" name=\"save_form\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_min_withdraw_money_amount"        ,"operators"        ,        );
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
        // line 10
        echo "                        (";
        $module =         null;
        $helper =         'start';
        $name =         'currency_format_output';
        $params = array(["no_tags" => true, "not_virtual" => true]        ,        );
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
        echo "):
                    </label>
                    <div class=\"col-md-8 col-xs-12 col-sm-7\">
                        <input type=\"number\" min=\"0\" step=\"0.01\" name=\"min_withdraw_money_amount\" class=\"form-control\" value=\"";
        // line 13
        echo $this->getAttribute(($context["settings"] ?? null), "min_withdraw_money_amount", []);
        echo "\" />
                    </div>
                </div>
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 18
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_withdraw_money_notif_email"        ,"operators"        ,        );
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
        echo ":
                    </label>
                    <div class=\"col-md-8 col-xs-12 col-sm-7\">
                        <input type=\"email\" name=\"withdraw_money_notif_email\" class=\"form-control\" value=\"";
        // line 21
        echo $this->getAttribute(($context["settings"] ?? null), "withdraw_money_notif_email", []);
        echo "\" />
                    </div>
                </div>
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 26
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_withdraw_money_paypal_app_client_id"        ,"payments"        ,        );
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
        echo ":
                    </label>
                    <div class=\"col-md-8 col-xs-12 col-sm-7\">
                        <input type=\"text\" name=\"withdraw_money_paypal_app_client_id\" class=\"form-control\" value=\"";
        // line 29
        echo $this->getAttribute(($context["settings"] ?? null), "withdraw_money_paypal_app_client_id", []);
        echo "\" />
                    </div>
                </div>
                <div class=\"row form-group\">
                    <label class=\"control-label col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 34
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_withdraw_money_paypal_app_secret"        ,"payments"        ,        );
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
        echo ":
                    </label>
                    <div class=\"col-md-8 col-xs-12 col-sm-7\">
                        <input type=\"text\" name=\"withdraw_money_paypal_app_secret\" class=\"form-control\" value=\"";
        // line 37
        echo $this->getAttribute(($context["settings"] ?? null), "withdraw_money_paypal_app_secret", []);
        echo "\" />
                    </div>
                </div>
                <div class=\"row form-group\">
                    <label class=\"col-md-4 col-xs-12 col-sm-5\">
                        ";
        // line 42
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_withdraw_money_paypal_test_mode"        ,"payments"        ,        );
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
        echo ":
                    </label>
                    <div class=\"col-md-8 col-xs-12 col-sm-7\">
                        <input type=\"checkbox\" name=\"withdraw_money_paypal_test_mode\" class=\"flat\" value=\"1\" ";
        // line 45
        if ($this->getAttribute(($context["settings"] ?? null), "withdraw_money_paypal_test_mode", [])) {
            echo "checked";
        }
        echo " />
                    </div>
                </div>
                <div class=\"ln_solid\"></div>
                <div class=\"row form-group\">
                    <div class=\"col-md-offset-4 col-md-5 col-sm-offset-5 col-sm-5\">
                        <input class=\"btn btn-success\" type=\"submit\" name=\"btn_save\" value=\"";
        // line 51
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_save"        ,"start"        ,""        ,"button"        ,        );
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
                        <a class=\"btn btn-default\" href=\"";
        // line 52
        echo ($context["site_url"] ?? null);
        echo "admin/payments/withdraw_money_list\">
                            ";
        // line 53
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_cancel"        ,"start"        ,        );
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
        // line 54
        echo "                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

";
        // line 62
        $this->loadTemplate("@app/footer.twig", "withdraw_money_settings.twig", 62)->display($context);
    }

    public function getTemplateName()
    {
        return "withdraw_money_settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 62,  279 => 54,  258 => 53,  254 => 52,  231 => 51,  220 => 45,  195 => 42,  187 => 37,  162 => 34,  154 => 29,  129 => 26,  121 => 21,  96 => 18,  88 => 13,  62 => 10,  41 => 9,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "withdraw_money_settings.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella/withdraw_money_settings.twig");
    }
}
