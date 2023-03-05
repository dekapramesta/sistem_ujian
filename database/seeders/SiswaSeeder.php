<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'id_user' => '3',
            'id_jenjang' => '1',
            'id_kelas' => '1',
            'nama' => 'anggita',
            'nis' => '274526',
            'tanggal_lahir' => '20-02-2002'
        ]);
        Siswa::create([
            'id_user' => '4',
            'id_jenjang' => '1',
            'id_kelas' => '2',
            'nama' => 'mamad',
            'nis' => '12612',
            'tanggal_lahir' => '20-02-2002'
        ]);
    }
}
