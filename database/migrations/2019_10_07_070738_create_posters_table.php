<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('on_general')->default(false);
            $table->dateTime('date')->nullable();
            $table->string('pay_link')->nullable();
            $table->text('videos')->nullable();
            $table->float('price_before')->nullable();
            $table->float('price_to')->nullable();
            $table->boolean('active')->default(false);
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('no action');
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
        Schema::dropIfExists('posters');
    }
}
