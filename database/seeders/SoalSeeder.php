<?php

namespace Database\Seeders;

use App\Models\Soal;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Soal::create([
            'id_detail_ujians' => 1,
            'soal' => 'hewan apa yang berkaki dua ?'
        ]);
    }
}
