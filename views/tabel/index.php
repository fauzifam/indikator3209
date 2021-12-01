<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indikators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Indikator', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>



                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'indikator_id',
                            'indikator_metadata_id',
                            'indikator_kategori',
                            'indikator_subjek',
                            'indikator_judul',
                            //'indikator_2015',
                            //'indikator_2016',
                            //'indikator_2017',
                            //'indikator_2018',
                            //'indikator_2019',
                            //'indikator_2020',
                            //'indikator_2021',
                            //'indikator_2022',
                            //'indikator_2023',
                            //'indikator_2024',
                            //'indikator_2025',

                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
