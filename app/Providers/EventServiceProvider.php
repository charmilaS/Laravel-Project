<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\UserLog;
use Illuminate\Auth\Events\Login;



class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $listen = [
        Login::class => [
            'App\Listeners\LogUserLogin',
        ],
    ];
    
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
