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

/* withdraw_money_list.twig */
class __TwigTemplate_4a93e1bcef22324df5a633c9c9e370bbad6b22d7dcb77d34f479222cae266d36 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "withdraw_money_list.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_content\">
            <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
                <label class=\"btn btn-default\" data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                        onclick=\"document.location.href='";
        // line 8
        echo ($context["site_url"] ?? null);
        echo "admin/payments/withdraw_money_settings'\">
                    ";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_settings"        ,"operators"        ,        );
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
        echo "                </label>
            </div>
            <div class=\"clearfix\"></div>

            <div class=\"x_panel\">
                <div class=\"x_title\">
                    <h2>";
        // line 16
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
        // line 29
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
        // line 31
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
        // line 32
        echo "                            </div>
                            <div class=\"col-md-1 col-sm-1 col-xs-1 text-center\">
                                <label class=\"control-label\" for=\"date_added_to\">&nbsp;";
        // line 34
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
        // line 37
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
        // line 38
        echo "                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"col-md-3 col-sm-3 col-xs-12\">
                                ";
        // line 42
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_operator"        ,"operators"        ,        );
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
        // line 44
        $module =         null;
        $helper =         'operators';
        $name =         'operatorSelect';
        $params = array($this->getAttribute(($context["search_params"] ?? null), "user_id", [])        ,0        ,"user_id"        ,        );
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
        echo "                            </div>
                        </div>

                        <div class=\"ln_solid\"></div>
                        <div class=\"form-group\">
                            <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                                <input type=\"submit\" class=\"btn btn-primary\" value=\"";
        // line 51
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

            <table id=\"table_data\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">
                            ";
        // line 62
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_wm_operator"        ,"payments"        ,        );
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
        echo "                        </th>
                        <th class=\"column-title\">
                            ";
        // line 65
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_wm_amount"        ,"payments"        ,        );
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
        // line 66
        echo "                        </th>
                        <th class=\"column-title\">
                            ";
        // line 68
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_wm_payment_system"        ,"payments"        ,        );
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
        // line 69
        echo "                        </th>
                        <th class=\"column-title\">
                            ";
        // line 71
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_wm_status"        ,"payments"        ,        );
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
        // line 72
        echo "                        </th>
                        <th class=\"column-title\" style=\"width:200px;\">
                            ";
        // line 74
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_wm_date_added"        ,"payments"        ,        );
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
        // line 75
        echo "                        </th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 80
            echo "                        <tr>
                            <td>
                                <a href=\"";
            // line 82
            echo ($context["site_url"] ?? null);
            echo "admin/operators/edit/";
            echo $this->getAttribute($this->getAttribute($context["item"], "operator", []), "id", []);
            echo "\">
                                    ";
            // line 83
            echo $this->getAttribute($this->getAttribute($context["item"], "operator", []), "output_name", []);
            echo "
                                </a>
                            </td>
                            <td>
                                -";
            // line 87
            $module =             null;
            $helper =             'payments';
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
            // line 88
            echo "                            </td>
                            <td>
                                ";
            // line 90
            echo $this->getAttribute($context["item"], "system_gid", []);
            echo "
                            </td>
                            <td>
                                ";
            // line 93
            echo $this->getAttribute($context["item"], "status_str", []);
            echo "
                            </td>
                            <td>
                                ";
            // line 96
            echo $this->getAttribute($context["item"], "date_added", []);
            echo "
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "                </tbody>
                <tbody>
            </table>
        </div>
        ";
        // line 104
        $this->loadTemplate("@app/pagination.twig", "withdraw_money_list.twig", 104)->display($context);
        // line 105
        echo "    </div>
</div>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#table_data').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 114
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
        // line 115
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
                    'aTargets': [0,1,2,3,4]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"bFilter\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        oTable.fnSort([4, 'desc']);

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
        // line 156
        $this->loadTemplate("@app/footer.twig", "withdraw_money_list.twig", 156)->display($context);
    }

    public function getTemplateName()
    {
        return "withdraw_money_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  595 => 156,  532 => 115,  509 => 114,  498 => 105,  496 => 104,  490 => 100,  480 => 96,  474 => 93,  468 => 90,  464 => 88,  443 => 87,  436 => 83,  430 => 82,  426 => 80,  422 => 79,  416 => 75,  395 => 74,  391 => 72,  370 => 71,  366 => 69,  345 => 68,  341 => 66,  320 => 65,  316 => 63,  295 => 62,  262 => 51,  254 => 45,  233 => 44,  209 => 42,  203 => 38,  182 => 37,  157 => 34,  153 => 32,  132 => 31,  108 => 29,  73 => 16,  65 => 10,  44 => 9,  40 => 8,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "withdraw_money_list.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella/withdraw_money_list.twig");
    }
}
