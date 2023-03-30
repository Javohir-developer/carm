<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'cork-style2/layouts/horizontal-light-menu/css/light/loader.css',
        'cork-style2/layouts/horizontal-light-menu/css/dark/loader.css',
        'cork-style2/src/bootstrap/css/bootstrap.min.css',
        'cork-style2/layouts/horizontal-light-menu/css/light/plugins.css',
        'cork-style2/src/assets/css/light/authentication/auth-boxed.css',
        'cork-style2/layouts/horizontal-light-menu/css/dark/plugins.css',
        'cork-style2/src/assets/css/dark/authentication/auth-boxed.css',
    ];
    public $js = [
        'cork-style2/src/bootstrap/js/bootstrap.bundle.min.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
    ];
}
