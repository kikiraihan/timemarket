<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KalenderUtamaController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $pegawaiYangLogin=Auth::user()->pegawai;

        return view('kalenderutama',compact(['pegawaiYangLogin']));
    }
}
