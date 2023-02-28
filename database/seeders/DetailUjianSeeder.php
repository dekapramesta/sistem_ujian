<?php

namespace Database\Seeders;

use App\Models\DetailUjian;
use Illuminate\Database\Seeder;

class DetailUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailUjian::create([
            'id_jadwal_ujians' => 1,
            'id_mst_mapel_guru_kelas' => 1,
            'status' => 1,
        ]);
    }
}
