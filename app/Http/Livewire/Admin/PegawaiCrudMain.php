<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pegawai;
use Livewire\Component;

class PegawaiCrudMain extends Component
{
    public $isiDrop;
    public $idToDropup;
    public $pegawaiToUpdate;

    public function render()
    {
        $pegawai=Pegawai::with('user')->get();
        $pegawaiToDropUp=null;
        if(isset($this->idToDropup))
        $pegawaiToDropUp=Pegawai::find($this->idToDropup);


        return view('livewire.admin.pegawai-crud-main',compact(['pegawai','pegawaiToDropUp']));
    }

    public function tampilData($isiDrop,$idToDropup)
    {
        // dd('jalan');
        $this->isiDrop=$isiDrop;
        $this->idToDropup=$idToDropup;
    }

    public function tampilEdit($isiDrop,$idToDropup)
    {
        $this->isiDrop=$isiDrop;
        $this->idToDropup=$idToDropup;
        $this->pegawaiToUpdate=Pegawai::find($idToDropup);
    }
}
