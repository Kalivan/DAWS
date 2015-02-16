<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\EntradaForm;
use app\models\RegistroForm;
use app\models\ContactForm;

class SiteController extends Controller
{
	//public $layout='javi';
	public $layout='ee';
	
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
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionEntrada()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new EntradaForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('entrada', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionRegistro()
	{
		if (!\Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		//No implementado
		$model = new RegistroForm();
        if ($model->load(Yii::$app->request->post()) && $model->registro()) {
            return $this->goBack();
        } else {
            return $this->render('registro', [
                'model' => $model,
            ]);
		}
		return $this->render('registro');
	}
	
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionEvento()
    {
        return $this->render('evento');
    }
	
	public function actionDice($mensaje = 'Bienvenido a mi planeta')
    {
        return $this->render('dice', ['mensaje' => $mensaje]);
    }
}
