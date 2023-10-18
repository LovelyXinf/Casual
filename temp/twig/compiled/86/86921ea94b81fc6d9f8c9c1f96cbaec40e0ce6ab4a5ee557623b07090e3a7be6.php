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

/* custom_form_fields.twig */
class __TwigTemplate_228cbdfc88897d7036d3de19306612cff89a926823aa85f5d0b227f01f0fe463 extends \Twig\Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields_data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 2
            echo "    <div class=\"form-group\">
        <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 3
            echo $this->getAttribute($context["item"], "name", []);
            echo ": </label>
        <div class=\"col-md-9 col-sm-9 col-xs-12\" id=\"field-";
            // line 4
            echo $this->getAttribute($context["item"], "gid", []);
            echo "\">";
            // line 5
            if (($this->getAttribute($context["item"], "field_type", []) == "select")) {
                // line 6
                if (($this->getAttribute($this->getAttribute($context["item"], "settings_data_array", []), "view_type", []) == "select")) {
                    // line 7
                    echo "                    <select name=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "field_name", []));
                    echo "\" class=\"form-control\">";
                    // line 8
                    if ($this->getAttribute($this->getAttribute($context["item"], "settings_data_array", []), "empty_option", [])) {
                        // line 9
                        echo "                            <option value=\"0\"";
                        if ((($context["value"] ?? null) == 0)) {
                            echo " selected";
                        }
                        echo ">...</option>";
                    }
                    // line 11
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["item"], "options", []), "option", []));
                    foreach ($context['_seq'] as $context["value"] => $context["option"]) {
                        // line 12
                        echo "                            <option value=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\"";
                        if (($context["value"] == $this->getAttribute($context["item"], "value", []))) {
                            echo " selected";
                        }
                        echo ">";
                        // line 13
                        echo $context["option"];
                        echo "
                            </option>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['value'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 16
                    echo "                    </select>";
                } else {
                    // line 18
                    if ($this->getAttribute($this->getAttribute($context["item"], "settings_data_array", []), "empty_option", [])) {
                        // line 19
                        echo "                        <input type=\"radio\" name=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "field_name", []));
                        echo "\" value=\"0\"";
                        if ((($context["value"] ?? null) == 0)) {
                            echo " checked";
                        }
                        echo " id=\"";
                        echo $this->getAttribute($context["item"], "field_name", []);
                        echo "_0\">
                        <label for=\"";
                        // line 20
                        echo $this->getAttribute($context["item"], "field_name", []);
                        echo "_0\">No select</label><br>";
                    }
                    // line 22
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["item"], "options", []), "option", []));
                    foreach ($context['_seq'] as $context["value"] => $context["option"]) {
                        // line 23
                        echo "                        <input type=\"radio\" name=\"";
                        echo $this->getAttribute($context["item"], "field_name", []);
                        echo "\" value=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\"";
                        if (($context["value"] == $this->getAttribute($context["item"], "value", []))) {
                            echo " checked";
                        }
                        echo " id=\"";
                        echo $this->getAttribute($context["item"], "field_name", []);
                        echo "_";
                        echo $context["value"];
                        echo "\">
                        <label for=\"";
                        // line 24
                        echo $this->getAttribute($context["item"], "field_name", []);
                        echo "_";
                        echo $context["value"];
                        echo "\">";
                        echo $context["option"];
                        echo "</label><br>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['value'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
            } elseif (($this->getAttribute(            // line 27
$context["item"], "field_type", []) == "multiselect")) {
                // line 28
                if (($this->getAttribute($this->getAttribute($context["item"], "settings_data_array", []), "view_type", []) == "mselect")) {
                    // line 29
                    echo "                    <select name=\"";
                    echo $this->getAttribute($context["item"], "field_name", []);
                    echo "[]\" multiple class=\"form-control\">";
                    // line 30
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["item"], "options", []), "option", []));
                    foreach ($context['_seq'] as $context["value"] => $context["option"]) {
                        // line 31
                        echo "                        <option value=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\"";
                        $module =                         null;
                        $helper =                         'utils';
                        $name =                         'inArray';
                        $params = array(($context["value"] ?? null)                        ,$this->getAttribute(($context["item"] ?? null), "value", [])                        ,"selected"                        ,                        );
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
                        echo ">";
                        echo $context["option"];
                        echo "</option>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['value'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 33
                    echo "                    </select>";
                } else {
                    // line 35
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["item"], "options", []), "option", []));
                    foreach ($context['_seq'] as $context["value"] => $context["option"]) {
                        // line 36
                        echo "                        <div class=\"chbx\">
                            <input type=\"checkbox\" name=\"";
                        // line 37
                        echo $this->getAttribute($context["item"], "field_name", []);
                        echo "[]\" value=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\"";
                        $module =                         null;
                        $helper =                         'utils';
                        $name =                         'inArray';
                        $params = array(($context["value"] ?? null)                        ,$this->getAttribute(($context["item"] ?? null), "value", [])                        ,"checked"                        ,                        );
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
                        echo " id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "field_name", []));
                        echo "_";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\" class=\"flat\">
                            <label for=\"";
                        // line 38
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "field_name", []));
                        echo "_";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\">";
                        echo $context["option"];
                        echo "</label>
                        </div>";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['value'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 41
                    echo "                    <div class=\"clearfix\"></div>
                    <a href=\"#\" class=\"select-link\">";
                    // line 42
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("select_all"                    ,"start"                    ,                    );
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
                    echo "</a> &nbsp;|&nbsp;<a href=\"#\" class=\"unselect-link\">";
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("unselect_all"                    ,"start"                    ,                    );
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
                    echo "</a>";
                }
            } elseif (($this->getAttribute(            // line 44
$context["item"], "field_type", []) == "text")) {
                // line 45
                echo "                <input type=\"text\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", []));
                echo "\" name=\"";
                echo $this->getAttribute($context["item"], "field_name", []);
                echo "\" class=\"form-control\" maxlength=\"";
                echo $this->getAttribute($this->getAttribute($context["item"], "settings_data_array", []), "max_char", []);
                echo "\">";
            } elseif (($this->getAttribute(            // line 46
$context["item"], "field_type", []) == "textarea")) {
                // line 47
                echo "                <textarea name=\"";
                echo $this->getAttribute($context["item"], "field_name", []);
                echo "\" class=\"form-control\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", []));
                echo "</textarea>";
            } elseif (($this->getAttribute(            // line 48
$context["item"], "field_type", []) == "checkbox")) {
                // line 49
                echo "                <input type=\"checkbox\" value=\"1\" name=\"";
                echo $this->getAttribute($context["item"], "field_name", []);
                echo "\"";
                if (($this->getAttribute($context["item"], "value", []) == "1")) {
                    echo " checked";
                }
                echo " class=\"flat\">";
            } elseif (($this->getAttribute(            // line 50
$context["item"], "field_type", []) == "range")) {
                // line 51
                echo "                <input type=\"text\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", []));
                echo "\" name=\"";
                echo $this->getAttribute($context["item"], "field_name", []);
                echo "\" class=\"form-control\">
                (";
                // line 52
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("min"                ,"start"                ,                );
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
                echo " -";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("max"                ,"start"                ,                );
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
                echo ":";
                echo $this->getAttribute($this->getAttribute($context["item"], "settings_data_array", []), "min_val", []);
                echo " -";
                echo $this->getAttribute($this->getAttribute($context["item"], "settings_data_array", []), "max_val", []);
                echo ")";
            }
            // line 54
            echo "        </div>
    </div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "
