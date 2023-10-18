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

/* contacts.twig */
class __TwigTemplate_39d88f88f8301d721609991824e83d0cb5b41680172f8f21a55212be9f244524 extends \Twig\Template
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
        $context['_seq'] = twig_ensure_traversable(($context["contacts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dialog"]) {
            // line 2
            echo "    <li class=\"chatbox-contacts__user\" data-contact-id=\"";
            echo $this->getAttribute($this->getAttribute($context["dialog"], "contact", []), "id", []);
            echo "\" id=\"chb_contact_";
            echo $this->getAttribute($this->getAttribute($context["dialog"], "contact", []), "id", []);
            echo "\" data-udate=\"";
            echo $this->getAttribute($context["dialog"], "date_update", []);
            echo "\" data-id=\"";
            echo $this->getAttribute($context["dialog"], "id", []);
            echo "\">
        <div class=\"chatbox-contacts__photo\">
            <img src=\"";
            // line 4
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["dialog"], "contact", []), "media", []), "user_logo", []), "thumbs", []), "small", []);
            echo "\" />
        </div>
        <div class=\"chatbox-contacts__content\">
            <div class=\"chatbox-contacts__cinner\">
                <span class=\"chatbox-contacts__date\">";
            // line 8
            $module =             null;
            $helper =             'date_format';
            $name =             'tpl_date_format';
            $params = array($this->getAttribute($this->getAttribute(($context["dialog"] ?? null), "last_message", []), "date_added", [])            ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])            ,            );
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
                <div class=\"chatbox-contacts__new_msg\">";
            // line 9
            if (($this->getAttribute($context["dialog"], "count_new", []) > 0)) {
                echo "<span>";
                echo $this->getAttribute($context["dialog"], "count_new", []);
                echo "</span>";
            }
            echo "</div>
                <div class=\"chatbox-contacts__username\">
                    ";
            // line 11
            if ($this->getAttribute($this->getAttribute($context["dialog"], "contact", []), "online_status", [])) {
                echo "<span class=\"chatbox-contacts__online\"></span>";
            }
            // line 12
            echo "                    ";
            echo $this->getAttribute($this->getAttribute($context["dialog"], "contact", []), "output_name", []);
            if ($this->getAttribute($this->getAttribute($context["dialog"], "contact", []), "age", [])) {
                echo ", ";
                echo $this->getAttribute($this->getAttribute($context["dialog"], "contact", []), "age", []);
            }
            // line 13
            echo "                </div>
                <div class=\"chatbox-contacts__message chatbox-contacts__message-";
            // line 14
            echo $this->getAttribute($this->getAttribute($context["dialog"], "last_message", []), "message_type", []);
            echo "\">
                    ";
            // line 15
            if (($this->getAttribute($this->getAttribute($context["dialog"], "last_message", []), "dir", []) == "o")) {
                echo "<span class=\"chatbox-contacts__your\">";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("text_your"                ,"chatbox"                ,                );
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
                echo ": </span>";
            }
            // line 16
            echo "                    ";
            echo $this->getAttribute($this->getAttribute($context["dialog"], "last_message", []), "short_message", []);
            echo "
                </div>
                ";
            // line 19
            echo "            </div>
        </div>
    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dialog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "contacts.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 19,  128 => 16,  103 => 15,  99 => 14,  96 => 13,  89 => 12,  85 => 11,  76 => 9,  53 => 8,  46 => 4,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "contacts.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/contacts.twig");
    }
}
