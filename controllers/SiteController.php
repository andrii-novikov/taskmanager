<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $user = Yii::$app->user;
        $lists = $user -> getIdentity() -> todolists;
        return $this->render('index',compact('user','lists'));
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $registerError=false;

        $login = new LoginForm();
        $register = new User();

        if ($login->load(Yii::$app->request->post()) && $login->login()) {
            return $this->goBack();
        }

        if ($this->isNeedRegister()) {
            if ($register->load(Yii::$app->request->post()) && $register->save()) {
                $message = "Register Success";
            } else {
                $registerError = true;
            }
        }

        return $this->render('login', compact('login','register','message','registerError'));
    }

    protected function isNeedRegister() {
        return !empty(Yii::$app->request->post('User'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
