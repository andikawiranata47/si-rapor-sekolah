<?php

namespace App\Controllers;

use App\Models\MasterUserModel;

class Login extends BaseController
{
    protected $session;
    public function index()
    {
        $session = session();
        if ($session->get('logged_in')) {
            return redirect()->to('/welcome');
        } else {
            $data = [
                'judul' => 'Login'
            ];
            helper(['form']);
            return view('pages/login', $data);
        }
    }

    public function auth()
    {
        $session = session();
        $model = new MasterUserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('Email', $email)->first();

        if ($data) {
            $pass = $data['Password'];
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $verify_pass = password_verify($password, $hash);
            if ($verify_pass) {
                $ses_data = [
                    'id_user'       => $data['Id_User'],
                    'nama'          => $data['Nama'],
                    'email'         => $data['Email'],
                    'akses'         => $data['Akses'],
                    'wali'          => $data['Is_Wali_Kelas'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/welcome');
            } else {
                $session->setFlashdata('pesan', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('pesan', 'Email tidak terdaftar');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
