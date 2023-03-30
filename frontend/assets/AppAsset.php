<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'shopping/bootstrap/css/bootstrap-4-5-2.css',
        'shopping/bootstrap/css/shop_style.css',
        'shopping/bootstrap/css/styles-l.min.css',
        'shopping/bootstrap/css/settings_default.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css',
        'shopping/styles/universal/css/main.css',
    ];
    public $js = [
        'shopping/bootstrap/jquery/jquery-3-5-1.js',
        'shopping/bootstrap/jquery/ajax-jquery-3-6.js',
        'shopping/bootstrap/jquery/bootstrap-4-5-2.js',
        'shopping/bootstrap/jquery/bootstrap-notify-3-1-5.js',
        'shopping/styles/universal/js/main.js',
        'shopping/styles/basket/js/main.js',
        'shopping/styles/like/js/main.js',
        'shopping/bootstrap/jquery/bootstrap-notify-3-1-5.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
