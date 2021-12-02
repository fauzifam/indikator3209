<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Metadata */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="metadata-form">

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

    <?= $form->field($model, 'metadata_text')->textInput() ?>

    <?= $form->field($model, 'metadata_kondef')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'metadata_kegunaan')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'metadata_interpretasi')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'metadata_sumber')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success float-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
