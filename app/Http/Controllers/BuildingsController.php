<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Build;

class BuildingsController extends Controller
{
   public function __construct(){
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }
  
    public function index()
    {
        $buildings = Build::all();
        return $buildings;
    }
 
    public function create()
    {
        dd('suka');
    }

    public function store(Request $request) //create new row
    {
        $model = Build::create($request->all());
        return $model;
    }
 
    public function show($id)
    {
        dd(5);
    }
 
    public function edit($id)
    {
        return Build::find($id);
    }
 
    public function update(Request $request, $id)//edit 
    {
        return Build::where('id', $id)->update($request->except('token'));
    }
 
    public function destroy(Request $request, $id)
    {
        $table = Build::find($id);
        $table->delete();
        return 1;   
    }
}
