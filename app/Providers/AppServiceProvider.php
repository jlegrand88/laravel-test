<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\IProcessMessage;
use App\Actions\ProcessMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProcessMessage::class, ProcessMessage::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
