<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $allowedFields = ['username', 'password', 'no_hp', 'role', 'foto'];

    public function getDataUsers($username = false)
    {
        $builder = $this->db->table($this->table); // Inisialisasi builder dengan table yang benar

        if ($username === false) {
            return $builder->orderBy('id_users', 'DESC')->get()->getResultArray();
        }
        return $builder->where('username', $username)->get()->getResultArray();
    }

    public function login($username, $password)
    {
        return $this->db->table('users')->where([
            'username'=>$username,
            'password'=>$password,
        ])->get()->getRowArray();
    }

    public function deleteUser($id_users)
    {
        return $this->db->table($this->table)->delete(['id_users' => $id_users]);
    }

    public function updateUser($id_users, $data)
    {
        return $this->update($id_users, $data);
    }

    public function getTotalUsers()
    {
        return $this->countAllResults();
    }

    public function getTotalByRole($role)
    {
        return $this->where('role', $role)->countAllResults();
    }

    public function getUsersId($id_users)
    {
        return $this->find($id_users);
    }

    public function getTotalPengguna()
    {
        return $this->where('role', 'pengguna')->countAllResults();
    }
}