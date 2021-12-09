<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Metadata */

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
                            'metadata_text:ntext',
                            'metadata_kondef:ntext',
                            'metadata_kegunaan:ntext',
                            'metadata_interpretasi:ntext',
                            'metadata_sumber:ntext',
                        ],
                        'options' => [
                            'class' => 'table table-striped table-sm table-bordered'
                        ]
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