<?= $this->extend('layout/l_home'); ?>
<?= $this->section('konten'); ?>
<div class="container" style="margin-top:80px;">
    <div class="row">
        <h2>Baru Ditambahkan</h2>
        <hr>
        <?php foreach ($newBooks as $book): ?>
        <div class="col-md-3">
            <div class="card-sl">
                <div class="card-image">
                    <img src="<?= base_url('cover/' . $book['cover']); ?>" class="card-img-top"
                        alt="<?= $book['judul'] ?>" style="height: 12rem; object-fit: cover;">
                </div>

                <div class="card-action">

                    <a href="<?= base_url('bookmark/add/' . $book['id_buku']) ?>" class="add-to-bookmark"><i
                            class="fa fa-bookmark"></i></a>
                </div>
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
</div>
</div>


<?= $this->endSection(); ?>