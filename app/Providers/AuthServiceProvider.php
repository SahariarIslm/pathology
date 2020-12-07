<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Admin\ShopPayment;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Gate::define('superAdmin', function($user){
            return $user->role == 'SuperAdmin';
        });
        Gate::define('employee', function($user){
            return $user->role == 'Employee';
        });
        Gate::define('admin', function($user){
            return $user->role == 'Admin';
        });
        Gate::define('adminP', function($user){
            $data = ShopPayment::where('shop', Auth::user()->id)->where('status', '1')->first();
            return $user->role == 'Admin' && $data->package == 'Professional';
        });
        Gate::define('adminE', function($user){
            $data = ShopPayment::where('shop', Auth::user()->id)->where('status', '1')->first();
            return $user->role == 'Admin' && $data->package == 'Enterprise';
        });
        Gate::define('manager', function($user){
            return $user->role == 'Manager';
        });
        Gate::define('salesMan', function($user){
            return $user->role == 'SalesMan';
        });
        Gate::define('reference', function($user){
            return $user->role == 'Reference';
        });
    }
}
