<?php

namespace App\Http\Requests\Backend\Organization;

use App\Http\Requests\Request;

/**
 * Class StoreUserRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreOrganizationRequest extends Request
{
    
    public function authorize() {
        return access()->can('create-users');
    }

    public function rules()  {
        return [
            'name'       => 'required',
            'address'    => 'required',
            'cui'        => 'required',
        ];
    }
}
