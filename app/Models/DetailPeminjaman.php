<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPeminjaman extends Model
{
    protected $table = "detail_peminjaman";
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_buku', 'id_peminjaman', 'id_users'];

    public function getDetailPeminjaman()
    {
        return $this->findAll();
    }

}

