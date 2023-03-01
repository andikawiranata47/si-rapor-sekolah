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
            'judul' => 'Master User',
            'user' => $user,
        ];
        return view('pages/master_user', $data);
    }

    public function save()
    {
        if ($this->request->getPost('akses') !== null) {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
                'akses' => implode(", ", $this->request->getPost('akses'))
            ];
        } else {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
            ];
        }

        $this->masterUserModel->saveUser($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/masteruser');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_user');
        if ($this->request->getPost('akses') !== null) {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
                'akses' => implode(", ", $this->request->getPost('akses'))
            ];
        } else {
            $data = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
            ];
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
