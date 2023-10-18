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

/* @app/footer.twig */
class __TwigTemplate_17c5c9e458138b4b3d37b036c6d02149c8f71ffdaf429c87fa9500fe9df772d6 extends \Twig\Template
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
        echo "                            </div>
                        </div>
                    </div>
                ";
        // line 5
        echo "                <footer ";
        if (($context["login_page"] ?? null)) {
            echo "class=\"footer-loginpage\"";
        }
        echo ">
                    ";
        // line 6
        if (($context["DEMO_MODE"] ?? null)) {
            // line 7
            echo "                        ";
            echo ($context["demo_copyright"] ?? null);
            echo "
                    ";
        } else {
            // line 9
            echo "                        ";
            $module =             null;
            $helper =             'start';
            $name =             'getCopyright';
            $params = array("operator"            ,            );
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
            echo "                    ";
        }
        // line 11
        echo "                </footer>
            </div>
    </div>
    ";
        // line 14
        $module =         null;
        $helper =         'languages';
        $name =         'lang_editor';
        $params = array(        );
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
        echo "    <div id=\"custom_notifications\" class=\"custom-notifications dsp_none\">
        <ul class=\"list-unstyled notifications clearfix\" data-tabbed_notifications=\"notif-group\">
        </ul>
        <div class=\"clearfix\"></div>
        <div id=\"notif-group\" class=\"tabbed_notifications\"></div>
    </div>

    <script type=\"text/javascript\" src=\"";
        // line 22
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/bootstrap.min.js\"></script>

    <!-- icheck -->
    <script type=\"text/javascript\" src=\"";
        // line 25
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/icheck/icheck.min.js\"></script>
    <!-- daterangepicker -->

    <script type=\"text/javascript\" src=\"";
        // line 28
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/moment.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 29
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/moment-with-locales.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 30
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/datepicker/daterangepicker.js\"></script>

    <script type=\"text/javascript\" src=\"";
        // line 32
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/custom.js\"></script>

    <!-- PNotify -->
    ";
        // line 38
        echo "    <script type=\"text/javascript\" src=\"";
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/pnotify/pnotify.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 39
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/pnotify/pnotify.animate.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 40
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/pnotify/pnotify.buttons.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 41
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/pnotify/pnotify.history.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 42
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/pnotify/pnotify.nonblock.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 43
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/pnotify/pnotify.confirm.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 44
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/errors.js\"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type=\"text/javascript\" src=\"";
        // line 47
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/excanvas.min.js\"></script><![endif]-->
    <script type=\"text/javascript\" src=\"";
        // line 48
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/jquery.flot.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 49
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/jquery.flot.pie.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 50
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/jquery.flot.orderBars.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 51
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/jquery.flot.time.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 52
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/date.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 53
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/jquery.flot.spline.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 54
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/jquery.flot.stack.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 55
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/curvedLines.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 56
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/flot/jquery.flot.resize.js\"></script>
    <!-- Datatables -->
    <script type=\"text/javascript\" src=\"";
        // line 58
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/datatables/js/jquery.dataTables.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 59
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/datatables/plugins/natural.js\"></script>
    <script>
        \$(document).ready(function () {
            PNotify.prototype.options.buttons.labels.stick = '";
        // line 62
        $module =         null;
        $helper =         'lang';
        $name =         'l';
        $params = array("notify_stick"        ,"start"        ,null        ,"js"        ,        );
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
        echo "';
            PNotify.prototype.options.delay = 5000;
        });
    </script>

    <!-- skycons -->
    <script src=\"";
        // line 68
        echo ($context["site_root"] ?? null);
        echo "application/views/gentelella_operator/js/skycons/skycons.js\"></script>
    <script>
        var icons = new Skycons({
                \"color\": \"#73879C\"
            }),
            list = [
                \"clear-day\", \"clear-night\", \"partly-cloudy-day\",
                \"partly-cloudy-night\", \"cloudy\", \"rain\", \"sleet\", \"snow\", \"wind\",
                \"fog\"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);

        icons.play();
    </script>

    <!-- /footer content -->


    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('#check-all').each(function(index, item) {
                \$(item).bind('click', function() {
                    if (\$(this).is(':checked')) {
                        \$('.grouping').iCheck('check');
                    } else {
                        \$('.grouping').iCheck('uncheck');
                    }
                });
            });
        });


        \$(function () {
            var menus = \$('.right_col').find('.dropdown-menu');
            menus.map(function(key, menu){
                if(\$(menu).children('li').length <= 1) {
                    \$(menu).prev('.dropdown-toggle').hide();
                    \$(menu).parent('.btn-group').removeClass('btn-group');
                }
            });

            \$('img').mousedown(function (e) {
                e.preventDefault()
            });
            \$(document).on('contextmenu', function (e) {
                let clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
                if (clickedTag == 'IMG') {
                    return false;
                }
            });
            \$(document).on('dragstart', function(e) {
                if (e.target.nodeName.toUpperCase() == 'IMG') {
                    return false;
                }
            });
        });
    </script>

    ";
        // line 129
        $module =         null;
        $helper =         'chatbox';
        $name =         'initializeOperatorChat';
        $params = array(        );
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
        // line 130
        echo "</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "@app/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  336 => 130,  315 => 129,  251 => 68,  223 => 62,  217 => 59,  213 => 58,  208 => 56,  204 => 55,  200 => 54,  196 => 53,  192 => 52,  188 => 51,  184 => 50,  180 => 49,  176 => 48,  172 => 47,  166 => 44,  162 => 43,  158 => 42,  154 => 41,  150 => 40,  146 => 39,  141 => 38,  135 => 32,  130 => 30,  126 => 29,  122 => 28,  116 => 25,  110 => 22,  101 => 15,  80 => 14,  75 => 11,  72 => 10,  50 => 9,  44 => 7,  42 => 6,  35 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@app/footer.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/views/gentelella_operator/footer.twig");
    }
}
