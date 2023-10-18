<?php

use Pg\modules\favourites\models\FavouritesModel;

return [
    [
        'module_gid' => FavouritesModel::MODULE_GID,
        'controller' => FavouritesModel::MODULE_GID,
        'method' => null,
        'access' => 2,
        
        // TODO: не применять изменения к указанным методам
        'exclude' => [
            'favourites_favourites_get_status',
            'favourites_api_favourites_get_status',
        ],
    ]
];

