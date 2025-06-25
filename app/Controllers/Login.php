<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function index()
    {
        return view('login_v');
    }

   public function authenticate()
{
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $userModel = new UserModel();
    $user = $userModel->where('email', $email)->first();

    if ($user && $password === $user['password']) {
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'logged_in' => true
        ]);
        return redirect()->to(base_url('dashboard'));
    } else {
        session()->setFlashdata('error', 'Email atau password salah!');
        return redirect()->to(base_url('login'));
    }
}

    public function getAccount(){
        $accountModel = new \App\Models\Account_m();
        $data = [
            'username'  => 'darth',
            'password'  => md5("admin"),
            'nama'      => 'darth'
        ];
        echo "sebelum insert";
        print_r($accountModel->findall());
        $accountModel->insert($data);
        echo "sesudah insert";
        print_r($accountModel->findall());
    }
}


