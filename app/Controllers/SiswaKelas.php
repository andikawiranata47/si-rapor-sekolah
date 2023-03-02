<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\SiswaKelasModel;

class SiswaKelas extends BaseController
{
    protected $siswaModel, $kelasModel, $siswaKelasModel;
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->siswaModel = new SiswaModel();
        $this->siswaKelasModel = new SiswaKelasModel();
    }

    public function index()
    {
        $id = $this->request->getPost('pilih_kelas');
        $kelas = $this->kelasModel->getKelas()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $data = [
            'judul' => 'Siswa Kelas',
            'id' => $id,
            'kelas' => $kelas,
            'siswa' => $siswa
        ];
        return view('pages/siswa_kelas', $data);
    }

    public function get()
    {
        $id = $this->request->getPost('pilih_kelas');
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $data = [
            'judul' => 'Siswa Kelas',
            'id' => $id,
            'kelas' => $kelas,
            'siswa' => $siswa,
            'siswaKelas' => $siswaKelas
        ];
        return view('pages/siswa_kelas', $data);
    }

    // public function save()
    // {
    //     $data1 = [
    //         'kelas' => $this->request->getPost('siswa'),
    //         // 'nis' => $this->request->getPost('nis'),
    //         // 'nama' => $this->request->getPost('nama')
    //     ];
    //     $this->siswaKelasModel->updateSiswaKelas($data1);
    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    //     return redirect()->to('/siswakelas');
    // }

    public function edit()
    {
        $id = $this->request->getPost('id_siswa');
        $data = array(
            'id_kelas' => $this->request->getPost('pilih_kelas')
        );
        $this->siswaKelasModel->updateSiswaKelas($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/siswakelas');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_siswa');
        $this->siswaKelasModel->deleteSiswaKelas($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/siswakelas');
    }
}
