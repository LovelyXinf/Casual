<?php

namespace Pg\modules\incomplete_signup\Events;

use Pg\libraries\EventDispatcher;
use Pg\libraries\EventHandler;

class EventIncompleteSignupHandler extends EventHandler
{
    /**
     * Init handler
     *
     * @return void
     */
    public function init()
    {
        $event_handler = EventDispatcher::getInstance();
        $ci = &get_instance();

        $event_handler->addListener('user_register', function ($params) use ($ci) {
            $ci->load->model("Incomplete_signup_model");
            $ci->Incomplete_signup_model->deleteUnregisteredUserByEmail($params->getData()['email']);
        });
    }
}
