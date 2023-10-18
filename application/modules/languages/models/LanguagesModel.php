<?php

namespace Pg\modules\languages\models;

/**
 * Languages module
 *
 * @copyright   Copyright (c) 2000-2016
 * @author  Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class LanguagesModel extends \Model
{
    /**
     * Module check permission to edit data source
     *
     * @param array $module
     *
     * @return array
     */
    public function isDisabledDSActions(array $module)
    {
        $model_name = ucfirst($module['module_gid']) . "_model";
        $model = NS_MODULES . $module['module_gid'] . "\\models\\" . $model_name;
        if (class_exists($model)) {
            $this->ci->load->model($model_name);
            if (isset($this->ci->{$model_name}->is_disabled_action_ds)) {
                $module['is_disabled_action_ds'] = $this->ci->{$model_name}->is_disabled_action_ds;
            }
        }
        return $module;
    }
}
