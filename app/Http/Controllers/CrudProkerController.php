<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudProkerController extends Controller
{
    public function create()
    {

        $link_balik='Katimboard.myteam';
        return view('crudProker.create',compact('link_balik'));
    }

    public function edit($idToUpdate)
    {
        return view('crudProker.edit',compact(['idToUpdate']));
    }
}
