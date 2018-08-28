<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Cache\Repository;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton(Repository::class, function() {
            return $this->app->get('cache')->store();
        });
    }

    public function register()
    {

    }
}
