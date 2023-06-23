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
            'nama_mapel' => 'Matematika',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '1',
            'nama_mapel' => 'Bahasa Indonesia',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '1',
            'nama_mapel' => 'Bahasa Inggris',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '1',
            'nama_mapel' => 'Fisika',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '1',
            'nama_mapel' => 'Kimia',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '2',
            'nama_mapel' => 'Matematika',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '2',
            'nama_mapel' => 'Bahasa Indonesia',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '2',
            'nama_mapel' => 'Bahasa Inggris',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '2',
            'nama_mapel' => 'Ekonomi',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '2',
            'nama_mapel' => 'Sosiologi',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '2',
            'nama_mapel' => 'Geografi',
            'identitas' => Str::random(10),
        ]);

        Mapel::create([
            'id_jurusan' => '2',
            'nama_mapel' => 'Sejarah',
            'identitas' => Str::random(10),
        ]);
    }
}
