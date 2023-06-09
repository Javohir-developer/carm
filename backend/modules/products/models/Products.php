<?php

namespace backend\modules\products\models;

use backend\models\BaseModel;
use backend\modules\companies\models\Companies;
use backend\modules\parameters\models\Suppliers;
use backend\modules\parameters\models\Warehouses;
use common\models\User;
use Yii;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $company_id
 * @property int|null $warehouse_id
 * @property int|null $supplier_id
 * @property string|null $date
 * @property int $currency
 * @property int|null $currency_amount
 * @property int|null $barcode
 * @property int|null $barcode_type
 * @property int|null $group
 * @property string|null $name
 * @property string|null $model
 * @property string|null $brand
 * @property string|null $size
 * @property int|null $ikpu
 * @property int|null $unit_amount
 * @property int|null $max_ast
 * @property int|null $min_ast
 * @property string|null $production_time
 * @property int|null $term_amount
 * @property int|null $term_type
 * @property string|null $valid
 * @property int|null $ndc
 * @property int|null $entry_price
 * @property float|null $evaluation
 * @property int|null $exit_price
 * @property int|null $sum_entry_price
 * @property int|null $sum_exit_price
 * @property int|null $unit_type
 * @property int|null $amount
 * @property int $input_status
 * @property int $status
 * @property int $code_group
 * @property int $product_types_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Companies $company
 * @property Suppliers $supplier
 * @property User $user
 * @property Warehouses $warehouse
 */
class Products extends BaseModel
{

