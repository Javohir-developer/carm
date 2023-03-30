<?php
namespace app\components;
use backend\modules\companies\models\Companies;
use common\models\User;
use Yii;
use yii\base\Component;
class Company extends Component{

    public static function company(){
        return Companies::find()->select(['companies.*'])
            ->leftJoin('user u', 'u.company_id=companies.id')
            ->where(['u.id' => Yii::$app->user->id])->one();
    }

    public function param($param = false){
        return isset($param) ? self::company()->{$param} : false;
    }

    public function id(){
        return isset(self::company()->id) ? self::company()->id : false;
    }

    public static function encodedPassword($password){
        return base64_encode(strrev(base64_encode($password)));
    }

    public static function decodedPassword($password){
        return base64_encode(strrev(base64_encode($password)));
    }
}
?>