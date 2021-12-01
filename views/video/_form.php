<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_kategori')->dropDownList([ 'MATERI STATISTIK' => 'MATERI STATISTIK', 'RILIS INDIKATOR' => 'RILIS INDIKATOR', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'video_link')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>