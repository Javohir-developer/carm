<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\SignupForm;
use Yii;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('statistics/statistics');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        $this->view->title = Yii::t('app', 'Войти');
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            $this->Notcomp();
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->Notcomp();
            return $this->goBack();
        }
        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

//    public function actionSignup()
//    {
//        $this->layout = 'blank';
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
//            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию.');
//            return $this->goHome();
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function Notcomp(){
        if (isset(Yii::$app->user->identity) && Yii::$app->user->identity->rule != 'theCreator'){
            if (!Yii::$app->company->id()){
                Yii::$app->user->logout();
                Yii::$app->session->open();
                Yii::$app->session->setFlash('error', Yii::t('app', "У вас не существует компания"));
                return $this->goHome();
            }
        }
    }
}
