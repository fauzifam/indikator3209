<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Video */

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
                            'video_id',
                            'video_kategori',
                            'video_text',
                            'video_link:ntext',
                            [
                                // 'format' => 'raw',
                                'attribute' => 'Preview',
                                'value' => !empty($model->video_link) ? 
                                '<div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=3t324Vb2nXE" frameborder="0" allowfullscreen></iframe>
                                </div>' : null,
                            ],
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