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
class __TwigTemplate_88e62016ebe26f27c67400cac4285db7292dc9350ae3969eec5fc3b84c378b72 extends \Twig\Template
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
                    </div>";
        // line 5
        echo "                <footer";
        if (($context["login_page"] ?? null)) {
            echo "class=\"footer-loginpage\"";
        }
        echo ">";
        // line 6
        if (($context["DEMO_MODE"] ?? null)) {
            // line 7
            echo ($context["demo_copyright"] ?? null);
        } else {
            // line 9
            $module =             null;
            $helper =             'start';
            $name =             'getCopyright';
            $params = array("cpanel"            ,            );
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
        }
        // line 11
        echo "                </footer>
            </div>
    </div>";
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
    </div>";
        // line 21
        if (((call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["initial_setup"] ?? null)]) && call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["modules_setup"] ?? null)])) && call_user_func_array($this->env->getFunction('empty')->getCallable(), [($context["product_setup"] ?? null)]))) {
            // line 22
            echo "        <script type=\"text/javascript\" src=\"";
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/bootstrap.min.js\"></script>

        <!-- icheck -->
        <script type=\"text/javascript\" src=\"";
            // line 25
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/icheck/icheck.min.js\"></script>
        <!-- daterangepicker -->

        <script type=\"text/javascript\" src=\"";
            // line 28
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/moment.min.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 29
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/moment-with-locales.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 30
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/datepicker/daterangepicker.js\"></script>

        <script type=\"text/javascript\" src=\"";
            // line 32
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/custom.js\"></script>

        <!-- PNotify -->
        <script type=\"text/javascript\" src=\"";
            // line 35
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/notify/pnotify.core.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 36
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/notify/pnotify.buttons.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 37
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/notify/pnotify.nonblock.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 38
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/errors.js\"></script>

        <!-- flot js -->
        <!--[if lte IE 8]><script type=\"text/javascript\" src=\"";
            // line 41
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/excanvas.min.js\"></script><![endif]-->
        <script type=\"text/javascript\" src=\"";
            // line 42
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/jquery.flot.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 43
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/jquery.flot.pie.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 44
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/jquery.flot.orderBars.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 45
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/jquery.flot.time.min.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 46
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/date.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 47
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/jquery.flot.spline.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 48
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/jquery.flot.stack.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 49
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/curvedLines.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 50
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/flot/jquery.flot.resize.js\"></script>
        <!-- Datatables -->
        <script type=\"text/javascript\" src=\"";
            // line 52
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/datatables/js/jquery.dataTables.js\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 53
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/datatables/plugins/natural.js\"></script>";
            // line 54
            $module =             null;
            $helper =             'utils';
            $name =             'jscript';
            $params = array(""            ,"lazysizes.min.js"            ,            );
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
            echo "        <script>
            \$(document).ready(function () {
                PNotify.prototype.options.buttons.labels.stick = '";
            // line 57
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("notify_stick"            ,"start"            ,null            ,"js"            ,            );
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

        <script>
            \$(document).ready(function () {
                // [17, 74, 6, 39, 20, 85, 7]
                //[82, 23, 66, 9, 99, 6, 2]
                var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];

                var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
                \$(\"#canvas_dahs\").length && \$.plot(\$(\"#canvas_dahs\"), [
                    data1, data2
                ], {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        verticalLines: true,
                        hoverable: true,
                        clickable: true,
                        tickColor: \"#d5d5d5\",
                        borderWidth: 1,
                        color: '#fff'
                    },
                    colors: [\"rgba(38, 185, 154, 0.38)\", \"rgba(3, 88, 106, 0.38)\"],
                    xaxis: {
                        tickColor: \"rgba(51, 51, 51, 0.06)\",
                        mode: \"time\",
                        tickSize: [1, \"day\"],
                        //tickLength: 10,
                        axisLabel: \"Date\",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial',
                        axisLabelPadding: 10
                            //mode: \"time\", timeformat: \"%m/%d/%y\", minTickSize: [1, \"day\"]
                    },
                    yaxis: {
                        ticks: 8,
                        tickColor: \"rgba(51, 51, 51, 0.06)\",
                    },
                    tooltip: false
                });

                function gd(year, month, day) {
                    return new Date(year, month - 1, day).getTime();
                }
            });
        </script>

        <!-- skycons -->
        <script src=\"";
            // line 124
            echo ($context["site_root"] ?? null);
            echo "application/views/gentelella/js/skycons/skycons.js\"></script>
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


            \$(function(){
                var menus = \$('.right_col').find('.dropdown-menu');
                menus.map(function(key, menu){
                    if(\$(menu).children('li').length <= 1) {
                        \$(menu).prev('.dropdown-toggle').hide();
                        \$(menu).parent('.btn-group').removeClass('btn-group'); 
                    }
                });
            });                
        </script>";
            // line 169
            $module =             null;
            $helper =             'start';
            $name =             'new_features';
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
        }
        // line 172
        $module =         null;
        $helper =         'start';
        $name =         'intercom';
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
        // line 173
        echo "    
</body>

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
        return array (  403 => 173,  382 => 172,  360 => 169,  313 => 124,  224 => 57,  220 => 55,  199 => 54,  196 => 53,  192 => 52,  187 => 50,  183 => 49,  179 => 48,  175 => 47,  171 => 46,  167 => 45,  163 => 44,  159 => 43,  155 => 42,  151 => 41,  145 => 38,  141 => 37,  137 => 36,  133 => 35,  127 => 32,  122 => 30,  118 => 29,  114 => 28,  108 => 25,  101 => 22,  99 => 21,  92 => 15,  71 => 14,  67 => 11,  45 => 9,  42 => 7,  40 => 6,  34 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@app/footer.twig", "/home/ovmarketing01/domains/chatme.nu/private_html/application/views/gentelella/footer.twig");
    }
}
