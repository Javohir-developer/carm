<?php

namespace backend\models;


use backend\modules\parameters\models\Suppliers;
use backend\modules\parameters\models\Warehouses;
use backend\modules\products\models\ProductTypes;
use common\models\BaseModel AS CommonBaseModel;
use Yii;
use yii\helpers\ArrayHelper;

class BaseModel extends CommonBaseModel
{
    public static function productTypes(){
        $product_type = ProductTypes::find()->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id(), 'status' => self::STATUS_ACTIVE])->all();
        return ArrayHelper::map($product_type, 'id', 'name');
    }

    public static function productType($id){
        $product_type = ProductTypes::find()->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id(), 'status' => self::STATUS_ACTIVE, 'id' => $id])->one();
        return $product_type->name;
    }
    public static function currencyType(){
        return [
            1 => Yii::t('app', 'UZS'),
//            2 => Yii::t('app', 'USD')
        ];
    }
    public static function unitType(){
        return [
            1 => Yii::t('app', 'шт'),
            2 => Yii::t('app', 'кг'),
            3 => Yii::t('app', 'г'),
            4 => Yii::t('app', 'мг'),
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

    public static function Currency($currency){
        return number_format(self::strReplace($currency), 2, '.', ' ');
    }

    public static function strReplace($num){
        return str_replace(" ", "", $num);
    }

    public function Warehouses(){
        $warehouse = Warehouses::find()->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id()])->all();
        return ArrayHelper::map($warehouse, 'id', 'name');
    }

    public function Suppliers(){
        $warehouse = Suppliers::find()->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id()])->all();
        return ArrayHelper::map($warehouse, 'id', 'name');
    }
}
