<?php

namespace App\Controllers;

use App\Models\KepribadianKehadiranModel;

class KepribadianKehadiran extends BaseController
{
    protected $kepriKeha;
    public function __construct()
    {
        $this->kepriKeha = new KepribadianKehadiranModel();
    }

    public function index()
    {
        $nilai = $this->kepriKeha->getKepriKeha()->getResult();
        $data = [
            'judul' => 'Kepribadian & Kehadiran',
            'kepriKeha' => $nilai
        ];
        return view('pages/kepribadian_kehadiran', $data);
    }
}
