<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MyService;
use App\Services\PowerMyService;
use App\Services\MyServiceInterface;


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
        app()->bind(MyServiceInterface::class, PowerMyService::class);
    }
}
