<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Todolist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todolist-form">

    <?php $form = ActiveForm::begin(['id'=>'todolist-form']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['value'=>Yii::$app->user->id,'readonly'=>true,'class'=>'hidden'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'OK', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
