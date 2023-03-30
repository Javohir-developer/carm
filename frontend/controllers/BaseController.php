<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class BaseController extends Controller
{

    public static function main_layout(){
        return 'main';
    }
    public static function products_layout(){
        return 'products_main';
    }
    public static function products_view_layout(){
        return 'products_view_main';
    }
    public static function empty_layout(){
        return 'empty_main';
    }
    public static function account_layout(){
        return 'account_main';
    }

    public function actions()
    {
        $this->layout = $this->products_layout();
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

}
