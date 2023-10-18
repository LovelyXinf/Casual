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

/* view.twig */
class __TwigTemplate_98a6dfb2ca5aed5dd58ac86d2053c0c260476f9f36b5dd0a5c51b68efbe566ce extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "view.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-xs-12\">
    <div class=\"x_panel\">
        <form method=\"post\" action=\"";
        // line 5
        echo $this->getAttribute(($context["data"] ?? null), "action", []);
        echo "\" name=\"save_form\"  enctype=\"multipart/form-data\"
              data-parsley-validate class=\"form-horizontal form-label-left\">

            <h2 class=\"col-xs-12\">";
        // line 8
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("admin_header_logo_editor"        ,"themes"        ,        );
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
        echo "  /  ";
        echo $this->getAttribute(($context["theme"] ?? null), "theme", []);
        echo "  /  ";
        echo $this->getAttribute(($context["set"] ?? null), "set_name", []);
        echo "</h2>
            <div class=\"col-md-6 col-xs-6 col-xs-12\">
                <div class=\"h5\">";
        // line 10
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("admin_header_logo_settings"        ,"themes"        ,        );
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
                <div class=\"form-group\">
                    <label class=\"control-label col-sm-3 col-xs-12\">
                        ";
        // line 13
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_width"        ,"themes"        ,        );
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
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("size_px"        ,"themes"        ,        );
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
        echo "): </label>
                    <div class=\"col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 15
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "logo_width", [])) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "logo_width", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "logo_width", []);
        }
        echo "\" name=\"logo_width\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-sm-3 col-xs-12\">
                        ";
        // line 20
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_height"        ,"themes"        ,        );
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
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("size_px"        ,"themes"        ,        );
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
        echo "): </label>
                    <div class=\"col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 22
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "logo_height", [])) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "logo_height", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "logo_height", []);
        }
        echo "\" name=\"logo_height\" class=\"form-control\">
                    </div>
                </div>
            </div>

            <div class=\"col-sm-6 col-xs-12\">
                <div class=\"h5\">";
        // line 28
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("admin_header_mini_logo_settings"        ,"themes"        ,        );
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
                <div class=\"form-group\">
                    <label class=\"control-label col-sm-3 col-xs-12\">
                        ";
        // line 31
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_width"        ,"themes"        ,        );
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
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("size_px"        ,"themes"        ,        );
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
        echo "): </label>
                    <div class=\"col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 33
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_width", [])) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_width", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "mini_logo_width", []);
        }
        echo "\" name=\"mini_logo_width\" class=\"form-control\">
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label col-sm-3 col-xs-12\">
                        ";
        // line 38
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_height"        ,"themes"        ,        );
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
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("size_px"        ,"themes"        ,        );
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
        echo "): </label>
                    <div class=\"col-sm-9 col-xs-12\">
                        <input type=\"text\" value=\"";
        // line 40
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_height", [])) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_height", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "mini_logo_height", []);
        }
        echo "\" name=\"mini_logo_height\" class=\"form-control\">
                    </div>
                </div>
            </div>

            <div class=\"clearfix\"></div>
            <div class=\"ln_solid\"></div>

            <div class=\"col-xs-12 \">
                <div class=\"menu-level3 hidden-xs\">
                    <ul class=\"nav nav-tabs bar_tabs\" id=\"edit_tabs\">
                        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 52
            echo "                            <li";
            if (($this->getAttribute($context["item"], "id", []) == ($context["lang_id"] ?? null))) {
                echo " class=\"active\"";
            }
            echo "><a href=\"";
            echo ($context["site_url"] ?? null);
            echo "admin/themes/view_installed/";
            echo $this->getAttribute(($context["theme"] ?? null), "id", []);
            echo "/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "/";
            echo ($context["id_set"] ?? null);
            echo "\">";
            echo $this->getAttribute($context["item"], "name", []);
            echo "</a></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "                    </ul>
                </div>
                <div class=\"menu-level3 visible-xs\">
                    <ul class=\"nav nav-tabs tabs-left\" id=\"edit_tabs\">
                        ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["langs"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 59
            echo "                            <li";
            if (($this->getAttribute($context["item"], "id", []) == ($context["lang_id"] ?? null))) {
                echo " class=\"active\"";
            }
            echo "><a href=\"";
            echo ($context["site_url"] ?? null);
            echo "admin/themes/view_installed/";
            echo $this->getAttribute(($context["theme"] ?? null), "id", []);
            echo "/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "/";
            echo ($context["id_set"] ?? null);
            echo "\">";
            echo $this->getAttribute($context["item"], "name", []);
            echo "</a></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                    </ul>
                </div>

                <div>
                    <div class=\"h5 x_title\">";
        // line 65
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo"        ,"themes"        ,        );
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
                    <div class=\"disabled-block\">
                        <div class=\"form-group\">
                            <label class=\"control-label col-sm-3 col-xs-12\">
                                ";
        // line 69
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_text"        ,"themes"        ,        );
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
                            <div class=\"col-sm-9 col-xs-12\">
                                <input type=\"text\" value=\"";
        // line 71
        echo $this->getAttribute(($context["theme"] ?? null), "text_logo", []);
        echo "\" name=\"text_logo\" class=\"form-control\" id=\"text_logo\">
                            </div>
                        </div>
                    </div>

                    <div class=\"form-group\" data-block=\"logo\">
                        <label class=\"control-label col-sm-3 col-xs-12\">
                            ";
        // line 78
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_file"        ,"themes"        ,        );
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
                        <div class=\"col-sm-9 col-xs-12\">
                            <input type=\"file\" value=\"\" name=\"logo\" class=\"form-control\" ";
        // line 80
        if ($this->getAttribute(($context["theme"] ?? null), "text_logo", [])) {
            echo "disabled";
        }
        echo ">
                            <br>
                            <img src=\"";
        // line 82
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "logo_url", [])) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "logo_url", []);
            echo "?";
            echo twig_random($this->env);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "logo_url", []);
            echo "?";
            echo twig_random($this->env);
        }
        echo "\" width=\"";
        if (($context["colourset_logo"] ?? null)) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "logo_width", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "logo_width", []);
        }
        echo "\"
                                 height=\"";
        // line 83
        if (($context["colourset_logo"] ?? null)) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "logo_height", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "logo_height", []);
        }
        echo "\" />
                        </div>
                    </div>
                    ";
        // line 86
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "logo", [])) {
            // line 87
            echo "                        <div class=\"form-group\">
                            <label class=\"control-label col-sm-3 col-xs-12\">
                                ";
            // line 89
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_logo_delete"            ,"themes"            ,            );
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
                            <div class=\"col-sm-9 col-xs-12\">
                                <input type=\"checkbox\" name=\"logo_delete\" value=\"1\" class=\"flat\">
                            </div>
                        </div>
                    ";
        }
        // line 95
        echo "
                    <div class=\"h5 x_title\">";
        // line 96
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_mini_logo"        ,"themes"        ,        );
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
                    <div class=\"disabled-block\">
                        <div class=\"form-group\">
                            <label class=\"control-label col-sm-3 col-xs-12\">
                                ";
        // line 100
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_logo_text"        ,"themes"        ,        );
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
                            <div class=\"col-sm-9 col-xs-12\">
                                <input type=\"text\" value=\"";
        // line 102
        echo $this->getAttribute(($context["theme"] ?? null), "text_logo_mini", []);
        echo "\" name=\"text_logo_mini\" class=\"form-control\" id=\"text_logo_mini\">
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\"  data-block=\"mini_logo\">
                        <label class=\"control-label col-sm-3 col-xs-12\">
                            ";
        // line 108
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_mini_logo_file"        ,"themes"        ,        );
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
                        <div class=\"col-sm-9 col-xs-12\">
                    <input type=\"file\" value=\"\" name=\"mini_logo\" class=\"form-control\" ";
        // line 110
        if ($this->getAttribute(($context["theme"] ?? null), "text_logo_mini", [])) {
            echo "disabled";
        }
        echo ">
                            <br>
                            <img src=\"";
        // line 112
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_url", [])) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_url", []);
            echo "?";
            echo twig_random($this->env);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "mini_logo_url", []);
            echo "?";
            echo twig_random($this->env);
        }
        echo "\" width=\"";
        if (($context["colourset_logo"] ?? null)) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_width", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "mini_logo_width", []);
        }
        echo "\"
                                 height=\"";
        // line 113
        if (($context["colourset_logo"] ?? null)) {
            echo $this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo_height", []);
        } else {
            echo $this->getAttribute(($context["theme"] ?? null), "mini_logo_height", []);
        }
        echo "\" />
                        </div>
                    </div>

                    ";
        // line 117
        if ($this->getAttribute(($context["colourset_logo"] ?? null), "mini_logo", [])) {
            // line 118
            echo "                        <div class=\"form-group\">
                            <label class=\"control-label col-sm-3 col-xs-12\">
                                ";
            // line 120
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_logo_delete"            ,"themes"            ,            );
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
                            <div class=\"col-sm-9 col-xs-12\">
                                <input type=\"checkbox\" name=\"mini_logo_delete\" value=\"1\" class=\"flat\">
                            </div>
                        </div>
                    ";
        }
        // line 126
        echo "                </div>
            </div>
            <div class=\"clearfix\"></div>
            <div class=\"ln_solid\"></div>
            <div class=\"form-group\">
                <div class=\"col-sm-9 col-xs-12 col-sm-offset-3\">
                    <input onclick=\"";
        // line 132
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("themes"        ,"btn_save"        ,        );
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
        echo "\" class=\"btn btn-success\" type=\"submit\" name=\"btn_save\" value=\"";
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
                    <a class=\"btn btn-default\" href=\"";
        // line 133
        echo ($context["site_url"] ?? null);
        echo "admin/themes/installed_themes/";
        echo $this->getAttribute(($context["theme"] ?? null), "type", []);
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
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    \$(function () {
        \$('#text_logo').focus(function () {
            \$('[data-block=\"logo\"]').find('input').prop('disabled', true);
        });
        \$('#text_logo').focusout(function () {
            if (\$(this).val() === '') {
                \$('[data-block=\"logo\"]').find('input').prop('disabled', false);
            }
        });
        \$('#text_logo_mini').focus(function () {
            \$('[data-block=\"mini_logo\"]').find('input').prop('disabled', true);
        });
        \$('#text_logo_mini').focusout(function () {
            if (\$(this).val() === '') {
                \$('[data-block=\"mini_logo\"]').find('input').prop('disabled', false);
            }
        });
    });
</script>
";
        // line 159
        $this->loadTemplate("@app/footer.twig", "view.twig", 159)->display($context);
    }

    public function getTemplateName()
    {
        return "view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  831 => 159,  779 => 133,  735 => 132,  727 => 126,  699 => 120,  695 => 118,  693 => 117,  682 => 113,  664 => 112,  657 => 110,  633 => 108,  624 => 102,  600 => 100,  574 => 96,  571 => 95,  543 => 89,  539 => 87,  537 => 86,  527 => 83,  509 => 82,  502 => 80,  478 => 78,  468 => 71,  444 => 69,  418 => 65,  412 => 61,  391 => 59,  387 => 58,  381 => 54,  360 => 52,  356 => 51,  338 => 40,  293 => 38,  281 => 33,  236 => 31,  211 => 28,  198 => 22,  153 => 20,  141 => 15,  96 => 13,  71 => 10,  43 => 8,  37 => 5,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "view.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/themes/views/gentelella/view.twig");
    }
}
