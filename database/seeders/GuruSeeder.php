<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            "id_user" => 2,
            "nama" => "tono",
            "nip" => "2128127",
            "tanggal_lahir" => "12-01-2000",
        ]);
    }
}
