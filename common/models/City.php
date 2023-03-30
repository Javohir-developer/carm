<?php

namespace common\models;

use backend\modules\products\models\Categories;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string|null $name_ru
 * @property string|null $name_uz
 * @property int $status
 * @property int|null $region_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Region $region
 */
class City extends BaseModel
{
    const STATUS_ACTIVE = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'region_id'], 'default', 'value' => null],
            [['status', 'region_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_ru', 'name_uz'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_uz' => 'Name Uz',
            'status' => 'Status',
            'region_id' => 'Region ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    public function getRegions(){
        $region = Region::find()->where(['status' => 1])->all();
        return ArrayHelper::map($region, 'id', 'name_'.Yii::$app->language);
    }

    public static function Status(){
        return [
            1 => Yii::t('app', 'Актив'),
            0=>Yii::t('app', 'Неактив')
        ];
    }
}
