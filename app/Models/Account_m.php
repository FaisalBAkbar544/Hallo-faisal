<?php

namespace App\Models;

use CodeIgniter\Model;

class Account_m extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'username';
    protected $allowedFields = ['username', 'password','nama'];
} 