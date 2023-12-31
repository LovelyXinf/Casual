<?php

namespace Pg\modules\payments\models\systems;

use Pg\modules\payments\models\PaymentDriverModel;

/**
 * Manual payment driver model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 *
 * @version $Revision: 2 $ $Date: 2010-04-02 15:07:07 +0300 (Ср, 02 апр 2010) $ $Author: kkashkova $
 * */
class ManualModel extends PaymentDriverModel
{
    public $payment_data = array();
    public $settings = array(
    );
    protected $variables = array(
    );

    public function funcRequest($payment_data, $system_settings)
    {
        $return = array("errors" => array(), "info" => array(), "data" => $payment_data);

        return $return;
    }

    public function funcResponce($payment_data, $system_settings)
    {
        $return = array("errors" => array(), "info" => array(), "data" => $payment_data, "type" => "html");

        return $return;
    }

    public function getSettingsMap()
    {
        return array();
    }
}
