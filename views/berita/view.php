<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Berita */

$this->title = $model->berita_text;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center"><?= $model->berita_text ?></h2>
                    <div class="text-center">
                        <?= Html::img('@web/' . $model->berita_photo, ['style' => 'width:40%']) ?>
                    </div>
                    <?= $model->berita_body ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>