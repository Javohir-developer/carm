<?php

namespace backend\modules\statistics\controllers;
use backend\controllers\BaseController;
use Yii;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class StatisticsController extends BaseController
{
    public function actionIndex()
    {
//        $this->view->registerCssFile("@web/cork-style/assets/css/statistics.css", [
//            'depends' => [\yii\bootstrap\BootstrapAsset::class],
//        ]);
        return $this->render('index');
    }
}
