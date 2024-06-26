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
        Gate::define('admin', function (User $user) : bool{
            return (bool) $user->is_admin;
        });
        Gate::define('brain.delete', function (User $user, Brain $brain) : bool{
            return ((bool) $user->is_admin || $user->id === $brain->user_id);
        });
        Gate::define('brain.edit', function (User $user, Brain $brain) : bool{
            return ((bool) $user->is_admin || $user->id === $brain->user_id);
        });
    }
}

