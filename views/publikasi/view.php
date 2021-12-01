<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */

$this->title = $model->publikasi_id;
$this->params['breadcrumbs'][] = ['label' => 'Publikasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'publikasi_id' => $model->publikasi_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'publikasi_id' => $model->publikasi_id], [
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
                            'publikasi_id',
                            'publikasi_judul',
                            'publikasi_nokatalog',
                            'publikasi_nobuku',
                            'publikasi_daterilis',
                            'publikasi_ukuran',
                            'publikasi_deskripsi:ntext',
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