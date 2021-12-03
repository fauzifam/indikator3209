<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="publikasi-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-3',
                    'offset' => 'offset-sm-4',
                    'wrapper' => 'col-sm-9',
                    'error' => '',
                    'hint' => '',
                ],
            ],
    ]); ?>

    <?= $form->field($model, 'publikasi_judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publikasi_nokatalog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publikasi_nobuku')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'publikasi_daterilis')->widget(DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'php:Y-m-d'
    ]); ?>

    <?= $form->field($model, 'publikasi_upload')->fileInput(); ?>

    <?= $form->field($model, 'publikasi_deskripsi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success float-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
