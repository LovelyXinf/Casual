<?php

$module =[
    'module' => 'favourites',
    'install_name' => 'Favourites module',
    'install_descr' => 'The module lets site members mark each other as favourites. No confirmation is required',
    'category' => 'action',
    'version' => '3.05',
    'files' => [
        0 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/controllers/ApiFavourites.php',
        ],
        1 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/controllers/Favourites.php',
        ],
        2 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/helpers/FavouritesHelper.php',
        ],
        3 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/install/module.php',
        ],
        4 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/install/permissions.php',
        ],
        5 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/install/settings.php',
        ],
        6 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/install/structure_deinstall.sql',
        ],
        7 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/install/structure_install.sql',
        ],
        8 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/js/favourites.js',
        ],
        9 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/models/FavouritesCallbacksModel.php',
        ],
        10 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/models/FavouritesInstallModel.php',
        ],
        11 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/favourites/models/FavouritesModel.php',
        ],
        12 => [
            0 => 'dir',
            1 => 'read',
            2 => 'application/modules/favourites/langs',
        ],
    ],
    'dependencies' => [
        'start' => [
            'version' => '1.03',
        ],
        'menu' => [
            'version' => '2.03',
        ],
        'users' => [
            'version' => '3.01',
        ],
        'notifications' => [
            'version' => '1.04',
        ],
    ],
    'linked_modules' => [
        'install' => [
            'menu' => 'installMenu',
            'site_map' => 'installSiteMap',
            'banners' => 'installBanners',
            'access_permissions' => 'installAccessPermissions',
            'notifications' => 'installNotifications',
        ],
        'deinstall' => [
            'menu' => 'deinstallMenu',
            'site_map' => 'deinstallSiteMap',
            'banners' => 'deinstallBanners',
            'access_permissions' => 'deinstallAccessPermissions',
            'notifications' => 'deinstallNotifications',
        ],
    ],
];