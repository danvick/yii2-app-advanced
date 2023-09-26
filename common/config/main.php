<?php

use yii\caching\FileCache;
use yii\redis\Cache;
use yii\redis\Connection;
use yii\redis\Session;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'redis' => [
            'class' => Connection::class,
            'hostname' => getenv('REDIS_HOST'),
            'port' => getenv('REDIS_PORT'),
            'database' => 0
        ],
        'session' => [
            'class' => Session::class,
            'keyPrefix' => 'APP_SESSION_'
        ],
        'cache' => [
            'class' => Cache::class,
            'keyPrefix' => 'APP_CACHE_',
        ],
    ],
];
