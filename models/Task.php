<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property integer $prioritize
 * @property string $dedline
 * @property integer $done
 * @property integer $list_id
 *
 * @property Todolist $list
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'prioritize'], 'required'],
            [['prioritize', 'done', 'list_id'], 'integer'],
            [['dedline'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'prioritize' => 'Prioritize',
            'dedline' => 'Dedline',
            'done' => 'Done',
            'list_id' => 'List ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getList()
    {
        return $this->hasOne(Todolist::className(), ['id' => 'list_id']);
    }
}
