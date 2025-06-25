<?php
namespace App\Controllers;

use App\Models\KeuanganModel;

class Keuangan extends BaseController
{
    public function pengeluaran()
    {
        return view('keuangan/pengeluaran');
    }

    public function pemasukan()
    {
        return view('keuangan/pemasukan');
    }

   public function laporan()
    {
        $model = new \App\Models\KeuanganModel();
        $userId = session()->get('user_id');

        $keyword = $this->request->getGet('keyword');
        $sort = $this->request->getGet('sort');

        $builder = $model->where('user_id', $userId);

        if ($keyword) {
            $builder->groupStart()
                ->like('kategori', $keyword)
                ->orLike('keterangan', $keyword)
                ->groupEnd();
        }

        // Sorting
        if ($sort == 'nominal_asc') {
            $builder->orderBy('nominal', 'ASC');
        } elseif ($sort == 'nominal_desc') {
            $builder->orderBy('nominal', 'DESC');
        } else {
            $builder->orderBy('tanggal', 'DESC');
        }

        $data['keuangan'] = $builder->findAll();

        return view('keuangan/laporan', $data);
    }


    public function grafik()
    {
        return view('keuangan/grafik');
    }

    public function simpan_pengeluaran()
    {
        $model = new KeuanganModel();
        $model->save([
            'user_id' => session()->get('user_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jenis' => 'pengeluaran',
            'kategori' => $this->request->getPost('kategori'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);
        return redirect()->to(base_url('keuangan/laporan'));
    }

    public function simpan_pemasukan()
    {
        $model = new KeuanganModel();
        $model->save([
            'user_id' => session()->get('user_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'jenis' => 'pemasukan',
            'kategori' => $this->request->getPost('kategori'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);
        return redirect()->to(base_url('keuangan/laporan'));
    }

    public function dataGrafik()
    {
        $model = new \App\Models\KeuanganModel();
        $userId = session()->get('user_id');

        // Ambil data per bulan
        $result = $model
            ->select("MONTH(tanggal) as bulan, 
                    SUM(CASE WHEN jenis = 'pemasukan' THEN nominal ELSE 0 END) as total_pemasukan,
                    SUM(CASE WHEN jenis = 'pengeluaran' THEN nominal ELSE 0 END) as total_pengeluaran")
            ->where('user_id', $userId)
            ->groupBy('MONTH(tanggal)')
            ->orderBy('bulan')
            ->findAll();

        return $this->response->setJSON($result);
    }

}


