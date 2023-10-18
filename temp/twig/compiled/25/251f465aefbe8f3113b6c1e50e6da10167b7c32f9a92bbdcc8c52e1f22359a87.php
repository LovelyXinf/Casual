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

/* messages.twig */
class __TwigTemplate_4bbd31057406eda66c543f2ffab461e4a88c348c7ecd2a1430c40e1397103889 extends \Twig\Template
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
        $params = array("field_statistics_date_send"        ,"operators"        ,        );
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
    <table id=\"messages\" class=\"table table-striped responsive-utilities jambo_table\">
        <thead>
            <tr class=\"headings\">
                ";
        // line 50
        if ( !($context["operator_id"] ?? null)) {
            // line 51
            echo "                    <th class=\"column-title\">
                        ";
            // line 52
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
            // line 53
            echo "                    </th>
                ";
        }
        // line 55
        echo "                <th class=\"column-title\">
                    ";
        // line 56
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_message_from_user"        ,"operators"        ,        );
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
        echo "                </th>
                <th class=\"column-title\">
                    ";
        // line 59
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_message_to_user"        ,"operators"        ,        );
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
        echo "                </th>
                <th class=\"column-title\">
                    ";
        // line 62
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_message"        ,"operators"        ,        );
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
        echo "                </th>
                <th class=\"column-title\" style=\"width:200px;\">
                    ";
        // line 65
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_statistics_date_send"        ,"operators"        ,        );
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
        echo "                </th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["statistics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 71
            echo "                <tr>
                    ";
            // line 72
            if ( !($context["operator_id"] ?? null)) {
                // line 73
                echo "                        <td>
                            <a href=\"";
                // line 74
                echo ($context["site_url"] ?? null);
                echo "admin/operators/edit/";
                echo $this->getAttribute($context["item"], "operator_id", []);
                echo "\">";
                echo $this->getAttribute($this->getAttribute($context["item"], "operator", []), "output_name", []);
                echo "</a>
                        </td>
                    ";
            }
            // line 77
            echo "                    <td>
                        ";
            // line 78
            echo $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "message", []), "user", []), "output_name", []);
            echo "
                    </td>
                    <td>
                        ";
            // line 81
            echo $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "message", []), "contact", []), "output_name", []);
            echo "
                    </td>
                    <td>
                        <div data-emoji=\"1\" style=\"word-break:break-word;\">
                            ";
            // line 85
            echo $this->getAttribute($this->getAttribute($context["item"], "message", []), "message", []);
            echo "
                        </div>
                        ";
            // line 87
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["item"], "message", []), "attaches", []));
            foreach ($context['_seq'] as $context["key"] => $context["attach"]) {
                // line 88
                echo "                            <a href=\"";
                echo $this->getAttribute($this->getAttribute($context["attach"], "format", []), "file_url", []);
                echo "\" target=\"_blank\" style=\"margin:5px 5px 0 0; display:inline-block;\">
                                <img width=\"100\" src=\"";
                // line 89
                echo $this->getAttribute($this->getAttribute($this->getAttribute($context["attach"], "format", []), "thumbs", []), "middle", []);
                echo "\" gallery-src=\"";
                echo $this->getAttribute($this->getAttribute($this->getAttribute($context["attach"], "format", []), "thumbs", []), "grand", []);
                echo "\" />
                            </a>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['attach'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "                    </td>
                    <td>";
            // line 93
            echo $this->getAttribute($context["item"], "date_added", []);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "        </tbody>
        <tbody>
    </table>
</div>
";
        // line 100
        $this->loadTemplate("@app/pagination.twig", "messages.twig", 100)->display($context);
        // line 101
        echo "
";
        // line 102
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"jquery-slimscroll.js"        ,        );
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
        // line 103
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"emoji-picker/js/config.js"        ,        );
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
        // line 104
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"emoji-picker/js/util.js"        ,        );
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
        // line 105
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"emoji-picker/js/jquery.emojiarea.js"        ,        );
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
        // line 106
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"emoji-picker/js/emoji-picker.js"        ,        );
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
        // line 107
        echo "<script type=\"text/javascript\">
    \$(function() {
        var emojiPicker = new EmojiPicker({
            assetsPath : '";
        // line 110
        echo ($context["site_root"] ?? null);
        echo "application/js/emoji-picker/img',
            iconSize   : 20,
            norealTime : false,
        });

        \$('[data-emoji=\"1\"]').each(function () {
            \$(this).html(emojiPicker.colonToImage(emojiPicker.codeToColon(JSON.parse(JSON.stringify(\$(this).html()).replace(/\\\\\\\\u/g, '\\\\u')))));
        });
    });
</script>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#messages').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 127
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
        // line 128
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
        // line 136
        if ( !($context["operator_id"] ?? null)) {
            // line 137
            echo "                    'aTargets': [0,1,2,3,4]
                    ";
        } else {
            // line 139
            echo "                    'aTargets': [0,1,2,3]
                    ";
        }
        // line 141
        echo "                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            ";
        // line 147
        echo "            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
        });
        ";
        // line 149
        if ( !($context["operator_id"] ?? null)) {
            // line 150
            echo "        oTable.fnSort([4, 'desc']);
        ";
        } else {
            // line 152
            echo "        oTable.fnSort([3, 'desc']);
        ";
        }
        // line 154
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
        return "messages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  697 => 154,  693 => 152,  689 => 150,  687 => 149,  683 => 147,  676 => 141,  672 => 139,  668 => 137,  666 => 136,  636 => 128,  613 => 127,  593 => 110,  588 => 107,  567 => 106,  546 => 105,  525 => 104,  504 => 103,  483 => 102,  480 => 101,  478 => 100,  472 => 96,  463 => 93,  460 => 92,  449 => 89,  444 => 88,  440 => 87,  435 => 85,  428 => 81,  422 => 78,  419 => 77,  409 => 74,  406 => 73,  404 => 72,  401 => 71,  397 => 70,  391 => 66,  370 => 65,  366 => 63,  345 => 62,  341 => 60,  320 => 59,  316 => 57,  295 => 56,  292 => 55,  288 => 53,  267 => 52,  264 => 51,  262 => 50,  229 => 39,  224 => 36,  219 => 33,  198 => 32,  174 => 30,  170 => 28,  168 => 27,  164 => 25,  143 => 24,  118 => 21,  114 => 19,  93 => 18,  69 => 16,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "messages.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/operators/views/gentelella/messages.twig");
    }
}
