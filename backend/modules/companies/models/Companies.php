<?php

namespace backend\modules\companies\models;

use backend\models\BaseModel;
use common\models\User;
use common\models\UserPasswords;
use common\rbac\models\Role;
use common\widgets\Helper;
use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $subdomain
 * @property string|null $photo_companies
 * @property string|null $currency
 * @property string|null $address_ru
 * @property string|null $address_uz
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $working_mode
 * @property string|null $email
 * @property int|null $call
 * @property string|null $telegram
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $about
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $companies_type
 * @property User[] $users
 */
class Companies extends BaseModel
{

    public $username;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo_companies', 'created_at', 'updated_at'], 'safe'],
            [['about'], 'string'],
            [['status',  'call', 'companies_type'], 'integer'],
            [['name'], 'required'],
            [['name', 'password', 'currency', 'address_ru', 'address_uz', 'latitude', 'longitude', 'working_mode', 'email', 'telegram', 'facebook', 'instagram'], 'string', 'max' => 255],
            [['logo'], 'string', 'max' => 225],
            [['phone'], 'string', 'max' => 12, 'min' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [];
    }



    public function create(){
        if ($this->validate() && $this->save()) {
            return true;
        }
    }

    public function updates(){
        if ($this->validate() && $this->save()) {
            return true;
        }
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['company_id' => 'id']);
    }


}
