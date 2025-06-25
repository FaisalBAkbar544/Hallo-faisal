<?php
namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'keuangan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'tanggal', 'jenis', 'kategori', 'nominal', 'keterangan', 'created_at'];
    protected $useTimestamps = true;
}
