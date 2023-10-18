<?php

return [
    'fe_sections' => [
        array("data" => array("gid" => "about-me", "editor_type_gid" => "users")),
        array("data" => array("gid" => "my-interests", "editor_type_gid" => "users")),
    ],
    'fe_fields' => [
        /*array("data" => array("gid" => "weight", "section_gid" => "about-me", "editor_type_gid" => "users", "field_type" => "select",
                "fts" => "0", "settings_data" => 'a:3:{s:13:"default_value";i:0;s:9:"view_type";s:6:"select";s:12:"empty_option";b:1;}',
                "sorter" => "1", "options" => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'))),*/
        array("data" => array("gid" => "height", "section_gid" => "about-me", "editor_type_gid" => "users", "field_type" => "select",
                "fts" => "0", "settings_data" => 'a:3:{s:13:"default_value";i:0;s:9:"view_type";s:6:"select";s:12:"empty_option";b:1;}',
                "sorter" => "2", "options" => array('1', '2', '3', '4', '5', '6', '7', '8'))),
        array("data" => array("gid" => "body", "section_gid" => "about-me", "editor_type_gid" => "users", "field_type" => "select",
                "fts" => "1", "settings_data" => 'a:3:{s:13:"default_value";i:0;s:9:"view_type";s:6:"select";s:12:"empty_option";b:1;}',
                "sorter" => "3", "options" => array('1', '2', '3', '4', '5', '6'))),
        array("data" => array("gid" => "hair", "section_gid" => "about-me", "editor_type_gid" => "users", "field_type" => "select",
                "fts" => "1", "settings_data" => 'a:3:{s:13:"default_value";i:0;s:9:"view_type";s:6:"select";s:12:"empty_option";b:1;}',
                "sorter" => "4", "options" => array('1', '2', '3', '4', '5', '6', '7', '8'))),
        array("data" => array("gid" => "style", "section_gid" => "about-me", "editor_type_gid" => "users", "field_type" => "multiselect",
                "fts" => "1", "settings_data" => 'a:2:{s:13:"default_value";s:0:"";s:9:"view_type";s:8:"checkbox";}', "sorter" => "6",
                "options" => array('1', '2', '3', '4', '5', '6'))),
        array(
            'data' => array('gid' => 'about_me', 'section_gid' => 'about-me', 'editor_type_gid' => 'users', 'field_type' => 'textarea',
                'fts' => '1', 'settings_data' => 'a:3:{s:13:"default_value";s:0:"";s:8:"min_char";i:0;s:8:"max_char";i:0;}', 'sorter' => '7', 'options' => array())),
        array("data" => array("gid" => "ideal_date", "section_gid" => "my-interests", "editor_type_gid" => "users", "field_type" => "textarea",
                "fts" => "1", "settings_data" => 'a:3:{s:13:"default_value";s:0:"";s:8:"min_char";i:0;s:8:"max_char";i:0;}',
                "sorter" => "1", "options" => array())),
        array("data" => array("gid" => "best_bd", "section_gid" => "my-interests", "editor_type_gid" => "users", "field_type" => "textarea",
                "fts" => "1", "settings_data" => 'a:3:{s:13:"default_value";s:0:"";s:8:"min_char";i:0;s:8:"max_char";i:0;}',
                "sorter" => "2", "options" => array())),
        array("data" => array("gid" => "interests", "section_gid" => "my-interests", "editor_type_gid" => "users", "field_type" => "multiselect",
                "fts" => "1", "settings_data" => 'a:2:{s:13:"default_value";s:0:"";s:9:"view_type";s:8:"checkbox";}', "sorter" => "3",
                "options" => array('1', '2', '3', '4', '5', '6', '7'))),
    ],
    'fe_forms' => [
        [
            'data' => [
                'gid' => 'advanced_search',
                'editor_type_gid' => 'users',
                'name' => 'Search form',
                'field_data' => '',
                'is_system' => 1,
            ],
        ],
    ],
    'fe_trial_forms' => [
        [
            'data' => [
                'gid' => 'advanced_search',
                'editor_type_gid' => 'users',
                'name' => 'Search form',
                'field_data' => 'a:3:{i:0;a:3:{s:4:"type";s:5:"field";s:5:"field";a:3:{s:3:"gid";s:6:"height";s:11:"section_gid";s:8:"about-me";s:4:"type";s:6:"select";}s:8:"settings";a:2:{s:11:"search_type";s:4:"many";s:9:"view_type";s:6:"select";}}i:1;a:3:{s:4:"type";s:5:"field";s:5:"field";a:3:{s:3:"gid";s:4:"body";s:11:"section_gid";s:8:"about-me";s:4:"type";s:6:"select";}s:8:"settings";a:2:{s:11:"search_type";s:4:"many";s:9:"view_type";s:6:"select";}}i:2;a:3:{s:4:"type";s:5:"field";s:5:"field";a:3:{s:3:"gid";s:9:"interests";s:11:"section_gid";s:12:"my-interests";s:4:"type";s:11:"multiselect";}s:8:"settings";a:3:{s:11:"search_type";s:3:"one";s:9:"view_type";s:7:"mselect";s:12:"search_match";s:9:"notstrict";}}}',
                'is_system' => 1,
            ],   
        ],
    ],
];
