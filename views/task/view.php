<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="modal-body">
        <?= DetailView::widget([
            'model' => $model,
            'formatter' => [
                'class' => 'yii\i18n\Formatter',
                'nullDisplay' => '<span class="not-set">Не установлен</span>',
                'booleanFormat' => ['Нет','Да'],
                'dateFormat' => 'dd.MM.yyyy'
            ],
            'attributes' => [
                'id',
                'title',
                'prioritize',
                'dedline:date',
                'done:boolean',
                [
                    'label'=>'Список',
                    'value'=>$model->list->title
                ]
            ],
        ]) ?>
    </div>


</div>
