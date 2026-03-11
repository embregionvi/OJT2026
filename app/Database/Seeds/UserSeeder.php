<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider();

        $user = new User([
            'username' => 'admin',
            'email'    => 'admin@example.com',
            'password' => 'admin123',
        ]);

        $users->save($user);

        // To get the complete user object with ID, we need to find it again
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $user->addGroup('superadmin');
    }
}
