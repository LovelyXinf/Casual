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

/* list_install.twig */
class __TwigTemplate_22af37e79a267cfdbfde9d8b0872afde39e29b639c374d7096c332a7399ece63 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_install.twig", 1)->display($context);
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
        $params = array("admin_payments_menu"        ,        );
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
                    <label class=\"btn btn-default\" data-toggle-class=\"btn-primary\"
                        data-toggle-passive-class=\"btn-default\"
                        onclick=\"document.location.href='";
        // line 15
        echo ($context["site_url"] ?? null);
        echo "admin/payments/systems/all'\">
                        <input type=\"radio\" name=\"looking_user_type\">
                        ";
        // line 17
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_all_systems"        ,"payments"        ,        );
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
                    <label class=\"btn btn-default\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"document.location.href='";
        // line 21
        echo ($context["site_url"] ?? null);
        echo "admin/payments/systems/used'\">
                        <input type=\"radio\" name=\"looking_user_type\">
                        ";
        // line 23
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_used_systems"        ,"payments"        ,        );
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
        echo $this->getAttribute(($context["filter_data"] ?? null), "used", []);
        echo ")
                    </label>
                    <label class=\"btn btn-default active\" data-toggle-class=\"btn-primary\"
                        data-toggle-passive-class=\"btn-default\"
                        onclick=\"document.location.href='";
        // line 27
        echo ($context["site_url"] ?? null);
        echo "admin/payments/install'\">
                        <input type=\"radio\" name=\"looking_user_type\">
                        ";
        // line 29
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("filter_install_systems"        ,"payments"        ,        );
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
        // line 30
        echo "                    </label>
                </div>
            </div>
            <div class=\"clearfix\"></div>
        </div>
        <div class=\"x_content\">
            <table id=\"users\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title text-center\">
                            ";
        // line 40
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_system_name"        ,"payments"        ,        );
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
        echo "                        </th>
                        <th class=\"column-title\">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["payments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 47
            echo "                    <tr class=\"even pointer\">
                        <td>";
            // line 48
            echo $this->getAttribute($context["item"], "name", []);
            echo "</td>
                        <td class=\"icons\">
                            <div class=\"btn-group\">
                              <button type=\"button\" class=\"btn btn-primary\"
                                      onclick = \"";
            // line 52
            $module =             null;
            $helper =             'start';
            $name =             'setAnalytics';
            $params = array("payments_systems"            ,"systems_btn_install"            ,            );
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
            echo "document.location.href='";
            echo ($context["site_url"] ?? null);
            echo "admin/payments/install_payment/";
            echo $this->getAttribute($context["item"], "gid", []);
            echo "'\">
                                  ";
            // line 53
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_install_payment"            ,"payments"            ,            );
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
            echo "                              </button>
                              <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                      aria-haspopup=\"true\" aria-expanded=\"false\">
                                <span class=\"caret\"></span>
                                <span class=\"sr-only\">Toggle Dropdown</span>
                              </button>
                              <ul class=\"dropdown-menu\">
                                <li onclick=\"";
            // line 61
            $module =             null;
            $helper =             'start';
            $name =             'setAnalytics';
            $params = array("payments_systems"            ,"systems_btn_install"            ,            );
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
            echo "\">
                                  <a href=\"";
            // line 62
            echo ($context["site_url"] ?? null);
            echo "admin/payments/install_payment/";
            echo $this->getAttribute($context["item"], "gid", []);
            echo "\">
                                      ";
            // line 63
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_install_payment"            ,"payments"            ,            );
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
            echo "</a>
                                </li>
                              </ul>
                            </div>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "                </tbody>
            </table>
            ";
        // line 72
        $this->loadTemplate("@app/pagination.twig", "list_install.twig", 72)->display($context);
        // line 73
        echo "        </div>
    </div>
</div>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#users').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 83
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
        // line 84
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_payment_systems"        ,"payments"        ,        );
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
                    'aTargets': [0,1]
                } //disables sorting for column one
            ],
            'iDisplayLength': 10,
            \"bPaginate\": false,
            \"bInfo\": false,
            \"dom\": 'T<\"clear\">lfrtip',
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
    });
</script>

";
        // line 119
        $this->loadTemplate("@app/footer.twig", "list_install.twig", 119)->display($context);
    }

    public function getTemplateName()
    {
        return "list_install.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  431 => 119,  374 => 84,  351 => 83,  339 => 73,  337 => 72,  333 => 70,  301 => 63,  295 => 62,  272 => 61,  263 => 54,  242 => 53,  215 => 52,  208 => 48,  205 => 47,  201 => 46,  194 => 41,  173 => 40,  161 => 30,  140 => 29,  135 => 27,  107 => 23,  102 => 21,  74 => 17,  69 => 15,  60 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_install.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella/list_install.twig");
    }
}
