<?php

/* <custom_R> */
$config['editor_type']['operators'] = [
    'gid'    => 'operators',
    'module' => 'operators',
    'name'   => 'Operators',
    'tables' => [
        'agency' => DB_PREFIX . 'operators',
    ],
    'field_prefix'   => 'fe_',
    'fulltext_use'   => true,
    'fulltext_field' => [
        'agency' => 'search_field',
    ],
    'fulltext_model'    => 'Operators_model',
    'fulltext_callback' => 'getFulltextData',
];
/* </custom_R> */
