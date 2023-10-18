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

/* edit_ds_item.twig */
class __TwigTemplate_4398951afa24612f4fff556d2ba9c37e14a522946f20bf74e0eb62a56e8efc48 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit_ds_item.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class='x_title'>
            <h2><!--Form title-->
                ";
        // line 7
        if (($context["current_index"] ?? null)) {
            // line 8
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_ds_item_change"            ,"languages"            ,            );
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
            $params = array("admin_header_ds_item_add"            ,"languages"            ,            );
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
        <div class='x_content'>
            <form method=\"post\" action=\"";
        // line 16
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\" enctype=\"multipart/form-data\" class=\"form-horizontal form-label-left\">
                <div class=\"form-group\">
                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                        ";
        // line 19
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_gid"        ,"languages"        ,        );
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
                    <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        ";
        // line 22
        if (($context["option_gid"] ?? null)) {
            // line 23
            echo "                            <label class=\"data-label\">";
            echo ($context["option_gid"] ?? null);
            echo "</label>
                        ";
        } else {
            // line 25
            echo "                            <input type=\"text\" value=\"\" name=\"option_gid\" class=\"form-control\">
                        ";
        }
        // line 27
        echo "                    </div>
                </div>
                ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["lang_id"] => $context["item"]) {
            // line 30
            echo "                    <div class=\"form-group\">
                        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                            ";
            // line 32
            echo $this->getAttribute($context["item"], "name", []);
            echo ":
                        </label>
                        <div class=\"col-md-6 col-sm-6 col-xs-12\">
                            <textarea type=\"text\" value=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute(($context["lang_data"] ?? null), $context["lang_id"], [], "array"));
            echo "\" name=\"lang_data[";
            echo $context["lang_id"];
            echo "]\" class=\"form-control\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["lang_data"] ?? null), $context["lang_id"], [], "array"));
            echo "</textarea>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['lang_id'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                <div class=\"ln_solid\"></div>
                <div class=\"form-group\">
                    <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                        <input type=\"submit\" name=\"btn_save\" value=\"";
        // line 42
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
        echo "\" class=\"btn btn-success\">
                        <a class=\"btn btn-default cancel\" href=\"";
        // line 43
        echo ($context["site_url"] ?? null);
        echo "admin/languages/ds_items/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "/";
        echo ($context["current_gid"] ?? null);
        echo "\">
                            ";
        // line 44
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
        // line 45
        echo "                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    \$(function () {
        \$(\"div.row:odd\").addClass(\"zebra\");
    });
</script>

";
        // line 59
        $this->loadTemplate("@app/footer.twig", "edit_ds_item.twig", 59)->display($context);
    }

    public function getTemplateName()
    {
        return "edit_ds_item.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 59,  231 => 45,  210 => 44,  200 => 43,  177 => 42,  172 => 39,  158 => 35,  152 => 32,  148 => 30,  144 => 29,  140 => 27,  136 => 25,  130 => 23,  128 => 22,  103 => 19,  97 => 16,  91 => 12,  88 => 11,  66 => 10,  63 => 9,  41 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_ds_item.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/languages/views/gentelella/edit_ds_item.twig");
    }
}
