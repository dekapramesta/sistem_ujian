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
            'nama_kelas' => '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '1',
            'nama_kelas' => '2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '1',
            'nama_kelas' => '3',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '1',
            'nama_kelas' => '4 ',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '1',
            'nama_kelas' => '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '1',
            'nama_kelas' => '2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '1',
            'nama_kelas' => '3',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '2',
            'nama_kelas' => '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '2',
            'nama_kelas' => '2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '2',
            'nama_kelas' => '3',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '2',
            'nama_kelas' => '4',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '2',
            'nama_kelas' => '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '2',
            'nama_kelas' => '2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '2',
            'nama_kelas' => '3',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '3',
            'nama_kelas' => '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '3',
            'nama_kelas' => '2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '3',
            'nama_kelas' => '3',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '1',
            'id_jenjang' => '3',
            'nama_kelas' => '4',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '3',
            'nama_kelas' => '1',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '3',
            'nama_kelas' => '2',
            'identitas' => Str::random(10),
        ]);

        Kelas::create([
            'id_jurusan' => '2',
            'id_jenjang' => '3',
            'nama_kelas' => '3',
            'identitas' => Str::random(10),
        ]);
    }
}
