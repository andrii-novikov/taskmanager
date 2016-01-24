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
        <?php
        foreach ($lists as $list) {
            include "todolist_table.php";
        }
        ?>
    </div>
    <div class="container">
        <div class="row text-center">
            <?= yii\helpers\Html::button('Add TODO List',['class'=>'btn btn-primary','type'=>'btn','data-toggle'=>'modal','data-target'=>'#addlist-modal']); ?>
        </div>
    </div>
    <div class="modal fade" id="addlist-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">
                        Введите название списка
                    </div>
                    <div class="modal-body">
                        <form role="form" class="form-horizontal" method="post" action="index.php?  r=site/addlist">
                            <div class="input-group">
                                <input class="form-control" name="name">
                                    <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">ОК</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
