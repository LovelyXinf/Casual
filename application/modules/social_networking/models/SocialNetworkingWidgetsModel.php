<?php

namespace Pg\modules\social_networking\models;

if (!defined('SOCIAL_NETWORKING_SERVICES_TABLE')) {
    define('SOCIAL_NETWORKING_SERVICES_TABLE', DB_PREFIX . 'social_networking_services');
}

/**
 * Social networking widgets model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class SocialNetworkingWidgetsModel extends \Model
{
    public $locales = array();
    public $locale = array();

    const WIDGETS_MODEL_POSTFIX = 'WidgetsModel';

    public function __construct()
    {
        parent::__construct();

        if (count($this->locales) == 0) {
            if (@require(APPPATH . 'config/locales' . EXT)) {
                $this->locales = $locales;
            }
        }

        $lang = $this->ci->pg_language->get_lang_by_id($this->ci->pg_language->current_lang_id);
        $lang_code = isset($lang['code']) ? $lang['code'] : false;
        $locale = isset($this->locales[$lang_code]) ? $this->locales[$lang_code] : 'en_US';
        $this->locale = $locale;
    }

    public function getWidgets($widget = '', $settings = array(), $display_type = 'row')
    {
        $widgets_text = '';
        $this->ci->load->model('social_networking/models/Social_networking_services_model');
        $services = $this->ci->Social_networking_services_model->get_services_list(array('id' => 'ASC'), array('where' => array('status' => 1)));
        foreach ($services as $id => $value) {
            if (empty($settings[$value['gid']])) {
                continue;
            }
            $namespace = NS_MODULES . 'social_networking\\models\\widgets\\';
            $service_model = $namespace . ucfirst($value['gid']) . self::WIDGETS_MODEL_POSTFIX;
            if (!class_exists($service_model)) {
                continue;
            }
            $service = new $service_model();
            if (!in_array($widget, $service->widget_types)) {
                continue;
            }

            if (method_exists($service, 'getHeader')) {
                $text = $service->getHeader($value, $this->locale, array('like', 'share', 'comments'));
            } else {
                $text = '';
            }

            $method = 'get';
            $chunks = explode('_', $widget);

            foreach ($chunks as $chunk) {
                $method .= ucfirst($chunk);
            }

            if (method_exists($service, $method)) {
                $text .= $service->$method();
                if ($display_type == 'row') {
                    $widgets_text .= $text ? '<td>' . $text . '</td>' : '';
                } else {
                    $widgets_text .= $text ? '<tr><td>' . $text . '</td></tr>' : '';
                }
            }
        }
        $widgets_text = $widgets_text ? '<table class="widgets">' . ($display_type == 'row' ? '<tr>' : '') . $widgets_text . ($display_type == 'row' ? '</tr>' : '') . '</table>' : '';

        return $widgets_text;
    }

    public function getHeader()
    {
        $header_text = '';
        $this->ci->load->model('social_networking/models/Social_networking_services_model');
        $services = $this->ci->Social_networking_services_model->get_services_list(array('id' => 'ASC'), array('where' => array('status' => 1)));
        foreach ($services as $id => $value) {
            if (empty($value['gid'])) {
                continue;
            }
            $namespace = NS_MODULES . 'social_networking\\models\\widgets\\';
            $service_model = $namespace . ucfirst($value['gid']) . self::WIDGETS_MODEL_POSTFIX;
            if (class_exists($service_model)) {
                $service = new $service_model();
                if (method_exists($service, 'getHeader')) {
                    $header_text .= $service->getHeader($value, $this->locale, array('like', 'share', 'comments'));

                }
            }
        }

        return $header_text;
    }

    public function getWidgetsActions(array $services = array())
    {
        $actions = array();
        foreach ($services as $id => $value) {
            if (empty($value['gid'])) {
                continue;
            }
            $namespace = NS_MODULES . 'social_networking\\models\\widgets\\';
            $service_model = $namespace . ucfirst($value['gid']) . self::WIDGETS_MODEL_POSTFIX;
            if (class_exists($service_model)) {
                $service = new $service_model();
                $actions[$id] = isset($service->widget_types) ? $service->widget_types : array();
            }
        }

        return $actions;
    }

    public function __call($name, $args)
    {
        $methods = [
            'get_header' => 'getHeader',
            'get_widgets' => 'getWidgets',
            'get_widgets_actions' => 'getWidgetsActions',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
