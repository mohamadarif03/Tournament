<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        $permission = Permission::where('name', 'view-admin')->first();
        $permission = Permission::where('name', 'view-organizer')->first();
        $permission = Permission::where('name', 'view-player')->first();
        if (!$permission) {
            Permission::create(['name' => 'view-admin']);
            Permission::create(['name' => 'view-organizer']);
            Permission::create(['name' => 'view-player']);

            $organizerRole = Role::where('name', 'organizer')->first();
            $adminRole = Role::where('name', 'admin')->first();
            $playeRole = Role::where('name', 'player')->first();

            $adminRole->givePermissionTo('view-admin');
            $organizerRole->givePermissionTo('view-organizer');
            $playeRole->givePermissionTo('view-player');
        }
    }
}
