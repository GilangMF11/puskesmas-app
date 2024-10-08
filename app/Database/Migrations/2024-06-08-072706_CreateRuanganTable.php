<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRuanganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'kd_ruangan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => true
            ],
            'nm_ruangan' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('ruangan');
    }

    public function down()
    {
        $this->forge->dropTable('ruangan');
    }
}
