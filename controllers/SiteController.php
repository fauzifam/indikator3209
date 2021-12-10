<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Indikator;
use app\models\IndikatorTahun;
use app\models\Publikasi;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
                    // 'logout' => ['post'],
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
        $indikatorID = array(13,10,11);
        $indikator = Indikator::findAll(['indikator_id' => $indikatorID]);
        foreach ($indikator as $value) {
            $indikatorTahun = IndikatorTahun::findAll(['indikator_id' => $value->indikator_id]);
            $indikatorTahunMax = max($indikatorTahun);
            list($judul,$rentang) = explode(',',$value->indikator_judul);
            $array[] = [
                'judul' => $judul,
                'kondef' => $value->indikatorMetadata->metadata_kondef,
                'sumber' => $value->indikatorMetadata->metadata_sumber,
                'tahun' => $indikatorTahunMax->indikator_tahun,
                'nilai' => $indikatorTahunMax->indikator_nilai,
                'satuan' => $indikatorTahunMax->indikator_satuan,
            ];
        }

        $maxid = Publikasi::find()->max('publikasi_id');
        $cover = Publikasi::find()->select('publikasi_pathcover')->where(['publikasi_id'=>array($maxid,$maxid-1,$maxid-2)])->all();
        return $this->render('index', [
            'indikator' => $array,
            'cover' => $cover
        ]);
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    // /**
    //  * Displays contact page.
    //  *
    //  * @return Response|string
    //  */
    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    //         Yii::$app->session->setFlash('contactFormSubmitted');

    //         return $this->refresh();
    //     }
    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    // /**
    //  * Displays about page.
    //  *
    //  * @return string
    //  */
    // public function actionAbout()
    // {
    //     return $this->render('about');
    // }
}
