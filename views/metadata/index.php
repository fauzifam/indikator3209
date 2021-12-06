<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\bootstrap4\Alert;
use yii\grid\GridView;

$this->title = 'Metadata Indikator';

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$script = <<< JS
$('#metadata-table').DataTable({
    'autoWidth'   : false,
});

$('.create').on('click',function(){
    $('#modal-create').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#metadata-table tbody').on('click','.view',function(){
    $('#modal-view').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#metadata-table tbody').on('click','.update',function(){
    $('#modal-update').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#metadata-table tbody').on('click','.delete',function() {
    const href = $('.delete').attr('value');
    Swal.fire({
        title: 'Apakah Anda yakin ingin menghapusnya?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batalkan',
    }).then((result) => {
        if (result.value === true) {
            // alert('asdf');
            document.location.href = href;
            // toastr.success('Data berhasil dihapus!');
        }
    });
});
JS;
$this->registerJs($script);

\app\assets\PluginAsset::register($this)->add(['dataTable', 'sweetAlert']);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
            foreach (Yii::$app->session->getAllFlashes() as $key => $value) {
                if ($key == 'success') {
                    $icon = 'check';
                } else if ($key == 'danger') {
                    $icon = 'times';
                } else if ($key == 'info') {
                    $icon = 'info';
                }
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-' . $key,
                    ],
                    'body' => '<h5><i class="icon fas fa-' . $icon . '"></i> Data ' . $value . '.</h5>',
                ]);
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <label class="col-form-label">METADATA INDIKATOR</label>
                    <?= Html::button('Tambah Data', ['value' => Url::to(['create']), 'class' => 'btn btn-success float-right create', 'id' => 'create']); ?>
                </div>

                <div class="card-body">
                    <table id="metadata-table" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th>Indikator</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($dataProvider as $data) :
                            $i = ++$i;
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $data['metadata_text'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <?= Html::button(
                                                '<span class="fas fa-eye"></span>',
                                                ['value' => Url::to(['view', 'id' => $data['metadata_id']]), 'class' => 'btn btn-sm btn-info view']
                                            ) ?>
                                            <?= Html::button(
                                                '<span class="fas fa-edit"></span>',
                                                ['value' => Url::to(['update', 'id' => $data['metadata_id']]), 'class' => 'btn btn-sm btn-success update']
                                            ) ?>
                                            <?= Html::button(
                                                '<span class="fas fa-trash-alt"></span>',
                                                ['value' => Url::to(['delete', 'id' => $data['metadata_id']]), 'class' => 'btn btn-sm btn-danger delete']
                                            ) ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                            //$i = $i++;
                            endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>

<?php 
Modal::begin([
    'title' => '<h4>Tambah Data</h4>',
    'id' => 'modal-create',
    'size' => 'modal-lg',
]);
echo "<div id='modal'></div>";
Modal::end();

Modal::begin([
    'title' => '<h4>Detail Data</h4>',
    'id' => 'modal-view',
    'size' => 'modal-lg',
]);
echo "<div id='modal'></div>";
Modal::end();

Modal::begin([
    'title' => '<h4>Edit Data</h4>',
    'id' => 'modal-update',
    'size' => 'modal-lg',
]);
echo "<div id='modal'></div>";
Modal::end();
?>
