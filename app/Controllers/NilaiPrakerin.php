<?php

namespace App\Controllers;

use App\Models\NilaiPrakerinModel;

class NilaiPrakerin extends BaseController
{
    protected $nilaiPrakerinModel;
    public function __construct()
    {
        $this->nilaiPrakerinModel = new NilaiPrakerinModel();
    }

    public function index()
    {
        $nilai = $this->nilaiPrakerinModel->getNilaiPrakerin()->getResult();
        $data = [
            'judul' => 'Nilai Prakerin',
            'nilaiPrakerin' => $nilai
        ];
        return view('pages/nilai_prakerin', $data);
    }
}
