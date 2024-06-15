<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>

<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>


<section class="content">
    <?php if (session()->get('role') == 'pustakawan'): ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sirkulasi Buku</h1>
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
                    <div class="card-body">
                        <table id="petugasTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Buku</th>
                                    <th>Nama Buku</th>
                                    <th>Peminjam</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($sirkulasi as $s): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $s->id_buku; ?></td>
                                    <td><?= $s->judul; ?></td>
                                    <td><?= $s->peminjam; ?></td>
                                    <td><?= $s->created_at; ?></td>
                                    <td><?= $s->updated_at; ?></td>
                                    <td><?= $s->denda; ?></td> 
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <?php endif; ?>
</section>

<?php $this->endSection(); ?>

<?php $this->endSection(); ?>