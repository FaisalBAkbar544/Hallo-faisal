<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function index()
    {
        return view('register_v');
    }

    public function submit()
{
    $userModel = new UserModel();

    $data = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
      'password' => $this->request->getPost('password'),
    ];

    $userModel->insert($data);
    session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
    return redirect()->to(base_url('login'));
}

}

