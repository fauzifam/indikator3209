<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?= Html::img('@web/images/bps.png', ['style' => 'width:40px;']) ?>
        </div>
        <div class="info">
            <a href="<?= Url::home() ?>" class="d-block brand-text font-weight-light">BPS KAB. CIREBON</a>
            <!-- <div class="d-block brand-text font-weight-light">CERDIK</div> -->
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            $menuItems[] = [
                'label' => 'Beranda',
                'url' => ['/site/index'],
                'icon' => 'fas fa-home',
            ];
            $menuItems[] = [
                'label' => 'Tabel Indikator',
                'url' => ['/indikator/index'],
                'icon' => 'fas fa-table',
            ];
            $menuItems[] = [
                'label' => 'Metadata Indikator',
                'url' => ['/metadata/index'],
                'icon' => 'fas fa-list-alt',
            ];
            $menuItems[] = [
                'label' => 'Publikasi',
                'url' => ['/publikasi/index'],
                'icon' => 'fas fa-book',
            ];
            $menuItems[] = [
                'label' => 'Berita',
                'url' => ['/berita/index'],
                'icon' => 'fas fa-newspaper',
            ];

            $menuItems[] = [
                'label' => 'Gii',
                'icon' => 'file-code', 
                'url' => ['/gii'], 
                'target' => '_blank',
            ];
            
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => $menuItems,
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>