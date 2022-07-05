<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use App\Models\Tim;
use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        $p=Pegawai::count();
        $t=Tim::count();

        return view('livewire.landing-page',[
            'peg'=>$p,
            'ak'=>$t,
        ])->layout('layouts.landing.app');;
    }
}
