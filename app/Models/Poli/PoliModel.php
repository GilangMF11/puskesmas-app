<?php

namespace App\Models\Poli;

use CodeIgniter\Model;

class PoliModel extends Model
{
    protected $table            = 'polis';
    protected $primaryKey       = 'id';
    
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
   
}
