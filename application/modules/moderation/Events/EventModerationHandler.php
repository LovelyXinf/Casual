<?php

namespace Pg\modules\moderation\Events;

use Pg\libraries\EventDispatcher;
use Pg\libraries\EventHandler;
use Pg\modules\moderation\models\ModerationModel;

/**
 * Moderation event handler
 *
 * @copyright	Copyright (c) 2000-2016
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */

class EventModerationHandler extends EventHandler
{
    /**
     * Init handler
     *
     * @return void
     */
    public function init()
    {
        $event_handler = EventDispatcher::getInstance();
        $event_handler->addListener(
            ModerationModel::EVENT_OBJECT_CHANGED,
            function ($event) {
            $data = $event->getData();
            if (in_array($data['status'], [/*ModerationModel::STATUS_APPROVED, */ModerationModel::STATUS_DECLINED])) {
                (new ModerationModel())->sendNotification($data['obj'], $data['status'], $data['reason']);
            }
        });

    }
}
