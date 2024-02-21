<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'company_name' => 'PT. HIT',
            'company_phone'    => '086756764323',
            'company_address'    => 'Jl. ABC',
            'created_at'    => Time::now(),
            'UPDATED_AT'    => Time::now(),
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('company_info')->insert($data);
    }
}
