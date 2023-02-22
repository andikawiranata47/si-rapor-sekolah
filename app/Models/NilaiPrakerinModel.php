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
        ->join('siswa', 'nilai_prakerin.NIS = siswa.NIS')
        ->get();
        return $query;
    }
}
