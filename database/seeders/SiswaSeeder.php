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
            'tanggal_lahir' => '2006-04-03',
            "no_telp" => "085222222222",
        ]);

        Siswa::create([
            'id_user' => '8',
            'id_kelas' => '1',
            'nama' => 'Arin Safitri',
            'nis' => '10602',
            'tanggal_lahir' => '2006-08-30',
            "no_telp" => "087121212121",
        ]);

        Siswa::create([
            'id_user' => '9',
            'id_kelas' => '1',
            'nama' => 'Dennise Satria Kevinzen',
            'nis' => '10649',
            'tanggal_lahir' => '2007-01-22',
            "no_telp" => "083111111111",
        ]);

        Siswa::create([
            'id_user' => '10',
            'id_kelas' => '1',
            'nama' => 'Laila Ayu Cahyani',
            'nis' => '10741',
            'tanggal_lahir' => '2006-04-04',
            "no_telp" => "082222222222",
        ]);

        Siswa::create([
            'id_user' => '11',
            'id_kelas' => '1',
            'nama' => 'Sandi Nursaid',
            'nis' => '10851',
            'tanggal_lahir' => '2007-07-18',
            'no_telp' => '081909090909',
        ]);

        Siswa::create([
            'id_user' => '12',
            'id_kelas' => '2',
            'nama' => 'Ananta Wiku Mukti Aji',
            'nis' => '10584',
            'tanggal_lahir' => '2007-06-21',
            'no_telp' => '085678787878',
        ]);

        Siswa::create([
            'id_user' => '13',
            'id_kelas' => '2',
            'nama' => 'Astutik',
            'nis' => '10607',
            'tanggal_lahir' => '2005-07-12',
            'no_telp' => '082430430430',
        ]);

        Siswa::create([
            'id_user' => '14',
            'id_kelas' => '2',
            'nama' => 'Kaila Hartanti Wibisono',
            'nis' => '10731',
            'tanggal_lahir' => '2006-12-21',
            'no_telp' => '089765765765',
        ]);

        Siswa::create([
            'id_user' => '15',
            'id_kelas' => '2',
            'nama' => 'Rany Dwi Agustina',
            'nis' => '10821',
            'tanggal_lahir' => '2007-08-17',
            'no_telp' => '087509509509',
        ]);

        Siswa::create([
            'id_user' => '16',
            'id_kelas' => '2',
            'nama' => 'Tata Eka Pratiwi',
            'nis' => '10871',
            'tanggal_lahir' => '2006-08-20',
            'no_telp' => '0857432432432',
        ]);

        Siswa::create([
            'id_user' => '17',
            'id_kelas' => '3',
            'nama' => 'Ady Prasetyo',
            'nis' => '10556',
            'tanggal_lahir' => '2006-10-10',
            'no_telp' => '085121121121',
        ]);

        Siswa::create([
            'id_user' => '18',
            'id_kelas' => '3',
            'nama' => 'Agrisna Khairiyya',
            'nis' => '10559',
            'tanggal_lahir' => '2006-08-31',
            'no_telp' => '082342342342',
        ]);

        Siswa::create([
            'id_user' => '19',
            'id_kelas' => '3',
            'nama' => 'Alif Agung Prabowo',
            'nis' => '10575',
            'tanggal_lahir' => '2005-10-21',
            'no_telp' => '085689689689',
        ]);

        Siswa::create([
            'id_user' => '20',
            'id_kelas' => '3',
            'nama' => 'Tria Ramadhani',
            'nis' => '10873',
            'tanggal_lahir' => '2006-10-01',
            'no_telp' => '085456456456',
        ]);

        Siswa::create([
            'id_user' => '21',
            'id_kelas' => '3',
            'nama' => 'Yusron Tangguh Waliatmaja',
            'nis' => '10885',
            'tanggal_lahir' => '2006-08-01',
            'no_telp' => '089000123000',
        ]);

        Siswa::create([
            'id_user' => '22',
            'id_kelas' => '4',
            'nama' => 'Adinda Iin Widyanti',
            'nis' => '10555',
            'tanggal_lahir' => '2006-06-09',
            'no_telp' => '086789789789',
        ]);

        Siswa::create([
            'id_user' => '23',
            'id_kelas' => '4',
            'nama' => 'Aisyah Ifti Ashani',
            'nis' => '10563',
            'tanggal_lahir' => '2007-01-13',
            'no_telp' => '085123123123',
        ]);

        Siswa::create([
            'id_user' => '24',
            'id_kelas' => '4',
            'nama' => 'Aldova Tegar Saputra',
            'nis' => '10569',
            'tanggal_lahir' => '2006-06-09',
            'no_telp' => '081234567890',
        ]);

        Siswa::create([
            'id_user' => '25',
            'id_kelas' => '4',
            'nama' => 'Septina Rezky Pratiwi',
            'nis' => '10857',
            'tanggal_lahir' => '2007-09-05',
            'no_telp' => '089234567890',
        ]);

        Siswa::create([
            'id_user' => '26',
            'id_kelas' => '4',
            'nama' => 'Zahrotul Aulya',
            'nis' => '10889',
            'tanggal_lahir' => '2006-07-25',
            'no_telp' => '087123123123',
        ]);

        Siswa::create([
            'id_user' => '27',
            'id_kelas' => '5',
            'nama' => 'Anggi Putri Lestari',
            'nis' => '10592',
            'tanggal_lahir' => '2006-11-17',
            'no_telp' => '082123123123',
        ]);

        Siswa::create([
            'id_user' => '28',
            'id_kelas' => '5',
            'nama' => 'Aulia Nugraheni',
            'nis' => '10614',
            'tanggal_lahir' => '2007-03-10',
            'no_telp' => '081231293123',
        ]);

        Siswa::create([
            'id_user' => '29',
            'id_kelas' => '5',
            'nama' => 'Bintang Ramahdhan',
            'nis' => '628',
            'tanggal_lahir' => '2006-08-30',
            'no_telp' => '082123123523',
        ]);

        Siswa::create([
            'id_user' => '30',
            'id_kelas' => '5',
            'nama' => 'Vino Reyhan Yoga Pratama',
            'nis' => '10879',
            'tanggal_lahir' => '2007-06-05',
            'no_telp' => '082123123128',
        ]);

        Siswa::create([
            'id_user' => '31',
            'id_kelas' => '5',
            'nama' => 'Zahra Mesvari Nugraha Putri',
            'nis' => '10888',
            'tanggal_lahir' => '2007-02-22',
            'no_telp' => '082793123123',
        ]);

        Siswa::create([
            'id_user' => '32',
            'id_kelas' => '6',
            'nama' => 'Aisa Kumala Sari',
            'nis' => '10561',
            'tanggal_lahir' => '2006-03-04',
            'no_telp' => '082123453123',
        ]);

        Siswa::create([
            'id_user' => '33',
            'id_kelas' => '6',
            'nama' => 'Athena Salsilia Lintang Zein',
            'nis' => '10608',
            'tanggal_lahir' => '2006-09-09',
            'no_telp' => '082123453903',
        ]);

        Siswa::create([
            'id_user' => '34',
            'id_kelas' => '6',
            'nama' => 'Dandi Putra',
            'nis' => '10642',
            'tanggal_lahir' => '2007-04-07',
            'no_telp' => '085987654321',
        ]);

        Siswa::create([
            'id_user' => '35',
            'id_kelas' => '6',
            'nama' => 'Wahyu Jatmiko',
            'nis' => '10880',
            'tanggal_lahir' => '2006-09-09',
            'no_telp' => '082123453888',
        ]);

        Siswa::create([
            'id_user' => '36',
            'id_kelas' => '6',
            'nama' => 'Yogi Surya Saputra',
            'nis' => '10884',
            'tanggal_lahir' => '2006-06-09',
            'no_telp' => '082900453123',
        ]);

        Siswa::create([
            'id_user' => '37',
            'id_kelas' => '7',
            'nama' => 'Aldi Bagus Prasetyo',
            'nis' => '10568',
            'tanggal_lahir' => '2005-05-17',
            'no_telp' => '088523453123',
        ]);

        Siswa::create([
            'id_user' => '38',
            'id_kelas' => '7',
            'nama' => 'Aurel Chika Fajria',
            'nis' => '10616',
            'tanggal_lahir' => '2007-11-03',
            'no_telp' => '088523027123',
        ]);

        Siswa::create([
            'id_user' => '39',
            'id_kelas' => '7',
            'nama' => 'Rena Ayu Armianti',
            'nis' => '10829',
            'tanggal_lahir' => '2007-02-09',
            'no_telp' => '081523453123',
        ]);

        Siswa::create([
            'id_user' => '40',
            'id_kelas' => '7',
            'nama' => 'Trubus Yusuf Wicaksono',
            'nis' => '10874',
            'tanggal_lahir' => '2006-09-02',
            'no_telp' => '088523455029',
        ]);

        Siswa::create([
            'id_user' => '41',
            'id_kelas' => '7',
            'nama' => 'Sabrina Fatimatuz Zahra',
            'nis' => '10892',
            'tanggal_lahir' => '2007-07-21',
            'no_telp' => '089785942981',
        ]);

        Siswa::create([
            'id_user' => '42',
            'id_kelas' => '8',
            'nama' => 'Afifah Nur Hidayah',
            'nis' => '10217',
            'tanggal_lahir' => '2005-07-10',
            'no_telp' => '085650650650',
        ]);

        Siswa::create([
            'id_user' => '43',
            'id_kelas' => '8',
            'nama' => 'Della Ayu Nurlailli',
            'nis' => '10289',
            'tanggal_lahir' => '2005-10-25',
            'no_telp' => '081345345345',
        ]);

        Siswa::create([
            'id_user' => '44',
            'id_kelas' => '8',
            'nama' => 'Hawa Mahawening',
            'nis' => '10359',
            'tanggal_lahir' => '2006-01-29',
            'no_telp' => '085794394332',
        ]);

        Siswa::create([
            'id_user' => '45',
            'id_kelas' => '8',
            'nama' => 'Lefi Alisa Fibriana',
            'nis' => '10399',
            'tanggal_lahir' => '2006-02-08',
            'no_telp' => '083289289289',
        ]);

        Siswa::create([
            'id_user' => '46',
            'id_kelas' => '8',
            'nama' => 'Rava Rachmat Sangnerpa',
            'nis' => '10474',
            'tanggal_lahir' => '2005-05-29',
            'no_telp' => '082900900900',
        ]);

        Siswa::create([
            'id_user' => '47',
            'id_kelas' => '9',
            'nama' => 'Aditya Maulana Hardyansah',
            'nis' => '10215',
            'tanggal_lahir' => '2004-05-20',
            'no_telp' => '081674674674',
        ]);

        Siswa::create([
            'id_user' => '48',
            'id_kelas' => '9',
            'nama' => 'Elsa Amalia',
            'nis' => '10319',
            'tanggal_lahir' => '2006-01-14',
            'no_telp' => '087432432432',
        ]);

        Siswa::create([
            'id_user' => '49',
            'id_kelas' => '9',
            'nama' => 'Indah Ayu Wulandari',
            'nis' => '10370',
            'tanggal_lahir' => '2006-01-28',
            'no_telp' => '088367587012',
        ]);

        Siswa::create([
            'id_user' => '50',
            'id_kelas' => '9',
            'nama' => 'Iqbal Fauzansyah',
            'nis' => '10374',
            'tanggal_lahir' => '2006-02-22',
            'no_telp' => '081435436879',
        ]);

        Siswa::create([
            'id_user' => '51',
            'id_kelas' => '9',
            'nama' => 'Khoirul Nugroho',
            'nis' => '10387',
            'tanggal_lahir' => '2005-10-23',
            'no_telp' => '081090909090',
        ]);

        Siswa::create([
            'id_user' => '52',
            'id_kelas' => '10',
            'nama' => 'Aditya Ibnu Febriansyah',
            'nis' => '10214',
            'tanggal_lahir' => '2006-02-24',
            'no_telp' => '08109096028',
        ]);

        Siswa::create([
            'id_user' => '53',
            'id_kelas' => '10',
            'nama' => 'Aline Putri Ramadhani',
            'nis' => '10228',
            'tanggal_lahir' => '2005-10-27',
            'no_telp' => '08289096028',
        ]);

        Siswa::create([
            'id_user' => '54',
            'id_kelas' => '10',
            'nama' => 'Anggara Dwi Wicaksana',
            'nis' => '10235',
            'tanggal_lahir' => '2006-04-18',
            'no_telp' => '08151896028',
        ]);

        Siswa::create([
            'id_user' => '55',
            'id_kelas' => '10',
            'nama' => 'Weny Kahfiyatun',
            'nis' => '10537',
            'tanggal_lahir' => '2006-04-29',
            'no_telp' => '08164076028',
        ]);

        Siswa::create([
            'id_user' => '56',
            'id_kelas' => '10',
            'nama' => 'Zia Zulbi Aji Tongga',
            'nis' => '10549',
            'tanggal_lahir' => '2005-09-27',
            'no_telp' => '08109096555',
        ]);

        Siswa::create([
            'id_user' => '57',
            'id_kelas' => '11',
            'nama' => 'Afara Agustin Rosana',
            'nis' => '10216',
            'tanggal_lahir' => '2005-08-15',
            'no_telp' => '081727727272',
        ]);

        Siswa::create([
            'id_user' => '58',
            'id_kelas' => '11',
            'nama' => 'Annisa Nuraini',
            'nis' => '10242',
            'tanggal_lahir' => '2005-03-17',
            'no_telp' => '081727630272',
        ]);

        Siswa::create([
            'id_user' => '59',
            'id_kelas' => '11',
            'nama' => 'Citra Rahmawati',
            'nis' => '10278',
            'tanggal_lahir' => '2006-02-21',
            'no_telp' => '081727630610',
        ]);

        Siswa::create([
            'id_user' => '60',
            'id_kelas' => '11',
            'nama' => 'Sarah Amaylia',
            'nis' => '10507',
            'tanggal_lahir' => '2005-05-10',
            'no_telp' => '081727655572',
        ]);

        Siswa::create([
            'id_user' => '61',
            'id_kelas' => '11',
            'nama' => 'Teguh Tujuh Fatir',
            'nis' => '10525',
            'tanggal_lahir' => '2006-05-30',
            'no_telp' => '081729820272',
        ]);

        Siswa::create([
            'id_user' => '62',
            'id_kelas' => '12',
            'nama' => 'Andika Wahyu Pratama',
            'nis' => '10234',
            'tanggal_lahir' => '2006-07-14',
            'no_telp' => '0856060606006',
        ]);

        Siswa::create([
            'id_user' => '63',
            'id_kelas' => '12',
            'nama' => 'Dini Suryaningrum',
            'nis' => '10306',
            'tanggal_lahir' => '2006-01-27',
            'no_telp' => '085678678678',
        ]);

        Siswa::create([
            'id_user' => '64',
            'id_kelas' => '12',
            'nama' => 'Haydar Rizal Ahmad',
            'nis' => '10360',
            'tanggal_lahir' => '2006-10-27',
            'no_telp' => '082333333333',
        ]);

        Siswa::create([
            'id_user' => '65',
            'id_kelas' => '12',
            'nama' => 'Nadia Saputri',
            'nis' => '10434',
            'tanggal_lahir' => '2006-06-14',
            'no_telp' => '0897659659659',
        ]);

        Siswa::create([
            'id_user' => '66',
            'id_kelas' => '12',
            'nama' => 'Steven Wayan Ibrahim Yuliarto',
            'nis' => '10518',
            'tanggal_lahir' => '2006-01-08',
            'no_telp' => '081000000000',
        ]);

        Siswa::create([
            'id_user' => '67',
            'id_kelas' => '13',
            'nama' => 'Adita Nanda Syafitri',
            'nis' => '10213',
            'tanggal_lahir' => '2005-11-04',
            'no_telp' => '089444555666',
        ]);

        Siswa::create([
            'id_user' => '68',
            'id_kelas' => '13',
            'nama' => 'Amalia Riski Salsabila',
            'nis' => '10231',
            'tanggal_lahir' => '2005-07-13',
            'no_telp' => '089444555888',
        ]);

        Siswa::create([
            'id_user' => '69',
            'id_kelas' => '13',
            'nama' => 'Diana Fitri Nurlaily',
            'nis' => '10299',
            'tanggal_lahir' => '2005-07-15',
            'no_telp' => '081444555666',
        ]);

        Siswa::create([
            'id_user' => '70',
            'id_kelas' => '13',
            'nama' => 'Salwa Ayudia Nur',
            'nis' => '10506',
            'tanggal_lahir' => '2006-06-28',
            'no_telp' => '089444333666',
        ]);

        Siswa::create([
            'id_user' => '71',
            'id_kelas' => '13',
            'nama' => 'Yoga Alvo Pratama',
            'nis' => '10541',
            'tanggal_lahir' => '2005-06-25',
            'no_telp' => '089888555666',
        ]);

        Siswa::create([
            'id_user' => '72',
            'id_kelas' => '14',
            'nama' => 'Abimanyu Lambang Saputra',
            'nis' => '10209',
            'tanggal_lahir' => '2006-08-28',
            'no_telp' => '087844555666',
        ]);

        Siswa::create([
            'id_user' => '73',
            'id_kelas' => '14',
            'nama' => 'Adam Bagus Septyawan',
            'nis' => '10210',
            'tanggal_lahir' => '2005-09-09',
            'no_telp' => '089444559066',
        ]);

        Siswa::create([
            'id_user' => '74',
            'id_kelas' => '14',
            'nama' => 'Agna Aurora Putri',
            'nis' => '10220',
            'tanggal_lahir' => '2006-09-09',
            'no_telp' => '089447125666',
        ]);

        Siswa::create([
            'id_user' => '75',
            'id_kelas' => '14',
            'nama' => 'Ririn Dwi Anggraini',
            'nis' => '10488',
            'tanggal_lahir' => '2005-10-29',
            'no_telp' => '089444555226',
        ]);

        Siswa::create([
            'id_user' => '76',
            'id_kelas' => '14',
            'nama' => 'Sherly Hesti Alfiana',
            'nis' => '10513',
            'tanggal_lahir' => '2005-04-23',
            'no_telp' => '089444555111',
        ]);

        Siswa::create([
            'id_user' => '77',
            'id_kelas' => '15',
            'nama' => 'Arlingga Wirya Permana',
            'nis' => '09922',
            'tanggal_lahir' => '2005-03-15',
            'no_telp' => '089555555555',
        ]);

        Siswa::create([
            'id_user' => '78',
            'id_kelas' => '15',
            'nama' => 'Brian Farinda Putra',
            'nis' => '09936',
            'tanggal_lahir' => '2004-09-12',
            'no_telp' => '085666666666',
        ]);

        Siswa::create([
            'id_user' => '79',
            'id_kelas' => '15',
            'nama' => 'Mahmud Subekti',
            'nis' => '10045',
            'tanggal_lahir' => '2005-04-05',
            'no_telp' => '085555555555',
        ]);

        Siswa::create([
            'id_user' => '80',
            'id_kelas' => '15',
            'nama' => 'Siti Wardaningrum',
            'nis' => '10171',
            'tanggal_lahir' => '2005-03-23',
            'no_telp' => '081909090909',
        ]);

        Siswa::create([
            'id_user' => '81',
            'id_kelas' => '15',
            'nama' => 'Uswatul Hasanah',
            'nis' => '10187',
            'tanggal_lahir' => '2004-09-27',
            'no_telp' => '0868888888888',
        ]);

        Siswa::create([
            'id_user' => '82',
            'id_kelas' => '16',
            'nama' => 'Akbar Sukma Pamungkas ',
            'nis' => '09895',
            'tanggal_lahir' => '2004-03-11',
            'no_telp' => '082000000000',
        ]);

        Siswa::create([
            'id_user' => '83',
            'id_kelas' => '16',
            'nama' => 'Bintang Indah Sari',
            'nis' => '09935',
            'tanggal_lahir' => '2005-08-28',
            'no_telp' => '082767676766',
        ]);

        Siswa::create([
            'id_user' => '84',
            'id_kelas' => '16',
            'nama' => 'Guntur Wahyu Aji Pangestu',
            'nis' => '09999',
            'tanggal_lahir' => '2004-04-11',
            'no_telp' => '087343343343',
        ]);

        Siswa::create([
            'id_user' => '85',
            'id_kelas' => '16',
            'nama' => 'Oktiva Dwi Saputri',
            'nis' => '10096',
            'tanggal_lahir' => '2004-10-18',
            'no_telp' => '088767676767',
        ]);

        Siswa::create([
            'id_user' => '86',
            'id_kelas' => '16',
            'nama' => 'Rizky Yoga Pratama',
            'nis' => '10145',
            'tanggal_lahir' => '2005-07-08',
            'no_telp' => '081780780780',
        ]);

        Siswa::create([
            'id_user' => '87',
            'id_kelas' => '17',
            'nama' => 'Abbiyu Hammam Habibi',
            'nis' => '10145',
            'tanggal_lahir' => '2004-10-22',
            'no_telp' => '081780780780',
        ]);

        Siswa::create([
            'id_user' => '88',
            'id_kelas' => '17',
            'nama' => 'Afwa Nurul Mukaramah',
            'nis' => '09890',
            'tanggal_lahir' => '2005-03-14',
            'no_telp' => '081780792180',
        ]);

        Siswa::create([
            'id_user' => '89',
            'id_kelas' => '17',
            'nama' => 'Ajeng Andini Ari Sukoco',
            'nis' => '09893',
            'tanggal_lahir' => '2005-06-02',
            'no_telp' => '087080780780',
        ]);

        Siswa::create([
            'id_user' => '90',
            'id_kelas' => '17',
            'nama' => 'Tasya Putri Nilam Sari',
            'nis' => '10180',
            'tanggal_lahir' => '2004-09-08',
            'no_telp' => '081780780120',
        ]);

        Siswa::create([
            'id_user' => '91',
            'id_kelas' => '17',
            'nama' => 'Wahyu Dwi Prakoso',
            'nis' => '10195',
            'tanggal_lahir' => '2005-01-07',
            'no_telp' => '081761180780',
        ]);

        Siswa::create([
            'id_user' => '92',
            'id_kelas' => '18',
            'nama' => 'Achmad Hafidz Dwi Febrian',
            'nis' => '09885',
            'tanggal_lahir' => '2005-01-30',
            'no_telp' => '081780748580',
        ]);

        Siswa::create([
            'id_user' => '93',
            'id_kelas' => '18',
            'nama' => 'Anik Wijayati',
            'nis' => '09913',
            'tanggal_lahir' => '2005-08-29',
            'no_telp' => '089280780780',
        ]);

        Siswa::create([
            'id_user' => '94',
            'id_kelas' => '18',
            'nama' => 'Deril Jovanka',
            'nis' => '09951',
            'tanggal_lahir' => '2004-10-04',
            'no_telp' => '089876876876',
        ]);

        Siswa::create([
            'id_user' => '95',
            'id_kelas' => '18',
            'nama' => 'Virga Ristiana Safitri',
            'nis' => '10194',
            'tanggal_lahir' => '2004-12-19',
            'no_telp' => '089876876614',
        ]);

        Siswa::create([
            'id_user' => '96',
            'id_kelas' => '18',
            'nama' => 'Yurisa Nanda Cristiani',
            'nis' => '10203',
            'tanggal_lahir' => '2005-06-18',
            'no_telp' => '089876876111',
        ]);

        Siswa::create([
            'id_user' => '97',
            'id_kelas' => '19',
            'nama' => 'Andrea Maharani Putri',
            'nis' => '09909',
            'tanggal_lahir' => '2004-09-16',
            'no_telp' => '085666666666',
        ]);

        Siswa::create([
            'id_user' => '98',
            'id_kelas' => '19',
            'nama' => 'Anisa Ayu Nofiyanti',
            'nis' => '09915',
            'tanggal_lahir' => '2005-11-28',
            'no_telp' => '082111111111',
        ]);

        Siswa::create([
            'id_user' => '99',
            'id_kelas' => '19',
            'nama' => 'David Prastiansyah',
            'nis' => '09945',
            'tanggal_lahir' => '2004-12-19',
            'no_telp' => '088012300000',
        ]);

        Siswa::create([
            'id_user' => '100',
            'id_kelas' => '19',
            'nama' => 'Intan Aulia Regitasari',
            'nis' => '10023',
            'tanggal_lahir' => '2005-01-19',
            'no_telp' => '087986499999',
        ]);

        Siswa::create([
            'id_user' => '101',
            'id_kelas' => '19',
            'nama' => 'Maulana Java Panggestu',
            'nis' => '10049',
            'tanggal_lahir' => '2005-02-16',
            'no_telp' => '086656565656',
        ]);

        Siswa::create([
            'id_user' => '102',
            'id_kelas' => '20',
            'nama' => 'Dimas Bayu Pangestu',
            'nis' => '00961',
            'tanggal_lahir' => '2004-03-22',
            'no_telp' => '086656532156',
        ]);

        Siswa::create([
            'id_user' => '103',
            'id_kelas' => '20',
            'nama' => 'Diva Diah Puspitasari',
            'nis' => '00967',
            'tanggal_lahir' => '2005-04-23',
            'no_telp' => '086643165656',
        ]);

        Siswa::create([
            'id_user' => '104',
            'id_kelas' => '20',
            'nama' => 'Gladys Oktavia',
            'nis' => '09998',
            'tanggal_lahir' => '2005-10-10',
            'no_telp' => '081256565656',
        ]);

        Siswa::create([
            'id_user' => '105',
            'id_kelas' => '20',
            'nama' => 'Rio Dhebrianto Putra',
            'nis' => '10134',
            'tanggal_lahir' => '2004-12-07',
            'no_telp' => '086656539056',
        ]);

        Siswa::create([
            'id_user' => '106',
            'id_kelas' => '20',
            'nama' => 'Surya Aditya Nugroho',
            'nis' => '10174',
            'tanggal_lahir' => '2004-06-21',
            'no_telp' => '089456565555',
        ]);

        Siswa::create([
            'id_user' => '107',
            'id_kelas' => '21',
            'nama' => 'Atha Alfin Suryanto',
            'nis' => '09926',
            'tanggal_lahir' => '2004-07-04',
            'no_telp' => '081656565656',
        ]);

        Siswa::create([
            'id_user' => '108',
            'id_kelas' => '21',
            'nama' => 'Basori Anwar Khoirudin',
            'nis' => '09933',
            'tanggal_lahir' => '2004-10-04',
            'no_telp' => '086656533256',
        ]);

        Siswa::create([
            'id_user' => '109',
            'id_kelas' => '21',
            'nama' => 'Dwi Rahmawati',
            'nis' => '09933',
            'tanggal_lahir' => '2004-04-27',
            'no_telp' => '089356565656',
        ]);

        Siswa::create([
            'id_user' => '110',
            'id_kelas' => '21',
            'nama' => 'Vika Melinda Putri',
            'nis' => '10191',
            'tanggal_lahir' => '2004-05-02',
            'no_telp' => '086123565656',
        ]);

        Siswa::create([
            'id_user' => '111',
            'id_kelas' => '21',
            'nama' => 'Yordania Satya Dharma',
            'nis' => '10200',
            'tanggal_lahir' => '2005-03-10',
            'no_telp' => '086656565651',
        ]);

    }
}
