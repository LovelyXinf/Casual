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

/* edit_form.twig */
class __TwigTemplate_c91bd6f4fc255e37ce6b21d5408035930fe44096e8049991636de9174f30c9a0 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "edit_form.twig", 1)->display(twig_array_merge($context, ["load_type" => "editable|ui"]));
        // line 2
        $module =         null;
        $helper =         'utils';
        $name =         'jscript';
        $params = array(""        ,"xss.js"        ,        );
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
        echo "
<form class=\"x_panel form-horizontal accordion\" method=\"post\" action=\"";
        // line 4
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\">
\t<div class=\"x_content\">
\t\t<div class=\"row form-group\">
\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t";
        // line 8
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_default_link"        ,"seo_advanced"        ,        );
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
        echo ": </label>
\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">
\t\t\t\t";
        // line 10
        ob_start();
        // line 11
        echo "\t\t\t\t";
        echo ($context["site_url"] ?? null);
        echo ($context["module_gid"] ?? null);
        echo "/";
        echo ($context["method"] ?? null);
        echo "
\t\t\t\t";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["default_settings"] ?? null), "url_vars", []));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            echo "/[";
            echo $context["key"];
            echo "]";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["default_settings"] ?? null), "url_postfix", []));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            echo "/[";
            echo $context["key"];
            echo "]";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "\t\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 15
        echo "\t\t\t</div>
\t\t</div>
\t\t<div class=\"row form-group\">
\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t";
        // line 19
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("url_manager"        ,"seo_advanced"        ,        );
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
        echo ": </label>
