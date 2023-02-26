<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Mapel::create([
            'id_jurusan' => '1',
            'nama_mapel' => 'Biologi',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '1',
            'nama_mapel' => 'Fisika',
            'identitas' => Str::random(10),
        ]);
    }
}
