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

/* dialog.twig */
class __TwigTemplate_ad44da90a16251158037addfa079caf6d3a8fdb24d94b92caae5e20e12319d4a extends \Twig\Template
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
        echo "<div class=\"chatbox-dialog__header\">
    <div class=\"chatbox-dialog__h-user\">
        <img class=\"chatbox-dialog__h-user-image\" src=\"";
        // line 3
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "media", []), "user_logo", []), "thumbs", []), "small", []);
        echo "\" />
        <span class=\"chatbox-dialog__h-user-name\">
            ";
        // line 5
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "output_name", []);
        echo "
        </span>
        <span class=\"chatbox-dialog__h-user-status\">
            ";
        // line 8
        if ($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "online_status", [])) {
            // line 9
            echo "                ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("status_online_1"            ,"users"            ,            );
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
            // line 10
            echo "            ";
        } else {
            // line 11
            echo "                ";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("text_user_last_active"            ,"chatbox"            ,            );
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
            echo "&nbsp;
                ";
            // line 12
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "date_last_activity", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])            ,            );
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
            echo "            ";
        }
        // line 14
        echo "        </span>
    </div>
    <div class=\"chatbox-dialog__h-note\" title=\"";
        // line 16
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_open_notes"        ,"chatbox"        ,""        ,"button"        ,        );
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
        echo "\" data-click=\"open_notes\">
        <i class=\"fa fa-sticky-note\"></i>
        <span>";
        // line 18
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
        echo "</span>
    </div>
</div>
<div class=\"chatbox-dialog__header-mobile\">
    <div class=\"chatbox-dialog__header-mobile-credits\">
        ";
        // line 23
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_credits"        ,"chatbox"        ,        );
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
        echo ":
        <span>";
        // line 24
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "credits", []);
        echo "</span>
    </div>
    <div class=\"chatbox-dialog__header-mobile-buttons\">
        <button type=\"button\" class=\"btn btn-green\" data-action=\"view-my-info\">";
        // line 27
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_view_my_info"        ,"chatbox"        ,        );
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
        echo "</button>
        <button type=\"button\" class=\"btn btn-red\" data-action=\"view-user-info\">";
        // line 28
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_view_user_info"        ,"chatbox"        ,        );
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
        echo "</button>
        <button type=\"button\" class=\"btn btn-primary c-mobile-hide\" data-action=\"view-messages\">";
        // line 29
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_view_messages"        ,"chatbox"        ,        );
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
        echo "</button>
    </div>
