DROP TABLE IF EXISTS `[prefix]like_me`;
CREATE TABLE IF NOT EXISTS `[prefix]like_me` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_profile` int(10) NOT NULL,
  `status_match` tinyint(2) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `[prefix]like_me` (`id`, `id_user`, `id_profile`, `status_match`, `date_created`) VALUES
(null, 25, 9, 0, '2017-12-19 18:51:41'),
(null, 25, 11, 0, '2017-12-19 18:51:43'),
(null, 25, 14, 0, '2017-12-19 18:51:47'),
(null, 25, 20, 0, '2017-12-19 18:51:59'),
(null, 25, 22, 0, '2017-12-19 18:52:00'),
(null, 25, 23, 0, '2017-12-19 18:52:02'),
(null, 23, 5, 0, '2017-12-19 19:14:19'),
(null, 23, 10, 0, '2017-12-19 19:14:21'),
(null, 23, 18, 0, '2017-12-19 19:14:23'),
(null, 23, 21, 0, '2017-12-19 19:14:25'),
(null, 22, 1, 0, '2017-12-19 19:15:01'),
(null, 22, 12, 0, '2017-12-19 19:15:07'),
(null, 22, 24, 0, '2017-12-19 19:16:22'),
(null, 33, 1, 0, '2017-12-20 21:40:41'),
(null, 33, 3, 0, '2017-12-20 21:40:43'),
(null, 33, 5, 0, '2017-12-20 21:40:44'),
(null, 33, 8, 0, '2017-12-20 21:40:45'),
(null, 33, 10, 0, '2017-12-20 21:40:46'),
(null, 33, 12, 0, '2017-12-20 21:40:48'),
(null, 33, 13, 0, '2017-12-20 21:40:50'),
(null, 33, 24, 0, '2017-12-20 21:40:54'),
(null, 33, 27, 0, '2017-12-20 21:40:56'),
(null, 33, 30, 0, '2017-12-20 21:40:59'),
(null, 36, 1, 0, '2017-12-22 10:20:48'),
(null, 36, 3, 0, '2017-12-22 10:20:50'),
(null, 36, 5, 0, '2017-12-22 10:20:51'),
(null, 36, 8, 0, '2017-12-22 10:20:53'),
(null, 36, 24, 0, '2017-12-22 10:21:06'),
(null, 36, 30, 0, '2017-12-22 10:21:14'),
(null, 36, 31, 0, '2017-12-22 10:21:16'),
(null, 36, 34, 0, '2017-12-22 10:21:18'),
(null, 37, 2, 0, '2017-12-22 10:37:46'),
(null, 37, 4, 0, '2017-12-22 10:37:47'),
(null, 37, 6, 0, '2017-12-22 10:37:48'),
(null, 37, 7, 0, '2017-12-22 10:37:49'),
(null, 37, 9, 0, '2017-12-22 10:37:50'),
(null, 37, 11, 0, '2017-12-22 10:37:50'),
(null, 37, 14, 0, '2017-12-22 10:37:51'),
(null, 37, 15, 0, '2017-12-22 10:37:52'),
(null, 37, 19, 0, '2017-12-22 10:37:53'),
(null, 37, 20, 0, '2017-12-22 10:37:54'),
(null, 37, 22, 0, '2017-12-22 10:37:55'),
(null, 37, 23, 0, '2017-12-22 10:37:55'),
(null, 37, 26, 0, '2017-12-22 10:37:56'),
(null, 37, 28, 0, '2017-12-22 10:37:57'),
(null, 37, 32, 0, '2017-12-22 10:37:58'),
(null, 37, 33, 0, '2017-12-22 10:37:59'),
(null, 37, 35, 0, '2017-12-22 10:38:00'),
(null, 37, 36, 0, '2017-12-22 10:38:00');