<?php

namespace Database\Seeders;

use App\Models\jadwal_ujian;
use Illuminate\Database\Seeder;

class JadwalUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jadwal_ujian::create([
            'id_th_akademiks' => 1,
            // 'tanggal_ujian' => '2023-03-03',
            // 'waktu_ujian' => '01:00:00',
            'jenis_ujian' => 'UTS',
            'id_mapels' => 1,
            'id_jenjangs' => 1,
        ]);
    }
}
