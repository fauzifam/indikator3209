<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
// use kartik\editors\Summernote;
use marqu3s\summernote\Summernote;

/* @var $this yii\web\View */
/* @var $model app\models\Berita */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="berita-form">

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
    
    <?= $form->field($model, 'berita_text')->textInput() ?>

    <?= $form->field($model, 'berita_uploadfoto')->fileInput(); ?>
    
    <?= $form->field($model, 'berita_body')->widget(Summernote::className(), []) ?>

    <?= $form->field($model, 'berita_active')->radioList([ 'Tampilkan' => 'Tampilkan', 'Arsipkan' => 'Arsipkan', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
