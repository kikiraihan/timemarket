<?php

namespace App\Http\Livewire;

use App\Models\tugasanggotatim;
use Livewire\Component;

class Dropupkalender extends Component
{

    protected $listeners=[
        'dropupDipilih'=>'tampilData',
    ];
    


    
    public 
    $isEditAble,
    $listTugas,
    $tanggal,
    $tampilRutin,
    $pegawaiYangLogin;


    public function mount($isEditAble, $pegawaiYangLogin)
    {
        $this->isEditAble=$isEditAble;
        $this->pegawaiYangLogin=$pegawaiYangLogin;
    }

    public function render()
    {

        return view('livewire.dropupkalender');
    }

    public function tampilData($data=null,$tanggal=null,$tampilRutin=false)
    {
        // dd($tampilRutin);
        $this->tampilRutin=$tampilRutin;
        $this->tanggal=$tanggal;
        $this->listTugas=$data;
    }

    public function setDone($id)
    {
        $tugas=tugasanggotatim::find($id);
        $tugas->status="Done";
        $tugas->save();
        $this->emit('swalUpdated');
    }

}
