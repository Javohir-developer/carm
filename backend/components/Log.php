<?php
namespace app\components;
use common\models\Logs;
use Yii;
use yii\base\Component;
class Log extends Component{

    public function log($post, $model){

        if ($post == 0){
            $old = [$model];
            $new = 'Заявка было удалено';
        }else{
            $old = array();
            $new = array();
            foreach ($post as $key => $value){
                if (!($model->{$key} == $value)){
                    $old[] = [$key => $model->{$key}];
                    $new[] =  [$key => $value];
                }
            }
        }

        $logs = new Logs();
        $logs->user_old_log = $old;
        $logs->user_new_log = $new;
        $logs->user_name = Yii::$app->user->identity->username;
        $logs->datetime = date('Y-m-d');
        if ($logs->save()){
            return true;
        }else{
            var_dump($logs->getErrors());exit();
        }
    }
}
?>