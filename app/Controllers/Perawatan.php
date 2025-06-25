<?php

namespace App\Controllers;

use App\Models\PerawatanModel;

class Perawatan extends BaseController
{
    public function index($tanaman_id)
    {
        $model = new PerawatanModel();
        $data['perawatan'] = $model->where('tanaman_id', $tanaman_id)->orderBy('tanggal', 'desc')->findAll();
        $data['tanaman_id'] = $tanaman_id;
        return view('perawatan/index', $data);
    }

    public function simpan()
    {
        $model = new PerawatanModel();
        $model->save([
            'tanaman_id' => $this->request->getPost('tanaman_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'catatan' => $this->request->getPost('catatan'),
        ]);
        return redirect()->to('/perawatan/' . $this->request->getPost('tanaman_id'));
    }
}
