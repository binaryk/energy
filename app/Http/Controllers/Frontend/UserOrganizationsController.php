<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class UserOrganizationsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(){ 
        $organizations = access()->user()->organizations()->get();
        // dd($organizations);
        $this_url = \Request::url();
        return view('frontend.user_organizations')->with('this_url', $this_url)->with('organizations', $organizations);
    } 

    public function store($id){ 
        // dd($data);
        \Session::put('user_organization', $id);
        return redirect()->to('/');
    } 

    public function macros(){

        return view('frontend.macros');
    }
}
