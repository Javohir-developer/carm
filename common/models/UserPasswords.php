<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_passwords".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $companie_name
 */
class UserPasswords extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_passwords';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['username', 'password', 'companie_name'], 'string', 'max' => 255],
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
            'username' => 'Username',
            'password' => 'Password',
            'companie_name' => 'Companie Name',
        ];
    }
}
