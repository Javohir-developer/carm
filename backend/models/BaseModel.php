<?php

namespace backend\models;


use common\models\BaseModel AS CommonBaseModel;
use Yii;

class BaseModel extends CommonBaseModel
{

    public static function currencyType(){
        return [
            1 => Yii::t('app', 'UZS'),
//            2 => Yii::t('app', 'USD')
        ];
    }
    public static function unitType(){
        return [
            1 => Yii::t('app', 'шт'),
            2 => Yii::t('app', 'кг')
        ];
    }

    public static function termType(){
        return [
            1 => Yii::t('app', 'Суток'),
            2 => Yii::t('app', 'Неделя'),
            3 => Yii::t('app', 'Месяц'),
            4 => Yii::t('app', 'год')
        ];
    }

    public static function sizeType(){
        return [
            1 => Yii::t('app', 'гр'),
            2 => Yii::t('app', 'кг'),
            3 => Yii::t('app', 'мл'),
            4 => Yii::t('app', 'л'),
        ];
    }
}
