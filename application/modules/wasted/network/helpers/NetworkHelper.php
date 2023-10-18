<?php

namespace Pg\modules\network\helpers {

    if (!function_exists('networkEmit')) {
        function networkEmit($event, $data)
        {
            $ci = &get_instance();
            $ci->load->model('network/models/Network_events_model');

            return $ci->Network_events_model->emit($event, $data);
        }
    }

}

namespace {

    if (!function_exists('network_emit')) {
        function network_emit($event, $data)
        {
            return Pg\modules\network\helpers\networkEmit($event, $data);
        }
    }

}
