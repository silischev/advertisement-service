<?php

namespace App\Providers;

use App\Core\User\Models\User;
use App\Core\User\Services\UserRoleService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $roleService = new UserRoleService();

        Gate::define('admin-panel', function (User $user) use ($roleService) {
            return $roleService->getRole($user) === User::ROLE_ADMINISTRATOR;
        });
    }
}
