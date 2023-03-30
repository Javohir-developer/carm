<?php

namespace backend\modules\parameters\models;

use backend\modules\companies\models\Companies;
use common\models\BaseModel;
use common\models\User;
use Yii;

/**
 * This is the model class for table "suppliers".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $company_id
 * @property string|null $name
 * @property int|null $phone
 * @property int|null $inn
 * @property int|null $ndc
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Companies $company
 * @property User $user
 */
class Suppliers extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suppliers';
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
            [['user_id', 'company_id', 'phone', 'inn', 'ndc', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12, 'min' => 12],
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
