<?php

return [
    'path' => base_path('content/addons/plugrbase_env_bar.yaml'),

    /*
    * The possible name(s) for the environments.
    */
    'environment' => [
        'local' => 'local',
        'dev' => 'development',
        'development' => 'development',
        'staging' => 'staging',
        'acceptance' => 'staging',
        'production' => 'production',
    ],

    /*
    * The colos used for the environments.
    */
    'color' => [
        'local' => '#662244',
        'development' => '#662244',
        'staging' => '#662244',
        'production' => '#662244',
    ]
];
