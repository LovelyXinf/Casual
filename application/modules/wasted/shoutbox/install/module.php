<?php

$module =[
    'module' => 'shoutbox',
    'install_name' => 'Shoutbox module',
    'install_descr' => 'The module installs ShoutBox on the site ',
    'version' => '2.07',
    'files' => [
        0 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/controllers/AdminShoutbox.php',
        ],
        1 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/controllers/ApiShoutbox.php',
        ],
        2 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/controllers/Shoutbox.php',
        ],
        3 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/helpers/ShoutboxHelper.php',
        ],
        4 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/install/demo_structure_install.sql',
        ],
        5 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/install/module.php',
        ],
        6 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/install/permissions.php',
        ],
        7 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/install/settings.php',
        ],
        8 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/install/structure_deinstall.sql',
        ],
        9 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/install/structure_install.sql',
        ],
        10 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/js/shoutbox.js',
        ],
        11 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/models/ShoutboxInstallModel.php',
        ],
        12 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/shoutbox/models/ShoutboxModel.php',
        ],
        13 => [
            0 => 'dir',
            1 => 'read',
            2 => 'application/modules/shoutbox/langs',
        ],
    ],
    'demo_content' => [
        'reinstall' => false,
    ],
    'dependencies' => [
        'start' => [
            'version' => '1.03',
        ],
        'menu' => [
            'version' => '1.01',
        ],
        'moderation' => [
            'version' => '1.01',
        ],
        'users' => [
            'version' => '1.01',
        ],
    ],
    'linked_modules' => [
        'install' => [
            'menu' => 'installMenu',
            'moderation' => 'installModeration',
            'cronjob' => 'installCronjob',
            'moderators' => 'installModerators',
            'users' => 'installUsers',
            'bonuses' => 'installBonuses',
        ],
        'deinstall' => [
            'menu' => 'deinstallMenu',
            'moderation' => 'deinstallModeration',
            'cronjob' => 'deinstallCronjob',
            'moderators' => 'deinstallModerators',
            'users' => 'deinstallUsers',
            'bonuses' => 'deinstallBonuses',
        ],
    ],
];