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
            'password' => bcrypt('123456'),
            'img' => 'clevio.png',
            'grade' => '',
            'department' => '',
            'address' => 'Jakarta'
        ]);
        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'Novandi',
            'role_id' => 1,
            'username' => 'vandibanget',
            'email' => 'novandi@admin.com',
            'password' => bcrypt('123456'),
            'img' => '3m.jpeg',
            'grade' => '',
            'department' => '',
            'address' => 'Surabaya'
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Bambang',
            'role_id' => 2,
            'username' => 'bambang',
            'email' => 'bambang@test.com',
            'password' => bcrypt('123456'),
            'img' => '3m.jpeg',
            'grade' => 'Kelas 10',
            'department' => 'IPS',
            'address' => 'Cibubur'
        ]);
        $user->assignRole('user');
        $user = User::create([
            'name' => 'Nia',
            'role_id' => 2,
            'username' => 'niania',
            'email' => 'niania2@test.com',
            'password' => bcrypt('123456'),
            'img' => 'cerita2.jpg',
            'grade' => 'Kelas 12',
            'department' => 'IPA',
            'address' => 'Depok'
        ]);
        $user->assignRole('user');
        $user = User::create([
            'name' => 'Nina',
            'role_id' => 2,
            'username' => 'ninabobo',
            'email' => 'ninabobo@test.com',
            'password' => bcrypt('123456'),
            'img' => 'cerita2.jpg',
            'grade' => 'Kelas 12',
            'department' => 'IPS',
            'address' => 'Bogor'
        ]);
        $user->assignRole('user');
        $user = User::create([
            'name' => 'Ujang',
            'role_id' => 2,
            'username' => 'ujang',
            'email' => 'ujang@test.com',
            'password' => bcrypt('123456'),
            'img' => 'background.png',
            'grade' => 'Kelas 11',
            'department' => 'IPA',
            'address' => 'Cikarang'
        ]);
        $user->assignRole('user');
        $user = User::create([
            'name' => 'tio',
            'role_id' => 2,
            'username' => 'mastio',
            'email' => 'mastio@test.com',
            'password' => bcrypt('123456'),
            'img' => 'cerita2.jpg',
            'grade' => 'Kelas 11',
            'department' => 'IPA',
            'address' => 'Malang'
        ]);
        $user->assignRole('user');
        $user = User::create([
            'name' => 'asep',
            'role_id' => 2,
            'username' => 'asepnya',
            'email' => 'asepnya@test.com',
            'password' => bcrypt('123456'),
            'img' => 'indo.jpg',
            'grade' => 'Kelas 10',
            'department' => 'IPS',
            'address' => 'Tangerang'
        ]);
        $user->assignRole('user');
        $user = User::create([
            'name' => 'niagara',
            'role_id' => 2,
            'username' => 'niagara',
            'email' => 'niagara@test.com',
            'password' => bcrypt('123456'),
            'img' => 'indo.jpg',
            'grade' => 'Kelas 10',
            'department' => 'IPA',
            'address' => 'Bandung'
        ]);
        $user->assignRole('user');
        $user = User::create([
            'name' => 'student',
            'role_id' => 2,
            'username' => 'mystudent',
            'email' => 'student@yahoo.com',
            'password' => bcrypt('123456'),
            'img' => 'logo.png',
            'grade' => 'Kelas 10',
            'department' => 'IPA',
            'address' => 'Jakarta'
        ]);
        $user->assignRole('user');
    }
}
