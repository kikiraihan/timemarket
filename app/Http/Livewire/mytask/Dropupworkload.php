<?php

namespace App\Http\Livewire\Mytask;

use App\Models\tugasanggotatim;
use Livewire\Component;

class Dropupworkload extends Component
{
    public 
    $tugasDetail, 
    // $showDropUp,
    $isMy
    ;

    protected $listeners=[
        'dropUpTugas'=>'cekTugasDetail',
        'setDoneCeklis'=>"setDone",
        'setOnGoingCeklis'=>'setOnGoing',
    ];

    public function mount($isMy)
    {
        $this->isMy=$isMy;
        // $this->showDropUp= false;
    }

    public function render()
    {
        return view('livewire.mytask.dropupworkload');
    }


    public function cekTugasDetail($id)
    {
        $this->tugasDetail=tugasanggotatim::find($id);
    }

    public function setDone()
    {
        // anda yakin?

        // save
        $this->tugasDetail->status="Done";
        $this->tugasDetail->save();

        // emit ke kalender render
        $id=$this->tugasDetail->id;
        $idPegawai=$this->tugasDetail->pegawai->id;
        $this->reset('tugasDetail');
        $this->cekTugasDetail($id);
        $this->emit('tugasDiSetDone',$idPegawai);
        $this->emit('swalUpdated');
    }

    public function setOnGoing()
    {
        // anda yakin?

        // save
        $this->tugasDetail->status="on going";
        $this->tugasDetail->save();


        $id=$this->tugasDetail->id;
        $this->reset('tugasDetail');
        $this->cekTugasDetail($id);
        
        $this->emit('swalUpdated');
    }
}
