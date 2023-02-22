<?php

namespace App\Controllers;

use App\Models\UserModel;

class SiswaEkstrakurikuler extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Siswa Ekstrakurikuler'
        ];
        return view('pages/siswa_ekstrakurikuler', $data);
    }
}
