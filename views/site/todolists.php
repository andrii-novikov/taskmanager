<?php foreach ($lists as $list):?>
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
                        <?= \yii\helpers\Html::a(
                            '<i class="glyphicon glyphicon-pencil"></i>',
                            ['/todolists/update','id'=>$list->id],
                            [
                                'class'=>'btn btn-primary',
                                'name'=>'editList',
                                'data-toggle'=>'modal',
                                'data-target'=>'#modal',
                            ])
                        ?>
                        <?= \yii\helpers\Html::a(
                            '<i class="glyphicon glyphicon-trash"></i> ',
                            ['todolists/delete','id'=>$list->id],
                            [
                                'class'=>'btn btn-primary',
                                'name'=>'deleteList'
                            ]
                        ) ?>
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
                    <?php
                    foreach ($list->tasks as $task) {
                        include "task_row.php";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
<?endforeach?>