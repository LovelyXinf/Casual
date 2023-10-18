<?php

namespace Pg\modules\users\Acl\Action;

use Pg\libraries\Acl\Action;

class Login extends Action
{
    const GID = 'login';

    public function getGid()
    {
        return self::GID;
    }
}
