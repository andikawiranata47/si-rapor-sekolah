<?php

namespace App\Models;

use CodeIgniter\Model;

class RaporModel extends Model
{
  // public function getRapor($wali, $id)
  // {
  //   $query = $this->db->table('rapor')
  //     ->join('siswa', 'rapor.Id_Siswa = siswa.Id_Siswa', 'left')
  //     ->join('nilai_mata_pelajaran', 'rapor.Id_Siswa = nilai_mata_pelajaran.Id_Siswa', 'left')
  //     ->join('nilai_ekstrakurikuler', 'rapor.Id_Siswa = nilai_ekstrakurikuler.Id_Siswa', 'left')
  //     ->join('nilai_prakerin', 'rapor.Id_Siswa = nilai_prakerin.Id_Siswa', 'left')
  //     ->join('kepribadian', 'rapor.Id_Siswa = kepribadian.Id_Siswa', 'left')
  //     ->join('kelas', 'siswa.Id_Kelas = Kelas.Id_Kelas', 'left')
  //     ->where('rapor.Id_Siswa', $id)
  //     ->where('kelas.Wali_Kelas', $wali)
  //     ->get();
  //   return $query;
  // }
  
  public function getRaporMapel($wali, $id)
  {
    $query = $this->db->table('siswa')
      ->join('nilai_mata_pelajaran', 'siswa.Id_Siswa = nilai_mata_pelajaran.Id_Siswa', 'left')
      ->join('kelas', 'siswa.Id_Kelas = Kelas.Id_Kelas', 'left')
      ->join('mata_pelajaran', 'nilai_mata_pelajaran.Id_Mata_Pelajaran = mata_pelajaran.Id_Mata_Pelajaran', 'left')
      ->where('siswa.Id_Siswa', $id)
      ->where('kelas.Wali_Kelas', $wali)
      ->orderBy('kelompok')
      ->get();
    return $query;
  }

  public function getRaporPrakerin($wali, $id)
  {
    $query = $this->db->table('siswa')
      ->join('nilai_prakerin', 'siswa.Id_Siswa = nilai_prakerin.Id_Siswa', 'left')
      ->join('kelas', 'siswa.Id_Kelas = Kelas.Id_Kelas', 'left')
      ->where('siswa.Id_Siswa', $id)
      ->where('kelas.Wali_Kelas', $wali)
      ->get();
    return $query;
  }

  public function getRaporEkstra($wali, $id)
  {
    $query = $this->db->table('siswa')
      ->join('nilai_ekstrakurikuler', 'siswa.Id_Siswa = nilai_ekstrakurikuler.Id_Siswa', 'left')
      ->join('kelas', 'siswa.Id_Kelas = Kelas.Id_Kelas', 'left')
      ->where('siswa.Id_Siswa', $id)
      ->where('kelas.Wali_Kelas', $wali)
      ->get();
    return $query;
  }

  public function getRaporKepribadian($wali, $id)
  {
    $query = $this->db->table('siswa')
      ->join('kepribadian', 'siswa.Id_Siswa = kepribadian.Id_Siswa', 'left')
      ->join('kelas', 'siswa.Id_Kelas = Kelas.Id_Kelas', 'left')
      ->where('siswa.Id_Siswa', $id)
      ->where('kelas.Wali_Kelas', $wali)
      ->get();
    return $query;
  }

  public function pilihSiswa($wali)
  {
    $query = $this->db->table('siswa')
      ->join('kelas', 'siswa.Id_Kelas = kelas.Id_Kelas', 'left')
      ->where('kelas.Wali_Kelas', $wali)
      ->get();
    return $query;
  }

  public function validRapor($data, $id)
  {
    $query = $this->db->table('rapor')->update($data, array('Id_Siswa' => $id));
    return $query;
  }
}
