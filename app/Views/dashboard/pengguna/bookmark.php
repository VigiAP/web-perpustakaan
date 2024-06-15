<?= $this->extend('layout/l_dashboard'); ?>

<?= $this->section('konten'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Buku yang Di-Bookmark</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="bookmarkTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($bookmarks)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($bookmarks as $bookmark): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $bookmark['judul_buku']; ?></td>
                                    <td><?= $bookmark['penulis']; ?></td>
                                    <td>
                                        <a href="<?= base_url('bookmark/remove/' . $bookmark['id']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada buku yang di-bookmark</td>
                            </tr>
                        <?php endif; ?>

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
<!-- /.container -->

<?= $this->endSection(); ?>