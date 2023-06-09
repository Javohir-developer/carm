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
//        'https://cros.uz/shopping/bootstrap/css/shop_style.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css',

        'cork-style2/src/bootstrap/css/bootstrap.min.css',
        'cork-style2/layouts/horizontal-light-menu/css/light/plugins.css',
        'cork-style2/src/plugins/src/apex/apexcharts.css',
        'cork-style2/src/assets/css/light/dashboard/dash_1.css',

        'cork-style2/src/plugins/src/table/datatable/datatables.css',
        'cork-style2/src/plugins/css/light/table/datatable/dt-global_style.css',

        'cork-style2/assets/css/main.css',
        'cork-style2/assets/css/alert-2.css',
    ];
    public $js = [

        'cork-style2/src/bootstrap/js/bootstrap.bundle.min.js',

//        'cork-style2/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js',
//        'cork-style2/src/plugins/src/mousetrap/mousetrap.min.js',
//        'cork-style2/src/plugins/src/waves/waves.min.js',
        'cork-style2/layouts/horizontal-light-menu/app.js',
//        'cork-style2/src/plugins/src/apex/apexcharts.min.js',
//        'cork-style2/src/assets/js/dashboard/dash_1.js',

        'cork-style2/assets/js/bootstrap-notify-3-1-5.js',
        'cork-style2/assets/js/jquery-barcode.js',
        'cork-style2/assets/js/main.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
    ];
}
