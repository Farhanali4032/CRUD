<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role as ContractsRole;

class UserListController extends Controller
{
    //
    function index(){
        
        $users = User::all();
        // $userId = auth()->id();
        // $userRole = User::findOrFail($userId);
        // $roles = $userRole->roles()->pluck('name')->toArray();
        return view('userlist', compact('users'));
    }

    function editUserRole($id){

        $user = User::findOrFail($id);
        $userRole =$user->getRoleNames();
        $roles = Role::pluck('name','name')->all();
        return view('user-form', compact('user', 'userRole','roles'));

    }

    function updataUserRole(Request $request, $id){
        $user = User::findOrFail($id);
        $roleName = $request->input('role');

        $request->validate([
            'role' => 'required|exists:roles,name'
        ]);

        $role = Role::where('name', $roleName)->firstOrFail();
        $user->syncRoles($role);
        return redirect('user-list')->with('status', 'Role Updated');

    }


    function userDelete($id){

        
        User::findOrFail($id)->delete();

        return redirect('/user-list')->with('status', 'Record Deleted');
    }
}

