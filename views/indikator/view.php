<?php

use yii\widgets\DetailView;
use \miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Indikator */

\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <caption><b><i>Konsep dan Definisi : </i></b><?= $model->indikatorMetadata->metadata_kondef ?></caption>
                    <br>
                    <caption><b><i>Interpretasi : </i></b><?= $model->indikatorMetadata->metadata_interpretasi ?></caption>
                    <br>
                    <caption><i>Selengkapnya dapat dilihat pada menu <?= Html::a('Metadata Indikator', ['metadata/index']); ?></i></caption>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <div class="text-center">
                        <label for="table-data"><?= $model->indikator_judul ?></label>
                    </div>
                    <table class="table table-bordered table-sm table-striped" id="table-data">
                        <thead class="text-center bg-info">
                            <tr>
                                <th>#</th>
                                <th>Tahun</th>
                                <th>Nilai</th>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($dataTabel as $data) :
                            ++$i;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= $data['indikator_tahun'] ?></td>
                                    <td><?= $data['indikator_nilai'] ?></td>
                                    <td><?= $data['indikator_satuan'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- < ?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'indikator_id',
                            'indikator_metadata_id',
                            'indikator_kategori',
                            'indikator_subjek',
                            'indikator_judul',
                        ],
                    ]) ?> -->
                </div>
                <!--.col-md-6-->
            <!-- </div>
            <div class="row"> -->
                <div class="col-md-7">
                    <?= Highcharts::widget([
                        'scripts' => [
                            'modules/exporting',
                            'themes/grid-light',
                        ],
                        'options' => [
                            'title' => [
                                'text' => $model->indikator_judul
                            ],
                            'xAxis' => [
                                'categories' => $dataChart['tahun']
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'Rasio']
                            ],
                            'series' => [
                                [
                                    'type' => 'spline',
                                    'name' => 'Nilai',
                                    'data' => $dataChart['nilai'],
                                    'marker' => [
                                        'lineWidth' => 2,
                                        'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                                        'fillColor' => 'white',
                                    ],
                                ],
                            ],
                        ]
                    ]) ?>
                </div>
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>