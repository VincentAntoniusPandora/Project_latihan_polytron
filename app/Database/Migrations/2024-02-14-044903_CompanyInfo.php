<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CompanyInfo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'company_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'company_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'company_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'company_address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('company_id', true);
        $this->forge->createTable('company_info');
    }

    public function down()
    {
        $this->forge->dropTable('company_info');
    }
}
