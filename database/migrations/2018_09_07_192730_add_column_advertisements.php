<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAdvertisements extends Migration
{
    public function up()
    {
        Schema::table('advertisements', function ($table) {
            $table->string('address', 100);
            $table->string('phone', 100);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
        });
    }

    public function down()
    {
        Schema::table('advertisements', function ($table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('user_id');
            $table->dropColumn('category_id');
        });
    }
}
