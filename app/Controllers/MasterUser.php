<?php

namespace App\Controllers;

use App\Models\MasterUserModel;

class MasterUser extends BaseController
{

    protected $masterUserModel, $hakAksesModel;
    public function __construct()
    {
        $this->masterUserModel = new MasterUserModel();
    }

    public function index()
    {
        $user = $this->masterUserModel->getUser()->getResult();
        $data = [
            'judul' => 'User',
            'user' => $user,
        ];
        return view('pages/master_user', $data);
    }

    public function save()
    {
        // $old = $this->request->getPost('ttd_old');

        $ttd = $this->request->getFile('ttd');

        // $id = $this->request->getPost('id_user');
        if (file_exists($ttd)) {
            $ttd->move('uploads/ttd/', $ttd->getName());
            // unlink("uploads/ttd/$old");
        }
        if ($this->request->getPost('akses') !== null) {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
                'nip' => $this->request->getPost('nip'),
                'ttd' => $ttd->getName(),
                'akses' => implode(", ", $this->request->getPost('akses'))
            ];
        } else {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
                'ttd' => $ttd->getName(),
                'nip' => $this->request->getPost('nip')
            ];
        }

        $this->masterUserModel->saveUser($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/masteruser');
    }

    public function edit()
    {
        $old = $this->request->getPost('ttd_old');

        $ttd = $this->request->getFile('ttd');

        $id = $this->request->getPost('id_user');
        if (file_exists($ttd)) {
            $ttd->move('uploads/ttd/', $ttd->getName());
            if ($this->request->getPost('akses') !== null) {
                $data = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                    'nip' => $this->request->getPost('nip'),
                    'ttd' => $ttd->getName(),
                    'akses' => implode(", ", $this->request->getPost('akses'))
                ];
            } else {
                $data = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                    'ttd' => $ttd->getName(),
                    'nip' => $this->request->getPost('nip')
                ];
            }
            try {
                unlink("uploads/ttd/$old");
            } catch (\Exception $e) {
            }
        } else {
            if ($this->request->getPost('akses') !== null) {
                $data = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                    'nip' => $this->request->getPost('nip'),
                    // 'ttd' => $ttd->getName(),
                    'akses' => implode(", ", $this->request->getPost('akses'))
                ];
            } else {
                $data = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'nama' => $this->request->getPost('nama'),
                    // 'ttd' => $ttd->getName(),
                    'nip' => $this->request->getPost('nip')
                ];
            }
        }
        $this->masterUserModel->updateUser($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/masteruser');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_user');
        $this->masterUserModel->deleteUser($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/masteruser');
    }
}
