<?php

/* @var $this yii\web\View */

$this->title = 'Taskmanager';
?>
<div class="site-index">
    <div class="container-fluid">
        <?= \yii\helpers\Html::a('Logout (' . $user->identity->username . ')', ['/site/logout'], ['class'=>'btn btn-primary pull-right', 'data-method' => 'post']) ?>
    </div>
    <div class="container text-center text-uppercase">
        <h2>Simple TODO Lists</h2>
        <h4>From ruby garge</h4>
    </div>
    <div class="container">
        <? foreach ($lists as $list): ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-8 col-md-10">
                            <div class="panel-title">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <span><?= $list->title?></span>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-2">
                            <div class="btn-group pull-right">
                                <?= \yii\helpers\Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['/site/'], ['class'=>'btn btn-primary']) ?>
                                <?= \yii\helpers\Html::a('<i class="glyphicon glyphicon-trash"></i> ', ['/site/'], ['class'=>'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row add-task">
                        <form class="form-inline" role="form" method="post" action="index.php?r=site">
                            <i class="glyphicon glyphicon-plus"></i>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <?= \yii\helpers\Html::submitButton('Add Task',['class'=>'btn btn-success']) ?>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <table class="table table-hover table-striped table-bordered">
                            <? foreach ($list->tasks as $task): ?>
                                <tr>
                                    <td>
                                        <?= yii\helpers\Html::checkbox('task',false,['value'=>$task->id])?>
                                    </td>
                                    <td>
                                        <?= $task->title ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <?= yii\helpers\Html::a('',[],['class'=>'btn btn-default glyphicon glyphicon-sort']) ?>
                                            <?= yii\helpers\Html::a('',[],['class'=>'btn btn-default glyphicon glyphicon-pencil']) ?>
                                            <?= yii\helpers\Html::a('',[],['class'=>'btn btn-default glyphicon glyphicon-trash']) ?>
                                        </div>
                                    </td>
                                </tr>
                            <? endforeach?>
                        </table>
                    </div>
                </div>
            </div>
        <? endforeach?>
    </div>
</div>
