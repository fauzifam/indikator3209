<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="publikasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'publikasi_judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publikasi_nokatalog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publikasi_nobuku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publikasi_daterilis')->textInput() ?>

    <?= $form->field($model, 'publikasi_ukuran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publikasi_deskripsi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
