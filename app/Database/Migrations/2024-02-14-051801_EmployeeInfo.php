<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmployeeInfo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'employee_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'company_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'employee_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'employee_gender' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'employee_birthday' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'employee_picture' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'employee_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
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
        $this->forge->addKey('employee_id', true);
        $this->forge->addForeignKey('company_id', 'company_info', 'company_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('employee_info');
    }

    public function down()
    {
        $this->forge->dropTable('employee_info');
    }
}