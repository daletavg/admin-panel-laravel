<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosterToPosterGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poster_to_poster_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poster_group_id');
            $table->foreign('poster_group_id')->references('id')->on('poster_group')->onDelete('cascade');
            $table->unsignedBigInteger('poster_id');
            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poster_to_poster_group');
    }
}
