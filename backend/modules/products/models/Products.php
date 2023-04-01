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
 * @property int|null $user_id
 * @property int|null $company_id
 * @property int|null $warehouse_id
 * @property int|null $supplier_id
 * @property string|null $date
 * @property int|null $currency
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [['company_id'], 'default', 'value' => Yii::$app->company->id()],
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
            'barcode' => 'Barcode',
            'type' => 'Type',
            'brand' => 'Brand',
            'warehouse_id' => 'Warehouse ID',
            'supplier_id' => 'Supplier ID',
            'date' => 'Date',
            'currency' => 'Currency',
            'currency_amount' => 'Currency Amount',
            'group' => 'Group',
            'model' => 'Model',
            'size' => 'Size',
            'ikpu' => 'Ikpu',
            'unit_amount' => 'Unit Amount',
            'max_ast' => 'Max Ast',
            'min_ast' => 'Min Ast',
            'production_time' => 'Production Time',
            'term_amount' => 'Term Amount',
            'term_type' => 'Term Type',
            'valid' => 'Valid',
            'ndc' => 'Ndc',
            'entry_price' => 'Entry Price',
            'evaluation' => 'Evaluation',
            'exit_price' => 'Exit Price',
            'old_entry_price' => 'Old Entry Price',
            'old_evaluation' => 'Old Evaluation',
            'old_exit_price' => 'Old Exit Price',
            'unit_type' => 'Unit Type',
            'amount' => 'Amount',
            'input_status' => 'Input Status',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
}
