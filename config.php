<?php

date_default_timezone_set('UTC');

define('INSTALL_DONE', true);
define('SHOW_CONFIG_READ_ERROR', false);

define("ENVIRONMENT", 'development');

define('SITE_SUBFOLDER', '');
define('SITE_PATH', '/home/webmaster/htdocs/casualsexfinder.net/panel/');
define('SITE_SERVER', 'https://panel.casualsexfinder.net/');
define('COOKIE_SITE_SERVER', '');

define('MOBILE_SERVER', '');

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'pgpaneluser');
define('DB_PASSWORD', 'Auf2W8V0Bs2kceXYLT2Y');
define('DB_DATABASE', 'pgpanel');
define('DB_PREFIX', 'pg_');
define('DB_DRIVER', 'pdo');

define('UPLOAD_DIR', 'uploads/');
define('DEFAULT_DIR', 'default/');
define('DATASOURCE_ICONS_DIR', 'datasource_icons/');
define('PATH_TO_IMAGE_MAGIC', '/usr/bin/convert');