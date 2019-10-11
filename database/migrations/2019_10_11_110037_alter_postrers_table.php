<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostrersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->unsignedBigInteger('poster_group_id')->nullable();
            $table->foreign('poster_group_id')->references('id')->on('poster_group')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->dropForeign('poster_group_id');
            $table->dropColumn('poster_group_id');
        });
    }
}
