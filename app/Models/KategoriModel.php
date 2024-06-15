<?php namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $allowedFields = ['nama_kategori'];


    public function get_kategori()
    {
        return $this->findAll();
    }

    public function data_kategori($id_kategori)
    {
        return $this->find($id_kategori);
    }

    public function delete_data($id_kategori)
    {
        // Hapus semua entri di tabel detail_kategori yang merujuk ke kategori ini
        $this->db->table('detail_kategori')->where('id_kategori', $id_kategori)->delete();

        // Sekarang Anda dapat menghapus kategori dari tabel kategori
        $query = $this->db->table($this->table)->delete(array('id_kategori' => $id_kategori));

        return $query;
    }

    public function update_data($data, $id_kategori)
    {
        $query = $this->db->table($this->table)->update($data, array('id_kategori' => $id_kategori));
        return $query;
    }

    public function short_kategori()
    {
        return $this->orderBy('id_kategori', 'DESC')->findAll();
    }

 

}