<?php

namespace restapi\controllers;
use common\models\FreeChat;
use Yii;
use yii\web\HttpException;
use linslin\yii2\curl;

class WhatCrmController extends MyController
{
    public function actionFreeChat(){
        $model = new FreeChat();
        $curl = new curl\Curl();
        $response = $curl->setHeaders([
                'X-Whatsapp-Token' => '5d8af8faaeb61680883a850be0c577e2',
            ])->get('https://dev.whatsapp.sipteco.ru/v3/chat/spare?crm=TEST&domain=test');

        if ($curl->errorCode === null) {
            return $model->SaveFreeChat($response);
        } else {
            switch ($curl->errorCode) {
                case 6:
                    break;
            }
        }

    }
}