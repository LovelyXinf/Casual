<?php

$module =[
    'module' => 'geomap',
    'install_name' => 'Geo maps',
    'install_descr' => 'This module manages the use of maps on the site',
    'version' => '3.07',
    'files' => [
        0 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/controllers/AdminGeomap.php',
        ],
        1 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/controllers/ApiGeomap.php',
        ],
        2 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/controllers/Geomap.php',
        ],
        3 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/helpers/GeomapHelper.php',
        ],
        4 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/install/module.php',
        ],
        5 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/install/permissions.php',
        ],
        6 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/install/structure_deinstall.sql',
        ],
        7 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/install/structure_install.sql',
        ],
        8 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/js/bingmapsv7.js',
        ],
        9 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/js/geomap-amenity-select.js',
        ],
        10 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/js/googlemapsv3.js',
        ],
        11 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/js/markerclusterer.js',
        ],
        12 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/js/yandexmapsv2.js',
        ],
        13 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/models/Bingmapsv7Model.php',
        ],
        14 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/models/GeomapInstallModel.php',
        ],
        15 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/models/GeomapModel.php',
        ],
        16 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/models/GeomapSettingsModel.php',
        ],
        17 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/models/Googlemapsv3Model.php',
        ],
        18 => [
            0 => 'file',
            1 => 'read',
            2 => 'application/modules/geomap/models/Yandexmapsv2Model.php',
        ],
        19 => [
            0 => 'dir',
            1 => 'read',
            2 => 'application/modules/geomap/langs',
        ],
    ],
    'dependencies' => [
        'start' => [
            'version' => '1.03',
        ],
        'menu' => [
            'version' => '2.03',
        ],
        'uploads' => [
            'version' => '1.03',
        ],
    ],
    'linked_modules' => [
        'install' => [
            'menu' => 'installMenu',
            'uploads' => 'installUploads',
            'moderators' => 'installModerators',
        ],
        'deinstall' => [
            'menu' => 'deinstallMenu',
            'uploads' => 'deinstallUploads',
            'moderators' => 'deinstallModerators',
        ],
    ],
];