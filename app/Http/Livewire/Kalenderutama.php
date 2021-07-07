<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Kalenderutama extends Component
{
    public 
    $posisi,
    $seminggu;

    public function mount()
    {
        $this->posisi = Carbon::parse( Carbon::now())->locale('in');
    }

    public function render()
    {
        $list=$this->getDataAllKalenderSeminggu($this->posisi->format('Y-m-d'));
        return view('livewire.kalenderutama',compact(['list']));
    }

    public function getDataAllKalenderSeminggu($posisi)
    {
        $posisi=Carbon::parse($posisi);
        $index=Carbon::parse($posisi->startOfWeek(Carbon::SUNDAY));
        $pegawai=Pegawai::all();

        
        $daysArray = $this->daysArray($index);

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

    public function daysArray(Carbon $index)
    {
        $daysArray = [];
        for ($i = 1; $i <= 7; $i++)
        {
            $daysArray[]=Carbon::parse($index);
            $index->addDay();
        }
        
        return $daysArray;
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
