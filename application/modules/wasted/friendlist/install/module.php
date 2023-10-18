<?php

$module['module'] = 'friendlist';
$module['install_name'] = 'Friendlist module';
$module['install_descr'] = 'The module manages friends list';
$module['category'] = 'action';
$module['version'] = '2.06';
$module['files'] = array(
    array('file', 'read', "application/modules/friendlist/controllers/ApiFriendlist.php"),
    array('file', 'read', "application/modules/friendlist/controllers/Friendlist.php"),
    array('file', 'read', "application/modules/friendlist/helpers/FriendlistHelper.php"),
    array('file', 'read', "application/modules/friendlist/install/demo_structure_install.sql"),
    array('file', 'read', "application/modules/friendlist/install/module.php"),
    array('file', 'read', "application/modules/friendlist/install/permissions.php"),
    array('file', 'read', "application/modules/friendlist/install/settings.php"),
    array('file', 'read', "application/modules/friendlist/install/structure_deinstall.sql"),
    array('file', 'read', "application/modules/friendlist/install/structure_install.sql"),
    array('file', 'read', "application/modules/friendlist/js/friends-input.js"),
    array('file', 'read', "application/modules/friendlist/js/friends-select.js"),
    array('file', 'read', "application/modules/friendlist/js/lists_links.js"),
    array('file', 'read', "application/modules/friendlist/js/friendlist_multi_request.js"),
    array('file', 'read', "application/modules/friendlist/models/FriendlistCallbacksModel.php"),
    array('file', 'read', "application/modules/friendlist/models/FriendlistInstallModel.php"),
    array('file', 'read', "application/modules/friendlist/models/FriendlistModel.php"),
    array('dir', 'read', 'application/modules/friendlist/langs'),
);

$module['dependencies'] = array(
    'start'         => array('version' => '1.03'),
    'menu'          => array('version' => '2.03'),
    'moderation'    => array('version' => '1.01'),
    'users'         => array('version' => '3.01'),
    'notifications' => array('version' => '1.04'),
);

$module['linked_modules'] = array(
    'install' => array(
        'menu'          => 'installMenu',
        'moderation'    => 'installModeration',
        'wall_events'   => 'installWallEvents',
        'site_map'      => 'installSiteMap',
        'notifications' => 'installNotifications',
        'banners'       => 'installBanners',
        'network'       => 'installNetwork',
        'media'         => 'installMedia',
        'access_permissions' => 'installAccessPermissions',
        'mobile' => 'installMobile'
    ),
    'deinstall' => array(
        'menu'          => 'deinstallMenu',
        'moderation'    => 'deinstallModeration',
        'wall_events'   => 'deinstallWallEvents',
        'site_map'      => 'deinstallSiteMap',
        'notifications' => 'deinstallNotifications',
        'banners'       => 'deinstallBanners',
        'network'       => 'deinstallNetwork',
        'media'         => 'deinstallMedia',
        'access_permissions' => 'deinstallAccessPermissions',
        'mobile' => 'deinstallMobile'
    ),
);
