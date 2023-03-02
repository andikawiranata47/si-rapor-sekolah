<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'Id_Siswa';
    // protected $allowedFields = [
    //     'nis',
    //     'nisn',
    //     'nama',
    //     'jenis_kelamin',
    //     'tempat_lahir',
    //     'tanggal_lahir',
    //     'agama',
    //     'alamat',
    //     'telp',
    //     'sekolah_asal',
    //     'tahun_lulus',
    //     'nomor_lulus',
    //     'diterima_tingkat',
    //     'diterima_tanggal',
    //     'nama_ayah',
    //     'kerja_ayah',
    //     'nama_ibu',
    //     'kerja_ibu',
    //     'alamat_ortu',
    //     'telp_ortu',
    //     'nama_wali',
    //     'alamat_wali',
    //     'telp_wali',
    //     'kerja_wali'
    // ];

    public function getSiswa()
    {
        $query = $this->db->table('siswa')
            // ->join('kelas', 'kelas.Id_Kelas = siswa.Id_Kelas')
            ->get();
        return $query;
    }

    public function saveSiswa($data)
    {
        $query = $this->db->table('siswa')->insert($data);
        return $query;
    }

    public function updateSiswa($data, $id)
    {
        $query = $this->db->table('siswa')->update($data, array('Id_Siswa' => $id));
        return $query;
    }

    public function deleteSiswa($id)
    {
        $query = $this->db->table('siswa')->delete(array('Id_Siswa' => $id));
        return $query;
    }
}
