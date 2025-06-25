<?php

namespace App\Controllers;

use App\Models\TanamanModel;

class Tanaman extends BaseController
{
    public function index()
    {
        $model = new TanamanModel();
        $data['tanaman'] = $model->where('user_id', session()->get('user_id'))->findAll();
        return view('tanaman/index', $data);
    }

    public function tambah()
    {
        return view('tanaman/tambah');
    }

    public function simpan()
    {
        $model = new TanamanModel();
        $model->save([
            'user_id' => session()->get('user_id'),
            'nama' => $this->request->getPost('nama'),
            'jenis' => $this->request->getPost('jenis'),
            'varietas' => $this->request->getPost('varietas'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_tanam' => $this->request->getPost('tanggal_tanam'),
            'status' => $this->request->getPost('status'),
        ]);
        return redirect()->to('/tanaman');
    }

    public function edit($id)
    {
        $model = new TanamanModel();
        $data['tanaman'] = $model->find($id);
        return view('tanaman/edit', $data);
    }

    public function update($id)
    {
        $model = new TanamanModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/tanaman');
    }

    // app/Controllers/Tanaman.php
   // Controller: app/Controllers/Tanaman.php
    public function delete($id)
    {
        $model = new \App\Models\TanamanModel();
        $model->delete($id);
        return redirect()->to('/tanaman')->with('success', 'Data tanaman berhasil dihapus.');
    }



    public function filter()
    {
        $model = new TanamanModel();
        $jenis = $this->request->getGet('jenis');
        $lokasi = $this->request->getGet('lokasi');
        $status = $this->request->getGet('status');

        $query = $model->where('user_id', session()->get('user_id'));
        if ($jenis) $query->like('jenis', $jenis);
        if ($lokasi) $query->like('lokasi', $lokasi);
        if ($status) $query->where('status', $status);

        $data['tanaman'] = $query->findAll();
        return view('tanaman/index', $data);
    }
}
