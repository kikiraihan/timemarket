<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudProkerController extends Controller
{
    public function create()
    {

        $link_balik='Katimboard.myteam';
        return view('crudProker.create',compact('link_balik'));
    }

    public function edit($idToUpdate)
    {
        //kalau bukan kepalatim atau koordinator abort 
        $tim=Tim::find($idToUpdate);
        if($tim->id_kepala != Auth::user()->pegawai->id and $tim->id_koordinator != Auth::user()->pegawai->id)
        return abort('403');
        

        return view('crudProker.edit',compact(['idToUpdate']));
    }

    public function delete($id)
    {
        dd('hapus id '.$id);
    }
}
