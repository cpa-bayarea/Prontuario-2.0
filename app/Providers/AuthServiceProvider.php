<?php

namespace App\Providers;

use Illuminate\Support\Facades\{Auth, Gate};
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\{User, Permission};

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $permissions = Permission::with('roles')->get();

        foreach ($permissions as $permission) {
            $gate->define($permission->nome, function (User $user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }

        Gate::before(function ($user, $ability) {

            if ($user->hasAnyRoles('SuperAdmin')) {
                return true;
            }

        });
    }
}
