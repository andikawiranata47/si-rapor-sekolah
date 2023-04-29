<?php

namespace App\Controllers;

use App\Models\GeneralModel;
use App\Models\MasterUserModel;

class Welcome extends BaseController
{
    protected $generalModel, $masterUserModel;
    public function __construct()
    {
        $this->generalModel = new GeneralModel();
        $this->masterUserModel = new MasterUserModel();
    }

    public function index()
    {
        $general = $this->generalModel->getGeneral()->getResult();
        $user = $this->masterUserModel->getUser()->getResult();
        $data = [
            'judul' => 'Welcome',
            'general' => $general,
            'user' => $user
        ];
        return view('pages/welcome', $data);
    }

    public function edit()
    {
        $id = $this->request->getPost('id_general');
        $data = array(
            'Nama_Sekolah' => $this->request->getPost('nama_sekolah'),
            // 'Nama_Kepsek' => $this->request->getPost('nama_kepsek'),
            // 'NIP_Kepsek' => $this->request->getPost('nip'),
            'Semester' => $this->request->getPost('semester'),
            'Tahun_Ajaran' => $this->request->getPost('tahun_ajaran'),
        );
        $this->generalModel->updateGeneral($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/welcome');
    }
}
