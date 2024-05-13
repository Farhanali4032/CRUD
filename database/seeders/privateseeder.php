<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class privateseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     private $permissions = [
        'student-list',
        'student-edit',
        'student-create',
        'student-delete',
        'user-list',
        'user-delete',
        'user-edit',
        'permission-list',
        'set-permission',
        'role-assign',

     ];

    public function run()
    {
        foreach($this->permissions as $permission){
            Permission::create(['name' => $permission]);
        }
         // Create admin User and assign the role to him.
         $user = User::create([
            'name' => 'bitzstudio',
            'email' => 'bitzstudio@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $adminRole = Role::create(['name' => 'Admin']);
        $managerRole = Role::create(['name' => 'Manager']);
        $userRole = Role::create(['name' => 'User']);


        $permissions = Permission::pluck('id', 'id')->all();

        $adminRole->givePermissionTo($permissions);
        $managerRole->syncPermissions(array_slice($permissions, 4,7));
        $userRole->syncPermissions(array_slice($permissions, 4,5));
        $user->assignRole([$adminRole->id]);


    }
}
