<?php

namespace App\Controllers;

use App\Models\PanenModel;
use App\Models\KeuanganModel;

require_once APPPATH . 'Libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Laporan extends BaseController
{
   public function panen()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('panen');
        $builder->select('panen.*, tanaman.nama AS nama_tanaman');
        $builder->join('tanaman', 'panen.tanaman_id = tanaman.id');
        $builder->orderBy('panen.tanggal', 'desc');
        $query = $builder->get();

        $data['panen'] = $query->getResult(); // object-based
        return view('laporan/hasil_panen', $data);
    }


    public function keuangan()
    {
        $model = new KeuanganModel();
        $userId = session()->get('user_id');
        $data['keuangan'] = $model->where('user_id', $userId)->orderBy('tanggal', 'desc')->findAll();
        return view('laporan/keuangan', $data);
    }

    public function cetakPDFPanen()
    {
        $model = new \App\Models\PanenModel();
        $data['panen'] = $model->orderBy('tanggal', 'desc')->findAll();

        $html = view('laporan/pdf_panen', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan_Hasil_Panen.pdf', ['Attachment' => false]);
    }

    public function cetakPDFKeuangan()
    {
        $model = new \App\Models\KeuanganModel();
        $userId = session()->get('user_id');
        $data['keuangan'] = $model->where('user_id', $userId)->orderBy('tanggal', 'desc')->findAll();

        $html = view('laporan/pdf_keuangan', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('Laporan_Keuangan.pdf', ['Attachment' => false]);
    }
}
