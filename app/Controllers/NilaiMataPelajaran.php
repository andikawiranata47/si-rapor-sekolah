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
        $pilihMapel = $this->request->getPost('pilih_mapel');
        // $pilihJenis = $this->request->getPost('pilih_jenis');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');
        if (session()->getFlashdata('id') !== null) {
            if (session()->getFlashdata('mapel') !== null) {
                // if (session()->getFlashdata('jenis') !== null) {
                    if (session()->getFlashdata('semester') !== null) {
                        if (session()->getFlashdata('tahun') !== null) {
                            $id = session()->getFlashdata('id');
                            $pilihMapel = session()->getFlashdata('mapel');
                            // $pilihJenis = session()->getFlashdata('jenis');
                            $pilihSemester = session()->getFlashdata('semester');
                            $pilihTahun = session()->getFlashdata('tahun');
                        }
                    }
                // }
            }
        }
        
        $nilai = $this->nilaiMapelModel->getPilihKelas($id, $pilihMapel, $pilihSemester, $pilihTahun)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $mapel = $this->mataPelajaranModel->getMapel()->getResult();
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $data = [
            'judul' => 'Nilai Mata Pelajaran',
            'id' => $id,
            'pmapel' => $pilihMapel,
            // 'pjenis' => $pilihJenis,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

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
        $pilihMapel = $this->request->getPost('pilih_mapel');
        // $pilihJenis = $this->request->getPost('pilih_jenis');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');
        if (session()->getFlashdata('id') !== null) {
            if (session()->getFlashdata('mapel') !== null) {
                // if (session()->getFlashdata('jenis') !== null) {
                    if (session()->getFlashdata('semester') !== null) {
                        if (session()->getFlashdata('tahun') !== null) {
                            $id = session()->getFlashdata('id');
                            $pilihMapel = session()->getFlashdata('mapel');
                            // $pilihJenis = session()->getFlashdata('jenis');
                            $pilihSemester = session()->getFlashdata('semester');
                            $pilihTahun = session()->getFlashdata('tahun');
                        }
                    }
                // }
            }
        }

        $nilai = $this->nilaiMapelModel->getPilihKelas($id, $pilihMapel, $pilihSemester, $pilihTahun)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $mapel = $this->mataPelajaranModel->getMapel()->getResult();
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $data = [
            'judul' => 'Nilai Mata Pelajaran',
            'id' => $id,
            'pmapel' => $pilihMapel,
            // 'pjenis' => $pilihJenis,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

            'nilaiMapel' => $nilai,
            'kelas' => $kelas,
            'general' => $general,
            'siswa' => $siswa,
            'mapel' => $mapel,
            'siswaKelas' => $siswaKelas
        ];
        return view('pages/nilai_mata_pelajaran', $data);
    }

    public function save()
    {
        $siswa = $this->request->getPost('siswa');

        $pilihMapel = $this->request->getPost('pilih_mapel');
        // $pilihJenis = $this->request->getPost('pilih_jenis');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');

        // $nilai_uh = $this->request->getPost('uh');
        // $nilai_uts = $this->request->getPost('uts');
        // $nilai_uas = $this->request->getPost('uas');
        $nilai_akhir = $this->request->getPost('nilai_akhir');
        $capaian = $this->request->getPost('capaian');
        $capaian2 = nl2br($capaian);
        $data = [
            'id_mata_pelajaran' => $pilihMapel,
            'id_siswa' => $siswa,
            // 'jenis_nilai' => $pilihJenis,
            'semester' => $pilihSemester,
            'tahun_ajaran' => $pilihTahun,
            // 'nilai_uh' => $nilai_uh,
            // 'nilai_uts' => $nilai_uts,
            // 'nilai_uas' => $nilai_uas,
            // 'nilai_akhir' => round(($nilai_uh + $nilai_uts + $nilai_uas) / 3, 1)
            'nilai_akhir' => $nilai_akhir,
            'capaian_kompetensi' => $capaian2
        ];
        $this->nilaiMapelModel->saveNilaiMapel($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        session()->setFlashdata('id', $this->request->getPost('kelas'));
        session()->setFlashdata('mapel', $this->request->getPost('pilih_mapel'));
        // session()->setFlashdata('jenis', $this->request->getPost('pilih_jenis'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaimatapelajaran/get');
    }

    public function edit()
    {
        $id_nilaimapel = $this->request->getPost('id_nilaimapel');

        // $nilai_uh = $this->request->getPost('uh');
        // $nilai_uts = $this->request->getPost('uts');
        // $nilai_uas = $this->request->getPost('uas');
        $nilai_akhir = $this->request->getPost('nilai_akhir');
        $capaian = $this->request->getPost('capaian');
        $capaian2 = nl2br($capaian);
        $data = array(
            // 'nilai_uh' => $this->request->getPost('uh'),
            // 'nilai_uts' => $this->request->getPost('uts'),
            // 'nilai_uas' => $this->request->getPost('uas'),
            // 'nilai_akhir' => round(($nilai_uh + $nilai_uts + $nilai_uas) / 3, 1)
            'nilai_akhir' => $nilai_akhir,
            'capaian_kompetensi' => $capaian2
        );
        $this->nilaiMapelModel->updateNilaiMapel($data, $id_nilaimapel);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        session()->setFlashdata('id', $this->request->getPost('kelas'));
        session()->setFlashdata('mapel', $this->request->getPost('pilih_mapel'));
        // session()->setFlashdata('jenis', $this->request->getPost('pilih_jenis'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaimatapelajaran/get');
    }

    // public function delete()
    // {
    //     $id = $this->request->getPost('id_nilaimapel');
    //     $this->nilaiMapelModel->deleteNilaiMapel($id);
    //     session()->setFlashdata('pesan', 'Data berhasil dihapus');
    //     return redirect()->to('/nilaimatapelajaran');
    // }
}
