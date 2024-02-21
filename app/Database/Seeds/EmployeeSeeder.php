<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'employee_name' => 'Andi',
            'company_id' => '1',
            'employee_gender' => 0,
            'employee_birthday'    => '1990-06-21',
            'employee_picture'    => '4.jpg',
            'employee_phone'    => '085643541347',
            'created_at'    => Time::now(),
            'UPDATED_AT'    => Time::now(),
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('employee_info')->insert($data);
    }
}
