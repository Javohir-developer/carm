<?php

namespace backend\modules\companies\models;
use backend\models\BaseModel;
use common\models\User;
use common\models\UserPasswords;
use common\rbac\models\Role;
use common\widgets\Helper;
use Yii;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


class Users extends User
{

    /**
     * Users model
     *
     * @property string $username
     * @property string $rule
     * @property integer $status
     * @property integer $company_id
     * @property integer $tell
     * @property integer $created_at
     * @property integer $updated_at
     * @property     string $password write-only password
     */
    public $password;
    const SCENARIO_CREATE = 'create';
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 9;


    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['image', 'created_at', 'updated_at'], 'safe'],
            [['phone', 'status', 'plan_id', 'company_id'], 'integer'],
            [['full_name', 'rule', 'username', 'password'], 'string', 'max' => 225],
            [['username', 'phone'], 'required'],
            [['password'], 'required', 'on' => self::SCENARIO_CREATE],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('app', 'Это имя пользователя уже занято.'), 'on' => self::SCENARIO_CREATE],
            ['username', 'trim'],
            [['phone'], 'string', 'max' => 12, 'min' => 12],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'company_id' => 'Компания',
            'rule' => 'Правило',
            'status' => 'Статус',
            'phone' => 'Номер телефона',
        ];
    }

    public function userCreate(){
        $this->scenario = self::SCENARIO_CREATE;
        $role = new Role();
        if ($this->validate()) {
            $this->setPassword($this->password);
            $this->generateAuthKey();
            if ($this->save()){
                $role->user_id = $this->getId();
                $role->item_name = $this->rule;
                $role->save();
                $this->createUserPassword();
                return $this->getId();
            }
        }
    }

    public function userUpdate(){
        if ($this->validate()) {
            if ($this->password){
                $this->setPassword($this->password);
                $this->generateAuthKey();
            }
            if ($this->save()){
                $role = Role::findOne(['user_id'=>$this->id]);
                $role->item_name = $this->rule;
                $role->save();
                $this->updateUserPassword();
                return true;
            }
        }
    }

    public static function companies(){
        return ArrayHelper::map(Companies::find()->all(), 'id', 'name');
    }

    public static function rule(){
        return ArrayHelper::map(AuthItem::find()->all(), 'name', 'name');
    }

    public static function userStatus(){
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активный'),
            self::STATUS_INACTIVE => Yii::t('app', 'Неактивный'),
        ];
    }
}
