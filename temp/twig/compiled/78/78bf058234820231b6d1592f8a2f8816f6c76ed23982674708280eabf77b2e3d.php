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

/* numerics_list.twig */
class __TwigTemplate_25a35e294558b7bf5920d6af1dbe20324326cd6a71fd05507ca8d5ae47739233 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "numerics_list.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"\" role=\"tabpanel\" data-example-id=\"togglable-tabs\">
            <ul id=\"myTab\" class=\"nav nav-tabs bar_tabs\" role=\"tablist\">
                ";
        // line 7
        $this->loadTemplate("numerics_menu.twig", "numerics_list.twig", 7)->display($context);
        // line 8
        echo "            </ul>
        </div>
        ";
        // line 10
        if ((($context["section"] ?? null) == "overview")) {
            // line 11
            echo "        <div class=\"x_content\">
            ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["settings_data"] ?? null), "other", []));
            foreach ($context['_seq'] as $context["module"] => $context["module_data"]) {
                // line 13
                echo "            <div class=\"col-sm-6 row\">
                <label class=\"control-label col-md-12\">";
                // line 14
                echo $this->getAttribute($context["module_data"], "name", []);
                echo "</label>
                ";
                // line 15
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module_data"], "vars", []));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    // line 16
                    echo "                <div class=\"col-md-12 row\">
                    <label class=\"data-label col-sm-6 col-xs-10\">";
                    // line 17
                    echo $this->getAttribute($context["item"], "field_name", []);
                    echo "</label>
                    <label class=\"data-label col-sm-6 col-xs-2 text-right\">
                        ";
                    // line 19
                    if (($this->getAttribute($context["item"], "field_type", []) == "checkbox")) {
                        // line 20
                        echo "                            ";
                        if ($this->getAttribute($context["item"], "value", [])) {
                            // line 21
                            echo "                                ";
                            $module =                             null;
                            $helper =                             'lang';
                            $name =                             'l';
                            $params = array("yes_str"                            ,"start"                            ,                            );
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
                            // line 22
                            echo "                            ";
                        } else {
                            // line 23
                            echo "                                ";
                            $module =                             null;
                            $helper =                             'lang';
                            $name =                             'l';
                            $params = array("no_str"                            ,"start"                            ,                            );
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
                            // line 24
                            echo "                            ";
                        }
                        // line 25
                        echo "                        ";
                    } elseif (($this->getAttribute($context["item"], "field_type", []) == "select")) {
                        // line 26
                        echo "                            ";
                        echo $this->getAttribute($context["item"], "value_name", []);
                        echo "
                        ";
                    } else {
                        // line 28
                        echo "                            ";
                        echo $this->getAttribute($context["item"], "value", []);
                        echo "
                        ";
                    }
                    // line 30
                    echo "                    </label>
                </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 33
                echo "            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['module'], $context['module_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["settings_data"] ?? null), "numerics", []));
            foreach ($context['_seq'] as $context["module"] => $context["module_data"]) {
                // line 36
                echo "            <div class=\"col-sm-6 row\">
                <label class=\"control-label col-xs-12\">";
                // line 37
                echo $this->getAttribute($context["module_data"], "name", []);
                echo "</label>
                ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module_data"], "vars", []));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    // line 39
                    echo "                <div class=\"col-xs-12 row\">
                    <label class=\"data-label col-sm-6 col-xs-10\">";
                    // line 40
                    echo $this->getAttribute($context["item"], "field_name", []);
                    echo "</label>
                    <label class=\"data-label col-sm-6 col-xs-2 text-right\">
                        ";
                    // line 42
                    if (($this->getAttribute($context["item"], "field_type", []) == "checkbox")) {
                        // line 43
                        echo "                            ";
                        if ($this->getAttribute($context["item"], "value", [])) {
                            // line 44
                            echo "                                ";
                            $module =                             null;
                            $helper =                             'lang';
                            $name =                             'l';
                            $params = array("yes_str"                            ,"start"                            ,                            );
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
                            echo "                            ";
                        } else {
                            // line 46
                            echo "                                ";
                            $module =                             null;
                            $helper =                             'lang';
                            $name =                             'l';
                            $params = array("no_str"                            ,"start"                            ,                            );
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
                            // line 47
                            echo "                            ";
                        }
                        // line 48
                        echo "                        ";
                    } elseif (($this->getAttribute($context["item"], "field_type", []) == "select")) {
                        // line 49
                        echo "                            ";
                        echo $this->getAttribute($context["item"], "value_name", []);
                        echo "
                        ";
                    } else {
                        // line 51
                        echo "                            ";
                        echo $this->getAttribute($context["item"], "value", []);
                        echo "
                        ";
                    }
                    // line 53
                    echo "                    </label>
                </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
                echo "            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['module'], $context['module_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "            <div class=\"clearfix\"></div>
            <div class=\"ln_solid\"></div>
            <div class=\"col-xs-12\">
                <div class=\"compose-btn pull-left\">
                    <a class=\"btn btn-default\" href=\"";
            // line 62
            echo ($context["site_url"] ?? null);
            echo "admin/start/menu/system-items\">
                        ";
            // line 63
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_cancel"            ,"start"            ,            );
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
            // line 64
            echo "                    </a>
                </div>
            </div>
          </div>
        ";
        } elseif ((        // line 68
($context["section"] ?? null) == "numerics")) {
            // line 69
            echo "          <div class=\"x_content\">
            <form method=\"post\" enctype=\"multipart/form-data\" data-parsley-validate
                  class=\"form-horizontal form-label-left\" name=\"save_form\"
                  action=\"";
            // line 72
            echo $this->getAttribute(($context["data"] ?? null), "action", []);
            echo "\">

                <div class=\"accordion\" id=\"accordion1\" role=\"tablist\" aria-multiselectable=\"true\">



        ";
            // line 78
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["settings_data"] ?? null));
            foreach ($context['_seq'] as $context["module"] => $context["module_data"]) {
                // line 79
                echo "                    <div class=\"panel\">
                        <a class=\"panel-heading collapsed\" role=\"tab\" id=\"headingTwo";
                // line 80
                echo $context["module"];
                echo "\" data-toggle=\"collapse\" data-parent=\"#accordion1\" href=\"#collapseTwo";
                echo $context["module"];
                echo "\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                            <h4 class=\"panel-title\">";
                // line 81
                echo $this->getAttribute($context["module_data"], "name", []);
                echo "</h4>
                        </a>
                        <div id=\"collapseTwo";
                // line 83
                echo $context["module"];
                echo "\" class=\"panel-collapse collapse\" role=\"tabpanel\" aria-labelledby=\"headingTwo\" aria-expanded=\"false\" style=\"height: 0px;\">
                           <div class=\"panel-body\">

            ";
                // line 86
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module_data"], "vars", []));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    // line 87
                    echo "                                <div class=\"form-group\">
                                    <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
                                        ";
                    // line 89
                    echo $this->getAttribute($context["item"], "field_name", []);
                    echo ":
                                    </label>
                                    <div class=\"col-md-9 col-sm-9 col-xs-12\">
                                        <input type=\"text\" name=\"settings[";
                    // line 92
                    echo $context["module"];
                    echo "][";
                    echo $this->getAttribute($context["item"], "field", []);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", []));
                    echo "\" class=\"form-control\">
                                    </div>
                                </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 96
                echo "
                            </div>
                        </div>
                    </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['module'], $context['module_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "
                </div>

                <div class=\"ln_solid\"></div>

                ";
            // line 106
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_save"            ,"start"            ,""            ,"button"            ,            );
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
            $context['save_text'] = $result;
            // line 107
            echo "                <div class=\"form-group\">
                    <div class=\"col-md-9 col-sm-9 col-xs-12 col-md-offset-3 col-sm-offset-3\">
                        <input type=\"submit\" name=\"btn_save\" value=\"";
            // line 109
            echo ($context["save_text"] ?? null);
            echo "\" class=\"btn btn-success\">
                        <a class=\"btn btn-default\" href=\"";
            // line 110
            echo ($context["site_url"] ?? null);
            echo "admin/start/menu/system-items\">";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_cancel"            ,"start"            ,            );
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
                    </div>
                </div>
            </form>
          </div>
        ";
        } elseif ((        // line 115
($context["section"] ?? null) == "date_formats")) {
            // line 116
            echo "          <div class=\"x_content\">
            <table id=\"users\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">";
            // line 120
            echo $this->getAttribute(($context["settings_data"] ?? null), "name", []);
            echo "</th>
                        <th class=\"column-title\">";
            // line 121
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("example"            ,"start"            ,            );
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
";
            // line 123
            echo "                        <th class=\"column-title\">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                ";
            // line 127
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["settings_data"] ?? null), "vars", []));
            foreach ($context['_seq'] as $context["key"] => $context["var"]) {
                // line 128
                echo "                    ";
                $context["field"] = $this->getAttribute($context["var"], "field", []);
                // line 129
                echo "                    ";
                if ($this->getAttribute(($context["date_formats_pages"] ?? null), ($context["field"] ?? null))) {
                    // line 130
                    echo "                        <tr>
                            <td>";
                    // line 131
                    echo $this->getAttribute($context["var"], "field_name", []);
                    echo "</td>
                            <td>";
                    // line 132
                    echo $this->getAttribute($context["var"], "value", []);
                    echo "</td>
";
                    // line 145
                    echo "                            <td class=\"icons\">
                              <div class=\"btn-group\">
                                <a href=\"";
                    // line 147
                    echo ($context["site_url"] ?? null);
                    echo "admin/start/date_formats/";
                    echo ($context["field"] ?? null);
                    echo "\"
                                   class=\"btn btn-primary\">
                                    ";
                    // line 149
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("btn_edit"                    ,"start"                    ,                    );
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
                    // line 150
                    echo "                                </a>
                                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                        aria-haspopup=\"true\" aria-expanded=\"false\">
                                    <span class=\"caret\"></span>
                                    <span class=\"sr-only\">Toggle Dropdown</span>
                                </button>
                                <ul class=\"dropdown-menu\">
                                    <li>
                                      <a href=\"";
                    // line 158
                    echo ($context["site_url"] ?? null);
                    echo "admin/start/date_formats/";
                    echo ($context["field"] ?? null);
                    echo "\">
                                          ";
                    // line 159
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("btn_edit"                    ,"start"                    ,                    );
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
                    // line 160
                    echo "                                      </a>
                                    </li>
                                </ul>
                              </div>
                            </td>
                        </tr>
                    ";
                }
                // line 167
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['var'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 168
            echo "            </table>
          </div>

            ";
            // line 171
            $module =             null;
            $helper =             'utils';
            $name =             'jscript';
            $params = array(""            ,"easyTooltip.min.js"            ,            );
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
            // line 172
            echo "            <script type=\"text/javascript\">
                \$(function () {
                    \$(\".tooltip\").each(function () {
                        \$(this).easyTooltip({
                            useElement: 'tt_' + \$(this).attr('id'),
                            yOffset: \$('#tt_' + \$(this).attr('id')).height() / 2,
                            clickRemove: true
                        });
                    });
                });
            </script>
        ";
        } else {
            // line 184
            echo "          <div class=\"x_title\">
            <h2>";
            // line 185
            echo $this->getAttribute(($context["settings_data"] ?? null), "name", []);
            echo "</h2>
            <div class=\"clearfix\"></div>
          </div>
          <div class=\"x_content\">
            <form method=\"post\" enctype=\"multipart/form-data\" data-parsley-validate
                  class=\"form-horizontal form-label-left\" name=\"save_form\"
                  action=\"";
            // line 191
            echo $this->getAttribute(($context["data"] ?? null), "action", []);
            echo "\">
            ";
            // line 192
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["settings_data"] ?? null), "vars", []));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 193
                echo "                <div class=\"form-group\">
                    ";
                // line 194
                if ((($context["section"] ?? null) == "countries")) {
                    // line 195
                    echo "                        <label class=\"control-label col-sm-3 col-xs-12\">
                            ";
                    // line 196
                    echo $this->getAttribute($context["item"], "field_name", []);
                    echo ":</label>
                        <div class=\"col-md-9 col-sm-9 col-xs-12\">
                            <input type=\"text\" name=\"settings[";
                    // line 198
                    echo $this->getAttribute($context["item"], "field", []);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", []));
                    echo "\" class=\"form-control\"><br>
                            <i>";
                    // line 199
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array(($this->getAttribute(($context["item"] ?? null), "field", []) . "_settings_descr")                    ,"countries"                    ,                    );
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
                    echo "</i>
                        </div>
                    ";
                } else {
                    // line 202
                    echo "                        <label class=\"control-label col-sm-3 col-xs-12\">
                          ";
                    // line 203
                    echo $this->getAttribute($context["item"], "field_name", []);
                    echo ":</label>
                        <div class=\"col-md-9 col-sm-9 col-xs-12\">
                            ";
                    // line 205
                    if ((($this->getAttribute($context["item"], "field_type", []) == "text") ||  !$this->getAttribute($context["item"], "field_type", []))) {
                        // line 206
                        echo "                                <input type=\"text\" name=\"settings[";
                        echo $this->getAttribute($context["item"], "field", []);
                        echo "]\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", []));
                        echo "\" class=\"form-control\">
                            ";
                    } elseif (($this->getAttribute(                    // line 207
$context["item"], "field_type", []) == "checkbox")) {
                        // line 208
                        echo "                                <input type=\"checkbox\" name=\"settings[";
                        echo $this->getAttribute($context["item"], "field", []);
                        echo "]\" value=\"1\" ";
                        if ($this->getAttribute($context["item"], "value", [])) {
                            echo "checked";
                        }
                        echo " class=\"flat\">
                            ";
                    } elseif (($this->getAttribute(                    // line 209
$context["item"], "field_type", []) == "select")) {
                        // line 210
                        echo "                                <select name=\"settings[";
                        echo $this->getAttribute($context["item"], "field", []);
                        echo "]\" class=\"form-control\">
                                    ";
                        // line 211
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["item"], "field_values", []));
                        foreach ($context['_seq'] as $context["key"] => $context["field_value"]) {
                            // line 212
                            echo "                                        <option value=\"";
                            echo $context["key"];
                            echo "\"";
                            if (($this->getAttribute($context["item"], "value", []) == $context["key"])) {
                                echo " selected";
                            }
                            echo ">
                                            ";
                            // line 213
                            $module =                             null;
                            $helper =                             'lang';
                            $name =                             'l';
                            $params = array((((((($context["section"] ?? null) . "_") . $this->getAttribute(($context["item"] ?? null), "field", [])) . "_") . ($context["field_value"] ?? null)) . "_value")                            ,"start"                            ,                            );
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
                            // line 214
                            echo "                                        </option>
                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['field_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 216
                        echo "                                </select>
                            ";
                    }
                    // line 218
                    echo "                        </div>
                    ";
                }
                // line 220
                echo "                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 222
            echo "                <div class=\"ln_solid\"></div>
                <div class=\"form-group\">
                    <div class=\"col-md-9 col-sm-9 col-xs-12 col-md-offset-3 col-sm-offset-3\">
                        <input type=\"submit\" name=\"btn_save\" value=\"";
            // line 225
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_save"            ,"start"            ,""            ,"button"            ,            );
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
            echo "\" class=\"btn btn-success\">
                        <a class=\"btn btn-default\" href=\"";
            // line 226
            echo ($context["site_url"] ?? null);
            echo "admin/start/menu/system-items\">";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_cancel"            ,"start"            ,            );
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
                    </div>
                </div>
            </form>
          </div>
        ";
        }
        // line 232
        echo "    </div>
