<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaKelasModel extends Model
{

    public function getSiswaKelas()
    {
        $query = $this->db->table('siswa')
            ->join('kelas', 'kelas.Id_Kelas = siswa.Id_Kelas', 'left')
            ->get();
        return $query;
    }

    public function getPilihKelas($id)
    {
        $query = $this->db->table('siswa')
            ->where('siswa.Id_Kelas', $id)
            ->join('kelas', 'kelas.Id_Kelas = siswa.Id_Kelas', 'left')
            ->get();
        return $query;
    }

    // public function saveSiswaKelas($data)
    // {
    //     $query = $this->db->table('siswa')->insert($data);
    //     return $query;
    // }

    public function updateSiswaKelas($data, $id)
    {
        $query = $this->db->table('siswa')->update($data, array('Id_Siswa' => $id));
        return $query;
    }

    // public function deleteSiswaKelas($data, $id)
    // {
    //     $query = $this->db->table('siswa')->update($data, array('Id_Siswa' => $id));
    //     return $query;
    // }
}
