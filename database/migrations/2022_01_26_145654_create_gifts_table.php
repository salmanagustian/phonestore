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
            $table->string('series', 256)->nullable();
            $table->mediumText('slug')->nullable();
            $table->integer('points')->unsigned()->nullable();
            $table->integer('stock')->unsigned()->nullable();
            $table->integer('total_reviews')->unsigned()->nullable();
            $table->longText('descr_on_detail')->nullable()->comment('Keterangan untuk item detail');
            $table->longText('descr_on_info')->nullable()->comment('Keterangan untuk item info');
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
