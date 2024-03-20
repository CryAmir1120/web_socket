<?php

namespace App\Providers;

use App\Http\Middleware\WebSocketCorsMiddleware;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // app('websockets.router')->middleware('auth')->push(WebSocketCorsMiddleware::class);

    }
}
