<?php $this->extend('layout/l_home'); ?>
<?= $this->section('konten'); ?>


<div class="container" style="margin-top: 100px;">
    <section>
        <div class="d-flex justify-content-center flex-column">
            <div class="row g-3">
                <?php
                foreach ($groupedBuku as $letter => $judul) { ?>
                    <div class="col-md-6">
                        <div class="bg-dark text-white p-3 rounded">
                            <h1><?= $letter; ?></h1>
                            <hr class="bg-danger border-2 border-top">
                            <ul class="list-unstyled">
                                <?php foreach ($judul as $jud) { ?>
                                    <li><a class="text-decoration-none text-white" href="<?= base_url('pengguna/lihat_buku/' . $jud['id_buku']); ?>"><?= $jud['judul']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>