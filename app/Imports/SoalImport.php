<?php

namespace App\Imports;

use App\Models\Soal;
use App\Models\Jawaban;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
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
        foreach ($rows as $row) {
            // $namaFile = time() . '.' . $row['soal_gambar']->extension();
            // $row['soal_gambar']->move(public_path('img/logo'), $namaFile);
            // $imageName = $row['soal_gambar'];
            // $imageFile = Storage::disk('public')->putFileAs('images', $this->path, $imageName);
            $soal = Soal::create([
                "id_headerujian" => $this->id,
                "soal" => $row['soal'],
                "soal_gambar" => $row['soal_gambar'],
            ]);
            // $image = Image::make(public_path('img/' . $imageFile));
            // $image->resize(300, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            // $image->save();

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

        // $xlsFile = 'sample.xlsx';
        // require_once 'PHPExcel/Reader/Excel2007.php';
        // $objReader = new PHPExcel_Reader_Excel2007();
        // //$objReader->setReadDataOnly(true);
        // $data = $objReader->load($xlsFile);
        // $objWorksheet = $data->getActiveSheet();
        // foreach ($objWorksheet->getDrawingCollection() as $drawing) {
        //     //for XLSX format
        //     $string = $drawing->getCoordinates();
        //     $coordinate = PHPExcel_Cell::coordinateFromString($string);
        //     if ($drawing instanceof PHPExcel_Worksheet_Drawing) {
        //         $filename = $drawing->getPath();
        //         $drawing->getDescription();
        //         copy($filename, 'uploads/' . $drawing->getDescription());
        //     }
        // }

        // $objReader = IOFactory::createReader('Excel 2007+');
        // $objPHPExcel = IOFactory::load(request()->file);
        // $objWorksheet = $objPHPExcel->getActiveSheet();

        // foreach ($objWorksheet->getDrawingCollection() as $drawing) {
        // if ($drawing instanceof MemoryDrawing) {
        //         ob_start();
        //         call_user_func(
        //             $drawing->getRenderingFunction(),
        //             $drawing->getImageResource()
        //         );

        //         $imageContents = ob_get_contents();
        //         ob_end_clean();
        //         $extension = 'png';
        //     } else {
        //         $zipReader = fopen($drawing->getPath(), 'r');
        //         $imageContents = '';

        //         while (!feof($zipReader)) {
        //             $imageContents .= fread($zipReader, 1024);
        //         }
        //         fclose($zipReader);
        //         $extension = $drawing->getExtension();
        //     }
        //     $myFileName = '00_Image_'.++$i.'.'.$extension;
        //     file_put_contents($myFileName, $imageContents);
        // }
    }
}
