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

/* admin_moder_badwords.twig */
class __TwigTemplate_3d77a2fb527c3a5f28227a37dbb311a75134b8866c876c342418368e891940bb extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "admin_moder_badwords.twig", 1)->display($context);
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
        $params = array("admin_moderation_menu"        ,        );
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
        <div class=\"x_title\">
            <div class=\"col-md-12 col-sm-12 col-xs-12\">
                <div id=\"menu\" class=\"btn-group\" data-toggle=\"buttons\">
                    <label id=\"base_link\" class=\"btn btn-default";
        // line 13
        if (( !($context["type"] ?? null) || (($context["type"] ?? null) == "add"))) {
            echo " active";
        }
        echo "\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"javascript: openBW('base'); return false;\">
                        <input type=\"radio\" name=\"looking_user_type\" value=\"0\"";
        // line 16
        if (( !($context["type"] ?? null) || (($context["type"] ?? null) == "add"))) {
            echo " selected";
        }
        echo ">
                        ";
        // line 17
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_badwords_base"        ,"moderation"        ,        );
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
        // line 18
        echo "                    </label>
                    <label id=\"check_link\" class=\"btn btn-default";
        // line 19
        if ((($context["type"] ?? null) == "check_text")) {
            echo " active";
        }
        echo "\"
                           data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\"
                           onclick=\"javascript: openBW('check'); return false;\">
                        <input type=\"radio\" name=\"looking_user_type\" value=\"1\"";
        // line 22
        if ((($context["type"] ?? null) == "check_text")) {
            echo " selected";
        }
        echo ">
                        ";
        // line 23
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_check_text"        ,"moderation"        ,        );
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
        // line 24
        echo "                    </label>
                </div>
            </div>
            <div class=\"clearfix\"></div>
        </div>
        <div class=\"x_content\">
            <div class=\"col-md-12 col-sm-12 col-xs-12\" id=\"content\">
                <div id=\"base_content\" ";
        // line 31
        if ((($context["type"] ?? null) == "check_text")) {
            echo "class=\"hide\"";
        }
        echo ">
                    <form action=\"";
        // line 32
        echo ($context["site_url"] ?? null);
        echo "admin/moderation/badwords/add\" method=\"post\" enctype=\"multipart/form-data\"
                          name=\"save_form\" data-parsley-validate class=\"form-horizontal form-label-left\">
                        <div class=\"form-group\">
                            <label class=\"col-md-2 col-sm-2 col-xs-12\">
                                ";
        // line 36
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_add_badword"        ,"moderation"        ,        );
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
        echo ":</label>
                            <div class=\"col-md-8 col-sm-8 col-xs-8\">
                                <input type=\"text\" name=\"word\" value=\"\" class=\"form-control\">
                            </div>
                            ";
        // line 40
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
        $context['save_text'] = $result;
        // line 41
        echo "                            <input onclick=\"";
        $module =         null;
        $helper =         'start';
        $name =         'setAnalytics';
        $params = array("moderation"        ,"btn_badwords_save"        ,        );
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
        echo "\" class=\"btn btn-success\" type=\"submit\" name=\"submit\" value=\"";
        echo ($context["save_text"] ?? null);
        echo "\">
                        </div>
                        <div class=\"form-group\">
                            <div class=\"col-md-9 col-sm-9 col-xs-9 col-md-offset-2\">
                                <i>";
        // line 45
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("add_badword_hint"        ,"moderation"        ,        );
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
        echo "</i>
                            </div>
                        </div>
                        <div class=\"ln_solid\"></div>
                    </form>
                    <div class=\"col-md-12 col-sm-12 col-xs-12\">
                    ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["badwords"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 52
            echo "                        <div class=\"col-md-3 col-sm-3 col-xs-12\">
                            <div class=\"badw\">
                                <span>";
            // line 54
            echo $this->getAttribute($context["item"], "original", []);
            echo "</span>
                                <a href=\"";
            // line 55
            echo ($context["site_url"] ?? null);
            echo "admin/moderation/delete_badword/";
            echo $this->getAttribute($context["item"], "id", []);
            echo "\"
                                    onclick=\"javascript: if(!confirm('";
            // line 56
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("note_delete_object"            ,"moderation"            ,""            ,"js"            ,            );
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
            echo "')) return false;\">
                                    <i class=\"fa fa-trash\"></i>
                                </a>
                            </div>
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                        <div class=\"clearfix\"></div>
                    </div>
                </div>
                <div id=\"check_content\" ";
        // line 65
        if ((($context["type"] ?? null) != "check_text")) {
            echo "class=\"hide\"";
        }
        echo ">
                    <form action=\"";
        // line 66
        echo ($context["site_url"] ?? null);
        echo "admin/moderation/badwords/check_text\" method=\"post\" enctype=\"multipart/form-data\"
                        name=\"save_form\" data-parsley-validate class=\"form-horizontal form-label-left\">
                        <div class=\"form-group\">
                            <div class=\"col-md-12 col-sm-12 col-xs-12\">
                                <textarea name=\"text\" class=\"form-control\">";
        // line 70
        echo $this->getAttribute(($context["check_data"] ?? null), "text", []);
        echo "</textarea>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <div class=\"col-md-12 col-sm-12 col-xs-12\">
                                ";
        // line 75
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("header_check_text"        ,"moderation"        ,""        ,"button"        ,        );
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
        $context['check_text'] = $result;
        // line 76
        echo "                                <input type=\"submit\" name=\"submit\" class=\"btn btn-default\" value=\"";
        echo ($context["check_text"] ?? null);
        echo "\">
                            </div>
                        </div>
                    </form>
                ";
        // line 80
        if ($this->getAttribute(($context["check_data"] ?? null), "modified", [])) {
            // line 81
            echo "                    <div class=\"col-md-12 col-sm-12 col-xs-12\">
                        ";
            // line 82
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("header_badword_found"            ,"moderation"            ,            );
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
                        <label>";
            // line 83
            echo $this->getAttribute($this->getAttribute(($context["check_data"] ?? null), "modified", []), "count", []);
            echo "</label>
                    </div>
                    <div class=\"col-md-12 col-sm-12 col-xs-12\">
                        ";
            // line 86
            echo $this->getAttribute($this->getAttribute(($context["check_data"] ?? null), "modified", []), "text", []);
            echo "
                    </div>
                ";
        }
        // line 89
        echo "                </div>
            </div>
        </div>
    </div>
</div>

<script type=\"text/javascript\">
    function openBW(type){
        \$('#link li').removeClass('active');
        \$('#'+type+'_link').addClass('active');
        \$('#content > div').hide();
        \$('#'+type+'_content').show();
    }
</script>

";
        // line 104
        $this->loadTemplate("@app/footer.twig", "admin_moder_badwords.twig", 104)->display($context);
    }

    public function getTemplateName()
    {
        return "admin_moder_badwords.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  427 => 104,  410 => 89,  404 => 86,  398 => 83,  375 => 82,  372 => 81,  370 => 80,  362 => 76,  341 => 75,  333 => 70,  326 => 66,  320 => 65,  315 => 62,  284 => 56,  278 => 55,  274 => 54,  270 => 52,  266 => 51,  238 => 45,  209 => 41,  188 => 40,  162 => 36,  155 => 32,  149 => 31,  140 => 24,  119 => 23,  113 => 22,  105 => 19,  102 => 18,  81 => 17,  75 => 16,  67 => 13,  60 => 8,  39 => 7,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "admin_moder_badwords.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/moderation/views/gentelella/admin_moder_badwords.twig");
    }
}