<script type=\"text/javascript\">
    function setchbx(fid, status) {
        if(status){
            \$('#'+fid).find('input[type=checkbox]').each(function(index, item) {
                if (!item.checked) {
                    \$(item).next().trigger('click');
                }
            });
        }else{
            \$('#'+fid).find('input[type=checkbox]').each(function(index, item) {
                if (item.checked) {
                    \$(item).next().trigger('click');
                }
            });
        }
    }
    \$(function(){
        \$('.select-link').bind('click', function(){
            setchbx(\$(this).parent().attr('id'), 1); return false;
        });
        \$('.unselect-link').bind('click', function(){
            setchbx(\$(this).parent().attr('id'), 0); return false;
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "custom_form_fields.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  367 => 57,  360 => 54,  312 => 52,  305 => 51,  303 => 50,  295 => 49,  293 => 48,  287 => 47,  285 => 46,  277 => 45,  275 => 44,  231 => 42,  228 => 41,  216 => 38,  185 => 37,  182 => 36,  178 => 35,  175 => 33,  144 => 31,  140 => 30,  136 => 29,  134 => 28,  132 => 27,  120 => 24,  105 => 23,  101 => 22,  97 => 20,  86 => 19,  84 => 18,  81 => 16,  73 => 13,  65 => 12,  61 => 11,  54 => 9,  52 => 8,  48 => 7,  46 => 6,  44 => 5,  41 => 4,  37 => 3,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "custom_form_fields.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/custom_form_fields.twig");
    }
}
