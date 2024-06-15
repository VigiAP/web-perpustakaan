<?= $this->extend('layout/l_home'); ?>
<?= $this->section('konten'); ?>
<div class="container mt-5 pt-5">
    <h1>Welcome to the Library</h1>
    <p>Explore our collection of books and categories. Use the search bar to find specific books.</p>
    
    <h2>Newly Added Books</h2>
    <div class="row">
        <?php foreach ($newBooks as $book): ?>
            <div class="col-lg-2 col-md-4 col-sm-6 d-flex align-items-stretch mb-4">
                <div class="card shadow-sm" style="width: 100%; height: 25rem;">
                    <img src="<?= base_url('cover/' . $book['cover']); ?>" class="card-img-top" alt="<?= $book['judul'] ?>" style="height: 12rem; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $book['judul'] ?></h5>
                        <p class="card-text"><?= $book['penulis'] ?></p>
                        <p class="card-text text-muted"><?= $book['penerbit'] ?>, <?= $book['tahun_terbit'] ?></p>
                        <div class="mt-auto">
                            <a href="#" class="btn btn-primary btn-block">Pinjam Buku</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>
