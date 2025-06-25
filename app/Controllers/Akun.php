<?php

namespace App\Controllers;
use App\Models\UserModel;

class Akun extends BaseController
{
    public function ubah()
    {
        $userId = session()->get('user_id');
        $model = new UserModel();
        $data['user'] = $model->find($userId);
        return view('akun/ubah_akun', $data);
    }

    public function prosesUbah()
    {
        $userId = session()->get('user_id');
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        if ($password = $this->request->getPost('password')) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $model->update($userId, $data);
        return redirect()->to('/akun/ubah')->with('message', 'Akun berhasil diperbarui');
    }

    public function profil()
    {
        $userId = session()->get('user_id');
        $model = new UserModel();
        $data['user'] = $model->find($userId);
        return view('akun/ubah_profil', $data);
    }

    public function prosesProfil()
    {
        $userId = session()->get('user_id');
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
        ];

        $model->update($userId, $data);
        return redirect()->to('/akun/profil')->with('message', 'Profil berhasil diperbarui');
    }
}
