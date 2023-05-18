<?php

namespace backend\modules\products\controllers;

use app\modules\products\models\search\TransitionListGroupSearch;
use backend\controllers\BaseController;
use backend\modules\products\models\TransitionListGroup;
use yii\bootstrap\BootstrapAsset;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\JqueryAsset;
use yii\web\NotFoundHttpException;

/**
 * TransitionListGroupController implements the CRUD actions for TransitionListGroup model.
 */
class TransitionListGroupController extends BaseController
{


    public function beforeAction($action)
    {
        $this->view->registerJsFile('@web/cork-style2/assets/modules/transition-list-group/js/main.js', [
            'depends' => JqueryAsset::className()
        ]);
        $this->view->registerCssFile('@web/cork-style2/assets/modules/transition-list-group/css/main.css', [
            ['depends' => BootstrapAsset::className()]
        ]);
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $searchModel = new TransitionListGroupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransitionListGroup model.
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
     * Creates a new TransitionListGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TransitionListGroup();

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
     * Updates an existing TransitionListGroup model.
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

    /**
     * Deletes an existing TransitionListGroup model.
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
     * Finds the TransitionListGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TransitionListGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransitionListGroup::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
