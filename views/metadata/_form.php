<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Metadata */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="metadata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'metadata_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metadata_kondef')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metadata_kegunaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metadata_interpretasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metadata_sumber')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
