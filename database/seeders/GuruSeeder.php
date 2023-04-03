<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            "id_user" => 2,
            "nama" => "tono",
            "nip" => "2128127",
            "tanggal_lahir" => "1970-01-12"
        ]);

        Guru::create([
            "id_user" => 3,
            "nama" => "Diyah Kumalasari, S.Pd",
            "nip" => "197404012003122008",
            "tanggal_lahir" => "1974-04-01"
        ]);

        Guru::create([
            "id_user" => 4,
            "nama" => "Resmiati, S.Pd",
            "nip" => "196812282007012021",
            "tanggal_lahir" => "1968-12-28"
        ]);

        Guru::create([
            "id_user" => 5,
            "nama" => "Dita Suprapti, S.Pd",
            "nip" => "197412172005012006",
            "tanggal_lahir" => "1974-12-17"
        ]);

        Guru::create([
            "id_user" => 6,
            "nama" => "Heri Wahyuningsih, S.Pd",
            "nip" => "197801112005012009",
            "tanggal_lahir" => "1978-01-11"
        ]);
    }
}
