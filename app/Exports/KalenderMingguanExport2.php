<?php

namespace App\Exports;

use App\Http\Traits\workloadTrait;
use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KalenderMingguanExport2 implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    use workloadTrait;

    public $posisi;

    public function __construct($posisi)
    {
        $this->posisi=$posisi;
    }

    public function headings(): array
    {
        return [
            "No",
            "Tugas",
            "Program",
            "Tanggal",
        ];
    }

    public function query()
    {
        $p=Pegawai::with('tugasanggotatims.tim')->get();
        // dd($p);
        return $p;
    }

    public function map($p): array
    {
        $return=[[$p->nama]];

        foreach ($p->getTugasDalamMingguKalenderUtama($this->posisi) as $key=>$item) 
        {
            array_push($return,
                [
                    '',
                    ($key+1),
                    $item->judul,
                    $item->tim->nama,
                    $item->startdate->format('M d').' - '.$item->duedate->format('M d') ,
                ]
            );
        }

        return $return;
    }

}
