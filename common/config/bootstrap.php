<?php

use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\RepositoryBuilder;

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Dotenv::create(RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(EnvConstAdapter::create()->get())
    ->addAdapter(PutenvAdapter::create()->get())
    ->make(), dirname(__DIR__, 2))->load();
