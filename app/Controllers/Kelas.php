<?php

namespace App\Controllers;

use App\Models\KelasModel;

class Kelas extends BaseController
{
    protected $kelasModel;
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $kelas = $this->kelasModel->getKelas()->getResult();
        $data = [
            'judul' => 'Kelas',
            'kelas' => $kelas
        ];
        return view('pages/kelas', $data);
    }

    public function save()
    {
        $data1 = [
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'abjad' => $this->request->getPost('abjad'),
            'kelas' => strval($this->request->getPost('tingkat')).'-'.$this->request->getPost('jurusan').'-'.strval($this->request->getPost('abjad'))
        ];
        $this->kelasModel->saveKelas($data1);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/kelas');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_kelas');
        $data = array(
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'abjad' => $this->request->getPost('abjad'),
            'kelas' => strval($this->request->getPost('tingkat')).'-'.$this->request->getPost('jurusan').'-'.strval($this->request->getPost('abjad'))
        );
        $this->kelasModel->updateKelas($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/kelas');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_kelas');
        $this->kelasModel->deleteKelas($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/kelas');
    }
}
