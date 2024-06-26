<?= $this->extend('layout/l_home'); ?>
<?= $this->section('konten'); ?>
<div class="container" style="margin-top:80px;">
    <div class="row">
        <h2>Baru Ditambahkan</h2>
        <hr>
        <?php foreach ($newBooks as $book): ?>
            <div class="col-md-3 mt-3">
                <div class="card-sl">
                    <div class="card-image">
                        <a href="<?= base_url('pengguna/bukuid/' . $book['id_buku']); ?>"><img src="<?= base_url('cover/' . $book['cover']); ?>" class="card-img-top" alt="<?= $book['judul'] ?>" style="height: 12rem; object-fit: cover;"></a>
                    </div>
                    <div class="card-heading">
                        <?= $book['judul'] ?>
                    </div>
                    <div class="card-text">
                        <?= $book['penulis'] ?>
                    </div>
                    <div class="card-text">
                        <?= $book['penerbit'] ?>
                    </div>
                    <div class="card-text">
                        <?= $book['tahun_terbit'] ?>
                    </div>
                    <form action="<?= base_url('pengguna/pinjam_buku') ?>" method="post">
                        <input type="hidden" name="id_buku" value="<?= $book['id_buku'] ?>">
                        <button type="submit" class="card-button">Pinjam Buku</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<?= $this->endSection(); ?>
