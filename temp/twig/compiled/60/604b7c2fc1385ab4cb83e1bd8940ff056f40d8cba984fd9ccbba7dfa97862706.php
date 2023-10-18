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

/* statistics.twig */
class __TwigTemplate_01e58d58b5222bdb7a3c0c7fda0dfae6a9e6e225c3998bf668dd4bfeb1284c8b extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "statistics.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_panel\">
            <div class=\"x_title\">
                <h2>";
        // line 7
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_filters"        ,"start"        ,        );
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
                <ul class=\"nav navbar-right panel_toolbox\">
                    <li class=\"pull-right\">
                        <a class=\"collapse-link\"><i class=\"fa fa-chevron-down cursor-pointer\"></i></a>
                    </li>
                </ul>
                <div class=\"clearfix\"></div>
            </div>
            <div class=\"x_content hide\">
                <form method=\"post\" enctype=\"multipart/form-data\" data-parsley-validate
                    class=\"form-horizontal form-label-left\">
                    <div class=\"form-group\">
                        <label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">
                            ";
        // line 20
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_date_added"        ,"operators"        ,        );
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
                        <div class=\"col-md-4 col-sm-4 col-xs-12\">
                            ";
        // line 22
        $module =         null;
        $helper =         'start';
        $name =         'getCalendarInput';
        $params = array("date_added_from"        ,$this->getAttribute($this->getAttribute(($context["search_params"] ?? null), "date_added", []), "from", [])        ,["id" => "date_added_from", "noSetCurrentDate" => 1, "year_range" => ["min" => $this->getAttribute(($context["year_range"] ?? null), "min", []), "max" => $this->getAttribute(($context["year_range"] ?? null), "max", [])]]        ,        );
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
        // line 23
        echo "                        </div>
                        <div class=\"col-md-1 col-sm-1 col-xs-1 text-center\">
                            <label class=\"control-label\" for=\"date_added_to\">&nbsp;";
        // line 25
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("to"        ,"users"        ,        );
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
        echo "&nbsp;</label>
                        </div>
                        <div class=\"col-md-4 col-sm-4 col-xs-12\">
                            ";
        // line 28
        $module =         null;
        $helper =         'start';
        $name =         'getCalendarInput';
        $params = array("date_added_to"        ,$this->getAttribute($this->getAttribute(($context["search_params"] ?? null), "date_added", []), "to", [])        ,["id" => "date_added_to", "noSetCurrentDate" => 1, "year_range" => ["min" => $this->getAttribute(($context["year_range"] ?? null), "min", []), "max" => $this->getAttribute(($context["year_range"] ?? null), "max", [])]]        ,        );
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
        echo "                        </div>
                    </div>
                    <div class=\"ln_solid\"></div>
                    <div class=\"form-group\">
                        <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                            <input type=\"submit\" class=\"btn btn-primary\" value=\"";
        // line 34
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_search"        ,"start"        ,        );
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
        echo "\" name=\"btn_search\">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class=\"x_content\">
            <div class=\"mt10 mb20\">
                ";
        // line 43
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_total_earnings"        ,"operators"        ,        );
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
                <strong>";
        // line 44
        $module =         null;
        $helper =         'start';
        $name =         'currency_format_output';
        $params = array(["value" => ($context["total_amount"] ?? null), "no_tags" => true, "not_virtual" => true]        ,        );
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
        echo "</strong>
            </div>
            <table id=\"data\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">
                            ";
        // line 50
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_type"        ,"operators"        ,        );
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
        // line 51
        echo "                        </th>
                        <th class=\"column-title\" style=\"width:100px;\">
                            ";
        // line 53
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_amount"        ,"operators"        ,        );
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
        echo "                        </th>
                        <th class=\"column-title\" style=\"width:200px;\">
                            ";
        // line 56
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_date_added"        ,"operators"        ,        );
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
        // line 57
        echo "                        </th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["statistics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 62
            echo "                        <tr>
                            <td>
                                ";
            // line 64
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array(("statistics_type_" . $this->getAttribute(($context["item"] ?? null), "type", []))            ,"operators"            ,            );
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
            // line 65
            echo "                            </td>
                            <td>
                                +";
            // line 67
            $module =             null;
            $helper =             'start';
            $name =             'currency_format_output';
            $params = array(["value" => $this->getAttribute(($context["item"] ?? null), "amount", []), "no_tags" => true, "not_virtual" => true]            ,            );
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
            // line 68
            echo "                            </td>
                            <td>";
            // line 69
            echo $this->getAttribute($context["item"], "date_added", []);
            echo "</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                </tbody>
                <tbody>
            </table>
        </div>
        ";
        // line 76
        $this->loadTemplate("@app/pagination.twig", "statistics.twig", 76)->display($context);
        // line 77
        echo "    </div>
</div>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#data').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 86
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("search_all_column"        ,"start"        ,        );
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
        echo ":\",
                \"sEmptyTable\": \"";
        // line 87
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_items"        ,"start"        ,        );
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
        echo "\"
            },
            \"columnDefs\": [
                {\"type\": 'natural-nohtml', \"targets\": 0}
            ],
            \"aoColumnDefs\": [
                {
                    'bSortable': false,
                    'aTargets': [0,1,2]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"bFilter\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        oTable.fnSort([2, 'desc']);

        \$(\"tfoot input\").keyup(function () {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, \$(\"tfoot th\").index(\$(this).parent()));
        });
        \$(\"tfoot input\").each(function (i) {
            asInitVals[i] = this.value;
        });
        \$(\"tfoot input\").focus(function () {
            if (this.className == \"search_init\") {
                this.className = \"\";
                this.value = \"\";
            }
        });
        \$(\"tfoot input\").blur(function (i) {
            if (this.value == \"\") {
                this.className = \"search_init\";
                this.value = asInitVals[\$(\"tfoot input\").index(this)];
            }
        });
    });
</script>

";
        // line 128
        $this->loadTemplate("@app/footer.twig", "statistics.twig", 128)->display($context);
    }

    public function getTemplateName()
    {
        return "statistics.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  506 => 128,  443 => 87,  420 => 86,  409 => 77,  407 => 76,  401 => 72,  392 => 69,  389 => 68,  368 => 67,  364 => 65,  343 => 64,  339 => 62,  335 => 61,  329 => 57,  308 => 56,  304 => 54,  283 => 53,  279 => 51,  258 => 50,  230 => 44,  207 => 43,  176 => 34,  169 => 29,  148 => 28,  123 => 25,  119 => 23,  98 => 22,  74 => 20,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "statistics.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella_operator/statistics.twig");
    }
}
