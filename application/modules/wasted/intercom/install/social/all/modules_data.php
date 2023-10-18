<?php
return [
    'menu' => [
        'admin_menu' => [
            'name' => 'Admin area menu',
            'action' => 'none',
            'items' => [
                'marketing_items' => [
                    'action' => 'create',
                    'link' => 'admin/start',
                    'status' => 1,
                    'sorter' => 4,
                    'items' => [
                        'intercom_menu_item' => [
                            'action' => 'create',
                            'link' => 'admin/marketing/index',
                            'icon' => 'marketing-logo',
                            'status' => 1,
                            'sorter' => 1,
                            'is_external' => 1,
                        ],
                    ],
                ],
            ]
        ],
    ],
];
