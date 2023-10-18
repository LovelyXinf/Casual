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
    ],
    'service' => [
        1 => ['send' => 5, 'read' => 5],
        2 => ['send' => 5, 'read' => 5],
        3 => ['send' => 5, 'read' => 5],
        4 => ['send' => 5, 'read' => 5],
        5 => ['send' => 5, 'read' => 5],
        6 => ['send' => 5, 'read' => 5],
        7 => ['send' => 5, 'read' => 5],
        8 => ['send' => 5, 'read' => 5],
        9 => ['send' => 5, 'read' => 5],
        10 => ['send' => 5, 'read' => 5],
        11 => ['send' => 5, 'read' => 5],
        12 => ['send' => 5, 'read' => 5],
        13 => ['send' => 5, 'read' => 5],
        14 => ['send' => 5, 'read' => 5],
        15 => ['send' => 5, 'read' => 5],
        16 => ['send' => 5, 'read' => 5],
        17 => ['send' => 5, 'read' => 5],
        18 => ['send' => 5, 'read' => 5],
        19 => ['send' => 5, 'read' => 5],
        20 => ['send' => 5, 'read' => 5],
        21 => ['send' => 5, 'read' => 5],
        22 => ['send' => 5, 'read' => 5],
        23 => ['send' => 5, 'read' => 5],
        24 => ['send' => 5, 'read' => 5],
        25 => ['send' => 5, 'read' => 5],
        26 => ['send' => 5, 'read' => 5],
        27 => ['send' => 5, 'read' => 5],
        28 => ['send' => 5, 'read' => 5],
        29 => ['send' => 5, 'read' => 5],
        30 => ['send' => 5, 'read' => 5],
        31 => ['send' => 5, 'read' => 5],
        32 => ['send' => 5, 'read' => 5],
        33 => ['send' => 5, 'read' => 5],
        34 => ['send' => 5, 'read' => 5],
        35 => ['send' => 5, 'read' => 5],
        36 => ['send' => 5, 'read' => 5],
        37 => ['send' => 5, 'read' => 5]
    ]
];
