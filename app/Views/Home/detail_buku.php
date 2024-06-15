<?php $this->extend('layout/l_home'); ?>

<?php $this->section('konten'); ?>

<div style="display: flex; border: 1px solid green; padding: 10px; margin-top:80px;">
    <div style="flex: 1;">
        <img src="<?= base_url('cover/' . $buku['cover']); ?>" alt="Cover Buku" style="width: 500px; height: 500px;">
    </div>
    <div style="flex: 2; padding-left: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="border-bottom: 1px solid green; padding: 5px;">Judul Buku</td>
                <td style="border-bottom: 1px solid green; padding: 5px;">: <?= $buku['judul']; ?></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid green; padding: 5px;">Penulis</td>
                <td style="border-bottom: 1px solid green; padding: 5px;">: <?= $buku['penulis']; ?></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid green; padding: 5px;">Penerbit</td>
                <td style="border-bottom: 1px solid green; padding: 5px;">: <?= $buku['penerbit']; ?></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid green; padding: 5px;">Kategori</td>
                <td style="border-bottom: 1px solid green; padding: 5px;">: <?= $buku['kategori']; ?></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid green; padding: 5px;">Tahun Terbit</td>
                <td style="border-bottom: 1px solid green; padding: 5px;">: <?= $buku['tahun_terbit']; ?></td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid green; padding: 5px;">Stok Buku</td>
                <td style="border-bottom: 1px solid green; padding: 5px;">: <?= $buku['jumlah']; ?></td>
            </tr>
        </table>
        <div style="margin-top: 20px;">
            <button style="background-color: blue; color: white; padding: 10px; border: none; cursor: pointer;">
                <i class="fa fa-book"></i> Pinjam Buku
            </button>
            <button style="background-color: orange; color: white; padding: 10px; border: none; cursor: pointer; margin-left: 10px;">
                <i class="fa fa-plus"></i> Tambah ke Koleksi
            </button>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>