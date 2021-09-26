<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use Carbon\Carbon;
use App\Http\Traits\workloadTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
}
