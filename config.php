<?php

return [
    'database' => [
        'name'     => DB_NAME,
        'username' => USERNAME,
        'password' => PASSWORD,
        'type'     => 'mysql',
        'host'     => '127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ],
    ],
];