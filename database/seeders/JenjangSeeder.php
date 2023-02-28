<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenjang::create([
            'nama_jenjang'=> '10',
            'identitas' => Str::random(10),
        ]);

        Jenjang::create([
            'nama_jenjang'=> '11',
            'identitas' => Str::random(10),
        ]);

        Jenjang::create([
            'nama_jenjang'=> '12',
            'identitas' => Str::random(10),
        ]);
    }
}
