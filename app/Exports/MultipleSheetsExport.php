<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleSheetsExport implements WithMultipleSheets
{
    use Exportable;

    protected $sheetsData;

    public function __construct(array $sheetsData)
    {
        $this->sheetsData = $sheetsData;
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->sheetsData as $data) {
            $sheets[] = new class ($data) implements FromView, WithTitle, ShouldAutoSize {
                use Exportable;

                protected $data;

                public function __construct($data)
                {
                    $this->data = $data;
                }

                public function view(): View
                {
                    return view('Guru.export.nilai_excel', ['data' => $this->data]);
                }

                public function title(): string
                {
                    return $this->data['title'];
                }
            };
        }

        return $sheets;
    }
}
