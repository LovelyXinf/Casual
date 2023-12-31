<?php

$module =[
    'module' => 'mobile',
    'install_name' => 'Mobile module',
    'install_descr' => 'Mobile version of the site',
    'version' => '4.02',
    'files' => [
        0 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/hooks/autoload/post_controller_constructor-mobile_detect.php',
        ],
        1 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/controllers/AdminMobile.php',
        ],
        2 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/controllers/ApiMobile.php',
        ],
        3 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/controllers/Mobile.php',
        ],
        4 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/install/module.php',
        ],
        5 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/install/permissions.php',
        ],
        6 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/install/settings.php',
        ],
        7 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/models/MobileModel.php',
        ],
        8 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/mobile/models/MobileInstallModel.php',
        ],
        9 => [
            0 => 'file',
            1 => 'write',
            2 => 'm/index.html',
        ],
        10 => [
            0 => 'file',
            1 => 'write',
            2 => 'm/scripts/app.js',
        ],
        11 => [
            0 => 'file',
            1 => 'write',
            2 => 'm/images/favicon/browserconfig.xml',
        ],
        12 => [
            0 => 'file',
            1 => 'write',
            2 => 'm/images/favicon/manifest.json',
        ],
        13 => [
            0 => 'dir',
            1 => 'read',
            2 => 'application/modules/mobile/langs',
        ],
    ],
    'libraries' => [
        0 => 'mobile_detect',
    ],
    'dependencies' => [
        'get_token' => [
            'version' => '1.01',
        ],
        'im' => [
            'version' => '1.01',
        ],
        'properties' => [
            'version' => '1.03',
        ],
        'start' => [
            'version' => '1.03',
        ],
        'users' => [
            'version' => '3.01',
        ],
    ],
    'linked_modules' => [
        'install' => [
            'menu' => 'installMenu',
            'moderators' => 'installModerators',
        ],
        'deinstall' => [
            'menu' => 'deinstallMenu',
            'moderators' => 'deinstallModerators',
        ],
    ],
];