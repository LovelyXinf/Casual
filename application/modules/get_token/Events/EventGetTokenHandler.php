<?php

namespace Pg\modules\get_token\Events;

use Pg\libraries\EventDispatcher;
use Pg\libraries\EventHandler;

class EventGetTokenHandler extends EventHandler
{

    /**
     * Init handler
     *
     * @return void
     */
    public function init()
    {
        $event_handler = EventDispatcher::getInstance();
        $event_handler->addListener('get_token_mobile_auth_bonus_action',
            function ($params) {
            $ci = &get_instance();
            $ci->load->model("Get_token_model");
            $data = $params->getData();
            $callback = $data['callback'];
            $ci->Get_token_model->{$callback}($data);
        });
    }
}
