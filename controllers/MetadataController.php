<?php

namespace app\controllers;

use Yii;
use app\models\Metadata;
use Codeception\Step\Meta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MetadataController implements the CRUD actions for Metadata model.
 */
class MetadataController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Metadata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = Metadata::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Metadata model.
     * @param int $id Metadata ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Metadata::findOne($id);
        return $this->renderAjax('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Metadata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Metadata();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Berhasil Disimpan');
            } else {
                Yii::$app->session->setFlash('danger', 'Gagal Disimpan');
            }
            return $this->redirect(['index']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Metadata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Metadata ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Metadata::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Berhasil Diubah');
            } else {
                Yii::$app->session->setFlash('danger', 'Gagal Diubah');
            }
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Metadata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Metadata ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Metadata::findOne($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('info', 'Berhasil Dihapus');
        } else {
            Yii::$app->session->setFlash('danger', 'Gagal Dihapus');
        }

        return $this->redirect(['index']);
    }
}
