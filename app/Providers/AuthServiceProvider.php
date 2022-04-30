<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
    public function boot()
    {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->user_type == 'Admin';
         });
        
         /* define a manager user role */
        Gate::define('isClient', function($user) {
             return $user->user_type == 'Client' & $user->package_type !== "Demo";
         });

        Gate::define('isNopkg', function($user) {
            return $user->package_type == "Demo";
        });
    }
}
