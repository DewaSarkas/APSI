<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isStaff' ,function(){
            if (Auth::user()->roles_id == 1) {
                return true;
            }
            return false;
        });
        Gate::define('isDosen' ,function(){
            if (Auth::user()->roles_id == 2) {
                return true;
            }
            return false;
        });
        Gate::define('isMahasiswa' ,function(){
            if (Auth::user()->roles_id == 3) {
                return true;
            }
            return false;
        });
        Gate::define('isMitra' ,function(){
            if (Auth::user()->roles_id == 4) {
                return true;
            }
            return false;
        });
        Gate::define('isAssesor' ,function(){
            if (Auth::user()->roles_id == 5) {
                return true;
            }
            return false;
        });
        Gate::define('isAlumni' ,function(){
            if (Auth::user()->roles_id == 6) {
                return true;
            }
            return false;
        });
    }
}
