<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id'=>'task-form',
    'action'=>['task/create'],
    'fieldConfig' => [
        'template' => "{input}",
        'options' => ['tag'=>'span']
    ]
]); ?>
<div class="row">
    <div class="col-xs-2 col-sm-1 icon">
        <span class="glyphicon glyphicon-plus"></span>
    </div>
    <div class="col-xs-10 col-sm-11">
        <div class="input-group">
            <?= Html::activeTextInput($model,'title',['class'=>'form-control']) ?>

            <?= $form->field($model, 'prioritize')->hiddenInput(['value'=>$model->getMaxPrioritize()+1])->label(false) ?>

            <?= $form->field($model, 'list_id')->hiddenInput(['value'=>$list->id])->label(false) ?>

            <div class="input-group-btn">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
