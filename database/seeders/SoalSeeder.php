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
            'id_headerujian' => 1,
            'soal' => 'hewan apa yang berkaki dua ?'
        ]);

        Soal::create([
            'id_headerujian' => 1,
            'soal' => 'hewan apa yang berkaki empat ?'
        ]);

        // Soal::create([
        //     'id_detail_ujians' => 2,
        //     'soal' => 'Siapa penemu lampu ?'
        // ]);

        // Soal::create([
        //     'id_detail_ujians' => 2,
        //     'soal' => 'Siapa penemu telepon ?'
        // ]);
    }
}
