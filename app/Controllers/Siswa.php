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
        $data = [
            'nis' => $this->request->getPost('nis'),
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            // 'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            // 'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            // 'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            // 'agama' => $this->request->getPost('agama'),
            // 'alamat' => $this->request->getPost('alamat'),
            // 'telp' => $this->request->getPost('telp'),
            // 'sekolah_asal' => $this->request->getPost('sekolah_asal'),
            // 'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            // 'nomor_lulus' => $this->request->getPost('nomor_lulus'),
            // 'diterima_tingkat' => $this->request->getPost('diterima_tingkat'),
            // 'diterima_tanggal' => $this->request->getPost('diterima_tanggal'),
            // 'nama_ayah' => $this->request->getPost('nama_ayah'),
            // 'kerja_ayah' => $this->request->getPost('kerja_ayah'),
            // 'nama_ibu' => $this->request->getPost('nama_ibu'),
            // 'kerja_ibu' => $this->request->getPost('kerja_ibu'),
            // 'alamat_ortu' => $this->request->getPost('alamat_ortu'),
            // 'telp_ortu' => $this->request->getPost('telp_ortu'),
            // 'nama_wali' => $this->request->getPost('nama_wali'),
            // 'alamat_wali' => $this->request->getPost('alamat_wali'),
            // 'telp_wali' => $this->request->getPost('telp_wali'),
            // 'kerja_wali' => $this->request->getPost('kerja_wali')
        ];
        $this->siswaModel->saveSiswa($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/siswa');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_siswa');
        $data = array(
            'nis' => $this->request->getPost('nis'),
            'nisn' => $this->request->getPost('nisn'),
            'nama' => $this->request->getPost('nama'),
            // 'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            // 'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            // 'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            // 'agama' => $this->request->getPost('agama'),
            // 'alamat' => $this->request->getPost('alamat'),
            // 'telp' => $this->request->getPost('telp'),
            // 'sekolah_asal' => $this->request->getPost('sekolah_asal'),
            // 'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            // 'nomor_lulus' => $this->request->getPost('nomor_lulus'),
            // 'diterima_tingkat' => $this->request->getPost('diterima_tingkat'),
            // 'diterima_tanggal' => $this->request->getPost('diterima_tanggal'),
            // 'nama_ayah' => $this->request->getPost('nama_ayah'),
            // 'kerja_ayah' => $this->request->getPost('kerja_ayah'),
            // 'nama_ibu' => $this->request->getPost('nama_ibu'),
            // 'kerja_ibu' => $this->request->getPost('kerja_ibu'),
            // 'alamat_ortu' => $this->request->getPost('alamat_ortu'),
            // 'telp_ortu' => $this->request->getPost('telp_ortu'),
            // 'nama_wali' => $this->request->getPost('nama_wali'),
            // 'alamat_wali' => $this->request->getPost('alamat_wali'),
            // 'telp_wali' => $this->request->getPost('telp_wali'),
            // 'kerja_wali' => $this->request->getPost('kerja_wali')
        );
        $this->siswaModel->updateSiswa($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/siswa');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_siswa');
        $this->siswaModel->deleteSiswa($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/siswa');
    }
}
