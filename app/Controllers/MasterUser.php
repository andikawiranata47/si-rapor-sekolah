<?php

namespace App\Controllers;

use App\Models\HakAksesModel;
use App\Models\MasterUserModel;

class MasterUser extends BaseController
{
    // protected $masterUserModel;
    // public function __construct()
    // {
    //     $this->masterUserModel = new MasterUserModel();
    // }

    // public function index()
    // {
    //     $user = $this->masterUserModel->findAll();
    //     $data = [
    //         'judul' => 'Master User',
    //         'user' => $user
    //         // 'validation' => \Config\Services::validation()
    //     ];
    //     return view('pages/master_user', $data);
    // }

    // public function save()
    // {
    //     // if (!$this->validate([
    //     //     'email' => 'required|is_unique[user.email]'
    //     // ])) {
    //     //     $validation = \Config\Services::validation();
    //     //     return redirect()->to('/masteruser')->withInput()->with('validation', $validation);
    //     // }
    //     $this->masterUserModel->save([
    //         'email' => $this->request->getVar('email'),
    //         'password' => $this->request->getVar('password'),
    //         'nama' => $this->request->getVar('nama')
    //     ]);
    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    //     return redirect()->to('/masteruser');
    // }

    // public function edit()
    // {
    //     $id = $this->request->getVar('');
    //     $data = [
    //         'email' => $this->request->getVar('email'),
    //         'password' => $this->request->getVar('password'),
    //         'nama' => $this->request->getVar('nama')
    //     ];
    //     $this->masterUserModel->update($data);

    //     session()->setFlashdata('pesan', 'Data berhasil diubah');
    //     return redirect()->to('/masteruser');
    // }

    // public function delete($id)
    // {
    //     $this->masterUserModel->delete($id);

    //     session()->setFlashdata('pesan', 'Data berhasil dihapus');
    //     return redirect()->to('/masteruser');
    // }

    protected $masterUserModel;
    public function __construct()
    {
        $this->masterUserModel = new MasterUserModel();
        $this->hakAksesModel = new HakAksesModel();
    }

    public function index()
    {
        $user = $this->masterUserModel->getUser()->getResult();
        $data = [
            'judul' => 'Master User',
            'user' => $user
            // 'validation' => \Config\Services::validation()
        ];
        return view('pages/master_user', $data);
    }

    public function save()
    {
        $data1 = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama')
            // 'hak_akses' => $this->request
            // 'hak_akses' => $this->hakAksesModel->getConcat()->getResult()
        ];
        $data2 = [
            'id_user' => $this->masterUserModel->saveUser($data1),
            'hak_akses' => $this->request->getPost('hak_akses')
        ];

        $this->hakAksesModel->saveHak($data2);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/masteruser');
    }

    public function edit()
    {
        $id = $this->request->getPost('id_user');
        $data = array(
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
        );
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
