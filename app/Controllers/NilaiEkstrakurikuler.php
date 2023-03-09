<?php

namespace App\Controllers;

use App\Models\NilaiEkstrakurikulerModel;
use App\Models\SiswaModel;
use App\Models\GeneralModel;
use App\Models\MasterUserModel;

class NilaiEkstrakurikuler extends BaseController
{
    protected $nilaiEkstraModel, $siswaModel, $generalModel, $userModel;
    public function __construct()
    {
        $this->nilaiEkstraModel = new NilaiEkstrakurikulerModel();
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
        
        $ekstra = $this->nilaiEkstraModel->getNilaiEkstra()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $guru = $this->userModel->getUser()->getResult();
        $data = [
            'judul' => 'Nilai Ekstrakurikuler',
            'pguru' => $pilihGuru,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

            'ekstra' => $ekstra,
            'general' => $general,
            'siswa' => $siswa,
            'guru' => $guru
        ];
        return view('pages/nilai_ekstrakurikuler', $data);
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
        
        $ekstra = $this->nilaiEkstraModel->getNilaiEkstra()->getResult();
        $general = $this->generalModel->getGeneral()->getResult();
        $siswa = $this->siswaModel->getSiswa()->getResult();
        $guru = $this->userModel->getUser()->getResult();
        $data = [
            'judul' => 'Nilai Ekstrakurikuler',
            'pguru' => $pilihGuru,
            'psemester' => $pilihSemester,
            'ptahun' => $pilihTahun,

            'ekstra' => $ekstra,
            'general' => $general,
            'siswa' => $siswa,
            'guru' => $guru
        ];
        return view('pages/nilai_ekstrakurikuler', $data);
    }

    public function save()
    {
        $data = [
            'pembina' => $this->request->getPost('pilih_guru'),
            'semester' => $this->request->getPost('pilih_semester'),
            'tahun_ajaran' => $this->request->getPost('pilih_tahun'),

            'id_siswa' => $this->request->getPost('siswa'),
            'nama_ekstrakurikuler' => $this->request->getPost('nama'),
            'predikat' => $this->request->getPost('predikat')
        ];
        $this->nilaiEkstraModel->saveNilaiEkstra($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        session()->setFlashdata('guru', $this->request->getPost('pilih_guru'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaiekstrakurikuler/get');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_ekstra');
        $data = [
            'nama_ekstrakurikuler' => $this->request->getPost('nama'),
            'predikat' => $this->request->getPost('predikat')
        ];
        $this->nilaiEkstraModel->editNilaiEkstra($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        session()->setFlashdata('guru', $this->request->getPost('pilih_guru'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaiekstrakurikuler/get');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_ekstra');
        $this->nilaiEkstraModel->deleteNilaiEkstra($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        session()->setFlashdata('guru', $this->request->getPost('pilih_guru'));
        session()->setFlashdata('semester', $this->request->getPost('pilih_semester'));
        session()->setFlashdata('tahun', $this->request->getPost('pilih_tahun'));
        return redirect()->to('/nilaiekstrakurikuler/get');
    }
}
