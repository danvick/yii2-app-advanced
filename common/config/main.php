<?php

use common\channels\FcmChannel;
use common\channels\JumbeFupiChannel;
use creocoder\flysystem\LocalFilesystem;
use tuyakhov\notifications\channels\ActiveRecordChannel;
use tuyakhov\notifications\channels\MailChannel;
use tuyakhov\notifications\Notifier;
use yii\redis\Cache;
use yii\redis\Connection;
use yii\redis\Mutex;
use yii\redis\Session;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'redis' => [
            'class' => Connection::class,
            'hostname' => getenv('REDIS_HOST'),
            'port' => getenv('REDIS_PORT'),
            'database' => 0,
        ],
        'session' => [
            'class' => Session::class,
            'keyPrefix' => 'APP_SESSION_'
        ],
        'cache' => [
            'class' => Cache::class,
            'keyPrefix' => 'APP_CACHE_',
        ],
        'mutex' => [
            'class' => Mutex::class,
        ],
        'fs' => [
            'class' => LocalFilesystem::class,
            'path' => '@backend/uploads',
            // 'writeFlags' => LOCK_EX,
            // 'linkHandling' => 0002,
            // 'permissions' => [],
        ],
        'notifier' => [
            'class' => Notifier::class,
            'channels' => [
                'mail' => [
                    'class' => MailChannel::class,
                    'from' => getenv('SENDER_EMAIL'),
                ],
                'database' => [
                    'class' => ActiveRecordChannel::class,
                ],
                'fcm' => [
                    'class' => FcmChannel::class,
                    'serverKey' => getenv('FCM_SERVER_KEY'),
                    'senderId' => getenv('FCM_SENDER_ID'),
                ],
                'sms' => [
                    'class' => JumbeFupiChannel::class,
                ],
            ],
        ],
    ],
];
