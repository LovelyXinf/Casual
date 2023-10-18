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

/* list_langs.twig */
class __TwigTemplate_740b5fd88b1d7ff904cc23d530725c0a72572f8cb882a4d120105a4fb59e3443 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "list_langs.twig", 1)->display($context);
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
        // line 8
        echo "            </ul>
        </div>
        <div class=\"x_content\">
            <div id=\"actions\" class=\"hide\">
              <div class=\"btn-group\">
                <a onclick=\"";
        // line 13
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("languages"        ,"btn_add_language"        ,        );
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
        echo "\" href=\"";
        echo ($context["site_url"] ?? null);
        echo "admin/languages/lang_edit\" class=\"btn btn-primary\">
                    ";
        // line 14
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_lang"        ,"languages"        ,        );
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
        // line 15
        echo "                </a>
                <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                        aria-haspopup=\"true\" aria-expanded=\"false\">
                    <span class=\"caret\"></span>
                    <span class=\"sr-only\">Toggle Dropdown</span>
                </button>
                <ul class=\"dropdown-menu\">
                    <li onclick=\"";
        // line 22
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("languages"        ,"btn_add_language"        ,        );
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
        // line 23
        echo ($context["site_url"] ?? null);
        echo "admin/languages/lang_edit\">
                            ";
        // line 24
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_lang"        ,"languages"        ,        );
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
        // line 25
        echo "                        </a>
                    </li>
                </ul>
              </div>
            </div>
            <table id=\"users\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\">";
        // line 33
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_language_name"        ,"languages"        ,        );
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
        // line 34
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_default"        ,"languages"        ,        );
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
        // line 35
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_active"        ,"languages"        ,        );
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
                        <th class=\"column-title\">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 41
            echo "                        <tr class=\"even pointer\">
                            <td>";
            // line 42
            echo $this->getAttribute($context["item"], "name", []);
            echo "</td>
                            <td>
                                ";
            // line 44
            if ($this->getAttribute($context["item"], "is_default", [])) {
                // line 45
                echo "                                    ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_tableicon_yes"                ,"start"                ,                );
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
                echo "                                ";
            } else {
                // line 47
                echo "                                    ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_tableicon_no"                ,"start"                ,                );
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
                echo "                                ";
            }
            // line 49
            echo "                            </td>
                            <td>
                                ";
            // line 51
            if ($this->getAttribute($context["item"], "status", [])) {
                // line 52
                echo "                                    ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_tableicon_is_active"                ,"start"                ,                );
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
                // line 53
                echo "                                ";
            } else {
                // line 54
                echo "                                    ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_tableicon_is_not_active"                ,"start"                ,                );
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
                echo "                                ";
            }
            // line 56
            echo "                            </td>
                            <td class=\"icons\">
                                <div class=\"btn-group\">
                                  ";
            // line 59
            if ( !$this->getAttribute($context["item"], "is_default", [])) {
                // line 60
                echo "                                    <button type=\"button\" class=\"btn btn-primary\"
                                            title=\"";
                // line 61
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_set_default"                ,"languages"                ,                );
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
                                            onclick=\"";
                // line 62
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("languages"                ,"btn_set_as_default"                ,                );
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
                echo "admin/languages/lang_default/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "'\">
                                        ";
                // line 63
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_set_default"                ,"languages"                ,                );
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
                echo "                                    </button>
                                  ";
            } else {
                // line 66
                echo "                                    <a class=\"btn btn-primary\" href=\"";
                echo ($context["site_url"] ?? null);
                echo "admin/languages/lang_edit/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\">
                                          ";
                // line 67
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_edit_lang"                ,"languages"                ,                );
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
                // line 68
                echo "                                    </a>
                                  ";
            }
            // line 70
            echo "                                    <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                            aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <span class=\"caret\"></span>
                                        <span class=\"sr-only\">Toggle Dropdown</span>
                                    </button>
                                    <ul class=\"dropdown-menu\">
                                        ";
            // line 76
            if ( !$this->getAttribute($context["item"], "is_default", [])) {
                // line 77
                echo "                                        <li onclick=\"";
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("languages"                ,"btn_set_as_default"                ,                );
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
                // line 78
                echo ($context["site_url"] ?? null);
                echo "admin/languages/lang_default/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\">
                                                ";
                // line 79
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_set_default"                ,"languages"                ,                );
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
                // line 80
                echo "                                            </a>
                                        </li>
                                        <li>
                                        ";
                // line 83
                if ($this->getAttribute($context["item"], "status", [])) {
                    // line 84
                    echo "                                            <a href=\"";
                    echo ($context["site_url"] ?? null);
                    echo "admin/languages/lang_active/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "/0\">
                                                ";
                    // line 85
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("make_inactive"                    ,"start"                    ,                    );
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
                    // line 86
                    echo "                                            </a>
                                        ";
                } else {
                    // line 88
                    echo "                                            <a href=\"";
                    echo ($context["site_url"] ?? null);
                    echo "admin/languages/lang_active/";
                    echo $this->getAttribute($context["item"], "id", []);
                    echo "/1\">
                                                ";
                    // line 89
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("make_active"                    ,"start"                    ,                    );
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
                    // line 90
                    echo "                                            </a>
                                        ";
                }
                // line 92
                echo "                                        </li>
                                        ";
            }
            // line 94
            echo "                                        <li>
                                            <a href=\"";
            // line 95
            echo ($context["site_url"] ?? null);
            echo "admin/languages/lang_edit/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\">
                                                ";
            // line 96
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_lang"            ,"languages"            ,            );
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
            // line 97
            echo "                                            </a>
                                        </li>
                                        ";
            // line 99
            if ((($this->getAttribute(($context["user_session_data"] ?? null), "lang_id", []) != $this->getAttribute($context["item"], "id", [])) && (($context["default_lang_id"] ?? null) != $this->getAttribute($context["item"], "id", [])))) {
                // line 100
                echo "                                            <li>
                                                <a href=\"";
                // line 101
                echo ($context["site_url"] ?? null);
                echo "admin/languages/lang_delete/";
                echo $this->getAttribute($context["item"], "id", []);
                echo "\"
                                                   onclick=\"javascript: if (!confirm('";
                // line 102
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("note_delete_lang"                ,"languages"                ,""                ,"js"                ,                );
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
                echo "'))return false;\">
                                                    ";
                // line 103
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("link_delete_lang"                ,"languages"                ,                );
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
                // line 104
                echo "                                                </a>
                                            </li>
                                        ";
            }
            // line 107
            echo "                                    </ul>
                                </div>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 112
        echo "                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Datatables -->
