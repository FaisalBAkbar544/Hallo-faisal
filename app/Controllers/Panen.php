<?php
namespace App\Controllers;

use App\Models\PanenModel;

class Panen extends BaseController
{
    public function index($tanaman_id)
    {
        $model = new PanenModel();
        $data['panen'] = $model->where('tanaman_id', $tanaman_id)->orderBy('tanggal', 'desc')->findAll();
        $data['tanaman_id'] = $tanaman_id;
        return view('panen/index', $data);
    }

    public function simpan()
    {
        $model = new PanenModel();
        $model->save([
            'tanaman_id' => $this->request->getPost('tanaman_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jumlah' => $this->request->getPost('jumlah'),
            'kualitas' => $this->request->getPost('kualitas'),
            'estimasi_panen_berikut' => $this->request->getPost('estimasi'),
            'distribusi_jual' => $this->request->getPost('jual'),
            'distribusi_konsumsi' => $this->request->getPost('konsumsi'),
            'distribusi_simpan' => $this->request->getPost('simpan'),
        ]);
        return redirect()->to('/panen/' . $this->request->getPost('tanaman_id'));
    }

    public function pilih($fitur)
    {
        $tanamanModel = new \App\Models\TanamanModel();
        $data['tanaman'] = $tanamanModel->findAll();
        $data['fitur'] = $fitur; // catat, riwayat, estimasi, distribusi
        return view('panen/pilih_tanaman', $data);
    }

    public function distribusi($tanaman_id)
    {
        $model = new \App\Models\PanenModel();

        // Ambil semua data panen dari tanaman ini
        $data['panen'] = $model->where('tanaman_id', $tanaman_id)->orderBy('tanggal', 'desc')->findAll();
        $data['tanaman_id'] = $tanaman_id;

        return view('panen/distribusi', $data);
    }

        public function catat($tanaman_id)
    {
        $data['tanaman_id'] = $tanaman_id;
        return view('panen/catat', $data);
    }

    public function riwayat($tanaman_id)
    {
        $model = new \App\Models\PanenModel();
        $data['panen'] = $model->where('tanaman_id', $tanaman_id)->orderBy('tanggal', 'desc')->findAll();
        return view('panen/riwayat', $data);
    }

    public function estimasi($tanaman_id)
    {
        $data['tanaman_id'] = $tanaman_id;
        return view('panen/estimasi', $data);
    }

    public function simpan_estimasi()
    {
        $model = new \App\Models\PanenModel();
        $model->save([
            'tanaman_id' => $this->request->getPost('tanaman_id'),
            'estimasi_panen_berikut' => $this->request->getPost('estimasi_panen_berikut')
        ]);
        return redirect()->to('/panen/estimasi/' . $this->request->getPost('tanaman_id'));
    }

    public function simpan_distribusi()
    {
        $model = new \App\Models\PanenModel();
        $model->save([
            'tanaman_id' => $this->request->getPost('tanaman_id'),
            'distribusi_jual' => $this->request->getPost('jual'),
            'distribusi_konsumsi' => $this->request->getPost('konsumsi'),
            'distribusi_simpan' => $this->request->getPost('simpan')
        ]);
        return redirect()->to('/panen/distribusi/' . $this->request->getPost('tanaman_id'));
    }



}
