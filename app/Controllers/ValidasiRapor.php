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

}
