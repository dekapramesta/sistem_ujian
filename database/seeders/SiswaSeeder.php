<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'id_user' => '7',
            'id_kelas' => '1',
            'nama' => 'Adifan Syaiful Anwar',
            'nis' => '10554',
            'tanggal_lahir' => '2004-02-10',
            "no_telp" => "085222222222",
        ]);

        Siswa::create([
            'id_user' => '8',
            'id_kelas' => '1',
            'nama' => 'Arin Safitri',
            'nis' => '10602',
            'tanggal_lahir' => '2004-02-11',
            "no_telp" => "087121212121",
        ]);

        Siswa::create([
            'id_user' => '9',
            'id_kelas' => '1',
            'nama' => 'Dennise Satria Kevinzen',
            'nis' => '10649',
            'tanggal_lahir' => '2004-02-12',
            "no_telp" => "083111111111",
        ]);

        Siswa::create([
            'id_user' => '10',
            'id_kelas' => '1',
            'nama' => 'Laila Ayu Cahyani',
            'nis' => '10741',
            'tanggal_lahir' => '2004-02-13',
            "no_telp" => "082222222222",
        ]);

        Siswa::create([
            'id_user' => '11',
            'id_kelas' => '1',
            'nama' => 'Sandi Nursaid',
            'nis' => '10851',
            'tanggal_lahir' => '2004-02-14',
            'no_telp' => '081909090909',
        ]);

        Siswa::create([
            'id_user' => '12',
            'id_kelas' => '2',
            'nama' => 'Ananta Wiku Mukti Aji',
            'nis' => '10584',
            'tanggal_lahir' => '2004-01-15',
            'no_telp' => '085678787878',
        ]);

        Siswa::create([
            'id_user' => '13',
            'id_kelas' => '2',
            'nama' => 'Astutik',
            'nis' => '10607',
            'tanggal_lahir' => '2004-02-16',
            'no_telp' => '082430430430',
        ]);

        Siswa::create([
            'id_user' => '14',
            'id_kelas' => '2',
            'nama' => 'Kaila Hartanti Wibisono',
            'nis' => '10731',
            'tanggal_lahir' => '2004-02-17',
            'no_telp' => '089765765765',
        ]);

        Siswa::create([
            'id_user' => '15',
            'id_kelas' => '2',
            'nama' => 'Rany Dwi Agustina',
            'nis' => '10821',
            'tanggal_lahir' => '2004-02-18',
            'no_telp' => '087509509509',
        ]);

        Siswa::create([
            'id_user' => '16',
            'id_kelas' => '2',
            'nama' => 'Tata Eka Pratiwi',
            'nis' => '10871',
            'tanggal_lahir' => '2004-02-19',
            'no_telp' => '0857432432432',
        ]);

        Siswa::create([
            'id_user' => '17',
            'id_kelas' => '3',
            'nama' => 'Afifah Nur Hidayah',
            'nis' => '10217',
            'tanggal_lahir' => '2003-02-20',
            'no_telp' => '085650650650',
        ]);

        Siswa::create([
            'id_user' => '18',
            'id_kelas' => '3',
            'nama' => 'Della Ayu Nurlailli',
            'nis' => '10289',
            'tanggal_lahir' => '2003-02-21',
            'no_telp' => '081345345345',
        ]);

        Siswa::create([
            'id_user' => '19',
            'id_kelas' => '3',
            'nama' => 'Hawa Mahawening',
            'nis' => '10359',
            'tanggal_lahir' => '2003-02-22',
            'no_telp' => '085794394332',
        ]);

        Siswa::create([
            'id_user' => '20',
            'id_kelas' => '3',
            'nama' => 'Lefi Alisa Fibriana',
            'nis' => '10399',
            'tanggal_lahir' => '2003-02-23',
            'no_telp' => '083289289289',
        ]);

        Siswa::create([
            'id_user' => '21',
            'id_kelas' => '3',
            'nama' => 'Rava Rachmat Sangnerpa',
            'nis' => '10474',
            'tanggal_lahir' => '2003-03-24',
            'no_telp' => '082900900900',
        ]);

        Siswa::create([
            'id_user' => '22',
            'id_kelas' => '4',
            'nama' => 'Aditya Maulana Hardyansah',
            'nis' => '10215',
            'tanggal_lahir' => '2003-02-25',
            'no_telp' => '081674674674',
        ]);

        Siswa::create([
            'id_user' => '23',
            'id_kelas' => '4',
            'nama' => 'Elsa Amalia',
            'nis' => '10319',
            'tanggal_lahir' => '2003-02-26',
            'no_telp' => '087432432432',
        ]);

        Siswa::create([
            'id_user' => '24',
            'id_kelas' => '4',
            'nama' => 'Indah Ayu Wulandari',
            'nis' => '10370',
            'tanggal_lahir' => '2003-02-27',
            'no_telp' => '088367587012',
        ]);

        Siswa::create([
            'id_user' => '25',
            'id_kelas' => '4',
            'nama' => 'Iqbal Fauzansyah',
            'nis' => '10374',
            'tanggal_lahir' => '2003-02-28',
            'no_telp' => '081435436879',
        ]);

        Siswa::create([
            'id_user' => '26',
            'id_kelas' => '4',
            'nama' => 'Khoirul Nugroho',
            'nis' => '10387',
            'tanggal_lahir' => '2003-03-01',
            'no_telp' => '081090909090',
        ]);

        Siswa::create([
            'id_user' => '27',
            'id_kelas' => '5',
            'nama' => 'Andika Wahyu Pratama',
            'nis' => '10234',
            'tanggal_lahir' => '2003-03-06',
            'no_telp' => '0856060606006',
        ]);

        Siswa::create([
            'id_user' => '28',
            'id_kelas' => '5',
            'nama' => 'Dini Suryaningrum',
            'nis' => '10306',
            'tanggal_lahir' => '2003-03-07',
            'no_telp' => '085678678678',
        ]);

        Siswa::create([
            'id_user' => '29',
            'id_kelas' => '5',
            'nama' => 'Haydar Rizal Ahmad',
            'nis' => '10360',
            'tanggal_lahir' => '2003-03-08',
            'no_telp' => '082333333333',
        ]);

        Siswa::create([
            'id_user' => '30',
            'id_kelas' => '5',
            'nama' => 'Nadia Saputri',
            'nis' => '10434',
            'tanggal_lahir' => '2003-03-09',
            'no_telp' => '0897659659659',
        ]);

        Siswa::create([
            'id_user' => '31',
            'id_kelas' => '5',
            'nama' => 'Steven Wayan Ibrahim Yuliarto',
            'nis' => '10518',
            'tanggal_lahir' => '2003-03-10',
            'no_telp' => '081000000000',
        ]);

        Siswa::create([
            'id_user' => '32',
            'id_kelas' => '6',
            'nama' => 'Airlangga Wirya Permana',
            'nis' => '09922',
            'tanggal_lahir' => '2002-02-11',
            'no_telp' => '089555555555',
        ]);

        Siswa::create([
            'id_user' => '33',
            'id_kelas' => '6',
            'nama' => 'Brian Farinda Putra',
            'nis' => '09936',
            'tanggal_lahir' => '2002-02-12',
            'no_telp' => '085666666666',
        ]);

        Siswa::create([
            'id_user' => '34',
            'id_kelas' => '6',
            'nama' => 'Mahmud Subekti',
            'nis' => '10045',
            'tanggal_lahir' => '2002-02-13',
            'no_telp' => '085555555555',
        ]);

        Siswa::create([
            'id_user' => '35',
            'id_kelas' => '6',
            'nama' => 'Siti Wardaningrum',
            'nis' => '10171',
            'tanggal_lahir' => '2002-02-14',
            'no_telp' => '081909090909',
        ]);

        Siswa::create([
            'id_user' => '36',
            'id_kelas' => '6',
            'nama' => 'Uswatul Hasanah',
            'nis' => '10187',
            'tanggal_lahir' => '2002-02-15',
            'no_telp' => '0868888888888',
        ]);

        Siswa::create([
            'id_user' => '37',
            'id_kelas' => '7',
            'nama' => 'Akbar Sukma Pamungkas ',
            'nis' => '09895',
            'tanggal_lahir' => '2002-02-16',
            'no_telp' => '082000000000',
        ]);

        Siswa::create([
            'id_user' => '38',
            'id_kelas' => '7',
            'nama' => 'Bintang Indah Sari',
            'nis' => '09935',
            'tanggal_lahir' => '2002-02-17',
            'no_telp' => '082767676766',
        ]);

        Siswa::create([
            'id_user' => '39',
            'id_kelas' => '7',
            'nama' => 'Guntur Wahyu Aji Pangestu',
            'nis' => '09999',
            'tanggal_lahir' => '2002-02-18',
            'no_telp' => '087343343343',
        ]);

        Siswa::create([
            'id_user' => '40',
            'id_kelas' => '7',
            'nama' => 'Oktiva Dwi Saputri',
            'nis' => '10096',
            'tanggal_lahir' => '2002-02-19',
            'no_telp' => '088767676767',
        ]);

        Siswa::create([
            'id_user' => '41',
            'id_kelas' => '7',
            'nama' => 'Rizky Yoga Pratama',
            'nis' => '10145',
            'tanggal_lahir' => '2002-02-20',
            'no_telp' => '081780780780',
        ]);

        Siswa::create([
            'id_user' => '42',
            'id_kelas' => '8',
            'nama' => 'Andrea Maharani Putri',
            'nis' => '09909',
            'tanggal_lahir' => '2002-02-21',
            'no_telp' => '085666666666',
        ]);

        Siswa::create([
            'id_user' => '43',
            'id_kelas' => '8',
            'nama' => 'Anisa Ayu Nofiyanti',
            'nis' => '09915',
            'tanggal_lahir' => '2002-02-22',
            'no_telp' => '082111111111',
        ]);

        Siswa::create([
            'id_user' => '44',
            'id_kelas' => '8',
            'nama' => 'David Prastiansyah',
            'nis' => '09945',
            'tanggal_lahir' => '2002-02-23',
            'no_telp' => '088000000000',
        ]);

        Siswa::create([
            'id_user' => '45',
            'id_kelas' => '8',
            'nama' => 'Intan Aulia Regitasari',
            'nis' => '10023',
            'tanggal_lahir' => '2002-02-24',
            'no_telp' => '087999999999',
        ]);

        Siswa::create([
            'id_user' => '46',
            'id_kelas' => '8',
            'nama' => 'Maulana Java Panggestu',
            'nis' => '10049',
            'tanggal_lahir' => '2002-02-25',
            'no_telp' => '086656565656',
        ]);

    }
}
