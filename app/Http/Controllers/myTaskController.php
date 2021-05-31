<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class myTaskController extends Controller
{
    public function workload()
    {
        $user=Auth::user();
        $pegawai=$user->pegawai;
        $ag=$pegawai->anggotaunit;
        $unit=$ag->unit;
        // dd($unit);

        return view('mytask/workload',compact(['user','pegawai','ag','unit']));
    }
    

    public function myteam()
    {
        $user=Auth::user();
        $pegawai=$user->pegawai;
        $ag=$pegawai->anggotaunit;
        $unit=$ag->unit;
        $proker=$pegawai->tims;

        return view('mytask/myteam',compact(['user','pegawai','ag','unit','proker']));
    }


    public function theyworkload($id)
    {
        
        $pegawai=Pegawai::find($id);
        $user=$pegawai->user;
        $ag=$pegawai->anggotaunit;
        $unit=$ag->unit;

        return view('theytask/workload',compact(['user','pegawai','ag','unit']));
    }
}
