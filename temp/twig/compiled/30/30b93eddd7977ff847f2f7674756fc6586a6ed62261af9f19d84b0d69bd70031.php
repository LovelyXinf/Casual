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

/* list_templates.twig */
class __TwigTemplate_7f8fabce1cf72c8b5e3a75a56087c2f69faef4dcd207770eaaffd187c44eb9aa extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_templates.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"\" role=\"tabpanel\" data-example-id=\"togglable-tabs\">
            <ul id=\"myTab\" class=\"nav nav-tabs bar_tabs\" role=\"tablist\">
                ";
        // line 7
        $module =         null;
        $helper =         'menu';
        $name =         'get_admin_level1_menu';
        $params = array("admin_notifications_menu"        ,        );
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
        // line 8
        echo "            </ul>
        </div>
        <div class=\"x_content\">
            <div class=\"col-md-12 col-sm-12 col-xs-12\">
                <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
                    <label class=\"btn btn-default";
        // line 13
        if ((($context["filter"] ?? null) == "all")) {
            echo " active ";
        }
        echo "\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"document.location.href='";
        // line 15
        echo ($context["site_url"] ?? null);
        echo "admin/notifications/templates/all'\">
                        <input type=\"radio\">
                        ";
        // line 17
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_all_templates"        ,"notifications"        ,        );
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
        echo " (";
        echo $this->getAttribute(($context["filter_data"] ?? null), "all", []);
        echo ")
                    </label>
                    <label class=\"btn btn-default";
        // line 19
        if ((($context["filter"] ?? null) == "text")) {
            echo " active ";
        }
        echo "\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"document.location.href='";
        // line 21
        echo ($context["site_url"] ?? null);
        echo "admin/notifications/templates/text'\">
                        <input type=\"radio\">
                        ";
        // line 23
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_text_templates"        ,"notifications"        ,        );
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
        echo " (";
        echo $this->getAttribute(($context["filter_data"] ?? null), "text", []);
        echo ")
                    </label>
                    <label class=\"btn btn-default";
        // line 25
        if ((($context["filter"] ?? null) == "html")) {
            echo " active ";
        }
        echo "\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"document.location.href='";
        // line 27
        echo ($context["site_url"] ?? null);
        echo "admin/notifications/templates/html'\">
                        <input type=\"radio\">
                        ";
        // line 29
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_html_templates"        ,"notifications"        ,        );
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
        echo " (";
        echo $this->getAttribute(($context["filter_data"] ?? null), "html", []);
        echo ")
                    </label>
                </div>
            </div>
            <div class=\"clearfix\"></div>
        </div>

        <div class=\"x_content\">
          <div id=\"actions\" class=\"hide\">
          ";
        // line 38
        if (($context["allow_edit"] ?? null)) {
            // line 39
            echo "              <div class=\"btn-group\">
                  <a href=\"";
            // line 40
            echo ($context["site_url"] ?? null);
            echo "admin/notifications/template_edit\" class=\"btn btn-primary\">
                      ";
            // line 41
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_add_template"            ,"notifications"            ,            );
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
            echo "                  </a>
                  <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                          aria-haspopup=\"true\" aria-expanded=\"false\">
                    <span class=\"caret\"></span>
                    <span class=\"sr-only\">Toggle Dropdown</span>
                  </button>
                  <ul class=\"dropdown-menu\">
                    <li>
                      <a href=\"";
            // line 50
            echo ($context["site_url"] ?? null);
            echo "admin/notifications/template_edit\">
                          ";
            // line 51
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_add_template"            ,"notifications"            ,            );
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
            echo "                      </a>
                    </li>
                  </ul>
              </div>
          ";
        }
        // line 57
        echo "          </div>
            <table id=\"table\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">
                            <a href=\"";
        // line 62
        echo $this->getAttribute(($context["sort_links"] ?? null), "name", []);
        echo "\"";
        if ((($context["order"] ?? null) == "name")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order_direction"] ?? null));
            echo "\"";
        }
        echo ">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_template_name"        ,"notifications"        ,        );
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
        echo "</a></th>
                        <th class=\"column-title\">";
        // line 63
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_content_type"        ,"notifications"        ,        );
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
                        <th class=\"column-title\"><a href=\"";
        // line 64
        echo $this->getAttribute(($context["sort_links"] ?? null), "date_add", []);
        echo "\"";
        if ((($context["order"] ?? null) == "date_add")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order_direction"] ?? null));
            echo "\"";
        }
        echo ">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_date_add"        ,"notifications"        ,        );
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
        echo "</a></th>
                        <th class=\"column-title\">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["templates"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 70
            echo "                        <tr class=\"even pointer\">
                            <td>";
            // line 71
            echo $this->getAttribute($context["item"], "name", []);
            echo "</td>
                            <td class=\"center\">
                                ";
            // line 73
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array(("field_content_type_" . $this->getAttribute(($context["item"] ?? null), "content_type", []))            ,"notifications"            ,            );
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
            // line 74
            echo "                            </td>
                            <td class=\"center\">
                                ";
            // line 76
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute(($context["item"] ?? null), "date_add", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])            ,            );
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
            // line 77
            echo "                            </td>
                            <td class=\"icons\">
                                <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-primary\"
                                            onclick=\"document.location.href='";
            // line 81
            echo ($context["site_url"] ?? null);
            echo "admin/notifications/template_edit/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "'\">
                                        ";
            // line 82
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_template"            ,"notifications"            ,            );
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
            // line 83
            echo "                                    </button>
                                    <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                            aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <span class=\"caret\"></span>
                                        <span class=\"sr-only\">Toggle Dropdown</span>
                                    </button>
                                    <ul class=\"dropdown-menu\">
                                        <li>
                                            <a href=\"";
            // line 91
            echo ($context["site_url"] ?? null);
            echo "admin/notifications/template_edit/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">
                                                ";
            // line 92
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_template"            ,"notifications"            ,            );
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
            echo "                                            </a>
                                        </li>
                                        ";
            // line 95
            if (($context["allow_edit"] ?? null)) {
                // line 96
                echo "                                            <li>
                                                <a href=\"";
                // line 97
                echo ($context["site_url"] ?? null);
                echo "admin/notifications/template_delete/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\"
                                                   onclick=\"javascript: if(!confirm('";
                // line 98
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_delete_template"                ,"notifications"                ,""                ,"js"                ,                );
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
                // line 100
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_delete_template"                ,"notifications"                ,                );
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
                // line 101
                echo "                                                </a>
                                            </li>
                                        ";
            }
            // line 104
            echo "                                    </ul>
                                </div>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "                </tbody>
            </table>
        </div>
        ";
        // line 112
        $this->loadTemplate("@app/pagination.twig", "list_templates.twig", 112)->display($context);
        // line 113
        echo "    </div>
