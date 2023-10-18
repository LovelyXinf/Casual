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

/* permissions.twig */
class __TwigTemplate_8fdc853285bb05b3ea948e936644b0b9e2e62151cd0a4e149c0c230ab3041c8b extends \Twig\Template
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
        echo "<a href=\"javascript:;\" id=\"permissions\">
    ";
        // line 2
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_permissions"        ,"moderators"        ,        );
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
        // line 3
        echo "</a>
<div id=\"permissions-value\">
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["methods"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["module_group"]) {
            // line 6
            echo "        
        ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module_group"], "methods", []));
            foreach ($context['_seq'] as $context["index"] => $context["item"]) {
                // line 8
                echo "            ";
                if ($this->getAttribute($context["item"], "checked", [])) {
                    // line 9
                    echo "                <input type=\"hidden\" name=\"permission_data[";
                    echo $this->getAttribute($context["item"], "module", []);
                    echo "][";
                    echo $this->getAttribute($context["item"], "method", []);
                    echo "]\" value=\"1\">
            ";
                }
                // line 11
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['index'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['module_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "</div>

<script type=\"text/javascript\">
    \$(function(){
        var permissions = {};
        var permissionsCopy = {};
        var permissionsNames = {};

        var windowObj = new loadingContent({
            loadBlockSize: 'big',
            closeBtnID: 'edit_permissions_close',
            closeBtnLabel: '";
        // line 25
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_done"        ,"start"        ,""        ,"js"        ,        );
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
        echo "'
        });

        ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["methods"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["module_group"]) {
            // line 29
            echo "                permissionsNames['";
            echo $context["key"];
            echo "'] = {};
                permissions['";
            // line 30
            echo $context["key"];
            echo "'] = {};
                var mg_methods_checked = 0;
                var mg_methods_cnt = 0;
            ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module_group"], "methods", []));
            foreach ($context['_seq'] as $context["index"] => $context["item"]) {
                // line 34
                echo "                if (typeof permissions['";
                echo $context["key"];
                echo "']['";
                echo $this->getAttribute($context["item"], "module", []);
                echo "'] == \"undefined\") {
                    permissions['";
                // line 35
                echo $context["key"];
                echo "']['";
                echo $this->getAttribute($context["item"], "module", []);
                echo "'] = {};
                    permissionsNames['";
                // line 36
                echo $context["key"];
                echo "']['";
                echo $this->getAttribute($context["item"], "module", []);
                echo "'] = {};
                }                                 
                mg_methods_cnt++;
                ";
                // line 39
                if ($this->getAttribute($context["item"], "checked", [])) {
                    echo "mg_methods_checked++;";
                }
                // line 40
                echo "                
                permissions['";
                // line 41
                echo $context["key"];
                echo "']['";
                echo $this->getAttribute($context["item"], "module", []);
                echo "']['";
                echo $this->getAttribute($context["item"], "method", []);
                echo "'] = ";
                if ($this->getAttribute($context["item"], "checked", [])) {
                    echo "true";
                } else {
                    echo "false";
                }
                echo ";
                permissionsNames['";
                // line 42
                echo $context["key"];
                echo "']['";
                echo $this->getAttribute($context["item"], "module", []);
                echo "']['";
                echo $this->getAttribute($context["item"], "method", []);
                echo "'] = \"";
                echo $this->getAttribute($context["item"], "name", []);
                echo "\";          
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['index'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "                
            if (mg_methods_cnt === mg_methods_checked) {
                permissions['";
            // line 46
            echo $context["key"];
            echo "']['";
            echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "main", []), "method", []);
            echo "'] = true;
            }    
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['module_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
        \$('#permissions').bind('click', function() {
            permissionsCopy = permissions;
            windowObj.show_load_block(
                '<form id=\"permissions-form\">' +
                '   <div class=\"content-block load_content\">' +
                '       <h1>";
        // line 55
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_permissions"        ,"moderators"        ,        );
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
        echo "</h1>' +
                '       <div class=\"container\">' +
                '           <div class=\"row\">' +
            ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["methods"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["module_group"]) {
            // line 59
            echo "                '               <div class=\"col-md-4 col-sm-6 col-xs-12 permissions\">' +
                '                   <input type=\"checkbox\" name=\"permission_data[";
            // line 60
            echo $context["key"];
            echo "][";
            echo $this->getAttribute($this->getAttribute($context["module_group"], "main", []), "method", []);
            echo "]\"' +
                '                       value=1' + (permissions['";
            // line 61
            echo $context["key"];
            echo "']['";
            echo $this->getAttribute($this->getAttribute($context["module_group"], "main", []), "method", []);
            echo "'] ? ' checked' : '') + ' id=\"pd_";
            echo $context["key"];
            echo "\" class=\"flat js-permissions-group\" data-key=\"";
            echo $context["key"];
            echo "\" data-method=\"";
            echo $this->getAttribute($this->getAttribute($context["module_group"], "main", []), "method", []);
            echo "\" data-main=\"\">' +
                '                   <label for=\"pd_";
            // line 62
            echo $context["key"];
            echo "\"><b>";
            echo $this->getAttribute($this->getAttribute($context["module_group"], "module", []), "module_name", []);
            echo "</b></label><br>' +
                '                   <ul class=\"permissions_edit\">' +
                ";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module_group"], "methods", []));
            foreach ($context['_seq'] as $context["index"] => $context["item"]) {
                // line 65
                echo "                    ";
                if ((strval($context["index"]) != "main")) {
                    // line 66
                    echo "                '                       <li>' +
                '                           <input type=\"checkbox\" name=\"permission_data[";
                    // line 67
                    echo $this->getAttribute($context["item"], "module", []);
                    echo "][";
                    echo $this->getAttribute($context["item"], "method", []);
                    echo "]\"' +
                '                               value=1' + (permissions['";
                    // line 68
                    echo $context["key"];
                    echo "']['";
                    echo $this->getAttribute($context["item"], "module", []);
                    echo "']['";
                    echo $this->getAttribute($context["item"], "method", []);
                    echo "'] ? ' checked' : '') + ' id=\"pd_";
                    echo $context["key"];
                    echo "_";
                    echo $this->getAttribute($context["item"], "module", []);
                    echo "_";
                    echo $this->getAttribute($context["item"], "method", []);
                    echo "\" class=\"flat\"' +
                '                               data-key=\"";
                    // line 69
                    echo $context["key"];
                    echo "\" data-module=\"";
                    echo $this->getAttribute($context["item"], "module", []);
                    echo "\" data-method=\"";
                    echo $this->getAttribute($context["item"], "method", []);
                    echo "\" data-main=\"method_group_";
                    echo $context["key"];
                    echo "\">' +
                '                           <label for=\"pd_";
                    // line 70
                    echo $this->getAttribute($context["item"], "module", []);
                    echo "_";
                    echo $this->getAttribute($context["item"], "method", []);
                    echo "\">' + \"";
                    echo $this->getAttribute($context["item"], "name", []);
                    echo "\" + '</label>' +
                '                       </li>' +
                    ";
                }
                // line 73
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['index'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "                '                   </ul>' +
                '                </div>' +
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['module_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "                '           </div>' +
                '       </div>' +

                '       <!-- div class=\"ln_solid\"></div>' +

                '       <div class=\"model-footer\">' +
                '           <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" id=\"edit_permissions_close\">' +
                '               ";
        // line 84
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_done"        ,"start"        ,""        ,"js"        ,        );
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
        echo "' +
                '           </button>' +
                '       </div -->' +
                '   </div>' +
                '</form>'
            );

            \$('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            }).on('ifClicked', function(event) {
                \$(this).trigger('click');
            }).on('ifChanged', function(event) {
                \$(this).trigger('change');
            }).on('ifChecked', function() {
                \$(this).attr('checked', 'checked');
            }).on('ifUnchecked', function() {
                \$(this).removeAttr('checked');            
            });
        });

        \$(document).off('change', '.permissions input[type=checkbox]').on('change', '.permissions input[type=checkbox]', function() {
            var item = \$(this);
            if (item.hasClass('js-permissions-group')) {
                if (item.is(':checked')) {                    
                    \$('.permissions').find('[data-main=method_group_' + item.data('key') + ']').each(function(index, item) {
                        var item = \$(item);
                        item.iCheck('check');      
                        permissionsCopy[item.data('key')][item.data('module')][item.data('method')] = item.prop('checked');
                    });
                } else {
                    \$('.permissions').find('[data-main=method_group_' + item.data('key') + ']').each(function(index, item) {
                        var item = \$(item);
                        item.iCheck('uncheck');
                        permissionsCopy[item.data('key')][item.data('module')][item.data('method')] = item.prop('checked');
                    });
                }
            } else {       
                permissionsCopy[item.data('key')][item.data('module')][item.data('method')] = item.prop('checked');
                
                var checked_cnt = 0;
                var unchecked_cnt = 0;
                var methods_cnt = 0;
                \$('.permissions').find('[data-main=method_group_' + item.data('key') + ']').each(function(index, method) {
                    var method = \$(method);
                    if (method.prop('checked')) {
                        checked_cnt++;
                    } else {
                        unchecked_cnt++;
                    }
                    methods_cnt++;    
                });
                if (methods_cnt == checked_cnt) {
                    \$('#pd_' + item.data('key')).iCheck('check');
                }    
                if (methods_cnt == unchecked_cnt) {
                    \$('#pd_' + item.data('key')).iCheck('uncheck');
                }    
            }    
        });

        \$(document).off('click', '#edit_permissions_close').on('click', '#edit_permissions_close', function() {
            permissions = permissionsCopy;

            var names = [];
            var values = '';
            for (var key in permissions) {
                for (var module in permissions[key]) {
                    for (var method in permissions[key][module]) {
                        if (permissions[key][module][method]) {
                            names.push(permissionsNames[key][module][method]);
                            values += '<input type=\"hidden\" name=\"permission_data[' + module + '][' + method + ']\" value=\"1\">';
                        }
                    }    
                }
            }

            if (names.length > 0) {
                \$('#permissions').html(names.join('; '));
            } else {
                \$('#permissions').html('";
        // line 164
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_permissions"        ,"moderators"        ,""        ,"js"        ,        );
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
        echo "');
            }

            \$('#permissions-value').html(values);

            windowObj.hide_load_block();
        });

        var names = [];
        for (var key in permissions) {
            for (var module in permissions[key]) {                    
                for (var method in permissions[key][module]) {                         
                    if (permissions[key][module][method]) {
                        names.push(permissionsNames[key][module][method]);
                    }
                }    
            }
        }

        if (names.length > 0) {
            \$('#permissions').html(names.join('; '));
        } else {
            \$('#permissions').html('";
        // line 186
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_permissions"        ,"moderators"        ,""        ,"js"        ,        );
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
        echo "');
        }
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "permissions.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  505 => 186,  461 => 164,  359 => 84,  350 => 77,  342 => 74,  336 => 73,  326 => 70,  316 => 69,  302 => 68,  296 => 67,  293 => 66,  290 => 65,  286 => 64,  279 => 62,  267 => 61,  261 => 60,  258 => 59,  254 => 58,  229 => 55,  221 => 49,  210 => 46,  206 => 44,  192 => 42,  178 => 41,  175 => 40,  171 => 39,  163 => 36,  157 => 35,  150 => 34,  146 => 33,  140 => 30,  135 => 29,  131 => 28,  106 => 25,  93 => 14,  86 => 12,  80 => 11,  72 => 9,  69 => 8,  65 => 7,  62 => 6,  58 => 5,  54 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "permissions.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/moderators/views/gentelella/permissions.twig");
    }
}
