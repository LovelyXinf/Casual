<?php

namespace Pg\modules\network\models\events;

class EventNetwork extends \Symfony\Component\EventDispatcher\Event
{
    protected $data = [];

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
