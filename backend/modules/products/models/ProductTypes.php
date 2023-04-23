<?php

namespace backend\modules\products\models;

use backend\models\BaseModel;
use backend\modules\companies\models\Companies;
use common\models\User;
use Yii;

/**
 * This is the model class for table "product_types".
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property string|null $name
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Companies $company
 * @property Products[] $products
 * @property User $user
 */
class ProductTypes extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [['company_id'], 'default', 'value' => Yii::$app->company->id()],
            [['name'], 'required'],
            [['user_id', 'company_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'company_id' => 'Company ID',
            'name' => 'Name',
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
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['product_types_id' => 'id']);
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
}
