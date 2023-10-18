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

/* block_media_list.twig */
class __TwigTemplate_975aff5e29ed0ce5eb71ba9138a95e29f66e9fd275a5ce537f269dbf9ee8b614 extends \Twig\Template
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
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 2
            echo "    <li data-click=\"add_amedia\" data-id=\"";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\" data-src=\"";
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "media", []), "mediafile", []), "thumbs", []), "middle", []);
            echo "\">
        <div>
            <img src=\"";
            // line 4
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "media", []), "mediafile", []), "thumbs", []), "big", []);
            echo "\" alt=\"";
            echo $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "media", []), "mediafile", []), "photo_alt", []);
            echo "\">
            ";
            // line 5
            if ($this->getAttribute($context["item"], "last_used", [])) {
                // line 6
                echo "                ";
                $module =                 null;
                $helper =                 'date_format';
                $name =                 'tpl_date_format';
                $params = array($this->getAttribute(($context["item"] ?? null), "last_used", [])                ,$this->getAttribute(($context["date_format_st"] ?? null), "date_time_literal", [])                ,                );
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
                $context['last_used_str'] = $result;
                // line 7
                echo "                <div class=\"chatbox-amedia__last-used\" title=\"";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("text_media_last_used_date"                ,"chatbox"                ,""                ,"button"                ,["date" => ($context["last_used_str"] ?? null)]                ,                );
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
                    <i class=\"fa fa-check\"></i>
                </div>
            ";
            }
            // line 11
            echo "        </div>
    </li>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 14
            echo "    <li class=\"empty\">
        ";
            // line 15
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("empty_user_images"            ,"chatbox"            ,            );
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
            echo "    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "block_media_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 16,  110 => 15,  107 => 14,  100 => 11,  73 => 7,  51 => 6,  49 => 5,  43 => 4,  35 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "block_media_list.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/block_media_list.twig");
    }
}
