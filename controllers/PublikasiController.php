<?php

namespace app\controllers;

use Yii;
use app\models\Publikasi;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PublikasiController implements the CRUD actions for Publikasi model.
 */
class PublikasiController extends Controller
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
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Publikasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = Publikasi::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publikasi model.
     * @param int $id Publikasi ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Publikasi::findOne($id);
        return $this->renderAjax('view', [
            'model' => $model
        ]);
    }

    /**
     * Creates a new Publikasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publikasi();
        $BtoMB = 1048576;
        
        if ($model->load(Yii::$app->request->post())) {
            //file publikasi .pdf
            $model->publikasi_upload = UploadedFile::getInstance($model, 'publikasi_upload');
            $model->publikasi_filename = $model->publikasi_judul . '.' . $model->publikasi_upload->extension;
            $nama = $model->publikasi_filename;
            $ukuran = $model->publikasi_upload->size / $BtoMB;
            $model->publikasi_ukuran = round($ukuran, 3).' MB';
            $model->publikasi_path = 'uploads/publikasi/' . $nama;
            $model->publikasi_upload->saveAs($model->publikasi_path);

            //file cover publikasi
            $model->publikasi_uploadcover = UploadedFile::getInstance($model, 'publikasi_uploadcover');
            $cover = $model->publikasi_judul . '.' . $model->publikasi_uploadcover->extension;
            $model->publikasi_pathcover = 'uploads/publikasi/' . $cover;
            $model->publikasi_uploadcover->saveAs($model->publikasi_pathcover);
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
     * Updates an existing Publikasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Publikasi ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Publikasi::findOne($id);
        $BtoMB = 1048576;
        if ($model->load(Yii::$app->request->post())) {
            //file publikasi .pdf
            $model->publikasi_upload = UploadedFile::getInstance($model, 'publikasi_upload');
            $model->publikasi_filename = $model->publikasi_judul . '.' . $model->publikasi_upload->extension;
            $nama = $model->publikasi_filename;
            $ukuran = $model->publikasi_upload->size / $BtoMB;
            $model->publikasi_ukuran = round($ukuran, 3).' MB';
            $model->publikasi_path = 'uploads/publikasi/' . $nama;
            $model->publikasi_upload->saveAs($model->publikasi_path);

            //file cover publikasi
            $model->publikasi_uploadcover = UploadedFile::getInstance($model, 'publikasi_uploadcover');
            $cover = $model->publikasi_judul . '.' . $model->publikasi_uploadcover->extension;
            $model->publikasi_pathcover = 'uploads/publikasi/' . $cover;
            $model->publikasi_uploadcover->saveAs($model->publikasi_pathcover);
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
     * Deletes an existing Publikasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Publikasi ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Publikasi::findOne($id);
        $path = Yii::getAlias('@webroot/') . $model->publikasi_path;
        if ($model->delete() && unlink($path)) {
            Yii::$app->session->setFlash('info', 'Berhasil Dihapus');
        } else {
            Yii::$app->session->setFlash('danger', 'Gagal Dihapus');
        }

        return $this->redirect(['index']);
    }

    public function actionDownload($id)
    {
        $storagePath = Yii::getAlias('@webroot/');
        $model = Publikasi::findOne($id);
        if ($model != null) {
            $path = $storagePath . $model->publikasi_path;
            if (file_exists($path)) {
                return Yii::$app->response->sendFile($path, $model->publikasi_filename);
            } else {
                throw new \yii\web\NotFoundHttpException('Mohon maaf file tidak tersedia');
            }
        } else {
            throw new \yii\web\NotFoundHttpException('Mohon maaf file tidak tersedia');
        }
    }
}
