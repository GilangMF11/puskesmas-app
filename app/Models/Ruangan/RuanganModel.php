<?php

namespace App\Models\Ruangan;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table            = 'ruangan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'kd_ruangan', 'nm_ruangan'];

}
