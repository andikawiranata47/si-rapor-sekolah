<?php

namespace App\Controllers;

use App\Models\NilaiMataPelajaranModel;

class NilaiMataPelajaran extends BaseController
{
    protected $nilaiMapelModel;
    public function __construct()
    {
        $this->nilaiMapelModel = new NilaiMataPelajaranModel();
    }

    public function index()
    {
        $nilai = $this->nilaiMapelModel->getNilaiMapel()->getResult();
        $data = [
            'judul' => 'Nilai Mata Pelajaran',
            'nilaiMapel' => $nilai
        ];
        return view('pages/nilai_mata_pelajaran', $data);
    }

    public function save()
    {
        $nilai_uh = $this->request->getPost('uh');
        $nilai_uts = $this->request->getPost('uts');
        $nilai_uas = $this->request->getPost('uas');
        $data1 = [
            'nis' => $this->request->getPost('nis'),
            'id_mata_pelajaran' => $this->request->getPost('mapel'),
            'jenis_nilai' => $this->request->getPost('jenis'),
            'nilai_uh' => $nilai_uh,
            'nilai_uts' => $nilai_uts,
            'nilai_uas' => $nilai_uas,
            'nilai_akhir' => round(($nilai_uh+$nilai_uts+$nilai_uas)/3, 1)
        ];
        $this->nilaiMapelModel->saveNilaiMapel($data1);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/nilaimatapelajaran');
    }

    public function edit()
    {
        $nilai_uh = $this->request->getPost('uh');
        $nilai_uts = $this->request->getPost('uts');
        $nilai_uas = $this->request->getPost('uas');
        $id = $this->request->getPost('id_nilaimapel');
        $data = array(
            'nis' => $this->request->getPost('nis'),
            'id_mata_pelajaran' => $this->request->getPost('mapel'),
            'jenis_nilai' => $this->request->getPost('jenis'),
            'nilai_uh' => $this->request->getPost('uh'),
            'nilai_uts' => $this->request->getPost('uts'),
            'nilai_uas' => $this->request->getPost('uas'),
            'nilai_akhir' => round(($nilai_uh+$nilai_uts+$nilai_uas)/3, 1)
        );
        $this->nilaiMapelModel->updateNilaiMapel($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/nilaimatapelajaran');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_nilaimapel');
        $this->nilaiMapelModel->deleteNilaiMapel($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/nilaimatapelajaran');
    }
}
