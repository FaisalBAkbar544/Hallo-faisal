<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    protected $helpers = ['form'];
    public function getIndex()
    {
        return view("form_v");
    }

    public function postLogin()
    {
        $rules = [
            'username' => ['label' => 'Username', 'rules' => 'required'],
            'nama' => ['label' => 'Nama', 'rules' => 'required'],
        ];

        $validation = service('validation');
        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            // masuk ke if arti validasi gagal
            echo "validasi gagal";
        return;
      }
      echo "validasi sukses";
    }
}
