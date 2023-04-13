<?php

namespace backend\modules\products\controllers;

use app\modules\products\models\search\ProductsSearch;
use backend\controllers\BaseController;
use backend\modules\products\models\Products;
use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\JqueryAsset;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends BaseController
{
    public function beforeAction($action)
    {
        $this->view->registerJsFile('@web/cork-style2/assets/modules/products/js/main.js', [
            'depends' => JqueryAsset::className()
        ]);
        $this->view->registerCssFile('@web/cork-style2/assets/modules/products/css/main.css', [
            ['depends' => BootstrapAsset::className()]
        ]);
        return parent::beforeAction($action);
    }

    /**
     * Lists all Products models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Products();
        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionAddProductToCache(){
        $model = new Products();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->load($this->request->post())) {
            if ($model->addProductToCache()){
                return ['status' => true];
            }
        }
        $result = ActiveForm::validate($model);
        return ['status' => false, 'result' => $result];
    }

    public function actionUpdateProductFromCache(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Products();
        if ($model->updateProductFromCache($this->request->post())){
//            return $this->renderPartial('_cache-index');
            return ['status' => true];
        }
    }

    public function actionDeleteProductFromCache(){
        $model = new Products();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->deleteProductFromCache(Yii::$app->request->post('id'))){
            return $this->renderPartial('_cache-index');
//            return ['status' => true];
        }
    }

    public function actionSaveCacheProducts(){
        $model = new Products();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->saveCacheProducts()){
            return ['status' => true];
        }
    }

    /**
     * Displays a single Products model.
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Products();

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
     * Updates an existing Products model.
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
     * Deletes an existing Products model.
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
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
