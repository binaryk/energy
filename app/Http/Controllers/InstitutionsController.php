<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Institution;

class InstitutionsController extends Controller
{
     
     
    public function index()
    {
        $institutions = Institution::all();
        return view('energetic.institutions.institution')->with('institutions', $institutions);
    }

    public function create()
    {
        //
    }

    public function store(Request $request) //create new row
    {
        $model = Institution::create($request->all());
        return $model;
    }

    public function show($id)
    {
        dd(5);
    }

    public function edit($id)
    {
        return Institution::find($id);
    }

    public function update(Request $request, $id)//edit 
    {
        return Institution::where('id', $id)->update($request->except('token'));
    }

    public function destroy(Request $request, $id)
    {
        $table = Institution::find($id);
        $table->delete();
        return 1;   
    }
}
