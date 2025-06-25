<?php
namespace App\Models;

use CodeIgniter\Model;

class TanamanModel extends Model
{
    
    protected $table = 'tanaman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nama', 'jenis', 'varietas', 'lokasi', 'tanggal_tanam', 'status', 'created_at'];
    protected $useTimestamps = true;

}

