<?php

namespace App\Controllers;

use App\Models\BookmarkModel;
use App\Models\BukuModel;
use App\Models\UserModel;
use App\Models\DetailKategori;
use App\Models\KategoriModel;

class Pengguna extends BaseController
{
    protected $bookmarkModel;
    protected $bukuModel;
    protected $userModel;
    protected $detailKategoriModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->bookmarkModel = new BookmarkModel();
        $this->bukuModel = new BukuModel();
        $this->userModel = new UserModel();
        $this->detailKategoriModel = new DetailKategori();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data =[
            'title'=>'Dashboard',
        ];
        
        return view('dashboard/index', $data);
    }

    public function home()
    {
        // Ambil data buku yang baru ditambahkan
        $newBooks = $this->bukuModel->orderBy('created_at', 'DESC')->findAll(10); // Misalnya ambil 10 buku terbaru
        
        // Ambil data kategori untuk setiap buku
        foreach ($newBooks as &$book) {
            $detailKategoris = $this->detailKategoriModel->where('id_buku', $book['id_buku'])->findAll();
            $kategoriNames = [];
            foreach ($detailKategoris as $detail) {
                $kategori = $this->kategoriModel->find($detail['id_kategori']);
                if ($kategori) {
                    $kategoriNames[] = $kategori['nama_kategori'];
                }
            }
            $book['kategoris'] = $kategoriNames;
        }
        
        // Kirim data ke view
        return view('home/index', [
            'newBooks' => $newBooks
        ]);
    }

    public function list_buku()
    {
        $result = $this->bukuModel->getListBuku();
        
        $groupedBuku = [];

        foreach ($result as $judul){
            $firstLetter = strtoupper(substr($judul['judul'], 0, 1));

            $groupedBuku[$firstLetter][] = $judul;
        }

        $data =[
            'title'=>'List Buku',
            'groupedBuku' => $groupedBuku,
        ];
        return view('home/list_buku', $data);
    }


    public function list_kategori()
    {
        $data_kategori = $this->kategoriModel->get_kategori();

        $builder = $this->bukuModel->db->table('buku b');
        $builder->select('k.nama_kategori as kategori, b.judul as judul, b.id_buku');
        $builder->join('detail_kategori dk', 'b.id_buku = dk.id_buku');
        $builder->join('kategori k', 'dk.id_kategori = k.id_kategori');

        $result = $builder->get()->getResultArray();

        // Mengelompokkan buku berdasarkan kategori
        $groupedByKategori = [];
        foreach ($result as $row) {
            $kategori = $row['kategori'];
            if (!isset($groupedByKategori[$kategori])) {
                $groupedByKategori[$kategori] = [];
            }
            $groupedByKategori[$kategori][] = $row;
        }

        $data = [
            'title' => 'List Kategori',
            'groupedByKategori' => $groupedByKategori,
            'kategori' => $data_kategori
        ];

        return view('home/list_kategori', $data);
    }
}