</div>

<script type=\"text/javascript\">
    \$(document).ready(function () {
        \$('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#table').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 128
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
        // line 129
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_templates"        ,"notifications"        ,        );
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
                    'aTargets': [3]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"dom\": 'T<\"clear\"><\"actions\">lfrtip',
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
        \$('#table_wrapper').find('.actions').html(actions.html());
        actions.remove();
    });
</script>

";
        // line 167
        $this->loadTemplate("@app/footer.twig", "list_templates.twig", 167)->display($context);
    }

    public function getTemplateName()
    {
        return "list_templates.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  666 => 167,  606 => 129,  583 => 128,  566 => 113,  564 => 112,  559 => 109,  549 => 104,  544 => 101,  523 => 100,  499 => 98,  493 => 97,  490 => 96,  488 => 95,  484 => 93,  463 => 92,  457 => 91,  447 => 83,  426 => 82,  420 => 81,  414 => 77,  393 => 76,  389 => 74,  368 => 73,  363 => 71,  360 => 70,  356 => 69,  321 => 64,  298 => 63,  267 => 62,  260 => 57,  253 => 52,  232 => 51,  228 => 50,  218 => 42,  197 => 41,  193 => 40,  190 => 39,  188 => 38,  155 => 29,  150 => 27,  143 => 25,  117 => 23,  112 => 21,  105 => 19,  79 => 17,  74 => 15,  67 => 13,  60 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_templates.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/notifications/views/gentelella/list_templates.twig");
    }
}
