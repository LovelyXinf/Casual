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

/* list_ds.twig */
class __TwigTemplate_e70c2737aeb1a28cdf99bb947c95f420d4c590ef44dd4826faaf105604745c61 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_ds.twig", 1)->display(twig_array_merge($context, ["load_type" => "editable"]));
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <!-- 1 level menu -->
        <div class=\"\" role=\"tabpanel\" data-example-id=\"togglable-tabs\">
            <ul id=\"myTab\" class=\"nav nav-tabs bar_tabs\" role=\"tablist\">
                ";
        // line 8
        $module =         null;
        $helper =         'menu';
        $name =         'get_admin_level1_menu';
        $params = array("admin_languages_menu"        ,        );
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
        echo "            </ul>
        </div>
        <!-- 2 level menu -->
        <div class=\"x_title\">
            <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
                ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["lang_id"] => $context["item"]) {
            // line 15
            echo "                    <label class=\"btn btn-default
                           ";
            // line 16
            if (($context["lang_id"] == ($context["current_lang_id"] ?? null))) {
                echo "active";
            }
            echo "\"
                           onclick=\"document.location.href = '";
            // line 17
            echo ($context["site_url"] ?? null);
            echo "admin/languages/ds/";
            echo $context["lang_id"];
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "'\">
                        <input type=\"radio\" ";
            // line 18
            if (($context["lang_id"] == ($context["current_lang_id"] ?? null))) {
                echo "selected";
            }
            echo ">
                        ";
            // line 19
            echo $this->getAttribute($context["item"], "name", []);
            echo "
                    </label>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['lang_id'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "            </div>
            <div class=\"clearfix\"></div>
        </div>

        <div class='x_content'>
            ";
        // line 27
        if ( !$this->getAttribute(($context["current_module"] ?? null), "is_disabled_action_ds", [])) {
            // line 28
            echo "                <div id=\"actions\" class=\"hide\">
                    <div class=\"btn-group\">
                        <a href=\"";
            // line 30
            echo ($context["site_url"] ?? null);
            echo "admin/languages/ds_edit/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "\" class=\"btn btn-primary\">
                            ";
            // line 31
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_add_ds"            ,"languages"            ,            );
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
            echo "                        </a>
                        <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                aria-haspopup=\"true\" aria-expanded=\"false\">
                            <span class=\"caret\"></span>
                            <span class=\"sr-only\">Toggle Dropdown</span>
                        </button>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"";
            // line 40
            echo ($context["site_url"] ?? null);
            echo "admin/languages/ds_edit/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "\">
                                    ";
            // line 41
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_add_ds"            ,"languages"            ,            );
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
            // line 42
            echo "                                </a>
                            </li>
                            <li>
                                <a href=\"";
            // line 45
            echo ($context["site_url"] ?? null);
            echo "admin/languages/ajax_ds_delete/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "\"
                                   onclick=\"javascript:  if (!confirm('";
            // line 46
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("note_delete_pages"            ,"languages"            ,            );
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
            echo "'))
                                               return false;
                                           delete_strings(this.href);
                                           return false;\">
                                    ";
            // line 50
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_delete_selected"            ,"languages"            ,            );
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
            echo "                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            ";
        }
        // line 57
        echo "            <div id=\"filters\">
                <div class=\"col-md-4 col-sm-3 col-xs-12\">
                    <select name=\"module_id\" onchange=\"javascript: reload_page(this.value);\" class=\"form-control\">
                        ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["module_id"] => $context["item"]) {
            // line 61
            echo "                            <option value=\"";
            echo $context["module_id"];
            echo "\"
                                    ";
            // line 62
            if (($context["module_id"] == ($context["current_module_id"] ?? null))) {
                echo " selected";
            }
            echo ">
                                ";
            // line 63
            echo $this->getAttribute($context["item"], "module_gid", []);
            echo " (";
            echo $this->getAttribute($context["item"], "module_name", []);
            echo ")
                            </option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['module_id'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                    </select>
                </div>
            </div>
            <table id=\"pages_table\" class=\"table table-striped responsive-utilities jambo_table bulk-action\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-group\"><input type=\"checkbox\" id=\"check-all\" class=\"flat\"></th>
                        <th class=\"column-title\">";
        // line 73
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
        echo "</th>
                        <th class=\"column-title\">";
        // line 74
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_ds_name"        ,"languages"        ,        );
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
        echo "</th>
                        <th class=\"column-title\">&nbsp;</th>
                        <th class=\"bulk-actions\" colspan=\"5\">
                            ";
        // line 82
        echo "                        </th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ds"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 87
            echo "                        <tr id=\"l-";
            echo $context["key"];
            echo "_tr\" class=\"";
            if ( !call_user_func_array($this->env->getFunction('empty')->getCallable(), [$this->getAttribute($context["item"], "net_is_incomer", [])])) {
                echo "net_incomer ";
            }
            echo "even pointer\">
                            <td class=\"text-center\">
                                <input type=\"checkbox\" class=\"flat grouping del\" value=\"";
            // line 89
            echo $context["key"];
            echo "\" data=\"table_records\">

                            </td>
                            <td>";
            // line 92
            echo $context["key"];
            echo "</td>
                            <td class=\"editable\" id=\"l-";
            // line 93
            echo $context["key"];
            echo "\">";
            echo $this->getAttribute($context["item"], "header", []);
            echo "</td>
                            <td class=\"icons\">
                                ";
            // line 95
            if ( !$this->getAttribute(($context["current_module"] ?? null), "is_disabled_action_ds", [])) {
                // line 96
                echo "                                    <div class=\"btn-group\">
                                        <button type=\"button\" class=\"btn btn-primary\"
                                                onclick=\"document.location.href = '";
                // line 98
                echo ($context["site_url"] ?? null);
                echo "admin/languages/ds_items/";
                echo ($context["current_lang_id"] ?? null);
                echo "/";
                echo ($context["current_module_id"] ?? null);
                echo "/";
                echo $context["key"];
                echo "'\">
                                            ";
                // line 99
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_edit_ds_items"                ,"languages"                ,                );
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
                // line 100
                echo "                                        </button>
                                        <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                                aria-haspopup=\"true\" aria-expanded=\"false\">
                                            <span class=\"caret\"></span>
                                            <span class=\"sr-only\">Toggle Dropdown</span>
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li>
                                                <a href=\"";
                // line 108
                echo ($context["site_url"] ?? null);
                echo "admin/languages/ds_items/";
                echo ($context["current_lang_id"] ?? null);
                echo "/";
                echo ($context["current_module_id"] ?? null);
                echo "/";
                echo $context["key"];
                echo "\">
                                                    ";
                // line 109
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_edit_ds_items"                ,"languages"                ,                );
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
                // line 110
                echo "                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"";
                // line 113
                echo ($context["site_url"] ?? null);
                echo "admin/languages/ds_edit/";
                echo ($context["current_lang_id"] ?? null);
                echo "/";
                echo ($context["current_module_id"] ?? null);
                echo "/";
                echo $context["key"];
                echo "\">
                                                    ";
                // line 114
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_edit_ds"                ,"languages"                ,                );
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
                // line 115
                echo "                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"";
                // line 118
                echo ($context["site_url"] ?? null);
                echo "admin/languages/ds_delete/";
                echo ($context["current_lang_id"] ?? null);
                echo "/";
                echo ($context["current_module_id"] ?? null);
                echo "/";
                echo $context["key"];
                echo "\"
                                                   onclick=\"javascript: if (!confirm('";
                // line 119
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_delete_ds"                ,"languages"                ,""                ,"js"                ,                );
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
                echo "'))
                                                           return false;\">
                                                    ";
                // line 121
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_delete_ds"                ,"languages"                ,                );
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
                // line 122
                echo "                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                ";
            }
            // line 127
            echo "                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var reload_url = \"";
        // line 137
        echo ($context["site_url"] ?? null);
        echo "admin/languages/ds/";
        echo ($context["current_lang_id"] ?? null);
        echo "/\";
    var change_url = '";
        // line 138
        echo ($context["site_url"] ?? null);
        echo "admin/languages/ajax_ds_save/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "';
    function reload_page(module_id) {
        location.href = reload_url + module_id;
    }

    function delete_strings(url) {
        var gidArr = new Object;
        \$(\".del:checked\").each(function (i) {
            gidArr[i] = \$(this).val();
        });
        \$.ajax({
            url: url,
            type: 'POST',
            data: ({gids: gidArr}),
            cache: false,
            success: function (data) {
                for (i in gidArr) {
                    \$('#' + gidArr[i] + '_tr').remove();
                }
                \$('#pages_table tr').removeClass('zebra');
                \$(\"#pages_table tr:odd\").addClass(\"zebra\");
            }
        });
    }

    \$(function () {
        \$('.editable').each(function() {
            \$(this).editable(change_url, {
                tooltip: '";
        // line 166
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("default_editable_text"        ,"languages"        ,""        ,"js"        ,        );
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
        echo "',
                placeholder: '<font class=\"hide_text\">";
        // line 167
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("default_editable_text"        ,"languages"        ,""        ,"js"        ,        );
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
        echo "</font>',
                submitdata: {id: this.id.replace(/^l-/, '')},
                name: 'text',
                submit: 'Save',
                height: 'auto',
                width: 300,
                cssclass: 'jeditable-form',
                callback: function (value, settings) {
                    \$(this).html(settings.current);
                }
            });
        });
    });
</script>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#pages_table').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 188
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
                \"sEmptyTable\": \"\"
            },
            \"aoColumnDefs\": [
                {
                    'bSortable': false,
                    'aTargets': [0, 3]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"dom\": 'T<\"clear\"><\"actions\"><\"filters\">lfrtip',
        });
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
        var actions = \$(\"#actions\");
        \$('#pages_table_wrapper').find('.actions').html(actions.html());
        actions.remove();
        var filters = \$(\"#filters\");
        \$('#pages_table_wrapper').find('.filters').html(filters.html());
        filters.remove();
    });
</script>

";
        // line 230
        if (($context["TRIAL_MODE"] ?? null)) {
            // line 231
            echo "<script>
    \$(function(){
        var href = \$('#languages_pages_item').attr('href');
        href = href.replace('/pages/', '/pages/1/2');
        \$('#languages_pages_item').attr('href', href);
    });
</script>
";
        }
        // line 238
        echo "   

";
        // line 240
        $this->loadTemplate("@app/footer.twig", "list_ds.twig", 240)->display($context);
    }

    public function getTemplateName()
    {
        return "list_ds.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  763 => 240,  759 => 238,  749 => 231,  747 => 230,  683 => 188,  640 => 167,  617 => 166,  582 => 138,  576 => 137,  567 => 130,  559 => 127,  552 => 122,  531 => 121,  507 => 119,  497 => 118,  492 => 115,  471 => 114,  461 => 113,  456 => 110,  435 => 109,  425 => 108,  415 => 100,  394 => 99,  384 => 98,  380 => 96,  378 => 95,  371 => 93,  367 => 92,  361 => 89,  351 => 87,  347 => 86,  341 => 82,  316 => 74,  293 => 73,  284 => 66,  273 => 63,  267 => 62,  262 => 61,  258 => 60,  253 => 57,  245 => 51,  224 => 50,  198 => 46,  190 => 45,  185 => 42,  164 => 41,  156 => 40,  146 => 32,  125 => 31,  117 => 30,  113 => 28,  111 => 27,  104 => 22,  95 => 19,  89 => 18,  81 => 17,  75 => 16,  72 => 15,  68 => 14,  61 => 9,  40 => 8,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_ds.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/languages/views/gentelella/list_ds.twig");
    }
}
