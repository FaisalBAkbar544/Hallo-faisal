<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Dashboard extends Controller
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $userModel = new UserModel();
        $data['users'] = $userModel->paginate(10); // 10 data per halaman
        $data['pager'] = $userModel->pager;

        return view('dashboard', $data);
    }
}
