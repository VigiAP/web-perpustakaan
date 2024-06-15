<?php $this->extend('layout/l_home'); ?>

<?php $this->section('konten'); ?>

<div class="container" style="margin-top: 100px;">
    <section>

        <div class="d-flex justify-content-center flex-column">
            <div class="row gap-0 row-gap-3 column-gap-5">

                <?php foreach ($groupedByKategori as $kategori => $bukuList): ?>
                <div class="col-5 bg-dark text-white p-3 rounded">
                    <div class="col">
                        <h1 style="color: white;"><?= $kategori; ?></h1>
                        <hr class="bg-danger border-2 border-top border-white" />
                        <ul>
                            <?php foreach ($bukuList as $buku): ?>
                            <li style="color:white;">
                                <a class="text-decoration-none text-white"
                                    href="<?= base_url('streaming/' . $buku['id_buku']); ?>">
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