<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    

    
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }


    public function setRolePermission(Request $request){

        foreach($request->allPermissions as $permissionId){
            // print_r($hpermissionId);
            if(isset($request->permissions[$permissionId])){
                $permission = Permission::findOrFail($permissionId);
               $roles = $request->permissions[$permissionId];
               $permission->syncRoles($roles);
            }
            else{
                $permission = Permission::findOrFail($permissionId);
    
                $permission->syncRoles('');
            }
        }
        return redirect()->back()->with('success', 'Permissions updated successfully.');

    //    dd($request->permissions);
            // foreach ($request->permissions as $permissionId => $roleName) {

            //     $permission = Permission::findOrFail($permissionId);
    
            //     $permission->syncRoles($roleName);
            // }
    
            // return redirect()->back()->with('success', 'Permissions updated successfully.');
    }
}
