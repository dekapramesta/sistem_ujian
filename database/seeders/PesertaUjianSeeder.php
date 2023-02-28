<?php

namespace Database\Seeders;

use App\Models\PesertaUjian;
use Illuminate\Database\Seeder;

class PesertaUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PesertaUjian::create([
            'id_siswas' => 1,
            'id_detail_ujians' => 1,
        ]);
    }
}
