<?php

namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\ErrorAction;

class BaseController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],// Правило для гостей.
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],// Правило для аутентифицированных пользователей.
                    ],
                    [
                        'actions' => [
                            'index', 'create', 'view', 'update', 'delete', 'add-product-to-cache',
                            'update-product-from-cache', 'delete-product-from-cache', 'save-cache-products',
                            'clear-products-from-cache', 'search-barcode', 'ajax-get-list-of-transitions',
                            'ajax-edit-list-of-transitions'
                        ],
                        'allow' => true,
                        'roles' => ['Drektor'],
                        'matchCallback' => function () {
                            $controllers = ['statistics', 'site', 'suppliers', 'warehouses', 'products', 'list-of-transitions', 'product-types'];
                            return in_array(Yii::$app->controller->id, $controllers);// Метод $controllers вернет true или false в зависимости от роли пользователя.
                        },
                    ],
                    [
                        'actions' => ['index', 'create', 'view', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['theCreator'],
                        'matchCallback' => function () {
                            $controllers = ['statistics', 'companies', 'site', 'users', 'region', 'city'];
                            return in_array(Yii::$app->controller->id, $controllers);// Метод $controllers вернет true или false в зависимости от роли пользователя.
                        }
                    ],
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
                // Тут можно добавить свой шаблон.
                // Или ничего не указывать, при этом будет использоваться тот, который прописан в 'errorHandler'
                'view' => 'site/error',
                //'layout' => 'error'
            ]
        ];
    }


}
