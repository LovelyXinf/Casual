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

/* helper_calendar_input.twig */
class __TwigTemplate_ef8ba43c53896df4ba2691ca6737383e37db9316c8cd950181415559509ed713 extends \Twig\Template
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
        $context["rand"] = twig_random($this->env, 9999);
        // line 2
        echo "<div class=\"xdisplay_inputx form-group has-feedback\">
    <input type=\"text\" class=\"form-control has-feedback-left\" value=\"";
        // line 3
        echo ($context["value"] ?? null);
        echo "\"";
        if ($this->getAttribute(($context["attrs"] ?? null), "disabled", [])) {
            echo "disabled";
        }
        // line 4
        echo "        id=\"";
        if ($this->getAttribute(($context["attrs"] ?? null), "id", [])) {
            echo $this->getAttribute(($context["attrs"] ?? null), "id", []);
        } else {
            echo "single_cal_";
            echo ($context["rand"] ?? null);
        }
        echo "\" placeholder=\"\" aria-describedby=\"inputSuccess2Status3\" name=\"";
        echo ($context["name"] ?? null);
        echo "\">
    <input type=\"hidden\" value=\"";
        // line 5
        echo ($context["value"] ?? null);
        echo "\" id=\"hidden_";
        if ($this->getAttribute(($context["attrs"] ?? null), "id", [])) {
            echo $this->getAttribute(($context["attrs"] ?? null), "id", []);
        } else {
            echo "single_cal_";
            echo ($context["rand"] ?? null);
        }
        echo "\" name=\"";
        echo ($context["name"] ?? null);
        echo "\">
    <span class=\"fa fa-calendar-o form-control-feedback left\" aria-hidden=\"true\"></span>
    <span id=\"inputSuccess2Status3\" class=\"sr-only\">(success)</span>
</div>
<!-- datepicker -->";
        // line 10
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
        // line 11
        echo "<link href=\"";
        echo ($context["site_root"] ?? null);
        echo ($context["js_folder"] ?? null);
        echo "jquery-ui/jquery-ui.custom.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
<script type=\"text/javascript\">
    var monthNames = [\"january\", \"february\", \"march\", \"april\", \"may\", \"june\",
        \"july\", \"august\", \"september\", \"october\", \"november\", \"december\"
      ];
    \$(document).ready(function () {
        var showCurrentDate = true;";
        // line 18
        if ($this->getAttribute(($context["attrs"] ?? null), "noSetCurrentDate", [])) {
            // line 19
            echo "            showCurrentDate = false;";
        }
        // line 21
        echo "        moment.locale('";
        echo $this->getAttribute(($context["_LANG"] ?? null), "code", []);
        echo "');
        \$('#";
        // line 22
        if ($this->getAttribute(($context["attrs"] ?? null), "id", [])) {
            echo $this->getAttribute(($context["attrs"] ?? null), "id", []);
        } else {
            echo "single_cal_";
            echo ($context["rand"] ?? null);
        }
        echo "').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                showCurrentDate: showCurrentDate,
                calender_style: \"picker_2\",
                opens:";
        // line 27
        if (($this->getAttribute(($context["_LANG"] ?? null), "rtl", []) == "ltr")) {
            echo "\"right\"";
        } else {
            echo "\"left\"";
        }
        echo ",
                locale: {
                  format: '";
        // line 29
        if ($this->getAttribute(($context["attrs"] ?? null), "alt_format", [])) {
            echo $this->getAttribute(($context["attrs"] ?? null), "alt_format", []);
        } else {
            echo $this->getAttribute(($context["date_format_js"] ?? null), "date_literal", []);
        }
        echo "',/*
                 { monthNames: [";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["locale"] ?? null), "months", []));
        foreach ($context['_seq'] as $context["_key"] => $context["month"]) {
            // line 32
            echo "                                \"";
            echo $context["month"];
            echo "\",";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                  ],
                  daysOfWeek: [";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["locale"] ?? null), "days", []));
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            // line 37
            echo "                                \"";
            echo $context["day"];
            echo "\",";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                  ]*/
                },
                showButtonPanel: true,";
        // line 42
        if ($this->getAttribute($this->getAttribute(($context["attrs"] ?? null), "year_range", []), "min", [])) {
            // line 43
            echo "                minDate: new Date(new Date().getFullYear() +";
            echo $this->getAttribute($this->getAttribute(($context["attrs"] ?? null), "year_range", []), "min", []);
            echo ", new Date().getMonth(), new Date().getDate()),";
        } else {
            // line 45
            echo "                minDate: new Date(new Date().getFullYear(), 0),";
        }
        // line 48
        if ($this->getAttribute($this->getAttribute(($context["attrs"] ?? null), "year_range", []), "max", [])) {
            // line 49
            echo "                maxDate: new Date(new Date().getFullYear() +";
            echo $this->getAttribute($this->getAttribute(($context["attrs"] ?? null), "year_range", []), "max", []);
            echo ", new Date().getMonth(), new Date().getDate()),";
        }
        // line 51
        if (($context["value"] ?? null)) {
            // line 52
            echo "                startDate: new Date(\"";
            echo ($context["value"] ?? null);
            echo "\"),
                endDate: new Date(\"";
            // line 53
            echo ($context["value"] ?? null);
            echo "\"),";
        }
        // line 55
        if ($this->getAttribute(($context["attrs"] ?? null), "tstamp", [])) {
            // line 56
            echo "                startDate: new Date(\"";
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["attrs"] ?? null), "tstamp", []), "Y-m-d");
            echo "\"),
                endDate: new Date(\"";
            // line 57
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["attrs"] ?? null), "tstamp", []), "Y-m-d");
            echo "\"),";
        }
        // line 59
        echo "        }, function (start, end, label) {
            var date = new Date(start._d.toDateString());
            \$('#hidden_";
        // line 61
        if ($this->getAttribute(($context["attrs"] ?? null), "id", [])) {
            echo $this->getAttribute(($context["attrs"] ?? null), "id", []);
        } else {
            echo "single_cal_";
            echo ($context["rand"] ?? null);
        }
        echo "').val(function(){
                return date.getDate() + ' ' + monthNames[date.getMonth()]  + ' ' + date.getFullYear();
            });
        }).on('apply.daterangepicker', function(ev, picker) {";
        // line 65
        if ($this->getAttribute(($context["attrs"] ?? null), "altField", [])) {
            // line 66
            echo "                var alt_field = '";
            echo $this->getAttribute(($context["attrs"] ?? null), "altField", []);
            echo "';
                if(alt_field) {
                    \$(alt_field).val(picker.startDate.format('YYYY-MM-DD'));
                }";
        }
        // line 71
        echo "        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "helper_calendar_input.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 71,  228 => 66,  226 => 65,  215 => 61,  211 => 59,  207 => 57,  202 => 56,  200 => 55,  196 => 53,  191 => 52,  189 => 51,  184 => 49,  182 => 48,  179 => 45,  174 => 43,  172 => 42,  168 => 39,  160 => 37,  156 => 36,  153 => 34,  145 => 32,  141 => 31,  133 => 29,  124 => 27,  111 => 22,  106 => 21,  103 => 19,  101 => 18,  90 => 11,  69 => 10,  53 => 5,  41 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "helper_calendar_input.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella_operator/helper_calendar_input.twig");
    }
}
