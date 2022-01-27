<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('api_token', 256)->nullable();
            $table->string('fullname', 100);
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('points')->unsigned()->nullable()->comment('Poin user untuk redeem item');
            $table->string('roles', '30')->nullable()->comment('1: Admin 2:Operator 3:Customer');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
