<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User\UserModel;
class UsersSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $data = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'roles' => 'Admin'
            ],
            [
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => password_hash('user', PASSWORD_DEFAULT),
                'roles' => 'User'
            ],
        ];
        foreach ($data as $user) {
            $userModel->insert($user);
        }
    }
}
