<?php

namespace common\models;

use backend\modules\companies\models\AuthAssignment;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\rbac\Rule;

class BaseModel extends ActiveRecord
{

    public static function company_id(){
        return Yii::$app->company->id();
    }

    public function UploadFiles($files, $file_put_name = false){
        if ($this->{$files} == true){
            $index = 1;
            foreach ($this->{$files} as $key => $val) {
                $name = Yii::$app->security->generateRandomString(30).'.'.$val->extension;
                $file_put_name = isset($file_put_name) ? $file_put_name : 'unversal';
                $val->saveAs(Yii::getAlias('@uploadsImages') .'/'. $file_put_name .'/'. $name);
                $names[$index++] = $name;
            }
            $this->{$files} = false;
            if (!empty($names))
               return $names;
        }
    }

    public function UploadFile($files, $file_put_name = false){
        if ($this->{$files} == true){
            $name = Yii::$app->security->generateRandomString(30).'.'.$this->{$files}->extension;
            $file_put_name = isset($file_put_name) ? $file_put_name : 'unversal';
            $this->{$files}->saveAs(Yii::getAlias('@uploadsImages') .'/'. $file_put_name .'/'. $name);
            $this->{$files} = false;
            if (!empty($name))
                return $name;
        }
    }

    public function createUserPassword(){
        $user = new UserPasswords();
        $user->user_id = $this->getId();
        $user->username = $this->username;
        $user->password = Yii::$app->company->encodedPassword($this->password);
        $user->save(false);
    }

    public function updateUserPassword(){
        $user = UserPasswords::findOne(['user_id'=>$this->id]);
        if ($user){
            $user->username = $this->username;
            if ($this->password){
                $user->password = Yii::$app->company->encodedPassword($this->password);
            }
            $user->save(false);
        }
    }
    public function deleteUserPassword($id){
        $user_password = UserPasswords::findOne(['user_id' => $id]);
        $auth_assignment = AuthAssignment::findOne(['user_id' => $id]);
        if ($user_password){$user_password->delete();}
        if ($auth_assignment){$auth_assignment->delete();}
    }

}
