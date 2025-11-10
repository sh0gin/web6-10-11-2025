<?php

namespace app\controllers;

use app\models\compositionSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use yii\helpers\VarDumper;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $model->password = Yii::$app->security->generatePasswordHash($model->password);
            if ($model->validate()) {
                $model->save(false);
                return $this->goBack();
            }
            // else {
            //     VarDumper::dump($model->errors, 10, true); die;
            // }
        }

        $model->password = '';
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $user = User::findOne(['login' => Yii::$app->user->identity->login]);
        $user->authKey = null;
        $user->save(false);
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionQuery()
    {
        return $this->render('query');
    }

    public function actionFirst()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->searchFirst($this->request->queryParams);

        return $this->render('first', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionExportFirst()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->exFirst();
        $str = 'Блюдо;Продукты;' . "\r\n";

        foreach ($dataProvider as $elem) {
            $str .= $elem['food1'] . ';'
                . $elem['product'] . "\r\n";
        }

        $str = iconv('utf-8', 'Windows-1251', $str);
        Yii::$app->response->sendContentAsFile($str, 'экспорт.csv')->send();
    }

    public function actionSecond()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->searchSecond($this->request->queryParams);

        return $this->render('second', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionExportSecond()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->exSecond();
        $str = 'Блюдо;Калории;' . "\r\n";

        foreach ($dataProvider as $elem) {
            $str .= $elem['food1'] . ';'
                . $elem['calories'] . "\r\n";
        }

        $str = iconv('utf-8', 'Windows-1251', $str);
        Yii::$app->response->sendContentAsFile($str, 'экспорт.csv')->send();
    }

    public function actionThird()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->searchThird($this->request->queryParams);

        return $this->render('third', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionExportThird()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->exThird();
        $str = 'Блюдо;Количество;' . "\r\n";
        foreach ($dataProvider as $elem) {
            $str .= $elem['food1'] . ';'
                . $elem['count'] . "\r\n";
        }

        $str = iconv('utf-8', 'Windows-1251', $str);
        Yii::$app->response->sendContentAsFile($str, 'экспорт.csv')->send();
    }

    public function actionFourth()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->searchFourth($this->request->queryParams);

        return $this->render('fourth', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionExportFourth()
    {
        $searchModel = new compositionSearch;
        $dataProvider = $searchModel->exFourth();
        $str = 'Продукт;Очерёдность;' . "\r\n";
        foreach ($dataProvider as $elem) {
            $str .= $elem['food1'] . ';'
                . $elem['count'] . "\r\n";
        }

        $str = iconv('utf-8', 'Windows-1251', $str);
        Yii::$app->response->sendContentAsFile($str, 'экспорт.csv')->send();
    }

}
