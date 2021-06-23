<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function workload(Request $request)
    {
        $user=Auth::user();
        $pegawai=$user->pegawai;
        $ag=$pegawai->anggotaunit;
        $unit=$ag->unit;
        //dd($request->url());
        

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

    public function theyteam($id)
    {
        $pegawai=Pegawai::find($id);
        $user=$pegawai->user;
        $ag=$pegawai->anggotaunit;
        $unit=$ag->unit;
        $proker=$pegawai->tims;

        return view('theytask/theyteam',compact(['user','pegawai','ag','unit','proker']));
    }




    public function showTeam($id,$id_pegawai)
    {
        $tim=Tim::with('tugasanggotatims.pegawai')
        ->where('id','=',$id)
        ->first();

        $id_pegawai_login=auth::user()->pegawai->id;

        if($id_pegawai==NULL)
        $id_pegawai=auth::user()->pegawai->id;

        $pegawainya=Pegawai::find($id_pegawai);

        if($id_pegawai==$id_pegawai_login)
        $isMilikLogin=TRUE;
        else
        $isMilikLogin=FALSE;

        $isPegawainyaChief=$pegawainya->user->hasRole('Chief');
        
        return view('umum.showteam',compact(['tim','id_pegawai','id_pegawai_login','isMilikLogin','pegawainya','isPegawainyaChief']));
    }

    
}
