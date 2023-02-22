<?php

namespace App\Models;

use CodeIgniter\Model;

class KepribadianKehadiranModel extends Model
{
    // protected $table = 'kehadiran';
    // protected $primaryKey = 'Id_Kehadiran';

    public function getKepriKeha()
    {
        $query = $this->db->table('kepribadian_ketidakhadiran')
        ->join('siswa', 'kepribadian_ketidakhadiran.NIS = siswa.NIS')
        ->get();
        return $query;
    }
}
