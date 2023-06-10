<?php

namespace backend\modules\products\controllers;

use app\modules\products\models\search\ListOfTransitionsSearch;
use backend\controllers\BaseController;
use backend\modules\products\models\ListOfTransitions;
use Yii;
use yii\bootstrap\BootstrapAsset;
use yii\data\ActiveDataProvider;
use yii\web\JqueryAsset;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii2tech\spreadsheet\Spreadsheet;
use kartik\mpdf\Pdf;

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
        $code_group = isset(Yii::$app->request->get('ListOfTransitionsSearch')['code_group']) ? Yii::$app->request->get('ListOfTransitionsSearch')['code_group'] : false;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'code_group' => $code_group,
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
    public function actionDelete($id, $code_group)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'ListOfTransitionsSearch[code_group]' => $code_group]);
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

    public function actionExcelExport()
    {
        $model = new ListOfTransitions;
        $model->excelExport($this->request->queryParams);
    }

    public function actionExportBarCodePdf($code_group)
    {
        $model = ListOfTransitions::find()->where(['code_group' => $code_group,'company_id' => Yii::$app->company->id()])->all();
        $content = $this->renderPartial('export-bar-code-pdf', ['model' =>  $model]);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, 
            'format' => Pdf::FORMAT_A4, 
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            'destination' => Pdf::DEST_BROWSER, 
            'content' => $content,
            'cssFile' => [
                    '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.css', 
                    Yii::getAlias('@backend').'/web/cork-style2/assets/modules/list-of-transitions/css/pdf.css'
                ],
        ]);
        return $pdf->render();
    }
}