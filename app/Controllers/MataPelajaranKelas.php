<?php

namespace App\Controllers;

use App\Models\MataPelajaranKelasModel;

class MataPelajaranKelas extends BaseController
{
    protected $mapelKelasModel;
    public function __construct()
    {
        $this->mapelKelasModel = new MataPelajaranKelasModel();
    }

    public function index()
    {
        $mapel = $this->mapelKelasModel->getMapelKelas()->getResult();
        $data = [
            'judul' => 'Mata Pelajaran Kelas',
            'mapelKelas' => $mapel
        ];
        return view('pages/mata_pelajaran_kelas', $data);
    }

    public function save()
    {
        $data1 = [
            'id_kelas' => $this->request->getPost('kelas'),
            'id_mata_pelajaran' => $this->request->getPost('mapel'),
            'guru_mapel' => $this->request->getPost('guru'),
        ];
        $this->mapelKelasModel->saveMapelKelas($data1);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/matapelajarankelas');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_mapelkelas');
        $data = array(
            'id_kelas' => $this->request->getPost('kelas'),
            'id_mata_pelajaran' => $this->request->getPost('mapel'),
            'guru_mapel' => $this->request->getPost('guru'),
        );
        $this->mapelKelasModel->updateMapelKelas($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/matapelajarankelas');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_mapelkelas');
        $this->mapelKelasModel->deleteMapelKelas($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/matapelajarankelas');
    }
}
