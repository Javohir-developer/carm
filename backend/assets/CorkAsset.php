<?php

namespace backend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CorkAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'cork-style2/layouts/horizontal-light-menu/css/light/loader.css',
//        'cork-style2/layouts/horizontal-light-menu/css/dark/loader.css',
//        'cork-style2/layouts/horizontal-light-menu/loader.js',
//        'https://fonts.googleapis.com/css?family=Nunito:400,600,700',
        'cork-style2/src/bootstrap/css/bootstrap.min.css',
        'cork-style2/layouts/horizontal-light-menu/css/light/plugins.css',
//        'cork-style2/layouts/horizontal-light-menu/css/dark/plugins.css',
        'cork-style2/src/plugins/src/apex/apexcharts.css',
        'cork-style2/src/assets/css/light/dashboard/dash_1.css',
//        'cork-style2/src/assets/css/dark/dashboard/dash_1.css',
        'cork-style2/assets/css/main.css',
        'cork-style2/assets/css/alert.css',
    ];
    public $js = [
        'cork-style2/src/bootstrap/js/bootstrap.bundle.min.js',
        'cork-style2/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js',
        'cork-style2/src/plugins/src/mousetrap/mousetrap.min.js',
        'cork-style2/src/plugins/src/waves/waves.min.js',
        'cork-style2/layouts/horizontal-light-menu/app.js',
        'cork-style2/src/plugins/src/apex/apexcharts.min.js',
        'cork-style2/src/assets/js/dashboard/dash_1.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
    ];
}
