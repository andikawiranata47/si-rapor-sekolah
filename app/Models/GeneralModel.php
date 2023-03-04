<?php

namespace App\Models;

use CodeIgniter\Model;

class GeneralModel extends Model
{
    protected $table = 'general';
    protected $primaryKey = 'Id_General';
    protected $allowedFields = ['Nama_Sekolah', 'Nama_Kepsek', 'NIP_Kepsek', 'Semester', 'Tahun_Ajaran'];

    public function getGeneral()
    {
        $query = $this->db->table('general')
        ->get();
        return $query;
    }
 
    public function updateGeneral($data, $id)
    {
        $query = $this->db->table('general')->update($data, array('Id_General' => $id));
        return $query;
    }
}
