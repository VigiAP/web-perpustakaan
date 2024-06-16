<?= $this->extend('layout/l_dashboard'); ?>

<?= $this->section('konten'); ?>

<style>
        a {
        text-decoration: none;
    }

    /* Card Styles */

    .card-sl {
        border-radius: 8px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .card-image img {
        max-height: 100%;
        max-width: 100%;
        border-radius: 8px 8px 0px 0;
    }

    .card-action {
        position: relative;
        float: right;
        margin-top: -25px;
        margin-right: 20px;
        z-index: 2;
        color: #E26D5C;
        background: #fff;
        border-radius: 100%;
        padding: 15px;
        font-size: 15px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
    }

    .card-action:hover {
        color: #fff;
        background: #E26D5C;
        -webkit-animation: pulse 1.5s infinite;
    }

    .card-heading {
        font-size: 18px;
        font-weight: bold;
        background: #fff;
        padding: 10px 15px;
    }

    .card-text {
        padding: 10px 15px;
        background: #fff;
        font-size: 14px;
        color: #636262;
    }

    .card-button {
        display: block;
        text-align: center;
        padding: 10px;
        width: 100%;
        background-color: #1F487E;
        color: #fff;
        border: none;
        border-radius: 0;
        margin: 0;
    }

    .card-button.btn-danger {
        background-color: #dc3545;
    }

    .card-button:hover {
        text-decoration: none;
        background-color: #1D3461;
        color: #fff;
    }

    .card-button.btn-danger:hover {
        background-color: #c82333;
    }
</style>

<h1>Daftar Buku yang Dibookmark (Kategori: Pengetahuan)</h1>
<div class="container" style="margin-top:20px;">
    <?php if (!empty($bookmarkedBooks)): ?>
        <?php foreach (array_chunk($bookmarkedBooks, 5) as $bookRow): ?>
            <div class="row">
                <?php foreach ($bookRow as $book): ?>
                    <div class="col-md-2 mt-3">
                        <div class="card-sl">
                            <div class="card-image">
                                <a href="<?= base_url('pengguna/detail_buku/' . $book['id_buku']); ?>"><img src="<?= base_url('cover/' . $book['cover']); ?>" class="card-img-top" alt="<?= $book['judul'] ?>" style="height: 12rem; object-fit: cover;"></a>
                            </div>
                            <div class="card-heading text-center">
                                <?= $book['judul'] ?>
                            </div>
                            <div class="card-buttons">
                                <a href="#" class="card-button">Tampilkan Detail</a>
                                <form action="<?= base_url('bookmark/hapusBookmark/' . $book['id_buku']); ?>" method="post" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bookmark ini?');">
                                    <button type="submit" class="card-button btn-danger">Hapus Bookmark</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada buku yang dibookmark dalam kategori pengetahuan.</p>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
