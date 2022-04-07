<?php

namespace App\Exports;

use App\Http\Traits\workloadTrait;
use App\Models\Pegawai;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KalenderMingguanExport implements FromView, ShouldAutoSize, WithColumnWidths, WithStyles
{
    use Exportable;
    use workloadTrait;

    public $posisi;

    public function __construct($posisi)
    {
        $this->posisi=$posisi;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            // 1    => ['font' => ['bold' => true]],
            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],
            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            // 'A' => 55,
            // 'B' => 45,            
        ];
    }
    

    public function view(): View
    {
        // dd('disini');
        return view('exports.kalenderMingguan', [
            'pegawai'=>Pegawai::with('tugasanggotatims.tim')->get(),
            'posisi'=>Carbon::parse( $this->posisi)->locale('in'),
            'daysArray'=>$this->daysArrayWeek(Carbon::parse($this->posisi->startOfWeek(Carbon::SUNDAY))),
        ]);
    }
}
