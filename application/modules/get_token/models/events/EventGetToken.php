<?php

namespace Pg\modules\get_token\models\events;

class EventGetToken extends \Symfony\Component\EventDispatcher\Event
{
    protected $data = array();

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
