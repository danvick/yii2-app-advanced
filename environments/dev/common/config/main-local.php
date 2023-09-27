<?php

use danvick\jumbefupi\JumbefupiGateway;
use yii\db\Connection;
use yii\symfonymailer\Mailer;

return [
    'components' => [
        'db' => [
            'class' => Connection::class,
            'dsn' => 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_SCHEMA'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => Mailer::class,
            'viewPath' => '@common/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
            // You have to set
            //
            // 'useFileTransport' => false,
            //
            // and configure a transport for the mailer to send real emails.
            //
            // SMTP server example:
            //    'transport' => [
            //        'scheme' => 'smtps',
            //        'host' => '',
            //        'username' => '',
            //        'password' => '',
            //        'port' => 465,
            //        'dsn' => 'native://default',
            //    ],
            //
            // DSN example:
            //    'transport' => [
            //        'dsn' => 'smtp://user:pass@smtp.example.com:25',
            //    ],
            //
            // See: https://symfony.com/doc/current/mailer.html#using-built-in-transports
            // Or if you use a 3rd party service, see:
            // https://symfony.com/doc/current/mailer.html#using-a-3rd-party-transport
        ],
        'jumbefupi' => [
            'class' => JumbefupiGateway::class,
            'useFileTransport' => true,

            // You have to set
            //
            // 'useFileTransport' => false,
            //
            // and configure api access to JumbeFupi
            //
            //
            // 'gatewayUsername' => getenv('JUMBEFUPI_USERNAME'),
            // 'gatewayApiKey' => getenv('JUMBEFUPI_API_KEY'),
            // 'senderId' => getenv('JUMBEFUPI_SENDER_ID'),
            // 'callbackUrl' => getenv('JUMBEFUPI_CALLBACK_URL'),
            // 'model' => null,
            // 'cacheBalance' => true,
            // 'db' => 'db',
            //
        ],
    ],
];
