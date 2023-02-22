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
        ->join('siswa', 'nilai_ekstrakurikuler.NIS = siswa.NIS')
        ->get();
        return $query;
    }
}
