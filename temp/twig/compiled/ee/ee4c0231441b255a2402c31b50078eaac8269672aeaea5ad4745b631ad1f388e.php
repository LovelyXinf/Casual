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

/* edit_lang.twig */
class __TwigTemplate_7fab4d1576ee2104d64e0f4af9c9bc54d2f6ea5dd96a6835cdec94975a047fdd extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit_lang.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class='x_title'>
            <h2>
                ";
        // line 7
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            // line 8
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_language_change"            ,"languages"            ,            );
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
            // line 9
            echo "                ";
        } else {
            // line 10
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_language_add"            ,"languages"            ,            );
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
            echo "                ";
        }
        // line 12
        echo "            </h2>
            <div class='clearfix'></div>
        </div>

        <div class=\"x_content\">
            <form method=\"post\" action=\"";
        // line 17
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\" enctype=\"multipart/form-data\" class=\"form-horizontal form-label-left\">
                <div class=\"form-group even\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 20
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_name"        ,"languages"        ,        );
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
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 23
        echo $this->getAttribute(($context["data"] ?? null), "name", []);
        echo "\" name=\"name\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group even\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 28
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_code"        ,"languages"        ,        );
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
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 31
        echo $this->getAttribute(($context["data"] ?? null), "code", []);
        echo "\" name=\"code\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group even\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 36
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_rtl"        ,"languages"        ,        );
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
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"radio\" value=\"ltr\" name=\"rtl\" id=\"ltr_val\"
                               ";
        // line 40
        if ((($this->getAttribute(($context["data"] ?? null), "rtl", []) == "ltr") ||  !$this->getAttribute(($context["data"] ?? null), "rtl", []))) {
            echo "checked";
        }
        echo " >
                        <label for=\"ltr_val\">
                            ";
        // line 42
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_rtl_value_ltr"        ,"languages"        ,        );
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
        echo "                        </label><br>
                        <input type=\"radio\" value=\"rtl\" name=\"rtl\" id=\"rtl_val\"
                               ";
        // line 45
        if (($this->getAttribute(($context["data"] ?? null), "rtl", []) == "rtl")) {
            echo "checked";
        }
        echo " >
                        <label for=\"rtl_val\">
                            ";
        // line 47
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_rtl_value_rtl"        ,"languages"        ,        );
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
        // line 48
        echo "                        </label><br>
                    </div>
                </div>
                <div class=\"ln_solid\"></div>
                <div class=\"form-group even\">
                    <div class=\"col-sm-9 col-xs-12 col-sm-offset-3\">
                        <input onclick=\"";
        // line 54
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("languages"        ,"btn_save"        ,        );
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
        echo "\" type=\"submit\" name=\"btn_save\" class=\"btn btn-success\"
                               value=\"";
        // line 55
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
                        <a class=\"btn btn-default cancel\" href=\"";
        // line 56
        echo ($context["site_url"] ?? null);
        echo "admin/languages\">";
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
        echo "</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

";
        // line 64
        $this->loadTemplate("@app/footer.twig", "edit_lang.twig", 64)->display($context);
    }

    public function getTemplateName()
    {
        return "edit_lang.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  342 => 64,  310 => 56,  287 => 55,  264 => 54,  256 => 48,  235 => 47,  228 => 45,  224 => 43,  203 => 42,  196 => 40,  170 => 36,  162 => 31,  137 => 28,  129 => 23,  104 => 20,  98 => 17,  91 => 12,  88 => 11,  66 => 10,  63 => 9,  41 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_lang.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/languages/views/gentelella/edit_lang.twig");
    }
}
