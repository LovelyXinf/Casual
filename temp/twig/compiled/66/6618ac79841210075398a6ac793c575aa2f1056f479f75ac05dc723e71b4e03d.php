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

/* ajax_notes_form.twig */
class __TwigTemplate_8cc29e06a1b2cb7aac5389e4ca8141b1913346535a040aecc1de8bc4dc5da9db extends \Twig\Template
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
        echo "<div class=\"chatbox-notes\">
    <div class=\"chatbox-notes__header\">
        <h2>";
        // line 3
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_internal_notes"        ,"chatbox"        ,        );
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
    </div>
    <div class=\"chatbox-notes__body\">
        ";
        // line 6
        $module =         null;
        $helper =         'lang';
        $name =         'ld';
        $params = array("note_categories"        ,"chatbox"        ,        );
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
        $context['categories'] = $result;
        // line 7
        echo "
        <div class=\"chatbox-notes__mobile-tabs\">
            <ul class=\"nav nav-tabs bar_tabs\" data-action=\"notes-mobile-tabs\">
                <li class=\"nav-item active\" data-type=\"user\">
                    <a href=\"javascript:;\" class=\"nav-link\">
                        ";
        // line 12
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_you"        ,"chatbox"        ,        );
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
        // line 13
        echo "                    </a>
                </li>
                <li class=\"nav-item\" data-type=\"contact\">
                    <a href=\"javascript:;\" class=\"nav-link\">
                        ";
        // line 17
        if (($this->getAttribute(($context["contact"] ?? null), "user_type", []) == "female")) {
            // line 18
            echo "                            ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("text_her"            ,"chatbox"            ,            );
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
            echo "                        ";
        } elseif (($this->getAttribute(($context["contact"] ?? null), "user_type", []) == "male")) {
            // line 20
            echo "                            ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("text_him"            ,"chatbox"            ,            );
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
            // line 21
            echo "                        ";
        }
        // line 22
        echo "                    </a>
                </li>
            </ul>
        </div>

        <div class=\"chatbox-notes__user cn-xs-active\">
            <div class=\"chatbox-notes__user-header\">
                ";
        // line 29
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_you"        ,"chatbox"        ,        );
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
        echo "            </div>

            <div class=\"chatbox-notes__add\" style=\"display:none;\">
                <form onsubmit=\"javascript:return false;\" method=\"POST\" data-user-id=\"";
        // line 33
        echo ($context["user_id"] ?? null);
        echo "\" data-contact-id=\"";
        echo ($context["contact_id"] ?? null);
        echo "\">
                    <select name=\"category_gid\" class=\"form-control mb10\">
                        ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["categories"] ?? null), "option", []));
        foreach ($context['_seq'] as $context["gid"] => $context["name"]) {
            // line 36
            echo "                            <option value=\"";
            echo $context["gid"];
            echo "\">";
            echo $context["name"];
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['gid'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                    </select>
                    <textarea name=\"message\" class=\"form-control\" placeholder=\"";
        // line 39
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("placeholder_add_note"        ,"chatbox"        ,""        ,"button"        ,        );
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
        echo "\"></textarea>
                    <div>
                        <button type=\"button\" class=\"btn btn-primary mt10\" data-click=\"add_note\" data-type=\"user\" style=\"min-width:150px;\">
                            ";
        // line 42
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_add"        ,"start"        ,        );
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
        // line 43
        echo "                        </button>
                        <button type=\"button\" class=\"btn btn-cancel mt10\" data-action=\"notes_content\" data-type=\"user\">
                            ";
        // line 45
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
        // line 46
        echo "                        </button>
                    </div>
                </form>
            </div>
            <div class=\"chatbox-notes__content\">
                <div class=\"chatbox-notes__add-button\">
                    <button type=\"button\" class=\"btn btn-primary\" data-action=\"notes_add_form\" data-type=\"user\">
                        <i class=\"fa fa-plus\"></i>
                        ";
        // line 54
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_note"        ,"chatbox"        ,        );
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
        echo "                    </button>
                </div>
                <div class=\"chatbox-notes__filter\">
                    <div class=\"input-group\">
                        <select name=\"category_gid\" class=\"form-control\" id=\"chb_notes_";
        // line 59
        echo ($context["user_id"] ?? null);
        echo "_";
        echo ($context["contact_id"] ?? null);
        echo "_category_user\">
                            <option value=\"\">
                                ";
        // line 61
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_note_categories_all"        ,"chatbox"        ,        );
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
        // line 62
        echo "                            </option>
                            ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["categories"] ?? null), "option", []));
        foreach ($context['_seq'] as $context["gid"] => $context["name"]) {
            // line 64
            echo "                                <option value=\"";
            echo $context["gid"];
            echo "\">";
            echo $context["name"];
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['gid'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
        echo "                        </select>
                        <span class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-success\" data-action=\"notes-filter\" data-type=\"user\">
                                ";
        // line 69
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_filter"        ,"start"        ,        );
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
        // line 70
        echo "                            </button>
                        </span>
                    </div>
                </div>
                <div class=\"chatbox-notes__list\">
                    <ul id=\"chb_notes_";
        // line 75
        echo ($context["user_id"] ?? null);
        echo "_";
        echo ($context["contact_id"] ?? null);
        echo "_user\">
                        ";
        // line 76
        if (($context["notes_user"] ?? null)) {
            // line 77
            echo "                            ";
            $this->loadTemplate("notes.twig", "ajax_notes_form.twig", 77)->display(twig_array_merge($context, ["notes" => ($context["notes_user"] ?? null)]));
            // line 78
            echo "                        ";
        }
        // line 79
        echo "                        <li class=\"chatbox-notes__empty\" ";
        if (($context["notes_user"] ?? null)) {
            echo "style=\"display:none;\"";
        }
        echo ">
                            ";
        // line 80
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_notes"        ,"chatbox"        ,        );
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
        // line 81
        echo "                        </li>
                        <li class=\"chatbox-notes__more\" ";
        // line 82
        if ( !($context["load_more_user"] ?? null)) {
            echo "style=\"display:none;\"";
        }
        echo ">
                            <button type=\"button\" class=\"btn btn-default\" data-click=\"load_more_notes\" data-type=\"user\">
                                ";
        // line 84
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_load_more"        ,"chatbox"        ,        );
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
        // line 85
        echo "                            </button>
                        </li>
                        <li class=\"chatbox-notes__loader\" style=\"display:none;\">
                            <i class=\"fa fa-spinner fa-pulse fa-3x fa-fw\"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class=\"chatbox-notes__contact\">
            <div class=\"chatbox-notes__contact-header\">
                ";
        // line 97
        if (($this->getAttribute(($context["contact"] ?? null), "user_type", []) == "female")) {
            // line 98
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("text_her"            ,"chatbox"            ,            );
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
            // line 99
            echo "                ";
        } elseif (($this->getAttribute(($context["contact"] ?? null), "user_type", []) == "male")) {
            // line 100
            echo "                    ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("text_him"            ,"chatbox"            ,            );
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
            echo "                ";
        }
        // line 102
        echo "            </div>

            <div class=\"chatbox-notes__add\" style=\"display:none;\">
                <form onsubmit=\"javascript:return false;\" method=\"POST\" data-user-id=\"";
        // line 105
        echo ($context["user_id"] ?? null);
        echo "\" data-contact-id=\"";
        echo ($context["contact_id"] ?? null);
        echo "\">
                    <select name=\"category_gid\" class=\"form-control mb10\">
                        ";
        // line 107
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["categories"] ?? null), "option", []));
        foreach ($context['_seq'] as $context["gid"] => $context["name"]) {
            // line 108
            echo "                            <option value=\"";
            echo $context["gid"];
            echo "\">";
            echo $context["name"];
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['gid'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        echo "                    </select>
                    <textarea name=\"message\" class=\"form-control\" placeholder=\"";
        // line 111
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("placeholder_add_note"        ,"chatbox"        ,""        ,"button"        ,        );
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
        echo "\"></textarea>
                    <div>
                        <button type=\"button\" class=\"btn btn-primary mt10\" data-click=\"add_note\" data-type=\"contact\" style=\"min-width:150px;\">
                            ";
        // line 114
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_add"        ,"start"        ,        );
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
        echo "                        </button>
                        <button type=\"button\" class=\"btn btn-cancel mt10\" data-action=\"notes_content\" data-type=\"contact\">
                            ";
        // line 117
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
        // line 118
        echo "                        </button>
                    </div>
                </form>
            </div>
            <div class=\"chatbox-notes__content\">
                <div class=\"chatbox-notes__add-button\">
                    <button type=\"button\" class=\"btn btn-primary\" data-action=\"notes_add_form\" data-type=\"contact\">
                        <i class=\"fa fa-plus\"></i>
                        ";
        // line 126
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_note"        ,"chatbox"        ,        );
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
        echo "                    </button>
                </div>
                <div class=\"chatbox-notes__filter\">
                    <div class=\"input-group\">
                        <select name=\"category_gid\" class=\"form-control\" id=\"chb_notes_";
        // line 131
        echo ($context["user_id"] ?? null);
        echo "_";
        echo ($context["contact_id"] ?? null);
        echo "_category_contact\">
                            <option value=\"\">
                                ";
        // line 133
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_note_categories_all"        ,"chatbox"        ,        );
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
        // line 134
        echo "                            </option>
                            ";
        // line 135
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["categories"] ?? null), "option", []));
        foreach ($context['_seq'] as $context["gid"] => $context["name"]) {
            // line 136
            echo "                                <option value=\"";
            echo $context["gid"];
            echo "\">";
            echo $context["name"];
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['gid'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "                        </select>
                        <span class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-success\" data-action=\"notes-filter\" data-type=\"contact\">
                                ";
        // line 141
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_filter"        ,"start"        ,        );
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
        // line 142
        echo "                            </button>
                        </span>
                    </div>
                </div>
                <div class=\"chatbox-notes__list\">
                    <ul id=\"chb_notes_";
        // line 147
        echo ($context["user_id"] ?? null);
        echo "_";
        echo ($context["contact_id"] ?? null);
        echo "_contact\">
                        ";
        // line 148
        if (($context["notes_contact"] ?? null)) {
            // line 149
            echo "                            ";
            $this->loadTemplate("notes.twig", "ajax_notes_form.twig", 149)->display(twig_array_merge($context, ["notes" => ($context["notes_contact"] ?? null)]));
            // line 150
            echo "                        ";
        }
        // line 151
        echo "                        <li class=\"chatbox-notes__empty\" ";
        if (($context["notes_contact"] ?? null)) {
            echo "style=\"display:none;\"";
        }
        echo ">
                            ";
        // line 152
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("no_notes"        ,"chatbox"        ,        );
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
        // line 153
        echo "                        </li>
                        <li class=\"chatbox-notes__more\" ";
        // line 154
        if ( !($context["load_more_contact"] ?? null)) {
            echo "style=\"display:none;\"";
        }
        echo ">
                            <button type=\"button\" class=\"btn btn-default\" data-click=\"load_more_notes\" data-type=\"contact\">
                                ";
        // line 156
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_load_more"        ,"chatbox"        ,        );
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
        // line 157
        echo "                            </button>
                        </li>
                        <li class=\"chatbox-notes__loader\" style=\"display:none;\">
                            <i class=\"fa fa-spinner fa-pulse fa-3x fa-fw\"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "ajax_notes_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  842 => 157,  821 => 156,  814 => 154,  811 => 153,  790 => 152,  783 => 151,  780 => 150,  777 => 149,  775 => 148,  769 => 147,  762 => 142,  741 => 141,  736 => 138,  725 => 136,  721 => 135,  718 => 134,  697 => 133,  690 => 131,  684 => 127,  663 => 126,  653 => 118,  632 => 117,  628 => 115,  607 => 114,  582 => 111,  579 => 110,  568 => 108,  564 => 107,  557 => 105,  552 => 102,  549 => 101,  527 => 100,  524 => 99,  502 => 98,  500 => 97,  486 => 85,  465 => 84,  458 => 82,  455 => 81,  434 => 80,  427 => 79,  424 => 78,  421 => 77,  419 => 76,  413 => 75,  406 => 70,  385 => 69,  380 => 66,  369 => 64,  365 => 63,  362 => 62,  341 => 61,  334 => 59,  328 => 55,  307 => 54,  297 => 46,  276 => 45,  272 => 43,  251 => 42,  226 => 39,  223 => 38,  212 => 36,  208 => 35,  201 => 33,  196 => 30,  175 => 29,  166 => 22,  163 => 21,  141 => 20,  138 => 19,  116 => 18,  114 => 17,  108 => 13,  87 => 12,  80 => 7,  59 => 6,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "ajax_notes_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/ajax_notes_form.twig");
    }
}
