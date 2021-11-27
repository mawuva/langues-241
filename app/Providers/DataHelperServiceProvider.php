<?php

namespace App\Providers;

use App\Support\DataHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class DataHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        App::bind('data-helper',function() {
            return new DataHelper;
        });
    }
}