\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t<input type=\"hidden\" name=\"url_template_data\" id=\"url_data\" value=\"\">
\t\t\t\t<ul class=\"url-creator to_do\" id=\"url_block\" style=\"display: flex;\"></ul>
\t\t\t\t<div id=\"url_text_edit\" class=\"url-form hide\">
\t\t\t\t\t<b>";
        // line 24
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("action_edit_url_block"        ,"seo_advanced"        ,        );
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
        echo ":</b>
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t";
        // line 27
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_url_block_type"        ,"seo_advanced"        ,        );
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
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">
\t\t\t\t\t\t\t";
        // line 29
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_url_block_type_text"        ,"seo_advanced"        ,        );
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
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t";
        // line 34
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_url_block_value"        ,"seo_advanced"        ,        );
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
        echo "</label>
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">
\t\t\t\t\t\t\t<input type=\"text\" value=\"\" id=\"text_block_value_edit\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">&nbsp;</label>
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t\t\t\t<input class=\"btn btn-success\" type=\"button\" id=\"text_block_save\" name=\"add-block\" value=\"";
        // line 42
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_save"        ,"start"        ,""        ,"button"        ,        );
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
\t\t\t\t\t\t\t<input class=\"btn btn-default\" type=\"button\" id=\"text_block_delete\" name=\"delete-block\" value=\"";
        // line 43
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_delete"        ,"start"        ,""        ,"button"        ,        );
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
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"url_tpl_edit\" class=\"url-form hide\">
\t\t\t\t\t<b>";
        // line 49
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("action_edit_url_block"        ,"seo_advanced"        ,        );
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
        echo ":</b>
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t";
        // line 52
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_url_block_type"        ,"seo_advanced"        ,        );
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
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">
\t\t\t\t\t\t\t";
        // line 54
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_url_block_type_tpl"        ,"seo_advanced"        ,        );
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
        // line 55
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t";
        // line 59
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_url_block_replacement"        ,"seo_advanced"        ,        );
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
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\" id=\"tpl_block_var_name\">&nbsp;</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t";
        // line 64
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_url_block_default"        ,"seo_advanced"        ,        );
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
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">
\t\t\t\t\t\t\t<input type=\"text\" value=\"\" id=\"tpl_block_var_default\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">&nbsp;</label>
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t\t\t\t<input class=\"btn btn-success\" type=\"button\" id=\"tpl_block_save\" name=\"add-block\" value=\"";
        // line 72
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_save"        ,"start"        ,""        ,"button"        ,        );
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
\t\t\t\t\t\t\t<input class=\"btn btn-default\" type=\"button\" id=\"tpl_block_delete\" name=\"delete-block\" value=\"";
        // line 73
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_delete"        ,"start"        ,""        ,"button"        ,        );
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
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"url-form\">
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t";
        // line 81
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_url_block_text"        ,"seo_advanced"        ,        );
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
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t\t\t\t<div class=\"form-inline\">
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"text_block_value\" class=\"form-control\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t<input class=\"btn btn-success\" type=\"button\" name=\"add-block\" value=\"";
        // line 88
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_add"        ,"start"        ,""        ,"button"        ,        );
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
        echo "\"  onclick=\"javascript: urlCreator.save_block('', 'text', \$('#text_block_value').val(), '', '', '');\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t";
        // line 94
        if ($this->getAttribute(($context["default_settings"] ?? null), "optional", [])) {
            // line 95
            echo "\t\t\t\t<div class=\"url-form\">
\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t\t\t\t";
            // line 98
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_add_url_block_opt"            ,"seo_advanced"            ,            );
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
\t\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t\t\t";
            // line 100
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["default_settings"] ?? null), "optional", []));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 101
                echo "\t\t\t\t\t\t    ";
                if ((($context["optcounter"] ?? null) > 0)) {
                    echo "<br><span class=\"or\">";
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("link_or"                    ,"seo_advanced"                    ,                    );
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
                    echo "</span><br>";
                }
                // line 102
                echo "\t\t\t\t\t\t\t\t<div class=\"form-inline\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
                    [<select id=\"opt-";
                // line 104
                echo $context["key"];
                echo "\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
                // line 105
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["item"]);
                foreach ($context['_seq'] as $context["varname"] => $context["type"]) {
                    // line 106
                    echo "                    <option value=\"";
                    echo $context["type"];
                    echo "\">";
                    echo $context["varname"];
                    echo "</option>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['varname'], $context['type'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 108
                echo "                    </select>|<input type=\"text\" class=\"form-control\" id=\"optdef-";
                echo twig_escape_filter($this->env, $context["key"]);
                echo "\">]
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
                    <input type=\"button\" class=\"btn btn-success\" name=\"add-block\" value=\"";
                // line 111
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_add"                ,"start"                ,""                ,"button"                ,                );
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
                echo "\" onclick=\"javascript: addOptBlock('";
                echo $context["key"];
                echo "', '";
                echo ($context["optcounter"] ?? null);
                echo "');\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 115
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 119
        echo "\t\t\t</div>
\t\t\t<div class=\"clearfix\"></div>
\t\t</div>

\t\t<div class=\"row form-group\">
\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">&nbsp;</label>
\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t";
        // line 126
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("url_manager_text"        ,"seo_advanced"        ,        );
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
        // line 127
        echo "\t\t\t</div>
\t\t</div>
\t</div>
\t<br>

\t<div class=\"x_content\">
\t\t";
        // line 133
        if ($this->getAttribute(($context["default_settings"] ?? null), "templates", [])) {
            // line 134
            echo "\t\t<div class=\"row form-group\">
\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 135
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_templates"            ,"seo_advanced"            ,            );
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
            echo ": </label>
\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t";
            // line 137
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["default_settings"] ?? null), "templates", []));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 138
                echo "                    <b>[";
                echo $context["item"];
                echo "<span class=\"hide_text\">|";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("default_value"                ,"seo_advanced"                ,                );
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
                echo "</span>]</b>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 139
            echo "<br><br><i>";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_templates_text"            ,"seo_advanced"            ,            );
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
\t\t\t</div>
\t\t</div>
\t\t<br>
\t\t";
        }
        // line 144
        echo "
\t\t<div class=\"panel\">
\t\t\t<a class=\"row form-group panel-heading collapsed\" id=\"headingOne\" data-toggle=\"collapse\" href=\"#collapseOne\">
\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\"><b>";
        // line 147
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_title_default"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">";
        // line 148
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_title"        ,"seo_advanced"        ,        );
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
        echo "</div>
