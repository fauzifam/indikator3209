<?php

use app\models\Model;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Indikator */
/* @var $form yii\bootstrap4\ActiveForm */

$script = <<< JS
    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
        console.log("beforeInsert");
    });

    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        console.log("afterInsert");
    });

    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });
JS;
$this->registerJs($script);

// \app\assets\PluginAsset::register($this)->add(['select2']);

$listmetadata = Model::getMetadataOptions();
?>

<div class="indikator-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <!-- < ?= $form->field($model, 'indikator_metadata_id')->dropdownList(Model::getMetadataOptions()); ?> -->

    <?= $form->field($model, 'indikator_metadata_id')->widget(Select2::className(),[
            'data' => Model::getMetadataOptions(),
            'options' => [
                'placeholder' => 'Pilih metadata indikator . . .'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'indikator_kategori')->dropDownList([ 
            'SOSIAL DAN KEPENDUDUKAN' => 'SOSIAL DAN KEPENDUDUKAN', 
            'EKONOMI DAN PERDAGANGAN' => 'EKONOMI DAN PERDAGANGAN', 
            'PERTANIAN DAN PERTAMBANGAN' => 'PERTANIAN DAN PERTAMBANGAN', 
        ], 
        [
            'prompt' => [
                'text' => 'Pilih kategori data . . .',
                'options' => ['disabled' => true, 'selected' => true]
            ]
        ]) ?>

    <?= $form->field($model, 'indikator_subjek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indikator_judul')->textInput(['maxlength' => true]) ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <!-- <i class="glyphicon glyphicon-envelope"></i> Addresses -->
            </h4>
        </div>
        <div class="panel-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 999, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsTahun[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'indikator_tahun',
                    'indikator_nilai',
                    'indikator_satuan',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsTahun as $i => $modelTahun): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <!-- <h3 class="panel-title pull-left">Address</h3> -->
                            <div class="float-right">
                                <button type="button" class="add-item btn btn-success"><i class="icon fas fa-plus-square"></i></button>
                                <button type="button" class="remove-item btn btn-danger"><i class="icon fas fa-minus-square"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                                // necessary for update action.
                                if (! $modelTahun->isNewRecord) {
                                    echo Html::activeHiddenInput($modelTahun, "[{$i}]id");
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($modelTahun, "[{$i}]indikator_tahun")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelTahun, "[{$i}]indikator_nilai")->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelTahun, "[{$i}]indikator_satuan")->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success float-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
