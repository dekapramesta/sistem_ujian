<?php

namespace App\Exports;

use App\Models\Soal;
use App\Models\Jawaban;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// FromQuery, WithMapping, ShouldAutoSize, WithHeadings,
class SoalExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public $id;
    public function __construct($init_parameter)
    {
        $this->id = $init_parameter;
    }
    public function view(): View
    {
        return view('Guru.export.soal_excel', [
            'soal' => Soal::where('id_headerujian', $this->id)->get(),
            'jawaban' => Jawaban::all()
        ]);
    }
    // public function query()
    // {
    //     return ['$soal'=> Soal::query()->where('id_headerujian', $this->id), ''];
    // }

    // public function map($soal): array
    // {
    //     return [
    //         $soal->soal,
    //         $soal->soal_gambar,

    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         'soal',
    //         'soal_gambar',
    //         'pilihan_1',
    //         'pilihan_1_gambar',
    //         'pilihan_2',
    //         'pilihan_2_gambar',
    //         'pilihan_3',
    //         'pilihan_3_gambar',
    //         'pilihan_4',
    //         'pilihan_4_gambar',
    //         'jawaban',
    //         'jawaban_gambar',
    //     ];
    // }
}
