<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */

\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <?= Html::img('@web/' . $model->publikasi_pathcover, ['style'=>'width:170px']) ?>
                </div>
                <div class="col-md-9">
                    Nomor katalog : <?= $model->publikasi_nokatalog ?><br>
                    Nomor ISSN/ISBN : <?= $model->publikasi_nobuku ?><br>
                    Tanggal rilis : <?= $model->publikasi_daterilis ?><br>
                    Ukuran file : <?= $model->publikasi_ukuran ?><br>
                    <br>
                    Deskripsi : <?= $model->publikasi_deskripsi ?>
                </div>
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>