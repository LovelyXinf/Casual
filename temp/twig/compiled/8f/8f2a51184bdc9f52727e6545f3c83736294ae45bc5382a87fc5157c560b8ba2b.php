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

/* items_ds.twig */
class __TwigTemplate_7f33c4a324bacdecefe49d6aa90e28cb3c660e14e8a6efb5338d61a69531bc2b extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "items_ds.twig", 1)->display(twig_array_merge($context, ["load_type" => "editable|ui"]));
        // line 2
        echo "
<div>
    <div>
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
            echo "admin/languages/ds_items/";
            echo $context["lang_id"];
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "/";
            echo ($context["current_gid"] ?? null);
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

        <div class=\"x_content\" id=\"ds_items\">
            ";
        // line 27
        if ( !$this->getAttribute(($context["current_module"] ?? null), "is_disabled_action_ds", [])) {
            // line 28
            echo "                <div class=\"btn-group\">
                    <a href=\"";
            // line 29
            echo ($context["site_url"] ?? null);
            echo "admin/languages/ds_items_edit/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "/";
            echo ($context["current_gid"] ?? null);
            echo "\" class=\"btn btn-primary\">
                        ";
            // line 30
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_add_ds_item"            ,"languages"            ,            );
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
            // line 31
            echo "                    </a>
                    <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                            aria-haspopup=\"true\" aria-expanded=\"false\">
                        <span class=\"caret\"></span>
                        <span class=\"sr-only\">Toggle Dropdown</span>
                    </button>
                    <ul class=\"dropdown-menu\">
                        <li>
                            <a href=\"";
            // line 39
            echo ($context["site_url"] ?? null);
            echo "admin/languages/ds_items_edit/";
            echo ($context["current_lang_id"] ?? null);
            echo "/";
            echo ($context["current_module_id"] ?? null);
            echo "/";
            echo ($context["current_gid"] ?? null);
            echo "\">
                                ";
            // line 40
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_add_ds_item"            ,"languages"            ,            );
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
            echo "                            </a>
                        </li>
                        <li>
                            <a href=\"#\" onclick=\"javascript: mlSorter.update_sorting();
                                    return false;\">
                                ";
            // line 46
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_resort_items"            ,"languages"            ,            );
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
            echo "                            </a>
                        </li>
                    </ul>
                </div>
            ";
        }
        // line 52
        echo "            <ul name=\"parent_0\" class=\"sort connected\" id=\"clsr0ul\">
                ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["reference"] ?? null), "option", []));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 54
            echo "                    <li id=\"item_";
            echo $context["key"];
            echo "\" class=\"editable-languages-only x_panel\">
                        <div class=\"icons pull-right\">
                            ";
            // line 56
            if ( !$this->getAttribute(($context["current_module"] ?? null), "is_disabled_action_ds", [])) {
                // line 57
                echo "                                <div class=\"btn-group\">
                                    <a href=\"";
                // line 58
                echo ($context["site_url"] ?? null);
                echo "admin/languages/ds_items_edit/";
                echo ($context["current_lang_id"] ?? null);
                echo "/";
                echo ($context["current_module_id"] ?? null);
                echo "/";
                echo ($context["current_gid"] ?? null);
                echo "/";
                echo $context["key"];
                echo "\"
                                       class=\"btn btn-primary\">
                                        ";
                // line 60
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_edit"                ,"start"                ,                );
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
                echo "                                    </a>
                                    <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                            aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <span class=\"caret\"></span>
                                        <span class=\"sr-only\">Toggle Dropdown</span>
                                    </button>
                                    <ul class=\"dropdown-menu\">
                                        <li>
                                            <a href=\"";
                // line 69
                echo ($context["site_url"] ?? null);
                echo "admin/languages/ds_items_edit/";
                echo ($context["current_lang_id"] ?? null);
                echo "/";
                echo ($context["current_module_id"] ?? null);
                echo "/";
                echo ($context["current_gid"] ?? null);
                echo "/";
                echo $context["key"];
                echo "\">
                                                ";
                // line 70
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_edit"                ,"start"                ,                );
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
                echo "                                            </a>
                                        </li>
                                        <li>
                                            <a onclick=\"if (confirm('";
                // line 74
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_delete_ds_item"                ,"languages"                ,""                ,"js"                ,                );
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
                                                    mlSorter.deleteItem('";
                // line 75
                echo $context["key"];
                echo "');
                                                return false;\" href=\"javascript:;\">
                                                ";
                // line 77
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_delete"                ,"start"                ,                );
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
                // line 78
                echo "                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            ";
            }
            // line 83
            echo "                        </div>
                        <div class=\"editable\" id=\"";
            // line 84
            echo $context["key"];
            echo "\">";
            echo $context["item"];
            echo "</div>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "            </ul>
        </div>
    </div>
</div>

<script>
    var change_url = '";
        // line 93
        echo ($context["site_url"] ?? null);
        echo "admin/languages/ajax_ds_item_save/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "/";
        echo ($context["current_gid"] ?? null);
        echo "';
    var mlSorter;
    \$(function () {
        \$('.editable').editable(change_url, {
            tooltip: '";
        // line 97
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
        // line 98
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
            name: 'text',
            submit: 'Save',
            cancel: 'Cancel',
            height: 'auto',
            width: 300,
            cssclass: 'jeditable-form',
            callback: function (value, settings) {
                \$(this).html(settings.current);
            }
        });
        mlSorter = new multilevelSorter({
            siteUrl: '";
        // line 110
        echo ($context["site_url"] ?? null);
        echo "',
            itemsBlockID: 'pages',
            urlSaveSort: 'admin/languages/ajax_ds_item_save_sorter/";
        // line 112
        echo ($context["current_module_id"] ?? null);
        echo "/";
        echo ($context["current_gid"] ?? null);
        echo "/',
            urlDeleteItem: 'admin/languages/ajax_ds_item_delete/";
        // line 113
        echo ($context["current_module_id"] ?? null);
        echo "/";
        echo ($context["current_gid"] ?? null);
        echo "/',
//\t\tsuccess: function(data){
//\t\t\tlocation.href = '";
        // line 115
        echo ($context["site_url"] ?? null);
        echo "admin/languages/ds_items/";
        echo ($context["current_lang_id"] ?? null);
        echo "/";
        echo ($context["current_module_id"] ?? null);
        echo "/";
        echo ($context["current_gid"] ?? null);
        echo "';
//\t\t}
        });
    });
</script>
";
        // line 120
        $this->loadTemplate("@app/footer.twig", "items_ds.twig", 120)->display($context);
    }

    public function getTemplateName()
    {
        return "items_ds.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  505 => 120,  491 => 115,  484 => 113,  478 => 112,  473 => 110,  439 => 98,  416 => 97,  403 => 93,  395 => 87,  384 => 84,  381 => 83,  374 => 78,  353 => 77,  348 => 75,  325 => 74,  320 => 71,  299 => 70,  287 => 69,  277 => 61,  256 => 60,  243 => 58,  240 => 57,  238 => 56,  232 => 54,  228 => 53,  225 => 52,  218 => 47,  197 => 46,  190 => 41,  169 => 40,  159 => 39,  149 => 31,  128 => 30,  118 => 29,  115 => 28,  113 => 27,  106 => 22,  97 => 19,  91 => 18,  81 => 17,  75 => 16,  72 => 15,  68 => 14,  61 => 9,  40 => 8,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "items_ds.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/languages/views/gentelella/items_ds.twig");
    }
}
