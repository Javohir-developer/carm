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
            [['user_id', 'company_id', 'supplier_id', 'warehouse_id', 'barcode', 'name', 'amount', 'entry_price', 'evaluation', 'exit_price'], 'required'],
            [['user_id', 'company_id', 'warehouse_id', 'supplier_id', 'currency', 'barcode', 'group', 'ikpu', 'unit_amount', 'max_ast', 'min_ast', 'term_amount', 'term_type', 'ndc', 'unit_type', 'amount', 'input_status', 'status', 'product_types_id'], 'integer'],
            [['date', 'production_time', 'valid', 'created_at', 'updated_at'], 'safe'],
            [['currency_amount', 'entry_price', 'exit_price', 'sum_entry_price', 'sum_exit_price', 'evaluation'], 'number'],
            [['name', 'model', 'brand', 'size'], 'string', 'max' => 255],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::class, 'targetAttribute' => ['supplier_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouses::class, 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
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
            'size' => Yii::t('app', 'Размер'),
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
        ];
    }


    public function Warehouses(){
        $warehouse = Warehouses::find()->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id()])->all();
        return ArrayHelper::map($warehouse, 'id', 'name');
    }

    public function Suppliers(){
        $warehouse = Suppliers::find()->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id()])->all();
        return ArrayHelper::map($warehouse, 'id', 'name');
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
        $post['exit_price']     = (($post['evaluation'] + 100) / 100) * self::strReplace($post['entry_price']);
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
                $product->save();
            }
            unset($_SESSION[self::cacheProd()], $_SESSION[self::cacheSum()]);
            return true;
        }
    }

    public function clearProductsFromCache(){
        unset($_SESSION[self::cacheProd()], $_SESSION[self::cacheSum()]);
        return true;
    }


    public static function Currency($currency){
        return number_format(self::strReplace($currency), 2, '.', ' ');
    }

    public static function strReplace($num){
        return str_replace(" ", "", $num);
    }

    public static function sumParams(){
        $_SESSION[self::cacheSum()]['sum_entry_price'] = array_sum(array_column($_SESSION[self::cacheProd()], 'sum_entry_price'));
        $_SESSION[self::cacheSum()]['sum_exit_price'] = array_sum(array_column($_SESSION[self::cacheProd()], 'sum_exit_price'));
        $_SESSION[self::cacheSum()]['amount'] = array_sum(array_column($_SESSION[self::cacheProd()], 'amount'));
    }

    public function sumAttributes(){
        $this->sum_entry_price = $this->amount * $this->entry_price;
        $this->sum_exit_price = $this->amount * $this->exit_price;
        return $this->attributes;
    }

    public static function productTypes(){
        $product_type = ProductTypes::find()->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id(), 'status' => self::STATUS_ACTIVE])->all();
        return ArrayHelper::map($product_type, 'id', 'name');
    }

}
