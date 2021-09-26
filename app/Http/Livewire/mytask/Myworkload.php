<?php

namespace App\Http\Livewire\mytask;

use App\Models\Pegawai;
// use App\Models\tugasanggotatim;
use Livewire\Component;
use Carbon\Carbon;
// use Illuminate\Support\Facades\Auth;
use App\Http\Traits\workloadTrait;

class Myworkload extends Component
{
    use workloadTrait;

    public 
    $pegawai,
    $posisi,
    $posisiHarian,
    $today
    // $no_of_days= [],
    // $blankdays= []
    ;

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
