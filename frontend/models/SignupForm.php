<?php

namespace frontend\models;

use common\models\UserPasswords;
use common\rbac\models\Role;
use common\widgets\Helper;
use Yii;
use yii\base\ErrorException;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('app', 'Этот адрес электронной почты уже занят.')],

            ['password', 'string'],
            [['email'], 'UserEmail'],
        ];
    }

    public function UserEmail($attribute){
        if (User::findOne(['username' => $this->$attribute])){
            $this->addError($attribute,Yii::t('app', 'Этот адрес электронной почты уже занят.'));
        }
    }
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        $user = new User();
        $role = new Role();
        $password = new UserPasswords();
        $this->password = (string)rand(10000, 99999);
        if (!$this->validate()) {
            return false;
        }
        try {
            $user->username = $this->email;
            $user->companie_id = Yii::$app->companie->id();
            $user->email = $this->email;
            $user->rule = User::RULE_USER;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            if ($user->save()){
                $role->user_id = $user->getId();
                $role->item_name = User::RULE_USER;
                $role->save();
                $password->user_id = $user->getId();
                $password->username = $this->email;
                $password->password = Yii::$app->companie->encodedPassword($this->password);
                $password->save(false);
                return $this->sendEmail();
            }
        } catch (ErrorException $e) {
            return false;
        }

    }

    protected function sendEmail()
    {
        try {
            return Yii::$app->mailer->compose()
                ->setFrom(['shopsitescros@gmail.com' => Yii::$app->companie->param('name') . Yii::t('app', ' robot')])
                ->setTo($this->email)
                ->setSubject( Yii::t('app', 'Регистрация аккаунта на ') . Yii::$app->companie->param('name'))
                ->setHtmlBody('<b>Ваш логин: </b>'.$this->email. '<br><b>Ваш парол: </b>'.$this->password)
                ->send();
        } catch (ErrorException $e) {
            return false;
        }

    }





    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
//    protected function sendEmail($user)
//    {
//        return Yii::$app
//            ->mailer
//            ->compose(
//                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
//                ['user' => $user]
//            )
//            ->setFrom(['shopsitescros@gmail.com' => Yii::$app->name . ' robot'])
//            ->setTo('elmurodovjavohir1998@gmail.com')
//            ->setSubject('Account registration at ' . Yii::$app->name)
//            ->send();
//
//    }
//
//
}
