<?php  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 *
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 *
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 *
 * @category	Helpers
 *
 * @author		ExpressionEngine Dev Team
 *
 * @link		http://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Site URL
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @param	string
 *
 * @return	string
 */
if (!function_exists('site_url')) {
    function site_url($uri = '')
    {
        $CI = &get_instance();
        if (INSTALL_DONE && !$CI->router->isApi()) {
            if ($CI->router->is_admin_class) {
                $controller = 'admin';
            /* <custom_R> */
            } elseif ($CI->router->is_operator_class) {
                $controller = 'operator';
            /* </custom_R> */
            } else {
                $controller = 'user';
            }
            $CI->pg_seo->set_lang_prefix($controller);
            $url = $CI->config->site_url($CI->pg_seo->get_lang_prefix() . $uri);
        } else {
            $url = $CI->config->site_url($uri);
        }

        return $url;
    }
}

// ------------------------------------------------------------------------

/**
 * Base URL
 *
 * Returns the "base_url" item from your config file
 *
 * @return	string
 */
if (!function_exists('base_url')) {
    function base_url()
    {
        $CI = &get_instance();

        return $CI->config->slash_item('base_url');
    }
}

// ------------------------------------------------------------------------

/**
 * Current URL
 *
 * Returns the full URL (including segments) of the page where this
 * function is placed
 *
 * @return	string
 */
if (!function_exists('current_url')) {
    function current_url()
    {
        $CI = &get_instance();

        return $CI->config->site_url($CI->uri->uri_string());
    }
}

// ------------------------------------------------------------------------
/**
 * Check if current url is default
 *
 * @return	boolean
 */
if (!function_exists('is_current_url_default')) {
    function is_current_url_default()
    {
        $CI       = &get_instance();
        $segments = explode('/', $CI->router->default_controller);
        if ($segments[0] == $CI->router->class) {
            $segments[1] = (isset($segments[1]) && !empty($segments[1])) ? $segments[1] : 'index';

            if ($segments[1] == $CI->router->method) {
                return true;
            }
        }

        return false;
    }
}

// ------------------------------------------------------------------------
/**
 * URL String
 *
 * Returns the URI segments.
 *
 * @return	string
 */
if (!function_exists('uri_string')) {
    function uri_string()
    {
        $CI = &get_instance();

        return $CI->uri->uri_string();
    }
}

// ------------------------------------------------------------------------

/**
 * Index page
 *
 * Returns the "index_page" from your config file
 *
 * @return	string
 */
if (!function_exists('index_page')) {
    function index_page()
    {
        $CI = &get_instance();

        return $CI->config->item('index_page');
    }
}

// ------------------------------------------------------------------------

/**
 * Anchor Link
 *
 * Creates an anchor based on the local URL.
 *
 * @param	string	the URL
 * @param	string	the link title
 * @param	mixed	any attributes
 *
 * @return	string
 */
