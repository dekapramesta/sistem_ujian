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
        $admin=User::create([
            "name"=>"admin",
            "email"=>"admin123@gmail.com",
            "password"=>bcrypt("admin123")
        ]);
        $admin->assignRole("admin");

        $guru=User::create([
            "name"=>"guru",
            "email"=>"guru123@gmail.com",
            "password"=>bcrypt("guru123")
        ]);
        $guru->assignRole("guru");

        $siswa=User::create([
            "name"=>"siswa",
            "email"=>"siswa123@gmail.com",
            "password"=>bcrypt("siswa123")
        ]);
        $siswa->assignRole("siswa");
    }
}
