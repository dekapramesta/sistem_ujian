<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id_user' => '1',
            'nama' => 'Silvy',
            "no_telp" => "081230185768",
            // "email" => "admin123@gmail.com",
        ]);
    }
}
