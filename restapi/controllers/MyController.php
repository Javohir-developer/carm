<?php


namespace restapi\controllers;


use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;


//http://firm-arm-api.loc/site/create
class MyController extends Controller
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['formats'] = [
            'class'=>'yii\filters\ContentNegotiator',
            'only'=>['index', 'view'],
            'formats'=>[
                'application/json'=>Response::FORMAT_JSON,
            ],
        ];

        $behaviors['access'] =
            [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'free-chat', 'qr-code'],
                        'roles' => ['?'],
                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['create', 'update'],
//                        'roles' => ['Admin'],
//                    ],
                ],

            ];

        $behaviors['corsFilter'] = ['class' => \yii\filters\Cors::className()];

//        $behaviors['authenticator'] = [
//            'only'=>['create', 'update', 'delete'],
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                HttpBearerAuth::className(),
//            ],
//        ];

        return $behaviors;

    }
}