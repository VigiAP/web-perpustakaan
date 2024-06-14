<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Buku</h3>
    </div>
    <?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
    <?php endif; ?>
    <div class="card-body">
        <form action="<?= base_url('pustakawan/update_buku'); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku['judul']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku['penulis']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                <select name="kategori[]" class="form-control select2" multiple="multiple" placeholder="Kategori ...">

                    <?php foreach ($kategori as $option) : ?>
                    <option value="<?= $option['id_kategori']; ?>" <?= in_array($option['id_kategori'], array_column($selectedKategoriIds, 'id_kategori')) ? 'selected' : ''; ?>>
                        <?= $option['nama_kategori']; ?>
                    </option>
                    <?php endforeach; ?>

                </select>
                <script>
                    $(document).ready(function () {
                        $('.select2').select2({
                            placeholder: "Kategori....",

                        });
                    });
                </script>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit"
                    value="<?= $buku['tahun_terbit']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $buku['jumlah']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover" value="<?= $buku['cover']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?php $this->endSection(); ?>