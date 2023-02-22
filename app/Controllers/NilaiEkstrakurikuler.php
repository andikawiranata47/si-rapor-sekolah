<?php

namespace App\Controllers;

use App\Models\NilaiEkstrakurikulerModel;

class NilaiEkstrakurikuler extends BaseController
{
    protected $nilaiEkstraModel;
    public function __construct()
    {
        $this->nilaiEkstraModel = new NilaiEkstrakurikulerModel();
    }

    public function index()
    {
        $nilai = $this->nilaiEkstraModel->getNilaiEkstra()->getResult();
        $data = [
            'judul' => 'Nilai Ekstrakurikuler',
            'nilaiEkstra' => $nilai
        ];
        return view('pages/nilai_ekstrakurikuler', $data);
    }
}
