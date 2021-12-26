<?php

namespace App\Http\Traits;

use App\Models\Pegawai;
use App\Models\tugasanggotatim;
use App\Models\Unit;
use Carbon\Carbon;

trait workloadTrait 
{
    // -------------------------------------------------
    // UNTUK KALENDER UTAMA
    // -------------------------------------------------
    public function getDataAllKalenderSeminggu($posisi)
    {
        $posisi=Carbon::parse($posisi);
        $index=Carbon::parse($posisi->startOfWeek(Carbon::SUNDAY));
        $pegawai=Pegawai::all();

        $daysArray = $this->daysArrayWeek($index);

        $this->seminggu = $daysArray;

        $list=[];

        foreach ($pegawai as $p) 
        {
            $list[$p->id]['pegawai']=$p;
            $tugasDiaSeminggu=$p->getTugasDalamMingguKalenderUtama($this->posisi);

            foreach ($daysArray as $tgl) 
            {
                foreach ($tugasDiaSeminggu as $tugas) 
                {
                    if($tgl->between($tugas->startdate,$tugas->duedate))
                    {
                        $list[$p->id]['tugas'][$tgl->format('Y-m-d')][]=$tugas;
                    }
                }

                //tambahkan pekerjaan rutin
                // if(!($tgl->dayOfWeek==0 or $tgl->dayOfWeek==6))
                // $list[$p->id]['tugas'][$tgl->format('Y-m-d')][]='rutin';
                
            }
        }

        // dd($list);

        return $list;
    }

    public function daysArrayWeek(Carbon $index)
    {
        $daysArray = [];
        for ($i = 1; $i <= 7; $i++)
        {
            $daysArray[]=Carbon::parse($index);
            $index->addDay();
        }
        
        return $daysArray;
    }



    // -------------------------------------------------
    // UNTUK PERHITUNGAN WORKLOAD PADA MYTASK
    // -------------------------------------------------
    public function getKalenderSebulan($posisi) 
    {
        
        $posisi;//tgl satu
        $totalhari=$posisi->daysInMonth;

        // hitung blank day, mulai dari tlg 1 ke minggu sebelumnya
        $haribelakang=$posisi->dayOfWeek;
        $blankdaysArray=$this->blankday($posisi->year,$posisi->month,$haribelakang);


        $daysArray=$this->daysArray($totalhari);
        $dayCarbon=$this->daysArrayToCarbonize($posisi->year,$posisi->month,$daysArray);
        
        // PERHITUNGAN WORKLOAD DALAM KALENDER
        // perulangan foreach task selama sebulan
        // in : jika start->bulan  != posisi->bulan, maka $batasawal==1 else $batasawal=start->date
        // in : jika due->bulan  != posisi->bulan, maka $batasakhir==$totalhari else $batasakhir=due->date        
        // in : perulangan for dari daysarray, berdasarkan $batasawal dan $batasakhir
        $tasksebulan=$this->pegawai->getTugasDalamBulan($posisi->month,$posisi->year);
        foreach ($tasksebulan as $key => $task) 
        {
            $batasawal=0;
            $batasakhir=0;
            if($task->startdate->month!=$posisi->month) $batasawal=1; 
            else $batasawal=$task->startdate->day;
            if($task->duedate->month!=$posisi->month) $batasakhir=$totalhari; 
            else $batasakhir=$task->duedate->day;

            for ($i=$batasawal; $i <= $batasakhir; $i++) 
            { 
                if($task->status!="done")
                {
                    $daysArray[$i]=$daysArray[$i]+$task->level;
                }
            }
        }


        $return['blankdays'] = $blankdaysArray;
        $return['no_of_days'] = $daysArray;
        $return['carbon'] = $dayCarbon;

        return $return;
    }

    public function daysArray($totalhari)
    {
        $daysArray = [];
        for ($i = 1; $i <= $totalhari; $i++)
        {
            $daysArray[$i]=0;
            // array_push($daysArray, $i);
        }

        return $daysArray;
    }

    public function daysArrayToCarbonize($tahun,$bulan,$daysArray)
    {
        $days = [];
        foreach ($daysArray as $key => $value) {
            $days[$key]=Carbon::
            createFromDate($tahun, $bulan,$key)->dayName;
        }

        return $days;
    }


