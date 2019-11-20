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
            $table->string('url',255);
            $table->string('pay_link')->nullable();
            $table->text('video')->nullable();
            $table->float('price_before')->nullable();
            $table->float('price_to')->nullable();
            $table->boolean('active')->default(false);
            $table->string('color')->default('black');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->unsignedBigInteger('place_id')->nullable();
            $table->foreign('place_id')->references('id')->on('places')->onDelete('set null');
            $table->timestamps();
        });
        Schema::table('posters', function (Blueprint $table) {
            $table->string('url',255)->unique()->change();
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
