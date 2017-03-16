<?php

//return [
//
//    'default' => env('DB_CONNECTION', 'mysql'),
//
//    'connections' => [
//
//        'sqlite' => [
//            'driver' => 'sqlite',
//            'database' => env('DB_DATABASE', database_path('database.sqlite')),
//            'prefix' => '',
//        ],
//
//        'mysql' => [
//            'driver' => 'mysql',
//            'host' => env('DB_HOST', '127.0.0.1'),
//            'port' => env('DB_PORT', '3306'),
//            'database' => env('DB_DATABASE', 'forge'),
//            'username' => env('DB_USERNAME', 'forge'),
//            'password' => env('DB_PASSWORD', ''),
//            'charset' => 'utf8mb4',
//            'collation' => 'utf8mb4_unicode_ci',
//            'prefix' => '',
//            'strict' => true,
//            'engine' => null,
//        ],
//
//        'pgsql' => [
//            'driver' => 'pgsql',
//            'host' => env('DB_HOST', '127.0.0.1'),
//            'port' => env('DB_PORT', '5432'),
//            'database' => env('DB_DATABASE', 'forge'),
//            'username' => env('DB_USERNAME', 'forge'),
//            'password' => env('DB_PASSWORD', ''),
//            'charset' => 'utf8',
//            'prefix' => '',
//            'schema' => 'public',
//            'sslmode' => 'prefer',
//        ],
//
//    ],
//
//
//    'migrations' => 'migrations',
//
//
//    'redis' => [
//
//        'client' => 'predis',
//
//        'default' => [
//            'host' => env('REDIS_HOST', '127.0.0.1'),
//            'password' => env('REDIS_PASSWORD', null),
//            'port' => env('REDIS_PORT', 6379),
//            'database' => 0,
//        ],
//
//    ],
//
//];

$url = parse_url(getenv("DATABASE_URL"));
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
return [
    'fetch' => PDO::FETCH_CLASS,
    'default' => 'pgsql',
    'connections' => [
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $host,
            'port' => 5432,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ],
    ],
    'migrations' => 'migrations',
    'redis' => [
        'cluster' => false,
        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ],
];
$database = substr($url["path"], 1);