\t\t\t</a>
\t\t\t<div class=\"panel-collapse collapse\" id=\"collapseOne\">
\t\t\t\t";
        // line 151
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 152
            echo "\t\t\t\t";
            $context["section_gid"] = ("meta_" . $context["key"]);
            // line 153
            echo "\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 154
            echo $this->getAttribute($context["item"], "name", []);
            echo ":</label>
\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t\t\t<input type=\"text\" value=\"";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user_settings"] ?? null), ($context["section_gid"] ?? null), [], "array"), "title", []));
            echo "\" name=\"title[";
            echo $context["key"];
            echo "]\" class=\"form-control\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"panel\">
\t\t\t<a class=\"row form-group panel-heading collapsed\" id=\"headingTwo\" data-toggle=\"collapse\" href=\"#collapseTwo\">
\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\"><b>";
        // line 166
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_keyword_default"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">";
        // line 167
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_keyword"        ,"seo_advanced"        ,        );
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
        echo "</div>
\t\t\t</a>
\t\t\t<div class=\"panel-collapse collapse\" id=\"collapseTwo\">
\t\t\t\t";
        // line 170
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 171
            echo "\t\t\t\t";
            $context["section_gid"] = ("meta_" . $context["key"]);
            // line 172
            echo "\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 173
            echo $this->getAttribute($context["item"], "name", []);
            echo ": </label>
\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t\t\t<textarea class=\"form-control\" name=\"keyword[";
            // line 175
            echo twig_escape_filter($this->env, $context["key"]);
            echo "]\" rows=\"5\" cols=\"80\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user_settings"] ?? null), ($context["section_gid"] ?? null), [], "array"), "keyword", []));
            echo "</textarea>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 179
        echo "\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"panel\">
\t\t\t<a class=\"row form-group panel-heading collapsed\" id=\"headingThree\" data-toggle=\"collapse\" href=\"#collapseThree\">
\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\"><b>";
        // line 185
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_description_default"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">";
        // line 186
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_description"        ,"seo_advanced"        ,        );
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
        echo "</div>
\t\t\t</a>
\t\t\t<div class=\"panel-collapse collapse\" id=\"collapseThree\">
\t\t\t\t";
        // line 189
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 190
            echo "\t\t\t\t";
            $context["section_gid"] = ("meta_" . $context["key"]);
            // line 191
            echo "\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 192
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_description"            ,"seo_advanced"            ,            );
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
            echo "(";
            echo $this->getAttribute($context["item"], "name", []);
            echo "): </label>
\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\"><textarea class=\"form-control\" name=\"description[";
            // line 193
            echo $context["key"];
            echo "]\" rows=\"5\" cols=\"80\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user_settings"] ?? null), ($context["section_gid"] ?? null), [], "array"), "description", []));
            echo "</textarea></div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 196
        echo "\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"panel\">
\t\t\t<a class=\"row form-group panel-heading collapsed\" id=\"headingFour\" data-toggle=\"collapse\" href=\"#collapseFour\">
\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\"><b>";
        // line 202
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_header_default"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">";
        // line 203
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_header"        ,"seo_advanced"        ,        );
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
        echo "</div>
\t\t\t</a>
\t\t\t<div class=\"panel-collapse collapse\" id=\"collapseFour\">
\t\t\t\t";
        // line 206
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 207
            echo "\t\t\t\t";
            $context["section_gid"] = ("meta_" . $context["key"]);
            // line 208
            echo "\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 209
            echo $this->getAttribute($context["item"], "name", []);
            echo ": </label>
\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\"><input type=\"text\" name=\"header[";
            // line 210
            echo $context["key"];
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user_settings"] ?? null), ($context["section_gid"] ?? null), [], "array"), "header", []));
            echo "\" class=\"form-control\"></div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 213
        echo "\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"row form-group\">
\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t<b>";
        // line 219
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_noindex_use"        ,"seo_advanced"        ,        );
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
        echo "</b>: </label>
\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">
\t\t\t\t<input type=\"checkbox\" value=\"1\" name=\"noindex\" ";
        // line 221
        if ($this->getAttribute(($context["user_settings"] ?? null), "noindex", [])) {
            echo "checked";
        }
        // line 222
        echo "\t\t\t\tid=\"default_noindex\" class=\"checked-tags flat\" checked-param=\"noindex\">
