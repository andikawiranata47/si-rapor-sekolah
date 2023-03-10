<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\MasterUserModel;

class Kelas extends BaseController
{
    protected $kelasModel, $masterUserModel;
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->masterUserModel = new MasterUserModel();
    }

    public function index()
    {
        $kelas = $this->kelasModel->getKelas()->getResult();
        $nama = $this->masterUserModel->getUser()->getResult();
        $data = [
            'judul' => 'Kelas',
            'kelas' => $kelas,
            'nama' => $nama
        ];
        return view('pages/kelas', $data);
    }

    public function save()
    {
        $data = [
            'is_wali_kelas' => 1
        ];
        $data1 = [
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => strtoupper($this->request->getPost('jurusan')),
            'abjad' => strtoupper($this->request->getPost('abjad')),
            'kelas' => strtoupper(strval($this->request->getPost('tingkat')).'-'.$this->request->getPost('jurusan').'-'.strval($this->request->getPost('abjad')))
        ];
        $this->kelasModel->saveKelas($data1);
        $this->masterUserModel->updateUser($data, $this->request->getPost('wali_kelas'));
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/kelas');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_kelas');
        $idLama = $this->request->getPost('id_lama');
        $wali = $this->request->getPost('wali_kelas');
        $data = [
            'is_wali_kelas' => 1
        ];
        $data1 = [
            'is_wali_kelas' => 0
        ];
        $data2 = array(
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'tingkat' => $this->request->getPost('tingkat'),
            'jurusan' => strtoupper($this->request->getPost('jurusan')),
            'abjad' => strtoupper($this->request->getPost('abjad')),
            'kelas' => strtoupper(strval($this->request->getPost('tingkat')).'-'.$this->request->getPost('jurusan').'-'.strval($this->request->getPost('abjad')))
        );
        if($wali != $idLama) {
            $this->masterUserModel->updateUser($data, $wali);
            $this->masterUserModel->updateUser($data1, $idLama);
        }
        $this->kelasModel->updateKelas($data2, $id);
        
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/kelas');
    }

    public function delete()
    {
        $data = [
            'is_wali_kelas' => 0
        ];
        $id = $this->request->getPost('id_kelas');
        $this->kelasModel->deleteKelas($id);
        $this->masterUserModel->updateUser($data, $this->request->getPost('wali_kelas'));
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/kelas');
    }
}
