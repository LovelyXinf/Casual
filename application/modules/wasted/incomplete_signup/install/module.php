<?php

$module =[
    'module' => 'incomplete_signup',
    'install_name' => 'Incomplete signup',
    'install_descr' => 'This module collects available info on the site visitors who started the process of registration and for this or that reason failed to complete it',
    'version' => '3.01',
    'files' => [
        0 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/controllers/AdminIncompleteSignup.php',
        ],
        1 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/controllers/IncompleteSignup.php',
        ],
        2 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/helpers/IncompleteSignupHelper.php',
        ],
        3 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/install/module.php',
        ],
        4 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/install/permissions.php',
        ],
        5 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/install/settings.php',
        ],
        6 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/install/structure_deinstall.sql',
        ],
        7 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/install/structure_install.sql',
        ],
        8 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/models/IncompleteSignupInstallModel.php',
        ],
        9 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/models/IncompleteSignupModel.php',
        ],
        10 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/js/incomplete_signup.js',
        ],
        11 => [
            0 => 'dir',
            1 => 'read',
            2 => 'application/modules/incomplete_signup/langs',
        ],
    ],
    'dependencies' => [
        'start' => [
            'version' => '1.01',
        ],
        'menu' => [
            'version' => '1.01',
        ],
        'users' => [
            'version' => '1.01',
        ],
    ],
    'linked_modules' => [
        'install' => [
            'start' => 'installStart',
            'menu' => 'installMenu',
            'notifications' => 'installNotifications',
        ],
        'deinstall' => [
            'start' => 'deinstallStart',
            'menu' => 'deinstallMenu',
            'notifications' => 'deinstallNotifications',
        ],
    ],
];