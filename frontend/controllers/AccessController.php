<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\Account;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\JqueryAsset;

class AccessController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],// Правило для гостей.
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],// Правило для аутентифицированных пользователей.
                    ],
                    [
                        'actions' => ['index', 'update', 'login', 'error', 'signup', 'create', 'categories', 'sub-categories', 'activate-product', 'in-activate-product', 'deleted'],
                        'allow' => true,
                        'roles' => ['User'],
                        'matchCallback' => function () {
                            $controllers = ['account', 'create-user-products'];
                            return in_array(Yii::$app->controller->id, $controllers);// Метод $controllers вернет true или false в зависимости от роли пользователя.
                        },
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['get'],
//                ],
//            ],
        ];
    }
}
