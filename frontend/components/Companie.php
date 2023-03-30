<?php
namespace app\components;
use backend\modules\companies\models\Companies;
use Yii;
use yii\base\Component;
class Companie extends Component{

    public static function company(){
        $company = Companies::find()->where(['subdomain'=>$_SERVER['HTTP_HOST'], 'status'=>Companies::STATUS_ACTIVE])->one();
        if (isset($company)){return $company;} else {echo Yii::t('app', "такой shopping не существует");}
    }

    public function param($param = false){
        return isset($param) ? self::company()->{$param} : false;
    }

    public function id(){
        return isset(self::company()->id) ? self::company()->id : false;
    }

    public function session(){
        $session = Yii::$app->session;
        if (!$session->isActive)
            $session->open();
    }


    public static function encodedPassword($password){
        return base64_encode(strrev(base64_encode($password)));
    }

    public static function decodedPassword($password){
        return base64_decode(strrev(base64_decode($password)));
    }
}
?>