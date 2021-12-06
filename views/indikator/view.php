<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indikator */

\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'indikator_id',
                            'indikator_metadata_id',
                            'indikator_kategori',
                            'indikator_subjek',
                            'indikator_judul',
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