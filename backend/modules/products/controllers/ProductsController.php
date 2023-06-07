<?php

namespace backend\modules\products\controllers;

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
            return ['status' => true];
        }
    }

    public function actionDeleteProductFromCache(){
        $model = new Products();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->deleteProductFromCache(Yii::$app->request->post('id'))){
            return ['status' => true];
        }
    }

    public function actionSaveCacheProducts(){
        $model = new Products();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->saveCacheProducts()){
            return ['status' => true];
        }
    }

    public function actionClearProductsFromCache(){
        $model = new Products();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->clearProductsFromCache()){
            return ['status' => true];
        }
    }

    public function actionSearchBarcode($barcode){
        $model = new Products();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model = $model->searchBarcode($barcode)){
            return ['status' => true, 'result' => $model];
        }
        return ['status' => false];
    }

    public function actionGenerateBarCodeForWeight(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Products::generateBarCodeForWeight();
    }

    public function actionGenerateBarCodeForPiece(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Products::generateBarCodeForPiece();
    }

}
