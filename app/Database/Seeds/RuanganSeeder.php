<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Ruangan\RuanganModel;

class RuanganSeeder extends Seeder
{
    public function run()
    {
        $ruanganModel = new RuanganModel();
        $data = [
            [
                'kd_ruangan' => 'R001',
                'nm_ruangan' => 'Ruangan 1'
            ],
            [
                'kd_ruangan' => 'R002',
                'nm_ruangan' => 'Ruangan 2'
            ]
            ];

        foreach ($data as $ruang) {
            $ruanganModel->insert($ruang);
        }

    }
}
