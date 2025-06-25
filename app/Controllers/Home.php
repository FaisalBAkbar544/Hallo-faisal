<?php

namespace App\Controllers;

use App\Models\UserModel; // ✅ WAJIB ditambahkan

class Home extends BaseController
{
    public function index(): string
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        return view('home_v', ['user' => $user]); // ✅ pastikan view ini ada di /app/Views
    }

    public function form($pesan)
    {
        $data["pesan"] = $pesan;
        return view('form_v', $data);
    }

    public function getIndex()
    {
        echo "ini get index";
    }

    public function getIndexx()
    {
        return view("content_v");
    }
}
