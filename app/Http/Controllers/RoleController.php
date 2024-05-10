<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    
    public function index(Request $request)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        // foreach($roles as $roleKey => $roleName){
        //     echo $roleKey;
        //     dd();
        // }
        // dd($permissions);
        return view('roles.index', compact('roles', 'permissions'));
    }


    public function setPermissionToRoles(Request $request){
        dd($request->all());
    }
}