</div>
<div class=\"clearfix\"></div>

";
        // line 236
        $this->loadTemplate("@app/footer.twig", "numerics_list.twig", 236)->display($context);
    }

    public function getTemplateName()
    {
        return "numerics_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  852 => 236,  846 => 232,  816 => 226,  793 => 225,  788 => 222,  781 => 220,  777 => 218,  773 => 216,  766 => 214,  745 => 213,  736 => 212,  732 => 211,  727 => 210,  725 => 209,  716 => 208,  714 => 207,  707 => 206,  705 => 205,  700 => 203,  697 => 202,  672 => 199,  666 => 198,  661 => 196,  658 => 195,  656 => 194,  653 => 193,  649 => 192,  645 => 191,  636 => 185,  633 => 184,  619 => 172,  598 => 171,  593 => 168,  587 => 167,  578 => 160,  557 => 159,  551 => 158,  541 => 150,  520 => 149,  513 => 147,  509 => 145,  505 => 132,  501 => 131,  498 => 130,  495 => 129,  492 => 128,  488 => 127,  482 => 123,  459 => 121,  455 => 120,  449 => 116,  447 => 115,  418 => 110,  414 => 109,  410 => 107,  389 => 106,  382 => 101,  372 => 96,  358 => 92,  352 => 89,  348 => 87,  344 => 86,  338 => 83,  333 => 81,  327 => 80,  324 => 79,  320 => 78,  311 => 72,  306 => 69,  304 => 68,  298 => 64,  277 => 63,  273 => 62,  267 => 58,  260 => 56,  252 => 53,  246 => 51,  240 => 49,  237 => 48,  234 => 47,  212 => 46,  209 => 45,  187 => 44,  184 => 43,  182 => 42,  177 => 40,  174 => 39,  170 => 38,  166 => 37,  163 => 36,  158 => 35,  151 => 33,  143 => 30,  137 => 28,  131 => 26,  128 => 25,  125 => 24,  103 => 23,  100 => 22,  78 => 21,  75 => 20,  73 => 19,  68 => 17,  65 => 16,  61 => 15,  57 => 14,  54 => 13,  50 => 12,  47 => 11,  45 => 10,  41 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "numerics_list.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella/numerics_list.twig");
    }
}
