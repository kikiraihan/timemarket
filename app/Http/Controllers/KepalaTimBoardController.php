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
        $proker=$pegawai->mengkoordinirtims;
        //dd($pegawai->mengkoordinirunit[1]->anggotaunits->id);

        return view('katimboard.myteam',compact(['user','pegawai','ag','unit','proker']));
    }

    public function showTeam($id)
    {
        $tim=Tim::with('tugasanggotatims.pegawai')
        ->where('id','=',$id)
        ->first();
        if(!$tim) return abort(404);


        if($tim->id_kepala != Auth::user()->pegawai->id and $tim->id_koordinator != Auth::user()->pegawai->id )
        {
            // and $tim->id_koordinator != Auth::user()->pegawai->id 
            // return redirect()->route('showteam',['id'=>$id,'id_pegawai'=>null]);
            return abort('403');
        }
        
        
        //link balik
        if(Auth::user()->hasRole('Chief'))
        {
            $link="Katimboard.myteam";
        }
        else
        {
            //jika bukan chief tapi kepala tim
            $link="mytask.myteam";
        }
        
        
        return view('katimboard.showteam',compact(['tim','link']));
    }

}
