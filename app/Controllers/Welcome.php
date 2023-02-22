<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Welcome'
        ];
        return view('pages/welcome', $data);
    }
}
