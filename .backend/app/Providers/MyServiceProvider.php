<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MyServiceInterface;
use App\Services\PowerMyService;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton(
            'MyService',
            PowerMyService::class,
        );

        app()->singleton(
            MyServiceInterface::class, 
            PowerMyService::class,
        );

        echo "<b><MyServiceProvider/register></b><br>";
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        echo "<b><MyServiceProvider/boot></b><br>";
    }
}
