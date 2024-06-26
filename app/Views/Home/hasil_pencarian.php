
<?php $this->extend('layout/l_home'); ?>

<?php $this->section('konten'); ?>
 <div class="container" style="margin-top:80px;">
        <div class="row">
            <h2>Hasil Pencarian untuk: <?= $searchKeyword ?></h2>
            <hr>
            <?php if (!empty($searchResults)): ?>
                <?php foreach ($searchResults as $book): ?>
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
                            <a href="#" class="card-button">Pinjam Buku</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada hasil ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $this->endSection(); ?>
