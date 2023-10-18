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

/* domains.twig */
class __TwigTemplate_35f2644db1e9fe41c4855607375f0915e9b2ae99fd02d2336a15c84cab73b4be extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "domains.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"col-md-12 col-sm-12 col-xs-12\">
    <div class=\"x_panel\">
        <div class=\"x_content\">
            <div id=\"actions\">
                <div class=\"btn-group\">
                    <a href=\"";
        // line 8
        echo ($context["site_url"] ?? null);
        echo "admin/start/domains_edit\" class=\"btn btn-primary\">";
        // line 9
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("link_add_domain"        ,"start"        ,        );
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
        echo "                    </a>
                </div>
            </div>
            <table id=\"datatable\" class=\"table table-striped responsive-utilities jambo_table\">
                <thead>
                    <tr class=\"headings\">
                        <th class=\"column-title\" data-field=\"domain\" data-action=\"sorting\">";
        // line 16
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_domain"        ,"start"        ,        );
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
        echo "</th>";
        // line 18
        echo "                        <th class=\"column-title\" data-field=\"date_added\" data-action=\"sorting\">";
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("field_date_added"        ,"start"        ,        );
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
                <tbody>";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["domains"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["domain"]) {
            // line 24
            echo "                        <tr class=\"even pointer\">
                            <td>";
            // line 26
            echo $this->getAttribute($context["domain"], "domain", []);
            echo "
                            </td>";
            // line 31
            echo "                            <td>";
            // line 32
            echo $this->getAttribute($context["domain"], "date_added", []);
            echo "
                            </td>
                            <td class=\"icons\">
                                <div class=\"btn-group\">
                                    <button type=\"button\"
                                        class=\"btn btn-primary\" title=\"";
            // line 37
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_domain"            ,"start"            ,            );
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
                                        onclick = \"document.location.href='";
            // line 38
            echo ($context["site_url"] ?? null);
            echo "admin/start/domains_edit/";
            echo $this->getAttribute($context["domain"], "id", []);
            echo "'\">";
            // line 39
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_domain"            ,"start"            ,            );
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
            // line 40
            echo "                                    </button>
                                    <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\"
                                            aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <span class=\"caret\"></span>
                                        <span class=\"sr-only\">Toggle Dropdown</span>
                                    </button>
                                    <ul class=\"dropdown-menu\">
                                        <li>
                                            <a href=\"";
            // line 48
            echo ($context["site_url"] ?? null);
            echo "admin/start/domains_edit/";
            echo $this->getAttribute($context["domain"], "id", []);
            echo "\">";
            // line 49
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_edit_domain"            ,"start"            ,            );
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
            // line 50
            echo "                                            </a>
                                        </li>
                                        <li>
                                            <a href=\"";
            // line 53
            echo ($context["site_url"] ?? null);
            echo "admin/start/domains_delete/";
            echo $this->getAttribute($context["domain"], "id", []);
            echo "\" onclick=\"javascript:if(!confirm('";
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("note_delete_domain"            ,"start"            ,            );
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
            echo "')) return false;\">";
            // line 54
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("link_delete_domain"            ,"start"            ,            );
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
            echo "                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 62
            echo "                        <tr>
                            <td colspan=\"3\" style=\"text-align:center;\">";
            // line 64
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("no_domains"            ,"start"            ,            );
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
            // line 65
            echo "                            </td>
                        </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['domain'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "                </tbody>
            </table>
        </div>";
        // line 71
        $this->loadTemplate("@app/pagination.twig", "domains.twig", 71)->display($context);
        // line 72
        echo "    </div>
</div>";
        // line 75
        $this->loadTemplate("@app/footer.twig", "domains.twig", 75)->display($context);
    }

    public function getTemplateName()
    {
        return "domains.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 75,  327 => 72,  325 => 71,  321 => 68,  314 => 65,  293 => 64,  290 => 62,  280 => 55,  259 => 54,  233 => 53,  228 => 50,  207 => 49,  202 => 48,  192 => 40,  171 => 39,  166 => 38,  143 => 37,  135 => 32,  133 => 31,  129 => 26,  126 => 24,  121 => 23,  94 => 18,  72 => 16,  64 => 10,  43 => 9,  40 => 8,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "domains.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/modules/start/views/gentelella/domains.twig");
    }
}
