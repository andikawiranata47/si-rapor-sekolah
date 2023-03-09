<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiEkstrakurikulerModel extends Model
{
    // protected $table = 'nilai_ekstrakurikuler';
    // protected $primaryKey = 'Id_Nilai_Ekstrakurikuler';

    public function getNilaiEkstra()
    {
        $query = $this->db->table('nilai_ekstrakurikuler')
        ->join('siswa', 'nilai_ekstrakurikuler.Id_Siswa = siswa.Id_Siswa', 'left')
        ->get();
        return $query;
    }

    public function getPilihKelas($guru, $semester, $tahun)
    {
        $query = $this->db->table('nilai_ekstrakurikuler')
            ->join('siswa', 'nilai_ekstrakurikuler.Id_Siswa = siswa.Id_Siswa', 'left')
            ->where('nilai_ekstrakurikuler.Pembina', $guru)
            ->where('nilai_ekstrakurikuler.Semester', $semester)
            ->where('nilai_ekstrakurikuler.Tahun_Ajaran', $tahun)
            ->get();
        return $query;
    }

    public function saveNilaiEkstra($data)
    {
        $query = $this->db->table('nilai_ekstrakurikuler')->insert($data);
        return $query;
    }

    public function editNilaiEkstra($data, $id)
    {
        $query = $this->db->table('nilai_ekstrakurikuler')->update($data, array('Id_Nilai_Ekstrakurikuler' => $id));
        return $query;
    }

    public function deleteNilaiEkstra($id)
    {
        $query = $this->db->table('nilai_ekstrakurikuler')->delete(array('Id_Nilai_Ekstrakurikuler' => $id));
        return $query;
    }
}
