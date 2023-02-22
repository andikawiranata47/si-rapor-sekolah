<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
    protected $allowedFields = ['NIS', 'Nama', 'Tanggal_Masuk', 'Nama_Orangtua', 'Alamat'];

    public function getSiswa()
    {
        $query = $this->db->table('siswa')
            // ->join('kelas', 'kelas.Id_Kelas = siswa.Id_Kelas')
            ->get();
        return $query;
    }

    public function saveSiswa($data){
        $query = $this->db->table('siswa')->insert($data);
        return $query;
    }
 
    public function updateSiswa($data, $id)
    {
        $query = $this->db->table('siswa')->update($data, array('NIS' => $id));
        return $query;
    }
 
    public function deleteSiswa($id)
    {
        $query = $this->db->table('siswa')->delete(array('NIS' => $id));
        return $query;
    } 
}
