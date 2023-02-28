<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '1',
            'nama_kelas' => 'ipa 1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '1',
            'nama_kelas' => 'ipa 2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '1',
            'nama_kelas' => 'ipa 3',
            'identitas' => Str::random(10),
        ]);
    }
}
