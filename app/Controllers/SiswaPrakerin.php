<?php

namespace App\Controllers;

use App\Models\UserModel;

class SiswaPrakerin extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Siswa Prakerin'
        ];
        return view('pages/siswa_prakerin', $data);
    }
}
