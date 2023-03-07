<?php

namespace App\Controllers;

use App\Models\KepribadianModel;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\GeneralModel;
use App\Models\SiswaKelasModel;

class Kepribadian extends BaseController
{
    protected $kepribadianModel, $siswaModel, $kelasModel, $generalModel, $siswaKelasModel;
    public function __construct()
    {
        $this->kepribadianModel = new KepribadianModel();
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
        $this->generalModel = new GeneralModel();
        $this->siswaKelasModel = new SiswaKelasModel();
    }

    public function index()
    {
        $id = $this->request->getPost('pilih_kelas');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');
        if (session()->getFlashdata('id') !== null) {
            if (session()->getFlashdata('pilih_semester') !== null) {
                if (session()->getFlashdata('pilih_tahun') !== null) {
                    $id = session()->getFlashdata('id');
                    $pilihSemester = session()->getFlashdata('semester');
                    $pilihTahun = session()->getFlashdata('tahun');
                }
            }
        }

        $kepribadian = $this->kepribadianModel->getPilihKelas($id, $pilihSemester, $pilihTahun)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $data = [
            'judul' => 'Kepribadian & Kehadiran',
            'id' => $id,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

            'kepribadian' => $kepribadian,
            'kelas' => $kelas,
            'general' => $general,
            'siswa' => $siswa,
            'siswaKelas' => $siswaKelas
        ];
        return view('pages/kepribadian', $data);
    }
    public function get()
    {
        $id = $this->request->getPost('pilih_kelas');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');
        if (session()->getFlashdata('id') !== null) {
            if (session()->getFlashdata('semester') !== null) {
                if (session()->getFlashdata('tahun') !== null) {
                    $id = session()->getFlashdata('id');
                    $pilihSemester = session()->getFlashdata('semester');
                    $pilihTahun = session()->getFlashdata('tahun');
                }
            }
        }

        $kepribadian = $this->kepribadianModel->getPilihKelas($id, $pilihSemester, $pilihTahun)->getResult();
        $kelas = $this->kelasModel->getKelas()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $siswaKelas = $this->siswaKelasModel->getPilihKelas($id)->getResult();
        $data = [
            'judul' => 'Kepribadian & Kehadiran',
            'id' => $id,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

            'kepribadian' => $kepribadian,
            'kelas' => $kelas,
            'general' => $general,
            'siswa' => $siswa,
            'siswaKelas' => $siswaKelas
        ];
        return view('pages/kepribadian', $data);
    }

    public function save()
    {
        $siswa = $this->request->getPost('siswa');

        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');

        $kepirbadian = $this->request->getPost('kepribadian');
        $sakit = $this->request->getPost('sakit');
        $izin = $this->request->getPost('izin');
        $tanpa_keterangan = $this->request->getPost('tanpa_keterangan');
        $data = [
            'id_siswa' => $siswa,
            'semester' => $pilihSemester,
            'tahun_ajaran' => $pilihTahun,
            'kepribadian' => $kepirbadian,
            'sakit' => $sakit,
            'izin' => $izin,
            'tanpa_keterangan' => $tanpa_keterangan,

        ];
        $this->kepribadianModel->saveKepribadian($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        session()->setFlashdata('id', $this->request->getPost('pilih_kelas'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/Kepribadian/get');
    }

    public function edit()
    {
        $id_kepribadian = $this->request->getPost('id_kepribadian');

        $kepribadian = $this->request->getPost('kepribadian');
        $sakit = $this->request->getPost('sakit');
        $izin = $this->request->getPost('izin');
        $tanpa_keterangan = $this->request->getPost('tanpa_keterangan');
        $data = array(
            'kepribadian' => $kepribadian,
            'sakit' => $sakit,
            'izin' => $izin,
            'tanpa_keterangan' => $tanpa_keterangan
        );
        $this->kepribadianModel->editKepribadian($data, $id_kepribadian);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        session()->setFlashdata('id', $this->request->getPost('pilih_kelas'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/Kepribadian/get');
    }
}
