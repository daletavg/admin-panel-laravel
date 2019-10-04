<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('type_id')->index();
            $table->foreign('type_id')->references('id')->on('type_setting')->onDelete('cascade');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('group_setting')->onDelete('cascade');
            $table->string('name');
            $table->string('name_key');
            $table->text('data')->nullable();
            $table->timestamps();
        });
//        Schema::table('settings',function (Blueprint $table){
//           $table->string('name_key')->unique()->change();
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
