<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indikator */

$this->title = $model->indikator_id;
$this->params['breadcrumbs'][] = ['label' => 'Indikators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'indikator_id' => $model->indikator_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'indikator_id' => $model->indikator_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'indikator_id',
                            'indikator_metadata_id',
                            'indikator_kategori',
                            'indikator_subjek',
                            'indikator_judul',
                            'indikator_2015',
                            'indikator_2016',
                            'indikator_2017',
                            'indikator_2018',
                            'indikator_2019',
                            'indikator_2020',
                            'indikator_2021',
                            'indikator_2022',
                            'indikator_2023',
                            'indikator_2024',
                            'indikator_2025',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>