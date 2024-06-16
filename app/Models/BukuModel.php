<?php namespace App\Models;

use CodeIgniter\Model;
use PharIo\Version\BuildMetaData;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit', 'jumlah', 'cover'];
    protected $useTimestamps = true;

    public function data_buku($id_buku)
    {
        return $this->find($id_buku);
    }

    public function delete_buku($id_buku)
    {
        $query = $this->db->table($this->table)->delete(array('id_buku' => $id_buku));
        return $query;
    }

    public function bukuPanelKonten()
    {
        return $this->db->table('buku a')
            ->select('a.id_buku, a.judul, a.penulis, a.penerbit, a.tahun_terbit, GROUP_CONCAT(k.nama_kategori) AS kategoris, a.jumlah, a.created_at, a.cover') 
            ->join('detail_kategori d', 'a.id_buku = d.id_buku')
            ->join('kategori k', 'd.id_kategori = k.id_kategori')
            ->groupBy('a.id_buku')
            ->orderBy('a.created_at', 'DESC')
            ->get()
            ->getResult();
    }

    public function update_data($data, $id_buku)
    {
        $query = $this->db->table($this->table)->update($data, array('id_buku' => $id_buku));
        return $query;
    }

    public function getListBuku()
    {
        return $this->db->table('buku b')
            ->select('b.judul AS judul, b.id_buku')
            ->orderBy('judul', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function searchBuku($keyword)
    {
        return $this->like('judul', $keyword)->findAll();
    }

    public function getBukuInfo()
    {
        return $this->db->table('buku b')
            ->select('b.*, GROUP_CONCAT(k.nama_kategori) AS kategori')
            ->join('detail_kategori dk', 'b.id_buku = dk.id_buku', 'left')
            ->join('kategori k', 'dk.id_kategori = k.id_kategori', 'left')
            ->groupBy('b.id_buku')
            ->get()
            ->getResultArray();
    }


    public function getTotalBuku()
    {
        return $this->countAllResults();
    }

}