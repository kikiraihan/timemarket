<?php

namespace App\Http\Livewire\Mytask;

use App\Models\tugasanggotatim;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class Dropupworkload extends Component
{
    public 
    $tugasDetail, 
    // $showDropUp,
    $isMy,
    $brAdd
    ;

    protected $listeners=[
        'dropUpTugas'=>'cekTugasDetail',
        'setDoneCeklis'=>"setDone",
        'setOnGoingCeklis'=>'setOnGoing',
        'hapusTugasOlehPegawai'=>'hapusPekerjaan',
    ];

    public function mount($isMy,$brAdd=false)
    {
        $this->isMy=$isMy;
        $this->brAdd=$brAdd;
        // $this->showDropUp= false;
    }

    public function render()
    {
        return view('livewire.mytask.dropupworkload');
    }


    public function cekTugasDetail($id)
    {
        $this->tugasDetail=tugasanggotatim::with(['tim','pegawai'])->find($id);
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

    public function hapusPekerjaan($id)
    {
        tugasanggotatim::find($id)->delete();
        // $this->emit('swalUpdated');
        // $this->emit('pekerjaanTerhapusShowReset')
        return redirect()->route('showteam',[
            'id'=>$this->tugasDetail->tim->id,
            'id_pegawai'=>$this->tugasDetail->pegawai->id
        ]);
    }
}
