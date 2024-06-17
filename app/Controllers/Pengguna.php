<?php

namespace App\Controllers;

use App\Models\BookmarkModel;
use App\Models\BukuModel;
use App\Models\UserModel;
use App\Models\DetailKategori;
use App\Models\KategoriModel;
use App\Models\DetailPeminjaman;
use App\Models\PeminjamanModel;
use PHPUnit\Framework\EmptyStringException;

class Pengguna extends BaseController
{
    protected $bookmarkModel;
    protected $bukuModel;
    protected $userModel;
    protected $detailKategori;
    protected $kategoriModel;
    protected $detailPeminjaman;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->bookmarkModel = new BookmarkModel();
        $this->bukuModel = new BukuModel();
        $this->userModel = new UserModel();
        $this->detailKategori = new DetailKategori();
        $this->kategoriModel = new KategoriModel();
        $this->detailPeminjaman = new DetailPeminjaman();
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
    
        $data = [
            'title'=>'Dashboard',
            // Data lain yang diperlukan
        ];

        return view('dashboard/index', $data);
    }

    public function layanan()
    {
        $data = [
            'title' => 'Layanan'
        ];

        return view('dashboard/pengguna/layanan', $data);
    }

    // bagian home

    public function home()
    {
        // Ambil data buku yang baru ditambahkan
        $newBooks = $this->bukuModel->orderBy('created_at', 'DESC')->findAll(10); // Misalnya ambil 10 buku terbaru
        
        // Ambil data kategori untuk setiap buku
        foreach ($newBooks as &$book) {
            $detailKategoris = $this->detailKategori->where('id_buku', $book['id_buku'])->findAll();
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

    public function contact()
    {
        $data = [
            'title'=>'Contact',
        ];

        return view('/home/contact', $data);
    }

    public function search()
    {
        $searchKeyword = $this->request->getPost('search_keyword');

        if(!empty($searchKeyword)){
            $searchResults = $this->bukuModel->searchBuku($searchKeyword);

            $data = [
                'title' => 'Search Result',
                'searchResults' => $searchResults,
                'searchKeyword' => $searchKeyword
            ];
            return view('home/hasil_pencarian', $data);

        } else{
            return redirect()->to('pengguna/home')->with('error', 'gagal mencari atau data tidak ada');
        }
    }

    public function bukuid($id_buku)
    {
        $buku = $this->bukuModel->find($id_buku);
    
        if (!$buku) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Buku dengan ID {$id_buku} tidak ditemukan.");
        }
    
        $kategori = $this->detailKategori->getKategoriByBukuId($id_buku);
    
        if (!empty($kategori)) {
            $kategoriValue = array_column($kategori, 'nama_kategori');
            $buku['kategori'] = implode(',', $kategoriValue);
        } else {
            $buku['kategori'] = 'tidak ada kategori';
        }
    
        $data = [
            'title' => "Detail Buku {$buku['judul']}",
            'buku' => $buku, // Mengirimkan sebagai objek tunggal
        ];
        return view('home/detail_buku', $data);
    }

    public function detail_buku($id_buku)
    {
        $buku = $this->bukuModel->find($id_buku);
    
        if (!$buku) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Buku dengan ID {$id_buku} tidak ditemukan.");
        }
    
        $kategori = $this->detailKategori->getKategoriByBukuId($id_buku);
    
        if (!empty($kategori)) {
            $kategoriValue = array_column($kategori, 'nama_kategori');
            $buku['kategori'] = implode(',', $kategoriValue);
        } else {
            $buku['kategori'] = 'tidak ada kategori';
        }
    
        $data = [
            'title' => "Detail Buku {$buku['judul']}",
            'buku' => $buku, // Mengirimkan sebagai objek tunggal
        ];
        return view('dashboard/pengguna/detail_buku', $data);
    }

    // dashboard

    public function peminjaman()
    {
        $userId = session()->get('id_users');
        $listPeminjaman = $this->peminjamanModel->laporanPeminjaman();

        $data = [
            'title' => 'Peminjaman Buku',
            'lists' => $listPeminjaman
        ];

        return view('dashboard/pengguna/peminjaman', $data);
    }

    public function pengembalian()
    {
        $userId = session()->get('id_users');
        $listPeminjaman = $this->peminjamanModel->laporanPeminjaman();

        $data = [
            'title' => 'Pengembalian Buku',
            'lists' => $listPeminjaman
        ];

        return view('dashboard/pengguna/pengembalian', $data);
    }
}