\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"row form-group\">
\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">
\t\t\t\t<b>";
        // line 229
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_section_og"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">
\t\t\t\t";
        // line 231
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_og"        ,"seo_advanced"        ,        );
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
        // line 232
        echo "\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"panel\">
\t\t\t<a class=\"row form-group panel-heading collapsed\" id=\"headingFive\" data-toggle=\"collapse\" href=\"#collapseFive\">
\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\"><b>";
        // line 238
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_og_title_default"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">";
        // line 239
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_og_title"        ,"seo_advanced"        ,        );
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
        echo "</div>
\t\t\t</a>
\t\t\t<div class=\"panel-collapse collapse\" id=\"collapseFive\">
\t\t\t\t";
        // line 242
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 243
            echo "\t\t\t\t";
            $context["section_gid"] = ("og_" . $context["key"]);
            // line 244
            echo "\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 245
            echo $this->getAttribute($context["item"], "name", []);
            echo ": </label>
\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\"><input type=\"text\" name=\"og_title[";
            // line 246
            echo $context["key"];
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user_settings"] ?? null), ($context["section_gid"] ?? null), [], "array"), "og_title", []));
            echo "\" class=\"form-control\"></div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 249
        echo "\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"panel\">
\t\t\t<div class=\"row form-group panel-heading collapsed\" id=\"headingSix\" data-toggle=\"collapse\" href=\"#collapseSix\">
\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\"><b>";
        // line 255
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_og_type_default"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">";
        // line 256
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_og_type"        ,"seo_advanced"        ,        );
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
        echo "</div>
\t\t\t</div>
\t\t\t<div class=\"panel-collapse collapse\" id=\"collapseSix\">
\t\t\t\t";
        // line 259
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 260
            echo "\t\t\t\t";
            $context["section_gid"] = ("og_" . $context["key"]);
            // line 261
            echo "\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 262
            echo $this->getAttribute($context["item"], "name", []);
            echo ":</label>
\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\"><input type=\"text\" name=\"og_type[";
            // line 263
            echo $context["key"];
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user_settings"] ?? null), ($context["section_gid"] ?? null), [], "array"), "og_type", []));
            echo "\" class=\"form-control\"></div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 266
        echo "\t\t\t</div>
\t\t</div>
\t\t<br>

\t\t<div class=\"panel\">
\t\t\t<a class=\"row form-group panel-heading collapsed\" id=\"headingSeven\" data-toggle=\"collapse\" href=\"#collapseSeven\">
\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\"><b>";
        // line 272
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_og_description_default"        ,"seo_advanced"        ,        );
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
        echo "</b></label>
\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12 data-label\">";
        // line 273
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_help_og_description"        ,"seo_advanced"        ,        );
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
        echo "</div>
\t\t\t</a>
\t\t\t<div class=\"panel-collapse collapse\" id=\"collapseSeven\">
\t\t\t\t";
        // line 276
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 277
            echo "\t\t\t\t";
            $context["section_gid"] = ("og_" . $context["key"]);
            // line 278
            echo "\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t<label class=\"control-label col-md-3 col-sm-3 col-xs-12\">";
            // line 279
            echo $this->getAttribute($context["item"], "name", []);
            echo ":</label>
\t\t\t\t\t<div class=\"col-md-9 col-sm-9 col-xs-12\"><textarea class=\"form-control\" name=\"og_description[";
            // line 280
            echo $context["key"];
            echo "]\" rows=\"5\" cols=\"80\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user_settings"] ?? null), ($context["section_gid"] ?? null), [], "array"), "og_description", []));
            echo "</textarea></div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 283
        echo "\t\t\t</div>
