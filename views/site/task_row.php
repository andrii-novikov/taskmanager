<li class="list-group-item row task">
    <div class="col-xs-1 text-center">
        <?= $task->prioritize?>
    </div>
    <div class="col-xs-6 col-sm-8 col-md-8">
        <?= \yii\helpers\Html::a(
            $task->title,
            ['task/view', 'id'=>$task->id],
            [
                'data-toggle'=>'modal',
                'data-target'=>'#modal',
                'class' => $task->done ?
                    'task-done' :
                    ''
            ]
        ); ?>
    </div>
    <div class="col-xs-5 col-sm-3 col-md-3 text-center">
        <div class="btn-group">
            <?= yii\helpers\Html::a('',[],['class'=>'btn btn-default glyphicon glyphicon-sort']) ?>
            <?= yii\helpers\Html::a(
                '',
                ['/task/update','id'=>$task->id],
                [
                    'class'=>'btn btn-default glyphicon glyphicon-pencil',
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                ])
            ?>
            <?= yii\helpers\Html::a(
                '',
                ['/task/delete','id'=>$task->id],
                [
                    'class'=>'btn btn-default glyphicon glyphicon-trash',
                    'name'=>'delete'
                ])
            ?>
        </div>
    </div>
</li>