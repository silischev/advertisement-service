<?php

namespace App\Core\Advertisement\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AdvertisementServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Core\Advertisement\Http\Controllers';
    protected $routesDirectory = __DIR__ . '/../routes/web.php';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group($this->routesDirectory);
    }
}
