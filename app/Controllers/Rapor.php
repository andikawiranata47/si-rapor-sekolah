<?php

namespace App\Controllers;

use App\Models\RaporModel;
use App\Models\KelasModel;

class Rapor extends BaseController
{
  protected $raporModel, $kelasModel;
  public function __construct()
  {
    $this->raporModel = new RaporModel();
    $this->kelasModel = new KelasModel();
  }

  public function index()
  {
    $wali = session()->get('id_user');
    $id = $this->request->getPost('pilih_siswa');
    $rapor1 = $this->raporModel->getRaporMapel($wali, $id)->getResult();
    $rapor2 = $this->raporModel->getRaporPrakerin($wali, $id)->getResult();
    $rapor3 = $this->raporModel->getRaporEkstra($wali, $id)->getResult();
    $rapor4 = $this->raporModel->getRaporKepribadian($wali, $id)->getResult();
    $siswa = $this->raporModel->pilihSiswa($wali)->getResult();
    $data = [
      'judul' => 'Rapor',
      'raporMapel' => $rapor1,
      'raporPrakerin' => $rapor2,
      'raporEkstra' => $rapor3,
      'raporKepribadian' => $rapor4,
      'siswa' => $siswa,
      'id'    => $id
    ];
    return view('pages/rapor', $data);
  }
  
  public function get()
  {
    $wali = session()->get('id_user');
    $id = $this->request->getPost('pilih_siswa');
    $rapor1 = $this->raporModel->getRaporMapel($wali, $id)->getResult();
    $rapor2 = $this->raporModel->getRaporPrakerin($wali, $id)->getResult();
    $rapor3 = $this->raporModel->getRaporEkstra($wali, $id)->getResult();
    $rapor4 = $this->raporModel->getRaporKepribadian($wali, $id)->getResult();
    $siswa = $this->raporModel->pilihSiswa($wali)->getResult();
    $data = [
      'judul' => 'Rapor',
      'raporMapel' => $rapor1,
      'raporPrakerin' => $rapor2,
      'raporEkstra' => $rapor3,
      'raporKepribadian' => $rapor4,
      'siswa' => $siswa,
      'id'    => $id
    ];
    return view('pages/rapor', $data);
  }
}
