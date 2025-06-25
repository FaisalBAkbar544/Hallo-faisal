<?php
namespace App\Models;

use CodeIgniter\Model;

class PanenModel extends Model
{
    protected $table = 'panen';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tanaman_id', 'tanggal', 'jumlah', 'kualitas',
        'estimasi_panen_berikut', 'distribusi_jual',
        'distribusi_konsumsi', 'distribusi_simpan', 'created_at'
    ];
    protected $useTimestamps = true;
}
