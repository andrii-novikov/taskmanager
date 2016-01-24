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