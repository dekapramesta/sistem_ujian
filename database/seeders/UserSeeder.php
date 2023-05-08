<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.

     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "username" => "admin123@gmail.com",
            "password" => bcrypt("admin123"),
            "jabatan" => "admin",
            "verified" => '1',

        ]);

        $guru = User::create([
            "username" => "guru123@gmail.com",
            "password" => bcrypt("guru123"),
            "jabatan" => "guru",
            "verified" => '1',
        ]);

        $guru = User::create([
            "username" => "kumala123@gmail.com",
            "password" => bcrypt("kumala123"),
            "jabatan" => "guru",
            "verified" => '1',
        ]);

        $guru = User::create([
            "username" => "resmiati123@gmail.com",
            "password" => bcrypt("resmiati123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "dita123@gmail.com",
            "password" => bcrypt("dita123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "heriwhy123@gmail.com",
            "password" => bcrypt("heri123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10554",
            "password" => bcrypt("adifan123"),
            "jabatan" => "siswa",
            "verified" => '1',
        ]);

        $siswa = User::create([
            "username" => "10602",
            "password" => bcrypt("arin123"),
            "jabatan" => "siswa",
            "verified" => '1',
        ]);

        $siswa = User::create([
            "username" => "10649",
            "password" => bcrypt("dennise123"),
            "jabatan" => "siswa",
            "verified" => '1',
        ]);

        $siswa = User::create([
            "username" => "10741",
            "password" => bcrypt("laila123"),
            "jabatan" => "siswa",
            "verified" => '1',

        ]);

        $siswa = User::create([
            "username" => "10851",
            "password" => bcrypt("sandi123"),
            "jabatan" => "siswa",
            "verified" => '1',

        ]);

         $siswa = User::create([
            "username" => "10584",
            "password" => bcrypt("ananta123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10607",
            "password" => bcrypt("astutik123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10731",
            "password" => bcrypt("kaila123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10821",
            "password" => bcrypt("rani123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10871",
            "password" => bcrypt("tata123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10217",
            "password" => bcrypt("afifah123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10289",
            "password" => bcrypt("della123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10359",
            "password" => bcrypt("hawa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10399",
            "password" => bcrypt("lefi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10474",
            "password" => bcrypt("rava123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10215",
            "password" => bcrypt("aditya123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10319",
            "password" => bcrypt("elsa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10370",
            "password" => bcrypt("indah123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10374",
            "password" => bcrypt("iqbal123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10387",
            "password" => bcrypt("khoirul123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10234",
            "password" => bcrypt("andika123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10306",
            "password" => bcrypt("dini123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10360",
            "password" => bcrypt("haydar123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10434",
            "password" => bcrypt("nadia123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10518",
            "password" => bcrypt("steven123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "09922",
            "password" => bcrypt("arlingga123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "09936",
            "password" => bcrypt("brian123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10045",
            "password" => bcrypt("mahmud123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10171",
            "password" => bcrypt("siti123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10187",
            "password" => bcrypt("uswatul123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "09895",
            "password" => bcrypt("akbar123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "09935",
            "password" => bcrypt("bintang123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "09999",
            "password" => bcrypt("guntur123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10096",
            "password" => bcrypt("oktiva123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10145",
            "password" => bcrypt("rizky123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09909",
            "password" => bcrypt("andrea123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "09915",
            "password" => bcrypt("anisa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "09945",
            "password" => bcrypt("david123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10023",
            "password" => bcrypt("intan123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "10049",
            "password" => bcrypt("maulana123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

    }
}
