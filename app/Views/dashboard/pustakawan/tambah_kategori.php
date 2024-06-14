<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Kategori</h3>
    </div>

    <div class="card-body">
        <form action="<?= base_url('kategori/simpan_kategori'); ?>" method="POST">

            <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('pesan2')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan2'); ?>
            </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori">
            </div>
            <a href="<?= base_url('pustakawan/kelola_buku'); ?>" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['nama_kategori'] ?></td>
                    <td>
                        <a href="<?= base_url('/kategori/delete_kategori/' . $value['id_kategori']); ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this item?')"><i
                                class="nav-icon fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>

<?php $this->endSection(); ?>