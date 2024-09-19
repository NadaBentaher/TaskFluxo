<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>password_hash('12345',PASSWORD_BCRYPT),
            'Mobile_Number'=>12345678,
            'role'=>'admin',
        );
        $this->db->table('users')->insert($data);
    }   
}
