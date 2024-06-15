<?php

namespace App\Controllers;

use App\Models\UserModel;

class Accounts extends BaseController
{

    protected $userModel;
    protected $session;
    protected $validation;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $data = [
            'title'=> 'Login | Perpustakaan Online',
        ];

        return view('account/index', $data);
    }

    public function login()
    {
        if($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
                ],
        ])){
            $username = $this->request->getPost('username'); 
            $password = $this->request->getPost('password'); 

            
            $cek = $this->userModel->login($username, $password);

            
            if ($cek){
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('role', $cek['role']);
                
                if ($cek['role'] === 'admin') {
                    return redirect()->to(base_url('admin'));
                } elseif($cek['role'] === 'pustakawan'){
                    return redirect()->to(base_url('pustakawan'));
                }else{
                    return redirect()->to(base_url('pengguna/home'));
                }
                
            }else{
                session()->setFlashdata('pesan', 'Login Gagal, Username atau Password tidak cocok');
                return redirect()->to(base_url('accounts'));
            }
        } else{
            session()->setFlashdata('pesan', 'Silahkan Isi Username dan Password Anda!!');
            return redirect()->to(base_url('accounts/'));
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Register | Perpustakaan Online',
        ];
        return view('account/register', $data);
    }

    public function registerPost()
    {
        $userModel = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $no_hp = $this->request->getVar('no_hp');
        $role = 'pengguna';  // Role otomatis 'pengguna'

        // Validasi untuk memastikan semua data diisi
        if (empty($username) || empty($password) || empty($no_hp)) {
            session()->setFlashdata('pesan', 'Semua data harus diisi.');
            return redirect()->back();
        }

        $data = [
            'username' => $username,
            'password' => $password,
            'no_hp'    => $no_hp,
            'role'     => $role
        ];
        
        $userModel->save($data);
        session()->setFlashdata('pesan2', 'Akun berhasil dibuat, Silahkan Login');
        return redirect()->to('accounts');
    }

public function logout()
{
    session()->remove('log');
    session()->remove('username');
    session()->remove('role');
    session()->setFlashdata('pesan2', 'Anda Telah Logout');
    return redirect()->to('accounts');
}
}
