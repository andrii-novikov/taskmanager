<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->getAjaxResponse();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->getAjaxResponse();
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->getAjaxResponse();
    }

    public function actionIncreasePrioritize($id)
    {
        $task = $this->findModel($id);

        $importantTask = Task::find()
            ->where(['>','prioritize',$task->prioritize])
            ->orderBy('prioritize')
            ->one();

        if (!is_null($importantTask)) {
            $this->changePrioritize($task,$importantTask);
        }

        return $this->getAjaxResponse();
    }

    public function actionDecreasePrioritize($id)
    {
        $task = $this->findModel($id);

        $importantTask = Task::find()
            ->where(['<','prioritize',$task->prioritize])
            ->orderBy('prioritize DESC')
            ->one();

        if (!is_null($importantTask)) {
            $this->changePrioritize($task,$importantTask);
        }

        return $this->getAjaxResponse();
    }

    protected function changePrioritize(&$task,&$task2) {
        list($task->prioritize,$task2->prioritize) = array($task2->prioritize,$task->prioritize);
        $task->save();
        $task2->save();
    }

    public function getAjaxResponse() {
        return $this->renderAjax('../site/todolists',['lists'=>Yii::$app->user->getIdentity()->todolists]);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
