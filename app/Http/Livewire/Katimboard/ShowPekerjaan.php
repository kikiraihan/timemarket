<?php

namespace App\Http\Livewire\Katimboard;

use App\Models\Tim;
use Livewire\Component;

class ShowPekerjaan extends Component
{
    public $idTim;

    protected $listeners=[
        'pekerjaanTerhapusShowReset'=>'resetpekerjaanterhapus',
    ];

    public function mount($idtim)
    {
        $this->idTim=$idtim;
    }

    public function render()
    {
        $tim=Tim::find($this->idTim);

        return view('livewire.katimboard.show-pekerjaan',compact(['tim']));
    }

    public function resetpekerjaanterhapus()
    {
        $this->mount($this->idTim);
    }

}
