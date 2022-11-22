<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Driver;
use App\Policies\DriverPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Driver::class      => DriverPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('doAdvanced', function(User $user){
            return ($user->isAdmin() or $user->isSuperAdmin());
        });
    }
}
