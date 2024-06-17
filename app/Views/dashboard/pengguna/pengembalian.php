<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>

<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>

<section class="content">
    <?php if (session()->get('role') == 'pengguna'): ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengembalian Buku</h1>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <?php if (session()->getFlashdata('pesan2')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan2'); ?>
                </div>
                <?php endif; ?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="petugasTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Buku</th>
                                    <th>Nama buku</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($lists as $a): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a->id_buku; ?></td>
                                    <td><?= $a->judul; ?></td>
                                    <td><?= $a->updated_at == null ? "Belum Dikembalikan" : $a->updated_at; ?></td>
                                    <td><?= $a->denda == null ? "Rp. 0" : "Rp. " . $a->denda; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <?php endif; ?>
</section>

<?php $this->endSection(); ?>

<?php $this->endSection(); ?>