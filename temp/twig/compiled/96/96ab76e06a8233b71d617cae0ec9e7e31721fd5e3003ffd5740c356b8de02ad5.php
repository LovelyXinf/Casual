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

/* list_pages.twig */
class __TwigTemplate_6221654ddb24c28e5bcf1fc76046e4263f256d039ea72ee47a8ee9bd103d8f03 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_pages.twig", 1)->display(twig_array_merge($context, ["load_type" => "editable"]));
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
        <div class=\"x_title\">
            <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
                ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["lang_id"] => $context["item"]) {
            // line 14
            echo "                    <label class=\"btn btn-default
                           ";
            // line 15
            if (($context["lang_id"] == ($context["current_lang_id"] ?? null))) {
                echo "active";
            }
            echo "\"
                           onclick=\"document.location.href='";
            // line 16
            echo ($context["site_url"] ?? null);
            echo "admin/languages/pages/";
            echo $context["lang_id"];
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "'\">
                        <input type=\"radio\" ";
            // line 17
            if (($context["lang_id"] == ($context["current_lang_id"] ?? null))) {
                echo "selected";
            }
            echo ">
                        ";
            // line 18
            echo $this->getAttribute($context["item"], "name", []);
            echo "
                    </label>
\t\t            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['lang_id'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "            </div>
            <div class=\"clearfix\"></div>
        </div>
        <div class='x_content'>
            <div id=\"actions\" class=\"hide\">
              <div class=\"btn-group\">
                <a href=\"";
        // line 27
        echo ($context["site_url"] ?? null);
        echo "admin/languages/pages_edit/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "\" class=\"btn btn-primary\">
                    ";
        // line 28
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_page"        ,"languages"        ,        );
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
        echo "                </a>
                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                        aria-haspopup=\"true\" aria-expanded=\"false\">
                    <span class=\"caret\"></span>
                    <span class=\"sr-only\">Toggle Dropdown</span>
                </button>
                <ul class=\"dropdown-menu\">
                  <li>
                    <a href=\"";
        // line 37
        echo ($context["site_url"] ?? null);
        echo "admin/languages/pages_edit/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "\">
                      ";
        // line 38
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_page"        ,"languages"        ,        );
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
        // line 39
        echo "                    </a>
                  </li>
                  <li>
                    <a href=\"";
        // line 42
        echo ($context["site_url"] ?? null);
        echo "admin/languages/ajax_pages_delete/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "\"
                       onclick=\"javascript:  if (!confirm('";
        // line 43
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("note_delete_pages"        ,"languages"        ,        );
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
        echo "')) return false;
                                delete_strings(this.href); return false;\">
                        ";
        // line 45
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_delete_selected"        ,"languages"        ,        );
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
        // line 46
        echo "                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div id=\"filter\">
              <div class=\"col-md-4 col-sm-3 col-xs-12\">
                  <select name=\"module_id\" onchange=\"javascript: reload_page(this.value);\" class='form-control'>
                      ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["module_id"] => $context["item"]) {
            // line 55
            echo "                          <option value=\"";
            echo $context["module_id"];
            echo "\"
                              ";
            // line 56
            if (($context["module_id"] == ($context["current_module_id"] ?? null))) {
                echo " selected";
            }
            echo ">
                              ";
            // line 57
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
        // line 60
        echo "                          <option value=\"mobile_app\" ";
        if (("mobile_app" == ($context["current_module_id"] ?? null))) {
            echo " selected";
        }
        echo ">mobile_app (Mobile app)</option>
                  </select>
              </div>
            </div>
                <table id=\"pages_table\" class=\"table table-striped responsive-utilities jambo_table bulk-action\">
                    <thead>
                        <tr class=\"headings\">
                            <th class=\"column-group\"><input type=\"checkbox\" id=\"check-all\" class=\"flat\"></th>
                            <th class=\"column-title\">";
        // line 68
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
        // line 69
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_text"        ,"languages"        ,        );
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
                            <th class=\"column-title text-center\">&nbsp;</th>
                            <th class=\"bulk-actions\" colspan=\"5\">
                                ";
        // line 77
        echo "                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["pages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 82
            echo "                            <tr id=\"l-";
            echo $context["key"];
            echo "_tr\" class=\"even pointer\">
                                <td class=\"text-center\">
                                    <input type=\"checkbox\" class=\"flat grouping\" value=\"";
            // line 84
            echo $context["key"];
            echo "\" data=\"table_records\">
                                </td>
                                <td>";
            // line 86
            echo $context["key"];
            echo "</td>
                                <td id=\"l-";
            // line 87
            echo $context["key"];
            echo "\" class=\"editable\">";
            echo $context["item"];
            echo "</td>
                                <td class=\"icons\">
                                    <div class=\"btn-group\">
                                        <button type=\"button\" class=\"btn btn-primary\"
                                                onclick=\"document.location.href='";
            // line 91
            echo ($context["site_url"] ?? null);
            echo "admin/languages/pages_edit/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "/";
            echo $context["key"];
            echo "'\">
                                            ";
            // line 92
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_page"            ,"languages"            ,            );
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
            // line 93
            echo "                                        </button>
                                        <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                                aria-haspopup=\"true\" aria-expanded=\"false\">
                                            <span class=\"caret\"></span>
                                            <span class=\"sr-only\">Toggle Dropdown</span>
                                        </button>
                                        <ul class=\"dropdown-menu\">
                                            <li>
                                                <a href=\"";
            // line 101
            echo ($context["site_url"] ?? null);
            echo "admin/languages/pages_edit/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "/";
            echo $context["key"];
            echo "\">
                                                    ";
            // line 102
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_page"            ,"languages"            ,            );
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
            echo "                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"";
            // line 106
            echo ($context["site_url"] ?? null);
            echo "admin/languages/pages_delete/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "/";
            echo $context["key"];
            echo "\"
                                                   onclick=\"javascript: if (!confirm('";
            // line 107
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("note_delete_page"            ,"languages"            ,""            ,"js"            ,            );
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
            echo "')) return false;\">
                                                    ";
            // line 108
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_delete_page"            ,"languages"            ,            );
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
            // line 109
            echo "                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "                    </tbody>
                </table>
        </div>
    </div>
</div>

<script>
    var reload_url = \"";
        // line 123
        echo ($context["site_url"] ?? null);
        echo "admin/languages/pages/";
        echo ($context["current_lang_id"] ?? null);
        echo "/\";
    var change_url = '";
        // line 124
        echo ($context["site_url"] ?? null);
        echo "admin/languages/ajax_pages_save/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "';
    function reload_page(module_id){
        location.href = reload_url + module_id;
    }
    function delete_strings(url) {
        var gidArr = new Object;
        \$(\".del:checked\").each(function(i){
            gidArr[i] = \$(this).val();
        });
        \$.ajax({
            url: url,
            type: 'POST',
            data: ({gids: gidArr}),
            cache: false,
            success: function(data){
            for (i in gidArr){ \$('#' + gidArr[i] + '_tr').remove(); }
                \$('#pages_table tr').removeClass('zebra');
                \$(\"#pages_table tr:odd\").addClass(\"zebra\");
            }
        });
    }

    \$(function(){
        \$('.editable').each(function() {
            \$(this).editable(change_url, {
                type: 'textarea',
                tooltip: '";
        // line 150
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
        // line 151
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
                name : 'text',
                submit : 'Save',
                height: 'auto',
                width: 300,
                cssclass: 'jeditable-form',
                callback: function(value, settings){
                    \$(this).html(settings.current);
                },
                onEdit: function(content){
                    //alert(content);
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
        // line 175
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
        // line 176
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_users"        ,"users"        ,        );
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
            \"aoColumnDefs\": [
                {
                    'bSortable': false,
                    'aTargets': [0, 3]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"dom\": 'T<\"clear\"><\"actions\"><\"filter\">lfrtip',
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
        var filter = \$(\"#filter\");
        \$('#pages_table_wrapper').find('.filter').html(filter.html());
        filter.remove();
    });
</script>

";
        // line 217
        if (($context["TRIAL_MODE"] ?? null)) {
            // line 218
            echo "<script>
    \$(function(){
        var href = \$('#languages_pages_item').attr('href');
        href = href.replace('/pages/', '/pages/1/2');
        \$('#languages_pages_item').attr('href', href);
    });
</script>
";
        }
        // line 225
        echo " 

";
        // line 227
        $this->loadTemplate("@app/footer.twig", "list_pages.twig", 227)->display($context);
    }

    public function getTemplateName()
    {
        return "list_pages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  731 => 227,  727 => 225,  717 => 218,  715 => 217,  652 => 176,  629 => 175,  583 => 151,  560 => 150,  527 => 124,  521 => 123,  512 => 116,  500 => 109,  479 => 108,  456 => 107,  446 => 106,  441 => 103,  420 => 102,  410 => 101,  400 => 93,  379 => 92,  369 => 91,  360 => 87,  356 => 86,  351 => 84,  345 => 82,  341 => 81,  335 => 77,  310 => 69,  287 => 68,  273 => 60,  262 => 57,  256 => 56,  251 => 55,  247 => 54,  237 => 46,  216 => 45,  192 => 43,  184 => 42,  179 => 39,  158 => 38,  150 => 37,  140 => 29,  119 => 28,  111 => 27,  103 => 21,  94 => 18,  88 => 17,  80 => 16,  74 => 15,  71 => 14,  67 => 13,  61 => 9,  40 => 8,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_pages.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/languages/views/gentelella/list_pages.twig");
    }
}
