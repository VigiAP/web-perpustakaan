<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\DetailKategori;
use App\Models\UserModel;
use App\Models\PeminjamanModel;
use App\Models\DetailPeminjaman;


class Pustakawan extends BaseController
{
    protected $bukuModel;
    protected $kategoriModel;
    protected $detailKategori;
    protected $userModel;
    protected $peminjamanModel;
    protected $detailPeminjaman;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->kategoriModel = new KategoriModel();
        $this->detailKategori = new DetailKategori();
        $this->userModel = new UserModel();
        $this->peminjamanModel = new PeminjamanModel();
        $this->detailPeminjamanModel = new DetailPeminjaman();
    }

    public function index()
    {
        $data =[
            'title'=>'Dashboard',
        ];
        
        return view('dashboard/index', $data);
    }
    
    //buku start

    public function kelola_buku()
    {
        $result = $this->bukuModel->bukuPanelKonten();
        
        $data =[
            'title'=>'Kelola Buku',
            'buku' => $result
        ];
        
        return view('dashboard/pustakawan/kelola_buku', $data);
    }

    public function tambah_buku()
    {
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Tambah Buku',
            'kategori' => $kategori,
        ];
        return view('dashboard/pustakawan/tambah_buku', $data);
    }


    public function simpan_buku()
    {
        
        $validationRules = [
            'judul' => 'required|is_unique[buku.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'tahun_terbit' => 'required|numeric',
        ];

        $cover = $this->request->getFile('cover');

        
        if (!$this->validate($validationRules)) {
            return redirect()->to('pustakawan/tambah_buku')->with('pesan', "Jangan ada data yang kosong");
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'jumlah' => $this->request->getVar('jumlah'),
        ];

        if($cover && $cover->isValid() && !$cover->hasMoved()) {
            $cover->move('cover/'); // Pindahkan file ke folder public/cover
            $data['cover'] = $cover->getName(); // Simpan nama file ke database
        }

        $lasInsertID = $this->bukuModel->insert($data);

        $kategoriBuku = $this->request->getVar('kategori'); // Dapatkan kategori dari form
        
        $kategori = $this->kategoriModel->findAll();
        
        foreach ($kategori as $dataKategori){
            // Cek apakah buku termasuk dalam kategori ini
            if (in_array($dataKategori['id_kategori'], $kategoriBuku)) {
                $additionalData = [
                    'id_buku' => $lasInsertID,
                    'id_kategori' => $dataKategori['id_kategori'] // Ganti ini
                ];
                $this->detailKategori->save($additionalData);
            }
        }
        
        return redirect()->to('pustakawan/kelola_buku')->with('pesan2', 'Berhasil Menambah Data');
    }

    
    public function delete_buku($id_buku)
    {
        // Hapus data dari tabel detail_kategori terlebih dahulu
        $this->detailKategori->where('id_buku', $id_buku)->delete();

        // Kemudian hapus data dari tabel buku
        $this->bukuModel->delete($id_buku);

        return redirect()->to('pustakawan/kelola_buku');
    }
    

    public function edit_buku($id_buku)
    {
        $buku = $this->bukuModel->data_buku($id_buku);
        $kategori = $this->kategoriModel->findAll();
        $selectedKategoriIds = $this->detailKategori->getKategoriIdsByBukuId($id_buku);
        
        $data = [
            'title' => 'Edit',
            'buku' => $buku,
            'kategori' => $kategori,
            'selectedKategoriIds' => $selectedKategoriIds
        ];
        
        echo view('dashboard/pustakawan/edit_buku', $data);
    }

    public function update_buku()
    {
       
        $fileCover = $this->request->getFile('cover');

        $id_buku = $this->request->getVar('id_buku');

        if ($id_buku == null) {
            // Jika ya, kembalikan pesan error
            return 'Error: id_buku cannot be null';
        }

        
        if ($fileCover->isValid()) {
            $fileCover->move('cover/');
            $namaGambar = $fileCover->getName();
        } else {
            // Jika tidak, gunakan nama file yang sudah ada dalam database
            $buku = $this->bukuModel->data_buku($id_buku);
            $namaGambar = $buku['cover'];
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'jumlah' => $this->request->getVar('jumlah'),
            'cover' => $namaGambar
        ];

        $this->bukuModel->update_data($data, $id_buku);

        // Hapus genre yang sudah ada untuk anime tersebut
        $this->detailKategori->where('id_buku', $id_buku)->delete();

        // Tambahkan kembali genre yang baru dipilih
        $kategori = $this->request->getVar('kategori');

        foreach ($kategori as $dataKategori) {
            $additionalData = [
                'id_buku' => $id_buku,
                'id_kategori' => $dataKategori
            ];
            $this->detailKategori->save($additionalData);
        }

        return redirect()->to('pustakawan/kelola_buku')->with('success2', "Data berhasil diupdate");
    }

    // buku end

    // anggota start

    public function daftar_anggota()
    {
        $users = $this->userModel->where('role', 'pengguna')->findAll();
        $data = [
            'title' => 'Daftar Anggota',
            'users' => $users
        ];
        return view('dashboard/pustakawan/daftar_anggota', $data);
    }

    public function tambah_anggota()
    {
        $data =[
            'title'=>'Tambah Anggota',
        ];
        
        return view('dashboard/pustakawan/tambah_anggota', $data);
    }

    public function simpan_anggota()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
            'no_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor HP harus diisi.'
                ]
            ]
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            session()->setFlashdata('pesan', 'Silahkan Isi Semua Data dengan benar!');
            return redirect()->back()->withInput();
        } else {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'role' => 'pengguna' // Set role as 'pustakawan'
            ];

            $model = new \App\Models\UserModel();
            $model->insert($data);

            session()->setFlashdata('pesan2', 'Petugas berhasil ditambahkan');
            return redirect()->to('/pustakawan/daftar_anggota');
        }
    }

    public function edit_anggota($id_users) 
    {
        $anggota = $this->userModel->getUsersId($id_users);
        
        $data = [
            'title' => 'Edit Anggota',
            'user' => $this->userModel->find($id_users)
        ];
        
        echo view('dashboard/pustakawan/edit_anggota', $data);
    }

    public function update_anggota()
    {
        $userModel = new \App\Models\UserModel();
        $id_users = $this->request->getPost('id_users');
        $username = $this->request->getPost('username');
        $no_hp = $this->request->getPost('no_hp');

        // Validasi untuk memastikan bahwa username dan no_hp tidak kosong
        if (empty($username) || empty($no_hp)) {
            session()->setFlashdata('pesan', 'Username atau Nomor HP tidak boleh kosong.');
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $username,
            'no_hp' => $no_hp
        ];
    
        // Check if password is provided
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }
    
        if ($userModel->updateUser($id_users, $data)) {
            return redirect()->to(base_url('pustakawan/daftar_anggota/' . $id_users))->with('pesan2', 'Data anggota berhasil diupdate.');
        } else {
            return redirect()->to(base_url('pustakawan/edit_anggota/' . $id_users))->with('pesan', 'Gagal mengupdate data anggota.');
        }
    }

    public function delete_anggota($id_users)
    {
        if ($this->userModel->deleteUser($id_users)) {
            session()->setFlashdata('pesan2', 'Anggota berhasil dihapus');
        } else {
            session()->setFlashdata('pesan', 'Gagal menghapus anggota');
        }
        return redirect()->to('/pustakawan/daftar_anggota');
    }

    // anggota end

    // sirkulasi start

    public function sirkulasi()
    {
        $result = $this->peminjamanModel->sirkulasiPeminjaman();

        $data = [
            'title' => 'Sirkulasi Buku',
            'sirkulasi' => $result
        ];

        return view('dashboard/pustakawan/sirkulasi', $data);
    }

    // sirkulasi end

    // laporan start

    public function laporan()
    {
        $result = $this->bukuModel->bukuPanelKonten();

        $data = [
            'title' => 'Laporan',
            'buku' => $result
        ];


        return view('dashboard/pustakawan/laporan', $data);
    }

    // laporan end
}