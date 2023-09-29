<?php

return [
    'emails' => [
        getenv('DEVELOPER_EMAIL'),
    ],
    'projectRootPath' => '@projectRoot',
    'webPaths' => [
        [
            'path' => '@api/web',
            'link' => '@api/httpdocs',
            'stub' => '@api/webstub',
        ],
        [
            'path' => '@backend/web',
            'link' => '@backend/httpdocs',
            'stub' => '@backend/webstub',
        ],
        [
            'path' => '@frontend/web',
            'link' => '@frontend/httpdocs',
            'stub' => '@frontend/webstub',
        ],
    ],
    'tmpDirectories' => [
        '@api/web/assets',
        '@api/runtime/URI',
        '@api/runtime/HTML',
        '@api/runtime/debug',
        '@api/runtime/cache',

        '@backend/web/assets',
        '@backend/runtime/URI',
        '@backend/runtime/HTML',
        '@backend/runtime/debug',
        '@backend/runtime/cache',

        '@frontend/web/assets',
        '@frontend/runtime/URI',
        '@frontend/runtime/HTML',
        '@frontend/runtime/debug',
        '@frontend/runtime/cache',
    ],
    // 'beforeUpdateCommands' => [],
    'afterUpdateCommands' => [
        'php yii migrate/up --interactive=0'
    ],
    'composerOptions' => YII_ENV === 'dev' ? [] : ['no-dev', '--optimize-autoloader'],
    'composerRootPaths' => [
        '@projectRoot',
    ],
    'hostName' => 'example.com',
    'reportFrom' => getenv('SUPPORT_EMAIL'),
];
