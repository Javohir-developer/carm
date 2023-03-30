<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\widgets\ActiveForm;
?>

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">
        <?php if (Yii::$app->session->getFlash('error')):?>
            <div class="alert alert-danger fade show" role="alert">
                <?=Yii::$app->session->getFlash('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>
        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'text-left']]); ?>
                            <div class="row">
                            <div class="col-md-12 mb-3">

                                <h2>Sign In</h2>
                                <p>Enter your email and password to login</p>

                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'id'=>'username', "placeholder"=>Yii::t('app', 'login'), 'class'=>'form-control'])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <?= $form->field($model, 'password')->textInput(['autofocus' => true, 'type'=>'password', 'id'=>'password', "placeholder"=>Yii::t('app', 'parol'), 'class'=>'form-control'])->label(false) ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check form-check-primary form-check-inline">
                                        <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                        <label class="form-check-label" for="form-check-default">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-secondary w-100">SIGN IN</button>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
