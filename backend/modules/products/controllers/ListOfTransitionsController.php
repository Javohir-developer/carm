<?php

namespace backend\modules\products\controllers;

use app\modules\products\models\search\ListOfTransitionsSearch;
use backend\controllers\BaseController;
use backend\modules\products\models\ListOfTransitions;
use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\JqueryAsset;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ListOfTransitionsController implements the CRUD actions for ListOfTransitions model.
 */
class ListOfTransitionsController extends BaseController
{

    public function beforeAction($action)
    {
        $this->view->registerJsFile('@web/cork-style2/assets/modules/list-of-transitions/js/main.js', [
            'depends' => JqueryAsset::className()
        ]);
        $this->view->registerCssFile('@web/cork-style2/assets/modules/list-of-transitions/css/main.css', [
            ['depends' => BootstrapAsset::className()]
        ]);
        return parent::beforeAction($action);
    }
    /**
     * Lists all ListOfTransitions models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ListOfTransitionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ListOfTransitions model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ListOfTransitions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ListOfTransitions();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ListOfTransitions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionAjaxGetListOfTransitions($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (($model = ListOfTransitions::findOne(['id' => $id])) !== null) {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionAjaxEditListOfTransitions()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if ($id = $this->request->post('ListOfTransitions')['id']){
            $model = $this->findModel($id);
            if ($model->load($this->request->post()) && $model->save()) {
                return true;
            }
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ListOfTransitions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ListOfTransitions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ListOfTransitions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ListOfTransitions::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
