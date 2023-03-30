<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class EmptyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'shopping/bootstrap/css/styles-l.min.css',
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
