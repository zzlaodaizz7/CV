<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class ForceHttpsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(UrlGenerator $url)
    {
        if (env('APP_HTTPS') === true || env('APP_HTTPS') === 'true') {
            $url->forceScheme('https');
        }
    }
}
