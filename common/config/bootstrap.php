<?php

use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\RepositoryBuilder;

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(__DIR__, 2) . '/frontend');
Yii::setAlias('@backend', dirname(__DIR__, 2) . '/backend');
Yii::setAlias('@console', dirname(__DIR__, 2) . '/console');

Dotenv::create(RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(EnvConstAdapter::create()->get())
    ->addAdapter(PutenvAdapter::create()->get())
    ->make(), dirname(__DIR__, 2))->load();
