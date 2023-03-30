<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
//            'dsn' => 'pgsql:host=localhost;port=5432;dbname=carm',
            'dsn' => 'pgsql:host=carm-db;port=5432;dbname=carm',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
    ],

];
