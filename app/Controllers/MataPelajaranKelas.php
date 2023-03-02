<?php

namespace App\Controllers;

use App\Models\MataPelajaranKelasModel;
use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\MasterUserModel;

class MataPelajaranKelas extends BaseController
{
    protected $mapelKelasModel, $kelasModel, $mapelModel, $userModel;
    public function __construct()
    {
        $this->mapelKelasModel = new MataPelajaranKelasModel();
        $this->kelasModel = new KelasModel();
        $this->mapelModel = new MataPelajaranModel();
        $this->userModel = new MasterUserModel();
    }

    public function index()
    {
        $id = $this->request->getPost('pilih_kelas');
        if(session()->getFlashdata('id') !== null){
            $id = session()->getFlashdata('id');
        }
        $mapel = $this->mapelKelasModel->getMapelKelas()->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $mapel1 = $this->mapelModel->getMapel()->getResult();
        $user = $this->userModel->getUser()->getResult();
        $data = [
            'judul' => 'Mata Pelajaran Kelas',
            'id' => $id,
            'mapelKelas' => $mapel,
            'kelas' => $kelas,
            'mapel' => $mapel1,
            'user' => $user
        ];
        return view('pages/mata_pelajaran_kelas', $data);
    }

    public function get()
    {
        $id = $this->request->getPost('pilih_kelas');
        if(session()->getFlashdata('id') !== null){
            $id = session()->getFlashdata('id');
        }
        $mapel = $this->mapelKelasModel->getPilihKelas($id)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $mapel1 = $this->mapelModel->getMapel()->getResult();
        $user = $this->userModel->getUser()->getResult();
        $data = [
            'judul' => "Mata Pelajaran Kelas",
            'id' => $id,
            'mapelKelas' => $mapel,
            'kelas' => $kelas,
            'mapel' => $mapel1,
            'user' => $user
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
        session()->setFlashdata('id', $this->request->getPost('kelas'));
        return redirect()->to('/MataPelajaranKelas/get');
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
        session()->setFlashdata('id', $this->request->getPost('kelas'));
        return redirect()->to('/MataPelajaranKelas/get');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_mapelkelas');
        $this->mapelKelasModel->deleteMapelKelas($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        session()->setFlashdata('id', $this->request->getPost('kelas'));
        return redirect()->to('/MataPelajaranKelas/get');
    }
}
