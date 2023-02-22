<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaKelasModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
    protected $allowedFields = ['Id_Kelas'];

    // public function getSiswaKelas()
    // {
    //     if ($this->db->fieldExists('Id_Kelas', 'siswa')) {
    //         $query = $this->db->table('siswa')
    //             ->join('kelas', 'kelas.Id_Kelas = siswa.Id_Kelas')
    //             ->get();
    //         return $query;
    //     } else {
    //         $query = $this->db->table('siswa')
    //             ->get();
    //         return $query;
    //     }
    // }
    public function getSiswaKelas()
    {
        $query = $this->db->table('siswa')
            ->join('kelas', 'kelas.Id_Kelas = siswa.Id_Kelas')
            ->get();
        return $query;
    }

    public function saveSiswaKelas($data)
    {
        $query = $this->db->table('siswa')->insert($data);
        return $query;
    }

    public function updateSiswaKelas($data, $id)
    {
        $query = $this->db->table('siswa')->update($data, array('NIS' => $id));
        return $query;
    }

    public function deleteSiswaKelas($id)
    {
        $query = $this->db->table('siswa')->delete(array('NIS' => $id));
        return $query;
    }
}
