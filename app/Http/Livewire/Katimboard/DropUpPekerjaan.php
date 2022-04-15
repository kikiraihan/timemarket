<?php

namespace App\Http\Livewire\Katimboard;

use App\Models\tugasanggotatim;
use Livewire\Component;

class DropUpPekerjaan extends Component
{
    public $idToDropup;
    public $status;

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
        $this->status=tugasanggotatim::find($id)->status;
    }

    public function hapusPekerjaan($id)
    {
        tugasanggotatim::find($id)->delete();
        $this->emit('pekerjaanTerhapusShowReset');
    }

    public function setDone($id)
    {
        $tgs=tugasanggotatim::find($id);
        $tgs->status="Done";
        $tgs->save();
        $this->emit('pekerjaanTerhapusShowReset');//cuma ba reset ini
    }

    public function setOnGoing($id)
    {
        $tgs=tugasanggotatim::find($id);
        $tgs->status="on going";
        $tgs->save();
        $this->emit('pekerjaanTerhapusShowReset');
    }

}
