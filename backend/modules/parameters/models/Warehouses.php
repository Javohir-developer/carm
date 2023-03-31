<?php

namespace backend\modules\parameters\models;

use backend\models\BaseModel;
use backend\modules\companies\models\Companies;
use common\models\User;
use Yii;

/**
 * This is the model class for table "warehouses".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $company_id
 * @property string|null $name
 * @property int|null $type
 * @property string|null $description
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Companies $company
 * @property User $user
 */
class Warehouses extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warehouses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [['company_id'], 'default', 'value' => Yii::$app->company->id()],
            [['user_id', 'company_id', 'type', 'status'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Имя'),
            'phone' => Yii::t('app', 'Телефон'),
            'type' => Yii::t('app', 'Тип'),
            'description' => Yii::t('app', 'Описание'),
            'inn' => 'Inn',
            'ndc' => 'Ndc',
            'status' => Yii::t('app', 'Статус'),
            'created_at' => Yii::t('app', 'Созданное время'),
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
