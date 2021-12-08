<?php

use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$script = <<< JS
$('#berita-table').DataTable({
    'autoWidth'   : false,
});

$('#berita-table tbody').on('click','.view',function(){
    $('#modal-view').modal('show')
    .find('#modal')
    .load($(this).attr('value'));
});

$('#berita-table tbody').on('click','.delete',function() {
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

$this->title = 'Berita';
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
                    <label class="col-form-label">BERITA</label>
                    <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success float-right create']) ?>
                </div>
                <div class="card-body">
                    <table id="berita-table" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%;">No.</th>
                                <th>Judul Berita</th>
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
                                <td class="align-middle text-center"><?= $i ?></td>
                                <td class="align-middle"><?= $data['berita_text'] ?></td>
                                <td class="align-middle">
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <?= Html::a(
                                                '<span class="fas fa-eye"></span>',
                                                ['view', 'id' => $data['berita_id']], ['class' => 'btn btn-sm btn-info view']
                                            ) ?>
                                            <?= Html::a('<span class="fas fa-edit"></span>', ['update', 'id' => $data['berita_id']], ['class' => 'btn btn-sm btn-success update']) ?>
                                            <!-- < ?= Html::button(
                                                '<span class="fas fa-edit"></span>',
                                                ['value' => Url::to(['update', 'id' => $data['berita_id']]), 'class' => 'btn btn-sm btn-success update']
                                            ) ?> -->
                                            <?= Html::button(
                                                '<span class="fas fa-trash-alt"></span>',
                                                ['value' => Url::to(['delete', 'id' => $data['berita_id']]), 'class' => 'btn btn-sm btn-danger delete']
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
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>