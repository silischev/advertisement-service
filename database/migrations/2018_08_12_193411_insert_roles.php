<?php

use App\Core\User\Models\User;
use App\Core\User\Services\UserRoleService;
use Illuminate\Database\Migrations\Migration;

class InsertRoles extends Migration
{
    public function up()
    {
        $service = new UserRoleService();

        $service->create(User::ROLE_ADMINISTRATOR);
        $service->create(User::ROLE_MODERATOR);
        $service->create(User::ROLE_USER);
    }

    public function down()
    {
        $service = new UserRoleService();

        $service->delete(User::ROLE_ADMINISTRATOR);
        $service->delete(User::ROLE_MODERATOR);
        $service->delete(User::ROLE_USER);
    }
}
