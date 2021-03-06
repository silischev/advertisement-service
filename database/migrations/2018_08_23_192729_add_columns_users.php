<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('address', 100)->nullable();
            $table->string('phone', 100)->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
}
