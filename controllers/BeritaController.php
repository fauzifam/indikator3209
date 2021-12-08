<?php

namespace app\controllers;

use Yii;
use app\models\Berita;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = Berita::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Berita model.
     * @param int $id Berita ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Berita::findOne($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        date_default_timezone_set("Asia/Jakarta");
        $model = new Berita();

        if ($model->load(Yii::$app->request->post())) {
            $model->berita_daterilis = date('Y/m/d');
            $model->berita_uploadfoto = UploadedFile::getInstance($model, 'berita_uploadfoto');
            $namafile = $model->berita_uploadfoto->baseName . '.' . $model->berita_uploadfoto->extension;
            $model->berita_photo = 'uploads/berita/' . $namafile;
            $model->berita_uploadfoto->saveAs($model->berita_photo);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Berhasil Disimpan');
            } else {
                Yii::$app->session->setFlash('danger', 'Gagal Disimpan');
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Berita ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $model = Berita::findOne($id);
        $filelama = $model->berita_photo;
        if ($model->load(Yii::$app->request->post())) {
            $model->berita_daterilis = date('Y/m/d');
            $model->berita_uploadfoto = UploadedFile::getInstance($model, 'berita_uploadfoto');
            if (!empty($model->berita_uploadfoto)) {
                // var_dump($model->berita_uploadfoto->baseName);
                $namafile = $model->berita_uploadfoto->baseName . '.' . $model->berita_uploadfoto->extension;
                $model->berita_photo = 'uploads/berita/' . $namafile;
                $model->berita_uploadfoto->saveAs($model->berita_photo);
                if ($filelama != $model->berita_photo) {
                    $path = Yii::getAlias('@webroot/') . $filelama;
                    unlink($path);
                }
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Berhasil Diubah');
            } else {
                Yii::$app->session->setFlash('danger', 'Gagal Diubah');
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Berita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Berita ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Berita::findOne($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('info', 'Berhasil Dihapus');
        } else {
            Yii::$app->session->setFlash('danger', 'Gagal Dihapus');
        }

        return $this->redirect(['index']);
    }
}
