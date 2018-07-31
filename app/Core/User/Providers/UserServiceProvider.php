<?php

namespace App\Core\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Core\User\Http\Controllers';
    protected $routesDirectory = __DIR__ . '/../routes/web.php';
    protected $routesApiDirectory = __DIR__ . '/../routes/api.php';

    public function boot()
    {
        //

        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group($this->routesDirectory);
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group($this->routesApiDirectory);
    }
}
