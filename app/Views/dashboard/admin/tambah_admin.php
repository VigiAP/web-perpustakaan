<?php $this->extend('layout/l_dashboard'); ?>
<?php $this->section('konten'); ?>

<section class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('admin/simpan_admin') ?>" method="post">
                    <?php if (session()->getFlashdata('pesan')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>


<?php $this->endSection(); ?>