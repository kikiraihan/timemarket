<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KepalaTimBoardController extends Controller
{
    public function myteam()
    {
        $user=Auth::user();
        $pegawai=$user->pegawai;
        $ag=$pegawai->anggotaunit;
        $unit=$ag->unit;
        $proker=$pegawai->mengepalaitims;

        return view('katimboard.myteam',compact(['user','pegawai','ag','unit','proker']));
    }

    public function showTeam($id)
    {
        $tim=Tim::with('tugasanggotatims.pegawai')
        ->where('id','=',$id)
        ->first();

        if($tim->id_kepala != Auth::user()->pegawai->id)
        // return redirect()->route('showteam',['id'=>$id,'id_pegawai'=>null]);
        return abort('403');

        
        return view('katimboard.showteam',compact(['tim']));
    }

}
