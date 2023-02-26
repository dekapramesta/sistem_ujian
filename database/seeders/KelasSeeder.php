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
            'nama_kelas' => '1',
            'identitas' => Str::random(10),
        ]);
    }
}
