<?php

namespace Database\Seeders;

use App\Models\DetailUjian;
use Carbon\Carbon;
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
            'id_headerujian' => 1,
            'id_kelas' => 1,
            'tanggal_ujian' => Carbon::now(),
            'waktu_ujian'   => '90',
            'token' => "ajsasajsk",
            "status" => 1
        ]);
    }
}
