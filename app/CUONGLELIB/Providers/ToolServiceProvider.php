<?php

namespace App\CUONGLELIB\Providers;

use Illuminate\Support\ServiceProvider;
use App\CUONGLELIB\ToolFactory;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(ToolFactory::class, function ($app) {
            return new ToolFactory();
        });

    }
}
