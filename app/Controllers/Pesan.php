<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Pesan extends Controller
{
    public function index()
    {
        return view('pesan_form');
    }

    public function submit()
    {
        $pesan = $this->request->getPost('isi_pesan');

        return view('pesan_form', ['pesan' => $pesan]);
    }
}