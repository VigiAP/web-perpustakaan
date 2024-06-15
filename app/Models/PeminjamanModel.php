<?php 

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';

    protected $allowedFields = ['jatuh_tempo', 'denda'];
    protected $useTimestamps = true;

    public function getPeminjaman()
    {
        return $this->findAll();
    }

    public function sirkulasiPeminjaman()
    {
        return $this->db->table('peminjaman a')
            ->select('a.id_peminjaman, a.created_at, a.updated_at, a.denda, GROUP_CONCAT(dp.id_buku) AS id_buku, GROUP_CONCAT(b.judul) AS judul, GROUP_CONCAT(dp.id_users) AS id_user, GROUP_CONCAT(u.username) AS peminjam')
            ->join('detail_peminjaman dp', 'a.id_peminjaman = dp.id_peminjaman')
            ->join('buku b', 'dp.id_buku = b.id_buku')
            ->join('users u', 'dp.id_users = u.id_users')
            ->groupBy('a.id_peminjaman')
            ->OrderBy('a.created_at', 'DESC')
            ->get()
            ->getResult();
    }

    public function laporanPeminjaman()
    {
        return $this->db->table('peminjaman a')
            ->select('a.id_peminjaman, a.created_at, a.jatuh_tempo, a.updated_at, a.denda, GROUP_CONCAT(dp.id_buku) AS id_buku, GROUP_CONCAT(b.judul) AS judul, GROUP_CONCAT(dp.id_users) AS id_user, GROUP_CONCAT(u.username) AS peminjam')
            ->join('detail_peminjaman dp', 'a.id_peminjaman = dp.id_peminjaman')
            ->join('buku b', 'dp.id_buku = b.id_buku')
            ->join('users u', 'dp.id_users = u.id_users')
            ->groupBy('a.id_peminjaman')
            ->OrderBy('a.created_at', 'DESC')
            ->get()
            ->getResult();
    }
}