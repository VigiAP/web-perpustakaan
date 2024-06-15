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
                    <h1 class="m-0">Kelola Buku</h1>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Buku</h3>
                        <a href="<?= base_url('pustakawan/tambah_buku') ?>" class="btn btn-primary mx-2 float-right">Tambah
                            Buku</a>
                        <a href="<?= base_url('kategori/') ?>" class="btn btn-warning float-right">Tambah
                            Kategori</a>
                    </div>
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
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Jumlah</th>
                                    <th>Kategori</th>
                                    <th>Created At</th>
                                    <th>Cover</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($buku as $book): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $book->judul; ?></td>
                                    <td><?= $book->penulis; ?></td>
                                    <td><?= $book->penerbit; ?></td>
                                    <td><?= $book->tahun_terbit; ?></td>
                                    <td><?= $book->jumlah; ?></td>
                                    <td><?= $book->kategoris; ?></td> 
                                    <td><?= $book->created_at; ?></td>
                                    <td><img src="<?= base_url('cover/' . $book->cover); ?>" width="50px" height="50px" alt=""></td>
                                    <td>
                                        <a href="<?= base_url('/pustakawan/edit_buku/' . $book->id_buku); ?>"
                                            class="btn btn-info btn-sm"><i class="nav-icon fas fa-pencil-alt"></i>
                                            Edit</a>
                                        <a href="<?= base_url('/pustakawan/delete_buku/' . $book->id_buku); ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                class="nav-icon fa fa-trash"></i> Delete</a>
                                    </td>
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