    public function blankday($year,$month,$haribelakang)
    {
        
        $isiblank= Carbon::createFromDate(
            $year, 
            $month,
            1
            )->locale('in')->day(-1);
        

        $blankdaysArray = [];
        for ($i = 0; $i < $haribelakang; $i++) {
            array_push($blankdaysArray, $isiblank->daysInMonth - $i);
        }
        
        return array_reverse($blankdaysArray);
    }








    // -------------------------------------------------
    // UNTUK PERHITUNGAN WORKLOAD PADA DASHBOARD
    // -------------------------------------------------

    public function getKalenderSebulanForAllPegawai($posisi) 
    {
        
        $posisi;//tgl satu
        $totalhari=$posisi->daysInMonth;

        // hitung blank day, mulai dari tlg 1 ke minggu sebelumnya
        $haribelakang=$posisi->dayOfWeek;
        $blankdaysArray=$this->blankday($posisi->year,$posisi->month,$haribelakang);


        $daysArray=$this->daysArray($totalhari);
        $dayCarbon=$this->daysArrayToCarbonize($posisi->year,$posisi->month,$daysArray);
        
        // PERHITUNGAN WORKLOAD DALAM KALENDER
        // perulangan foreach task selama sebulan
        // in : jika start->bulan  != posisi->bulan, maka $batasawal==1 else $batasawal=start->date
        // in : jika due->bulan  != posisi->bulan, maka $batasakhir==$totalhari else $batasakhir=due->date        
        // in : perulangan for dari daysarray, berdasarkan $batasawal dan $batasakhir
        $tasksebulan=tugasanggotatim::YangStartAtauDuePada($posisi->year,$posisi->month)
        // ->Belumselesai()//turn off ini kalau ingin menampilkan yang done juga di kalender workload
        ->orderBy('startdate', 'asc')
        ->get()
        ;
        // dd($tasksebulan);
        // //belum diperulangkan siapa yang kerja? seharusnya tidak perlu, karena tiap tugas be relasi pada satu org
        foreach ($tasksebulan as $key => $task) 
        {
            $batasawal=0;
            $batasakhir=0;
            if($task->startdate->month!=$posisi->month) $batasawal=1; 
            else $batasawal=$task->startdate->day;
            if($task->duedate->month!=$posisi->month) $batasakhir=$totalhari; 
            else $batasakhir=$task->duedate->day;

            for ($i=$batasawal; $i <= $batasakhir; $i++) 
            { 
                if($task->status!="done")
                {
                    $daysArray[$i]=$daysArray[$i]+$task->level;
                }
            }
        }


        $return['blankdays'] = $blankdaysArray;
        $return['no_of_days'] = $daysArray;
        $return['carbon'] = $dayCarbon;
        return $return;
        
    }


