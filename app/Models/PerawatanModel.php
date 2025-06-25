<?php
namespace App\Models;
use CodeIgniter\Model;

class PerawatanModel extends Model
{
    protected $table = 'perawatan_tanaman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanaman_id', 'tanggal', 'kegiatan', 'catatan', 'created_at'];
    protected $useTimestamps = true;
}
