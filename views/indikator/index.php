<?php

use yii\bootstrap4\Alert;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'CERDIK | Tabel Indikator';

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$script = <<< JS
$('#indikator-table').DataTable({
    'autoWidth'   : false,
});

$('.create').on('click',function(){
    $('#modal-create').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#indikator-table tbody').on('click','.view',function(){
    $('#modal-view').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#indikator-table tbody').on('click','.update',function(){
    $('#modal-update').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#indikator-table tbody').on('click','.delete',function() {
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
                    <label class="col-form-label">TABEL INDIKATOR</label>
                    <?php
                    if (!Yii::$app->user->isGuest) {
                        echo Html::button('Tambah Data', ['value' => Url::to(['create']), 'class' => 'btn btn-success float-right create', 'id' => 'create']);
                    }
                    ?>
                </div>
                <div class="card-body">
                    <table id="indikator-table" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th>Judul</th>
                                <th style="width: 20%;">Kategori</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($dataProvider as $data) :
                            $i = ++$i;
                            ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i ?></td>
                                <td class="align-middle"><?= $data['indikator_judul'] ?></td>
                                <td class="align-middle"><?= $data['indikator_kategori'] ?></td>
                                <td class="align-middle">
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <?= Html::button(
                                                '<span class="fas fa-eye"></span>',
                                                ['value' => Url::to(['view', 'id' => $data['indikator_id']]), 'class' => 'btn btn-sm btn-info view']
                                            ) ?>
                                            <?php
                                            if (!Yii::$app->user->isGuest) {
                                                echo Html::button(
                                                '<span class="fas fa-edit"></span>',
                                                ['value' => Url::to(['update', 'id' => $data['indikator_id']]), 'class' => 'btn btn-sm btn-success update']
                                                );
                                            } 
                                            ?>
                                            <?php 
                                            if (!Yii::$app->user->isGuest) {
                                                echo Html::button(
                                                '<span class="fas fa-trash-alt"></span>',
                                                ['value' => Url::to(['delete', 'id' => $data['indikator_id']]), 'class' => 'btn btn-sm btn-danger delete']
                                                );
                                            } 
                                            ?>
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
    'options' => [
        'tabindex' => false,
    ],
]);
echo "<div id='modal'></div>";
Modal::end();

Modal::begin([
    'title' => '<h4>Detail Data</h4>',
    'id' => 'modal-view',
    'size' => 'modal-xl',
]);
echo "<div id='modal'></div>";
Modal::end();

Modal::begin([
    'title' => '<h4>Edit Data</h4>',
    'id' => 'modal-update',
    'size' => 'modal-lg',
    'options' => [
        'tabindex' => false,
    ],
]);
echo "<div id='modal'></div>";
Modal::end();
?>