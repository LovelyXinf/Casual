<?php

$module['module'] = 'intercom';
$module['install_name'] = 'Intercom module';
$module['install_descr'] = 'The module creates the basis for Intercom.io system on your website';
$module['category'] = '';
$module['version'] = '1.03';
$module['files'] = array(
    array('file', 'read', "application/modules/intercom/install/module.php"),
    array('file', 'read', "application/modules/intercom/install/permissions.php"),
    array('file', 'read', "application/modules/intercom/install/settings.php"),
    array('dir', 'read', 'application/modules/intercom/langs'),
);

$module['dependencies'] = array(
    'start'            => array('version' => '1.01'),

);

$module['linked_modules'] = array(
    'install' => array(
        'menu'                => 'installMenu',
    ),
    'deinstall' => array(
        'menu'                => 'deinstallMenu',
    ),
);
