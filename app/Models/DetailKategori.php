<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKategori extends Model
{
    protected $table = "detail_kategori";
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['id_buku', 'id_kategori'];

    public function data_detail($id_detail)
    {
        return $this->find($id_detail);
    }

    public function delete_data($id_detail)
    {
        $query = $this->db->table($this->table)->delete(array('id_detail' => $id_detail));
        return $query;
    }

    public function getKategoriIdsByBukuId($id_buku)
    {
        return $this->select('id_kategori')->where('id_buku', $id_buku)->findAll();
    }

    public function update_data($data, $id_detail)
    {
        $query = $this->db->table($this->table)->update($data, array('id_detail' => $id_detail));
        return $query;
    }

    public function getKategoriByBukuId($id_buku)
    {
        $builder = $this->db->table('detail_kategori dk');
        $builder->select('k.nama_kategori');
        $builder->join('kategori k', 'dk.id_kategori = k.id_kategori');
        $builder->where('dk.id_buku', $id_buku);

        return $builder->get()->getResultArray();
    }
}