    public function getJumlahWeekdayDalamBulan($tahun,$no_bulan)
    {
        $dt = Carbon::create($tahun, $no_bulan, 1);
        $dt2 = Carbon::create($tahun, $no_bulan, 31);
        $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
            return $date->isWeekday();
        }, $dt2);

        return $daysForExtraCoding;
    }

    public function getJumlahWeekdayDalamSetahun($tahun)
    {
        $dt = Carbon::create($tahun, 1, 1);
        $dt2 = Carbon::create($tahun, 12, 31);
        $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
            return $date->isWeekday();
        }, $dt2);

        return $daysForExtraCoding;
    }

    public function pecahHariBulan($tasksebulan,$filterDone=false,$bulan,$tahun)
    {
        $posisi=Carbon::create($tahun, $bulan, 1);
        $totalhari=$posisi->daysInMonth;
        $daysArray=$this->daysArray($totalhari);

        foreach ($tasksebulan as $key => $task) 
        {

            $batasawal=0;
            $batasakhir=0;
            if($task->startdate->month!=$posisi->month) $batasawal=1; 
            else $batasawal=$task->startdate->day;
            if($task->duedate->month!=$posisi->month) $batasakhir=$totalhari; 
            else $batasakhir=$task->duedate->day;

            for ($i=$batasawal; $i <= $batasakhir; $i++) 
            { 
                if($filterDone==FALSE)
                {
                    $daysArray[$i]=$daysArray[$i]+$task->level;
                }
                elseif($task->status!="done")
                {
                    $daysArray[$i]=$daysArray[$i]+$task->level;
                }
            }
        }
        
        return $daysArray;
    }

    public function getWorkloadAllPegawaiInMonth($posisi, $filterDone=TRUE) 
    {
        $totalhari=$posisi->daysInMonth;
        $daysArray=$this->daysArray($totalhari);
        
        // PERHITUNGAN WORKLOAD DALAM KALENDER
        // perulangan foreach task selama sebulan
        // in : jika start->bulan  != posisi->bulan, maka $batasawal==1 else $batasawal=start->date
        // in : jika due->bulan  != posisi->bulan, maka $batasakhir==$totalhari else $batasakhir=due->date        
        // in : perulangan for dari daysarray, berdasarkan $batasawal dan $batasakhir
        $tasksebulan=tugasanggotatim::YangStartAtauDuePada($posisi->year,$posisi->month)
        ->orderBy('startdate', 'asc')
        ->get()
        ;
        // dd($tasksebulan);
        foreach ($tasksebulan as $key => $task) 
        {
            $batasawal=0;
            $batasakhir=0;
            if($task->startdate->month!=$posisi->month) $batasawal=1; 
            else $batasawal=$task->startdate->day;
            if($task->duedate->month!=$posisi->month) $batasakhir=$totalhari; 
            else $batasakhir=$task->duedate->day;

            for ($i=$batasawal; $i <= $batasakhir; $i++) 
            { 
                if($filterDone==FALSE)
                {
                    $daysArray[$i]=$daysArray[$i]+$task->level;
                }
                elseif($task->status!="done")
                {
                    $daysArray[$i]=$daysArray[$i]+$task->level;
                }
            }
        }
        
        return $daysArray;
    }



    public function getAllWorkloadOnBulan()
    {
        $pegawaiBertugas=Pegawai::with('tugasanggotatims')
            ->HanyaYangPunyaTugasKhususDibulanIni(
                $this->posisi->year,
                $this->posisi->month
            )->count();

        $kalender=$this->getWorkloadAllPegawaiInMonth($this->posisi, FALSE);//filter done itu jika ingin di get juga yang done
        $jumlahHari=$this->getJumlahWeekdayDalamBulan(
            $this->posisi->year,
            $this->posisi->month
        );
        //maxworkload
        // if($pegawaiBertugas==0)$maxworkload=$jumlahHari*12;
        // else 
        $maxworkload=$jumlahHari*$pegawaiBertugas*12;//ganti 8, spya rutin tida pake
        
        $total=0;
        foreach($kalender as $item)
        {
            $total=$total+$item;
        }
        //total
        // if($pegawaiBertugas==0)$total=$total+($jumlahHari*4);
        // else 
        $total=$total+($jumlahHari*$pegawaiBertugas*4);//kalau off, maka tidak pake pekerjaan rutin
        
        return [
            'total'=>$total,
            'maxworkload'=>$maxworkload,
            'pegawaiBertugas'=>$pegawaiBertugas,
            'bulan'=>$this->posisi->monthName,
        ];

    }

    public function getForDashboard()
    {
        $ret= Unit::with('anggotaunits.tugasanggotatims')
            // ->where('nama','!=','KEPALA')
            ->get();

        $key=array_keys($ret->where('nama','SPPUR')->toArray())[0];

        //urutkan per kepala
        $sementara=$ret[2];
        $ret[2]=$ret[$key];
        $ret[$key]=$sementara;

        return $ret;
        // $a->getTugasDalamBulan(7,2021)->sum('level');
    }

    public function coba()
    {
        // $jumlahHari=$this->getJumlahWeekdayDalamBulan(
        //     $this->posisi->year,
        //     $this->posisi->month
        // );
        // $maxworkload=$jumlahHari*$pegawaiBertugas*12;//ganti 8, spya rutin tida pake
        
        // $total=0;
        // foreach($kalender as $item)
        // {
        //     $total=$total+$item;
        // }
        // $total=$total+($jumlahHari*$pegawaiBertugas*4);//kalau off, maka tidak pake pekerjaan rutin
    }

    //tidak terpakai
    public function getUntukStd()
    {
        $pegawaiBertugas=Pegawai::with('tugasanggotatims')
            ->HanyaYangPunyaTugasKhususTahunIni(
                $this->posisi->year
            )->get();

        return $pegawaiBertugas;
    }

}