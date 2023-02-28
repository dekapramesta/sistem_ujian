<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            "username" => "admin",
            "email" => "admin123@gmail.com",
            "password" => bcrypt("admin123"),
            "jabatan" => "admin",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "guru",
            "email" => "guru123@gmail.com",
            "password" => bcrypt("guru123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "siswa",
            "email" => "siswa123@gmail.com",
            "password" => bcrypt("siswa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        User::create([
            "username" => "gurutini",
            "email" => "gurutini@gmail.com",
            "password" => bcrypt("guru123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);
    }
}
