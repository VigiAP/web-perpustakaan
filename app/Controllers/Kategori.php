<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\DetailKategori;


class Kategori extends BaseController
{
    protected $bukuModel;
    protected $kategoriModel;
    protected $detailKategori;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->detailKategori = new DetailKategori();
    }

    public function index()
    {

        $kategori = $this->kategoriModel->short_kategori();

        $data =[
            'title' =>'Tambah Kategori',
            'kategori' => $kategori,
        ];
        
        return view('dashboard/pustakawan/tambah_kategori', $data);
    }


    public function simpan_kategori()
    {
        $validationRules = [
            'kategori' => 'required|is_unique[kategori.nama_kategori]',
        ];


        if (!$this->validate($validationRules)) {
            return redirect()->to('kategori/')->with('pesan', "Note : Jangan ada data yang sama atau kosong");
        }

        $data = [
            'nama_kategori' => $this->request->getVar('kategori'),
        ];

        $this->kategoriModel->insert($data);

        return redirect()->to('kategori')->with('pesan2', 'Data Tersimpan!');
    }

    public function delete_kategori($id_kategori)
    {
        $this->kategoriModel->delete_data($id_kategori);
        return redirect()->to('kategori')->with('pesan2', 'Kategori Telah Dihapus');
    }

}