<?php

namespace App\Exports;

use App\Http\Traits\workloadTrait;
use App\Models\Pegawai;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KalenderMingguanByQuery implements FromQuery, WithMapping, ShouldAutoSize, WithStyles,WithHeadings
{
    use Exportable;
    use workloadTrait;

    public $posisi;
    public $no;
    public $rowSkrg;
    public $rowPosisiNama;
    public $list;
    public $workload;

    public function __construct($posisi)
    {
        $this->posisi=$posisi;
        $this->no=1;
        $this->rowSkrg=1;
        $this->rowPosisiNama=[];
        $this->list=[];
        $this->workload=[];
    }

    public function headings(): array
    {
        return [
            "NO",
            "NAMA",
            "NO",
            "TUGAS",
            "PROGRAM",
            "TANGGAL",
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // dd($this->rowPosisiNama);
        $this->borderSemuaCell($sheet);
        $sheet->getStyle(1)->getFont()->setBold(true);

        foreach ($this->rowPosisiNama as $key=>$item) 
        {
            //STYLE ROW NAMA PEGAWAI
            // $sheet->mergeCells('B'.$item.':D'.$item);
            $sheet->mergeCells('C'.$item.':F'.$item);
            // $sheet->getColumnDimension('B')->setWidth(23.5, 'px');
            $sheet->getRowDimension($item)->setRowHeight(25);
            // $sheet->getStyle($item)->getFont()->setBold(true);
            $sheet->getStyle($item)->getFont()->getColor()->setARGB('#ff0d2852');
            $sheet->getStyle('A'.$item.':F'.$item)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('fff2f7ff');
            $sheet->getStyle('A'.$item.':F'.$item)
                    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $this->borderkan($sheet, 'A'.$item.':F'.$item, 'ff5382cb');


            if($this->list[$item]!=[])
            {
                $sheet->getStyle($item)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKRED);
                $sheet->getStyle('A'.$item.':F'.$item)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('ffe9a8a8');
            }
        };
    }

    public function borderkan($spreadsheet, $cell, $color)
    {
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => $color],
                ],
            ],
        ];
        
        $spreadsheet->getStyle($cell)->applyFromArray($styleArray);
    }

    public function borderSemuaCell($sheet)
    {
        $sheet->getStyle('A1:F'.$sheet->getHighestRow())->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        //     //all border
        //     for($i=1;$i<=$this->rowSkrg;$i++)
        //     {
        //         foreach (['A','B','C','D','E','F'] as $key => $value) {
        //             $this->borderkan($sheet, $value.$i, 'ff333333');
        //         }
        //     }
    }

    public function query()
    {
        $p=Pegawai::with('tugasanggotatims.tim');
        return $p;
    }

    public function map($p): array
    {
        $tugasDiaSeminggu=$p->getTugasDalamMingguKalenderUtama($this->posisi);
        $this->list[$this->rowSkrg+1]=$this->ambilTugas($tugasDiaSeminggu,$p);
        $ini=$this->list[$this->rowSkrg+1]!=[]?'Hari overload : '.json_encode($this->list[$this->rowSkrg+1]):'';
        $ini='Workload : '.json_encode($this->workload[$this->rowSkrg+1]).$ini;
        $return=[[$this->no++,$p->nama,$ini]];
        
        //tracking
        $this->rowSkrg++;
        array_push($this->rowPosisiNama,$this->rowSkrg);//untuk mencatat posisi row nama pegawai

        foreach ($tugasDiaSeminggu as $key=>$item) 
        {
            array_push($return,
                [
                    '',
                    '',
                    ($key+1),
                    $item->judul,
                    $item->tim->nama,
                    $item->startdate->format('M d').' - '.$item->duedate->format('M d'),
                ]
            );

            //tracking
            $this->rowSkrg++;
        }

        return $return;
    }

    public function ambilTugas($tugasDiaSeminggu,$p)
    {
        $list=[];
        $index=Carbon::parse($this->posisi->startOfWeek(Carbon::SUNDAY));
        $daysArray = $this->daysArrayWeek($index);
        foreach ($daysArray as $tgl) 
        {
            if($tgl->dayOfWeek==0 or $tgl->dayOfWeek==6)
            {
                $workload[$tgl->format('Y-m-d')]=0;
            }
            else
            {
                $workload[$tgl->format('Y-m-d')]=4;
            }

            foreach ($tugasDiaSeminggu as $tugas) 
            {
                if($tgl->between($tugas->startdate,$tugas->duedate))
                {
                    $workload[$tgl->format('Y-m-d')]+=$tugas->level;
                }
            }

            //cek warna
            // if ($workload[$tgl->format('Y-m-d')]==0)
            //     $list[$tgl->dayName]='abu';
            // elseif ($workload[$tgl->format('Y-m-d')]<=6)
            //     $list[$tgl->dayName]='hijau';
            // elseif ($workload[$tgl->format('Y-m-d')]<=9)
            //     $list[$tgl->dayName]='kuning';
            // else
            //     $list[$tgl->dayName]='merah';

            //cek merah?
            if ($workload[$tgl->format('Y-m-d')]>9)    
                $list[]=substr($tgl->dayName,0,3);

            //workload
            $this->workload[$this->rowSkrg+1][substr($tgl->dayName,0,3)]=$workload[$tgl->format('Y-m-d')];
        }
        return $list;
    }
}
