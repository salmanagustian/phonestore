<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->mediumText('slug')->nullable();
            $table->string('series', 256)->nullable();
            $table->mediumText('screen')->nullable();
            $table->mediumText('memory')->nullable();
            $table->mediumText('operation_system')->nullable();
            $table->mediumText('cpu')->nullable();
            $table->mediumText('camera')->nullable();
            $table->mediumText('sim')->nullable();
            $table->mediumText('battery')->nullable();
            $table->integer('points')->unsigned()->nullable();
            $table->integer('stock')->unsigned()->nullable();
            $table->double('rating')->nullable();
            $table->integer('total_reviews')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts');
    }
}
