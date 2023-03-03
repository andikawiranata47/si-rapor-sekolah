<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterUserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'Id_User';
    protected $allowedFields = ['Email', 'Password', 'Nama', 'NIP', 'Akses'];

    public function getUser()
    {
        $query = $this->db->table('user')
            ->orderBy('Email')
            ->get();
        return $query;
    }
    // public function setHak($data)
    // {
    //     $query = $this->db->table('user')->insert('Hak_Akses', $data);
    //     return $query;
    // }

    public function saveUser($data)
    {
        $this->db->table('user')->insert($data);
        $insert = $this->db->insertID();
        return $insert;
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table('user')->update($data, array('Id_User' => $id));
        return $query;
    }

    public function deleteUser($id)
    {
        $query = $this->db->table('user')->delete(array('Id_User' => $id));
        return $query;
    }
}
