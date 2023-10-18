<?php

$module['module'] = 'mailbox';
$module['install_name'] = 'Mailbox';
$module['install_descr'] = 'The module installs mailbox on your site';
$module['category'] = 'communication';
$module['version'] = '3.06';
$module['files'] = array(
    array('file', 'read', "application/modules/mailbox/controllers/AdminMailbox.php"),
    array('file', 'read', "application/modules/mailbox/controllers/ApiMailbox.php"),
    array('file', 'read', "application/modules/mailbox/controllers/Mailbox.php"),
    array('file', 'read', "application/modules/mailbox/helpers/MailboxHelper.php"),
    array('file', 'read', "application/modules/mailbox/install/demo_structure_install.sql"),
    array('file', 'read', "application/modules/mailbox/install/module.php"),
    array('file', 'read', "application/modules/mailbox/install/permissions.php"),
    array('file', 'read', "application/modules/mailbox/install/settings.php"),
    array('file', 'read', "application/modules/mailbox/install/structure_deinstall.sql"),
    array('file', 'read', "application/modules/mailbox/install/structure_install.sql"),
    array('file', 'read', "application/modules/mailbox/js/mailbox_multi_request.js"),
    array('file', 'read', "application/modules/mailbox/models/MailboxModel.php"),
    array('file', 'read', "application/modules/mailbox/models/MailboxInstallModel.php"),
    array('file', 'read', "application/modules/mailbox/models/MailboxServiceModel.php"),

    array('dir', 'write', "uploads/file-uploads/mailbox-attach"),
    array('dir', 'read', 'application/modules/mailbox/langs'),
);

$module['dependencies'] = array(
    'start'         => array('version' => '1.03'),
    'menu'          => array('version' => '2.03'),
    'moderation'    => array('version' => '1.03'),
    'users'         => array('version' => '3.01'),
    'notifications' => array('version' => '1.04'),
);

$module['linked_modules'] = array(
    'install' => array(
        'menu'             => 'installMenu',
        'moderation'       => 'installModeration',
        'notifications'    => 'installNotifications',
        'site_map'         => 'installSiteMap',
        'file_uploads'     => 'installFileUploads',
        'banners'          => 'installBanners',
        'cronjob'          => 'installCronjob',
        'network'          => 'installNetwork',
        'access_permissions' => 'installAccessPermissions',
        'mobile' => 'installMobile',
    ),
    'deinstall' => array(
        'menu'             => 'deinstallMenu',
        'moderation'       => 'deinstallModeration',
        'notifications'    => 'deinstallNotifications',
        'site_map'         => 'deinstallSiteMap',
        'file_uploads'     => 'deinstallFileUploads',
        'banners'          => 'deinstallBanners',
        'cronjob'          => 'deinstallCronjob',
        'network'          => 'deinstallNetwork',
        'access_permissions' => 'deinstallAccessPermissions',
        'mobile' => 'deinstallMobile',
    ),
);
