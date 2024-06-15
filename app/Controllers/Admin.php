<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'title' => 'Dashboard',
            'totalUsers' => $userModel->getTotalUsers(),
            'totalPustakawan' => $userModel->getTotalByRole('pustakawan'),
            'totalAdmin' => $userModel->getTotalByRole('admin'),
            'totalPengguna' => $userModel->getTotalByRole('pengguna')
        ];

        return view('dashboard/index', $data);
    }

    public function petugas()
    {
        $model = new \App\Models\UserModel();
        $users = $model->where('role', 'pustakawan')->findAll();

        $data = [
            'title' => 'Petugas',
            'users' => $users
        ];
        
        return view('dashboard/admin/petugas', $data);
    }

    public function tambah_petugas()
    {
        $data =[
            'title'=>'Tambah Petugas',
        ];
        
        return view('dashboard/admin/tambah_petugas', $data);
    }

    public function simpan_petugas()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique',
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
                'rules' => 'required|is_unique',
                'errors' => [
                    'required' => 'Nomor HP harus diisi.'
                ]
            ]
        ]);

        if ($validation->withRequest($this->request)->run() === FALSE) {
            session()->setFlashdata('pesan', 'Silahkan Isi Semua Data');
            return redirect()->back()->withInput();
        } else {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'role' => 'pustakawan' // Set role as 'pustakawan'
            ];

            $model = new \App\Models\UserModel();
            $model->insert($data);

            session()->setFlashdata('pesan2', 'Petugas berhasil ditambahkan');
            return redirect()->to('/admin/petugas');
        }
    }

    public function delete_petugas($id_users)
    {
        if ($this->userModel->deleteUser($id_users)) {
            session()->setFlashdata('pesan2', 'Petugas berhasil dihapus');
        } else {
            session()->setFlashdata('pesan', 'Gagal menghapus petugas');
        }
        return redirect()->to('/admin/petugas');
    }

    public function edit_petugas($id_users)
    {
        $data = [
            'title' => 'Edit Petugas',
            'user' => $this->userModel->find($id_users)
        ];
        return view('dashboard/admin/edit_petugas', $data);
    }

    public function update_petugas()
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
            return redirect()->to(base_url('admin/petugas/' . $id_users))->with('pesan2', 'Data petugas berhasil diupdate.');
        } else {
            return redirect()->to(base_url('admin/edit_petugas/' . $id_users))->with('pesan', 'Gagal mengupdate data petugas.');
        }
    }

    public function admin()
    {
        $model = new \App\Models\UserModel();
        $users = $model->where('role', 'admin')->findAll();

        $data = [
            'title' => 'Admin',
            'users' => $users
        ];
        return view('dashboard/admin/admin', $data);
    }

    public function tambah_admin()
    {
        $data =[
            'title'=>'Tambah Admin',
        ];
        
        return view('dashboard/admin/tambah_admin', $data);
    }

    public function simpan_admin()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.'
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
            session()->setFlashdata('pesan', 'Silahkan Isi Semua Data');
            return redirect()->back()->withInput();
        } else {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'no_hp' => $this->request->getPost('no_hp'),
                'role' => 'admin' // Set role as 'pustakawan'
            ];

            $model = new \App\Models\UserModel();
            $model->insert($data);

            session()->setFlashdata('pesan2', 'Petugas berhasil ditambahkan');
            return redirect()->to('/admin/admin');
        }
    }

    public function delete_admin($id_users)
    {
        if ($this->userModel->deleteUser($id_users)) {
            session()->setFlashdata('pesan2', 'Petugas berhasil dihapus');
        } else {
            session()->setFlashdata('pesan', 'Gagal menghapus petugas');
        }
        return redirect()->to('/admin/admin');
    }

    public function edit_admin($id_users)
    {
        $data = [
            'title' => 'Edit Admin',
            'user' => $this->userModel->find($id_users)
        ];
        return view('dashboard/admin/edit_admin', $data);
    }

    public function update_admin()
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
            return redirect()->to(base_url('admin/admin/' . $id_users))->with('pesan2', 'Data petugas berhasil diupdate.');
        } else {
            return redirect()->to(base_url('admin/edit_admin/' . $id_users))->with('pesan', 'Gagal mengupdate data petugas.');
        }
    }

    public function pengguna()
    {
        $model = new \App\Models\UserModel();
        $users = $model->where('role', 'pengguna')->findAll();

        $data = [
            'title' => 'Pengguna',
            'users' => $users
        ];
        return view('dashboard/admin/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        $data =[
            'title'=>'Tambah Pengguna',
        ];
        
        return view('dashboard/admin/tambah_pengguna', $data);
    }

    public function simpan_pengguna()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.'
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
            session()->setFlashdata('pesan', 'Silahkan Isi Semua Data');
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
            return redirect()->to('/admin/pengguna');
        }
    }

    public function delete_pengguna($id_users)
    {
        if ($this->userModel->deleteUser($id_users)) {
            session()->setFlashdata('pesan2', 'Petugas berhasil dihapus');
        } else {
            session()->setFlashdata('pesan', 'Gagal menghapus petugas');
        }
        return redirect()->to('/admin/pengguna');
    }

    public function edit_pengguna($id_users)
    {
        $data = [
            'title' => 'Edit Pengguna',
            'user' => $this->userModel->find($id_users)
        ];
        return view('dashboard/admin/edit_pengguna', $data);
    }

    public function update_pengguna()
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
    
        if ($userModel->updatePetugas($id_users, $data)) {
            return redirect()->to(base_url('admin/pengguna/' . $id_users))->with('pesan2', 'Data petugas berhasil diupdate.');
        } else {
            return redirect()->to(base_url('admin/edit_pengguna/' . $id_users))->with('pesan', 'Gagal mengupdate data petugas.');
        }
    }
}
