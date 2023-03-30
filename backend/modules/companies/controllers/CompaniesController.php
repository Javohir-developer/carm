<?php

namespace backend\modules\companies\controllers;

use backend\controllers\BaseController;
use backend\modules\companies\models\Companies;
use backend\modules\companies\models\search\CompaniesSearch;
use common\models\User;
use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\web\JqueryAsset;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * CompaniesController implements the CRUD actions for Companies model.
 */
class CompaniesController extends BaseController
{

    public function beforeAction($action)
    {
        $this->view->title = Yii::t('app', 'Компания');
        $this->view->registerJsFile('@web/modules-assets/companies/js/company.js', [
            'depends' => JqueryAsset::className()
        ]);
        $this->view->registerCssFile('@web/modules-assets/companies/css/company.css', [
            ['depends' => BootstrapAsset::className()]
        ]);
        return parent::beforeAction($action);
    }
    /**
     * Lists all Companies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompaniesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Companies model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Companies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Companies();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'добавлена новая компания'));
                return $this->redirect('index');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Companies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app', 'Компания обновлена'));
                return $this->redirect('index');
            }

        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Companies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::t('app', 'Компания удалено'));
        return $this->redirect(['index']);
    }

    /**
     * Finds the Companies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Companies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Companies::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
