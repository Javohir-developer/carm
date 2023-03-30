<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
//    'bootstrap' => ['log'],
    'bootstrap' => ['devicedetect'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*']
        ],
    ],

    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
//                'yii\web\JqueryAsset' => [
//                    'js'=>[]
//                ],
//                'yii\bootstrap\BootstrapPluginAsset' => [
//                    'js'=>[]
//                ],
            ],
        ],
        'devicedetect' => [
            'class' => 'alexandernst\devicedetect\DeviceDetect'
        ],
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'response' => [
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'keepObjectType' => true, // keep object type for zero-indexed objects
                ],
            ],
        ],
        'companie' => [
            'class' => 'app\components\Companie',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'recaptchaV3' => [
            'class' => 'Baha2Odeh\RecaptchaV3\RecaptchaV3',
            'site_key' => '6LfCC7MUAAAAAHGWCzo5V1cZEOUiMh4tDW7TEn_G',
            'secret_key' => '6LfCC7MUAAAAAMKbRjkbESqCKnGgh_RjunShjfBM',
            'verify_ssl' => false, // default is true
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'shopsitescros@gmail.com',
                'password' => 'drghnqqosnmzkari',
                'port' => '25',
                'encryption' => 'tls',
            ],
        ],

//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            'useFileTransport' => false,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.mailtrap.io',
//                'username' => '02539d5a84e620',
//                'password' => '217a280dd42c9b',
//                'port' => '2525',
//                'encryption' => 'tls',
//            ],
//        ],

        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/config',
                    'fileMap' => [
                        'app' => 'app.php',
                        'recaptchav3' => 'recaptchav3.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableLanguagePersistence' => false,
            'enableLanguageDetection' => false,
            'enableDefaultLanguageUrlCode' => true,
            'languages' => ['ru', 'uz'], // List all supported languages here
        ],
    ],
    'params' => $params,
];
