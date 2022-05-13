<?php

namespace App\Http\Livewire\Fullpage;

use App\Models\Tim;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Katimboard extends Component
{
    public $mode;

    protected $listeners = [
        'fixHapusProker' => 'hapusProker',
    ];

    public function mount()
    {
        $this->mode = 'open';
    }

    public function gantiMode()
    {
        if ($this->mode == 'open') 
            $this->mode = 'edit';
        else 
            $this->mode = 'open';
    }

    public function hapusProker($id)
    {
        Tim::find($id)->delete();
        $this->emit('swalDeleted');
    }

    public function render()
    {
        $user=Auth::user();

        return view('livewire.fullpage.katimboard',[
            'user'=>$user,
            'pegawai'=>$user->pegawai,
            'ag'=>$user->pegawai->anggotaunit,
            'unit'=>$user->pegawai->anggotaunit->unit,
            'proker'=>$user->pegawai->mengkoordinirtims,
        ]);
    }
}
