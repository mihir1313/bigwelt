<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'mihir',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'status'   => 1,
                'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'user2',
                'password' => password_hash('testinguser', PASSWORD_DEFAULT),
                'status'   => 1,
                'created_at' => date('Y-m-d H:i:s'),
                // 'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
