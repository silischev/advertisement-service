<?php

namespace App\Core\User\Services;

use App\Core\User\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleService
{
    /**
     * @param string $name
     *
     * @return Role
     */
    public function create(string $name)
    {
        return Role::create(['name' => $name]);
    }

    /**
     * @param string $name
     *
     * @throws \Exception
     */
    public function delete(string $name)
    {
        Role::findByName($name)->delete();
    }

    /**
     * @param string $roleName
     * @param User $user
     *
     * @return void
     */
    public function attachToUser(string $roleName, User $user): void
    {
        $user->assignRole(Role::findByName($roleName));
    }

    /**
     * @param string $roleName
     * @param User $user
     *
     * @return void
     */
    public function detachFromUser(string $roleName, User $user): void
    {
        $user->removeRole(Role::findByName($roleName));
    }

    public function getRole(User $user)
    {
        return $user->getRoleNames()->first();
    }

    public function getRoles(User $user)
    {
        return $user->getRoleNames();
    }
}
