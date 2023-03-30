<?php

namespace common\models;

use common\rbac\models\Role;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends BaseModel
{
    public $password;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

//            ['email', 'trim'],
//            ['email', 'required'],
//            ['email', 'email'],
            [['status', 'company_id'], 'integer'],
            [['rule'], 'string', 'max' => 255],
//            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $role = new Role();
        $password = new UserPasswords();

        $rule = !empty($this->rule) ? $this->rule : User::RULE_USER;
        $status = !empty($this->status) ? $this->status : 10;
        $user->username = $this->username;
        $user->status = $status;
        $user->rule = $rule;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if ($user->save()){
            $role->user_id = $user->getId();
            $role->item_name = $rule;
            $role->save();
            $password->user_id = $user->getId();
            $password->username = $this->username;
            $password->password = Yii::$app->company->encodedPassword($this->password);
            $password->save(false);
        }
        return $user->getId();
    }

    public function user_update($id)
    {
        if (!$this->validate()) {
            return null;
        }
        $user = User::findOne($id);
        $role = Role::findOne(['user_id'=>$id]);
        $password = UserPasswords::findOne(['user_id'=>$id]);
        $password->username = $this->username;
        if ($this->password !== null)
            $password->password = $this->password;
        $password->save(false);
        $user->username = $this->username;
        $user->status = $this->status;
        $user->rule = $this->rule;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if ($user->save()){
            $role->item_name = $this->rule;
            $role->save();
        }
        return true;
    }
}
