<?php

namespace backend\modules\products\models;

use backend\models\BaseModel;
use backend\modules\companies\models\Companies;
use backend\modules\parameters\models\Suppliers;
use backend\modules\parameters\models\Warehouses;
use common\models\User;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property int $warehouse_id
 * @property int $supplier_id
 * @property int|null $product_types_id
 * @property string|null $date
 * @property int $currency
 * @property float|null $currency_amount
 * @property int|null $barcode
 * @property int|null $group
 * @property string|null $name
 * @property string|null $model
 * @property string|null $brand
 * @property int|null $size_num
 * @property int|null $size_type
 * @property int|null $ikpu
 * @property int|null $unit_amount
 * @property int|null $max_ast
 * @property int|null $min_ast
 * @property string|null $production_time
 * @property int|null $term_amount
 * @property int|null $term_type
 * @property string|null $valid
 * @property int|null $ndc
 * @property float|null $entry_price
 * @property float|null $evaluation
 * @property float|null $exit_price
 * @property float|null $sum_entry_price
 * @property float|null $sum_exit_price
 * @property int|null $unit_type
 * @property int|null $amount
 * @property int $input_status
 * @property int $status
 * @property int|null $code_group
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Companies $company
 * @property ProductTypes $productTypes
 * @property Suppliers $supplier
 * @property User $user
 * @property Warehouses $warehouse
 */
class TransitionListGroup extends BaseModel
{
    public $from_date;
    public $to_date;
    public $count_product;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id', 'warehouse_id', 'supplier_id'], 'required'],
            [['user_id', 'company_id', 'warehouse_id', 'supplier_id', 'product_types_id', 'currency', 'barcode', 'group', 'size_num', 'size_type', 'ikpu', 'unit_amount', 'max_ast', 'min_ast', 'term_amount', 'term_type', 'ndc', 'unit_type', 'amount', 'input_status', 'status', 'code_group'], 'default', 'value' => null],
            [['user_id', 'company_id', 'warehouse_id', 'supplier_id', 'product_types_id', 'currency', 'barcode', 'group', 'size_num', 'size_type', 'ikpu', 'unit_amount', 'max_ast', 'min_ast', 'term_amount', 'term_type', 'ndc', 'unit_type', 'amount', 'input_status', 'status', 'code_group'], 'integer'],
            [['date', 'production_time', 'valid', 'created_at', 'updated_at'], 'safe'],
            [['currency_amount', 'entry_price', 'evaluation', 'exit_price', 'sum_entry_price', 'sum_exit_price'], 'number'],
            [['name', 'model', 'brand'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::class, 'targetAttribute' => ['company_id' => 'id']],
            [['product_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTypes::class, 'targetAttribute' => ['product_types_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::class, 'targetAttribute' => ['supplier_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'sum_entry_price' => Yii::t('app', 'Прх. Сумма'),
            'sum_exit_price' => Yii::t('app', 'Прод. Сумма'),
            'unit_type' => Yii::t('app', 'Едю./изм.'),
            'amount' => Yii::t('app', 'Кол-во'),
            'input_status' => Yii::t('app', 'Статус'),
            'status' => Yii::t('app', 'Статус'),
            'from_date' => Yii::t('app', 'с даты'),
            'to_date' => Yii::t('app', 'до даты'),
            'product_types_id' => Yii::t('app', 'Тип'),
            'created_at' => Yii::t('app', 'Время регист.'),
            'user_id' => Yii::t('app', 'Полъзволетлъ'),
            'count_product' => Yii::t('app', 'Кол-во прод.'),
        ];
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
     * Gets query for [[ProductTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTypes()
    {
        return $this->hasOne(ProductTypes::class, ['id' => 'product_types_id']);
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

    public static function dateCodeGroup($code_group){
        return Products::find()->where(['code_group' => $code_group, 'company_id' => Yii::$app->company->id()])->orderBy(['date' => SORT_DESC])->one()->date;
    }
}
