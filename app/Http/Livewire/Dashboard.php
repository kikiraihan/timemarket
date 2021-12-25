<?php

namespace App\Http\Livewire;

use App\Http\Traits\workloadTrait;
use App\Models\Pegawai;
use App\Models\tugasanggotatim;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    use workloadTrait;

    public 
    $today,
    $pegawai,
    $posisi;

    public function mount()
    {
        //pindah ke hari pertama bulan
        $this->posisi =Carbon::today()->locale('in')->startOfYear();//->startOfMonth();

        // $this->today = Carbon::today()->locale('in');
        // $this->posisi = Carbon::
        // createFromDate(2021, 7,1)
        // ->locale('in');
    }

    public function render()
    {   
        $workloadSetahun=[];
        for ($i=0; $i < 12; $i++) 
        { 
            $workloadSetahun[$i]=$this->getAllWorkloadOnBulan();
            if($i < 11) $this->posisi->addMonth();
        }
        // dd($workloadSetahun);

        $ini=$this->getUntukStd();
        // dd($this->posisi->month);
        dd($ini[0]->tugasanggotatims()->YangStartAtauDuePada($this->posisi->year,4)->get());


        $userlogin=User::find(Auth::user()->id);
        return view('livewire.dashboard',[
            'userlogin'=>$userlogin,
            'workloadSetahun'=>$workloadSetahun,
            'untukDashboard'=>$this->getForDashboard(),
        ]);
    }



}