if (!function_exists('anchor')) {
    function anchor($uri = '', $title = '', $attributes = '')
    {
        $title = (string) $title;

        if (!is_array($uri)) {
            $site_url = (!preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
        } else {
            $site_url = site_url($uri);
        }

        if ($title == '') {
            $title = $site_url;
        }

        if ($attributes != '') {
            $attributes = _parse_attributes($attributes);
        }

        return '<a href="' . $site_url . '"' . $attributes . '>' . $title . '</a>';
    }
}

// ------------------------------------------------------------------------

/**
 * Anchor Link - Pop-up version
 *
 * Creates an anchor based on the local URL. The link
 * opens a new window based on the attributes specified.
 *
 * @param	string	the URL
 * @param	string	the link title
 * @param	mixed	any attributes
 *
 * @return	string
 */
if (!function_exists('anchor_popup')) {
    function anchor_popup($uri = '', $title = '', $attributes = false)
    {
        $title = (string) $title;

        $site_url = (!preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;

        if ($title == '') {
            $title = $site_url;
        }

        if ($attributes === false) {
            return "<a href='javascript:void(0);' onclick=\"window.open('" . $site_url . "', '_blank');\">" . $title . '</a>';
        }

        if (!is_array($attributes)) {
            $attributes = [];
        }

        foreach (['width' => '800', 'height' => '600', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0'] as $key => $val) {
            $atts[$key] = (!isset($attributes[$key])) ? $val : $attributes[$key];
            unset($attributes[$key]);
        }

        if ($attributes != '') {
            $attributes = _parse_attributes($attributes);
        }

        return "<a href='javascript:void(0);' onclick=\"window.open('" . $site_url . "', '_blank', '" . _parse_attributes($atts, true) . "');\"$attributes>" . $title . '</a>';
    }
}

// ------------------------------------------------------------------------

/**
 * Mailto Link
 *
 * @param	string	the email address
 * @param	string	the link title
 * @param	mixed 	any attributes
 *
 * @return	string
 */
if (!function_exists('mailto')) {
    function mailto($email, $title = '', $attributes = '')
    {
        $title = (string) $title;

        if ($title == '') {
            $title = $email;
        }

        $attributes = _parse_attributes($attributes);

        return '<a href="mailto:' . $email . '"' . $attributes . '>' . $title . '</a>';
    }
}

// ------------------------------------------------------------------------

/**
 * Encoded Mailto Link
 *
 * Create a spam-protected mailto link written in Javascript
 *
 * @param	string	the email address
 * @param	string	the link title
 * @param	mixed 	any attributes
 *
 * @return	string
 */
if (!function_exists('safe_mailto')) {
    function safe_mailto($email, $title = '', $attributes = '')
    {
        $title = (string) $title;

        if ($title == '') {
            $title = $email;
        }

        for ($i = 0; $i < 16; ++$i) {
            $x[] = substr('<a href="mailto:', $i, 1);
        }

        for ($i = 0; $i < strlen($email); ++$i) {
            $x[] = '|' . ord(substr($email, $i, 1));
        }

        $x[] = '"';

        if ($attributes != '') {
            if (is_array($attributes)) {
                foreach ($attributes as $key => $val) {
                    $x[] =  ' ' . $key . '="';
                    for ($i = 0; $i < strlen($val); ++$i) {
                        $x[] = '|' . ord(substr($val, $i, 1));
                    }
                    $x[] = '"';
                }
            } else {
                for ($i = 0; $i < strlen($attributes); ++$i) {
                    $x[] = substr($attributes, $i, 1);
                }
            }
        }

        $x[] = '>';

        $temp = [];
        for ($i = 0; $i < strlen($title); ++$i) {
            $ordinal = ord($title[$i]);

            if ($ordinal < 128) {
                $x[] = '|' . $ordinal;
            } else {
                if (count($temp) == 0) {
                    $count = ($ordinal < 224) ? 2 : 3;
                }

                $temp[] = $ordinal;
                if (count($temp) == $count) {
                    $number = ($count == 3) ? (($temp['0'] % 16) * 4096) + (($temp['1'] % 64) * 64) + ($temp['2'] % 64) : (($temp['0'] % 32) * 64) + ($temp['1'] % 64);
                    $x[]    = '|' . $number;
                    $count  = 1;
                    $temp   = [];
                }
            }
        }

        $x[] = '<';
        $x[] = '/';
        $x[] = 'a';
        $x[] = '>';

        $x = array_reverse($x);
        ob_start(); ?>
<script type="text/javascript">
    //<![CDATA[
    var l = new Array();
    <?php
    $i = 0;
        foreach ($x as $val) {
            ?>
    l[
        <?php echo $i++; ?>
    ] = '<?php echo $val; ?>';
    <?php
        } ?>

    for (var i = l.length - 1; i >= 0; i = i - 1) {
        if (l[i].substring(0, 1) == '|') document.write("&#" + unescape(l[i].substring(1)) + ";");
        else document.write(unescape(l[i]));
    }
    //]]>
</script><?php

        $buffer = ob_get_contents();
        ob_end_clean();

        return $buffer;
    }
}

// ------------------------------------------------------------------------

/**
 * Auto-linker
 *
 * Automatically links URL and Email addresses.
 * Note: There's a bit of extra code here to deal with
 * URLs or emails that end in a period.  We'll strip these
 * off and add them after the link.
 *
 * @param	string	the string
 * @param	string	the type: email, url, or both
 * @param	bool 	whether to create pop-up links
 *
 * @return	string
 */
if (!function_exists('auto_link')) {
    function auto_link($str, $type = 'both', $popup = false)
    {
        if ($type != 'email') {
            if (preg_match_all("#(^|\s|\()((http(s?)://)|(www\.))(\w+[^\s\)\<]+)#i", $str, $matches)) {
                $pop = ($popup == true) ? ' target="_blank" ' : '';

                for ($i = 0; $i < sizeof($matches['0']); ++$i) {
                    $period = '';
                    if (preg_match("|\.$|", $matches['6'][$i])) {
                        $period           = '.';
                        $matches['6'][$i] = substr($matches['6'][$i], 0, -1);
                    }

                    $str = str_replace(
                        $matches['0'][$i],
                        $matches['1'][$i] . '<a href="http' .
                                        $matches['4'][$i] . '://' .
                                        $matches['5'][$i] .
                                        $matches['6'][$i] . '"' . $pop . '>http' .
                                        $matches['4'][$i] . '://' .
                                        $matches['5'][$i] .
                                        $matches['6'][$i] . '</a>' .
                                        $period,
                        $str
                    );
                }
            }
        }

        if ($type != 'url') {
            if (preg_match_all("/([a-zA-Z0-9_\.\-\+Å]+)@([a-zA-Z0-9\-]+)\.([a-zA-Z0-9\-\.]*)/i", $str, $matches)) {
                for ($i = 0; $i < sizeof($matches['0']); ++$i) {
                    $period = '';
                    if (preg_match("|\.$|", $matches['3'][$i])) {
                        $period           = '.';
                        $matches['3'][$i] = substr($matches['3'][$i], 0, -1);
                    }

                    $str = str_replace($matches['0'][$i], safe_mailto($matches['1'][$i] . '@' . $matches['2'][$i] . '.' . $matches['3'][$i]) . $period, $str);
                }
            }
        }

        return $str;
    }
}

// ------------------------------------------------------------------------

/**
 * Prep URL
 *
 * Simply adds the http:// part if missing
 *
 * @param	string	the URL
 *
 * @return	string
 */
if (!function_exists('prep_url')) {
    function prep_url($str = '')
    {
        if ($str == 'http://' or $str == '') {
            return '';
        }

        if (substr($str, 0, 7) != 'http://' && substr($str, 0, 8) != 'https://') {
            $str = 'http://' . $str;
        }

        return $str;
    }
}

// ------------------------------------------------------------------------

/**
 * Create URL Title
 *
 * Takes a "title" string as input and creates a
 * human-friendly URL string with either a dash
 * or an underscore as the word separator.
 *
 * @param	string	the string
 * @param	string	the separator: dash, or underscore
 *
 * @return	string
 */
if (!function_exists('url_title')) {
    function url_title($str, $separator = 'dash')
    {
        if ($separator == 'dash') {
            $search        = '_';
            $replace       = '-';
        } else {
            $search        = '-';
            $replace       = '_';
        }

        $trans = [
            '&\#\d+?;'                  => '',
            '&\S+?;'                    => '',
            '\s+'                       => $replace,
            '[^a-z0-9\-\._]'            => '',
            $replace . '+'              => $replace,
            $replace . '$'              => $replace,
            '^' . $replace              => $replace,
        ];

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace('#' . $key . '#i', $val, $str);
        }

        return trim(stripslashes($str));
    }
}

// ------------------------------------------------------------------------

/**
 * Header Redirect
 *
 * Header redirect in two flavors
 * For very fine grained control over headers, you could use the Output
 * Library's set_header() function.
 *
 * @param	string	the URL
 * @param	string	the method: location or redirect
 *
 * @return	string
 */
if (!function_exists('redirect')) {
    function redirect($uri = '', $method = 'location', $http_response_code = 302)
    {
        // remove index.php from begining
        if (substr($uri, 0, 10) == '/index.php') {
            $uri = substr($uri, 10);
        }
        // remove subfolder
        if ('' != SITE_SUBFOLDER
            and
            SITE_SUBFOLDER == substr($uri, 0, strlen(SITE_SUBFOLDER))
        ) {
            $uri = substr($uri, strlen(SITE_SUBFOLDER));
        }
        // check if http is added
        $location = (substr($uri, 0, 7) != 'http://' && substr($uri, 0, 8) != 'https://')
            ? site_url($uri)
            : $uri;

        if (!headers_sent()) {
            switch ($method) {
                case 'refresh': header('Refresh:0;url=' . $location);
                    break;
                case 'hard':
                    $CI = &get_instance();
                    if ($CI->use_pjax && $CI->is_pjax) {
                        exit("<script language='JavaScript'>locationHref('$location', true);</script>");
                    } else {
                        header('Location: ' . $location, true, $http_response_code);
                    }
                    break;
                default:
                    $CI = &get_instance();
                    if ($CI->use_pjax && $CI->is_pjax) {
                        exit("<script language='JavaScript'>locationHref('$location');</script>");
                    } else {
                        header('Location: ' . $location, true, $http_response_code);
                    }
                    break;
            }
            exit;
        } else {
            exit("<script language='JavaScript'>locationHref('$location');</script>");
        }
    }
}

// ------------------------------------------------------------------------

/**
 * Parse out the attributes
 *
 * Some of the functions use this
 *
 * @param	array
 * @param	bool
 *
 * @return	string
 */
if (!function_exists('_parse_attributes')) {
    function _parse_attributes($attributes, $javascript = false)
    {
        if (is_string($attributes)) {
            return ($attributes != '') ? ' ' . $attributes : '';
        }

        $att = '';
        foreach ($attributes as $key => $val) {
            if ($javascript == true) {
                $att .= $key . '=' . $val . ',';
            } else {
                $att .= ' ' . $key . '="' . $val . '"';
            }
        }

        if ($javascript == true and $att != '') {
            $att = substr($att, 0, -1);
        }

        return $att;
    }
}

/**
 * Create return back url
 *
 *
 * @param	string
 *
 * @return	string
 */
if (!function_exists('back_url')) {
    function back_url($url = '')
    {
        $url = is_string($url) ? trim($url) : '';
        if (!$url) {
            return false;
        }

        if (isset($_SERVER['HTTP_REFERER'])
            and
            false !== strpos($_SERVER['HTTP_REFERER'], trim($url, '/'))
        ) {
            return $_SERVER['HTTP_REFERER'];
        } else {
            return (substr($url, 0, 7) != 'http://' && substr($url, 0, 8) != 'https://')
                ? site_url($url)
                : $url;
        }
    }
}

if (!function_exists('magazine_close_url')) {
    function magazine_close_url()
    {
        $CI = &get_instance();
        if (!empty($_SERVER['HTTP_REFERER']) &&
            strpos($_SERVER['HTTP_REFERER'], 'users/profile') === false &&
            strpos($_SERVER['HTTP_REFERER'], 'users/view') === false &&
            strpos($_SERVER['HTTP_REFERER'], 'virtual_gifts') === false) {
            $CI->session->userdata['magazine_close_url'] = $_SERVER['HTTP_REFERER'];
        }
        $CI->load->helper('seo');
        return isset($CI->session->userdata['magazine_close_url']) ?
                    $CI->session->userdata['magazine_close_url'] : rewrite_link('users', 'search');
    }
}
if (!function_exists('magazine_navigation')) {
    function magazine_navigation($view_user_id, $profile_section)
    {
        if (empty($view_user_id)) {
            return;
        }

        $ci       = &get_instance();
        $res      = [];
        $user_ids = [];

        $temp_user_ids = (isset($ci->session->userdata['users_search']['search_result']['user_ids']) &&
                    !empty($ci->session->userdata['users_search']['search_result']['user_ids']) &&
                    is_array($ci->session->userdata['users_search']['search_result']['user_ids'])) ?
                        $ci->session->userdata['users_search']['search_result']['user_ids'] : [];

        if (!empty($temp_user_ids)) {
            foreach ($temp_user_ids as $temp_id) {
                if ($temp_id) {
                    $user_ids[] =(int)$temp_id;
                }
            }

            $key = array_search($view_user_id, $user_ids);
            $ci->load->helper('seo');

            $id          = array_key_exists($key - 1, $user_ids) ? $user_ids[$key - 1] : end($user_ids);
            $prev        = $ci->Users_model->getUserById($id);
            $res['prev'] = rewrite_link('users', 'view', $prev) . '/' . $profile_section;

            $id          = array_key_exists($key + 1, $user_ids) ? $user_ids[$key + 1] : current($user_ids);
            $next        = $ci->Users_model->getUserById($id);
            $res['next'] = rewrite_link('users', 'view', $next) . '/' . $profile_section;
        }
        return $res;
    }
}

/**
 * Adds slash after the string
 *
 * @param string $string
 *
 * @return string
 */
if (!function_exists('slash_string')) {
    function slash_string($string)
    {
        if ($string != '' && substr($string, -1) != '/') {
            $string .= '/';
        }

        return $string;
    }
}

/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */
