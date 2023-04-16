<?php
/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 12/22/18
 * Time: 7:07 PM
 */

namespace Baha2Odeh\RecaptchaV3;


use Yii;
use yii\base\Component;
use yii\helpers\Json;
use yii\web\View;

class RecaptchaV3 extends Component
{
    public $site_key = null;
    public $secret_key = null;
    public $verify_ssl = true;

    private $verify_endpoint = 'https://www.google.com/recaptcha/api/siteverify';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        if(empty($this->site_key)){
            throw new \Exception('site key cant be null');
        }
        if(empty($this->secret_key)){
            throw new \Exception('secret key cant be null');
        }

    }

    /**
     * @param $view
     *
     */
    public function registerScript($view){
        /** @var View $view */
        $view->registerJsFile('https://www.google.com/recaptcha/api.js?render='.$this->site_key,[
            'position'=>$view::POS_HEAD,
        ],'recaptcha-v3-script');
    }



    public function validateValue($value)
    {

        try {
            $response = $this->curl([
                'secret' => $this->secret_key,
                'response' => $value,
                'remoteip' => Yii::$app->has('request') ? Yii::$app->request->userIP : null,
            ]);
            if(!empty($response) && $response['success']){
                return $response['score'];
            }
        }catch (\Exception $e){

        }

        return false;
    }
    /**
     * Sends User post data with curl to google and receives 'success' if valid
     * @param array $params
     * @return bool
     */
    protected function curl(array $params)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->verify_endpoint);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        if(!$this->verify_ssl){ //default value should be true
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        }
        $curlData = curl_exec($curl);
        curl_close($curl);
        return Json::decode($curlData, true);
    }
}
