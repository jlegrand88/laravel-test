<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\IShippingService;
use App\Services\FakeShippingService;
use App\Services\OwnShippingService;

class ShippingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $request = $this->app->request;
        if($request->has('destination')){
            if($request->destination == 2){
                $this->app->bind(IShippingService::class, OwnShippingService::class);
            } else {
                $this->app->bind(IShippingService::class, FakeShippingService::class);
            }
        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
