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

/* messages.twig */
class __TwigTemplate_56fc6648a6f2456fba2632d3d5f5e335b7b3bc811128d4d25881a6ff35bb7446 extends \Twig\Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["messages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 2
            echo "    <li class=\"chatbox-messages__item ";
            if (($this->getAttribute($context["message"], "dir", []) == "o")) {
                echo "user-message";
            }
            echo "\" data-message-id=\"";
            echo $this->getAttribute($context["message"], "id", []);
            echo "\" id=\"chb_msg_";
            echo $this->getAttribute($context["message"], "id", []);
            echo "\" data-date-added=\"";
            echo $this->getAttribute($context["message"], "date_added", []);
            echo "\">
        ";
            // line 3
            if ((twig_test_empty(($context["last_message_time"] ?? null)) || (($context["last_message_time"] ?? null) != twig_date_format_filter($this->env, $this->getAttribute($context["message"], "date_added", []), "Y-m-d H:i")))) {
                // line 4
                echo "            <div class=\"chatbox-messages__time\">";
                $module =                 null;
                $helper =                 'date_format';
                $name =                 'tpl_date_format';
                $params = array($this->getAttribute(($context["message"] ?? null), "date_added", [])                ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])                ,                );
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
        ";
            }
            // line 6
            echo "        ";
            // line 7
            echo "        ";
            // line 14
            echo "        ";
            // line 15
            echo "        <div class=\"chatbox-messages__content\">
            <div class=\"chatbox-messages__bubble ";
            // line 16
            if (($this->getAttribute($context["message"], "dir", []) == "o")) {
                echo "chatbox-messages__bubble-left";
            } else {
                echo "chatbox-messages__bubble-right";
            }
            echo " chatbox-messages__";
            echo $this->getAttribute($context["message"], "message_type", []);
            echo "\">
                ";
            // line 26
            echo "                ";
            if ($this->getAttribute($context["message"], "message", [])) {
                // line 27
                echo "                    <div class=\"chatbox-messages__message ";
                if ($this->getAttribute($context["message"], "attaches_count", [])) {
                    echo "pb5";
                }
                echo "\">
                        ";
                // line 28
                if ($this->getAttribute($context["message"], "is_mass_pokes", [])) {
                    // line 29
                    echo "                            <i class=\"fa fa-paper-plane\" aria-hidden=\"true\" title=\"";
                    $module =                     null;
                    $helper =                     'lang';
                    $name =                     'l';
                    $params = array("title_mass_pokes"                    ,"chatbox"                    ,""                    ,"button"                    ,                    );
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
                    echo "\" style=\"margin-right: 10px;\"></i>
                        ";
                }
                // line 31
                echo "                        ";
                echo $this->getAttribute($context["message"], "message", []);
                echo "
                    </div>
                ";
            }
            // line 34
            echo "                ";
            if ($this->getAttribute($context["message"], "attaches_count", [])) {
                // line 35
                echo "                    <div class=\"chatbox-messages__images\">
                    ";
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["message"], "attaches", []));
                foreach ($context['_seq'] as $context["key"] => $context["attach"]) {
                    // line 37
                    echo "                        <img class=\"chatbox-messages__message-image\" src=\"";
                    echo $this->getAttribute($context["attach"], "big", []);
                    echo "\" gallery-src=\"";
                    echo $this->getAttribute($context["attach"], "grand", []);
                    echo "\" data-msg-id=\"";
                    echo $this->getAttribute($context["message"], "id", []);
                    echo "\" data-click=\"view_media\" />
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['attach'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "                    </div>
                ";
            }
            // line 41
            echo "                ";
            // line 42
            echo "            </div>
        </div>
        ";
            // line 44
            $context["last_message_dir"] = $this->getAttribute($context["message"], "dir", []);
            // line 45
            echo "        ";
            $context["last_message_time"] = twig_date_format_filter($this->env, $this->getAttribute($context["message"], "date_added", []), "Y-m-d H:i");
            // line 46
            echo "    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "messages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 46,  172 => 45,  170 => 44,  166 => 42,  164 => 41,  160 => 39,  147 => 37,  143 => 36,  140 => 35,  137 => 34,  130 => 31,  105 => 29,  103 => 28,  96 => 27,  93 => 26,  83 => 16,  80 => 15,  78 => 14,  76 => 7,  74 => 6,  49 => 4,  47 => 3,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "messages.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/messages.twig");
    }
}
