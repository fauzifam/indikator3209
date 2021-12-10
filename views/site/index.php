<?php
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;

$this->title = 'Beranda';
?>
<div class="container-fluid">
    <?php foreach ($indikator  as $value) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success card-outline collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $value['judul'] . ', ' . $value['tahun'] ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <label>
                                    Selengkapnya . . .
                                </label>
                                <!-- <i class="fas fa-plus"></i> -->
                            </button>
                        </div>
                        <br>
                        <h3 style="color: rgb(26, 140, 255); font-weight:bold"><?= $value['nilai'] . '&nbsp;&nbsp;' . $value['satuan'] ?></h3>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <i><b>Konsep dan definisi : </b></i><?= $value['kondef'] ?>
                        <br>
                        <i><b>Sumber : </b></i><?= $value['sumber'] ?>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
    <?php endforeach; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <label>PUBLIKASI STATISTIK</label>
                </div>
                <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="text-center">
                                    <?= Html::img('@web/' . $cover[0]->publikasi_pathcover,['style'=>'width:200px']) ?>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="text-center">
                                    <?= Html::img('@web/' . $cover[1]->publikasi_pathcover,['style'=>'width:200px']) ?>
                                </div>
                            <!-- <img src="..." class="d-block w-100" alt="..."> -->
                            </div>
                            <div class="carousel-item">
                                <div class="text-center">
                                    <?= Html::img('@web/' . $cover[2]->publikasi_pathcover,['style'=>'width:200px']) ?>
                                </div>
                            <!-- <img src="..." class="d-block w-100" alt="..."> -->
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>