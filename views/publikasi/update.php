<?php

/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */

$this->title = 'Update Publikasi: ' . $model->publikasi_id;
$this->params['breadcrumbs'][] = ['label' => 'Publikasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->publikasi_id, 'url' => ['view', 'publikasi_id' => $model->publikasi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>