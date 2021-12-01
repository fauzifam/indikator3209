<?php

/* @var $this yii\web\View */
/* @var $model app\models\Metadata */

$this->title = 'Update Metadata: ' . $model->metadata_id;
$this->params['breadcrumbs'][] = ['label' => 'Metadatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->metadata_id, 'url' => ['view', 'metadata_id' => $model->metadata_id]];
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