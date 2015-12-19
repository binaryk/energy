<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Infrastructure;

class InfrastructuresController extends Controller
{
    public function __construct(){
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }
     
    public function index()
    {
        $infrastructures = Infrastructure::all();
        return $infrastructures;
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request) //create new row
    {
        
    }
 
    public function show($id)
    {
      
    }
 
    public function edit($id)
    {
        
    }
 
    public function update(Request $request, $id)//edit 
    {

    }
 
    public function destroy(Request $request, $id)
    {
           
    }
}
