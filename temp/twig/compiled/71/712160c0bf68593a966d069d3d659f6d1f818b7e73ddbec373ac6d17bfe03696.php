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

/* ajax_attach_form.twig */
class __TwigTemplate_676bde48c2e86917d8c205a907a54126a9746fdee63b13d46f70683a1cdac499 extends \Twig\Template
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
        echo "<div class=\"chatbox-amedia\">
    <h1>";
        // line 2
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_select_images"        ,"chatbox"        ,        );
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
        echo "</h1>
    <div class=\"chatbox-amedia__list clearfix\">
        <ul id=\"chb_amedia_list\" class=\"clearfix\">
            ";
        // line 5
        $this->loadTemplate("block_media_list.twig", "ajax_attach_form.twig", 5)->display(twig_array_merge($context, ["items" => $this->getAttribute(($context["amedia"] ?? null), "items", [])]));
        // line 6
        echo "        </ul>
    </div>
    ";
        // line 8
        if ($this->getAttribute(($context["amedia"] ?? null), "show_more", [])) {
            // line 9
            echo "        <div class=\"chatbox-amedia__more\">
            <button type=\"button\" class=\"btn btn-primary\" data-click=\"show_more_amedia\">
                ";
            // line 11
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("show_more"            ,"start"            ,            );
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
            // line 12
            echo "            </button>
        </div>
    ";
        }
        // line 15
        echo "    ";
        if (twig_length_filter($this->env, $this->getAttribute(($context["amedia"] ?? null), "items", []))) {
            // line 16
            echo "        <div class=\"chatbox-amedia__submit\">
            <button type=\"button\" class=\"btn btn-red\" data-click=\"hide_attach_form\">
                ";
            // line 18
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_ok"            ,"start"            ,            );
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
            echo "                <span id=\"chb_amedia_count\">(0)</span>
            </button>
        </div>
    ";
        }
        // line 23
        echo "</div>

<script>
    \$(function () {
        if (typeof window.chatbox != 'undefined' && window.chatbox.properties.attachedMediaIds.length) {
            \$('#chb_amedia_list li').each(function () {
                if (window.chatbox.properties.attachedMediaIds.indexOf(parseInt(\$(this).data('id'))) !== -1) {
                    \$(this).addClass('selected');
                }
            });
        }

        \$('#chb_amedia_list').off('click', '[data-click=add_amedia]').on('click', '[data-click=add_amedia]', function () {
            let mediaId  = \$(this).data('id') || 0;
            let thumbSrc = \$(this).data('src') || '';

            if (typeof window.chatbox != 'undefined') {
                if (\$(this).hasClass('selected')) {
                    window.chatbox.deleteAttachMedia(mediaId);
                    \$(this).removeClass('selected');
                } else {
                    if (window.chatbox.properties.maxAttachedMedia
                        && window.chatbox.properties.attachedMediaIds.length >= window.chatbox.properties.maxAttachedMedia
                    ) {
                        return false;
                    }

                    \$(this).addClass('selected');
                    window.chatbox.addAttachMedia(mediaId, thumbSrc);
                }

                \$('#chb_amedia_count').html('(' + window.chatbox.properties.attachedMediaIds.length + ')');
            }
            return false;
        });

        \$('[data-click=show_more_amedia]').off('click').click(function (e) {
            e.preventDefault();
            if (typeof window.chatbox != 'undefined') {
                window.chatbox.getNextAttachMediaList();
            }
            return false;
        });

        \$('[data-click=hide_attach_form]').off('click').click(function (e) {
            e.preventDefault();
            if (typeof window.chatbox != 'undefined') {
                window.chatbox.properties.modal.hide_load_block();
            }
            return false;
        });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "ajax_attach_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 23,  124 => 19,  103 => 18,  99 => 16,  96 => 15,  91 => 12,  70 => 11,  66 => 9,  64 => 8,  60 => 6,  58 => 5,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "ajax_attach_form.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/chatbox/views/gentelella_operator/ajax_attach_form.twig");
    }
}
