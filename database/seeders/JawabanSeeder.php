<?php

namespace Database\Seeders;

use App\Models\Jawaban;
use Illuminate\Database\Seeder;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jawaban::create([
            'id_soals' => 1,
            'jawaban'   => 'Kambing',
            'status'    => 0
        ]);

        Jawaban::create([
            'id_soals' => 1,
            'jawaban'   => 'Gajah',
            'status'    => 0
        ]);

        Jawaban::create([
            'id_soals' => 1,
            'jawaban'   => 'Ayam',
            'status'    => 1
        ]);

        Jawaban::create([
            'id_soals' => 1,
            'jawaban'   => 'Sapi',
            'status'    => 0
        ]);

        Jawaban::create([
            'id_soals' => 1,
            'jawaban'   => 'Kura-Kura',
            'status'    => 0
        ]);
    }
}
