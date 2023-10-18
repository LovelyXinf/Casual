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

/* edit_form.twig */
class __TwigTemplate_fc7ca110225df62445f81f2d1962a2b11199715378d7d31939a10676638e839c extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit_form.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_title\">
            <h2>
                ";
        // line 7
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            // line 8
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_ausers_change"            ,"ausers"            ,            );
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
            $params = array("admin_header_ausers_add"            ,"ausers"            ,            );
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
            <div class=\"clearfix\"></div>
        </div>
        <div class=\"x_content\">
            <form method=\"post\" action=\"";
        // line 16
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\"
              class=\"form-horizontal form-label-left\">
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 20
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_nickname"        ,"ausers"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "nickname", []));
        echo "\" name=\"nickname\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 27
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_email"        ,"ausers"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"email\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "email", []));
        echo "\" name=\"email\" class=\"form-control\">
                    </div>
                </div>
                ";
        // line 32
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            // line 33
            echo "                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
            // line 35
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_change_password"            ,"ausers"            ,            );
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
            echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"checkbox\" value=\"1\" name=\"update_password\"
                               id=\"pass_change_field\" class=\"flat\">
                    </div>
                </div>
                ";
        }
        // line 42
        echo "                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 44
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_password"        ,"ausers"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"password\" value=\"\" name=\"password\" id=\"pass_field\"
                            class=\"form-control\" ";
        // line 47
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            echo "disabled";
        }
        echo ">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 52
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_repassword"        ,"ausers"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"password\" value=\"\" name=\"repassword\" id=\"repass_field\"
                            ";
        // line 55
        if ($this->getAttribute(($context["data"] ?? null), "id", [])) {
            echo "disabled";
        }
        echo " class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 60
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_name"        ,"ausers"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "name", []));
        echo "\" name=\"name\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 67
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_description"        ,"ausers"        ,        );
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
        echo ": </label>
                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                        <textarea name=\"description\" class=\"form-control\">";
        // line 69
        echo $this->getAttribute(($context["data"] ?? null), "description", []);
        echo "</textarea>
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                        ";
        // line 74
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_save"        ,"start"        ,        );
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
        $context['save_text'] = $result;
        // line 75
        echo "                        <input type=\"submit\" class=\"btn btn-success\" value=\"";
        echo twig_escape_filter($this->env, ($context["save_text"] ?? null));
        echo "\" name=\"btn_save\">
                        ";
        // line 76
        if (($context["is_add_available"] ?? null)) {
            // line 77
            echo "                            <a class=\"btn btn-default\" href=\"";
            echo ($context["site_url"] ?? null);
            echo "admin/ausers\">
                                ";
            // line 78
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_cancel"            ,"start"            ,            );
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
                        ";
        }
        // line 80
        echo "                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class=\"clearfix\"></div>

<script type=\"text/javascript\">
    \$(function(){
        \$(document).off('ifChanged', '#pass_change_field').on('ifChanged', '#pass_change_field', function() {
                \$(\"#pass_field\").prop('disabled', false);
                \$(\"#repass_field\").prop('disabled', false);
        }).off('ifUnchecked', '#pass_change_field').on('ifUnchecked', '#pass_change_field', function() {
                \$(\"#pass_field\").prop('disabled', true);
                \$(\"#repass_field\").prop('disabled', true);
        });
    });
</script>

";
        // line 100
        $this->loadTemplate("@app/footer.twig", "edit_form.twig", 100)->display($context);
    }

    public function getTemplateName()
    {
        return "edit_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  418 => 100,  396 => 80,  372 => 78,  367 => 77,  365 => 76,  360 => 75,  339 => 74,  331 => 69,  307 => 67,  299 => 62,  275 => 60,  265 => 55,  240 => 52,  230 => 47,  205 => 44,  201 => 42,  172 => 35,  168 => 33,  166 => 32,  160 => 29,  136 => 27,  128 => 22,  104 => 20,  97 => 16,  91 => 12,  88 => 11,  66 => 10,  63 => 9,  41 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/ausers/views/gentelella/edit_form.twig");
    }
}
