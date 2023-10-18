<?php

$module =[
    'module' => 'uploads',
    'install_name' => 'Uploads settings management',
    'install_descr' => 'This module lets you manage the types and sizes of uploaded files',
    'version' => '3.04',
    'files' => [
        0 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/controllers/AdminUploads.php',
        ],
        1 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/install/module.php',
        ],
        2 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/install/permissions.php',
        ],
        3 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/install/structure_deinstall.sql',
        ],
        4 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/install/structure_install.sql',
        ],
        5 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/js/ajaxfileupload.min.js',
        ],
        6 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/js/colorpicker.min.js',
        ],
        7 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/models/UploadsConfigModel.php',
        ],
        8 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/models/UploadsInstallModel.php',
        ],
        9 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/uploads/models/UploadsModel.php',
        ],
        10 => [
            0 => 'dir',
            1 => 'read',
            2 => 'application/modules/uploads/langs',
        ],
        11 => [
            0 => 'dir',
            1 => 'write',
            2 => 'uploads',
        ],
        12 => [
            0 => 'dir',
            1 => 'write',
            2 => 'uploads/watermark',
        ],
        13 => [
            0 => 'file',
            1 => 'write',
            2 => 'uploads/watermark/wm_image-wm.png',
        ],
        14 => [
            0 => 'dir',
            1 => 'write',
            2 => 'uploads/default',
        ],
        15 => [
            0 => 'file',
            1 => 'write',
            2 => 'uploads/default/watermark_test.jpg',
        ],
    ],
    'dependencies' => [
        'start' => [
            'version' => '1.03',
        ],
        'menu' => [
            'version' => '2.03',
        ],
    ],
    'linked_modules' => [
        'install' => [
            'menu' => 'installMenu',
        ],
        'deinstall' => [
            'menu' => 'deinstallMenu',
        ],
    ],
];