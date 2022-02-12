<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::whereName('admin')->first();

        $staffRole = Role::whereName('staff')->first();

        $userRole = Role::whereName('user')->first();

        $user = User::create([
            'name' => 'Adam',
            'lastname' => 'Maleon',
            'email' => 'adam@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole($adminRole);
        $user->assignRole($staffRole);
        $user->assignRole($userRole);

        $user = User::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole($staffRole);

        $user = User::create([
            'name' => 'Jane',
            'lastname' => 'Daen',
            'email' => 'jane@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole($userRole);
    }
}
