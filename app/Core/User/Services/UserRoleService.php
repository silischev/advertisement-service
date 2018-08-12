<?php

namespace App\Core\User\Services;

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

    public function attachToUser(int $userId, Role $role)
    {
        // TODO
    }

    public function detachFromUser(int $userId, Role $role)
    {
        // TODO
    }
}