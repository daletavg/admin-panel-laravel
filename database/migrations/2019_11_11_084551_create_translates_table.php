<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {


        Schema::create('translate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('key')->nullable();
            $table->string('comment')->nullable();
            $table->tinyInteger('module_id')->default(0);
            $table->string('group', 254)->nullable()->default('global');
            $table->string('type', 255)->default('text');
            $table->softDeletes();
            $table->unsignedBigInteger('user_id')->nullable()->comment('Last edited by user');
            $table->unsignedBigInteger('deleted_by')->nullable()->comment('User id deleted translate');
            $table->timestamps();
        });

        Schema::create('translate_lang', function (Blueprint $table) {
            $table->unsignedBigInteger('translate_id');
            $table->foreign('translate_id')->references('id')->on('translate')->onDelete('cascade');

            $table->text('data')->nullable();

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
        Schema::dropIfExists('translate_lang');
        Schema::dropIfExists('translates');
    }
}
