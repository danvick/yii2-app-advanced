<?php

namespace api\assets;

use yii\web\AssetBundle;
use yii\bootstrap5\BootstrapAsset;
use yii\web\YiiAsset;

/**
 * Main api application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}
