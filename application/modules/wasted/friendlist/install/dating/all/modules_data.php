<?php

use Pg\modules\friendlist\models\FriendlistModel;

return [
    'push_notifications' => [
        'friend_online' => [
            'gid' => 'friend_online',
            'module' => FriendlistModel::MODULE_GID,
            'status' => 0
        ]
    ]
];