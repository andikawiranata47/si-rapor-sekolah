<?php

namespace App\Models;

use App\Controllers\MasterUser;
use CodeIgniter\Model;

class HakAksesModel extends Model
{
    protected $table = 'hak_akses';
    protected $primaryKey = 'Id_Hak_Akses';
    protected $allowedFields = ['Id_User', 'Hak_Akses'];

    // public function getHak($id)
    // {
    //     $query = $this->db->table('hak_akses')
    //     ->select('Hak_akses')
    //     ->where('Id_User', $id)
    //     ->get();
    //     return $query;
    // }

    public function saveHak($data){
        $query = $this->db->table('hak_akses')->insert($data);
        return $query;
    }
 
    public function updateHak($data, $id)
    {
        $query = $this->db->table('hak_akses')->update($data, array('Id_Hak_Akses' => $id));
        return $query;
    }
 
    public function deleteHak($id)
    {
        $query = $this->db->table('hak_akses')->delete(array('Id_Hak_Akses' => $id));
        return $query;
    } 
}
