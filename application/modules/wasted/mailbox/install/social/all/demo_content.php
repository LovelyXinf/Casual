<?php
return [
    'acl' => [
        'mailbox' => [
             'module' => [
                'access' => 2,
                'module_gid' => 'mailbox',
                'permission' => 'mailbox_mailbox',
            ],
            'permissions' => [
                'list' => [
                    'mailbox' => [
                        'default' => ['status' => 1, 'count' => ['view' => 5, 'write' => 5]],
                        'trial' => ['status' => 1, 'count' => ['view' => 0, 'write' => 0]],
                        'silver' => ['status' => 1, 'count' => ['view' => 50, 'write' => 50]],
                        'premium' => ['status' => 1, 'count' => ['view' => 0, 'write' => 0]],
                    ]
                ],
            ],
        ]
    ]
];
