<?php

use App\Core\User\Models\User;
use App\Core\User\Services\AuthService;
use App\Core\User\Services\UserRoleService;
use Illuminate\Database\Migrations\Migration;

class InsertAdministrator extends Migration
{
    public function up()
    {
        // TODO

        $service = new AuthService();
        $service->createByAdmin(env('ADMIN_NAME'), env('ADMIN_EMAIL'), env('ADMIN_PASSWORD'), User::ROLE_ADMINISTRATOR);
    }

    public function down()
    {
        // TODO
        $service = new AuthService();
    }
}
