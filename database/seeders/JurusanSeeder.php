<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::create([
            'nama_jurusan' => 'MIPA',
            'identitas' => Str::random(10),
        ]);
        Jurusan::create([
            'nama_jurusan' => 'IPS',
            'identitas' => Str::random(10),
        ]);
    }
}
