<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Metadata */

$this->title = $model->metadata_id;
$this->params['breadcrumbs'][] = ['label' => 'Metadatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'metadata_id' => $model->metadata_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'metadata_id' => $model->metadata_id], [
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
                            'metadata_id',
                            'metadata_text:ntext',
                            'metadata_kondef:ntext',
                            'metadata_kegunaan:ntext',
                            'metadata_interpretasi:ntext',
                            'metadata_sumber:ntext',
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