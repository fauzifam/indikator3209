<?php

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use yii\bootstrap4\Alert;

$this->title = 'CERDIK | Publikasi';
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$script = <<< JS
$('#publikasi-table').DataTable({
    'autoWidth'   : false,
});

$('.create').on('click',function(){
    $('#modal-create').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#publikasi-table tbody').on('click','.view',function(){
    $('#modal-view').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#publikasi-table tbody').on('click','.update',function(){
    $('#modal-update').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#publikasi-table tbody').on('click','.delete',function() {
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

$('#publikasi-table tbody').on('click','.download',function() {
    const href = $(this).attr('value');
    document.location.href = href;
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
                    <label class="col-form-label">PUBLIKASI</label>
                    
                    <?php
                    if (!Yii::$app->user->isGuest) {
                        echo Html::button('Tambah Data', ['value' => Url::to(['create']), 'class' => 'btn btn-success float-right create', 'id' => 'create']); 
                    }
                    ?>
                </div>
                <div class="card-body">
                <table id="publikasi-table" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th style="width: 80%;" colspan='2'>Judul Publikasi</th>
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
                                <td class="align-middle" style="width: 9%;">
                                    <?= Html::img('@web/'.$data['publikasi_pathcover'],['style'=>'width:100px']) ?> 
                                </td>
                                <td>
                                    <b><?= $data['publikasi_judul'] ?></b><br>
                                    <br>
                                    <i>Tanggal rilis : </i><?= $data['publikasi_daterilis'] ?><br>
                                    <br>
                                    <i>Ukuran file : </i><?= $data['publikasi_ukuran'] ?>
                                </td>
                                <td class="align-middle">
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <?= Html::button(
                                                '<span class="fas fa-download"></span>',
                                                ['value' => Url::to(['download', 'id' => $data['publikasi_id']]), 'class' => 'btn btn-sm btn-warning download', 'id' => 'download']
                                            ) ?>
                                            <?= Html::button(
                                                '<span class="fas fa-eye"></span>',
                                                ['value' => Url::to(['view', 'id' => $data['publikasi_id']]), 'class' => 'btn btn-sm btn-info view']
                                            ) ?>
                                            <?php
                                            if (!Yii::$app->user->isGuest) {
                                                echo Html::button(
                                                '<span class="fas fa-edit"></span>',
                                                ['value' => Url::to(['update', 'id' => $data['publikasi_id']]), 'class' => 'btn btn-sm btn-success update']
                                                );
                                            } 
                                            ?>
                                            <?php
                                            if (!Yii::$app->user->isGuest) {
                                                echo Html::button(
                                                '<span class="fas fa-trash-alt"></span>',
                                                ['value' => Url::to(['delete', 'id' => $data['publikasi_id']]), 'class' => 'btn btn-sm btn-danger delete']
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
                <!--.card-body-->
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