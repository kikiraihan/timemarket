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

    public function tampilData($data,$tanggal=null)
    {
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
