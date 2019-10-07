<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosterLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poster_lang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poster_id');
            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poster_lang');
    }
}
