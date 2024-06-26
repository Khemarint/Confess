<?php

namespace App\Providers;

use App\Models\Brain;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Role
        Gate::define('admin', function (User $user) : bool{
            return (bool) $user->is_admin;
        });
      
    }
}

