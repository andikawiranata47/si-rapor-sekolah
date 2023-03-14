<?php

namespace App\Models;

use CodeIgniter\Model;

class MataPelajaranKelasModel extends Model
{
    protected $table = 'mata_pelajaran_suatu_kelas';
    protected $primaryKey = 'Id_Mapel_Kelas';
    protected $allowedFields = ['Id_Kelas', 'Id_Mata_Pelajaran'];

    public function getMapelKelas()
    {
        $query = $this->db->table('mata_pelajaran_suatu_kelas')
            ->join('mata_pelajaran', 'mata_pelajaran_suatu_kelas.Id_Mata_Pelajaran = mata_pelajaran.Id_Mata_Pelajaran', 'left')
            ->join('kelas', 'mata_pelajaran_suatu_kelas.Id_Kelas = kelas.Id_Kelas', 'left')
            // ->join('user', 'mata_pelajaran_suatu_kelas.Guru_Mapel = user.Id_User', 'left')
            ->get();
        return $query;
    }

    public function getPilihKelas($id)
    {
        $query = $this->db->table('mata_pelajaran_suatu_kelas')
            ->where('mata_pelajaran_suatu_kelas.Id_Kelas', $id)
            ->join('mata_pelajaran', 'mata_pelajaran_suatu_kelas.Id_Mata_Pelajaran = mata_pelajaran.Id_Mata_Pelajaran', 'left')
            ->join('kelas', 'mata_pelajaran_suatu_kelas.Id_Kelas = kelas.Id_Kelas', 'left')
            // ->join('user', 'mata_pelajaran_suatu_kelas.Guru_Mapel = user.Id_User', 'left')
            ->get();
        return $query;
    }

    public function saveMapelKelas($data)
    {
        $query = $this->db->table('mata_pelajaran_suatu_kelas')->insert($data);
        return $query;
    }

    public function updateMapelKelas($data, $id)
    {
        $query = $this->db->table('mata_pelajaran_suatu_kelas')->update($data, array('Id_Mapel_Kelas' => $id));
        return $query;
    }

    public function deleteMapelKelas($id)
    {
        $query = $this->db->table('mata_pelajaran_suatu_kelas')->delete(array('Id_Mapel_Kelas' => $id));
        return $query;
    }
}
