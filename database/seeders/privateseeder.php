<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Stripe\Subscription;

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

   private $subscriptions = [
        [
            'stripe_price_id' => 'price_1PInvpCFCx7aK1tHvalXojpB',
            'subscription_name' => 'Monthly',
            'amount' => '4000',
            'subscription_desc' => 'Enjoy the best subscription',
            'type' => '1'
        ],
        [
            'stripe_price_id' => 'price_1PIqlpCFCx7aK1tHswq79OWm',
            'subscription_name' => 'Weekly',
            'amount' => '300',
            'subscription_desc' => 'Enjoy the best subscription',
            'type' => '0'
        ],
        [
            'stripe_price_id' => 'price_1PIqjaCFCx7aK1tHnWowPGTC',
            'subscription_name' => 'yearly',
            'amount' => '5000',
            'subscription_desc' => 'Enjoy the best subscription',
            'type' => '2'
        ],
    ];


    public function run()
    {
        foreach ($this->permissions as $permission) {
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
        $managerRole->syncPermissions(array_slice($permissions, 4, 7));
        $userRole->syncPermissions(array_slice($permissions, 4, 5));
        $user->assignRole([$adminRole->id]);


            foreach($this->subscriptions as $subscription){
                SubscriptionPlan::create($subscription);
            }
       
    }
}
