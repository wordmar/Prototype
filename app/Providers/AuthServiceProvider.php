<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    const REQU_DELETE = 'delete-requirement';
    const REQU_CREATE = 'create-requirement';
    const REQU_UPDATE = 'update-requirement';

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define(self::REQU_CREATE, function (User $user) {
            return $user->hasRole(Role::NORMAL_USER);
        });

        $gate->define(self::REQU_UPDATE, function ($user, $requirement) {
            return $user->name === $requirement->user_id;
        });

        $gate->define(self::REQU_DELETE, function ($user, $requirement) {
            return $user->name === $requirement->user_id;
        });
    }
}
