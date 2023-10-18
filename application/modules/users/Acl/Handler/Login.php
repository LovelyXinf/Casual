<?php

namespace Pg\modules\users\Acl\Handler;

use Pg\libraries\Acl\Handler;

class Login extends Handler
{

    public function render()
    {
        $this->ci->view->setRedirect(site_url() . 'users/login_form');
    }

}
