<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosterGroupLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poster_group_lang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poster_group_id');
            $table->foreign('poster_group_id')->references('id')->on('poster_group')->onDelete('cascade');

            $table->string('title')->nullable();

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
        Schema::dropIfExists('poster_group_lang');
    }
}