</div>
<div class=\"chatbox-dialog__body\">
    <div class=\"chatbox-dialog__userinfo chatbox-dialog__userinfo-current c-mobile-hide\" id=\"chbx_my_info\">
        <div class=\"chatbox-dialog__userinfo-role ";
        // line 34
        echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "user_type", []);
        echo "\">
            ";
        // line 35
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
        // line 36
        echo "        </div>
        <div class=\"chatbox-dialog__userinfo-top\">
            <div class=\"media\">
                <img class=\"img-responsive\" src=\"";
        // line 39
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "media", []), "user_logo", []), "thumbs", []), "small", []);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "output_name", []));
        echo "\" width=\"60\" />
            </div>
            <div class=\"media-body\">
                <div class=\"chatbox-dialog__userinfo-name\">
                    ";
        // line 43
        echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "output_name", []);
        echo "</a>";
        if ($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "age", [])) {
            echo ", ";
            echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "age", []);
        }
        // line 44
        echo "                </div>
                ";
        // line 45
        if ($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "birth_date", [])) {
            // line 46
            echo "                    <div>
                        ";
            // line 47
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "birth_date", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_literal", [])            ,            );
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
            // line 48
            echo "                    </div>
                ";
        }
        // line 50
        echo "                ";
        if ($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "location", [])) {
            // line 51
            echo "                    <div class=\"chatbox-dialog__userinfo-location\">
                        <i class=\"fa fa-map-marker\"></i>
                        ";
            // line 53
            echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "location", []);
            echo "
                    </div>
                ";
        }
        // line 56
        echo "                <div class=\"chatbox-dialog__userinfo-looking\">
                    ";
        // line 57
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_user_type_look"        ,"users"        ,        );
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
        echo " ";
        echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "looking_user_type_str", []);
        echo ",
                    ";
        // line 58
        echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "age_min", []);
        echo "-";
        echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "age_max", []);
        echo " ";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_age"        ,"users"        ,        );
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
        // line 59
        echo "                </div>
            </div>
        </div>
        ";
        // line 62
        if ($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "images", [])) {
            // line 63
            echo "            <div class=\"chatbox-dialog__userinfo-images\">
                <div class=\"chatbox-dialog__userinfo-images-slider js-user-images\">
                    ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "images", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 66
                echo "                        <div class=\"chatbox-dialog__userinfo-images-item\" data-click=\"view-single-media\" data-gallery-src=\"";
                echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "media", []), "mediafile", []), "thumbs", []), "grand", []);
                echo "\" >
                            <img src=\"";
                // line 67
                echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "media", []), "mediafile", []), "thumbs", []), "small", []);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "media", []), "mediafile", []), "photo_alt", []));
                echo "\">
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "                </div>
            </div>
        ";
        }
        // line 73
        echo "        <div class=\"chatbox-dialog__userinfo-credits\">
            ";
        // line 74
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_credits"        ,"chatbox"        ,        );
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
        echo ":
            <span>";
        // line 75
        echo $this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "credits", []);
        echo "</span>
        </div>
        <div class=\"chatbox-dialog__userinfo-sections\">
            ";
        // line 78
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["user"] ?? null), "info", []), "field_editor", []));
        foreach ($context['_seq'] as $context["sgid"] => $context["sdata"]) {
            // line 79
            echo "                <div class=\"section-name\">";
            echo $this->getAttribute($context["sdata"], "name", []);
            echo "</div>
                <div class=\"view-section\">
                    ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["sdata"], "fields", []));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["gid"] => $context["field"]) {
                // line 82
                echo "                        <div class=\"r\">
                            <div class=\"f\">";
                // line 83
                echo $this->getAttribute($context["field"], "name", []);
                echo ":</div>
                            <div class=\"v\">
                                ";
                // line 85
                if (($this->getAttribute($context["field"], "field_type", []) == "select")) {
                    // line 86
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["field"], "value", []), "html", null, true));
                    }
                    // line 87
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "textarea")) {
                    // line 88
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["field"], "value", []), "html", null, true));
                    }
                    // line 89
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "text")) {
                    // line 90
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["field"], "value", []), "html", null, true));
                    }
                    // line 91
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "range")) {
                    // line 92
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo $this->getAttribute($context["field"], "value", []);
                    }
                    // line 93
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "multiselect")) {
                    // line 94
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo $this->getAttribute($context["field"], "value_str", []);
                    }
                    // line 95
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "checkbox")) {
                    // line 96
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        // line 97
                        echo "                                        ";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("option_checkbox_yes"                        ,"start"                        ,                        );
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
                        // line 98
                        echo "                                    ";
                    } else {
                        // line 99
                        echo "                                        ";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("option_checkbox_no"                        ,"start"                        ,                        );
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
                        echo "                                    ";
                    }
                    // line 101
                    echo "                                ";
                }
                // line 102
                echo "                            </div>
                        </div>
                    ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 105
                echo "                        <div class=\"r\">
                            <div class=\"f\">";
                // line 106
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("no_information"                ,"start"                ,                );
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
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['gid'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 109
            echo "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['sgid'], $context['sdata'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 111
        echo "        </div>
        <div class=\"chatbox-dialog__userinfo-notes\">
            <div class=\"chatbox-dialog__userinfo-notes-title\">
                ";
        // line 114
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_last_notes"        ,"chatbox"        ,        );
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
        echo "            </div>
            <div class=\"chatbox-dialog__userinfo-notes-items\">
                <ul>
                    ";
        // line 118
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["notes_user"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
            // line 119
            echo "                        <li>
                            <div class=\"chatbox-dialog__userinfo-notes-category\">
                                ";
            // line 121
            echo $this->getAttribute($context["note"], "category_str", []);
            echo "
                            </div>
                            <div class=\"chatbox-dialog__userinfo-notes-date\">
                                ";
            // line 124
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute(($context["note"] ?? null), "date_added", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])            ,            );
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
            // line 125
            echo "                            </div>
                            <div class=\"chatbox-dialog__userinfo-notes-text\">
                                ";
            // line 127
            echo $this->getAttribute($context["note"], "message", []);
            echo "
                            </div>
                        </li>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 131
            echo "                        <li>
                            <div class=\"chatbox-dialog__userinfo-notes-empty\">
                                ";
            // line 133
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("no_notes"            ,"chatbox"            ,            );
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
            echo "                            </div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "                </ul>
            </div>
        </div>
    </div>
    <div class=\"chatbox-dialog__main\" id=\"chbx_main\">
        <div class=\"chatbox-dialog__chat-started\">
            ";
        // line 144
        echo "            ";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_conversation_started"        ,"chatbox"        ,        );
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
        // line 145
        echo "            ";
        $module =         null;
        $helper =         'date_format';
        $name =         'tpl_date_format';
        $params = array($this->getAttribute(($context["first_message"] ?? null), "date_added", [])        ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])        ,        );
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
        // line 146
        echo "        </div>
        <div class=\"chatbox-dialog__messages\" gallery=\"contact_";
        // line 147
        echo $this->getAttribute(($context["contact"] ?? null), "id", []);
        echo "\">
            <div class=\"chatbox-dialog__messages-empty\" ";
        // line 148
        if ( !twig_test_empty(($context["messages"] ?? null))) {
            echo "style=\"display:none;\"";
        }
        echo ">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("empty_messages"        ,"chatbox"        ,        );
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
            <ul>
                ";
        // line 150
        $this->loadTemplate("messages.twig", "dialog.twig", 150)->display($context);
        // line 151
        echo "            </ul>
        </div>
    </div>
    <div class=\"chatbox-dialog__userinfo c-mobile-hide\" id=\"chbx_user_info\">
        <div class=\"chatbox-dialog__userinfo-role ";
        // line 155
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "user_type", []);
        echo "\">
            ";
        // line 156
        if (($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "user_type", []) == "female")) {
            // line 157
            echo "                ";
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
            // line 158
            echo "            ";
        } elseif (($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "user_type", []) == "male")) {
            // line 159
            echo "                ";
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
            // line 160
            echo "            ";
        }
        // line 161
        echo "        </div>
        <div class=\"chatbox-dialog__userinfo-top\">
            <div class=\"media\">
                <img class=\"img-responsive\" src=\"";
        // line 164
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "media", []), "user_logo", []), "thumbs", []), "small", []);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "output_name", []));
        echo "\" width=\"60\" />
            </div>
            <div class=\"media-body\">
                <div class=\"chatbox-dialog__userinfo-name\">
                    ";
        // line 168
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "output_name", []);
        echo "</a>";
        if ($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "age", [])) {
            echo ", ";
            echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "age", []);
        }
        // line 169
        echo "                </div>
                ";
        // line 170
        if ($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "birth_date", [])) {
            // line 171
            echo "                    <div>
                        ";
            // line 172
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "birth_date", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_literal", [])            ,            );
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
            // line 173
            echo "                    </div>
                ";
        }
        // line 175
        echo "                ";
        if ($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "location", [])) {
            // line 176
            echo "                    <div class=\"chatbox-dialog__userinfo-location\">
                        <i class=\"fa fa-map-marker\"></i>
                        ";
            // line 178
            echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "location", []);
            echo "
                    </div>
                ";
        }
        // line 181
        echo "                <div class=\"chatbox-dialog__userinfo-looking\">
                    ";
        // line 182
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_user_type_look"        ,"users"        ,        );
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
        echo " ";
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "looking_user_type_str", []);
        echo ",
                    ";
        // line 183
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "age_min", []);
        echo "-";
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "age_max", []);
        echo " ";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_age"        ,"users"        ,        );
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
        // line 184
        echo "                </div>
            </div>
        </div>
        ";
        // line 187
        if ($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "images", [])) {
            // line 188
            echo "            <div class=\"chatbox-dialog__userinfo-images\">
                <div class=\"chatbox-dialog__userinfo-images-slider js-user-images\">
                    ";
            // line 190
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "images", []));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 191
                echo "                        <div class=\"chatbox-dialog__userinfo-images-item\" data-click=\"view-single-media\" data-gallery-src=\"";
                echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "media", []), "mediafile", []), "thumbs", []), "grand", []);
                echo "\" >
                            <img src=\"";
                // line 192
                echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "media", []), "mediafile", []), "thumbs", []), "small", []);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["image"], "media", []), "mediafile", []), "photo_alt", []));
                echo "\">
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 195
            echo "                </div>
            </div>
        ";
        }
        // line 198
        echo "        <div class=\"chatbox-dialog__userinfo-credits\">
            ";
        // line 199
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_credits"        ,"chatbox"        ,        );
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
        echo ":
            <span>";
        // line 200
        echo $this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "credits", []);
        echo "</span>
        </div>
        <div class=\"chatbox-dialog__userinfo-sections\">
            ";
        // line 203
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["contact"] ?? null), "info", []), "field_editor", []));
        foreach ($context['_seq'] as $context["sgid"] => $context["sdata"]) {
            // line 204
            echo "                <div class=\"section-name\">";
            echo $this->getAttribute($context["sdata"], "name", []);
            echo "</div>
                <div class=\"view-section\">
                    ";
            // line 206
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["sdata"], "fields", []));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["gid"] => $context["field"]) {
                // line 207
                echo "                        <div class=\"r\">
                            <div class=\"f\">";
                // line 208
                echo $this->getAttribute($context["field"], "name", []);
                echo ":</div>
                            <div class=\"v\">
                                ";
                // line 210
                if (($this->getAttribute($context["field"], "field_type", []) == "select")) {
                    // line 211
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["field"], "value", []), "html", null, true));
                    }
                    // line 212
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "textarea")) {
                    // line 213
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["field"], "value", []), "html", null, true));
                    }
                    // line 214
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "text")) {
                    // line 215
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["field"], "value", []), "html", null, true));
                    }
                    // line 216
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "range")) {
                    // line 217
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo $this->getAttribute($context["field"], "value", []);
                    }
                    // line 218
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "multiselect")) {
                    // line 219
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        echo $this->getAttribute($context["field"], "value_str", []);
                    }
                    // line 220
                    echo "                                ";
                } elseif (($this->getAttribute($context["field"], "field_type", []) == "checkbox")) {
                    // line 221
                    echo "                                    ";
                    if ($this->getAttribute($context["field"], "value", [])) {
                        // line 222
                        echo "                                        ";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("option_checkbox_yes"                        ,"start"                        ,                        );
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
                        // line 223
                        echo "                                    ";
                    } else {
                        // line 224
                        echo "                                        ";
                        $module =                         null;
                        $helper =                         'lang';
                        $name =                         'l';
                        $params = array("option_checkbox_no"                        ,"start"                        ,                        );
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
                        // line 225
                        echo "                                    ";
                    }
                    // line 226
                    echo "                                ";
                }
                // line 227
                echo "                            </div>
                        </div>
                    ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 230
                echo "                        <div class=\"r\">
                            <div class=\"f\">";
                // line 231
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("no_information"                ,"start"                ,                );
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
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['gid'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 234
            echo "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['sgid'], $context['sdata'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 236
        echo "        </div>
        <div class=\"chatbox-dialog__userinfo-notes\">
            <div class=\"chatbox-dialog__userinfo-notes-title\">
                ";
        // line 239
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_last_notes"        ,"chatbox"        ,        );
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
        // line 240
        echo "            </div>
            <div class=\"chatbox-dialog__userinfo-notes-items\">
                <ul>
                    ";
        // line 243
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["notes_contact"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
            // line 244
            echo "                        <li>
                            <div class=\"chatbox-dialog__userinfo-notes-category\">
                                ";
            // line 246
            echo $this->getAttribute($context["note"], "category_str", []);
            echo "
                            </div>
                            <div class=\"chatbox-dialog__userinfo-notes-date\">
                                ";
            // line 249
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute(($context["note"] ?? null), "date_added", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])            ,            );
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
            // line 250
            echo "                            </div>
                            <div class=\"chatbox-dialog__userinfo-notes-text\">
                                ";
            // line 252
            echo $this->getAttribute($context["note"], "message", []);
            echo "
                            </div>
                        </li>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 256
            echo "                        <li>
                            <div class=\"chatbox-dialog__userinfo-notes-empty\">
                                ";
            // line 258
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("no_notes"            ,"chatbox"            ,            );
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
            // line 259
            echo "                            </div>
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        echo "                </ul>
            </div>
        </div>
    </div>
