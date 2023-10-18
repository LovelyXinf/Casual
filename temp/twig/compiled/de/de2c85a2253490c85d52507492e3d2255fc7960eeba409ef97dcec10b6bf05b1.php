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

/* edit_system_operators.twig */
class __TwigTemplate_f8733b97572577a8135ef1439886501c5ed9d4d4d23d3bf7e2dcf19be5ff3824 extends \Twig\Template
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
        echo "<br>
<ul id=\"operators_sorting\">
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["system_data"] ?? null), "operators_data", []));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 4
            echo "        <li id=\"operator_";
            echo $context["key"];
            echo "\" class=\"panel\">
            <div class=\"icons pull-right\">
                ";
            // line 6
            if (($this->getAttribute($this->getAttribute(($context["system_data"] ?? null), "tarifs_status", []), $context["key"]) > 0)) {
                // line 7
                echo "                    <a href=\"#\" class=\"deactivate_link\">
                        ";
                // line 8
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("make_inactive"                ,"start"                ,                );
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
                echo "                    </a>
                ";
            } else {
                // line 11
                echo "                    <a href=\"#\" class=\"activate_link\">
                        ";
                // line 12
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("make_active"                ,"start"                ,                );
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
                ";
            }
            // line 15
            echo "                <a href=\"#\" class=\"add_link\">
                    ";
            // line 16
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_add"            ,"start"            ,            );
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
            // line 17
            echo "                </a>
                <a href=\"#\" class=\"edit_link\">
                    ";
            // line 19
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_edit"            ,"start"            ,            );
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
            // line 20
            echo "                </a>
                <a href=\"#\" class=\"delete_link\">
                    ";
            // line 22
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_delete"            ,"start"            ,            );
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
            // line 23
            echo "                </a>
            </div>

            ";
            // line 26
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_system_tarifs"            ,"payments"            ,            );
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
            // line 27
            echo "            (";
            echo (((isset($context["item"]) || array_key_exists("item", $context))) ? (_twig_default_filter($context["item"], "&nbsp;")) : ("&nbsp;"));
            echo ", ";
            $module =             null;
            $helper =             'start';
            $name =             'currency_output';
            $params = array(            );
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
            echo "):
          ";
            // line 28
            if (($this->getAttribute($this->getAttribute(($context["system_data"] ?? null), "tarifs_status", []), $context["key"]) > 0)) {
                // line 29
                echo "            ";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_tableicon_is_inactive"                ,"start"                ,                );
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
                echo "          ";
            } else {
                // line 31
                echo "            ";
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
                // line 32
                echo "          ";
            }
            // line 33
            echo "
            <div class=\"tarifs form-group\" id=\"";
            // line 34
            echo $context["key"];
            echo "_tarifs_block\">
                ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["system_data"] ?? null), "tarifs_data", []), $context["key"]));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["tarif_key"] => $context["tarif_item"]) {
                // line 36
                echo "                    <div class=\"tarif_row form-group\">
                      <div class=\"media\">
                        <a href=\"#\" class=\"remove_link pull-right\">
                            ";
                // line 39
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
                echo "</a>
                        <div class=\"media-body\">
                          <input type=\"text\" name=\"tarifs_data[";
                // line 41
                echo $context["key"];
                echo "][]\" value=\"";
                echo twig_escape_filter($this->env, $context["tarif_item"]);
                echo "\" class=\"form-control\">
                        </div>
                      </div>
                    </div>
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 46
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, 2));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 47
                    echo "                        <div class=\"tarif_row form-group\">
                          <div class=\"media\">
                            <a href=\"#\" class=\"remove_link pull-right\">
                              ";
                    // line 50
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("btn_delete"                    ,"start"                    ,                    );
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
                            <div class=\"media-body\">
                              <input type=\"text\" name=\"tarifs_data[";
                    // line 52
                    echo $context["key"];
                    echo "][]\" value=\"\" class=\"form-control\">
                            </div>
                          </div>
                        </div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 57
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['tarif_key'], $context['tarif_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                <div class=\"tarif_row form-group\">
                  <div class=\"media\">
                    <a href=\"#\" class=\"remove_link pull-right\">
                      ";
            // line 61
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_delete"            ,"start"            ,            );
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
                    <div class=\"media-body\">
                      <input type=\"text\" name=\"tarifs_data[";
            // line 63
            echo $context["key"];
            echo "][]\" value=\"\" class=\"form-control\">
                    </div>
                  </div>
                </div>
            </div>
            <div id=\"";
            // line 68
            echo $context["key"];
            echo "_tarif_block\" class=\"form-group hide\">
                <div class=\"tarif_row form-group\">
                  <div class=\"media\">
                    <a href=\"#\" class=\"remove_link pull-right\">
                        ";
            // line 72
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_delete"            ,"start"            ,            );
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
                    <div class=\"media-body\">
                      <input type=\"text\" name=\"tarifs_data[";
            // line 74
            echo $context["key"];
            echo "][]\" value=\"\"  class=\"form-control\">
                    </div>
                  </div>
                </div>
            </div>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "edit_system_operators.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  465 => 81,  452 => 74,  428 => 72,  421 => 68,  413 => 63,  389 => 61,  384 => 58,  378 => 57,  367 => 52,  343 => 50,  338 => 47,  333 => 46,  321 => 41,  297 => 39,  292 => 36,  287 => 35,  283 => 34,  280 => 33,  277 => 32,  255 => 31,  252 => 30,  230 => 29,  228 => 28,  202 => 27,  181 => 26,  176 => 23,  155 => 22,  151 => 20,  130 => 19,  126 => 17,  105 => 16,  102 => 15,  98 => 13,  77 => 12,  74 => 11,  70 => 9,  49 => 8,  46 => 7,  44 => 6,  38 => 4,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "edit_system_operators.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/payments/views/gentelella/edit_system_operators.twig");
    }
}
