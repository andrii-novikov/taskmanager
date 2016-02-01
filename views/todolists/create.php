<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Todolist */

$this->title = 'Create Todolist';
$this->params['breadcrumbs'][] = ['label' => 'Todolists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-create">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title"><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="modal-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
