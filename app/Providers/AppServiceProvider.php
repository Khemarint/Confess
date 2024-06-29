<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        \Debugbar::enable();

        Cache::forget('topUsers');

        $topUsers = Cache::remember('topUsers', now()->addMinutes(5), function(){
            return User::withCount('brain')
            ->orderBy('brain_count','desc')
            ->take(10)->get();
        });



        View::share(
            'topUsers',
             $topUsers
        );
    }
}
