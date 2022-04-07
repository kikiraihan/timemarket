<?php

namespace App\Http\Livewire;

use App\Exports\KalenderMingguanByQuery;
use App\Models\Pegawai;
use Carbon\Carbon;
use App\Http\Traits\workloadTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Kalenderutama extends Component
{
    use workloadTrait;
    //fungsi2 terkait manajemen perhitungan workload dipindahkan ke trait ini

    public 
    $posisi,
    $seminggu;//dpe method ada di workloadTrait.

    public function mount()
    {
        $this->posisi = Carbon::parse( Carbon::now())->locale('in');
    }

    public function render()
    {
        $list=$this->getDataAllKalenderSeminggu($this->posisi->format('Y-m-d'));
        // dd($list);
        return view('livewire.kalenderutama',compact(['list']));
    }

    public function incrementWeek()
    {
        // if($this->posisiHarian->daysInMonth != $this->posisiHarian->day)
        $this->posisi->addWeek();
    }

    public function decrementWeek()
    {
        // if(1 != $this->posisiHarian->day)
        $this->posisi->subWeek();
    }


    public function exportExcell()
    {
        $waktu=Carbon::now();
        return Excel::download(new KalenderMingguanByQuery($this->posisi), 'kalender_'.$waktu->format('Y_M_d').'.xlsx');
    }
}
