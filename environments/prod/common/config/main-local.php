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
            'transport' => [
                'dsn' => getenv('MAILER_TRANSPORT_SCHEME') . '://'.getenv('MAILER_TRANSPORT_USERNAME').':'.getenv('MAILER_TRANSPORT_PASSWORD').'@'.getenv('MAILER_TRANSPORT_HOST').':'.getenv('MAILER_TRANSPORT_PORT'),
            ],
        ],
        'jumbefupi' => [
            'class' => JumbefupiGateway::class,
            'gatewayUsername' => getenv('JUMBEFUPI_USERNAME'),
            'gatewayApiKey' => getenv('JUMBEFUPI_API_KEY'),
            'senderId' => getenv('JUMBEFUPI_SENDER_ID'),
            'callbackUrl' => getenv('JUMBEFUPI_CALLBACK_URL'),
        ],
    ],
];
