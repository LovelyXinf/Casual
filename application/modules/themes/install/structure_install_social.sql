INSERT INTO `[prefix]themes`(id, theme, theme_type, scheme, active, theme_name, theme_description, setable, logo_width, logo_height, logo_default, mini_logo_width, mini_logo_height, mini_logo_default, template_engine) VALUES
(3, 'flatty', 'user', 'default', 1, 'User area theme', 'Default user side template; PilotGroup', '1', '181', '31', 'logo_social.png', '30', '30', 'mini_logo_social.png', 'twig'),
(4, 'gentelella', 'admin', 'default', 1, 'Admin area theme', 'Gentelella template; PilotGroup', '1', '150', '28', 'logo_social.png', '29', '28', 'mini_logo_social.png', 'twig');

INSERT INTO `[prefix]themes_colorsets` (`id`, `set_name`, `set_gid`, `id_theme`, `color_settings`, `active`, `scheme_type`, `preset`) VALUES
(NULL, 'Social flatty', 'social', 3, 'a:46:{s:14:"index_bg_image";s:18:"index_bg_image.jpg";s:17:"index_bg_image_bg";s:6:"EEEEF4";s:21:"index_bg_image_scroll";s:1:"1";s:27:"index_bg_image_adjust_width";s:1:"1";s:28:"index_bg_image_adjust_height";b:0;s:23:"index_bg_image_repeat_x";b:0;s:23:"index_bg_image_repeat_y";b:0;s:18:"index_bg_image_ver";s:1:"2";s:7:"html_bg";s:6:"f5f6f8";s:7:"main_bg";s:6:"3498DB";s:9:"header_bg";s:6:"E6E6E6";s:9:"footer_bg";s:6:"E2EFF7";s:13:"menu_hover_bg";s:6:"E6E6E6";s:8:"hover_bg";b:0;s:8:"popup_bg";s:6:"FFFFFF";s:12:"highlight_bg";s:6:"EEEEEE";s:11:"input_color";s:6:"3498DB";s:14:"input_bg_color";s:6:"FFFFFF";s:12:"status_color";s:6:"28C4E6";s:10:"link_color";s:6:"3498DB";s:10:"font_color";s:6:"111111";s:12:"header_color";s:6:"0C1820";s:11:"descr_color";s:6:"777777";s:14:"contrast_color";s:6:"AAAAAA";s:15:"delimiter_color";s:6:"DDDDDD";s:10:"content_bg";s:6:"FFFFFF";s:11:"font_family";s:82:"\'SegoeUINormal\', Arial, \'Lucida Grande\',\'Lucida Sans Unicode\', Verdana, sans-serif";s:14:"main_font_size";s:2:"13";s:15:"input_font_size";s:2:"15";s:12:"h1_font_size";s:2:"20";s:12:"h2_font_size";s:2:"17";s:15:"small_font_size";s:2:"12";s:20:"search_btn_font_size";s:2:"22";s:15:"indicator_color";s:6:"21A339";s:14:"alert_error_bg";s:6:"F2DEDE";s:18:"alert_error_border";s:6:"EBCCD1";s:17:"alert_error_color";s:6:"A94442";s:16:"alert_success_bg";s:6:"DFF0D8";s:20:"alert_success_border";s:6:"D6E9C6";s:19:"alert_success_color";s:6:"3C763D";s:13:"alert_info_bg";s:6:"FFFFFF";s:17:"alert_info_border";s:6:"BCE8F1";s:16:"alert_info_color";s:6:"111111";s:16:"alert_warning_bg";s:6:"FCF8E3";s:20:"alert_warning_border";s:6:"FAEBCC";s:19:"alert_warning_color";s:6:"8A6D3B";}', 1, 'light', 'social'),
(NULL, 'Default color scheme', 'default', 4, 'a:23:{s:7:"html_bg";s:6:"F7F7F7";s:7:"main_bg";s:6:"FFFFFF";s:9:"header_bg";s:6:"FFFFFF";s:9:"footer_bg";s:6:"FFFFFF";s:8:"popup_bg";s:6:"363537";s:14:"input_main_btn";s:6:"32b44a";s:20:"input_additional_btn";s:6:"1479B8";s:10:"font_color";s:6:"73879C";s:10:"link_color";s:6:"5A738E";s:14:"contrast_color";s:6:"ECF0F1";s:11:"font_family";s:57:"\'Helvetica Neue\', Roboto, Arial, \'Droid Sans\', sans-serif";s:14:"main_font_size";s:2:"13";s:12:"h2_font_size";s:2:"14";s:15:"small_font_size";s:2:"12";s:8:"index_bg";s:0:"";s:13:"index_bg_size";s:9:"auto auto";s:14:"index_bg_image";s:0:"";s:21:"index_bg_image_scroll";s:1:"0";s:27:"index_bg_image_adjust_width";s:1:"0";s:28:"index_bg_image_adjust_height";s:1:"0";s:23:"index_bg_image_repeat_x";s:1:"0";s:23:"index_bg_image_repeat_y";s:1:"0";s:18:"index_bg_image_ver";s:0:"";}', 1, 'light', '');