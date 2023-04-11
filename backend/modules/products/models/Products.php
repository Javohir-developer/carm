<?php

namespace backend\modules\products\models;

use backend\models\BaseModel;
use backend\modules\companies\models\Companies;
use backend\modules\parameters\models\Suppliers;
use backend\modules\parameters\models\Warehouses;
use common\models\User;
use Yii;
use yii\base\ErrorException;
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
 * @property string|null $type
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
 * @property int|null $old_entry_price
 * @property float|null $old_evaluation
 * @property int|null $old_exit_price
 * @property int|null $unit_type
 * @property int|null $amount
 * @property int $input_status
 * @property int $status
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
        return Yii::$app->user->id.'_'.Yii::$app->company->id();
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
            [['user_id', 'company_id', 'supplier_id', 'warehouse_id', 'barcode', 'type', 'amount', 'entry_price', 'evaluation', 'exit_price'], 'required'],
            [['user_id', 'company_id', 'warehouse_id', 'supplier_id', 'currency', 'currency_amount', 'barcode', 'group', 'ikpu', 'unit_amount', 'max_ast', 'min_ast', 'term_amount', 'term_type', 'ndc', 'entry_price', 'exit_price', 'old_entry_price', 'old_exit_price', 'unit_type', 'amount', 'input_status', 'status'], 'integer'],
            [['date', 'production_time', 'valid', 'created_at', 'updated_at'], 'safe'],
            [['evaluation', 'old_evaluation'], 'number'],
            [['type', 'model', 'brand', 'size'], 'string', 'max' => 255],
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
            'type' => Yii::t('app', 'Тип'),
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
            'old_entry_price' => Yii::t('app', 'Стар. цена прх.'),
            'old_evaluation' => Yii::t('app', 'Стар. Оценка'),
            'old_exit_price' => Yii::t('app', 'Стар. цена прд.'),
            'unit_type' => Yii::t('app', 'Едю./изм.'),
            'amount' => Yii::t('app', 'Едю./кол-во'),
            'input_status' => Yii::t('app', 'Статус'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }

    public function addProductToCache(){
        if ($this->validate()){
            Yii::$app->company->session();
            $_SESSION[self::cacheProd()][] = $this->attributes;
            return true;
        }
    }
    public function deleteProductFromCache($id){
        if (!empty($_SESSION[self::cacheProd()][$id])){
            unset($_SESSION[self::cacheProd()][$id]);
            return true;
        }
    }

    public static function getProductInCache(){
        if (!empty($_SESSION[self::cacheProd()])){
            return $_SESSION[self::cacheProd()];
        }
        return [];
    }

    public function saveCacheProducts(){
        if (!empty($_SESSION[self::cacheProd()])){
            foreach($_SESSION[self::cacheProd()] as $value){
                $product = new Products();
                $product->attributes = $value;
                $product->save();
            }
            unset($_SESSION[self::cacheProd()]);
            return true;
        }
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::class, ['id' => 'supplier_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Warehouse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouses::class, ['id' => 'warehouse_id']);
    }

    public static function currencyType(){
        return [
          1 => Yii::t('app', 'SUM'),
          2 => Yii::t('app', 'USD')
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
}
