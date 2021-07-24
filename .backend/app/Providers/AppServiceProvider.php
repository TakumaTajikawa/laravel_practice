<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MyService;

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
        app()->when(MyService::class)->needs('$id')->give(1);
    }
}
