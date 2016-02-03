<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Taskmanager';

?>
<div class="site-login">
    <h2 class="form-signin-heading text-center"><?= Html::encode($this->title) ?></h2>
    <div class="row text-center">
        <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
            <? if (!empty($message)):?><div class="alert alert-success"><?=$message?></div><? endif?>
            <ul class="nav nav-tabs sign-tabs">
                <li <?= !$registerError ? 'class="active"' : '' ?> ><a data-toggle="tab" href="#signin">Sign In</a></li>
                <li <?= $registerError ? 'class="active"' : '' ?> ><a data-toggle="tab" href="#signup">Sign Up</a> </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade <?= !$registerError ? 'in active"' : '' ?> " id="signin">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-signin'],
                'fieldConfig' => [
                    'template' => "{input}\n{error}"
                ],
            ]); ?>

            <?= $form->field($login, 'username') -> textInput(['placeholder' => "Username",])?>

            <?= $form->field($login, 'password')->passwordInput(['placeholder'=>'Password']) ?>

            <div class="form-group text-center">
                <?= Html::activeCheckbox($login,'rememberMe') ?>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-10">
                    <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="tab-pane fade <?= $registerError ? 'in active"' : '' ?> " id="signup">
            <div class="site-signup">

                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'login-form',
//                        'action'=>['site/signup'],
                        'options' => ['class' => 'form-signin'],
                        'fieldConfig' => [
                            'template' => "{input}\n{error}"
                        ],
                    ]
                ); ?>

                <?= $form->field($register, 'username')->textInput(['placeholder'=>'Username']) ?>
                <?= $form->field($register, 'password')->passwordInput(['placeholder'=>'Password']) ?>
                <?= $form->field($register, 'password_repeat')->passwordInput(['placeholder'=>'Repeat password']) ?>

                <div class="form-group col-lg-offset-1 col-lg-10">
                    <?= Html::submitButton('Sign Up', ['class' => 'btn btn-success btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div><!-- site-signup -->
        </div>
    </div>
</div>
