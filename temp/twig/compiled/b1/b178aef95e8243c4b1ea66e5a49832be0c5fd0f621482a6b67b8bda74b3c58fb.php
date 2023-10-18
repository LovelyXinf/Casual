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

/* admin_moder_settings.twig */
class __TwigTemplate_9ef6e6b710a0f412f80bc33e86d1b5200c7ed1eaf9f39f922d99ee84225fee61 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "admin_moder_settings.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"\" role=\"tabpanel\" data-example-id=\"togglable-tabs\">
            <ul id=\"myTab\" class=\"nav nav-tabs bar_tabs\" role=\"tablist\">";
        // line 7
        $module =         null;
        $helper =         'menu';
        $name =         'get_admin_level1_menu';
        $params = array("admin_moderation_menu"        ,        );
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
        echo "            </ul>
        </div>
        <form method=\"post\" action=\"";
        // line 10
        echo ($context["form_save_link"] ?? null);
        echo "\" name=\"moder_sattings_save\" enctype=\"multipart/form-data\"
            data-parsley-validate class=\"form-horizontal form-label-left\">";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["moder_types"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 13
            echo "            <div class=\"form-group\">
                <label class=\"col-md-3 col-sm-3 col-xs-12\">";
            // line 15
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array(("mtype_" . $this->getAttribute(($context["item"] ?? null), "name", []))            ,"moderation"            ,            );
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
                <div class=\"col-md-6 col-sm-6 col-xs-12\">
                    <input type=\"hidden\" name=\"type_id[]\" value=\"";
            // line 17
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">";
            // line 18
            if (($this->getAttribute($context["item"], "mtype", []) >= 0)) {
                // line 19
                echo "                    <input type=\"radio\" class=\"flat\" name=\"mtype[";
                echo $this->getAttribute($context["item"], "id", []);
                echo "]\"
                            value=\"2\" id=\"mtype_";
                // line 20
                echo $this->getAttribute($context["item"], "id", []);
                echo "_2\"";
                if (($this->getAttribute($context["item"], "mtype", []) == "2")) {
                    echo "checked";
                }
                echo ">";
                // line 21
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("mtype_2"                ,"moderation"                ,                );
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
                // line 22
                echo "                    <br>
                    <input type=\"radio\" class=\"flat\" name=\"mtype[";
                // line 23
                echo $this->getAttribute($context["item"], "id", []);
                echo "]\"
                            value=\"1\" id=\"mtype_";
                // line 24
                echo $this->getAttribute($context["item"], "id", []);
                echo "_1\"";
                if (($this->getAttribute($context["item"], "mtype", []) == "1")) {
                    echo "checked";
                }
                echo ">";
                // line 25
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("mtype_1"                ,"moderation"                ,                );
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
                // line 26
                echo "                    <br>
                    <input type=\"radio\" class=\"flat\" name=\"mtype[";
                // line 27
                echo $this->getAttribute($context["item"], "id", []);
                echo "]\"
                            value=\"0\" id=\"mtype_";
                // line 28
                echo $this->getAttribute($context["item"], "id", []);
                echo "_0\"";
                if (($this->getAttribute($context["item"], "mtype", []) == "0")) {
                    echo "checked";
                }
                echo ">";
                // line 29
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("mtype_0"                ,"moderation"                ,                );
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
                // line 30
                echo "                    <br><br>";
            } else {
                // line 32
                echo "                    <input type=\"hidden\" value=\"mtype[";
                echo $this->getAttribute($context["item"], "id", []);
                echo "]\" value=\"";
                echo $this->getAttribute($context["item"], "mtype", []);
                echo "\">";
            }
            // line 34
            echo "                    <input type=\"checkbox\" name=\"check_badwords[";
            echo $this->getAttribute($context["item"], "id", []);
            echo "]\"
                           value=\"1\"";
            // line 35
            if (($this->getAttribute($context["item"], "check_badwords", []) == "1")) {
                echo "checked";
            }
            // line 36
            echo "                           id=\"chbw_";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\" class=\"flat tableflat\">
                    <span for=\"chbw_";
            // line 37
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("check_badwords"            ,"moderation"            ,            );
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
            echo "</span>
                </div>
            </div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "            <div class=\"ln_solid\"></div>
            <div class=\"form-group\">
                <div class=\"col-md-6 col-sm-6 col-xs-12 col-sm-offset-3\">";
        // line 44
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
        $context['save_text'] = $result;
        // line 45
        echo "                    <input onclick=\"";
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("moderation"        ,"btn_settings_save"        ,        );
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
        echo "\" type=\"submit\" class=\"btn btn-success\" value=\"";
        echo ($context["save_text"] ?? null);
        echo "\" name=\"sbmBtn\">
                    <a  href=\"";
        // line 46
        echo ($context["site_url"] ?? null);
        echo "admin/moderation\" class=\"btn btn-default\">";
        // line 47
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
</div>";
        // line 54
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"jquery-ui.custom.min.js"        ,        );
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
        // line 55
        echo "<link href=\"";
        echo ($context["site_root"] ?? null);
        echo ($context["js_folder"] ?? null);
        echo "jquery-ui/jquery-ui.custom.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />";
        // line 57
        $this->loadTemplate("@app/footer.twig", "admin_moder_settings.twig", 57)->display($context);
    }

    public function getTemplateName()
    {
        return "admin_moder_settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  367 => 57,  362 => 55,  341 => 54,  314 => 47,  311 => 46,  285 => 45,  264 => 44,  260 => 41,  230 => 37,  225 => 36,  221 => 35,  216 => 34,  209 => 32,  206 => 30,  185 => 29,  178 => 28,  174 => 27,  171 => 26,  150 => 25,  143 => 24,  139 => 23,  136 => 22,  115 => 21,  108 => 20,  103 => 19,  101 => 18,  98 => 17,  74 => 15,  71 => 13,  67 => 12,  63 => 10,  59 => 8,  38 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "admin_moder_settings.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/moderation/views/gentelella/admin_moder_settings.twig");
    }
}
