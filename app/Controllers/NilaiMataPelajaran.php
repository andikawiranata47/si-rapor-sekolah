<?php

namespace App\Controllers;

use App\Models\NilaiMataPelajaranModel;
use App\Models\SiswaModel;
use App\Models\MataPelajaranModel;
use App\Models\KelasModel;
use App\Models\GeneralModel;
use App\Models\SiswaKelasModel;

class NilaiMataPelajaran extends BaseController
{
    protected $nilaiMapelModel, $siswaModel, $mataPelajaranModel, $kelasModel, $generalModel, $siswaKelasModel;
    public function __construct()
    {
        $this->nilaiMapelModel = new NilaiMataPelajaranModel();
        $this->siswaModel = new SiswaModel();
        $this->mataPelajaranModel = new MataPelajaranModel();
        $this->kelasModel = new KelasModel();
        $this->generalModel = new GeneralModel();
        $this->siswaKelasModel = new SiswaKelasModel();
    }

    public function index()
    {
        $id = $this->request->getPost('pilih_kelas');
        if(session()->getFlashdata('id') !== null){
            $id = session()->getFlashdata('id');
        }
        $pilihMapel = $this->request->getPost('pilih_mapel');
        $pilihJenis = $this->request->getPost('pilih_jenis');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');

        // $nilai = $this->nilaiMapelModel->getNilaiMapel()->getResult();
        $nilai = $this->nilaiMapelModel->getPilihKelas($id, $pilihMapel, $pilihJenis, $pilihSemester, $pilihTahun)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $mapel = $this->mataPelajaranModel->getMapel()->getResult();
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $data = [
            'judul' => 'Nilai Mata Pelajaran',
            'id' => $id,
            'pmapel' => $pilihMapel,
            'pjenis' => $pilihJenis,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,
            // 'nilaiMapel' => $nilai,
            'nilaiMapel' => $nilai,
            'kelas' => $kelas,
            'general' => $general,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'siswaKelas' => $siswaKelas
        ];
        return view('pages/nilai_mata_pelajaran', $data);
    }

    public function get()
    {
        $id = $this->request->getPost('pilih_kelas');
        if(session()->getFlashdata('id') !== null){
            $id = session()->getFlashdata('id');
        }
        $pilihMapel = $this->request->getPost('pilih_mapel');
        $pilihJenis = $this->request->getPost('pilih_jenis');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');

        // $nilai = $this->nilaiMapelModel->getNilaiMapel()->getResult();
        $nilai = $this->nilaiMapelModel->getPilihKelas($id, $pilihMapel, $pilihJenis, $pilihSemester, $pilihTahun)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $mapel = $this->mataPelajaranModel->getMapel()->getResult();
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $data = [
            'judul' => 'Nilai Mata Pelajaran',
            'id' => $id,
            'pmapel' => $pilihMapel,
            'pjenis' => $pilihJenis,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,
            // 'nilaiMapel' => $nilai,
            'nilaiMapel' => $nilai,
            'kelas' => $kelas,
            'general' => $general,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'siswaKelas' => $siswaKelas
        ];
        return view('pages/nilai_mata_pelajaran', $data);
    }

    // public function save()
    // {
    //     $nilai_uh = $this->request->getPost('uh');
    //     $nilai_uts = $this->request->getPost('uts');
    //     $nilai_uas = $this->request->getPost('uas');
    //     $data1 = [
    //         'nis' => $this->request->getPost('nis'),
    //         'id_mata_pelajaran' => $this->request->getPost('mapel'),
    //         'jenis_nilai' => $this->request->getPost('jenis'),
    //         'nilai_uh' => $nilai_uh,
    //         'nilai_uts' => $nilai_uts,
    //         'nilai_uas' => $nilai_uas,
    //         'nilai_akhir' => round(($nilai_uh+$nilai_uts+$nilai_uas)/3, 1)
    //     ];
    //     $this->nilaiMapelModel->saveNilaiMapel($data1);
    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    //     return redirect()->to('/nilaimatapelajaran');
    // }

    // public function edit()
    // {
    //     $nilai_uh = $this->request->getPost('uh');
    //     $nilai_uts = $this->request->getPost('uts');
    //     $nilai_uas = $this->request->getPost('uas');
    //     $id = $this->request->getPost('id_nilaimapel');
    //     $data = array(
    //         'nis' => $this->request->getPost('nis'),
    //         'id_mata_pelajaran' => $this->request->getPost('mapel'),
    //         'jenis_nilai' => $this->request->getPost('jenis'),
    //         'nilai_uh' => $this->request->getPost('uh'),
    //         'nilai_uts' => $this->request->getPost('uts'),
    //         'nilai_uas' => $this->request->getPost('uas'),
    //         'nilai_akhir' => round(($nilai_uh+$nilai_uts+$nilai_uas)/3, 1)
    //     );
    //     $this->nilaiMapelModel->updateNilaiMapel($data, $id);
    //     session()->setFlashdata('pesan', 'Data berhasil diubah');
    //     return redirect()->to('/nilaimatapelajaran');
    // }

    // public function delete()
    // {
    //     $id = $this->request->getPost('id_nilaimapel');
    //     $this->nilaiMapelModel->deleteNilaiMapel($id);
    //     session()->setFlashdata('pesan', 'Data berhasil dihapus');
    //     return redirect()->to('/nilaimatapelajaran');
    // }
}
