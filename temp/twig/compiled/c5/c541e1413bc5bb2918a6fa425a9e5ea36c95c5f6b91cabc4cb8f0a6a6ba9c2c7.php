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

/* login_form.twig */
class __TwigTemplate_ffd4698a01448c3714a2b32f9dca1a7f95391334f8594cae3bae111357cf1678 extends \Twig\Template
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
        $this->loadTemplate("@app/header.twig", "login_form.twig", 1)->display($context);
        // line 3
        if ((($context["product_name"] ?? null) == "dating")) {
            // line 4
            echo "
    <!-- </div></div> -->
    <div class=\"landing\">
        <div class=\"landing__form\">
            <div class=\"landing__form-content\">
            <div class=\"login-form\">
                <div class=\"landing__logo\">
                    <a href=\"";
            // line 11
            echo ($context["site_url"] ?? null);
            echo "admin/\">
                        <img src=\"";
            // line 12
            echo ($context["site_root"] ?? null);
            echo $this->getAttribute(($context["logo_settings"] ?? null), "path", []);
            echo "\" border=\"0\" alt=\"logo\"
                             width=\"";
            // line 13
            echo $this->getAttribute(($context["logo_settings"] ?? null), "width", []);
            echo "\" height=\"";
            echo $this->getAttribute(($context["logo_settings"] ?? null), "height", []);
            echo "\">
                    </a>
                </div>

                <form method=\"post\" action=\"";
            // line 17
            echo $this->getAttribute(($context["data"] ?? null), "action", []);
            echo "\" class=\"form-horizontal form-label-left\">
                    <div class=\"form\">
                        <h2>";
            // line 19
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_login"            ,"ausers"            ,            );
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
            echo "</h2>
                        <div class=\"form-group\">
                            <label class=\"control-label\">";
            // line 22
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_nickname"            ,"ausers"            ,            );
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
                            <div>";
            // line 24
            ob_start();
            ob_start();
            // line 25
            if (call_user_func_array($this->env->getFunction('empty')->getCallable(), [$this->getAttribute(($context["data"] ?? null), "nickname", [])])) {
                // line 26
                if (($context["DEMO_MODE"] ?? null)) {
                    // line 27
                    echo $this->getAttribute($this->getAttribute(($context["demo_login_settings"] ?? null), "admin", []), "login", []);
                }
            } else {
                // line 30
                echo $this->getAttribute(($context["data"] ?? null), "nickname", []);
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            $context["nickname_value"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 33
            echo "                                <input class=\"form-control\" type=\"text\"
                                       value=\"";
            // line 34
            echo twig_escape_filter($this->env, ($context["nickname_value"] ?? null));
            echo "\" name=\"nickname\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">";
            // line 39
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_password"            ,"ausers"            ,            );
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
                            <div>";
            // line 41
            ob_start();
            ob_start();
            // line 42
            if (($context["DEMO_MODE"] ?? null)) {
                // line 43
                echo $this->getAttribute($this->getAttribute(($context["demo_login_settings"] ?? null), "admin", []), "password", []);
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            $context["password_value"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 46
            echo "                                <input class=\"form-control\" type=\"password\"
                                       value=\"";
            // line 47
            echo twig_escape_filter($this->env, ($context["password_value"] ?? null));
            echo "\" name=\"password\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <button class=\"btn btn-success\" type=\"submit\" name=\"btn_login\" value=\"1\">";
            // line 52
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_login"            ,"start"            ,            );
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
            // line 53
            echo "                            </button>
                        </div>
                    </div>
                </form>
            </div>";
            // line 58
            $module =             null;
            $helper =             'start';
            $name =             'demoPromoBlock';
            $params = array(["page" => "login"]            ,            );
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
            // line 59
            echo "                </div>
        </div>

        <div class=\"landing__right clearfix\">
            <div class=\"row-welcome\">
                <div class=\"row-welcome__content\">
                    <a href=\"";
            // line 65
            echo ($context["site_url"] ?? null);
            echo "\">
                        <img src=\"";
            // line 66
            echo ($context["site_root"] ?? null);
            echo $this->getAttribute(($context["logo_settings"] ?? null), "path", []);
            echo "\" border=\"0\" alt=\"logo\"
                             width=\"";
            // line 67
            echo $this->getAttribute(($context["logo_settings"] ?? null), "width", []);
            echo "\" height=\"";
            echo $this->getAttribute(($context["logo_settings"] ?? null), "height", []);
            echo "\">
                    </a>";
            // line 69
            if ((($context["DEMO_MODE"] ?? null) || ($context["TRIAL_MODE"] ?? null))) {
                // line 70
                echo "                        <div class=\"row-welcome__txt\">100% ready professional dating site and mobile apps for business in 1 day, open code, with ready member profiles.";
                echo "</div>
                        <div class=\"row-welcome__btn\">
                            <a onclick=\"";
                // line 72
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("ausers"                ,"login_buy_now"                ,                );
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
                echo "\" class=\"btn btn-white\" href=\"https://www.datingpro.com/dating-software/pricing/\" target=\"_blank\">";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_buynow"                ,"ausers"                ,                );
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
                            <a onclick=\"";
                // line 73
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("ausers"                ,"login_ios_app"                ,                );
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
                echo "\" class=\"btn btn-ghost hide\" href=\"https://itunes.apple.com/us/app/soulcompanion.net-mobile/id784390992\" target=\"_blank\"><i class=\"fa fa-apple\" aria-hidden=\"true\"></i>";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_iosapp"                ,"ausers"                ,                );
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
                            <a onclick=\"";
                // line 74
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("ausers"                ,"login_android_app"                ,                );
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
                echo "\" class=\"btn btn-ghost hide\" href=\"https://play.google.com/store/apps/details?id=pgdating.pilotgroup.datingpro\" target=\"_blank\"><i class=\"fa fa-android\" aria-hidden=\"true\"></i>";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_androidapp"                ,"ausers"                ,                );
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
                echo "</a>";
                // line 76
                echo "                        </div>";
            } else {
                // line 78
                echo "                        <div class=\"row-welcome__useful\">";
                // line 81
                echo "                        </div>";
            }
            // line 83
            echo "                </div>";
            // line 84
            if ((($context["DEMO_MODE"] ?? null) || ($context["TRIAL_MODE"] ?? null))) {
                echo "<div class=\"row-welcome__scroll\" id=\"welcomeScroll\"><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></div>";
            }
            // line 85
            echo "            </div>";
            // line 87
            if ((($context["DEMO_MODE"] ?? null) || ($context["TRIAL_MODE"] ?? null))) {
                // line 88
                echo "                <div class=\"col-xs-12 col-sm-12 col-md-12\">
                    <div class=\"landing__clients\" id=\"scrollTo\">
                        <h2>";
                // line 90
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("clients"                ,"ausers"                ,                );
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
                echo "</h2>
                        <div class=\"clients clearfix\">
                            <div class=\"clients__col-review\">
                                <div class=\"clients__review\">
                                    <div id=\"landingReview\"></div>
                                </div>
                                <div class=\"clients__rev-more\"><a onclick=\"";
                // line 96
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("ausers"                ,"login_other_reviews"                ,                );
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
                echo "\" href=\"https://www.datingpro.com/academy/feedback/\" target=\"_blank\">";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_morereviews"                ,"ausers"                ,                );
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
                echo "</a></div>
                            </div>

                            <div class=\"clients__col-works\">
                                <div class=\"clients__works\">
                                    <div class=\"clearfix\">
                                        <div class=\"clients__half\">
                                            <div class=\"rect23\">
                                                <a href=\"https://marketplace.datingpro.com/portfolio/\" target=\"_blank\"><img src=\"https://www.datingpro.com/wordpress/wp-content/uploads/2016/02/FireShot-Capture-67-Affairsbox-http___affairsbox.com_en_.jpg\" /></a>
                                            </div>
                                        </div>
                                        <div class=\"clients__half\">
                                            <div class=\"rect23\">
                                                <a href=\"https://marketplace.datingpro.com/portfolio/\" target=\"_blank\"><img src=\"https://www.datingpro.com/wordpress/wp-content/uploads/2015/08/europrincess_com-1000.jpg\" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"clearfix\">
                                        <div class=\"clients__half\">
                                            <div class=\"rect23\">
                                                <a href=\"https://marketplace.datingpro.com/portfolio/\" target=\"_blank\"><img src=\"https://www.datingpro.com/wordpress/wp-content/uploads/2015/06/strelkiss_com-500.jpg\" />
                                            </div>
                                        </div>
                                        <div class=\"clients__half\">
                                            <div class=\"rect23\">
                                                <a href=\"https://marketplace.datingpro.com/portfolio/\" target=\"_blank\"><img src=\"https://www.datingpro.com/wordpress/wp-content/uploads/2015/01/friendite-com-380.png\" />
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class=\"rect23\">
                                            <a onclick=\"";
                // line 127
                $module =                 null;
                $helper =                 'start';
                $name =                 'setAnalytics';
                $params = array("ausers"                ,"login_cases"                ,                );
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
                echo "\" class=\"clients__morecases\" href=\"https://marketplace.datingpro.com/portfolio/\" target=\"_blank\"><span class=\"clients__morecases-txt\">";
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("btn_morecases"                ,"ausers"                ,                );
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
                echo "</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"clients__col-list\">
                                <div><img src=\"";
                // line 134
                echo ($context["site_root"] ?? null);
                echo ($context["img_folder"] ?? null);
                echo "clientLogos_v2_rc2_zipped.png\" alt=\"\"></div>
                                <div>";
                // line 135
                $module =                 null;
                $helper =                 'lang';
                $name =                 'l';
                $params = array("owners"                ,"ausers"                ,                );
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
                            </div>
                        </div>
                    </div>
                </div>";
            }
            // line 141
            echo "        </div>

    </div>

    <script>
        \$(\"#welcomeScroll\").bind(\"click\", function () {
            \$('html, body').animate({
                scrollTop: \$(\"#scrollTo\").offset().top
            }, 500);
        })

        \$(function () {
            var landReviews = [
                '<p><b>Mauro C. Fileto</b></p><p>Thanks for all your effort on this Project… I will be recommending you to partners and friends asking for software development services.</p><p>You were great professionals…</p><p>Sincerely, Mauro C. Fileto</p>',
                '<p><b>Jack Gerbehy</b></p><p>I can see all the hard work you put in and I thank you very much for what you have done… GREAT JOB please thank all that worked on the project.</p><p>Just wanted to tell what a great job your doing…. I know I am not easy to deal with most of the time…. yet you always take good care of me.</p><p>I just want to thank everone on the staff, at this point I’m sure I have worked with everyone! Top Notch, outstanding customer service.</p>',
                '<p><b>Nick Burnham</b></p><p>Support team were really good in getting some of the critical elements of my site back online yesterday which was most appreciated – they did enough for the site to be functioning for paid members which is great :) I was extremely thankful for their efforts, as a company you have always have provided such a great support service when I am suffering from major problems and I would like to congratulate you for that. </p>',
                '<p><b>Nick Stevenson</b></p><p>We open-heartedly recommend the Ready Dating Site solution to anyone seriously considering starting an online dating service. You should not delay. Thanks to Pilot Group Ltd. and the Ready Dating Site solution; we are expecting to be a contender in the online dating service in a very short time.</p>',
                '<p><b>Sebastien Menut</b></p><p>\"Good team, Responsive and knowledgeable and always available! Thank you, pleasure to works with you!\"</p>',
                '<p><b>Narinder Dhiensa</b></p><p>I just wanted to tell you how hard Irina, Ida and the developer worked to get my last problem solved.</p><p>I really appreciate how they worked and how pleasantly they chat on-line. I would like the boss to know my feelings.</p><p>I usually complain about people but rarely do I compliment workers, so they have done very well.</p><p>Keep up the good work.</p><p>Regards</p>',
                '<p><b>Andy James</b></p><p>\"Brilliant. Marvelous. Fantastic. Thank you so much!</p><p>Please, thank developer for me.\"</p>',
                '<p><b>Craig Amanti</b></p><p>I just wanted to email you to say “Thank You” for your quick response and fixing the link issue on the site. My client came in and seems to be very happy with the site.</p><p>I mentioned I have very good developers working with me, so Thank You very much!</p>',
                '<p><b>Mandie</b></p><p>It’s perfect, I downloaded the trial to show my boss the program and he loved it too, we’ve ordered and set up the site already.</p><p>The only fault I’ve found was some very small language problems but the interface to change them is so simple – it’s great :)</p><p>Thank you!</p>',
                '<p><b>Tomislav Majnaric</b></p><p>Definitely, your dating software is THE BEST! :-) I wish you all the best!</p><p>I’m very happy because I bought dating pro software from you. I’ve been working a few years with other service like affiliate, and, after so many years decided – it’s time to start my own business!</p><p>I spent a few months for a research – what dating script will be the best for me?</p><p>And, finally, found your dating pro script which is wonderful! In my opinion – definitely the best in whole world! Maybe little expensive, but, what you get for this money, really, it is not expensive! I give advice to anyone who plan to buy this software, just buy, you will not feel sorry!</p>'
            ];

            function getRandomInt(min, max)
            {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }

            \$(\"#landingReview\").html(landReviews[getRandomInt(0, 9)]);
        });
    </script>

    <!-- <div><div class=\"row\"> -->";
        } else {
            // line 178
            echo "
    <div";
            // line 179
            if ((($context["product_name"] ?? null) != "social")) {
                echo "class=\"col-md-3 col-sm-12\"";
            }
            echo ">
        <div class=\"landing\">
            <div class=\"landing__form\">";
            // line 182
            if ((($context["product_name"] ?? null) == "social")) {
                // line 183
                echo "                    <div class=\"landing__logo\">
                        <a href=\"";
                // line 184
                echo ($context["site_url"] ?? null);
                echo "admin/\">
                            <img src=\"";
                // line 185
                echo ($context["site_root"] ?? null);
                echo $this->getAttribute(($context["logo_settings"] ?? null), "path", []);
                echo "\" border=\"0\" alt=\"logo\"
                                 width=\"";
                // line 186
                echo $this->getAttribute(($context["logo_settings"] ?? null), "width", []);
                echo "\" height=\"";
                echo $this->getAttribute(($context["logo_settings"] ?? null), "height", []);
                echo "\">
                        </a>
                    </div>";
            }
            // line 190
            echo "                <form method=\"post\" action=\"";
            echo $this->getAttribute(($context["data"] ?? null), "action", []);
            echo "\" class=\"form-horizontal form-label-left\">
                    <div class=\"form\">
                        <h2>";
            // line 192
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("admin_header_login"            ,"ausers"            ,            );
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
            echo "</h2>
                        <div class=\"form-group\">
                            <label class=\"control-label\">";
            // line 195
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_nickname"            ,"ausers"            ,            );
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
                            <div>";
            // line 197
            ob_start();
            ob_start();
            // line 198
            if (call_user_func_array($this->env->getFunction('empty')->getCallable(), [$this->getAttribute(($context["data"] ?? null), "nickname", [])])) {
                // line 199
                if (($context["DEMO_MODE"] ?? null)) {
                    // line 200
                    echo $this->getAttribute($this->getAttribute(($context["demo_login_settings"] ?? null), "admin", []), "login", []);
                }
            } else {
                // line 203
                echo $this->getAttribute(($context["data"] ?? null), "nickname", []);
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            $context["nickname_value"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 206
            echo "                                <input class=\"form-control\" type=\"text\"
                                       value=\"";
            // line 207
            echo twig_escape_filter($this->env, ($context["nickname_value"] ?? null));
            echo "\" name=\"nickname\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label class=\"control-label\">";
            // line 212
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("field_password"            ,"ausers"            ,            );
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
                            <div>";
            // line 214
            ob_start();
            ob_start();
            // line 215
            if (($context["DEMO_MODE"] ?? null)) {
                // line 216
                echo $this->getAttribute($this->getAttribute(($context["demo_login_settings"] ?? null), "admin", []), "password", []);
            }
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            $context["password_value"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 219
            echo "                                <input class=\"form-control\" type=\"password\"
                                       value=\"";
            // line 220
            echo twig_escape_filter($this->env, ($context["password_value"] ?? null));
            echo "\" name=\"password\">
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <button class=\"btn btn-success\" type=\"submit\" name=\"btn_login\" value=\"1\">";
            // line 225
            $module =             null;
            $helper =             'lang';
            $name =             'l';
            $params = array("btn_login"            ,"start"            ,            );
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
            // line 226
            echo "                            </button>
                        </div>
                    </div>
                </form>
            </div>";
            // line 231
            if ((($context["product_name"] ?? null) == "social")) {
                // line 232
                echo "                <div class=\"landing__right clearfix\">
                    <div class=\"row-welcome index-social-bg\">
                        <div class=\"img-overlay\">
                            <div class=\"row-welcome__content\">
                                <a href=\"";
                // line 236
                echo ($context["site_url"] ?? null);
                echo "\">
                                    <img src=\"";
                // line 237
                echo ($context["site_root"] ?? null);
                echo $this->getAttribute(($context["logo_settings"] ?? null), "path", []);
                echo "\" border=\"0\" alt=\"logo\"
                                         width=\"";
                // line 238
                echo $this->getAttribute(($context["logo_settings"] ?? null), "width", []);
                echo "\" height=\"";
                echo $this->getAttribute(($context["logo_settings"] ?? null), "height", []);
                echo "\">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            // line 245
            echo "        </div>
    </div>";
        }
        // line 250
        $this->loadTemplate("@app/footer.twig", "login_form.twig", 250)->display($context);
    }

    public function getTemplateName()
    {
        return "login_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  847 => 250,  843 => 245,  832 => 238,  827 => 237,  823 => 236,  817 => 232,  815 => 231,  809 => 226,  788 => 225,  781 => 220,  778 => 219,  773 => 216,  771 => 215,  768 => 214,  745 => 212,  738 => 207,  735 => 206,  730 => 203,  726 => 200,  724 => 199,  722 => 198,  719 => 197,  696 => 195,  672 => 192,  666 => 190,  658 => 186,  653 => 185,  649 => 184,  646 => 183,  644 => 182,  637 => 179,  634 => 178,  597 => 141,  570 => 135,  565 => 134,  515 => 127,  441 => 96,  413 => 90,  409 => 88,  407 => 87,  405 => 85,  401 => 84,  399 => 83,  396 => 81,  394 => 78,  391 => 76,  348 => 74,  304 => 73,  260 => 72,  255 => 70,  253 => 69,  247 => 67,  242 => 66,  238 => 65,  230 => 59,  209 => 58,  203 => 53,  182 => 52,  175 => 47,  172 => 46,  167 => 43,  165 => 42,  162 => 41,  139 => 39,  132 => 34,  129 => 33,  124 => 30,  120 => 27,  118 => 26,  116 => 25,  113 => 24,  90 => 22,  66 => 19,  61 => 17,  52 => 13,  47 => 12,  43 => 11,  34 => 4,  32 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "login_form.twig", "/home/custpg/operator/application/modules/ausers/views/gentelella/login_form.twig");
    }
}
