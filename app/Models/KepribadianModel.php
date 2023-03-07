<?php

namespace App\Models;

use CodeIgniter\Model;

class KepribadianModel extends Model
{
    // protected $table = 'kehadiran';
    // protected $primaryKey = 'Id_Kehadiran';

    public function getKepribadian()
    {
        $query = $this->db->table('kepribadian')
            ->join('siswa', 'kepribadian.Id_Siswa = siswa.Id_Siswa', 'left')
            ->get();
        return $query;
    }

    public function getPilihKelas($id, $semester, $tahun)
    {
        $query = $this->db->table('kepribadian')
            ->join('siswa', 'kepribadian.Id_Siswa = siswa.Id_Siswa', 'left')
            ->where('siswa.Id_Kelas', $id)
            ->where('kepribadian.Semester', $semester)
            ->where('kepribadian.Tahun_Ajaran', $tahun)
            ->get();
        return $query;
    }

    public function saveKepribadian($data)
    {
        $query = $this->db->table('kepribadian')->insert($data);
        return $query;
    }

    public function editKepribadian($data, $id)
    {
        $query = $this->db->table('kepribadian')->update($data, array('Id_Kepribadian' => $id));
        return $query;
    }
}
