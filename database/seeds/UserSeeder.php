<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Sabrina',
            'role_id' => 1,
            'username' => 'sabsky',
            'email' => 'sabrina@admin.com',
            'password' => bcrypt('123456')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'role_id' => 2,
            'username' => 'myuser',
            'email' => 'user@yahoo.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'Bambang',
            'role_id' => 3,
            'username' => 'bambang',
            'email' => 'bambang@test.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'Nia',
            'role_id' => 4,
            'username' => 'niania',
            'email' => 'niania2@test.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'Nina',
            'role_id' => 5,
            'username' => 'ninabobo',
            'email' => 'ninabobo@test.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'Ujang',
            'role_id' => 6,
            'username' => 'ujang',
            'email' => 'ujang@test.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'tio',
            'role_id' => 7,
            'username' => 'mastio',
            'email' => 'mastio@test.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'asep',
            'role_id' => 8,
            'username' => 'asepnya',
            'email' => 'asepnya@test.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'niagara',
            'role_id' => 9,
            'username' => 'niagara',
            'email' => 'niagara@test.com',
            'password' => bcrypt('123456')
        ]);
        $user = User::create([
            'name' => 'student',
            'role_id' => 10,
            'username' => 'mystudent',
            'email' => 'student@yahoo.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('user');
    }
}
