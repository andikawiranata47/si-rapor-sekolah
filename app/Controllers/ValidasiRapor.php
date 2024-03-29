<?php

namespace App\Controllers;

use App\Models\RaporModel;

class ValidasiRapor extends BaseController
{
  protected $raporModel;
  public function __construct()
  {
    $this->raporModel = new RaporModel();
  }

  public function index()
  {
    $rapor = $this->raporModel->getValid()->getResult();
    $data = [
      'judul' => 'Validasi Rapor',
      'rapor' => $rapor
    ];
    return view('pages/validasi_rapor', $data);
  }

  public function all()
  {
    $data = [
      'Is_Validasi' => 1
    ];
    $this->raporModel->allValid($data);
    return redirect()->to('/validasirapor');
  }
  public function one()
  {
    $data = [
      'Is_Validasi' => 1
    ];
    $id = $this->request->getPost('id_rapor');
    $this->raporModel->oneValid($data, $id);
    return redirect()->to('/validasirapor');
  }
}
