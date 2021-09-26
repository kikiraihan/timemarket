<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        
        $userlogin=User::find(Auth::user()->id);
        if($userlogin->hasRole('Admin'))
        return $this->renderAsAdmin($userlogin);
        else
        return $this->renderAsNotAdmin($userlogin);
    }

    public function renderAsAdmin($userlogin)
    {
        // dd();
        $jumPegawai=Pegawai::count();
        $jumUnit=Unit::count();

        return view('livewire.admin.beranda-admin',compact(['userlogin','jumPegawai',"jumUnit"]));
    }

    public function renderAsNotAdmin($userlogin)
    {
        return view('livewire.beranda',compact(['userlogin']));
    }
}
