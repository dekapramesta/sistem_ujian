<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "username" => "admin",
            "email" => "admin123@gmail.com",
            "password" => bcrypt("admin123"),
            "jabatan" => "admin",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "guru",
            "email" => "guru123@gmail.com",
            "password" => bcrypt("guru123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "dyhkumala",
            "email" => "kumala123@gmail.com",
            "password" => bcrypt("kumala123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "resmiati",
            "email" => "resmiati123@gmail.com",
            "password" => bcrypt("resmiati123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "dita",
            "email" => "dita123@gmail.com",
            "password" => bcrypt("dita123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "heriwhy",
            "email" => "heriwhy123@gmail.com",
            "password" => bcrypt("heri123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "adifan",
            "email" => "adifan123@gmail.com",
            "password" => bcrypt("adifan123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "arin",
            "email" => "arin123@gmail.com",
            "password" => bcrypt("arin123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "dennise",
            "email" => "dennise123@gmail.com",
            "password" => bcrypt("dennise123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "laila",
            "email" => "laila123@gmail.com",
            "password" => bcrypt("laila123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "sandi",
            "email" => "sandi123@gmail.com",
            "password" => bcrypt("sandi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "ananta",
            "email" => "ananta123@gmail.com",
            "password" => bcrypt("ananta123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "astutik",
            "email" => "astutik123@gmail.com",
            "password" => bcrypt("astutik123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "kaila",
            "email" => "kaila123@gmail.com",
            "password" => bcrypt("kaila123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "rani",
            "email" => "rani123@gmail.com",
            "password" => bcrypt("rani123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "tata",
            "email" => "tata123@gmail.com",
            "password" => bcrypt("tata123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "afifah",
            "email" => "afifah123@gmail.com",
            "password" => bcrypt("afifah123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "della",
            "email" => "della123@gmail.com",
            "password" => bcrypt("della123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "hawa",
            "email" => "hawa123@gmail.com",
            "password" => bcrypt("hawa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "lefi",
            "email" => "lefi123@gmail.com",
            "password" => bcrypt("lefi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "rava",
            "email" => "rava123@gmail.com",
            "password" => bcrypt("rava123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "aditya",
            "email" => "aditya123@gmail.com",
            "password" => bcrypt("aditya123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "elsa",
            "email" => "elsa123@gmail.com",
            "password" => bcrypt("elsa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "indah",
            "email" => "indah123@gmail.com",
            "password" => bcrypt("indah123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "iqbal",
            "email" => "iqbal123@gmail.com",
            "password" => bcrypt("iqbal123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "khoirul",
            "email" => "khoirul123@gmail.com",
            "password" => bcrypt("khoirul123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "andika",
            "email" => "andika123@gmail.com",
            "password" => bcrypt("andika123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "dini",
            "email" => "dini123@gmail.com",
            "password" => bcrypt("dini123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "haydar",
            "email" => "haydar123@gmail.com",
            "password" => bcrypt("haydar123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "nadia",
            "email" => "nadia123@gmail.com",
            "password" => bcrypt("nadia123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "steven",
            "email" => "steven123@gmail.com",
            "password" => bcrypt("steven123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "arlingga",
            "email" => "arlingga123@gmail.com",
            "password" => bcrypt("arlingga123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "brian",
            "email" => "brian123@gmail.com",
            "password" => bcrypt("brian123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "mahmud",
            "email" => "mahmud123@gmail.com",
            "password" => bcrypt("mahmud123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "siti",
            "email" => "siti123@gmail.com",
            "password" => bcrypt("siti123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "uswatul",
            "email" => "uswatul123@gmail.com",
            "password" => bcrypt("uswatul123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "akbar",
            "email" => "akbar123@gmail.com",
            "password" => bcrypt("akbar123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "bintang",
            "email" => "bintang123@gmail.com",
            "password" => bcrypt("bintang123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "guntur",
            "email" => "guntur123@gmail.com",
            "password" => bcrypt("guntur123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "oktiva",
            "email" => "oktiva123@gmail.com",
            "password" => bcrypt("oktiva123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "rizky",
            "email" => "rizky123@gmail.com",
            "password" => bcrypt("rizky123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "andrea",
            "email" => "andrea123@gmail.com",
            "password" => bcrypt("andrea123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "anisa",
            "email" => "anisa123@gmail.com",
            "password" => bcrypt("anisa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "david",
            "email" => "david123@gmail.com",
            "password" => bcrypt("david123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "intan",
            "email" => "intan123@gmail.com",
            "password" => bcrypt("intan123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

         $siswa = User::create([
            "username" => "maulana",
            "email" => "maulana123@gmail.com",
            "password" => bcrypt("maulana123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

    }
}
