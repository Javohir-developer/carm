<?php

namespace common\widgets;
use ErrorException;
use Yii;

class Helper
{
    const OPERATION_SUCCESS = 1;
    const OPERATION_ERROR = 0;
    const VALIDATION_ERROR = 0;

    public static function successMessage($text = false, $result = false, $param = false)
    {
        return [
            'msg' => $text ? $text : Yii::t('app', 'Действие успешно выполнено'),
            'type' => self::OPERATION_SUCCESS,
            'result' => $result,
            'param' => $param,
        ];
    }

    public static function errorMessage($text = false)
    {
        return [
            'msg' => $text ? $text : Yii::t('app', 'Ошибка'),
            'type' => self::OPERATION_ERROR,
        ];
    }

    public static function validationErrorMessage($errors = false)
    {
        $msg = '';
        if (is_array($errors) && !empty($errors)) {
            foreach ($errors as $key => $val) {
                $msg .= $val[0] . "<br>";
            }
        } else {
            $msg = $errors ? $errors : Yii::t('app', 'Данные не были загружены');
        }
        return [
            'msg' => $msg,
            'type' => self::VALIDATION_ERROR,
        ];
    }


    public static function rusTranslit($string, $space = false)
    {
        $dictionary = [
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'ZH', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH',
            'Ь' => '', 'Ы' => 'Y', 'Ъ' => '',
            'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA',
            '"' => '_', ' ' => '_', '«' => '_',
            '»' => '_'
        ];
        if($space == true)
            $dictionary[" "] = ' ';
        return strtr($string, $dictionary);
    }


    public static function genSecretKey(){
        $secret_key = '';
        $symb = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
            "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
            "0","1","2","3","4","5","6","7","8","9"];
        $i = rand(10,15);
        while($i > 0){
            $secret_key .= $symb[rand(0,count($symb)-1)];
            $i--;
        }
        return $secret_key;
//        return Yii::$app->security->generateRandomString(rand(10,15));
    }

    public static function buildArrayMap($array,$key,$value){
        if(is_array($array) && !empty($array)) {
            foreach ($array as $arr) {
                $newArray[$arr[$key]] = "[{$arr[$key]}] {$arr[$value]}";
            }
        }
        return $newArray ?? [];
    }

    public static function buildCSVString($models,$params){
        $csv = '';
        foreach($models as $model){
            foreach($params as $key => $param){
                $csv .= (is_string($key) ? $key :
                        (self::is_date($model[$param]) ? date('Y-m-d H:i:s',strtotime($model[$param])) : $model[$param] )) . ';';
            }
            $csv .= "\n";
        }
        return $csv;
    }

    public static function is_date($str){
        return is_numeric(strtotime($str));
    }

    public static function parserPhoneNumber($param){
        try {
            return (int)strtr($param, ["(" => "", ")" => "", "-"=>"", " " => ""]);
        } catch (ErrorException $e) {
            return (int)$param;
        }
    }
}