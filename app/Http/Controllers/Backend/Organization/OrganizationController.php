<?php

namespace App\Http\Controllers\Backend\Organization;

use App\Http\Controllers\Controller;
use App\Models\Organization\Organization;
use App\Models\Access\User\User;
// use App\Repositories\Backend\Role\RoleRepositoryContract;
// use App\Repositories\Frontend\Auth\AuthenticationContract;
// use App\Http\Requests\Backend\Access\User\CreateUserRequest;
use App\Http\Requests\Backend\Organization\StoreOrganizationRequest;
// use App\Http\Requests\Backend\Organization\CreateOrganizationRequest;
// use App\Http\Requests\Backend\Access\User\EditUserRequest;
// use App\Http\Requests\Backend\Access\User\MarkUserRequest;
// use App\Http\Requests\Backend\Access\User\UpdateUserRequest;
// use App\Http\Requests\Backend\Access\User\DeleteUserRequest;
// use App\Http\Requests\Backend\Access\User\RestoreUserRequest;
// use App\Http\Requests\Backend\Access\User\ChangeUserPasswordRequest;
// use App\Http\Requests\Backend\Access\User\UpdateUserPasswordRequest;
// use App\Repositories\Backend\Permission\PermissionRepositoryContract;
// use App\Http\Requests\Backend\Access\User\PermanentlyDeleteUserRequest;
// use App\Http\Requests\Backend\Access\User\ResendConfirmationEmailRequest;

/**
 * Class UserController
 */
class OrganizationController extends Controller
{ 

    public function index(){   
        $organizations = Organization::all();
        return view('backend.organizations.index')->with(compact('organizations'));
            // ->withUsers($this->users->getUsersPaginated(config('access.users.default_per_page'), 1));
    } 

    public function create(){
        return view('backend.organizations.create');
    }

    public function store(StoreOrganizationRequest $request){
        Organization::create($request->all());
        return redirect()->route('admin.organization')->withFlashSuccess('The organization was successfully created.');
    } 

    public function edit($id){
        $organization = Organization::find($id);
        return view('backend.organizations.edit')->with(compact('organization')); 
    } 

    public function update($id, StoreOrganizationRequest  $request){ 
        Organization::findOrFail($id)->update($request->all());
        return redirect()->route('admin.organization')->withFlashSuccess('The organization was successfully updated.');
    }

    public function destroy($id){
        Organization::findOrFail($id)->delete();
        return redirect()->back()->withFlashSuccess('The organization was successfully deleted.'); 
    } 
}
