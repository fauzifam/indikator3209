<?php

namespace app\controllers;

use Yii;
use app\models\Indikator;
use app\models\IndikatorTahun;
use Exception;
use app\models\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * IndikatorController implements the CRUD actions for Indikator model.
 */
class IndikatorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Indikator models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = Indikator::find()->all();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Indikator model.
     * @param int $id Indikator ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Indikator::findOne($id);
        $dataTabel = $model->indikatorTahuns;
        $dataChart = [
            'tahun' => ArrayHelper::getColumn($dataTabel,'indikator_tahun'),
            'nilai' => ArrayHelper::getColumn($dataTabel,'indikator_nilai'),
            // 'satuan' => array_unique(ArrayHelper::getColumn($dataTabel, 'indikator_satuan')),
        ];
        // var_dump($dataTahun1['satuan'][0]);
        return $this->renderAjax('view', [
            'model' => $model,
            'dataTabel' => $dataTabel,
            'dataChart' => $dataChart,
        ]);
    }

    /**
     * Creates a new Indikator model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Indikator;
        $modelsTahun = [new IndikatorTahun];

        if ($model->load(Yii::$app->request->post())) {
            $modelsTahun = Model::createMultiple(IndikatorTahun::classname());
            Model::loadMultiple($modelsTahun, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTahun) && $valid;
            if ($valid) {
                // save all models to db
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsTahun as $modelTahun) {
                            $modelTahun->indikator_id = $model->indikator_id;
                            if (!($flag = $modelTahun->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'modelsTahun' => (empty($modelsTahun)) ? [new IndikatorTahun()] : $modelsTahun
        ]);
    }

    /**
     * Updates an existing Indikator model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id Indikator ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = Indikator::findOne($id);
        $modelsTahun = $model->indikatorTahuns;

        // var_dump($model->indikatorMetadata->metadata_id);
        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelsTahun, 'indikator_id', 'indikator_id');
            $modelsTahun = Model::createMultiple(IndikatorTahun::classname(), $modelsTahun);
            Model::loadMultiple($modelsTahun, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTahun, 'indikator_id', 'indikator_id')));

             // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTahun) && $valid;

            // var_dump($valid);
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            IndikatorTahun::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsTahun as $modelTahun) {
                            $modelTahun->indikator_id = $model->indikator_id;
                            if (! ($flag = $modelTahun->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->renderAjax('update', [
            'model' => $model,
            'modelsTahun' => (empty($modelsTahun)) ? [new Indikator] : $modelsTahun
        ]);
    }

    /**
     * Deletes an existing Indikator model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id Indikator ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Indikator::findOne($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('info', 'Berhasil Dihapus');
        } else {
            Yii::$app->session->setFlash('danger', 'Gagal Dihapus');
        }

        return $this->redirect(['index']);
    }
}
