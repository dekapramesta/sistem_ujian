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
            "username" => "196508102008011007",
            "password" => bcrypt("guru123"),
            "jabatan" => "guru",
            "verified" => '1',
        ]);

        $guru = User::create([
            "username" => "197404012003122008",
            "password" => bcrypt("kumala123"),
            "jabatan" => "guru",
            "verified" => '1',
        ]);

        $guru = User::create([
            "username" => "196812282007012021",
            "password" => bcrypt("resmiati123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "197412172005012006",
            "password" => bcrypt("dita123"),
            "jabatan" => "guru",
            "verified" => '1'
        ]);

        $guru = User::create([
            "username" => "197801112005012009",
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
            "username" => "10556",
            "password" => bcrypt("ady123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10559",
            "password" => bcrypt("agrisna123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10575",
            "password" => bcrypt("alif123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10873",
            "password" => bcrypt("tria123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10885",
            "password" => bcrypt("yusron123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10555",
            "password" => bcrypt("adinda123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10563",
            "password" => bcrypt("aisyah123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10569",
            "password" => bcrypt("aldova123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10857",
            "password" => bcrypt("septina123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10889",
            "password" => bcrypt("zahrotul123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10592",
            "password" => bcrypt("anggi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10614",
            "password" => bcrypt("aulia123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10628",
            "password" => bcrypt("bintang123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10879",
            "password" => bcrypt("vino123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10888",
            "password" => bcrypt("zahra123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10561",
            "password" => bcrypt("aisa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10608",
            "password" => bcrypt("athena123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10642",
            "password" => bcrypt("dandi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10880",
            "password" => bcrypt("wahyu123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10884",
            "password" => bcrypt("yogi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10568",
            "password" => bcrypt("aldi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10616",
            "password" => bcrypt("aurel123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10829",
            "password" => bcrypt("rena123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10874",
            "password" => bcrypt("trubus123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10892",
            "password" => bcrypt("sabrina123"),
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
            "username" => "10214",
            "password" => bcrypt("aditya123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
           "username" => "10228",
           "password" => bcrypt("aline123"),
           "jabatan" => "siswa",
           "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10235",
            "password" => bcrypt("anggara123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10537",
            "password" => bcrypt("weny123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10549",
            "password" => bcrypt("zia123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10216",
            "password" => bcrypt("afara123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10242",
            "password" => bcrypt("annisa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10278",
            "password" => bcrypt("citra123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10507",
            "password" => bcrypt("sarah123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10525",
            "password" => bcrypt("teguh123"),
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
            "username" => "10213",
            "password" => bcrypt("adita123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10231",
            "password" => bcrypt("amalia123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10299",
            "password" => bcrypt("diana123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10506",
            "password" => bcrypt("salwa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10541",
            "password" => bcrypt("yoga123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10209",
            "password" => bcrypt("abbiyu123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10210",
            "password" => bcrypt("adam123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10220",
            "password" => bcrypt("agna123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10488",
            "password" => bcrypt("ririn123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10513",
            "password" => bcrypt("sherly123"),
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
            "username" => "09884",
            "password" => bcrypt("abiyyu123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09890",
            "password" => bcrypt("afwa123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09893",
            "password" => bcrypt("ajeng123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10180",
            "password" => bcrypt("tasya123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10195",
            "password" => bcrypt("wahyu123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09885",
            "password" => bcrypt("achmad123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09913",
            "password" => bcrypt("anik123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09951",
            "password" => bcrypt("deril123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10194",
            "password" => bcrypt("virga123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10203",
            "password" => bcrypt("yurisa123"),
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

        $siswa = User::create([
            "username" => "09961",
            "password" => bcrypt("dimas123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09967",
            "password" => bcrypt("diva123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09998",
            "password" => bcrypt("gladys123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10134",
            "password" => bcrypt("rio123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10174",
            "password" => bcrypt("surya123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "00926",
            "password" => bcrypt("atha123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09933",
            "password" => bcrypt("basori123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "09969",
            "password" => bcrypt("dwi123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10191",
            "password" => bcrypt("vika123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

        $siswa = User::create([
            "username" => "10200",
            "password" => bcrypt("yordania123"),
            "jabatan" => "siswa",
            "verified" => '1'
        ]);

    }
}