</div>
<div class=\"chatbox-dialog__footer\">
    <form id=\"chatbox_message_form\" onsubmit=\"javascript: return false;\" method=\"post\" enctype=\"multipart/form-data\" name=\"chatbox_message_form\">
        <input type=\"hidden\" name=\"id\" value=\"0\" />
        <input type=\"hidden\" name=\"user_id\" value=\"";
        // line 270
        echo $this->getAttribute(($context["user"] ?? null), "id", []);
        echo "\" />
        <input type=\"hidden\" name=\"contact_id\" value=\"";
        // line 271
        echo $this->getAttribute(($context["contact"] ?? null), "id", []);
        echo "\" />
        <div class=\"chatbox-dialog__footer-top\">
            <div class=\"chatbox-dialog__footer-queue\" id=\"chb_queue\">
                ";
        // line 274
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_messages_in_queue"        ,"chatbox"        ,        );
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
        echo ":
                <span>0</span>
            </div>
            <div class=\"chatbox-dialog__footer-timer\" id=\"chb_timer\">
                <span>0:00</span>
                ";
        // line 279
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("text_minutes_left"        ,"chatbox"        ,        );
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
        // line 280
        echo "            </div>
        </div>
        <div class=\"chatbox-dialog__footer-msgbox\">
            <textarea class=\"form-control\" name=\"message\" placeholder=\"";
        // line 283
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("placeholder_enter_message"        ,"chatbox"        ,        );
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
        echo "\" id=\"chb_message\" data-emojiable=\"true\"></textarea>
        </div>
        <div class=\"chatbox-attaches-block\" id=\"chb_attaches\">
            <ul class=\"clearfix\"></ul>
        </div>
        ";
        // line 310
        echo "
        <div class=\"chatbox-dialog__footer-actions clearfix\">
            <button type=\"button\" class=\"btn btn-green\" id=\"chb_send_msg_btn\" data-click=\"send_message\">";
        // line 312
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("button_send_message"        ,"chatbox"        ,        );
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
        echo "</button>
            <button type=\"button\" class=\"btn btn-red\" data-click=\"show_attach_form\">
                ";
        // line 314
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("btn_show_attach_form"        ,"chatbox"        ,        );
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
        // line 315
        echo "            </button>
            ";
        // line 321
        echo "            ";
        if ($this->getAttribute(($context["available_chat_actions"] ?? null), "kisses", [])) {
            // line 322
            echo "                <button type=\"button\" class=\"btn btn-default\" data-action=\"kisses-form\">
                    ";
            // line 323
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_kisses"            ,"chatbox"            ,            );
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
            // line 324
            echo "                </button>
            ";
        }
        // line 326
        echo "            ";
        if ($this->getAttribute(($context["available_chat_actions"] ?? null), "like_me", [])) {
            // line 327
            echo "                <button type=\"button\" class=\"btn btn-default\" data-action=\"like-me\">
                    ";
            // line 328
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_like_me"            ,"chatbox"            ,            );
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
            // line 329
            echo "                </button>
            ";
        }
        // line 331
        echo "            ";
        if ($this->getAttribute(($context["available_chat_actions"] ?? null), "winks", [])) {
            // line 332
            echo "                <button type=\"button\" class=\"btn btn-default\" data-action=\"wink\">
                    ";
            // line 333
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_wink"            ,"chatbox"            ,            );
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
            // line 334
            echo "                </button>
            ";
        }
        // line 336
        echo "
            <div class=\"chatbox-dialog__chars\">
                <div class=\"chatbox-dialog__chars-written\" id=\"chb_chars_written\">
                    ";
        // line 339
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_chars_written"        ,"chatbox"        ,        );
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
        // line 340
        echo "                    <span>0</span>
                </div>
                <div class=\"chatbox-dialog__chars-min\" id=\"chb_min_chars\">
                    ";
        // line 343
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_min_chars"        ,"chatbox"        ,        );
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
        // line 344
        echo "                    <span></span>
                </div>
                <div class=\"chatbox-dialog__chars-max\" id=\"chb_max_chars\">
                    ";
        // line 347
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_max_chars"        ,"chatbox"        ,        );
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
        // line 348
        echo "                    <span></span>
                </div>
            </div>
        </div>
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "dialog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1710 => 348,  1689 => 347,  1684 => 344,  1663 => 343,  1658 => 340,  1637 => 339,  1632 => 336,  1628 => 334,  1607 => 333,  1604 => 332,  1601 => 331,  1597 => 329,  1576 => 328,  1573 => 327,  1570 => 326,  1566 => 324,  1545 => 323,  1542 => 322,  1539 => 321,  1536 => 315,  1515 => 314,  1491 => 312,  1487 => 310,  1460 => 283,  1455 => 280,  1434 => 279,  1407 => 274,  1401 => 271,  1397 => 270,  1387 => 262,  1379 => 259,  1358 => 258,  1354 => 256,  1345 => 252,  1341 => 250,  1320 => 249,  1314 => 246,  1310 => 244,  1305 => 243,  1300 => 240,  1279 => 239,  1274 => 236,  1267 => 234,  1239 => 231,  1236 => 230,  1229 => 227,  1226 => 226,  1223 => 225,  1201 => 224,  1198 => 223,  1176 => 222,  1173 => 221,  1170 => 220,  1165 => 219,  1162 => 218,  1157 => 217,  1154 => 216,  1149 => 215,  1146 => 214,  1141 => 213,  1138 => 212,  1133 => 211,  1131 => 210,  1126 => 208,  1123 => 207,  1118 => 206,  1112 => 204,  1108 => 203,  1102 => 200,  1079 => 199,  1076 => 198,  1071 => 195,  1060 => 192,  1055 => 191,  1051 => 190,  1047 => 188,  1045 => 187,  1040 => 184,  1015 => 183,  990 => 182,  987 => 181,  981 => 178,  977 => 176,  974 => 175,  970 => 173,  949 => 172,  946 => 171,  944 => 170,  941 => 169,  934 => 168,  925 => 164,  920 => 161,  917 => 160,  895 => 159,  892 => 158,  870 => 157,  868 => 156,  864 => 155,  858 => 151,  856 => 150,  828 => 148,  824 => 147,  821 => 146,  799 => 145,  777 => 144,  769 => 137,  761 => 134,  740 => 133,  736 => 131,  727 => 127,  723 => 125,  702 => 124,  696 => 121,  692 => 119,  687 => 118,  682 => 115,  661 => 114,  656 => 111,  649 => 109,  621 => 106,  618 => 105,  611 => 102,  608 => 101,  605 => 100,  583 => 99,  580 => 98,  558 => 97,  555 => 96,  552 => 95,  547 => 94,  544 => 93,  539 => 92,  536 => 91,  531 => 90,  528 => 89,  523 => 88,  520 => 87,  515 => 86,  513 => 85,  508 => 83,  505 => 82,  500 => 81,  494 => 79,  490 => 78,  484 => 75,  461 => 74,  458 => 73,  453 => 70,  442 => 67,  437 => 66,  433 => 65,  429 => 63,  427 => 62,  422 => 59,  397 => 58,  372 => 57,  369 => 56,  363 => 53,  359 => 51,  356 => 50,  352 => 48,  331 => 47,  328 => 46,  326 => 45,  323 => 44,  316 => 43,  307 => 39,  302 => 36,  281 => 35,  277 => 34,  250 => 29,  227 => 28,  204 => 27,  198 => 24,  175 => 23,  148 => 18,  124 => 16,  120 => 14,  117 => 13,  96 => 12,  72 => 11,  69 => 10,  47 => 9,  45 => 8,  39 => 5,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "dialog.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/dialog.twig");
    }
}
