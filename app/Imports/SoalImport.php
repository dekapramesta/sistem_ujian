<?php

namespace App\Imports;

use App\Models\detail_soal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new detail_soal(
            [
                "id_soal" => 1,
                "soal" => $row['soal'],
                "pilihan_a" => $row['pilihan_1'],
                "pilihan_b" => $row['pilihan_2'],
                "pilihan_c" => $row['pilihan_3'],
                "pilihan_d" => $row['pilihan_4'],
                "jawaban" => $row['jawaban'],

                //
            ]
        );
    }
}
