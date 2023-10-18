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

/* earning.twig */
class __TwigTemplate_32f27044b9f1d134e018790fa1c022328d8a0f2b4063097c77c28831e38094c4 extends \Twig\Template
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
        echo "<div class=\"x_panel\">
    <div class=\"x_title\">
        <h2>";
        // line 3
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
        // line 16
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
        // line 18
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
        // line 19
        echo "                </div>
                <div class=\"col-md-1 col-sm-1 col-xs-1 text-center\">
                    <label class=\"control-label\" for=\"date_added_to\">&nbsp;";
        // line 21
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
        // line 24
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
        // line 25
        echo "                </div>
            </div>
            ";
        // line 27
        if ( !($context["operator_id"] ?? null)) {
            // line 28
            echo "                <div class=\"form-group\">
                    <label class=\"col-md-3 col-sm-3 col-xs-12\">
                        ";
            // line 30
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_statistics_operator"            ,"operators"            ,            );
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
                    <div class=\"col-xs-12 col-sm-9 col-md-9\">
                        ";
            // line 32
            $module =             null;
            $helper =             'operators';
            $name =             'operatorSelect';
            $params = array($this->getAttribute(($context["search_params"] ?? null), "operator_id", [])            ,0            ,"operator_id"            ,            );
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
            echo "                    </div>
                </div>
            ";
        }
        // line 36
        echo "            <div class=\"ln_solid\"></div>
            <div class=\"form-group\">
                <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                    <input type=\"submit\" class=\"btn btn-primary\" value=\"";
        // line 39
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
    ";
        // line 47
        if (($context["total_amount"] ?? null)) {
            // line 48
            echo "        <div class=\"mt10 mb20\">
            ";
            // line 49
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_total_earnings"            ,"operators"            ,            );
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
            <strong>
                ";
            // line 51
            $module =             null;
            $helper =             'start';
            $name =             'currency_format_output';
            $params = array(["value" => ($context["total_amount"] ?? null), "no_tags" => true, "not_virtual" => true]            ,            );
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
            // line 52
            echo "            </strong>
        </div>
    ";
        }
        // line 55
        echo "    <table id=\"earning\" class=\"table table-striped responsive-utilities jambo_table\">
        <thead>
            <tr class=\"headings\">
                ";
        // line 58
        if ( !($context["operator_id"] ?? null)) {
            // line 59
            echo "                    <th class=\"column-title\">
                        ";
            // line 60
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_statistics_operator"            ,"operators"            ,            );
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
            // line 61
            echo "                    </th>
                ";
        }
        // line 63
        echo "                <th class=\"column-title\">
                    ";
        // line 64
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
        // line 65
        echo "                </th>
                <th class=\"column-title\" style=\"width:100px;\">
                    ";
        // line 67
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
        // line 68
        echo "                </th>
                <th class=\"column-title\" style=\"width:200px;\">
                    ";
        // line 70
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
        // line 71
        echo "                </th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["statistics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 76
            echo "                <tr>
                    ";
            // line 77
            if ( !($context["operator_id"] ?? null)) {
                // line 78
                echo "                        <td>
                            <a href=\"";
                // line 79
                echo ($context["site_url"] ?? null);
                echo "admin/operators/edit/";
                echo $this->getAttribute($context["item"], "operator_id", []);
                echo "\">";
                echo $this->getAttribute($this->getAttribute($context["item"], "operator", []), "output_name", []);
                echo "</a>
                        </td>
                    ";
            }
            // line 82
            echo "                    <td>
                        ";
            // line 83
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
            // line 84
            echo "                    </td>
                    <td>
                        +";
            // line 86
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
            // line 87
            echo "                    </td>
                    <td>";
            // line 88
            echo $this->getAttribute($context["item"], "date_added", []);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "        </tbody>
        <tbody>
    </table>
</div>
";
        // line 95
        $this->loadTemplate("@app/pagination.twig", "earning.twig", 95)->display($context);
        // line 96
        echo "
<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#earning').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 103
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
        // line 104
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_items"        ,"operators"        ,        );
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
                    ";
        // line 112
        if ( !($context["operator_id"] ?? null)) {
            // line 113
            echo "                    'aTargets': [0,1,2,3]
                    ";
        } else {
            // line 115
            echo "                    'aTargets': [0,1,2]
                    ";
        }
        // line 117
        echo "                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"bFilter\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        ";
        // line 125
        if ( !($context["operator_id"] ?? null)) {
            // line 126
            echo "        oTable.fnSort([3, 'desc']);
        ";
        } else {
            // line 128
            echo "        oTable.fnSort([2, 'desc']);
        ";
        }
        // line 130
        echo "
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
</script>";
    }

    public function getTemplateName()
    {
        return "earning.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  612 => 130,  608 => 128,  604 => 126,  602 => 125,  592 => 117,  588 => 115,  584 => 113,  582 => 112,  552 => 104,  529 => 103,  520 => 96,  518 => 95,  512 => 91,  503 => 88,  500 => 87,  479 => 86,  475 => 84,  454 => 83,  451 => 82,  441 => 79,  438 => 78,  436 => 77,  433 => 76,  429 => 75,  423 => 71,  402 => 70,  398 => 68,  377 => 67,  373 => 65,  352 => 64,  349 => 63,  345 => 61,  324 => 60,  321 => 59,  319 => 58,  314 => 55,  309 => 52,  288 => 51,  264 => 49,  261 => 48,  259 => 47,  229 => 39,  224 => 36,  219 => 33,  198 => 32,  174 => 30,  170 => 28,  168 => 27,  164 => 25,  143 => 24,  118 => 21,  114 => 19,  93 => 18,  69 => 16,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "earning.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/earning.twig");
    }
}