    const BAR_CODE_TYPE_RANDOM = 1;
    const BAR_CODE_TYPE_WEIGHT = 2;
    const BAR_CODE_TYPE_PIECE = 3;
    public $old_entry_price;
    public $old_exit_price;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }


    public static function cacheProd()
    {
        return 'cache-'.Yii::$app->user->id.'_'.Yii::$app->company->id();
    }

    public static function cacheSum()
    {
        return 'sum-'.Yii::$app->user->id.'_'.Yii::$app->company->id();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [['company_id'], 'default', 'value' => Yii::$app->company->id()],
            [['input_status', 'status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['user_id', 'company_id', 'supplier_id', 'warehouse_id', 'barcode', 'name', 'amount', 'entry_price', 'evaluation', 'exit_price', 'product_types_id'], 'required'],
            [['user_id', 'company_id', 'warehouse_id', 'supplier_id', 'currency', 'barcode', 'group', 'ikpu', 'unit_amount', 'max_ast', 'min_ast', 'term_amount', 'term_type', 'ndc', 'unit_type', 'amount', 'input_status', 'status', 'product_types_id', 'size_num', 'size_type', 'code_group', 'barcode_type'], 'integer'],
            [['date', 'production_time', 'valid', 'created_at', 'updated_at'], 'safe'],
            [['currency_amount', 'entry_price', 'exit_price', 'sum_entry_price', 'sum_exit_price', 'old_entry_price', 'old_exit_price'], 'number'],
            [['evaluation'], 'number', 'min' => 1],
            [['name', 'model', 'brand'], 'string', 'max' => 255],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::class, 'targetAttribute' => ['supplier_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouses::class, 'targetAttribute' => ['warehouse_id' => 'id']],
            [['barcode'], 'barcode_unique']
        ];
    }

    public function barcode_unique($attribute, $params)
    {
        if (Products::findOne(['barcode' => $this->$attribute, 'company_id' => Yii::$app->company->id()]) || in_array($this->$attribute, array_column(self::getProductInCache(), 'barcode')))
            $this->addError($attribute, Yii::t('app', 'этот штрих-код уже существует'));
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'warehouse_id' => Yii::t('app', 'Склад'),
            'supplier_id' => Yii::t('app', 'Поставщик'),
            'date' => Yii::t('app', 'Дата'),
            'currency' => Yii::t('app', 'Валюта'),
            'currency_amount' => Yii::t('app', 'Вал./Кол-во.'),
            'barcode' => Yii::t('app', 'Бар код'),
            'group' => Yii::t('app', 'Группа'),
            'name' => Yii::t('app', 'Название'),
            'model' => Yii::t('app', 'Модель'),
            'brand' => Yii::t('app', 'Бранд'),
            'size_num' => Yii::t('app', 'Размер'),
            'ikpu' => Yii::t('app', 'ИКПУ'),
            'unit_amount' => Yii::t('app', 'Ед./кол.'),
            'max_ast' => Yii::t('app', 'Махс./ост.'),
            'min_ast' => Yii::t('app', 'Мин./ост.'),
            'production_time' => Yii::t('app', 'Дата изг.'),
            'term_amount' => Yii::t('app', 'Срок'),
            'term_type' => Yii::t('app', 'Срок тип'),
            'valid' => Yii::t('app', 'годен'),
            'ndc' => Yii::t('app', 'НДС'),
            'entry_price' => Yii::t('app', 'Цена прх.'),
            'evaluation' => Yii::t('app', 'Оценка'),
            'exit_price' => Yii::t('app', 'Цена прд.'),
            'sum_entry_price' => Yii::t('app', 'Стар. цена прх.'),
            'sum_exit_price' => Yii::t('app', 'Стар. цена прд.'),
            'unit_type' => Yii::t('app', 'Едю./изм.'),
            'amount' => Yii::t('app', 'Едю./кол-во'),
            'input_status' => Yii::t('app', 'Статус'),
            'status' => Yii::t('app', 'Статус'),
            'product_types_id' => Yii::t('app', 'Тип'),
            'old_entry_price' => Yii::t('app', 'Старый цена прх.'),
            'old_exit_price' => Yii::t('app', 'Старый цена прд.'),
        ];
    }




    public static function getProductInCache(){
        if (!empty($_SESSION[self::cacheProd()])){
            return $_SESSION[self::cacheProd()];
        }
        return [];
    }

    public static function getSumParamsInCache(){
        if (!empty($_SESSION[self::cacheSum()])){
            return $_SESSION[self::cacheSum()];
        }
        return [];
    }

    public function addProductToCache(){
        if ($this->validate()){
            Yii::$app->company->session();
            $_SESSION[self::cacheProd()][] = $this->sumAttributes();
            self::sumParams();
            return true;
        }
    }
    public function updateProductFromCache($post){
        $post['entry_price']    = self::strReplace($post['entry_price']);
        if ($_SESSION[self::cacheProd()][$post['id']]['evaluation'] != $post['evaluation'] || $_SESSION[self::cacheProd()][$post['id']]['entry_price'] != $post['entry_price']){
            $post['exit_price'] =  (($post['evaluation'] + 100) / 100) * self::strReplace($post['entry_price']);
        }else{
            $post['exit_price'] =  self::strReplace($post['exit_price']);
            $post['evaluation'] = ($post['exit_price'] / $post['entry_price']) * 100 - 100;
        }
        $post['sum_entry_price']= $post['amount'] * self::strReplace($post['entry_price']);
        $post['sum_exit_price'] = $post['amount'] * self::strReplace($post['exit_price']);

        $_SESSION[self::cacheProd()][$post['id']] = array_merge($_SESSION[self::cacheProd()][$post['id']], $post);
        self::sumParams();

        return true;
    }
    public function deleteProductFromCache($id){
        if (!empty($_SESSION[self::cacheProd()][$id])){
            unset($_SESSION[self::cacheProd()][$id]);
            self::sumParams();
            return true;
        }
    }

    public function saveCacheProducts(){
        if (!empty($_SESSION[self::cacheProd()])){
            foreach($_SESSION[self::cacheProd()] as $value){
                $product = new Products();
                $product->attributes = $value;
                $product->save(false);
            }
            unset($_SESSION[self::cacheProd()], $_SESSION[self::cacheSum()]);
            return true;
        }
    }

    public function clearProductsFromCache(){
        unset($_SESSION[self::cacheProd()], $_SESSION[self::cacheSum()]);
        return true;
    }

    public static function sumParams(){
        $_SESSION[self::cacheSum()]['sum_entry_price'] = array_sum(array_column($_SESSION[self::cacheProd()], 'sum_entry_price'));
        $_SESSION[self::cacheSum()]['sum_exit_price'] = array_sum(array_column($_SESSION[self::cacheProd()], 'sum_exit_price'));
        $_SESSION[self::cacheSum()]['amount'] = array_sum(array_column($_SESSION[self::cacheProd()], 'amount'));
    }

    public function sumAttributes(){
        $this->sum_entry_price = $this->amount * $this->entry_price;
        $this->sum_exit_price = $this->amount * $this->exit_price;
        $this->code_group = isset(static::find()->orderBy(['id' => SORT_DESC])->one()->code_group) ? static::find()->orderBy(['id' => SORT_DESC])->one()->code_group + 1 : 1;
        return $this->attributes;
    }

    public function searchBarcode($barcode){
        $barcode = Products::find()->where(['company_id' => Yii::$app->company->id(), 'barcode' => $barcode])->orderBy(['id' => SORT_DESC])->one();
        if ($barcode){
            return $barcode;
        }
    }

    public static function generateBarCodeForWeight(){
        $arr = [];
        foreach(self::getProductInCache() as $prod){
            if($prod['barcode_type'] == self::BAR_CODE_TYPE_WEIGHT || $prod['barcode_type'] == self::BAR_CODE_TYPE_PIECE){
                $arr[] = $prod['barcode'];
            }
        }
        $arr[] = Products::find()->where(['IN', 'barcode_type', [self::BAR_CODE_TYPE_WEIGHT, self::BAR_CODE_TYPE_PIECE]])->andWhere(['company_id' => Yii::$app->company->id()])->max("barcode");
        if(max($arr) < 10000000)
            return 10000000 + max($arr) + 1;
        return max($arr) + 1;
    }

    public static function generateBarCodeForPiece(){
        $arr = [];
        foreach(self::getProductInCache() as $prod){
            if($prod['barcode_type'] == self::BAR_CODE_TYPE_WEIGHT || $prod['barcode_type'] == self::BAR_CODE_TYPE_PIECE){
                $arr[] = $prod['barcode'];
            }
        }
        $arr[] = Products::find()->where(['IN', 'barcode_type', [self::BAR_CODE_TYPE_WEIGHT, self::BAR_CODE_TYPE_PIECE]])->andWhere(['company_id' => Yii::$app->company->id()])->max("barcode");
        if(max($arr) < 10000000)
            return 10000000 + max($arr) + 1;
        return max($arr) + 1;   
    }

}
