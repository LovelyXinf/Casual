DROP TABLE IF EXISTS `[prefix]inapp_billing_tokens`;
CREATE TABLE `[prefix]inapp_billing_tokens` (
  `token_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` text CHARACTER SET utf8 NOT NULL,
  `token_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `[prefix]inapp_billing_tokens` (`token_name`, `token`, `token_type`, `expires`) VALUES
('access_token',	'',	'',	0),
('refresh_token',	'',	'',	0);

DROP TABLE IF EXISTS `[prefix]inapp_products`;
CREATE TABLE `[prefix]inapp_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` VARCHAR(20) NOT NULL,
  `model` VARCHAR(100) NOT NULL DEFAULT 'account',
  `group_period_id` int(11) NOT NULL,
  `service_gid` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `[prefix]fcm_registration_tokens`;
CREATE TABLE `[prefix]fcm_registration_tokens` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `registration_id` varchar(255) CHARACTER SET utf8 NOT NULL,
    `device_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `[prefix]mobile_push_notifications`;
CREATE TABLE `[prefix]mobile_push_notifications` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `module` varchar(50) CHARACTER SET utf8 NOT NULL,
  `gid` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_modified` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;