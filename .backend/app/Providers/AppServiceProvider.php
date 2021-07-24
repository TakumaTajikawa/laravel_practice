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
        app()->bind('MyService::class',
            function($app) {
                $myService = new MyService();
                $myService->setId(0);
                return $myService;
            });
        
    }
}
