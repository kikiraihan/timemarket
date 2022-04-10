<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudTaskController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        $link_balik=null;

        return view('crudtask.create',compact(['link_balik']));
    }

    public function createById($id_proker)
    {
        $link_balik='Katimboard.showteam';
        $link_balik=null;
        return view('crudtask.create',compact(['id_proker','link_balik']));
    }

    public function createByIdForPegawai($id_proker)
    {
        $link_balik='Katimboard.showteam';
        $link_balik=null;
        return view('crudtask.createForPegawai',compact(['id_proker','link_balik']));
    }


    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($idToUpdate)
    {
        return view('crudtask.edit',compact(['idToUpdate']));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
