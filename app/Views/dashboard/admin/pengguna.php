<?php $this->extend('layout/l_dashboard'); ?>

<?php $this->section('konten'); ?>


<section class="content">
    <?php if (session()->get('role') == 'admin'): ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin</h1>
                </div>
                <?php if (session()->getFlashdata('pesan2')): ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan2'); ?>
                            </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pengguna</h3>
                        <a href="<?= base_url('admin/tambah_pengguna') ?>" class="btn btn-primary float-right">Tambah Pengguna</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <table id="petugasTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>No HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user['username']; ?></td>
                                        <td>
                                            <span class="password" title="<?= $user['password']; ?>">********</span>
                                        </td>
                                        <td><?= $user['no_hp']; ?></td>
                                        <td>
                                            <a href="<?= base_url('/admin/edit_pengguna/' . $user['id_users']); ?>" class="btn btn-info btn-sm"><i class="nav-icon fa fa-pencil"></i> Edit</a>
                                            <a href="<?= base_url('/admin/delete_pengguna/' . $user['id_users']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><i class="nav-icon fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <script>
        document.querySelectorAll('.password').forEach(item => {
            item.addEventListener('mouseover', event => {
                item.textContent = item.getAttribute('title');
            });
            item.addEventListener('mouseout', event => {
                item.textContent = '********';
            });
        });
    </script>

    <?php endif; ?>
</section>


<?php $this->endSection(); ?>