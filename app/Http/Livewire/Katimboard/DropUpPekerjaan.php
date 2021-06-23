<?php

namespace App\Http\Livewire\Katimboard;

use App\Models\tugasanggotatim;
use Livewire\Component;

class DropUpPekerjaan extends Component
{
    public $idToDropup;

    protected $listeners=[
        'dropUppekerjaansetid'=>'setIdToDropup',
        'terkonfirmasiHapusPekerjaan'=>'hapusPekerjaan'
    ];

    public function render()
    {
        return view('livewire.katimboard.drop-up-pekerjaan');
    }



    public function setIdToDropup($id)
    {
        $this->idToDropup=$id;
    }

    public function hapusPekerjaan($id)
    {
        tugasanggotatim::find($id)->delete();
        $this->emit('pekerjaanTerhapusShowReset');
    }

}