<script>
    var asInitVals = new Array();
    \$(document).ready(function () {
        var oTable = \$('#users').dataTable({
            \"oLanguage\": {
                \"sSearch\": \"";
        // line 124
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
        // line 125
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
        \$('#users_wrapper').find('.actions').html(actions.html());
        actions.remove();
    });
</script>

";
        // line 163
        if (($context["TRIAL_MODE"] ?? null)) {
            // line 164
            echo "<script>
    \$(function(){
        var href = \$('#languages_pages_item').attr('href');
        href = href.replace('/pages/', '/pages/1/2');
        \$('#languages_pages_item').attr('href', href);
    });
</script>
";
        }
        // line 171
        echo " 

";
        // line 173
        $this->loadTemplate("@app/footer.twig", "list_langs.twig", 173)->display($context);
    }

    public function getTemplateName()
    {
        return "list_langs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  843 => 173,  839 => 171,  829 => 164,  827 => 163,  767 => 125,  744 => 124,  730 => 112,  720 => 107,  715 => 104,  694 => 103,  671 => 102,  665 => 101,  662 => 100,  660 => 99,  656 => 97,  635 => 96,  629 => 95,  626 => 94,  622 => 92,  618 => 90,  597 => 89,  590 => 88,  586 => 86,  565 => 85,  558 => 84,  556 => 83,  551 => 80,  530 => 79,  524 => 78,  500 => 77,  498 => 76,  490 => 70,  486 => 68,  465 => 67,  458 => 66,  454 => 64,  433 => 63,  406 => 62,  383 => 61,  380 => 60,  378 => 59,  373 => 56,  370 => 55,  348 => 54,  345 => 53,  323 => 52,  321 => 51,  317 => 49,  314 => 48,  292 => 47,  289 => 46,  267 => 45,  265 => 44,  260 => 42,  257 => 41,  253 => 40,  226 => 35,  203 => 34,  180 => 33,  170 => 25,  149 => 24,  145 => 23,  122 => 22,  113 => 15,  92 => 14,  67 => 13,  60 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "list_langs.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/languages/views/gentelella/list_langs.twig");
    }
}
