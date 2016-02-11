<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property string $prioritize
 * @property array $prioritizes
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
            [['done', 'list_id'], 'integer'],
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
            'title' => 'Название',
            'prioritize' => 'Приоритет',
            'dedline' => 'Дедлайн',
            'done' => 'Завершено?',
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

    public static function getPrioritizes() {
        return [
            'Низкий'=>'Низкий',
            'Средний'=>'Средний',
            'Высокий'=>'Высокий',
            'Очень высокий'=>'Очень высокий'
        ];
    }

    public function getPrioritizeIndex() {
        $index = array_search($this->prioritize, array_values(static::getPrioritizes()));
        return ++$index;
    }

}
