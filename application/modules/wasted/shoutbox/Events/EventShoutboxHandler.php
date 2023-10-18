<?php

namespace Pg\modules\shoutbox\Events;

use Pg\modules\shoutbox\models\ShoutboxModel;
use Pg\libraries\EventDispatcher;
use Pg\libraries\EventHandler;

class EventShoutboxHandler extends EventHandler
{
    /**
     *  Init hanler
     *
     * @return void
     */
    public function init()
    {
        $event_handler = EventDispatcher::getInstance();
        $event_handler->addListener(ShoutboxModel::MESSAGE_BONUS_ACTION, function ($params) {
            $data = $params->getData();
            $ci = &get_instance();
            $ci->load->model("Shoutbox_model");
            $ci->Shoutbox_model->{$data['callback']}($data);
        });
    }
}
