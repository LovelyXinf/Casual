<?php

use Pg\modules\mailbox\models\MailboxModel;

return [
    'push_notifications' => [
        'new_message' => [
            'gid' => 'new_message',
            'module' => MailboxModel::MODULE_GID,
            'status' => 0
        ]
    ]
];