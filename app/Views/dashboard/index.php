<?= $this->extend('layout/l_dashboard'); ?>

<?= $this->section('konten'); ?>

<section class="content">
    <?php if (session()->get('role') == 'admin'): ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $totalUsers ?></h3>
                        <p>Total User</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalAdmin ?></h3>
                        <p>Admin</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalPustakawan ?></h3>
                        <p>Pustakawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $totalPengguna ?></h3>
                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
    <?php endif; ?>

    <?php if (session()->get('role') === 'pustakawan'): ?>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $totalBuku ?></h3>
                        <p>Buku</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-book"></i>
                    </div>
                    <a href="<?= base_url('dashboard/pustakawan/kelola_buku'); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $totalPengguna ?></h3>
                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="<?= base_url('dashboard/pustakawan/daftar_anggota'); ?>" class="small-box-footer">More info
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $totalSirkulasi ?></h3>
                        <p>Sirkulasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-loop"></i>
                    </div>
                    <a href="<?= base_url('dashboard/pustakawan/sirkulasi'); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $totalLaporan ?></h3>
                        <p>Laporan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="<?= base_url('dashboard/pustakawan/laporan'); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
    <?php endif; ?>
</section>

<?php if (session()->get('role') == 'pengguna'): ?>
<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $totalBukuDipinjam ?></h3>
                <p>Buku yang Dipinjam</p>
            </div>
            <div class="icon">
                <i class="ion ion-book"></i>
            </div>
        </div>
    </div>
   
    <!-- ./col -->
</div>
<!-- /.row -->
<?php endif; ?>


<?= $this->endSection(); ?>