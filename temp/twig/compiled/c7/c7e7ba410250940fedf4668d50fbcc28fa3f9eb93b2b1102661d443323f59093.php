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

/* timing.twig */
class __TwigTemplate_33c08aeed46c4376cdbd792081772b44af80ec8b183aecaa0a949ee9b3069945 extends \Twig\Template
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
        $params = array("field_statistics_date"        ,"operators"        ,        );
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
        $params = array("date_from"        ,$this->getAttribute($this->getAttribute(($context["search_params"] ?? null), "date", []), "from", [])        ,["id" => "date_from", "noSetCurrentDate" => 1, "year_range" => ["min" => $this->getAttribute(($context["year_range"] ?? null), "min", []), "max" => $this->getAttribute(($context["year_range"] ?? null), "max", [])]]        ,        );
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
                    <label class=\"control-label\" for=\"date_to\">&nbsp;";
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
        $params = array("date_to"        ,$this->getAttribute($this->getAttribute(($context["search_params"] ?? null), "date", []), "to", [])        ,["id" => "date_to", "noSetCurrentDate" => 1, "year_range" => ["min" => $this->getAttribute(($context["year_range"] ?? null), "min", []), "max" => $this->getAttribute(($context["year_range"] ?? null), "max", [])]]        ,        );
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
    <div class=\"mt10 mb20\">
        <div>
            ";
        // line 49
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_total_messages_count"        ,"operators"        ,        );
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
        // line 50
        echo ($context["total_messages_count"] ?? null);
        echo "</strong>
        </div>
        <div>
            ";
        // line 53
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_total_chat_time"        ,"operators"        ,        );
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
        // line 54
        echo ($context["total_chat_time"] ?? null);
        echo "</strong>
        </div>
    </div>
    <table id=\"timing\" class=\"table table-striped responsive-utilities jambo_table\">
        <thead>
            <tr class=\"headings\">
                ";
        // line 60
        if ( !($context["operator_id"] ?? null)) {
            // line 61
            echo "                    <th class=\"column-title\">
                        ";
            // line 62
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
            // line 63
            echo "                    </th>
                ";
        }
        // line 65
        echo "                <th class=\"column-title\">
                    ";
        // line 66
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_date_start"        ,"operators"        ,        );
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
        // line 67
        echo "                </th>
                <th class=\"column-title\">
                    ";
        // line 69
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_date_end"        ,"operators"        ,        );
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
        // line 70
        echo "                </th>
                <th class=\"column-title\">
                    ";
        // line 72
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_message_count"        ,"operators"        ,        );
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
        // line 73
        echo "                </th>
                <th class=\"column-title\">
                    ";
        // line 75
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_timing"        ,"operators"        ,        );
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
        // line 76
        echo "                </th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["timing_items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 81
            echo "                <tr>
                    ";
            // line 82
            if ( !($context["operator_id"] ?? null)) {
                // line 83
                echo "                        <td>
                            <a href=\"";
                // line 84
                echo ($context["site_url"] ?? null);
                echo "admin/operators/edit/";
                echo $this->getAttribute($context["item"], "operator_id", []);
                echo "\">";
                echo $this->getAttribute($this->getAttribute($context["item"], "operator", []), "output_name", []);
                echo "</a>
                        </td>
                    ";
            }
            // line 87
            echo "                    <td>
                        ";
            // line 88
            echo $this->getAttribute($context["item"], "date_start", []);
            echo "
                    </td>
                    <td>
                        ";
            // line 91
            if ($this->getAttribute($context["item"], "is_live", [])) {
                // line 92
                echo "                            <span class=\"badge\" style=\"background:#32b44a;\">
                                ";
                // line 93
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("text_on_live"                ,"operators"                ,                );
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
                // line 94
                echo "                            </span>
                        ";
            } else {
                // line 96
                echo "                            ";
                echo $this->getAttribute($context["item"], "date_end", []);
                echo "
                        ";
            }
            // line 98
            echo "                    </td>
                    <td>
                        ";
            // line 100
            echo $this->getAttribute($context["item"], "messages_count", []);
            echo "
                    </td>
                    <td>";
            // line 102
            echo $this->getAttribute($context["item"], "chat_time_str", []);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 105
        echo "        </tbody>
        <tbody>
    </table>
</div>
";
        // line 109
        $this->loadTemplate("@app/pagination.twig", "timing.twig", 109)->display($context);
        // line 110
        echo "
<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#timing').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 117
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
        // line 118
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
        // line 126
        if ( !($context["operator_id"] ?? null)) {
            // line 127
            echo "                    'aTargets': [0,1,2,3,4]
                    ";
        } else {
            // line 129
            echo "                    'aTargets': [0,1,2,3]
                    ";
        }
        // line 131
        echo "                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"bFilter\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        ";
        // line 139
        if ( !($context["operator_id"] ?? null)) {
            // line 140
            echo "        oTable.fnSort([1, 'desc']);
        ";
        } else {
            // line 142
            echo "        oTable.fnSort([0, 'desc']);
        ";
        }
        // line 144
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
        return "timing.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  642 => 144,  638 => 142,  634 => 140,  632 => 139,  622 => 131,  618 => 129,  614 => 127,  612 => 126,  582 => 118,  559 => 117,  550 => 110,  548 => 109,  542 => 105,  533 => 102,  528 => 100,  524 => 98,  518 => 96,  514 => 94,  493 => 93,  490 => 92,  488 => 91,  482 => 88,  479 => 87,  469 => 84,  466 => 83,  464 => 82,  461 => 81,  457 => 80,  451 => 76,  430 => 75,  426 => 73,  405 => 72,  401 => 70,  380 => 69,  376 => 67,  355 => 66,  352 => 65,  348 => 63,  327 => 62,  324 => 61,  322 => 60,  313 => 54,  290 => 53,  284 => 50,  261 => 49,  229 => 39,  224 => 36,  219 => 33,  198 => 32,  174 => 30,  170 => 28,  168 => 27,  164 => 25,  143 => 24,  118 => 21,  114 => 19,  93 => 18,  69 => 16,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "timing.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/timing.twig");
    }
}
