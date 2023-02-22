<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiMataPelajaranModel extends Model
{
    protected $table = 'nilai_mata_pelajaran';
    protected $primaryKey = 'Id_Nilai_Mata_Pelajaran';
    protected $allowedFields = ['NIS', 'Id_Mata_Pelajaran', 'Jenis_Nilai', 'Nilai_UH', 'Nilai_UTS', 'Nilai_UAS', 'Nilai_Akhir'];

    public function getNilaiMapel()
    {
        $query = $this->db->table('nilai_mata_pelajaran')
        ->join('siswa', 'nilai_mata_pelajaran.NIS = siswa.NIS')
        ->join('mata_pelajaran', 'mata_pelajaran.Id_Mata_Pelajaran = nilai_mata_pelajaran.Id_Mata_Pelajaran')
        ->get();
        return $query;
    }

    public function saveNilaiMapel($data){
        $query = $this->db->table('nilai_mata_pelajaran')->insert($data);
        return $query;
    }
 
    public function updateNilaiMapel($data, $id)
    {
        $query = $this->db->table('nilai_mata_pelajaran')->update($data, array('Id_Nilai_Mata_Pelajaran' => $id));
        return $query;
    }
 
    public function deleteNilaiMapel($id)
    {
        $query = $this->db->table('nilai_mata_pelajaran')->delete(array('Id_Nilai_Mata_Pelajaran' => $id));
        return $query;
    } 
}
