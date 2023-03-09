<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiPrakerinModel extends Model
{
    // protected $table = 'nilai_prakerin';
    // protected $primaryKey = 'Id_Nilai_Prakerin';

    public function getNilaiPrakerin()
    {
        $query = $this->db->table('nilai_prakerin')
            ->join('siswa', 'nilai_prakerin.Id_Siswa = siswa.Id_Siswa', 'left')
            ->get();
        return $query;
    }

    public function getPilihKelas($guru, $semester, $tahun)
    {
        $query = $this->db->table('nilai_prakerin')
            ->join('siswa', 'nilai_prakerin.Id_Siswa = siswa.Id_Siswa', 'left')
            ->where('nilai_prakerin.Guru_Monitoring', $guru)
            ->where('nilai_prakerin.Semester', $semester)
            ->where('nilai_prakerin.Tahun_Ajaran', $tahun)
            ->get();
        return $query;
    }



    public function saveNilaiPrakerin($data)
    {
        $query = $this->db->table('nilai_prakerin')->insert($data);
        return $query;
    }

    public function editNilaiPrakerin($data, $id)
    {
        $query = $this->db->table('nilai_prakerin')->update($data, array('Id_Nilai_Prakerin' => $id));
        return $query;
    }

    public function deleteNilaiPrakerin($id)
    {
        $query = $this->db->table('nilai_prakerin')->delete(array('Id_Nilai_Prakerin' => $id));
        return $query;
    }
}
