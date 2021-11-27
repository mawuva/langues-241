<?php

namespace App\Providers;

use App\Support\HandleFileUpload;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class HandleFileUploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('handle-file-upload',function() {
            return new HandleFileUpload;
        });
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
