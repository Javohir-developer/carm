<?php


namespace restapi;

/**
 * v1 module definition class
 */
class Module extends \yii\base\Module
{
    public static $urlRules = [
        [
            'class' => '\yii\rest\UrlRule',
            'controller' => 'site',
            'extraPatterns' => [
                'GET index' => 'index',
                'POST create' => 'create',
                'PUT update' => 'update',
                'DELETE delete' => 'delete',
            ],
            'pluralize' => false,
        ],
        [
            'class' => '\yii\rest\UrlRule',
            'controller' => 'what-crm',
            'extraPatterns' => [
                'GET free-chat' => 'free-chat',
                'GET qr-code' => 'qr-code',
            ],
            'pluralize' => false,
        ],
    ];

//    public static function allowedDomains()
//    {
//        return [
//            '*',
//        ];
//    }
}
