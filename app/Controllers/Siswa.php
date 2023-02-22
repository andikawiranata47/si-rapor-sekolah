<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $data = [
            'judul' => 'Siswa',
            'siswa' => $siswa
        ];
        return view('pages/siswa', $data);
    }

    public function save()
    {
        $data1 = [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'nama_orangtua' => $this->request->getPost('orangtua'),
            'alamat' => $this->request->getPost('alamat')
        ];
        $this->siswaModel->saveSiswa($data1);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/siswa');
    }

    public function edit()
    {
        $id = $this->request->getPost('nis');
        $data = array(
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'nama_orangtua' => $this->request->getPost('orangtua'),
            'alamat' => $this->request->getPost('alamat')
        );
        $this->siswaModel->updateSiswa($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/siswa');
    }

    public function delete()
    {
        $id = $this->request->getPost('nis');
        $this->siswaModel->deleteSiswa($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/siswa');
    }
}
