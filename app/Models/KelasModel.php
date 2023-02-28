<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    // protected $table = 'kelas';
    // protected $primaryKey = 'Id_Kelas';
    // protected $allowedFields = ['Wali_Kelas', 'Tingkat', 'Jurusan', 'Abjad'];

    // public function getKelas()
    // {
    //     $query = $this->db->table('kelas')
    //         ->orderBy('tingkat')
    //         ->get();
    //     return $query;
    // }

    public function getKelas()
    {
        $query = $this->db->table('kelas')//->select('kelas.Kelas', 'user.Nama', 'kelas.Wali_Kelas')
            ->join('user', 'user.Id_User = kelas.Wali_Kelas', 'left')
            ->orderBy('tingkat')
            ->get();
        return $query;
    }

    public function saveKelas($data)
    {
        $query = $this->db->table('kelas')->insert($data);
        return $query;
    }

    public function updateKelas($data, $id)
    {
        $query = $this->db->table('kelas')->update($data, array('Id_Kelas' => $id));
        return $query;
    }

    public function deleteKelas($id)
    {
        $query = $this->db->table('kelas')->delete(array('Id_Kelas' => $id));
        return $query;
    }
}
