<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    


    public function render()
    {
        
        $userlogin=Auth::user();

        return view('livewire.dashboard',compact(['userlogin']));
    }
}
