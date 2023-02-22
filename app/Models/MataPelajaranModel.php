<?php

namespace App\Models;

use CodeIgniter\Model;

class MataPelajaranModel extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'Id_Mata_Pelajaran';
    protected $allowedFields = ['Mata_Pelajaran', 'Kelompok', 'KKM'];

    public function getMapel()
    {
        $query = $this->db->table('mata_pelajaran')
            ->orderBy('Kelompok')
            ->get();
        return $query;
    }

    public function saveMapel($data)
    {
        $query = $this->db->table('mata_pelajaran')->insert($data);
        return $query;
    }

    public function updateMapel($data, $id)
    {
        $query = $this->db->table('mata_pelajaran')->update($data, array('Id_Mata_Pelajaran' => $id));
        return $query;
    }

    public function deleteMapel($id)
    {
        $query = $this->db->table('mata_pelajaran')->delete(array('Id_Mata_Pelajaran' => $id));
        return $query;
    }
}
