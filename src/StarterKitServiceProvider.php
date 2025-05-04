<?php

namespace miguelsapalo\StarterKit;

use Illuminate\Support\ServiceProvider;

class StarterKitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/resources/public' => public_path('starter-kit'),
        ], 'starter-kit-assets');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/starter-kit'),
        ], 'starter-kit-views');
    }

    public function register()
    {
        //
    }
}
