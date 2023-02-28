<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ThAkademikSeeder::class,
            JurusanSeeder::class,
            MapelSeeder::class,
            JenjangSeeder::class,
            KelasSeeder::class,
            AdminSeeder::class,
            SiswaSeeder::class,
            GuruSeeder::class,
            JadwalUjianSeeder::class,
            MstMapelGuruKelasSeeder::class,
            DetailUjianSeeder::class,
            SoalSeeder::class,
            PesertaUjianSeeder::class,
            JawabanSeeder::class,
        ]);
    }
}
