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
        return view('crudtask.create');
    }

    public function createById($id_proker)
    {
        return view('crudtask.create',compact(['id_proker']));
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
