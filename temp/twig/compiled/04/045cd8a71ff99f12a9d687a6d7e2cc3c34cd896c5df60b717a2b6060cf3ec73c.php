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

/* notes.twig */
class __TwigTemplate_f47a0e9a4eaf5304b9626cf562e4dcb9735c9037361c99dbb57081e366dddb65 extends \Twig\Template
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
        $context['_seq'] = twig_ensure_traversable(($context["notes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
            // line 2
            echo "    <li class=\"chatbox-notes__list-item\" id=\"chb_note_";
            echo $this->getAttribute($context["note"], "id", []);
            echo "\" data-id=\"";
            echo $this->getAttribute($context["note"], "id", []);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "category_str", []));
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "date_added", []));
            echo "\">
        ";
            // line 11
            echo "        <div class=\"chatbox-notes__list-category\">
            ";
            // line 12
            echo $this->getAttribute($context["note"], "category_str", []);
            echo "
        </div>
        <div class=\"chatbox-notes__list-date\">
            ";
            // line 15
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
            // line 16
            echo "        </div>
        <div class=\"chatbox-notes__list-message\" ";
            // line 17
            echo "data-id=\"";
            echo $this->getAttribute($context["note"], "id", []);
            echo "\" ";
            echo ">";
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["note"], "message", []), "html", null, true));
            echo "</div>
        ";
            // line 21
            echo "    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "notes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 21,  78 => 17,  75 => 16,  54 => 15,  48 => 12,  45 => 11,  34 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "notes.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/notes.twig");
    }
}
