<?php

namespace App\Imports;

use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\HeaderUjian;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class SoalImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public $id;
    private $path;
    public function setPath($path)
    {
        $this->path = $path;
    }
    public function __construct($init_parameter)
    {
        $this->id = $init_parameter;
    }
    public function collection(Collection $rows)
    {
        $hdruj = HeaderUjian::where('id', $this->id)->first();
        if(count($rows) >= $hdruj->jumlah_soal) {
            foreach ($rows as $row) {
                $soal = Soal::create([
                    "id_headerujian" => $this->id,
                    "soal" => $row['soal'],
                    "soal_gambar" => $row['soal_gambar'],
                ]);

                Jawaban::create([
                    "id_soals" => $soal->id,
                    "jawaban" => $row['pilihan_1'],
                    "jawaban_gambar" => $row['pilihan_1_gambar'],
                    "status" => 0
                ]);
                Jawaban::create([
                    "id_soals" => $soal->id,
                    "jawaban" => $row['pilihan_2'],
                    "jawaban_gambar" => $row['pilihan_2_gambar'],
                    "status" => 0
                ]);
                Jawaban::create([
                    "id_soals" => $soal->id,
                    "jawaban" => $row['pilihan_3'],
                    "jawaban_gambar" => $row['pilihan_3_gambar'],
                    "status" => 0
                ]);
                Jawaban::create([
                    "id_soals" => $soal->id,
                    "jawaban" => $row['pilihan_4'],
                    "jawaban_gambar" => $row['pilihan_4_gambar'],
                    "status" => 0
                ]);
                Jawaban::create([
                    "id_soals" => $soal->id,
                    "jawaban" => $row['jawaban'],
                    "jawaban_gambar" => $row['jawaban_gambar'],
                    "status" => 1
                ]);
            }
            Alert::success('Berhasil Upload', 'Berhasil Menambahkan Soal');
        } else {
            Alert::warning('Gagal Upload', 'Jumlah Soal Kurang Dari Batas Yang Diberikan');
            // return redirect()->back();
        }

    }
}
