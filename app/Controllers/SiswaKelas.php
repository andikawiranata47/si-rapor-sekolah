<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\SiswaKelasModel;
use App\Models\KelasModel;

class SiswaKelas extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->siswaModel = new SiswaModel();
        $this->siswaKelasModel = new SiswaKelasModel();
    }

    public function index()
    {
        $kelas = $this->kelasModel->getKelas()->getResult();
        // $siswa = $this->siswaModel->getSiswa()->getResult();
        $siswaKelas = $this->siswaKelasModel->getSiswaKelas()->getResult();
        $data = [
            'judul' => 'Siswa Kelas',
            'kelas' => $kelas,
            // 'siswa' => $siswa,
            'siswaKelas' => $siswaKelas
        ];
        return view('pages/siswa_kelas', $data);
    }

    public function save()
    {
        $data1 = [
            'kelas' => $this->request->getPost('kelas'),
            // 'nis' => $this->request->getPost('nis'),
            // 'nama' => $this->request->getPost('nama')
        ];
        $this->siswaKelasModel->saveSiswaKelas($data1);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/siswakelas');
    }

    public function edit()
    {
        $id = $this->request->getPost('nis');
        $data = array(
            'kelas' => $this->request->getPost('kelas')
            // 'nis' => $this->request->getPost('nis'),
            // 'nama' => $this->request->getPost('nama'),
        );
        $this->siswaKelasModel->updateSiswaKelas($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/siswakelas');
    }

    public function delete()
    {
        $id = $this->request->getPost('nis');
        $this->siswaKelasModel->deleteSiswaKelas($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/siswakelas');
    }
}
