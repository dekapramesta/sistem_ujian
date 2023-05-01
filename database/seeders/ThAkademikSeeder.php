<?php

namespace Database\Seeders;

use App\Models\ThAkademik;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ThAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThAkademik::create([
            'th_akademik' => '2022/2023',
            'nama_semester' => 'Genap',
            'identitas' => Str::random(10),
        ]);

        ThAkademik::create([
            'th_akademik' => '2022/2023',
            'nama_semester' => 'Ganjil',
            'identitas' => Str::random(10),
        ]);
    }
}
