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
}
