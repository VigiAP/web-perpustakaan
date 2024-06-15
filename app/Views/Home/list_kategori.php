<?php $this->extend('layout/l_home'); ?>

<?php $this->section('konten'); ?>

<div class="container" style="margin-top: 100px;">
    <section>
        <div class="d-flex justify-content-center flex-column">
            <div class="row gap-3">
                <?php foreach ($groupedByKategori as $kategori => $bukuList): ?>
                <div class="col-md-5 bg-dark text-white p-4 rounded shadow-sm">
                    <div class="col">
                        <h2 class="text-white"><?= $kategori; ?></h2>
                        <hr class="bg-danger border-2 border-top border-white" />
                        <ul class="list-unstyled">
                            <?php foreach ($bukuList as $buku): ?>
                            <li class="mb-2">
                                <a class="text-decoration-none text-white"
                                    href="<?= base_url('pengguna/bukuid/' . $buku['id_buku']); ?>">
                                    <?= $buku['judul']; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection(); ?>