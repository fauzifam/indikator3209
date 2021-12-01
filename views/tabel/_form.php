<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indikator */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="indikator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'indikator_metadata_id')->textInput() ?>

    <?= $form->field($model, 'indikator_kategori')->dropDownList([ 'SOSIAL DAN KEPENDUDUKAN' => 'SOSIAL DAN KEPENDUDUKAN', 'EKONOMI DAN PERDAGANGAN' => 'EKONOMI DAN PERDAGANGAN', 'PERTANIAN DAN PERTAMBANGAN' => 'PERTANIAN DAN PERTAMBANGAN', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'indikator_subjek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indikator_judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indikator_2015')->textInput() ?>

    <?= $form->field($model, 'indikator_2016')->textInput() ?>

    <?= $form->field($model, 'indikator_2017')->textInput() ?>

    <?= $form->field($model, 'indikator_2018')->textInput() ?>

    <?= $form->field($model, 'indikator_2019')->textInput() ?>

    <?= $form->field($model, 'indikator_2020')->textInput() ?>

    <?= $form->field($model, 'indikator_2021')->textInput() ?>

    <?= $form->field($model, 'indikator_2022')->textInput() ?>

    <?= $form->field($model, 'indikator_2023')->textInput() ?>

    <?= $form->field($model, 'indikator_2024')->textInput() ?>

    <?= $form->field($model, 'indikator_2025')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
