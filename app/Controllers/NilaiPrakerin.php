<?php

namespace App\Controllers;

use App\Models\NilaiPrakerinModel;
use App\Models\SiswaModel;
use App\Models\GeneralModel;
use App\Models\MasterUserModel;

class NilaiPrakerin extends BaseController
{
    protected $nilaiPrakerinModel, $siswaModel, $generalModel, $userModel;
    public function __construct()
    {
        $this->nilaiPrakerinModel = new NilaiPrakerinModel();
        $this->siswaModel = new SiswaModel();
        $this->generalModel = new GeneralModel();
        $this->siswaModel = new SiswaModel();
        $this->userModel = new MasterUserModel();
    }

    public function index()
    {
        $pilihGuru = $this->request->getPost('pilih_guru');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');
        if (session()->getFlashdata('guru') !== null) {
            if (session()->getFlashdata('semester') !== null) {
                if (session()->getFlashdata('tahun') !== null) {
                    $pilihGuru = session()->getFlashdata('guru');
                    $pilihSemester = session()->getFlashdata('semester');
                    $pilihTahun = session()->getFlashdata('tahun');
                }
            }
        }

        $prakerin = $this->nilaiPrakerinModel->getPilihKelas($pilihGuru, $pilihSemester, $pilihTahun)->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $guru = $this->userModel->getUser()->getResult();
        $data = [
            'judul' => 'Nilai Prakerin',
            'pguru' => $pilihGuru,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

            'prakerin' => $prakerin,
            'general' => $general,
            'siswa' => $siswa,
            'guru' => $guru,
        ];
        return view('pages/nilai_prakerin', $data);
    }

    public function get()
    {
        $pilihGuru = $this->request->getPost('pilih_guru');
        $pilihSemester = $this->request->getPost('pilih_semester');
        $pilihTahun = $this->request->getPost('pilih_tahun');
        if (session()->getFlashdata('guru') !== null) {
            if (session()->getFlashdata('semester') !== null) {
                if (session()->getFlashdata('tahun') !== null) {
                    $pilihGuru = session()->getFlashdata('guru');
                    $pilihSemester = session()->getFlashdata('semester');
                    $pilihTahun = session()->getFlashdata('tahun');
                }
            }
        }

        $prakerin = $this->nilaiPrakerinModel->getPilihKelas($pilihGuru, $pilihSemester, $pilihTahun)->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $guru = $this->userModel->getUser()->getResult();
        $data = [
            'judul' => 'Nilai Prakerin',
            'pguru' => $pilihGuru,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

            'prakerin' => $prakerin,
            'general' => $general,
            'siswa' => $siswa,
            'guru' => $guru,
        ];
        return view('pages/nilai_prakerin', $data);
    }

    public function save()
    {
        $data = [
            'guru_monitoring' => $this->request->getPost('pilih_guru'),
            'semester' => $this->request->getPost('pilih_semester'),
            'tahun_ajaran' => $this->request->getPost('pilih_tahun'),

            'id_siswa' => $this->request->getPost('siswa'),
            'nama_instansi' => $this->request->getPost('nama'),
            'alamat_instansi' => $this->request->getPost('alamat'),
            'waktu_mulai' => $this->request->getPost('waktu1'),
            'waktu_selesai' => $this->request->getPost('waktu2'),
            'nilai_prakerin' => $this->request->getPost('nilai')
        ];
        $this->nilaiPrakerinModel->saveNilaiPrakerin($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        session()->setFlashdata('guru', $this->request->getPost('pilih_guru'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaiprakerin/get');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_nilai');
        $data = array(
            'nama_instansi' => $this->request->getPost('nama'),
            'alamat_instansi' => $this->request->getPost('alamat'),
            'waktu_mulai' => $this->request->getPost('waktu1'),
            'waktu_selesai' => $this->request->getPost('waktu2'),
            'nilai_prakerin' => $this->request->getPost('nilai')
        );
        $this->nilaiPrakerinModel->editNilaiPrakerin($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        session()->setFlashdata('guru', $this->request->getPost('pilih_guru'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaiprakerin/get');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_nilai');
        $this->nilaiPrakerinModel->deleteNilaiPrakerin($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        session()->setFlashdata('guru', $this->request->getPost('pilih_guru'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaiprakerin/get');
    }
}
