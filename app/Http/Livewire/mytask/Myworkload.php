<?php

namespace App\Http\Livewire\mytask;

use App\Models\Pegawai;
use App\Models\tugasanggotatim;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Myworkload extends Component
{
    public 
    $pegawai,
    $posisi,
    $posisiHarian,
    $today,
    $no_of_days= [],
    $blankdays= [];

    protected $listeners=[
        'tugasDiSetDone'=>'freshKalender',
    ];

    public function mount($idpegawai)
    {
        $this->pegawai=Pegawai::find($idpegawai);

        $this->today = Carbon::today()->locale('in');
        $this->posisi = Carbon::
        createFromDate($this->today->year, $this->today->month,1)
        ->locale('in');
        $this->posisiHarian = Carbon::
        createFromDate($this->today->year, $this->today->month,$this->today->day)
        ->locale('in');
        
        // $tempDate->weekNumberInMonth;
        // weekOfYear; minggu dalam tahun
        // daysInMonth; tanggal
        // startOfWeek(); pindah ke senin awal di minggu ini;
    }

    public function render()
    {
        $kalender=$this->getKalenderSebulan($this->posisi);
        $harian=$this->getHarian($this->posisiHarian);
        // dd($kalender);
        
        return 
        view('livewire.mytask.myworkload',compact(['kalender','harian']));
    }
    

    public function getKalenderSebulan($posisi) 
    {
        
        $posisi;//tgl satu
        $totalhari=$posisi->daysInMonth;

        // hitung blank day, mulai dari tlg 1 ke minggu sebelumnya
        $haribelakang=$posisi->dayOfWeek;
        $blankdaysArray=$this->blankday($posisi->year,$posisi->month,$haribelakang);


        $daysArray=$this->daysArray($totalhari);
        
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

    public function incrementMonth()
    {
        $this->posisi->day(1);
        $this->posisi->addMonth();

        $this->posisiHarian->day(1);
        $this->posisiHarian->addMonth();
        // $this->posisi->month($this->posisi->month + 1);
    }

    public function decrementMonth()
    {
        $this->posisi->day(1);
        $this->posisi->subMonth();

        $this->posisiHarian->day(1);
        $this->posisiHarian->subMonth();
        // $this->posisi->month($this->posisi->month - 1);
    }

    public function incrementDay()
    {
        if($this->posisiHarian->daysInMonth != $this->posisiHarian->day)
        $this->posisiHarian->addDay();
    }

    public function decrementDay()
    {
        if(1 != $this->posisiHarian->day)
        $this->posisiHarian->subDay();
    }

    public function freshKalender()
    {
        $this->incrementMonth();
        $this->decrementMonth();
    }










    

    public function pindah($tgl)
    {
        $this->posisiHarian->day($tgl);
    }

    public function getHarian($posisi)
    {
        $return=['done'=>[],'tugason'=>[]];
        $taskSeharian=$this->pegawai->getTugasDalamHari($posisi->format("Y-m-d"))->groupBy('status');
        
        if(isset($taskSeharian['done'])) $return['done']=$taskSeharian['done'];   
        if( isset($taskSeharian['on going']) and isset($taskSeharian['not start']) )
        {
            $return['tugason']=array_merge($taskSeharian['on going'],$taskSeharian['not start']);
        }
        elseif(isset($taskSeharian['on going'])) $return['tugason']=$taskSeharian['on going'];
        elseif(isset($taskSeharian['not start'])) $return['tugason']=$taskSeharian['not start'];

        return $return;
    }



}
