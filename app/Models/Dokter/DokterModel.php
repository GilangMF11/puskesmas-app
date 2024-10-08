<?php

namespace App\Models\Dokter;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'spesialis', 'telepon', 'email', 'alamat'];
    protected $useTimestamps = true;
}