\t\t</div>
\t\t<div class=\"ln_solid\"></div>
\t\t<div class=\"row form-group\">
\t\t\t<div class=\"col-md-offset-3 col-sm-offset-3 col-md-9 col-sm-9 col-xs-12\">
\t\t\t\t<input class=\"btn btn-success\" type=\"submit\" name=\"btn_save\" value=\"";
        // line 288
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_save"        ,"start"        ,""        ,"button"        ,        );
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
\t\t\t\t<a class=\"btn btn-default\" href=\"";
        // line 289
        echo ($context["site_url"] ?? null);
        echo "admin/seo_advanced/listing/";
        echo ($context["module_gid"] ?? null);
        echo "\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_cancel"        ,"start"        ,        );
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
\t\t\t</div>
\t\t</div>
\t</div>
</div>
</form>

<script>
\tvar urlCreator;
\tfunction addOptBlock(key, optcounter){
\t\tvar value = \$('#opt-'+key).val();
\t\tif(value){
\t\t\turlCreator.save_block('', 'opt', \$('#optdef-'+key).val(), optcounter, value, \$('#opt-'+key+' > option:selected').text());
\t\t}else{
\t\t\turlCreator.save_block('', 'text',  \$('#optdef-'+key).val(), '', '', '');
\t\t}
\t}
\t\$(function(){
\t\turlCreator = new seoUrlCreator({
\t\t\tsiteUrl: '";
        // line 308
        echo ($context["site_root"] ?? null);
        echo "',
\t\t\tdata: ";
        // line 309
        $module =         null;
        $helper =         'json';
        $name =         'json_encode';
        $params = array($this->getAttribute(($context["user_settings"] ?? null), "url_template_data", [])        ,        );
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
        echo ",
\t\t\toptions: ";
        // line 310
        $module =         null;
        $helper =         'json';
        $name =         'json_encode';
        $params = array($this->getAttribute(($context["user_settings"] ?? null), "url_template_options", [])        ,        );
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
        echo ",
\t\t});
\t});
</script>

";
        // line 315
        $this->loadTemplate("@app/footer.twig", "edit_form.twig", 315)->display($context);
    }

    public function getTemplateName()
    {
        return "edit_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1623 => 315,  1596 => 310,  1573 => 309,  1569 => 308,  1524 => 289,  1501 => 288,  1494 => 283,  1483 => 280,  1479 => 279,  1476 => 278,  1473 => 277,  1469 => 276,  1444 => 273,  1421 => 272,  1413 => 266,  1402 => 263,  1398 => 262,  1395 => 261,  1392 => 260,  1388 => 259,  1363 => 256,  1340 => 255,  1332 => 249,  1321 => 246,  1317 => 245,  1314 => 244,  1311 => 243,  1307 => 242,  1282 => 239,  1259 => 238,  1251 => 232,  1230 => 231,  1206 => 229,  1197 => 222,  1193 => 221,  1169 => 219,  1161 => 213,  1150 => 210,  1146 => 209,  1143 => 208,  1140 => 207,  1136 => 206,  1111 => 203,  1088 => 202,  1080 => 196,  1069 => 193,  1044 => 192,  1041 => 191,  1038 => 190,  1034 => 189,  1009 => 186,  986 => 185,  978 => 179,  966 => 175,  961 => 173,  958 => 172,  955 => 171,  951 => 170,  926 => 167,  903 => 166,  895 => 160,  883 => 156,  878 => 154,  875 => 153,  872 => 152,  868 => 151,  843 => 148,  820 => 147,  815 => 144,  787 => 139,  757 => 138,  753 => 137,  729 => 135,  726 => 134,  724 => 133,  716 => 127,  695 => 126,  686 => 119,  680 => 115,  647 => 111,  640 => 108,  629 => 106,  625 => 105,  621 => 104,  617 => 102,  591 => 101,  587 => 100,  563 => 98,  558 => 95,  556 => 94,  528 => 88,  499 => 81,  469 => 73,  446 => 72,  416 => 64,  389 => 59,  383 => 55,  362 => 54,  338 => 52,  313 => 49,  285 => 43,  262 => 42,  232 => 34,  226 => 30,  205 => 29,  181 => 27,  156 => 24,  129 => 19,  123 => 15,  120 => 14,  108 => 13,  97 => 12,  89 => 11,  87 => 10,  63 => 8,  56 => 4,  53 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/seo_advanced/views/gentelella/edit_form.twig");
    }
}
