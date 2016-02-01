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
    <div class="container todolists">
        <?php include "todolists.php"; ?>
    </div>
    <div class="container">
        <div class="row text-center">
            <?= yii\helpers\Html::a('Add TODO List',
                ['/todolists/create']
                ,[
                'class'=>'btn btn-primary',
                'type'=>'button',
                'data-toggle'=>'modal',
                'data-target'=>'#modal',
            ]); ?>
        </div>
    </div>
    <div class="modal fade" id="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
