<?php

namespace Database\Seeders;

use App\Models\mst_mapel_guru_kelas;
use Illuminate\Database\Seeder;

class MstMapelGuruKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mst_mapel_guru_kelas::create([
            'id_mapels' => 1,
            'id_gurus' => 1,
            'id_kelas' => 1,
            'id_jenjang' => 1,
        ]);

        mst_mapel_guru_kelas::create([
            'id_mapels' => 2,
            'id_gurus' => 1,
            'id_kelas' => 1,
            'id_jenjang' => 1,
        ]);

        mst_mapel_guru_kelas::create([
            'id_mapels' => 2,
            'id_gurus' => 1,
            'id_kelas' => 1,
            'id_jenjang' => 2,
        ]);
    }
}
