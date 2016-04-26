<?php

namespace app\controllers;

use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\ContactForm;

use app\models\Vacancies;
use app\models\ApplyForm;
use app\models\LoginForm;

class SiteController extends Controller
{
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

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionVacancies()
    {
        $array = Vacancies::getAll();
        return $this->render('vacancies', ['arrayInView' => $array]);
    }

//    public function actionApply()
//    {
//        $id = Yii::$app->request->get('id');
//        return $this->render('apply',['idInView' => $id]);
//    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionApply($id)
    {

        $data = Vacancies::getOne($id);
        $model = new ApplyForm();

        if (Yii::$app->request->post()):

            echo '<pre>';
            print_r(Yii::$app->request->post());
            echo '</pre>';
            Yii::$app->end();
        endif;

        return $this->render('apply',['model' => $model,'idInView'=> $data]);
    }
}