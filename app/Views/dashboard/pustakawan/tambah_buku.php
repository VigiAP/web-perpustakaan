<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Buku Baru</h3>
    </div>
    <?php if (session()->getFlashdata('pesan')): ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
    <?php endif; ?>
    <div class="card-body">
        <form action="<?= base_url('pustakawan/simpan_buku'); ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <script src="https://code.jquery.com/jquery-3.7.1.js"
                    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                <select name="kategori[]" class="form-control select2" multiple="multiple" placeholder="Kategori ...">
                    <?php
                                foreach ($kategori as $option) : ?>
                    <option value="<?= $option['id_kategori']; ?>"><?= $option['nama_kategori']; ?></option>

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
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah">
            </div>

            <div class="mb-3">
                <label for="Cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php $this->endSection(); ?>