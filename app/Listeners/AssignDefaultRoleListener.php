<?php

namespace App\Listeners;

use App\Events\AssignDefaultRole;
use Spatie\Permission\Models\Role;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignDefaultRoleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AssignDefaultRole  $event)
    {
        $defaultRole = Role::where('name', 'user')->first();
        $event->user->assignRole($defaultRole);
    }
}
