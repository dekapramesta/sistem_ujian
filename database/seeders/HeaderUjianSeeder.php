<?php

namespace Database\Seeders;

use App\Models\HeaderUjian;
use Illuminate\Database\Seeder;

class HeaderUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HeaderUjian::create([
            'id_jadwalujian' => 1,
            'id_gurus' => 1,
            'id_jenjangs' => 1,
            'status' => 1
        ]);
    }
}
