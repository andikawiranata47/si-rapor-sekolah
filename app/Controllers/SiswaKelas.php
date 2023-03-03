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
        if(session()->getFlashdata('id') !== null){
            $id = session()->getFlashdata('id');
        }
        // $id = $this->request->getPost('pilih_kelas');
        $kelas = $this->kelasModel->getKelas()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $siswaKelas1 = $this->siswaKelasModel->getSiswaKelas()->getResult();
        $data = [
            'judul' => 'Siswa Kelas',
            'id' => $id,
            'kelas' => $kelas,
            'siswa' => $siswa,
            'siswaKelas1' => $siswaKelas1
        ];
        return view('pages/siswa_kelas', $data);
    }

    public function get()
    {
        $id = $this->request->getPost('pilih_kelas');
        if(session()->getFlashdata('id') !== null){
            $id = session()->getFlashdata('id');
        }
        // $id = $this->request->getPost('pilih_kelas');
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $siswaKelas1 = $this->siswaKelasModel->getSiswaKelas()->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $data = [
            'judul' => 'Siswa Kelas',
            'id' => $id,
            'kelas' => $kelas,
            'siswa' => $siswa,
            'siswaKelas' => $siswaKelas,
            'siswaKelas1' => $siswaKelas1
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
        $id = $this->request->getPost('siswa');
        $data = array(
            'id_kelas' => $this->request->getPost('kelas')
        );
        $this->siswaKelasModel->updateSiswaKelas($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        session()->setFlashdata('id', $this->request->getPost('kelas_lama'));
        return redirect()->to('/SiswaKelas/get');
    }

    public function delete()
    {
        $id = $this->request->getPost('siswa');
        $data = array(
            'id_kelas' => null
        );
        $this->siswaKelasModel->updateSiswaKelas($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        session()->setFlashdata('id', $this->request->getPost('kelas_lama'));
        return redirect()->to('/SiswaKelas/get');
    }
}
