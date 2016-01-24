<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Taskmanager';

?>
<div class="site-login">
    <div class="container">

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-signin'],
            'fieldConfig' => [
                'template' => "{input}\n{error}"
//                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>
            <h2 class="form-signin-heading text-center"><?= Html::encode($this->title) ?></h2>

            <?= $form->field($model, 'username') -> textInput(['placeholder' => "Username",])?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
//                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-3\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
