<?php

use Pg\modules\favourites\models\FavouritesModel;

return [
    'acl' => [
        FavouritesModel::MODULE_GID => [
             'module' => [
                'access' => 2,
                'module_gid' => FavouritesModel::MODULE_GID,
                'permission' => FavouritesModel::MODULE_GID . '_' . FavouritesModel::MODULE_GID,
            ],
            'permissions' => [
                'list' => [
                    FavouritesModel::MODULE_GID => [
                        'default' => ['status' => 0],
                        'trial' => ['status' => 1],
                        'silver' => ['status' => 1],
                        'premium' => ['status' => 1],
                    ]
                ],
            ],
        ]
    ]
];
