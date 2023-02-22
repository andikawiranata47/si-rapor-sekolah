<?php

namespace App\Controllers;

use App\Models\MataPelajaranModel;

class MataPelajaran extends BaseController
{
    protected $mapelModel;
    public function __construct()
    {
        $this->mapelModel = new MataPelajaranModel();
    }

    public function index()
    {
        $mapel = $this->mapelModel->getMapel()->getResult();
        $data = [
            'judul' => 'Mata Pelajaran',
            'mapel' => $mapel
        ];
        return view('pages/mata_pelajaran', $data);
    }

    public function save()
    {
        $data1 = [
            'mata_pelajaran' => $this->request->getPost('mapel'),
            'kelompok' => $this->request->getPost('kelompok'),
            'kkm' => $this->request->getPost('kkm')
        ];
        $this->mapelModel->saveMapel($data1);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/matapelajaran');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_mapel');
        $data = array(
            'mata_pelajaran' => $this->request->getPost('mapel'),
            'kelompok' => $this->request->getPost('kelompok'),
            'kkm' => $this->request->getPost('kkm')
        );
        $this->mapelModel->updateMapel($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/matapelajaran');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_mapel');
        $this->mapelModel->deleteMapel($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/matapelajaran');
    }
}
