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

/* withdraw_money.twig */
class __TwigTemplate_392642548c70ccd3bd995eef8cb05501f0e5e91492a55e7ced73ea75af2a8cd9 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "withdraw_money.twig", 1)->display($context);
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
        $params = array("header_withdrawal_form"        ,"payments"        ,        );
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
                        <a class=\"collapse-link\"><i class=\"fa fa-chevron-up cursor-pointer\"></i></a>
                    </li>
                </ul>
                <div class=\"clearfix\"></div>
            </div>
            <div class=\"x_content\">
                <form method=\"post\" enctype=\"multipart/form-data\" data-parsley-validate class=\"form-horizontal form-label-left\">
                    <div class=\"form-group\">
                        <label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">";
        // line 19
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
        echo ",";
        // line 20
        $module =         null;
        $helper =         'start';
        $name =         'currency_format_output';
        $params = array(        );
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
                            <input type=\"number\" name=\"amount\" min=\"";
        // line 23
        echo ($context["min_amount"] ?? null);
        echo "\" step=\"1\" class=\"form-control\" value=\"";
        echo $this->getAttribute(($context["form_data"] ?? null), "amount", []);
        echo "\" required>";
        // line 24
        $module =         null;
        $helper =         'start';
        $name =         'currency_format_output';
        $params = array(["value" => ($context["min_amount"] ?? null), "not_virtual" => true, "no_tags" => true]        ,        );
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
        $context['min_amount_str'] = $result;
        // line 25
        echo "                            <span class=\"help-block\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_minimum_amount_is"        ,"payments"        ,""        ,"text"        ,["amount" => ($context["min_amount_str"] ?? null)]        ,        );
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
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">";
        // line 30
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_wm_paypal_account"        ,"payments"        ,        );
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
                            <input type=\"email\" name=\"email\" class=\"form-control\" value=\"";
        // line 33
        echo $this->getAttribute(($context["form_data"] ?? null), "email", []);
        echo "\" required>
                        </div>
                    </div>
                    <div class=\"ln_solid\"></div>
                    <div class=\"form-group\">
                        <div class=\"col-md-9 col-sm-9 col-xs-12 col-sm-offset-3\">
                            <button type=\"submit\" class=\"btn btn-primary\" name=\"btn_send\" value=\"1\">";
        // line 40
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_send"        ,"start"        ,        );
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
        // line 41
        echo "                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class=\"x_content\">
            <table id=\"data\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">";
        // line 53
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
        // line 54
        echo "                        </th>
                        <th class=\"column-title\">";
        // line 56
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
        // line 57
        echo "                        </th>
                        <th class=\"column-title\">";
        // line 59
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
        // line 60
        echo "                        </th>
                        <th class=\"column-title\" style=\"width:200px;\">";
        // line 62
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
        // line 63
        echo "                        </th>
                    </tr>
                </thead>
                <tbody>";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 68
            echo "                        <tr>
                            <td>
                                -";
            // line 70
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
            // line 71
            echo "                            </td>
                            <td>";
            // line 73
            echo $this->getAttribute($context["item"], "system_gid", []);
            echo "
                            </td>
                            <td>";
            // line 76
            echo $this->getAttribute($context["item"], "status_str", []);
            echo "
                            </td>
                            <td>";
            // line 79
            echo $this->getAttribute($context["item"], "date_added", []);
            echo "
                            </td>
                        </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "                </tbody>
            </table>
        </div>";
        // line 86
        $this->loadTemplate("@app/pagination.twig", "withdraw_money.twig", 86)->display($context);
        // line 87
        echo "    </div>
</div>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#data').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 96
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
        // line 97
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_wm_items"        ,"payments"        ,        );
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
                    'aTargets': [0,1,2,3]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"bFilter\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        oTable.fnSort([3, 'desc']);

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
        // line 138
        $this->loadTemplate("@app/footer.twig", "withdraw_money.twig", 138)->display($context);
    }

    public function getTemplateName()
    {
        return "withdraw_money.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  490 => 138,  429 => 97,  406 => 96,  395 => 87,  393 => 86,  389 => 83,  380 => 79,  375 => 76,  370 => 73,  367 => 71,  346 => 70,  342 => 68,  338 => 67,  333 => 63,  312 => 62,  309 => 60,  288 => 59,  285 => 57,  264 => 56,  261 => 54,  240 => 53,  227 => 41,  206 => 40,  197 => 33,  172 => 30,  145 => 25,  124 => 24,  119 => 23,  94 => 20,  72 => 19,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "withdraw_money.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella_operator/withdraw_money.twig");
    }
}
