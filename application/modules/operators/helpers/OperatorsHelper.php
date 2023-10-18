<?php

namespace Pg\modules\operators\helpers {

    /**
     * Operators module
     * Helper
     *
     * @package     PG_Dating
     * @subpackage  Operators
     * @category    helpers
     * @copyright   Pilot Group <http://www.pilotgroup.net/>
     * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
     */
    if (!function_exists('langSelect')) {
        function langSelect($params = [])
        {
            $ci           = &get_instance();
            $count_active = 0;
            foreach ($ci->pg_language->languages as $language) {
                if ($language['status']) {
                    ++$count_active;
                }
            }
            $ci->view->assign('type', isset($params['type']) ? $params['type'] : '');
            $ci->view->assign('count_active', $count_active);
            $ci->view->assign('current_lang', $ci->pg_language->current_lang_id);
            $ci->view->assign('languages', $ci->pg_language->languages);

            return $ci->view->fetch('helper_lang_select', 'operator', 'operators');
        }
    }

    if (!function_exists('operatorSelect')) {
        function operatorSelect($selected = [], $max_select = 0, $var_name = 'operator_id', $params = [])
        {
            $ci = &get_instance();
            $ci->load->model('Operators_model');

            if ($max_select == 1 && !empty($selected) && !is_array($selected)) {
                $selected = [$selected];
            }

            $tpl_vars = [];

            if (!empty($selected)) {
                $tpl_vars['selected']     = $ci->Operators_model->formatArray(
                    $ci->Operators_model->getList(['id' => $selected])
                );
                $tpl_vars['selected_str'] = implode(',', $selected);
            } else {
                $tpl_vars['selected_str'] = '';
            }

            $tpl_vars['var_name']   = $var_name ? $var_name : 'operator_id';
            $tpl_vars['max_select'] = $max_select ? $max_select : 0;
            $tpl_vars['params']     = $params;

            $ci->view->assign('h_os_data', $tpl_vars);

            return $ci->view->fetch('helper_operator_select', null, 'operators');
        }
    }

    if (!function_exists('currentBalance')) {
        function currentBalance($params = [])
        {
            $ci = &get_instance();
            if ($ci->session->userdata('auth_type') != 'operator') {
                return;
            }

            $tpl_vars    = $params;
            $operator_id = intval($ci->session->userdata('user_id'));

            $ci->load->model('Operators_model');
            $tpl_vars['operator'] = $ci->Operators_model->format(
                $ci->Operators_model->getById($operator_id)
            );

            $ci->view->assign('h_cb_data', $tpl_vars);
            return $ci->view->fetch('helper_current_balance', 'operator', 'operators');
        }
    }
}

namespace {

    if (!function_exists('langSelect')) {
        function langSelect($params = [])
        {
            return Pg\modules\operators\helpers\langSelect($params);
        }
    }

    if (!function_exists('operatorSelect')) {
        function operatorSelect($selected = [], $max_select = 0, $var_name = 'operator_id', $params = [])
        {
            return Pg\modules\operators\helpers\operatorSelect($selected, $max_select, $var_name, $params);
        }
    }

    if (!function_exists('currentBalance')) {
        function currentBalance($params = [])
        {
            return Pg\modules\operators\helpers\currentBalance($params);
        }
    }
}
